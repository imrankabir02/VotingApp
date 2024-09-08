<form wire:submit.prevent="register">
    <!-- Username -->
    <div class="mb-4">
        <label for="username" class="block text-sm font-bold mb-2">Username</label>
        <input type="text" id="username" wire:model="username" class="w-full p-2 border" required>
        @error('username') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    <!-- Email -->
    <div class="mb-4">
        <label for="email" class="block text-sm font-bold mb-2">Email</label>
        <input type="email" id="email" wire:model="email" class="w-full p-2 border" required>
        @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    <!-- Role -->
    <div class="mb-4">
        <label for="role" class="block text-sm font-bold mb-2">Role</label>
        <select id="role" wire:model="role" class="w-full p-2 border" required>
            <option value="voter">Voter</option>
            <option value="admin">Admin</option>
        </select>
        @error('role') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    <!-- Password -->
    <div class="mb-4">
        <label for="password" class="block text-sm font-bold mb-2">Password</label>
        <input type="password" id="password" wire:model="password" class="w-full p-2 border" required>
        @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    <!-- Password Confirmation -->
    <div class="mb-4">
        <label for="password_confirmation" class="block text-sm font-bold mb-2">Confirm Password</label>
        <input type="password" id="password_confirmation" wire:model="password_confirmation" class="w-full p-2 border" required>
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2">Register</button>
</form>
