<section id="contact" class="py-20 sm:py-24 px-4 bg-neutral-50">
    <div class="max-w-2xl mx-auto">
        <div class="text-center mb-14">
            <span class="inline-block px-4 py-1.5 rounded-full bg-sopal-100 text-sopal-800 text-sm font-bold mb-4">تماس با ما</span>
            <h2 class="text-3xl md:text-4xl font-bold text-neutral-900 mb-3">سوالی داری؟ بگو، جواب می‌دهیم</h2>
            <p class="text-neutral-600 text-lg">معمولاً ظرف ۲۴ ساعت پاسخ می‌دهیم</p>
        </div>

        <form action="{{ route('contact.store') }}" method="POST" class="space-y-6 bg-white border border-neutral-200 rounded-3xl p-8 sm:p-10 shadow-sm">
            @csrf

            @if(session('success'))
            <div class="bg-green-50 border border-green-300 text-green-700 p-4 rounded-xl text-center"
                 x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl text-center" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-neutral-800 text-sm font-bold mb-2" for="contact-name">نام <span class="text-sopal-700">*</span></label>
                    <input id="contact-name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name"
                           class="w-full bg-white border border-neutral-200 rounded-xl px-4 py-3 text-neutral-900
                                  focus:border-sopal-700 focus:ring-2 focus:ring-sopal-700/20 transition-all
                                  placeholder:text-neutral-400"
                           placeholder="نام شما">
                </div>
                <div>
                    <label class="block text-neutral-800 text-sm font-bold mb-2" for="contact-email">ایمیل <span class="text-sopal-700">*</span></label>
                    <input id="contact-email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                           class="w-full bg-white border border-neutral-200 rounded-xl px-4 py-3 text-neutral-900
                                  focus:border-sopal-700 focus:ring-2 focus:ring-sopal-700/20 transition-all
                                  placeholder:text-neutral-400"
                           placeholder="email@example.com">
                </div>
            </div>

            <div>
                <label class="block text-neutral-800 text-sm font-bold mb-2" for="contact-phone">تلفن (اختیاری)</label>
                <input id="contact-phone" type="tel" name="phone" value="{{ old('phone') }}" autocomplete="tel"
                       class="w-full bg-white border border-neutral-200 rounded-xl px-4 py-3 text-neutral-900
                              focus:border-sopal-700 focus:ring-2 focus:ring-sopal-700/20 transition-all
                              placeholder:text-neutral-400"
                       placeholder="۰۹۱۲۳۴۵۶۷۸۹">
            </div>

            <div>
                <label class="block text-neutral-800 text-sm font-bold mb-2" for="contact-type">نوع کسب‌وکار <span class="text-sopal-700">*</span></label>
                <select id="contact-type" name="business_type" required
                        class="w-full bg-white border border-neutral-200 rounded-xl px-4 py-3 text-neutral-900
                               focus:border-sopal-700 focus:ring-2 focus:ring-sopal-700/20 transition-all">
                    <option value="" class="bg-white">انتخاب کنید</option>
                    <option value="restaurant" class="bg-white" @selected(old('business_type') === 'restaurant')>رستوران / فست‌فود</option>
                    <option value="law_office" class="bg-white" @selected(old('business_type') === 'law_office')>دفتر حقوقی</option>
                    <option value="other" class="bg-white" @selected(old('business_type') === 'other')>سایر</option>
                </select>
            </div>

            <div>
                <label class="block text-neutral-800 text-sm font-bold mb-2" for="contact-message">پیام <span class="text-sopal-700">*</span></label>
                <textarea id="contact-message" name="message" rows="4" required
                          class="w-full bg-white border border-neutral-200 rounded-xl px-4 py-3 text-neutral-900
                                 focus:border-sopal-700 focus:ring-2 focus:ring-sopal-700/20 transition-all
                                 placeholder:text-neutral-400 resize-none"
                          placeholder="پیام شما...">{{ old('message') }}</textarea>
            </div>

            <button type="submit"
                    class="w-full bg-sopal-800 hover:bg-sopal-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-sopal-800/20 transition-all duration-300 hover:-translate-y-0.5">
                ارسال پیام
            </button>
        </form>
    </div>
</section>