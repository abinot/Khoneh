<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>داشبورد کاربر — سوپال</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rastikerdar/sahel-font@v3.4.0/dist/font-face.css">
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
      fontFamily: { sans: ['Sahel','Tahoma','Arial','sans-serif'] }
    }
  }
}
</script>
<style>
*,*::before,*::after{box-sizing:border-box}
*{font-family:'Sahel',Tahoma,Arial,sans-serif}
body{min-height:100vh;background:#FAFCFC;color:#111827}

/* ============ signature tide marker (shared with the landing style system) ============ */
.tide{position:relative;height:2px;width:44px;border-radius:2px;
  background:linear-gradient(90deg,#00939d,#7cccd1);overflow:hidden}
.tide::after{content:'';position:absolute;inset:0;
  background:linear-gradient(90deg,transparent,rgba(255,255,255,.9),transparent);
  animation:tideMove 2.8s ease-in-out infinite}
@keyframes tideMove{0%{transform:translateX(-100%)}100%{transform:translateX(100%)}}
.tide-lg{width:64px;height:3px}

/* ============ panel shell — the tide flowing through a light workspace ============ */
.adm-body{min-height:100vh;background:radial-gradient(80% 50% at 50% 0,rgba(0,147,157,.05),transparent 60%),#FAFCFC}

/* top bar — light glass, the "reverse horizon" */
.adm-top{position:sticky;top:0;z-index:40;background:rgba(244,248,248,.82);
  backdrop-filter:blur(18px) saturate(1.4);-webkit-backdrop-filter:blur(18px) saturate(1.4);
  border-bottom:1px solid rgba(17,24,39,.05)}
.adm-top-inner{max-width:72rem;margin:0 auto;padding:.65rem 1rem;display:flex;align-items:center;justify-content:space-between;gap:12px}
.adm-top-line{position:absolute;left:10%;right:10%;bottom:0;height:2px;border-radius:2px;
  background:linear-gradient(90deg,transparent,#00939d 16%,#7cccd1 50%,#00939d 84%,transparent);opacity:.7}
.adm-top-line i{position:absolute;top:-4px;width:9px;height:9px;border-radius:50%;
  background:#00939d;box-shadow:0 0 0 4px rgba(0,147,157,.14),0 0 12px rgba(0,147,157,.5);
  animation:admDrift 7s ease-in-out infinite alternate}
@keyframes admDrift{0%{right:6%}100%{right:88%}}

.adm-brand{display:inline-flex;align-items:center;gap:9px;border-radius:12px;padding:4px 8px 4px 4px;transition:background .25s ease}
.adm-brand:hover{background:rgba(0,147,157,.06)}
.adm-brand-tile{width:32px;height:32px;border-radius:10px;background:#0d4145;color:#7cccd1;
  display:flex;align-items:center;justify-content:center;box-shadow:0 6px 14px -6px rgba(13,65,69,.5)}
.adm-brand-tile svg{width:17px;height:17px}
.adm-brand-name{font-size:15px;font-weight:800;color:#0d4145}

.adm-top-actions{display:flex;align-items:center;gap:10px}
.adm-userchip{display:flex;align-items:center;gap:10px;padding:5px 12px 5px 6px;border-radius:999px;
  background:#fff;border:1px solid rgba(13,65,69,.09);box-shadow:0 6px 16px -10px rgba(13,65,69,.25)}
.adm-avatar{position:relative;width:30px;height:30px;border-radius:50%;flex-shrink:0;
  background:linear-gradient(135deg,#00939d,#2b969e);color:#fff;display:flex;align-items:center;justify-content:center;
  font-size:13px;font-weight:800;box-shadow:0 4px 10px -4px rgba(0,147,157,.6)}
.adm-userchip-text{display:flex;flex-direction:column;align-items:flex-start;line-height:1.25}
.adm-userchip-text b{font-size:12.5px;font-weight:700;color:#111827}
.adm-userchip-text small{font-size:10.5px;color:#00939d;font-weight:600}
.adm-logout{display:inline-flex;align-items:center;gap:6px;padding:8px 14px;border-radius:11px;
  color:#1F2937;opacity:.7;font-size:12.5px;font-weight:600;border:1px solid transparent;cursor:pointer;
  transition:color .25s ease,opacity .25s ease,border-color .25s ease,background .25s ease}
.adm-logout:hover{opacity:1;color:#a63b2c;background:#fdf0ef;border-color:rgba(192,57,43,.2)}
.adm-logout:focus-visible{outline:2px solid #00939d;outline-offset:2px}
.adm-pass{display:inline-flex;align-items:center;gap:6px;padding:8px 14px;border-radius:11px;
  color:#16656b;font-size:12.5px;font-weight:600;border:1px solid transparent;text-decoration:none;
  transition:color .25s ease,opacity .25s ease,border-color .25s ease,background .25s ease}
.adm-pass:hover{color:#0d4145;background:#e7f4f5;border-color:rgba(0,147,157,.2)}
.adm-pass:focus-visible{outline:2px solid #00939d;outline-offset:2px}

/* content */
.adm-wrap{max-width:72rem;margin:0 auto;padding:1.6rem 1rem 2.4rem}
.adm-head{position:relative;display:flex;align-items:flex-end;justify-content:space-between;gap:14px;
  margin-bottom:1.4rem;padding:.4rem 0 .9rem;overflow:hidden}
.adm-head-tide{margin-bottom:12px}
.adm-title{font-size:1.5rem;font-weight:800;color:#111827;line-height:1.5}
.adm-subtitle{font-size:13px;color:#1F2937;opacity:.6;margin-top:4px}
.adm-head-wave{position:absolute;bottom:0;left:0;width:240px;height:24px;color:rgba(0,147,157,.14);pointer-events:none}
.adm-head-wave svg{width:100%;height:100%;display:block}

.adm-alert{border-radius:12px;padding:11px 15px;font-size:13px;line-height:1.8;margin-bottom:16px;
  background:#e7f4f5;border:1px solid rgba(0,147,157,.25);color:#16656b}
.adm-alert-err{background:#fdf0ef;border:1px solid rgba(192,57,43,.28);color:#a63b2c}
.adm-alert ul{margin:0;padding-right:18px}

/* main cards */
.adm-card{background:#fff;border:1px solid #E9F2F2;border-radius:16px;
  box-shadow:0 1px 2px rgba(13,65,69,.03);margin-bottom:1.2rem;overflow:hidden}
.adm-card-head{display:flex;align-items:center;justify-content:space-between;gap:10px;padding:15px 18px;
  border-bottom:1px solid #E9F2F2;background:linear-gradient(180deg,rgba(244,248,248,.6),rgba(255,255,255,0))}
.adm-card-title{font-size:14.5px;font-weight:800;color:#111827}
.adm-card-sub{font-size:11.5px;color:#1F2937;opacity:.55}

/* welcome hero */
.adm-hero{background:#fff;border:1px solid #E9F2F2;border-radius:16px;
  box-shadow:0 1px 2px rgba(13,65,69,.03);margin-bottom:1.2rem;overflow:hidden;position:relative;isolation:isolate}
.adm-hero::before{content:'';position:absolute;top:0;right:0;left:0;height:3px;border-radius:3px;
  background:linear-gradient(90deg,#00939d,#7cccd1)}
.adm-hero-inner{display:flex;align-items:center;justify-content:space-between;gap:14px;flex-wrap:wrap;padding:22px 22px}
.adm-hero-title{display:flex;align-items:center;gap:12px;flex-wrap:wrap}
.adm-hero-greeting{font-size:1.35rem;font-weight:800;color:#111827;line-height:1.5}
.adm-hero-greeting b{color:#0d4145}
.adm-hero-sub{font-size:13px;color:#1F2937;opacity:.6;margin-top:6px}
.adm-badge{display:inline-flex;align-items:center;gap:5px;padding:3px 11px;border-radius:999px;
  font-size:11px;font-weight:700;background:#f1f5f5;color:#1F2937;border:1px solid rgba(17,24,39,.08)}
.adm-badge::before{content:'';width:5px;height:5px;border-radius:50%;background:#b7dee0}
.adm-badge-admin{background:#e7f4f5;color:#0d4145;border-color:rgba(0,147,157,.22)}
.adm-badge-admin::before{background:#00939d}

/* admin entry card */
.adm-admin-link{display:flex;align-items:center;gap:12px;padding:16px 18px;
  background:linear-gradient(90deg,rgba(0,147,157,.06),rgba(124,204,209,.08));
  border:1px solid rgba(0,147,157,.25);border-radius:14px;
  text-decoration:none;color:#0d4145;font-weight:800;font-size:14px;
  transition:transform .25s cubic-bezier(.34,1.56,.64,1),box-shadow .3s ease,border-color .3s ease}
.adm-admin-link:hover{transform:translateY(-2px);box-shadow:0 12px 26px -14px rgba(0,147,157,.4);border-color:rgba(0,147,157,.45)}
.adm-admin-link b{font-size:13.5px;color:#0d4145}
.adm-admin-link small{font-weight:600;color:#16656b;opacity:.75}

/* footer */
.adm-foot{margin-top:1.5rem;padding:1rem 1rem 1.6rem;text-align:center}
.adm-foot .tide{margin:0 auto 10px;opacity:.6}
.adm-foot p{font-size:11.5px;color:#1F2937;opacity:.45}

@media (prefers-reduced-motion:reduce){
  .tide::after,.adm-top-line i,.adm-card,.adm-hero,.adm-admin-link{animation:none !important;transition:none !important}
  .adm-top-line i{opacity:.7;right:50%}
}
</style>
</head>
<body class="adm-body">

<!-- top bar — the "reverse horizon": light glass, tide hairline with a drifting glow below -->
<header class="adm-top">
  <div class="adm-top-inner">
    <a href="{{ url('/') }}" class="adm-brand" aria-label="سوپال — خانه">
      <span class="adm-brand-tile">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"><path d="M2 15c1.5 1.5 3 1.5 4.5 0s3-1.5 4.5 0 3 1.5 4.5 0 3-1.5 4.5 0"/><path d="M2 21c1.5 1.5 3 1.5 4.5 0s3-1.5 4.5 0 3 1.5 4.5 0 3-1.5 4.5 0"/><path d="M12 13V4M9 6l3-3 3 3"/></svg>
      </span>
      <span class="adm-brand-name">سوپال</span>
    </a>

    <div class="adm-top-actions">
      <div class="adm-userchip">
        <span class="adm-avatar">{{ $user && $user->name ? mb_substr($user->name, 0, 1) : '؟' }}</span>
        <span class="adm-userchip-text">
          <b>{{ $user->name ?? 'کاربر' }}</b>
          <small>{{ $user->isAdmin() ? 'مدیر' : 'کاربر' }}</small>
        </span>
      </div>
      <a href="{{ route('password.edit') }}" class="adm-pass" aria-label="تغییر رمز عبور">
        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3.5" y="10.5" width="17" height="10" rx="2.5"/><path d="M7.5 10.5V7a4.5 4.5 0 019 0v3.5"/><circle cx="12" cy="15.5" r="1.4"/></svg>
        تغییر رمز
      </a>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="adm-logout">
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4M16 17l5-5-5-5M21 12H9"/></svg>
          خروج
        </button>
      </form>
    </div>
  </div>
  <span class="adm-top-line" aria-hidden="true"><i></i></span>
</header>

<main class="adm-wrap">

  <!-- page header with tide marker -->
  <div class="adm-head">
    <div>
      <div class="tide tide-lg adm-head-tide"></div>
      <h1 class="adm-title">داشبورد کاربر</h1>
      <p class="adm-subtitle">نمای کلی حساب شما.</p>
    </div>
    <span class="adm-head-wave" aria-hidden="true">
      <svg viewBox="0 0 240 24" preserveAspectRatio="none"><path fill="currentColor" d="M0 14C40 4 80 22 120 12S200 4 240 12V24H0Z"/></svg>
    </span>
  </div>

  @if(session('status'))
    <div class="adm-alert" role="status">{{ session('status') }}</div>
  @endif

  @if($errors->any())
    <div class="adm-alert adm-alert-err" role="alert">
      <ul class="space-y-1">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <!-- welcome hero -->
  <section class="adm-hero">
    <div class="adm-hero-inner">
      <div class="adm-hero-title">
        <div>
          <p class="adm-hero-greeting">خوش آمدید، <b>{{ $user->name }}</b> 👋</p>
          <p class="adm-hero-sub">به سامانه‌ی سوپال خوش آمدید؛ اینجا به‌زودی خلاصه فعالیت‌ها و امکانات شما قرار می‌گیرد.</p>
        </div>
      </div>
      <span class="adm-badge {{ $user->isAdmin() ? 'adm-badge-admin' : '' }}">{{ $user->isAdmin() ? 'مدیر' : 'کاربر' }}</span>
    </div>
  </section>

  <!-- admin entry — only visible to admins -->
  @if($user->isAdmin())
  <section class="adm-card">
    <div class="adm-card-head">
      <h2 class="adm-card-title">دسترسی مدیر</h2>
      <span class="adm-card-sub">ابزارهای مدیریت سامانه</span>
    </div>
    <div style="padding:16px 18px">
      <a href="{{ route('admin.dashboard') }}" class="adm-admin-link">
        <span class="adm-brand-tile">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="w-[17px] h-[17px]"><path d="M12 2l7 4v6c0 5-3.5 8-7 10-3.5-2-7-5-7-10V6z"/><path d="M9 12l2 2 4-4"/></svg>
        </span>
        <span>
          <b>پنل مدیریت سوپال</b><br>
          <small>مدیریت کاربران و تنظیمات سامانه</small>
        </span>
      </a>
    </div>
  </section>
  @endif
</main>

<footer class="adm-foot">
  <span class="tide" aria-hidden="true"></span>
  <p>سوپال © ۱۴۰۳ — ساخته‌شده با آرامش، از کنار خلیج فارس</p>
</footer>
</body>
</html>