<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>درباره ما | سوپال — فناوری در خدمت انسان</title>
<meta name="description" content="داستان سوپال — گروهی از انسان‌های آرام و اندیشمند در کنار خلیج فارس. فناوری در خدمت انسان.">
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
  .reveal-scale{opacity:0;transform:translateY(18px) scale(.97);transition:opacity .6s cubic-bezier(.22,1,.36,1),transform .6s cubic-bezier(.22,1,.36,1)}
  .reveal-scale.in{opacity:1;transform:translateY(0) scale(1)}
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
  .btn-secondary{border:1.5px solid #d8e6e6;color:#0d4145;background:#fff;padding:.85rem 2rem}
  .btn-secondary:hover{border-color:#00939d;background:#f4f8f8;transform:translateY(-2px)}
  .btn-secondary:focus-visible{outline:2px solid #00939d;outline-offset:3px}
  .img-zoom-wrap{overflow:hidden;border-radius:14px;position:relative}
  .img-zoom{transition:transform .7s cubic-bezier(.22,1,.36,1)}
  .img-zoom-wrap:hover .img-zoom{transform:scale(1.05)}
  .skip-link{position:absolute;right:16px;top:-60px;z-index:100;background:#0d4145;color:#fff;padding:12px 20px;border-radius:8px;font-weight:700;font-size:14px;transition:top .25s ease}
  .skip-link:focus{top:12px;outline:2px solid #7cccd1;outline-offset:2px}
  [x-cloak]{display:none !important}
  .footer-link{transition:color .2s ease,padding-right .25s ease}
  .footer-link:hover{color:#b7dee0;padding-right:6px}
  .social{display:flex;align-items:center;justify-content:center;width:36px;height:36px;border-radius:8px;background:rgba(255,255,255,.06);transition:background .2s,transform .3s cubic-bezier(.34,1.56,.64,1)}
  .social:hover{background:rgba(0,147,157,.2);transform:translateY(-3px)}
  @media (prefers-reduced-motion:reduce){
    .reveal,.reveal-scale,.card,.img-zoom,.btn,.tide::after{animation:none !important;transition:none !important}
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
<section class="relative py-24 md:py-32 overflow-hidden">
  <div class="max-w-4xl mx-auto px-5 text-center">
    <div class="reveal inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-brand-400/15 border border-brand-400/30 text-brand-800 text-xs mb-7">
      <span class="tide !w-3"></span> داستان ما
    </div>
    <h1 class="reveal text-3xl sm:text-4xl md:text-5xl font-bold text-ink-900 mb-5 leading-tight">از کنار خلیج فارس، برای مسئله‌های بزرگ</h1>
    <p class="reveal text-[15px] sm:text-base text-ink-800/70 leading-[1.85] max-w-2xl mx-auto" style="transition-delay:.06s">
      سوپال یک شرکت فناوری معمولی نیست. ما گروهی از انسان‌های آرام و اندیشمند هستیم که باور داریم مدیریت رستوران و دفتر حقوقی نباید پیچیده باشد.
    </p>
  </div>
</section>

<!-- TIMELINE -->
<section class="py-16 md:py-20">
  <div class="max-w-4xl mx-auto px-5 sm:px-8">
    <div class="text-center mb-14 reveal">
      <div class="tide tide-lg mx-auto mb-6"></div>
      <h2 class="text-2xl sm:text-3xl font-bold text-ink-900">مسیر ما</h2>
    </div>
    <div class="relative pr-14 sm:pr-16">
      <div class="proc-line" aria-hidden="true" style="position:absolute;top:0;bottom:0;right:23px;width:2px;background:linear-gradient(180deg,#00939d,#7cccd1 60%,transparent)"></div>
      @php
      $timeline = [
        ['year' => '۱۴۰۱', 'title' => 'شروع', 'desc' => 'مشکل را دیدیم — رستوران‌ها هنوز با کاغذ منو می‌دهند، دفترهای حقوقی با Excel پرونده مدیریت می‌کنند.'],
        ['year' => '۱۴۰۲', 'title' => 'اولین نسخه', 'desc' => 'اولین نسخه سوپال را ساختیم. منوی دیجیتال با QR Code. ساده، سریع، فارسی.'],
        ['year' => '۱۴۰۳', 'title' => 'رشد', 'desc' => 'بیش از ۵۰۰ رستوران و دفتر حقوقی از سوپال استفاده می‌کنند. CRM، گزارش فروش، چندمستاجری.'],
      ];
      @endphp
      @foreach($timeline as $item)
      <div class="relative flex items-start gap-5 pb-12 reveal">
        <div class="proc-dot mt-1.5" style="width:14px;height:14px;border-radius:50%;background:#00939d;box-shadow:0 0 0 5px rgba(0,147,157,.15);flex-shrink:0"></div>
        <div>
          <span class="inline-block px-2.5 py-0.5 bg-brand-400/20 text-brand-800 text-[11px] font-bold rounded-full mb-2">{{ $item['year'] }}</span>
          <h3 class="text-[16px] font-bold text-ink-900 mb-2">{{ $item['title'] }}</h3>
          <p class="text-ink-800/65 text-[14px] leading-relaxed">{{ $item['desc'] }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- TEAM -->
<section class="py-24 md:py-32 bg-canvas-100">
  <div class="max-w-6xl mx-auto px-5 sm:px-8">
    <div class="text-center mb-14 reveal">
      <div class="tide tide-lg mx-auto mb-6"></div>
      <h2 class="text-2xl sm:text-3xl md:text-[2.2rem] font-bold text-ink-900 mb-3">تیم ما</h2>
      <p class="text-[15px] sm:text-base text-ink-800/60">آدم‌هایی که پشت سوپال هستند</p>
    </div>
    @php
    $team = [
      ['name' => 'مین', 'role' => 'مدیر فنی', 'bio' => 'Go کار می‌کند، لینوکس دارد، امنیت یاد می‌گیرد.'],
      ['name' => 'ابوالفضل', 'role' => 'توسعه‌دهنده بک‌اند', 'bio' => 'Laravel و Filament. عاشق کد تمیز.'],
      ['name' => 'تیم فرانت', 'role' => 'توسعه‌دهنده فرانت‌اند', 'bio' => 'Tailwind و Alpine. UI/UX فارسی.'],
    ];
    @endphp
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
      @foreach($team as $i => $member)
      <div class="card rounded-xl p-7 text-center reveal-scale" style="transition-delay:{{ $i * .06 }}s">
        <div class="w-16 h-16 rounded-full bg-brand-900 flex items-center justify-center mx-auto mb-4">
          <span class="text-white font-bold text-xl">{{ mb_substr($member['name'], 0, 1) }}</span>
        </div>
        <h3 class="text-[15px] font-bold text-ink-900 mb-1">{{ $member['name'] }}</h3>
        <div class="text-[12.5px] text-brand-800 font-semibold mb-3">{{ $member['role'] }}</div>
        <p class="text-ink-800/60 text-[13.5px] leading-relaxed">{{ $member['bio'] }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- VALUES -->
<section class="py-24 md:py-32">
  <div class="max-w-6xl mx-auto px-5 sm:px-8">
    <div class="text-center mb-14 reveal">
      <div class="tide tide-lg mx-auto mb-6"></div>
      <h2 class="text-2xl sm:text-3xl md:text-[2.2rem] font-bold text-ink-900 mb-3">ارزش‌های ما</h2>
      <p class="text-[15px] sm:text-base text-ink-800/60">چیزهایی که به آن‌ها اعتقاد داریم</p>
    </div>
    @php
    $values = [
      ['icon' => 'bolt', 'title' => 'سرعت', 'desc' => 'هر چیزی که می‌سازیم باید سریع باشد. لود سریع، استفاده سریع، پشتیبانی سریع.'],
      ['icon' => 'sparkles', 'title' => 'سادگی', 'desc' => 'پیچیدگی دشمن کاربر است. همه چیز باید ساده و قابل فهم باشد.'],
      ['icon' => 'scale', 'title' => 'صداقت', 'desc' => 'قول می‌دهیم و عمل می‌کنیم. بدون تبلیغات دروغین.'],
    ];
    @endphp
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
      @foreach($values as $i => $value)
      <div class="card rounded-xl p-7 text-center reveal-scale" style="transition-delay:{{ $i * .06 }}s">
        <div class="card-icon w-12 h-12 rounded-lg bg-brand-400/25 flex items-center justify-center mx-auto mb-4">
          <svg class="w-5 h-5 text-brand-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
        <h3 class="text-[15px] font-bold text-ink-900 mb-2">{{ $value['title'] }}</h3>
        <p class="text-ink-800/60 text-[13.5px] leading-relaxed">{{ $value['desc'] }}</p>
      </div>
      @endforeach
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
  document.querySelectorAll('.reveal,.reveal-scale').forEach(function(el){ obs.observe(el); });
  var nav = document.getElementById('nav');
  window.addEventListener('scroll', function(){
    nav.classList.toggle('nav-scrolled', window.scrollY > 12);
  }, { passive:true });
});
</script>
</body>
</html>
