<section class="py-20 sm:py-24 px-4 bg-neutral-100 border-y border-neutral-200" aria-labelledby="testimonials-heading">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1.5 rounded-full bg-sopal-100 text-sopal-800 text-sm font-bold mb-4">نظرات مشتریان</span>
            <h2 id="testimonials-heading" class="text-3xl md:text-4xl font-bold text-neutral-900 mb-3">مشتریان ما چه می‌گویند</h2>
            <p class="text-neutral-600 text-lg max-w-2xl mx-auto">ببینید مشتریان ما درباره سوپال چه می‌گویند</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            {{-- Testimonial 1 --}}
            <figure class="relative p-8 rounded-2xl bg-white border border-neutral-200 hover:border-sopal-500 hover:-translate-y-1.5 hover:shadow-xl hover:shadow-sopal-800/10 transition-all duration-300"
                    x-data="{ visible: false }" x-intersect.once="visible = true" x-show="visible"
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 translate-y-8"
                    x-transition:enter-end="opacity-100 translate-y-0">
                <div class="flex mb-4 text-yellow-500" aria-label="امتیاز ۵ از ۵">
                    <x-heroicon-s-star class="w-5 h-5" /><x-heroicon-s-star class="w-5 h-5" /><x-heroicon-s-star class="w-5 h-5" /><x-heroicon-s-star class="w-5 h-5" /><x-heroicon-s-star class="w-5 h-5" />
                </div>
                <blockquote class="text-neutral-700 mb-6 leading-relaxed">
                    "سوپال مدیریت رستوران ما را متحول کرد. منوی دیجیتال باعث شده مشتریان تجربه بهتری داشته باشند."
                </blockquote>
                <figcaption class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-sopal-700 flex items-center justify-center text-white font-bold text-lg">
                        ع
                    </div>
                    <div>
                        <div class="font-bold text-neutral-900">علی محمدی</div>
                        <div class="text-sm text-neutral-500">رستوران سنتی تهران</div>
                    </div>
                </figcaption>
            </figure>

            {{-- Testimonial 2 --}}
            <div class="relative p-8 rounded-2xl bg-white border border-neutral-200 hover:border-sopal-500/60 hover:-translate-y-1.5 hover:shadow-xl hover:shadow-sopal-800/10 transition-all duration-300"
                 x-data="{ visible: false }" x-intersect.once="visible = true" x-show="visible"
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 translate-y-8"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 style="transition-delay: 100ms;">
                <div class="flex mb-4 text-yellow-500" aria-label="امتیاز ۵ از ۵">
                    <x-heroicon-s-star class="w-5 h-5" /><x-heroicon-s-star class="w-5 h-5" /><x-heroicon-s-star class="w-5 h-5" /><x-heroicon-s-star class="w-5 h-5" /><x-heroicon-s-star class="w-5 h-5" />
                </div>
                <blockquote class="text-neutral-700 mb-6 leading-relaxed">
                    "به عنوان یک دفتر حقوقی، نیاز به سیستم CRM قوی داشتیم. سوپال تمام نیازهای ما را برآورده کرد."
                </blockquote>
                <figcaption class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-sopal-700 flex items-center justify-center text-white font-bold text-lg">
                        ز
                    </div>
                    <div>
                        <div class="font-bold text-neutral-900">زهرا کریمی</div>
                        <div class="text-sm text-neutral-500">دفتر حقوقی کریمی و شرکا</div>
                    </div>
                </figcaption>
            </div>

            {{-- Testimonial 3 --}}
            <div class="relative p-8 rounded-2xl bg-white border border-neutral-200 hover:border-sopal-500/60 hover:-translate-y-1.5 hover:shadow-xl hover:shadow-sopal-800/10 transition-all duration-300"
                 x-data="{ visible: false }" x-intersect.once="visible = true" x-show="visible"
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 translate-y-8"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 style="transition-delay: 200ms;">
                <div class="flex mb-4 text-yellow-500" aria-label="امتیاز ۵ از ۵">
                    <x-heroicon-s-star class="w-5 h-5" /><x-heroicon-s-star class="w-5 h-5" /><x-heroicon-s-star class="w-5 h-5" /><x-heroicon-s-star class="w-5 h-5" /><x-heroicon-s-star class="w-5 h-5" />
                </div>
                <blockquote class="text-neutral-700 mb-6 leading-relaxed">
                    "پشتیبانی فارسی عالیه. هر سوالی داشتم سریع جواب گرفتم. چندمستاجری برای شعب عالی کار می‌کنه."
                </blockquote>
                <figcaption class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-sopal-700 flex items-center justify-center text-white font-bold text-lg">
                        ح
                    </div>
                    <div>
                        <div class="font-bold text-neutral-900">حسن رضایی</div>
                        <div class="text-sm text-neutral-500">فست فود پیتزا پال</div>
                    </div>
                </figcaption>
            </div>
        </div>
    </div>
</section>