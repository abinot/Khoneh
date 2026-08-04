<nav class="fixed top-0 inset-x-0 z-50 bg-white/85 backdrop-blur-md border-b border-neutral-200 transition-shadow duration-300"
     x-data="{ open: false }"
     x-init="
        const onScroll = () => {
            const nav = $el;
            nav.classList.toggle('nav-scrolled', window.scrollY > 16);
        };
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
     ">
    <div class="max-w-6xl mx-auto px-4 h-16 flex items-center justify-between">
        {{-- Brand --}}
        <a href="{{ route('home') }}" class="flex items-center gap-2.5 group">
            <div class="w-9 h-9 rounded-xl bg-sopal-800 flex items-center justify-center text-white shadow-sm group-hover:bg-sopal-700 transition-colors duration-300">
                <span class="font-bold text-lg">س</span>
            </div>
            <span class="font-bold text-neutral-900 text-lg">سوپال</span>
        </a>

        {{-- Desktop Nav --}}
        <div class="hidden md:flex items-center gap-7">
            <a href="{{ route('home') }}"
               class="text-sm font-medium transition-colors border-b-2 pb-1 {{ request()->routeIs('home') ? 'text-sopal-800 border-sopal-600' : 'text-neutral-600 border-transparent hover:text-sopal-800 hover:border-sopal-600/50' }}">
                خانه
            </a>
            <a href="{{ route('home') }}#pricing"
               class="text-sm font-medium transition-colors border-b-2 pb-1 {{ request()->routeIs('pricing') ? 'text-sopal-800 border-sopal-600' : 'text-neutral-600 border-transparent hover:text-sopal-800 hover:border-sopal-600/50' }}">
                قیمت‌گذاری
            </a>
            <a href="{{ route('about') }}"
               class="text-sm font-medium transition-colors border-b-2 pb-1 {{ request()->routeIs('about') ? 'text-sopal-800 border-sopal-600' : 'text-neutral-600 border-transparent hover:text-sopal-800 hover:border-sopal-600/50' }}">
                درباره ما
            </a>
            <a href="{{ route('contact') }}"
               class="text-sm font-medium transition-colors border-b-2 pb-1 {{ request()->routeIs('contact') ? 'text-sopal-800 border-sopal-600' : 'text-neutral-600 border-transparent hover:text-sopal-800 hover:border-sopal-600/50' }}">
                ارتباط با ما
            </a>
        </div>

        {{-- Actions: dark mode + CTA + mobile toggle --}}
        <div class="flex items-center gap-2">
            <a href="{{ route('home') }}#pricing"
               class="hidden sm:inline-flex items-center gap-2 px-5 py-2.5 text-sm font-bold text-white bg-sopal-800 hover:bg-sopal-700 rounded-xl shadow-lg shadow-sopal-800/20 transition-all duration-300">
                شروع رایگان
                <x-heroicon-o-arrow-right class="w-4 h-4" />
            </a>

            <button wire:click="toggleDarkMode"
                    class="w-10 h-10 rounded-xl bg-neutral-100 border border-neutral-200 flex items-center justify-center text-neutral-700 hover:text-sopal-800 hover:border-sopal-600/50 transition-colors"
                    aria-label="تغییر حالت نمایش">
                <template x-if="!$wire.darkMode">
                    <x-heroicon-o-moon class="w-5 h-5" />
                </template>
                <template x-if="$wire.darkMode">
                    <x-heroicon-o-sun class="w-5 h-5" />
                </template>
            </button>

            <button @click="open = !open"
                    class="md:hidden w-10 h-10 rounded-xl bg-neutral-100 border border-neutral-200 flex items-center justify-center text-neutral-700 hover:text-sopal-800 transition-colors"
                    aria-label="منو">
                <template x-if="!open">
                    <x-heroicon-o-bars-3 class="w-5 h-5" />
                </template>
                <template x-if="open">
                    <x-heroicon-o-x-mark class="w-5 h-5" />
                </template>
            </button>
        </div>
    </div>

    {{-- Mobile Panel --}}
    <div x-show="open" x-transition x-cloak class="md:hidden border-t border-neutral-200 bg-white/95 backdrop-blur-md">
        <div class="max-w-6xl mx-auto px-4 py-3 flex flex-col gap-1">
            <a href="{{ route('home') }}" @click="open = false"
               class="py-3 px-4 rounded-xl text-sm font-medium transition-colors {{ request()->routeIs('home') ? 'text-sopal-800 bg-sopal-100/60' : 'text-neutral-700 hover:text-sopal-800 hover:bg-neutral-100' }}">
                خانه
            </a>
            <a href="{{ route('home') }}#pricing" @click="open = false"
               class="py-3 px-4 rounded-xl text-sm font-medium transition-colors {{ request()->routeIs('pricing') ? 'text-sopal-800 bg-sopal-100/60' : 'text-neutral-700 hover:text-sopal-800 hover:bg-neutral-100' }}">
                قیمت‌گذاری
            </a>
            <a href="{{ route('about') }}" @click="open = false"
               class="py-3 px-4 rounded-xl text-sm font-medium transition-colors {{ request()->routeIs('about') ? 'text-sopal-800 bg-sopal-100/60' : 'text-neutral-700 hover:text-sopal-800 hover:bg-neutral-100' }}">
                درباره ما
            </a>
            <a href="{{ route('contact') }}" @click="open = false"
               class="py-3 px-4 rounded-xl text-sm font-medium transition-colors {{ request()->routeIs('contact') ? 'text-sopal-800 bg-sopal-100/60' : 'text-neutral-700 hover:text-sopal-800 hover:bg-neutral-100' }}">
                ارتباط با ما
            </a>
            <a href="{{ route('home') }}#pricing" @click="open = false"
               class="mt-2 py-3 px-4 rounded-xl text-sm font-bold text-center text-white bg-sopal-800 hover:bg-sopal-700 transition-colors">
                شروع رایگان
            </a>
        </div>
    </div>
</nav>