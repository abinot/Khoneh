<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen   font-sans leading-[1.9] text-[16px] antialiased [text-rendering:optimizeLegibility] overflow-x-hidden selection:bg-sea-800 selection:text-white [&_svg]:block [&_svg]:max-w-full">

        {{-- ============================================================
             NAV — شبیه نوار ناوبری welcome (شناور، شیشه‌ای، pill)
             ============================================================ --}}
        <div class="nav-wrap fixed top-0 left-0 right-0 z-[100]">
            {{-- چک‌باکس مخفی برای کنترل منوی موبایل فقط با CSS --}}
            <input type="checkbox" id="mobile-toggle" class="peer sr-only" />

            <nav class="nav-pill w-full bg-sea-900/42 backdrop-blur-xl backdrop-saturate-150 border-b border-white/20 shadow-[0_6px_24px_-10px_rgba(13,30,48,.25)] py-3 flex items-center justify-between gap-4 px-[26px] max-sm:px-4">

                <a class="nav-brand flex items-center gap-2.5" href="#top">
                    <img src="{{ asset('welcome/Abinot neshan-sepid.svg') }}" width="100" alt="Abinot">
                </a>

                <div class="nav-menu flex items-center gap-0.5 flex-1 justify-center max-lg:hidden">
                    <a class="active py-[9px] px-4 rounded-full text-[.94rem] font-semibold text-white relative after:content-[''] after:absolute after:bottom-[-2px] after:right-1/2 after:translate-x-1/2 after:w-[22px] after:h-[2px] after:rounded-[2px] after:bg-white" href="#top">خانه</a>
                    <a class="py-[9px] px-4 rounded-full text-[.94rem] font-medium text-white/75 hover:text-white transition-colors duration-700" href="#products">محصولات</a>
                    <a class="py-[9px] px-4 rounded-full text-[.94rem] font-medium text-white/75 hover:text-white transition-colors duration-700" href="#disciplines">حوزه‌ها</a>
                    <a class="py-[9px] px-4 rounded-full text-[.94rem] font-medium text-white/75 hover:text-white transition-colors duration-700" href="#about">درباره ما</a>
                    <a class="py-[9px] px-4 rounded-full text-[.94rem] font-medium text-white/75 hover:text-white transition-colors duration-700" href="#contact">تماس با ما</a>
                </div>

                <div class="flex items-center gap-2">
                    @auth
                        {{-- کاربر لاگین کرده: نمایش یوزر با Flux --}}
                        <x-desktop-user-menu />
                    @else
                        {{-- کاربر لاگین نکرده: لوگو آدمک مثل کد پایینی --}}
                        <a href="#contact" class="flex items-center gap-2 text-white hover:text-white/75 transition-colors duration-700">
                            <svg class="w-5 h-5 lg:w-[27px] lg:h-[27px]" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" viewBox="0 0 24 24">
                                <circle cx="12" cy="8" r="4"/>
                                <path d="M4 21c0-4.4 3.6-8 8-8s8 3.6 8 8"/>
                            </svg>
                            <span class="hidden lg:inline text-[.95rem] font-semibold">ورود</span>
                        </a>
                    @endauth

                    {{-- دکمه‌ی همبرگر: label برای چک‌باکس مخفی (بدون JS) --}}
                    <label for="mobile-toggle" aria-label="منو" class="burger hidden w-[42px] h-[42px] place-items-center text-white cursor-pointer select-none max-lg:grid">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M4 7h16M4 12h16M4 17h16"/>
                        </svg>
                    </label>
                </div>
            </nav>

            {{-- منوی موبایل: فقط با CSS و از طریق peer-checked باز/بسته می‌شود --}}
            <div class="mobile-menu hidden peer-checked:flex flex-col gap-0.5 p-3.5 bg-sea-900/42 backdrop-blur-xl border-b border-white/20">
                <a class="py-3 px-4 rounded-xl font-medium text-white/80 hover:bg-white/15 hover:text-white transition-colors duration-700" href="#top">خانه</a>
                <a class="py-3 px-4 rounded-xl font-medium text-white/80 hover:bg-white/15 hover:text-white transition-colors duration-700" href="#products">محصولات</a>
                <a class="py-3 px-4 rounded-xl font-medium text-white/80 hover:bg-white/15 hover:text-white transition-colors duration-700" href="#disciplines">حوزه‌ها</a>
                <a class="py-3 px-4 rounded-xl font-medium text-white/80 hover:bg-white/15 hover:text-white transition-colors duration-700" href="#about">درباره ما</a>
                <a class="py-3 px-4 rounded-xl font-medium text-white/80 hover:bg-white/15 hover:text-white transition-colors duration-700" href="#contact">تماس با ما</a>
            </div>
        </div>

        {{-- فاصله‌ی زیر نوار fixed --}}
       <div class="h-0 min-h-0">
        
        </div>
        <div class="">
            {{ $slot }}
        </div>
        @persist('toast')
            <flux:toast.group>
                <flux:toast />
            </flux:toast.group>
        @endpersist

        @fluxScripts
    </body>
</html>