<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $username = '';  // Add username field
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $role = 'voter';  // Default role

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],  // Validate username
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:voter,admin'],  // Validate role
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => $validated['role'],  // Save role
            'is_active' => true,  // Default to active
        ])));

        Auth::login($user);

        return to_route('admin.dashboard');
    }
}; ?>

<div>
    <h2 class="mb-6 text-4xl font-bold text-center text-white">Create Your Account</h2>
    <form wire:submit.prevent="register" class="space-y-4">
        <!-- Name -->
        <div>
            <x-input-label for="name" class="text-white" :value="__('Name')" />
            <x-text-input wire:model="name" id="name"
                class="block w-full p-2 mt-1 text-white bg-transparent border border-white rounded-md focus:ring-2 focus:ring-indigo-500"
                type="text" name="name" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
        </div>

        <!-- Username -->
        <div>
            <x-input-label for="username" class="text-white" :value="__('Username')" />
            <x-text-input wire:model="username" id="username"
                class="block w-full p-2 mt-1 text-white bg-transparent border border-white rounded-md focus:ring-2 focus:ring-indigo-500"
                type="text" name="username" required />
            <x-input-error :messages="$errors->get('username')" class="mt-2 text-red-500" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" class="text-white" :value="__('Email')" />
            <x-text-input wire:model="email" id="email"
                class="block w-full p-2 mt-1 text-white bg-transparent border border-white rounded-md focus:ring-2 focus:ring-indigo-500"
                type="email" name="email" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>



        <!-- Password -->
        <div>
            <x-input-label for="password" class="text-white" :value="__('Password')" />
            <x-text-input wire:model="password" id="password"
                class="block w-full p-2 mt-1 text-white bg-transparent border border-white rounded-md focus:ring-2 focus:ring-indigo-500"
                type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" class="text-white" :value="__('Confirm Password')" />
            <x-text-input wire:model="password_confirmation" id="password_confirmation"
                class="block w-full p-2 mt-1 text-white bg-transparent border border-white rounded-md focus:ring-2 focus:ring-indigo-500"
                type="password" name="password_confirmation" required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
        </div>

        <!-- Role -->
        <div>
            <x-input-label for="role" class="text-white" :value="__('Role')" />
            <select wire:model="role" id="role"
                class="block w-full p-2 mt-1 bg-transparent border border-white rounded-md text-purple focus:ring-2 focus:ring-indigo-500">
                <option value="voter">Voter</option>
                <option value="admin">Admin</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2 text-red-500" />
        </div>



        <!-- Already Registered? -->
        <div class="flex items-center justify-between">
            <a href="{{ route('login') }}" class="text-sm text-white hover:underline">Already registered?</a>
            <x-primary-button class="px-6 py-2 ml-4 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>
