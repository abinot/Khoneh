<section class="py-16 bg-white border-y border-neutral-200">
    <div class="max-w-2xl mx-auto px-4 text-center">
        <h3 class="text-2xl font-bold mb-3 text-neutral-900">خبرنامه سوپال</h3>
        <p class="text-neutral-600 mb-6">هر هفته نکات جدید، آپدیت‌ها و تخفیف‌ها رو بگیر</p>

        @if(session('newsletter_success'))
        <div class="bg-green-50 border border-green-300 text-green-700 p-4 rounded-xl text-center mb-6">
            {{ session('newsletter_success') }}
        </div>
        @endif

        <form action="{{ route('newsletter.store') }}" method="POST" class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
            @csrf
            <input type="email" name="email" required
                   class="flex-1 bg-white border border-neutral-200 rounded-xl px-4 py-3 text-neutral-900
                          focus:border-sopal-700 focus:ring-2 focus:ring-sopal-700/20 transition-all
                          placeholder:text-neutral-400"
                   placeholder="ایمیلت رو وارد کن">
            <button type="submit"
                    class="bg-sopal-800 hover:bg-sopal-700 text-white font-bold px-6 py-3 rounded-xl shadow-lg shadow-sopal-800/15 transition-all duration-300 hover:-translate-y-0.5">
                عضویت
            </button>
        </form>
        @error('email')
        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
        @enderror
    </div>
</section>