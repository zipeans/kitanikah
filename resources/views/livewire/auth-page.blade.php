<div class="w-full max-w-md mx-auto">
    <div class="text-center mb-8">
        <a href="/" class="font-serif text-4xl font-bold text-gray-900">
            KitaNikah
        </a>
    </div>
    
    <div class="bg-white rounded-2xl shadow-xl p-8">
        <!-- Tab Switcher -->
        <div class="flex border-b border-gray-200 mb-6">
            <button wire:click="showLogin" class="tab-button flex-1 py-3 font-bold transition-colors duration-300 {{ $activeTab === 'login' ? 'text-sienna-600 border-b-2 border-sienna-600' : 'text-gray-400' }}">
                Masuk
            </button>
            <button wire:click="showRegister" class="tab-button flex-1 py-3 font-bold transition-colors duration-300 {{ $activeTab === 'register' ? 'text-sienna-600 border-b-2 border-sienna-600' : 'text-gray-400' }}">
                Daftar
            </button>
        </div>

        <!-- Login Form -->
        <div id="login-form" class="{{ $activeTab === 'login' ? 'block' : 'hidden' }}">
            <form wire:submit.prevent="login" class="space-y-6">
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                
                <!-- Email Address -->
                <div>
                    <label for="login-email" class="text-sm font-medium text-gray-700">Email</label>
                    <input wire:model.lazy="loginEmail" type="email" id="login-email" required class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sienna-600 focus:border-transparent transition">
                    @error('loginEmail') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>
                
                <!-- Password -->
                <div>
                    <div class="flex justify-between items-center">
                        <label for="login-password" class="text-sm font-medium text-gray-700">Password</label>
                        <a href="{{ route('password.request') }}" class="text-sm text-sienna-600 hover:underline">Lupa Password?</a>
                    </div>
                    <input wire:model.lazy="loginPassword" type="password" id="login-password" required class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sienna-600 focus:border-transparent transition">
                    @error('loginPassword') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>
                
                <!-- Remember Me -->
                <div class="block">
                    <label for="remember_me" class="inline-flex items-center">
                        <input wire:model="remember" id="remember_me" type="checkbox" class="rounded border-gray-300 text-sienna-600 shadow-sm focus:ring-sienna-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">Ingat saya</span>
                    </label>
                </div>

                <div>
                    <button type="submit" class="w-full bg-sienna-600 hover:bg-sienna-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                        <span wire:loading.remove wire:target="login">Masuk</span>
                        <span wire:loading wire:target="login">Memproses...</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Register Form -->
        <div id="register-form" class="{{ $activeTab === 'register' ? 'block' : 'hidden' }}">
             <form wire:submit.prevent="register" class="space-y-6">
                <!-- Nama Lengkap -->
                <div>
                    <label for="register-name" class="text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input wire:model.lazy="name" type="text" id="register-name" required class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sienna-600 focus:border-transparent transition">
                    @error('name') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>
                
                <!-- Email -->
                 <div>
                    <label for="register-email" class="text-sm font-medium text-gray-700">Email</label>
                    <input wire:model.lazy="registerEmail" type="email" id="register-email" required class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sienna-600 focus:border-transparent transition">
                    @error('registerEmail') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>
                
                <!-- Password -->
                <div>
                    <label for="register-password" class="text-sm font-medium text-gray-700">Password</label>
                    <input wire:model.lazy="registerPassword" type="password" id="register-password" required class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sienna-600 focus:border-transparent transition">
                    @error('registerPassword') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>
                
                <!-- Konfirmasi Password -->
                <div>
                    <label for="registerPassword_confirmation" class="text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    {{-- --- PERBAIKAN: Ganti nama wire:model ini --- --}}
                    <input wire:model.lazy="registerPassword_confirmation" type="password" id="registerPassword_confirmation" required class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sienna-600 focus:border-transparent transition">
                </div>

                <div>
                    <button type="submit" class="w-full bg-sienna-600 hover:bg-sienna-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                        <span wire:loading.remove wire:target="register">Buat Akun</span>
                        <span wire:loading wire:target="register">Memproses...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <p class="text-center text-sm text-gray-500 mt-6">
        Butuh bantuan? <a href="#" class="font-medium text-sienna-600 hover:underline">Hubungi Kami</a>
    </p>
</div>
