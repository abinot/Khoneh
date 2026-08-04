<section class="py-16 bg-sopal-800 border-y border-sopal-700/40" wire:poll.60s aria-label="آمار">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div x-data="{ count: 0 }" x-intersect.once="animateCount(500, 2000)" class="p-4">
                <div class="text-4xl md:text-5xl font-extrabold text-white tabular-nums" x-text="count + '+'">0+</div>
                <div class="text-sopal-200 mt-2">رستوران فعال</div>
            </div>
            <div x-data="{ count: 0 }" x-intersect.once="animateCount(10000, 2500)" class="p-4">
                <div class="text-4xl md:text-5xl font-extrabold text-white tabular-nums" x-text="count.toLocaleString('fa-IR')">۰</div>
                <div class="text-sopal-200 mt-2">سفارش ثبت‌شده</div>
            </div>
            <div x-data="{ count: 0 }" x-intersect.once="animateCount(2000, 2000)" class="p-4">
                <div class="text-4xl md:text-5xl font-extrabold text-white tabular-nums" x-text="count.toLocaleString('fa-IR')">۰</div>
                <div class="text-sopal-200 mt-2">منوی دیجیتال</div>
            </div>
            <div class="p-4">
                <div class="text-4xl md:text-5xl font-extrabold text-white tabular-nums">٪۹۹٫۹</div>
                <div class="text-sopal-200 mt-2">آپتایم</div>
            </div>
        </div>
    </div>

    <script>
        function animateCount(target, duration) {
            return function() {
                const start = performance.now();
                const animate = (now) => {
                    const progress = Math.min((now - start) / duration, 1);
                    this.count = Math.floor(progress * target);
                    if (progress < 1) requestAnimationFrame(animate);
                };
                requestAnimationFrame(animate);
            };
        }
    </script>
</section>