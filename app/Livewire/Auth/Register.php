<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $username;
    public $email;
    public $password;
    public $password_confirmation;
    public $role;

    public function register()
    {
        $this->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:voter,admin',
        ]);

        $user = User::create([
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role,
            'is_active' => true, // Defaulting new users to active
        ]);

        auth()->login($user);

        session()->flash('message', 'Registration successful!');

        // Role-based redirect
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('voter.dashboard');
        }
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
