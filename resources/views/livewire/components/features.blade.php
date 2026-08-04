<section id="features" class="py-20 sm:py-24 px-4 bg-neutral-50">
    <div class="max-w-6xl mx-auto">
        {{-- Section Header --}}
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1.5 rounded-full bg-sopal-100 text-sopal-800 text-sm font-bold mb-4">امکانات</span>
            <h2 class="text-3xl md:text-4xl font-bold text-neutral-900 mb-3">همه چیزی که نیاز داری، یک‌جا</h2>
            <p class="text-neutral-600 text-lg max-w-2xl mx-auto">ابزارهایی که کسب‌وکار شما را به سطح بعدی می‌برند</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            @php
            $features = [
                ['icon' => 'qr-code', 'title' => 'منوی دیجیتال', 'desc' => 'با QR Code منوی آنلاین بساز، مشتری با موبایلش سفارش بده'],
                ['icon' => 'shopping-cart', 'title' => 'سفارش آنلاین', 'desc' => 'سفارش آنلاین بدون واسطه، مستقیم از مشتری به آشپزخونه'],
                ['icon' => 'users', 'title' => 'مدیریت مشتریان', 'desc' => 'CRM ساده، مشتریات رو بشناس، باهاشون ارتباط برقرار کن'],
                ['icon' => 'chart-bar', 'title' => 'گزارش‌فروش', 'desc' => 'آمار فروش، پرفروش‌ترین اقلام، ساعات شلوغی'],
                ['icon' => 'building-office', 'title' => 'چندمستاجری', 'desc' => 'یه پنل، چند شعبه، مدیریت متمرکز'],
                ['icon' => 'language', 'title' => 'پشتیبانی فارسی', 'desc' => 'RTL کامل، فونت فارسی، بدون مشکل راست به چپ'],
            ];
            @endphp

            @foreach($features as $index => $feature)
            <article class="group relative p-7 rounded-2xl bg-white border border-neutral-200
                        hover:border-sopal-500 hover:shadow-xl hover:shadow-sopal-800/10 hover:-translate-y-1.5
                        transition-all duration-300"
                 x-data="{ visible: false }"
                 x-intersect="visible = true"
                 x-show="visible"
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 translate-y-8"
                 x-transition:enter-end="opacity-100 translate-y-0">
                <div class="w-12 h-12 rounded-xl bg-sopal-400/30 flex items-center justify-center mb-4
                            group-hover:bg-sopal-800/10 group-hover:scale-110 transition-all duration-300">
                    <x-dynamic-component :component="'heroicon-o-' . $feature['icon']" class="w-6 h-6 text-sopal-800" />
                </div>
                <h3 class="text-xl font-bold mb-2 text-neutral-900 group-hover:text-sopal-800 transition-colors">{{ $feature['title'] }}</h3>
                <p class="text-neutral-600 text-sm leading-relaxed">{{ $feature['desc'] }}</p>
            </article>
            @endforeach
        </div>
    </div>
</section>