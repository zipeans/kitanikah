<div class="w-full max-w-md mx-auto">
    <div class="text-center mb-8">
        <a href="/" class="font-serif text-4xl font-bold text-gray-900">
            KitaNikah
        </a>
    </div>
    
    <div class="bg-white rounded-2xl shadow-xl p-8">
        <form wire:submit.prevent="resetPassword">
            <!-- Email Address -->
            <div>
                <label for="email" class="text-sm font-medium text-gray-700">Email</label>
                <input wire:model.lazy="email" id="email" class="block mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sienna-600 focus:border-transparent transition" type="email" required autofocus />
                @error('email') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="text-sm font-medium text-gray-700">Password Baru</label>
                <input wire:model.lazy="password" id="password" class="block mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sienna-600 focus:border-transparent transition" type="password" required />
                @error('password') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" class="text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                <input wire:model.lazy="password_confirmation" id="password_confirmation" class="block mt-1 w-full p-3 border border-gray-300 rounded-lg" type="password" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="w-full bg-sienna-600 hover:bg-sienna-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                    Reset Password
                </button>
            </div>
        </form>
    </div>
</div>
