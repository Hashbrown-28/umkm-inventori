<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UMKM Inventori') }} - Masuk</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .glass-dark {
            background: rgba(17, 24, 39, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>
</head>
<body class="h-full">
    <div class="min-h-screen flex" x-data="{ showPassword: false }">
        <!-- Left Side - Feature Showcase -->
        <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden bg-indigo-900">
            <!-- Background Gradients & Effects -->
            <div class="absolute inset-0 bg-gradient-to-br from-indigo-600 via-blue-700 to-indigo-900 opacity-90"></div>
            
            <!-- Animated Background Shapes -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-[20%] -left-[10%] w-[70%] h-[70%] rounded-full bg-purple-500 opacity-20 blur-3xl animate-float-slow"></div>
                <div class="absolute top-[40%] -right-[10%] w-[60%] h-[60%] rounded-full bg-blue-400 opacity-20 blur-3xl animate-float-slower"></div>
                <div class="absolute -bottom-[20%] left-[20%] w-[50%] h-[50%] rounded-full bg-indigo-400 opacity-20 blur-3xl animate-float"></div>
            </div>

            <!-- Content -->
            <div class="relative z-10 w-full h-full flex flex-col justify-between p-12 text-white">
                <!-- Brand -->
                <div class="flex items-center space-x-3">
                    <div class="text-1 font-bold tracking-tight bg-gray-50">

                    </div>
                    <div>
                        <h1 class="text-xl font-bold tracking-tight">UMKM Management</h1>
                        <p class="text-xs text-blue-200">Sistem Manajemen Inventori dan Penjualan</p>
                    </div>
                </div>

                <!-- Feature Cards -->
                <div class="space-y-6 max-w-lg">
                    <h2 class="text-4xl font-bold leading-tight">
                        Kelola Bisnis Anda <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-indigo-200">Lebih Efisien & Cerdas</span>
                    </h2>
                    
                    <div class="grid gap-4 mt-8">
                        <!-- Feature 1 -->
                        <div class="glass p-4 rounded-xl flex items-start space-x-4 transition-transform hover:translate-x-2 duration-300">
                            <div class="p-2 bg-blue-500/30 rounded-lg">
                                <svg class="w-6 h-6 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-white">Manajemen Stok Real-time</h3>
                                <p class="text-sm text-blue-100 mt-1">Pantau persediaan barang Anda dengan akurat dan dapatkan notifikasi stok menipis.</p>
                            </div>
                        </div>

                        <!-- Feature 2 -->
                        <div class="glass p-4 rounded-xl flex items-start space-x-4 transition-transform hover:translate-x-2 duration-300 delay-100">
                            <div class="p-2 bg-purple-500/30 rounded-lg">
                                <svg class="w-6 h-6 text-purple-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-white">Analisa Penjualan</h3>
                                <p class="text-sm text-blue-100 mt-1">Laporan harian, mingguan, dan bulanan yang membantu Anda mengambil keputusan bisnis.</p>
                            </div>
                        </div>

                        <!-- Feature 3 -->
                        <div class="glass p-4 rounded-xl flex items-start space-x-4 transition-transform hover:translate-x-2 duration-300 delay-200">
                            <div class="p-2 bg-emerald-500/30 rounded-lg">
                                <svg class="w-6 h-6 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-white">Aman & Terpercaya</h3>
                                <p class="text-sm text-blue-100 mt-1">Aman & Terpercaya Sistem keamanan terintegrasi untuk melindungi data bisnis Anda.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Text -->
                <div class="text-sm text-blue-200">
                    &copy; {{ date('Y') }} UMKM Management System.
                </div>
            </div>
        </div>

        <!-- Login Form -->
        <div class="w-full lg:w-1/2 flex flex-col justify-center py-12 px-4 sm:px-6 lg:px-20 xl:px-24 bg-gray-50">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <!-- Mobile Logo -->
                <div class="lg:hidden mb-10 text-center">
                    <div class="w-12 h-12 rounded-xl bg-indigo-600 mx-auto flex items-center justify-center shadow-lg mb-4">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m-8-4v10l8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">UMKM Management</h2>
                </div>

                <div>
                    <h2 class="mt-6 text-3xl font-bold tracking-tight text-gray-900">Selamat Datang</h2>
                    <p class="mt-2 text-sm text-gray-600">
                        Silakan masuk ke akun Anda untuk melanjutkan
                    </p>
                </div>

                <div class="mt-8">
                    <div class="mt-6">
                        <form action="{{ route('login') }}" method="POST" class="space-y-6">
                            @csrf

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">
                                    Alamat Email
                                </label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                        </svg>
                                    </div>
                                    <input id="email" name="email" type="email" autocomplete="email" required 
                                        class="appearance-none block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-200 ease-in-out hover:border-indigo-300" 
                                        placeholder="nama@umkm.com"
                                        value="{{ old('email') }}">
                                </div>
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700">
                                    Kata Sandi
                                </label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </div>
                                    <input :type="showPassword ? 'text' : 'password'" id="password" name="password" autocomplete="current-password" required 
                                        class="appearance-none block w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-200 ease-in-out hover:border-indigo-300"
                                        placeholder="••••••••">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                        <button type="button" @click="showPassword = !showPassword" class="text-gray-400 hover:text-gray-500 focus:outline-none">
                                            <svg x-show="!showPassword" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            <svg x-show="showPassword" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                @error('password')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded cursor-pointer">
                                    <label for="remember_me" class="ml-2 block text-sm text-gray-900 cursor-pointer">
                                        Ingat saya
                                    </label>
                                </div>

                                <div class="text-sm">
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 hover:text-indigo-500 transition duration-150 ease-in-out">
                                        Lupa kata sandi?
                                    </a>
                                    @endif
                                </div>
                            </div>

                            <div>
                                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-blue-600 hover:from-indigo-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transform hover:-translate-y-0.5 transition duration-200 ease-in-out">
                                    Masuk
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
