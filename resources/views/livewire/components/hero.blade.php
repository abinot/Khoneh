<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Background Gradient Animation (deep brand, hero stays dark for contrast with white text) -->
    <div class="absolute inset-0 bg-gradient-to-br from-sopal-800 via-sopal-900 to-sopal-700 animate-gradient-x"
         style="background-size: 200% 200%;" aria-hidden="true"></div>

    <!-- Floating Particles (Alpine.js) -->
    <div class="absolute inset-0" x-data="{ particles: 22 }" aria-hidden="true">
        <template x-for="i in particles" :key="i">
            <div class="absolute w-1.5 h-1.5 bg-white/25 rounded-full animate-float"
                 :style="`left: ${Math.random() * 100}%; top: ${Math.random() * 100}%; animation-delay: ${Math.random() * 6}s;`">
            </div>
        </template>
    </div>

    <!-- Content -->
    <div class="relative z-10 text-center px-4 max-w-4xl mx-auto pt-16">
        {{-- Badge --}}
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 border border-white/20 text-sopal-50/90 text-sm font-medium mb-8 animate-fade-in-up">
            <span class="w-2 h-2 bg-sopal-200 rounded-full animate-pulse"></span>
            نسخه ۱.۰ منتشر شد — برای رستوران‌ها و دفترهای حقوقی
        </div>

        <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold mb-6 animate-fade-in-up leading-tight">
            <span class="bg-gradient-to-r from-white to-sopal-100 bg-clip-text text-transparent">
                منوها، سفارش‌ها، مشتری‌ها
            </span>
            <br>
            <span class="text-sopal-50">— یک داشبورد</span>
        </h1>
        <p class="text-xl md:text-2xl text-sopal-100/80 mb-10 animate-fade-in-up animation-delay-200 leading-relaxed">
            چندمستاجری ساده برای رستوران‌ها و دفترهای حقوقی — منوی دیجیتال، سفارش آنلاین و CRM در یک پنل
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-in-up animation-delay-400">
            <a href="{{ route('home') }}#pricing"
               class="group inline-flex items-center justify-center gap-2 px-8 py-4 text-lg font-bold text-sopal-900 bg-white hover:bg-white/90 rounded-xl shadow-xl shadow-black/10 hover:shadow-2xl hover:-translate-y-0.5 hover:scale-105 transition-all duration-300">
                شروع رایگان
                <x-heroicon-o-arrow-right class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" />
            </a>
            <a href="{{ route('demo') }}"
               class="inline-flex items-center justify-center gap-2 px-8 py-4 text-lg font-bold text-white border-2 border-white/70 hover:bg-white/10 hover:border-white hover:-translate-y-0.5 rounded-xl transition-all duration-300">
                <x-heroicon-o-play-circle class="w-5 h-5" />
                مشاهده دمو
            </a>
        </div>

        {{-- Trust chips --}}
        <div class="flex flex-wrap items-center justify-center gap-3 mt-10 animate-fade-in-up animation-delay-600">
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/15 text-sopal-50/90 text-sm">
                <x-heroicon-o-check-circle class="w-4 h-4 text-sopal-200" />
                شروع رایگان، بدون کارت اعتباری
            </span>
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/15 text-sopal-50/90 text-sm">
                <x-heroicon-o-language class="w-4 h-4 text-sopal-200" />
                کاملاً فارسی و RTL
            </span>
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/15 text-sopal-50/90 text-sm">
                <x-heroicon-o-lifebuoy class="w-4 h-4 text-sopal-200" />
                پشتیبانی فارسی ۷ روز هفته
            </span>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <a href="{{ route('home') }}#features" class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-1.5 text-sopal-100/70 hover:text-sopal-50 transition-colors" aria-label="اسکرول به پایین">
        <span class="text-sm">بیشتر کشف کنید</span>
        <svg class="w-6 h-6 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </a>
</section>