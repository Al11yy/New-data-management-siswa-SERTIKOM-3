<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'EduData') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <!-- Redesigned guest layout with split screen design -->
        <div class="min-h-screen bg-[#09090b] flex">
            <!-- Left Panel - Branding -->
            <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden">
                <!-- Background Effects -->
                <div class="absolute inset-0">
                    <div class="absolute top-1/4 left-1/4 w-[500px] h-[500px] bg-blue-500/5 rounded-full blur-[100px]"></div>
                    <div class="absolute bottom-1/4 right-1/4 w-[400px] h-[400px] bg-purple-500/5 rounded-full blur-[80px]"></div>
                </div>
                
                <!-- Content -->
                <div class="relative z-10 flex flex-col items-center justify-center w-full p-12">
                    <div class="w-40 h-40 mb-8 animate-float">
                        <img src="public/images/Logojir.png"
                             alt="EduData Logo"
                             class="w-full h-full object-contain drop-shadow-2xl">
                    </div>
                    <h1 class="text-4xl font-bold text-white mb-4 tracking-tight">Smk Pesat</h1>
                    <p class="text-white/50 text-center max-w-sm text-lg leading-relaxed">
                        Sistem Pendataan Siswa Modern untuk Manajemen Pendidikan yang Lebih Efisien
                    </p>
                    
                    <!-- Features -->
                    <div class="mt-16 space-y-4 w-full max-w-sm">
                        <div class="flex items-center gap-4 p-4 rounded-2xl bg-white/[0.02] border border-white/[0.04]">
                            <div class="w-10 h-10 rounded-xl bg-white/[0.05] flex items-center justify-center">
                                <svg class="w-5 h-5 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-white/90 font-medium text-sm">Aman & Terpercaya</p>
                                <p class="text-white/40 text-xs">Data terenkripsi dengan standar tinggi</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 p-4 rounded-2xl bg-white/[0.02] border border-white/[0.04]">
                            <div class="w-10 h-10 rounded-xl bg-white/[0.05] flex items-center justify-center">
                                <svg class="w-5 h-5 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-white/90 font-medium text-sm">Cepat & Responsif</p>
                                <p class="text-white/40 text-xs">Akses data dalam hitungan detik</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Panel - Form -->
            <div class="flex-1 flex flex-col items-center justify-center p-6 lg:p-12">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
