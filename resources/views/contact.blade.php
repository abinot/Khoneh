<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ارتباط با ما | سوپال — فناوری در خدمت انسان</title>
<meta name="description" content="با سوپال در تماس باشید — سوال، پیشنهاد یا همکاری. معمولاً ظرف ۲۴ ساعت پاسخ می‌دهیم.">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rastikerdar/sahel-font@v3.4.0/dist/font-face.css">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script>
tailwind.config = {
  theme: {
    extend: {
      colors: {
        brand: { 900:'#0d4145', 800:'#16656b', 700:'#2b969e', 600:'#5ab2b8', 500:'#7cccd1', 400:'#b7dee0' },
        sea: { DEFAULT:'#00939d', dark:'#0d3e46', light:'#d6f7ff' },
        ink: { 900:'#111827', 800:'#1F2937' },
        canvas: { 50:'#FAFCFC', 100:'#F4F8F8', 200:'#E9F2F2' }
      },
      fontFamily: { sahel: ['Sahel','Tahoma','Arial','sans-serif'] }
    }
  }
}
</script>
<style>
  *,*::before,*::after{box-sizing:border-box}
  *{font-family:'Sahel',Tahoma,Arial,sans-serif}
  html{scroll-behavior:smooth}
  body{background:#FAFCFC;color:#111827}
  .tide{position:relative;height:2px;width:44px;border-radius:2px;background:linear-gradient(90deg,#00939d,#7cccd1);overflow:hidden}
  .tide::after{content:'';position:absolute;inset:0;background:linear-gradient(90deg,transparent,rgba(255,255,255,.9),transparent);animation:tideMove 2.8s ease-in-out infinite}
  @keyframes tideMove{0%{transform:translateX(-100%)}100%{transform:translateX(100%)}}
  .tide-lg{width:64px;height:3px}
  .reveal{opacity:0;transform:translateY(24px);transition:opacity .6s cubic-bezier(.22,1,.36,1),transform .6s cubic-bezier(.22,1,.36,1)}
  .reveal.in{opacity:1;transform:translateY(0)}
  .nav-glass{
    background:rgba(250,252,252,.55);
    backdrop-filter:blur(20px) saturate(1.5);
    -webkit-backdrop-filter:blur(20px) saturate(1.5);
    border-bottom:1px solid rgba(17,24,39,.05);
    transition:background .3s ease,border-color .3s ease,box-shadow .3s ease;
  }
  .nav-scrolled{
    background:rgba(250,252,252,.92) !important;
    border-bottom-color:rgba(17,24,39,.07);
    box-shadow:0 8px 30px rgba(13,65,69,.06);
  }
  .nav-link{
    position:relative;color:#1F2937;font-size:14px;font-weight:500;
    padding:6px 2px;
    transition:color .2s ease;
  }
  .nav-link::after{
    content:'';position:absolute;bottom:2px;right:0;
    width:0;height:2px;border-radius:1px;background:#00939d;
    transition:width .3s cubic-bezier(.22,1,.36,1);
  }
  .nav-link:hover{color:#16656b}
  .nav-link:hover::after{width:100%}
  .nav-link:focus-visible{outline:2px solid #00939d;outline-offset:2px;border-radius:2px}

  /* nav CTA button — sits at the far side of the header */
  .nav-cta{
    display:inline-flex;align-items:center;gap:6px;
    padding:8px 18px;border-radius:999px;
    background:#0d4145;color:#fff;
    font-size:13.5px;font-weight:500;
    box-shadow:0 2px 10px rgba(13,65,69,.18);
    transition:background .25s ease,transform .3s cubic-bezier(.34,1.56,.64,1),box-shadow .25s ease;
  }
  .nav-cta .nav-cta-icon{transition:transform .3s cubic-bezier(.34,1.56,.64,1)}
  .nav-cta:hover{
    background:#16656b;
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(13,65,69,.3);
  }
  .nav-cta:hover .nav-cta-icon{transform:translateX(-3px)}
  .nav-cta:active{transform:translateY(0)}
  .nav-cta:focus-visible{outline:2px solid #7cccd1;outline-offset:3px}

  .btn{display:inline-flex;align-items:center;justify-content:center;border-radius:9px;font-weight:500;font-size:14.5px;transition:all .25s cubic-bezier(.22,1,.36,1);white-space:nowrap}
  .btn-primary{background:#0d4145;color:#fff;padding:.85rem 2rem;box-shadow:0 2px 12px rgba(13,65,69,.25)}
  .btn-primary:hover{background:#16656b;transform:translateY(-2px);box-shadow:0 8px 24px rgba(13,65,69,.3)}
  .btn-primary:focus-visible{outline:2px solid #7cccd1;outline-offset:3px}
  .input{border:1.5px solid #E9F2F2;background:#fff;border-radius:10px;padding:.8rem 1rem;font-size:14px;color:#111827;width:100%;transition:border-color .2s,box-shadow .2s}
  .input:focus{outline:none;border-color:#00939d;box-shadow:0 0 0 3px rgba(0,147,157,.12)}
  .input::placeholder{color:#9CA3AF}
  .skip-link{position:absolute;right:16px;top:-60px;z-index:100;background:#0d4145;color:#fff;padding:12px 20px;border-radius:8px;font-weight:700;font-size:14px;transition:top .25s ease}
  .skip-link:focus{top:12px;outline:2px solid #7cccd1;outline-offset:2px}
  [x-cloak]{display:none !important}
  .footer-link{transition:color .2s ease,padding-right .25s ease}
  .footer-link:hover{color:#b7dee0;padding-right:6px}
  .social{display:flex;align-items:center;justify-content:center;width:36px;height:36px;border-radius:8px;background:rgba(255,255,255,.06);transition:background .2s,transform .3s cubic-bezier(.34,1.56,.64,1)}
  .social:hover{background:rgba(0,147,157,.2);transform:translateY(-3px)}
  @media (prefers-reduced-motion:reduce){
    .reveal,.reveal-scale,.tide::after{animation:none !important;transition:none !important}
    .reveal,.reveal-scale{opacity:1;transform:none}
  }
</style>
</head>
<body class="font-sahel antialiased">

<a href="#main" class="skip-link">پرش به محتوا</a>

<nav id="nav" class="nav-glass fixed top-0 inset-x-0 z-50" role="navigation" aria-label="منوی اصلی" x-data="{open:false}">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <div class="flex items-center justify-between h-16">
      <a href="/" class="flex items-center gap-2.5" aria-label="سوپال - صفحه اصلی">
        <span class="w-8 h-8 rounded-lg bg-brand-900 flex items-center justify-center">
          <svg class="w-4.5 h-4.5 text-brand-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"><path d="M2 17c1.5 1.5 3 1.5 4.5 0s3-1.5 4.5 0 3 1.5 4.5 0 3-1.5 4.5 0"/><path d="M2 21c1.5 1.5 3 1.5 4.5 0s3-1.5 4.5 0 3 1.5 4.5 0 3-1.5 4.5 0"/><path d="M12 13V4M9 6l3-3 3 3"/></svg>
        </span>
        <span class="font-bold text-[15px] text-ink-900">سوپال</span>
      </a>
      <div class="hidden md:flex items-center gap-8">
        <a href="/" class="nav-link">خانه</a>
        <a href="/#services" class="nav-link">خدمات</a>
        <a href="/#portfolio" class="nav-link">نمونه‌کار</a>
        <a href="/about" class="nav-link">درباره ما</a>
        <a href="/contact" class="nav-link">ارتباط</a>
      </div>
      <div class="flex items-center gap-2">
        <a href="/contact" class="nav-cta">
          آغاز گفتگو
          <svg class="nav-cta-icon w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
        </a>
        <button type="button" @click="open=!open" class="md:hidden p-2 rounded-lg text-ink-900 hover:bg-canvas-100" :aria-expanded="open.toString()" aria-label="منوی موبایل">
          <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"/></svg>
          <svg x-show="open" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>
    </div>
    <div x-show="open" x-cloak x-transition class="md:hidden pb-4 border-t border-canvas-200/70">
      <div class="pt-3 flex flex-col gap-1">
        <a href="/" @click="open=false" class="nav-link">خانه</a>
        <a href="/#services" @click="open=false" class="nav-link">خدمات</a>
        <a href="/#portfolio" @click="open=false" class="nav-link">نمونه‌کار</a>
        <a href="/about" @click="open=false" class="nav-link">درباره ما</a>
        <a href="/contact" @click="open=false" class="nav-link">ارتباط</a>
        <a href="/contact" @click="open=false" class="mt-2 inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-full bg-brand-900 text-white text-[14px] font-medium">آغاز گفتگو</a>
      </div>
    </div>
  </div>
</nav>

<main id="main" class="pt-[68px]">

<!-- HERO -->
<section class="py-16 md:py-20">
  <div class="max-w-3xl mx-auto px-5 text-center">
    <div class="reveal inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-brand-400/15 border border-brand-400/30 text-brand-800 text-xs mb-7">
      <span class="tide !w-3"></span> ارتباط با ما
    </div>
    <h1 class="reveal text-3xl sm:text-4xl md:text-5xl font-bold text-ink-900 mb-5 leading-tight">بیایید گفتگو کنیم</h1>
    <p class="reveal text-[15px] sm:text-base text-ink-800/70 leading-relaxed max-w-xl mx-auto" style="transition-delay:.06s">
      اگر پروژه‌ای در ذهن دارید یا می‌خواهید درباره راهکارهای ما بیشتر بدانید، خوشحال می‌شویم صدای شما را بشنویم. معمولاً ظرف ۲۴ ساعت پاسخ می‌دهیم.
    </p>
  </div>
</section>

<!-- CONTACT -->
<section class="py-12 md:py-16">
  <div class="max-w-5xl mx-auto px-5 sm:px-8">
    <div class="grid lg:grid-cols-2 gap-12 items-start reveal">

      <!-- Info -->
      <div>
        <div class="tide tide-lg mb-6"></div>
        <h2 class="text-2xl font-bold text-ink-900 mb-6">راه‌های ارتباط</h2>
        <div class="space-y-5">
          <a href="mailto:hello@sopal.ir" class="flex items-center gap-4 p-5 rounded-xl border border-canvas-200 bg-white hover:border-sea transition-colors">
            <span class="w-11 h-11 rounded-lg bg-brand-400/25 flex items-center justify-center flex-shrink-0">
              <svg class="w-5 h-5 text-brand-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </span>
            <span>
              <span class="block text-[12.5px] text-ink-800/50 mb-0.5">ایمیل</span>
              <span class="block text-[14px] font-bold text-ink-900" dir="ltr">hello@sopal.ir</span>
            </span>
          </a>
          <a href="tel:+987712345678" class="flex items-center gap-4 p-5 rounded-xl border border-canvas-200 bg-white hover:border-sea transition-colors">
            <span class="w-11 h-11 rounded-lg bg-brand-400/25 flex items-center justify-center flex-shrink-0">
              <svg class="w-5 h-5 text-brand-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            </span>
            <span>
              <span class="block text-[12.5px] text-ink-800/50 mb-0.5">تلفن</span>
              <span class="block text-[14px] font-bold text-ink-900" dir="ltr">+98 771 234 5678</span>
            </span>
          </a>
          <div class="flex items-center gap-4 p-5 rounded-xl border border-canvas-200 bg-white">
            <span class="w-11 h-11 rounded-lg bg-brand-400/25 flex items-center justify-center flex-shrink-0">
              <svg class="w-5 h-5 text-brand-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
            </span>
            <span>
              <span class="block text-[12.5px] text-ink-800/50 mb-0.5">آدرس</span>
              <span class="block text-[14px] font-bold text-ink-900">بوشهر، ایران — کنار خلیج فارس</span>
            </span>
          </div>
        </div>
      </div>

      <!-- Form -->
      <div>
        <div class="card rounded-2xl p-7 sm:p-8">
          <h2 class="text-lg font-bold text-ink-900 mb-1">فرم تماس</h2>
          <p class="text-[13px] text-ink-800/55 mb-6">فیلدهای ستاره‌دار الزامی هستند.</p>

          @if(session('success'))
          <div class="mb-5 p-4 rounded-xl bg-green-50 border border-green-200 text-green-800 text-[14px]" x-data="{show:true}" x-show="show" x-init="setTimeout(()=>show=false,6000)">
            {{ session('success') }}
          </div>
          @endif

          @if($errors->any())
          <div class="mb-5 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-[14px]">
            <ul class="space-y-1">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
            @csrf
            <div class="grid sm:grid-cols-2 gap-5">
              <div>
                <label for="name" class="block text-[13px] font-bold text-ink-900 mb-2">نام و نام خانوادگی <span class="text-brand-700">*</span></label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required placeholder="نام شما" class="input">
              </div>
              <div>
                <label for="email" class="block text-[13px] font-bold text-ink-900 mb-2">ایمیل <span class="text-brand-700">*</span></label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="email@example.com" class="input">
              </div>
            </div>
            <div>
              <label for="phone" class="block text-[13px] font-bold text-ink-900 mb-2">تلفن (اختیاری)</label>
              <input id="phone" type="tel" name="phone" value="{{ old('phone') }}" placeholder="۰۹۱۲۳۴۵۶۷۸۹" class="input">
            </div>
            <div>
              <label for="business_type" class="block text-[13px] font-bold text-ink-900 mb-2">نوع کسب‌وکار <span class="text-brand-700">*</span></label>
              <select id="business_type" name="business_type" required class="input appearance-none bg-white">
                <option value="" class="bg-white">انتخاب کنید</option>
                <option value="restaurant" class="bg-white" @selected(old('business_type') === 'restaurant')>رستوران / فست‌فود</option>
                <option value="law_office" class="bg-white" @selected(old('business_type') === 'law_office')>دفتر حقوقی</option>
                <option value="other" class="bg-white" @selected(old('business_type') === 'other')>سایر</option>
              </select>
            </div>
            <div>
              <label for="message" class="block text-[13px] font-bold text-ink-900 mb-2">پیام <span class="text-brand-700">*</span></label>
              <textarea id="message" name="message" rows="5" required placeholder="پیام شما..." class="input resize-none">{{ old('message') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary w-full">ارسال پیام</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>

</main>

<!-- FOOTER -->
<footer class="bg-ink-900 text-white pt-16 pb-9 relative">
  <div class="absolute top-0 inset-x-0 tide tide-lg mx-auto" style="opacity:.6"></div>
  <div class="max-w-6xl mx-auto px-5 sm:px-8">
    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-10">
      <div class="sm:col-span-2 md:col-span-1">
        <div class="flex items-center gap-2.5 mb-4">
          <span class="w-9 h-9 rounded-lg bg-brand-800/40 flex items-center justify-center">
            <svg class="w-5 h-5 text-brand-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"><path d="M2 17c1.5 1.5 3 1.5 4.5 0s3-1.5 4.5 0 3 1.5 4.5 0 3-1.5 4.5 0"/><path d="M2 21c1.5 1.5 3 1.5 4.5 0s3-1.5 4.5 0 3 1.5 4.5 0 3-1.5 4.5 0"/><path d="M12 13V4M9 6l3-3 3 3"/></svg>
          </span>
          <span class="font-bold text-[15px]">سوپال</span>
        </div>
        <p class="text-white/50 leading-relaxed text-[13px] mb-5 max-w-xs">راهکارهای نرم‌افزاری از کنار خلیج فارس. فناوری در خدمت انسان.</p>
        <div class="flex items-center gap-2.5">
          <a href="https://t.me/sopal" class="social text-white/50" aria-label="تلگرام" target="_blank" rel="noopener noreferrer">
            <svg class="w-[18px] h-[18px]" fill="currentColor" viewBox="0 0 24 24"><path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/></svg>
          </a>
          <a href="mailto:hello@sopal.ir" class="social text-white/50" aria-label="ایمیل">
            <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
          </a>
          <a href="tel:+987712345678" class="social text-white/50" aria-label="تلفن">
            <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
          </a>
        </div>
      </div>
      <div>
        <h4 class="text-[12px] font-bold text-white/70 mb-4 tracking-wide">دسترسی سریع</h4>
        <ul class="space-y-2.5">
          <li><a href="/" class="footer-link text-white/50 text-[13px]">خانه</a></li>
          <li><a href="/#services" class="footer-link text-white/50 text-[13px]">خدمات</a></li>
          <li><a href="/#portfolio" class="footer-link text-white/50 text-[13px]">نمونه‌کار</a></li>
          <li><a href="/about" class="footer-link text-white/50 text-[13px]">درباره ما</a></li>
          <li><a href="/contact" class="footer-link text-white/50 text-[13px]">ارتباط</a></li>
        </ul>
      </div>
      <div>
        <h4 class="text-[12px] font-bold text-white/70 mb-4 tracking-wide">ارتباط</h4>
        <ul class="space-y-2.5">
          <li class="text-white/50 text-[13px]">بوشهر، ایران</li>
          <li><a href="mailto:hello@sopal.ir" class="footer-link text-white/50 text-[13px]">hello@sopal.ir</a></li>
          <li><a href="tel:+987712345678" class="footer-link text-white/50 text-[13px]">۰۷-۱۲۳۴۵۶۷۸</a></li>
        </ul>
      </div>
    </div>
    <div class="border-t border-white/[.08] mt-11 pt-7 flex flex-col sm:flex-row items-center justify-between gap-3">
      <p class="text-white/35 text-[12px]">© ۱۴۰۳ سوپال. تمامی حقوق محفوظ است.</p>
      <p class="text-white/25 text-[11px]">ساخته شده با آرامش، از کنار خلیج فارس</p>
    </div>
  </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function(){
  var obs = new IntersectionObserver(function(entries){
    entries.forEach(function(e){
      if(e.isIntersecting){ e.target.classList.add('in'); obs.unobserve(e.target); }
    });
  }, { rootMargin:'0px 0px -60px 0px', threshold:.06 });
  document.querySelectorAll('.reveal').forEach(function(el){ obs.observe(el); });
  var nav = document.getElementById('nav');
  window.addEventListener('scroll', function(){
    nav.classList.toggle('nav-scrolled', window.scrollY > 12);
  }, { passive:true });
});
</script>
</body>
</html>