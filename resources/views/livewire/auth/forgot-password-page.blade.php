<div class="w-full max-w-md mx-auto">
    <div class="text-center mb-8">
        <a href="/" class="font-serif text-4xl font-bold text-gray-900">
            KitaNikah
        </a>
    </div>
    
    <div class="bg-white rounded-2xl shadow-xl p-8">
        <div class="mb-4 text-sm text-gray-600">
            Lupa password Anda? Tidak masalah. Cukup beritahu kami alamat email Anda dan kami akan mengirimkan link untuk mengatur ulang password yang baru.
        </div>

        <!-- Session Status -->
        @if ($status)
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $status }}
            </div>
        @endif

        <form wire:submit.prevent="sendResetLink">
            <!-- Email Address -->
            <div>
                <label for="email" class="text-sm font-medium text-gray-700">Email</label>
                <input wire:model.lazy="email" id="email" class="block mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sienna-600 focus:border-transparent transition" type="email" name="email" required autofocus />
                @error('email') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="w-full bg-sienna-600 hover:bg-sienna-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                    Kirim Link Reset Password
                </button>
            </div>
        </form>
    </div>
    <div class="text-center mt-4">
         <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
            &larr; Kembali ke Login
        </a>
    </div>
</div>
