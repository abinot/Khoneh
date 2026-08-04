<section id="pricing" class="py-20 sm:py-24 px-4 bg-white">
    <div class="max-w-6xl mx-auto">
        {{-- Section Header --}}
        <div class="text-center mb-16" x-data="{ visible: false }" x-intersect.once="visible = true" x-show="visible" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0">
            <span class="inline-block px-4 py-1.5 rounded-full bg-sopal-100 text-sopal-800 text-sm font-bold mb-4">قیمت‌گذاری</span>
            <h2 class="text-3xl md:text-4xl font-bold text-neutral-900 mb-3">پلنی متناسب با نیاز شما</h2>
            <p class="text-neutral-600 text-lg max-w-2xl mx-auto">ساده و شفاف، بدون هزینه پنهان — از رایگان شروع کنید، هر وقت خواستید ارتقا دهید</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @php
            $plans = [
                [
                    'name' => 'Starter',
                    'price' => 'رایگان',
                    'period' => '',
                    'features' => ['۱ منوی دیجیتال', '۱۰۰ سفارش/ماه', 'پشتیبانی ایمیلی', 'گزارش پایه'],
                    'cta' => 'شروع رایگان',
                    'featured' => false,
                ],
                [
                    'name' => 'Growth',
                    'price' => '۱۹۹,۰۰۰',
                    'period' => 'تومان/ماه',
                    'features' => ['۵ منوی دیجیتال', 'سفارش نامحدود', 'CRM پیشرفته', 'گزارش پیشرفته', 'پشتیبانی تلفنی'],
                    'cta' => 'شروع کن',
                    'featured' => true,
                ],
                [
                    'name' => 'Enterprise',
                    'price' => 'تماس بگیرید',
                    'period' => '',
                    'features' => ['منو نامحدود', 'API اختصاصی', 'چندشعبه‌ای', 'SLA تضمینی', 'پشتیبانی ۲۴/۷', 'آموزش اختصاصی'],
                    'cta' => 'تماس با فروش',
                    'featured' => false,
                ],
            ];
            @endphp

            @foreach($plans as $index => $plan)
            <div class="relative p-8 rounded-2xl border transition-all duration-300 hover:-translate-y-1.5
                        {{ $plan['featured']
                           ? 'bg-sopal-800 text-white border-sopal-700 shadow-2xl shadow-sopal-800/20 md:scale-105'
                           : 'bg-white border-neutral-200 hover:border-sopal-500 hover:shadow-xl hover:shadow-sopal-800/10' }}"
                 x-data="{ visible: false }"
                 x-intersect.once="visible = true"
                 x-show="visible"
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 translate-y-8"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 style="transition-delay: {{ $index * 80 }}ms;">

                @if($plan['featured'])
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-sopal-100 text-sopal-800 text-sm font-bold px-4 py-1 rounded-full shadow-lg whitespace-nowrap">
                    محبوب‌ترین
                </div>
                @endif

                <h3 class="text-2xl font-bold mb-2 {{ $plan['featured'] ? 'text-white' : 'text-neutral-900' }}">
                    {{ $plan['name'] }}
                </h3>
                <p class="{{ $plan['featured'] ? 'text-sopal-200' : 'text-neutral-500' }} text-sm mb-4">{{ $plan['period'] ?: ($plan['featured'] ? 'برای کسب‌وکارهای رشدی' : ($index === 0 ? 'شروع رایگان' : 'برای سازمان‌ها')) }}</p>

                <div class="mb-6">
                    <span class="text-4xl font-extrabold {{ $plan['featured'] ? 'text-white' : 'text-neutral-900' }}">
                        {{ $plan['price'] }}
                    </span>
                    @if($plan['period'])
                    <span class="{{ $plan['featured'] ? 'text-sopal-200' : 'text-neutral-500' }} text-sm">{{ $plan['period'] }}</span>
                    @endif
                </div>

                <ul class="space-y-3 mb-8">
                    @foreach($plan['features'] as $feature)
                    <li class="flex items-center gap-3 {{ $plan['featured'] ? 'text-sopal-100' : 'text-neutral-700' }}">
                        <x-heroicon-o-check class="w-5 h-5 {{ $plan['featured'] ? 'text-sopal-300' : 'text-sopal-700' }} flex-shrink-0" />
                        <span>{{ $feature }}</span>
                    </li>
                    @endforeach
                </ul>

                <a href="#contact"
                   class="block w-full py-3 text-center font-bold rounded-xl transition-all duration-300
                          {{ $plan['featured']
                             ? 'bg-white text-sopal-800 hover:bg-sopal-100'
                             : 'border border-sopal-800 text-sopal-800 hover:bg-sopal-800 hover:text-white' }}">
                    {{ $plan['cta'] }}
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>