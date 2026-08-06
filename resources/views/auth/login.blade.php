<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ورود — سوپال</title>
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
[x-cloak]{display:none !important}
body{min-height:100vh;background:#FAFCFC;color:#111827}

/* ============ signature tide marker (shared with the landing style system) ============ */
.tide{position:relative;height:2px;width:44px;border-radius:2px;
  background:linear-gradient(90deg,#00939d,#7cccd1);overflow:hidden}
.tide::after{content:'';position:absolute;inset:0;
  background:linear-gradient(90deg,transparent,rgba(255,255,255,.9),transparent);
  animation:tideMove 2.8s ease-in-out infinite}
@keyframes tideMove{0%{transform:translateX(-100%)}100%{transform:translateX(100%)}}
.tide-lg{width:64px;height:3px}

/* ============ buttons (shared with landing) ============ */
.btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;border-radius:12px;font-weight:600;font-size:14.5px;transition:all .25s cubic-bezier(.22,1,.36,1);white-space:nowrap}
.btn svg{transition:transform .3s cubic-bezier(.34,1.56,.64,1)}
.btn-primary{background:#0d4145;color:#fff;padding:.9rem 2.1rem;box-shadow:0 4px 16px rgba(13,65,69,.28)}
.btn-primary:hover{background:#16656b;transform:translateY(-2px);box-shadow:0 10px 28px rgba(13,65,69,.35)}
.btn-primary:hover svg{transform:translateX(-4px)}
.btn-primary:active{transform:translateY(0)}
.btn-primary:focus-visible{outline:2px solid #7cccd1;outline-offset:3px}

/* ============ auth shell — the "تمدد" horizon ============ */
.aut-body{
  position:relative;min-height:100vh;overflow-x:hidden;overflow-y:auto;
  display:flex;align-items:safe center;justify-content:center;
  background:
    radial-gradient(90% 60% at 50% -10%,rgba(0,147,157,.10),transparent 60%),
    radial-gradient(70% 50% at 88% 110%,rgba(43,150,158,.08),transparent 60%),
    linear-gradient(180deg,#FAFCFC 0%,#EFF6F6 55%,#E9F2F2 100%);
  padding:5rem 1rem 3rem;
}
.aut-body::before{content:'';position:absolute;inset:0;pointer-events:none;
  background-image:radial-gradient(rgba(0,147,157,.13) 1px,transparent 1.6px);
  background-size:28px 28px;background-position:center;opacity:.28;
  -webkit-mask-image:linear-gradient(180deg,transparent,#000 40%,#000 78%,transparent);
          mask-image:linear-gradient(180deg,transparent,#000 40%,#000 78%,transparent)}

/* sea wash behind the card */
.aut-sea{position:absolute;inset:0;pointer-events:none;overflow:hidden;z-index:0}
.aut-sea-glow{position:absolute;border-radius:50%;filter:blur(60px)}
.aut-sea-glow-a{top:-120px;right:-80px;width:380px;height:380px;
  background:radial-gradient(circle,rgba(0,147,157,.18),transparent 65%);
  animation:autBreathe 7s ease-in-out infinite}
.aut-sea-glow-b{bottom:-140px;left:-90px;width:420px;height:420px;
  background:radial-gradient(circle,rgba(43,150,158,.16),transparent 65%);
  animation:autBreathe 9s ease-in-out infinite reverse}
.aut-sea-line{position:absolute;height:2px;border-radius:2px;left:-10%;right:-10%;opacity:.35;
  background:linear-gradient(90deg,transparent,#00939d 18%,#7cccd1 50%,#00939d 82%,transparent)}
.aut-sea-line-1{top:22%;animation:autLineDrift 16s ease-in-out infinite alternate}
.aut-sea-line-2{top:72%;animation:autLineDrift 20s ease-in-out infinite alternate-reverse}
.aut-sea-dot{position:absolute;top:22%;width:9px;height:9px;border-radius:50%;
  background:#7cccd1;box-shadow:0 0 0 4px rgba(0,147,157,.14),0 0 14px rgba(124,204,209,.5);
  animation:autDotDrift 14s ease-in-out infinite alternate}
.aut-sea-dot-2{top:72%;width:7px;height:7px;animation-duration:18s;animation-delay:1.2s}
.aut-sea-wave{position:absolute;bottom:0;left:0;right:0;width:100%;height:auto;
  animation:autWaveShift 14s ease-in-out infinite}
.aut-sea-wave-b{transform:scaleX(-1);animation:autWaveShiftB 18s ease-in-out 1s infinite}
@keyframes autBreathe{0%,100%{opacity:.55}50%{opacity:1}}
@keyframes autLineDrift{0%{transform:translateY(0) scaleX(.96)}100%{transform:translateY(34px) scaleX(1)}}
@keyframes autDotDrift{0%{right:6%}100%{right:88%}}
@keyframes autWaveShift{0%,100%{transform:translateX(0) scaleX(1)}50%{transform:translateX(-2.5%) scaleX(1.03)}}
@keyframes autWaveShiftB{0%,100%{transform:scaleX(-1) translateX(0)}50%{transform:scaleX(-1) translateX(2.5%)}}

/* stage + logo chip */
.aut-stage{position:relative;z-index:10;width:100%;max-width:920px;margin:0 auto;
  display:flex;flex-direction:column;align-items:center}
.aut-logo{display:inline-flex;align-items:center;gap:9px;margin-bottom:26px;
  padding:7px 16px 7px 12px;border-radius:999px;
  background:rgba(255,255,255,.72);backdrop-filter:blur(14px) saturate(1.4);-webkit-backdrop-filter:blur(14px) saturate(1.4);
  border:1px solid rgba(13,65,69,.09);
  box-shadow:0 10px 26px -12px rgba(13,65,69,.22);
  transition:transform .3s cubic-bezier(.34,1.56,.64,1),box-shadow .3s ease}
.aut-logo:hover{transform:translateY(-2px);box-shadow:0 16px 30px -14px rgba(13,65,69,.3)}
.aut-logo-tile{width:30px;height:30px;border-radius:9px;background:#0d4145;color:#7cccd1;
  display:flex;align-items:center;justify-content:center}
.aut-logo-tile svg{width:17px;height:17px}
.aut-logo-name{font-size:15px;font-weight:800;color:#0d4145}

/* the two-zone card */
.aut-card{display:grid;grid-template-columns:1fr;width:100%;overflow:hidden;
  border-radius:1.6rem;background:#fff;border:1px solid rgba(13,65,69,.08);
  box-shadow:0 30px 70px -30px rgba(13,65,69,.28),inset 0 1px 0 rgba(255,255,255,.6)}
@media(min-width:768px){.aut-card{grid-template-columns:.9fr 1.1fr;border-radius:2rem}}

/* postcard zone — leading side (right in RTL) */
.aut-post{position:relative;isolation:isolate;display:none;overflow:hidden;
  background:
    radial-gradient(120% 90% at 85% -10%,rgba(124,204,209,.16),transparent 55%),
    radial-gradient(100% 70% at 10% 110%,rgba(0,147,157,.12),transparent 55%),
    linear-gradient(165deg,#0d4145 0%,#0a353a 55%,#072a2e 100%);
  padding:2.6rem 2rem;min-height:520px;color:#fff;
  flex-direction:column;align-items:flex-start;justify-content:space-between}
@media(min-width:768px){.aut-post{display:flex}}
.aut-post::before{content:'';position:absolute;inset:0;z-index:-1;pointer-events:none;
  background-image:radial-gradient(rgba(124,204,209,.14) 1px,transparent 1.5px);
  background-size:22px 22px;background-position:center;opacity:.5;
  -webkit-mask-image:linear-gradient(180deg,transparent,#000 30%,#000 80%,transparent);
          mask-image:linear-gradient(180deg,transparent,#000 30%,#000 80%,transparent)}
.aut-post-glow{position:absolute;top:-70px;right:-60px;width:220px;height:220px;border-radius:50%;
  background:radial-gradient(circle,rgba(0,147,157,.22),transparent 65%);filter:blur(10px);
  animation:autBreathe 6s ease-in-out infinite}
.aut-post-line{position:absolute;top:20px;left:10%;right:10%;height:2px;border-radius:2px;z-index:2;
  background:linear-gradient(90deg,transparent,#00939d 16%,#7cccd1 50%,#00939d 84%,transparent);opacity:.9}
.aut-post-line i{position:absolute;top:-4px;width:9px;height:9px;border-radius:50%;
  background:#7cccd1;box-shadow:0 0 0 4px rgba(0,147,157,.16),0 0 12px rgba(124,204,209,.5);
  animation:autPostDrift 6s ease-in-out infinite alternate}
@keyframes autPostDrift{0%{right:6%}100%{right:88%}}
.aut-post-brand{display:flex;align-items:center;gap:11px}
.aut-post-tile{width:44px;height:44px;border-radius:13px;
  background:linear-gradient(135deg,#16656b,#2b969e);color:#7cccd1;
  display:flex;align-items:center;justify-content:center;
  box-shadow:0 10px 22px -8px rgba(0,0,0,.5),inset 0 1px 0 rgba(255,255,255,.14)}
.aut-post-tile svg{width:22px;height:22px}
.aut-post-brand b{font-size:19px;font-weight:800;letter-spacing:.01em}
.aut-post-tide{margin-bottom:14px}
.aut-post-title{font-size:1.35rem;font-weight:800;line-height:1.6;margin-bottom:10px}
.aut-post-sub{font-size:13px;line-height:1.9;color:rgba(255,255,255,.66);max-width:21rem}
.aut-post-wave{position:absolute;left:0;right:0;bottom:0;width:100%;height:auto;
  color:rgba(124,204,209,.16);z-index:0;
  animation:autPostWave 12s ease-in-out infinite}
@keyframes autPostWave{0%,100%{transform:translateY(0) scaleX(1)}50%{transform:translateY(4px) scaleX(1.02)}}

/* form zone */
.aut-form{background:rgba(255,255,255,.88);padding:2rem 1.5rem 1.8rem}
@media(min-width:768px){.aut-form{padding:2.6rem 2.4rem 2.2rem}}
.aut-tabline{position:relative;display:flex;align-items:center;gap:2px;
  background:rgba(233,242,242,.7);border:1px solid rgba(13,65,69,.06);
  border-radius:999px;padding:4px;width:max-content;margin-bottom:22px}
.aut-tab{padding:7px 22px;border-radius:999px;font-size:13.5px;font-weight:700;color:#1F2937;opacity:.6;
  transition:color .25s ease,opacity .25s ease,background .25s ease,box-shadow .25s ease}
.aut-tab:hover{color:#16656b;opacity:1}
.aut-tab-on{background:#0d4145;color:#fff;opacity:1;
  box-shadow:0 6px 16px -6px rgba(13,65,69,.5)}
.aut-tab-on:hover{color:#fff}
.aut-tabline-tide{position:absolute;bottom:-9px;right:22px;width:26px;height:2px;border-radius:2px;
  background:linear-gradient(90deg,#00939d,#7cccd1)}
.aut-form-tide{width:40px;height:2px;margin-bottom:16px}
.aut-title{font-size:1.55rem;font-weight:800;color:#111827;margin-bottom:6px;line-height:1.4}
.aut-subtitle{font-size:13.5px;color:#1F2937;opacity:.62;margin-bottom:22px;line-height:1.8}

/* alerts */
.aut-alert{border-radius:12px;padding:11px 14px;font-size:13px;line-height:1.8;margin-bottom:18px}
.aut-alert-ok{background:#e7f4f5;border:1px solid rgba(0,147,157,.25);color:#16656b}
.aut-alert-err{background:#fdf0ef;border:1px solid rgba(192,57,43,.28);color:#a63b2c}
.aut-alert ul{margin:0;padding-right:18px}

/* fields */
.aut-fields{display:flex;flex-direction:column;gap:16px}
.aut-field{display:flex;flex-direction:column;gap:6px}
.aut-label{font-size:12.5px;font-weight:700;color:#0d4145}
.aut-input-wrap{position:relative}
.aut-input{width:100%;border-radius:12px;border:1.5px solid #d8e6e6;background:#fff;
  padding:.8rem 1rem;font-size:14px;color:#111827;outline:none;
  transition:border-color .25s ease,box-shadow .3s ease,background .25s ease}
.aut-input::placeholder{color:#9db3b3}
.aut-input:hover{border-color:#b7dee0}
.aut-input:focus{border-color:#00939d;background:#fdfefe;
  box-shadow:0 0 0 4px rgba(0,147,157,.12)}
.aut-input-err{border-color:#d96a58 !important;background:#fffafa}
.aut-input-pe{padding-left:2.8rem}
.aut-eye{position:absolute;left:8px;top:50%;transform:translateY(-50%);
  width:34px;height:34px;border-radius:9px;color:#5ab2b8;
  display:flex;align-items:center;justify-content:center;
  transition:color .2s ease,background .2s ease}
.aut-eye:hover{color:#00939d;background:rgba(0,147,157,.08)}

/* helper under-line — every field has one; it "breathes" on focus */
.aut-helper{display:flex;align-items:center;gap:8px;min-height:18px}
.aut-helper i{width:12px;height:2px;border-radius:2px;flex-shrink:0;
  background:linear-gradient(90deg,#00939d,#7cccd1);
  opacity:.35;transition:opacity .3s ease,width .3s cubic-bezier(.22,1,.36,1)}
.aut-field:focus-within .aut-helper i{opacity:1;width:22px}
.aut-helper-msg{font-size:11px;color:#1F2937;opacity:.55;line-height:1.6}
.aut-helper-msg-err{color:#a63b2c;opacity:1;font-weight:600}

/* options row + checkbox */
.aut-opt{display:flex;align-items:center;gap:10px;margin-top:-2px}
.aut-check{display:inline-flex;align-items:center;gap:8px;cursor:pointer;font-size:12.5px;color:#1F2937;opacity:.75}
.aut-check input{position:absolute;opacity:0;width:0;height:0}
.aut-check span{width:17px;height:17px;border-radius:5px;border:1.5px solid #b7dee0;background:#fff;
  position:relative;transition:background .2s ease,border-color .2s ease,box-shadow .2s ease}
.aut-check span::after{content:'';position:absolute;inset:0;margin:auto;width:9px;height:5px;
  border-left:2px solid #fff;border-bottom:2px solid #fff;transform:rotate(-45deg) scale(0);
  transition:transform .2s cubic-bezier(.34,1.56,.64,1)}
.aut-check input:checked + span{background:#0d4145;border-color:#0d4145;box-shadow:0 3px 8px -2px rgba(13,65,69,.5)}
.aut-check input:checked + span::after{transform:rotate(-45deg) scale(1)}
.aut-check input:focus-visible + span{outline:2px solid #7cccd1;outline-offset:2px}

/* submit — full-width primary, forward arrow (left in RTL) */
.aut-submit{width:100%;margin-top:4px;padding:.95rem 1rem;font-size:15px}
.aut-submit svg{transition:transform .3s cubic-bezier(.34,1.56,.64,1)}
.aut-submit:hover svg{transform:translateX(-5px)}

/* footnote */
.aut-foot{display:flex;align-items:center;justify-content:center;gap:6px;margin-top:20px;
  font-size:13px;color:#1F2937;opacity:.7}
.aut-link{position:relative;font-weight:700;color:#00939d;padding-bottom:2px;transition:color .25s ease}
.aut-link::after{content:'';position:absolute;bottom:0;right:0;width:100%;height:2px;border-radius:2px;
  background:linear-gradient(90deg,#00939d,#7cccd1);transform-origin:right;transform:scaleX(.35);
  transition:transform .35s cubic-bezier(.22,1,.36,1)}
.aut-link:hover{color:#0d4145}
.aut-link:hover::after{transform:scaleX(1)}
.aut-copy{margin-top:22px;font-size:11.5px;color:#1F2937;opacity:.45}

@media (prefers-reduced-motion:reduce){
  .tide::after,.aut-sea *,.aut-post *,.aut-logo,.aut-tab,.aut-input,.aut-check span{animation:none !important;transition:none !important}
  .aut-sea-dot,.aut-post-line i{opacity:.7;right:50%}
  .aut-sea-wave,.aut-sea-wave-b,.aut-post-wave{animation:none !important}
}
</style>
</head>
<body class="aut-body">

<!-- ===== sea wash — the "تمدید" horizon bleeding behind the card ===== -->
<div class="aut-sea" aria-hidden="true">
  <span class="aut-sea-glow aut-sea-glow-a"></span>
  <span class="aut-sea-glow aut-sea-glow-b"></span>
  <span class="aut-sea-line aut-sea-line-1"></span>
  <span class="aut-sea-line aut-sea-line-2"></span>
  <span class="aut-sea-dot"></span>
  <span class="aut-sea-dot aut-sea-dot-2"></span>
  <svg class="aut-sea-wave" viewBox="0 0 1440 320" preserveAspectRatio="none"><path fill="#0d4145" fill-opacity=".05" d="M0,192L48,197.3C96,203,192,213,288,208C384,203,480,181,576,165.3C672,149,768,139,864,149.3C960,160,1056,192,1152,197.3C1248,203,1344,181,1392,170.7L1440,160L1440,320L0,320Z"/></svg>
  <svg class="aut-sea-wave aut-sea-wave-b" viewBox="0 0 1440 320" preserveAspectRatio="none"><path fill="#00939d" fill-opacity=".06" d="M0,96L120,106.7C240,117,360,139,480,149.3C600,160,720,160,840,154.7C960,149,1080,139,1200,128C1320,117,1380,107,1440,112L1440,320L0,320Z"/></svg>
</div>

<main class="aut-stage">

  <!-- logo chip -->
  <a href="{{ url('/') }}" class="aut-logo" aria-label="سوپال — بازگشت به خانه">
    <span class="aut-logo-tile">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"><path d="M2 17c1.5 1.5 3 1.5 4.5 0s3-1.5 4.5 0 3 1.5 4.5 0 3-1.5 4.5 0"/><path d="M2 21c1.5 1.5 3 1.5 4.5 0s3-1.5 4.5 0 3 1.5 4.5 0 3-1.5 4.5 0"/><path d="M12 13V4M9 6l3-3 3 3"/></svg>
    </span>
    <span class="aut-logo-name">سوپال</span>
  </a>

  <div class="aut-card">

    <!-- ===== postcard zone — leading side (right in RTL): the deep-sea brand ===== -->
    <aside class="aut-post" aria-hidden="true">
      <span class="aut-post-glow"></span>
      <span class="aut-post-line"><i></i></span>
      <div class="aut-post-brand">
        <span class="aut-post-tile">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"><path d="M2 17c1.5 1.5 3 1.5 4.5 0s3-1.5 4.5 0 3 1.5 4.5 0 3-1.5 4.5 0"/><path d="M2 21c1.5 1.5 3 1.5 4.5 0s3-1.5 4.5 0 3 1.5 4.5 0 3-1.5 4.5 0"/><path d="M12 13V4M9 6l3-3 3 3"/></svg>
        </span>
        <b>سوپال</b>
      </div>
      <div class="aut-post-body">
        <div class="tide tide-lg aut-post-tide"></div>
        <p class="aut-post-title">آرامش، از کنار خلیج فارس</p>
        <p class="aut-post-sub">به سامانه‌ی سوپال خوش آمدید؛ جایی که فناوری با همان آرامش و ژرفای دریا ساخته می‌شود.</p>
      </div>
      <svg class="aut-post-wave" viewBox="0 0 1440 120" preserveAspectRatio="none"><path fill="currentColor" d="M0,40 C240,90 480,10 720,40 C960,70 1200,20 1440,55 L1440,120 L0,120 Z"/></svg>
    </aside>

    <!-- ===== form zone ===== -->
    <section class="aut-form">
      @php $isReg = false; @endphp

      <div class="aut-tabline" role="tablist" aria-label="ورود یا ثبت‌نام">
        <a href="{{ route('login') }}" role="tab" aria-selected="{{ !$isReg ? 'true' : 'false' }}"
           class="aut-tab {{ !$isReg ? 'aut-tab-on' : '' }}">ورود</a>
        <a href="{{ route('register') }}" role="tab" aria-selected="{{ $isReg ? 'true' : 'false' }}"
           class="aut-tab {{ $isReg ? 'aut-tab-on' : '' }}">ثبت‌نام</a>
        <span class="aut-tabline-tide" aria-hidden="true"></span>
      </div>

      <div class="tide aut-form-tide" aria-hidden="true"></div>
      <h1 class="aut-title">{{ $isReg ? 'ساخت حساب جدید' : 'خوش برگشتید' }}</h1>
      <p class="aut-subtitle">{{ $isReg ? 'حسابی بسازید و به آرامش سوپال بپیوندید.' : 'برای ادامه‌ی مسیر، به حساب خود وارد شوید.' }}</p>

      @if(session('status'))
        <div class="aut-alert aut-alert-ok" role="status">{{ session('status') }}</div>
      @endif

      @if($errors->any())
        <div class="aut-alert aut-alert-err" role="alert">
          <ul class="space-y-1">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ $isReg ? route('register') : route('login') }}" class="aut-fields">
        @csrf

        <div class="aut-field">
          <label for="email" class="aut-label">ایمیل</label>
          <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email"
                 dir="ltr" class="aut-input text-left @error('email') aut-input-err @enderror"
                 placeholder="you@sopal.ir">
          <span class="aut-helper">
            <i aria-hidden="true"></i>
            @error('email') <span class="aut-helper-msg aut-helper-msg-err">{{ $message }}</span>
            @else <span class="aut-helper-msg">ایمیلی که با آن در سامانه ثبت‌نام کرده‌اید</span>
            @enderror
          </span>
        </div>

        <div class="aut-field" x-data="{show:false}">
          <label for="password" class="aut-label">رمز عبور</label>
          <div class="aut-input-wrap">
            <input id="password" :type="show ? 'text' : 'password'" name="password" required autocomplete="current-password"
                   class="aut-input aut-input-pe @error('password') aut-input-err @enderror"
                   placeholder="••••••••">
            <button type="button" @click="show = !show" class="aut-eye" :aria-pressed="show.toString()" aria-label="نمایش رمز عبور">
              <svg x-show="!show" class="w-[18px] h-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6-10-6-10-6z"/><circle cx="12" cy="12" r="2.6"/></svg>
              <svg x-show="show" x-cloak class="w-[18px] h-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M3 3l18 18M10.6 10.6a2 2 0 002.8 2.8M9.9 5.2A10.5 10.5 0 0012 5c6.5 0 10 7 10 7a17 17 0 01-2.4 3.4M6.1 6.1A16.8 16.8 0 002 12s3.5 7 10 7a9.7 9.7 0 003.9-.9"/></svg>
            </button>
          </div>
          <span class="aut-helper">
            <i aria-hidden="true"></i>
            @error('password') <span class="aut-helper-msg aut-helper-msg-err">{{ $message }}</span>
            @else <span class="aut-helper-msg">برای امنیت بیشتر، رمز محرمانه بماند</span>
            @enderror
          </span>
        </div>

        <div class="aut-opt">
          <label class="aut-check">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <span></span>
            مرا به خاطر بسپار
          </label>
        </div>

        <button type="submit" class="btn btn-primary aut-submit">
          ورود به سامانه
          <svg class="w-[18px] h-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
        </button>
      </form>

      <p class="aut-foot">
        هنوز حساب ندارید؟ <a href="{{ route('register') }}" class="aut-link">ثبت‌نام کنید</a>
      </p>
    </section>
  </div>

  <p class="aut-copy">ساخته‌شده با آرامش، از کنار خلیج فارس</p>
</main>
</body>
</html>
