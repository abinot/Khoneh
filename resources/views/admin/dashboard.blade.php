<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>پنل مدیریت سوپال</title>
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

/* stat cards — each carries a mini wave line */
.adm-cards{display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:12px;margin-bottom:1.4rem}
.adm-stat{position:relative;isolation:isolate;overflow:hidden;background:#fff;border:1px solid #E9F2F2;
  border-radius:16px;padding:16px 18px 20px;box-shadow:0 1px 2px rgba(13,65,69,.03);
  transition:transform .3s cubic-bezier(.22,1,.36,1),box-shadow .35s ease,border-color .35s ease}
.adm-stat::before{content:'';position:absolute;top:0;right:0;left:0;height:3px;border-radius:3px;
  background:linear-gradient(90deg,#00939d,#7cccd1);transform:scaleX(0);transform-origin:right;opacity:0;
  transition:transform .5s cubic-bezier(.22,1,.36,1),opacity .4s ease}
.adm-stat:hover{transform:translateY(-4px);border-color:rgba(0,147,157,.35);box-shadow:0 16px 34px -18px rgba(0,147,157,.3)}
.adm-stat:hover::before{transform:scaleX(1);opacity:1}
.adm-stat-kicker{display:inline-flex;align-items:center;gap:6px;color:#00939d;font-size:11px;font-weight:700;margin-bottom:8px}
.adm-stat-kicker i{width:14px;height:2px;border-radius:2px;background:linear-gradient(90deg,#00939d,#7cccd1)}
.adm-stat-num{display:block;font-size:1.9rem;font-weight:800;color:#0d4145;line-height:1;letter-spacing:-.02em}
.adm-stat-num-teal{color:#00939d}
.adm-stat-pill-chip{display:inline-flex;align-items:center;gap:6px;margin-top:4px;padding:5px 13px;border-radius:999px;
  font-size:12px;font-weight:800;border:1.5px solid}
.adm-stat-wave{position:absolute;left:0;right:0;bottom:-1px;height:12px;color:rgba(0,147,157,.12);
  pointer-events:none;transition:color .35s ease}
.adm-stat:hover .adm-stat-wave{color:rgba(0,147,157,.28)}
.adm-stat-wave svg{width:100%;height:100%;display:block}

/* main cards */
.adm-card{background:#fff;border:1px solid #E9F2F2;border-radius:16px;
  box-shadow:0 1px 2px rgba(13,65,69,.03);margin-bottom:1.2rem;overflow:hidden}
.adm-card-head{display:flex;align-items:center;justify-content:space-between;gap:10px;padding:15px 18px;
  border-bottom:1px solid #E9F2F2;background:linear-gradient(180deg,rgba(244,248,248,.6),rgba(255,255,255,0))}
.adm-card-title{font-size:14.5px;font-weight:800;color:#111827}
.adm-card-sub{font-size:11.5px;color:#1F2937;opacity:.55}
.adm-card-count{font-size:11.5px;font-weight:700;color:#00939d;background:#e7f4f5;
  border:1px solid rgba(0,147,157,.16);border-radius:999px;padding:4px 12px}

/* table */
.adm-table-wrap{overflow-x:auto}
.adm-table{width:100%;border-collapse:collapse;font-size:13px}
.adm-table thead th{padding:11px 16px;text-align:right;font-size:11.5px;font-weight:700;color:#1F2937;opacity:.55;
  border-bottom:1px solid #E9F2F2;white-space:nowrap}
.adm-table tbody td{padding:12px 16px;border-bottom:1px solid rgba(233,242,242,.7);vertical-align:middle}
.adm-table tbody tr:last-child td{border-bottom:none}
.adm-table tbody tr{transition:background .2s ease}
.adm-table tbody tr:hover{background:rgba(244,248,248,.7)}
.adm-th-actions{width:220px}
.adm-cell-user{display:flex;align-items:center;gap:10px;font-weight:700;color:#111827;white-space:nowrap}
.adm-avatar-sm{width:26px;height:26px;font-size:11.5px}
.adm-cell-mail{color:#1F2937;opacity:.65;direction:ltr;text-align:left}
.adm-badge{display:inline-flex;align-items:center;gap:5px;padding:3px 11px;border-radius:999px;
  font-size:11px;font-weight:700;background:#f1f5f5;color:#1F2937;border:1px solid rgba(17,24,39,.08)}
.adm-badge::before{content:'';width:5px;height:5px;border-radius:50%;background:#b7dee0}
.adm-badge-admin{background:#e7f4f5;color:#0d4145;border-color:rgba(0,147,157,.22)}
.adm-badge-admin::before{background:#00939d}
.adm-status{display:inline-flex;align-items:center;gap:6px;font-size:11.5px;font-weight:700;border-radius:999px;padding:3px 11px}
.adm-status-on{background:#e6f5ee;color:#1f7a4d;border:1px solid rgba(31,122,77,.22)}
.adm-status-on::before{content:'';width:6px;height:6px;border-radius:50%;background:#2fbf71}
.adm-status-off{background:#fdf0ef;color:#a63b2c;border:1px solid rgba(192,57,43,.22)}
.adm-status-off::before{content:'';width:6px;height:6px;border-radius:50%;background:#d96a58}

/* row actions */
.adm-cell-actions{display:flex;align-items:center;gap:6px}
.adm-rowform{display:inline-flex;margin:0}
.adm-btn{display:inline-flex;align-items:center;gap:5px;padding:6px 12px;border-radius:9px;font-size:11.5px;
  font-weight:700;border:1px solid transparent;cursor:pointer;
  transition:background .2s ease,border-color .2s ease,color .2s ease,transform .2s cubic-bezier(.34,1.56,.64,1)}
.adm-btn:hover{transform:translateY(-1px)}
.adm-btn-soft{background:#fff;color:#16656b;border-color:rgba(0,147,157,.28)}
.adm-btn-soft:hover{background:#e7f4f5;border-color:rgba(0,147,157,.5)}
.adm-btn-toggle{color:#a63b2c;border-color:rgba(192,57,43,.28)}
.adm-btn-toggle:hover{background:#fdf0ef;border-color:rgba(192,57,43,.45)}
.adm-btn-revive{color:#1f7a4d;border-color:rgba(31,122,77,.3)}
.adm-btn-revive:hover{background:#e6f5ee;border-color:rgba(31,122,77,.5)}
.adm-btn-danger{background:#a63b2c;color:#fff;box-shadow:0 4px 12px -4px rgba(192,57,43,.5)}
.adm-btn-danger:hover{background:#8f3124}
.adm-btn:focus-visible{outline:2px solid #00939d;outline-offset:2px}

/* registration toggle — green ON pill vs red OFF pill */
.adm-toggle-row{display:flex;align-items:center;justify-content:space-between;gap:16px;padding:18px}
@media(max-width:640px){.adm-toggle-row{flex-direction:column;align-items:flex-start;gap:12px}}
.adm-toggle-title{font-size:13.5px;font-weight:700;color:#111827;margin-bottom:4px}
.adm-toggle-desc{font-size:12px;color:#1F2937;opacity:.6;line-height:1.7;margin-bottom:6px}
.adm-link-back{position:relative;font-size:12px;font-weight:700;color:#00939d;padding-bottom:2px;transition:color .25s ease}
.adm-link-back::after{content:'';position:absolute;bottom:0;right:0;width:100%;height:2px;border-radius:2px;
  background:linear-gradient(90deg,#00939d,#7cccd1);transform-origin:right;transform:scaleX(.35);
  transition:transform .35s cubic-bezier(.22,1,.36,1)}
.adm-link-back:hover{color:#0d4145}
.adm-link-back:hover::after{transform:scaleX(1)}
.adm-pill{display:inline-flex;align-items:center;gap:8px;padding:8px 14px;border-radius:999px;
  font-size:12.5px;font-weight:800;border:1.5px solid;cursor:pointer;
  transition:transform .25s cubic-bezier(.34,1.56,.64,1),box-shadow .3s ease}
.adm-pill:hover{transform:translateY(-2px)}
.adm-pill:focus-visible{outline:2px solid #00939d;outline-offset:2px}
.adm-pill-knob{width:9px;height:9px;border-radius:50%;flex-shrink:0;box-shadow:0 0 0 4px rgba(255,255,255,.4)}
.adm-pill-on{background:#e6f5ee;color:#1f7a4d;border-color:rgba(31,122,77,.4);box-shadow:0 8px 20px -10px rgba(31,122,77,.5)}
.adm-pill-on .adm-pill-knob{background:#2fbf71}
.adm-pill-off{background:#fdf0ef;color:#a63b2c;border-color:rgba(192,57,43,.4);box-shadow:0 8px 20px -10px rgba(192,57,43,.4)}
.adm-pill-off .adm-pill-knob{background:#d96a58}

/* footer */
.adm-foot{margin-top:1.5rem;padding:1rem 1rem 1.6rem;text-align:center}
.adm-foot .tide{margin:0 auto 10px;opacity:.6}
.adm-foot p{font-size:11.5px;color:#1F2937;opacity:.45}

@media (prefers-reduced-motion:reduce){
  .tide::after,.adm-top-line i,.adm-stat,.adm-stat::before,.adm-stat-wave,.adm-btn,.adm-pill{animation:none !important;transition:none !important}
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
        <span class="adm-avatar">{{ $auth && $auth->name ? mb_substr($auth->name, 0, 1) : '؟' }}</span>
        <span class="adm-userchip-text">
          <b>{{ $auth->name ?? 'کاربر' }}</b>
          <small>{{ ($auth->role ?? 'user') === 'admin' ? 'مدیر' : 'کاربر' }}</small>
        </span>
      </div>
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
  @php
    $fa = function($n){ return str_replace([0,1,2,3,4,5,6,7,8,9], ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'], (string) $n); };
  @endphp

  <!-- page header with tide marker -->
  <div class="adm-head">
    <div>
      <div class="tide tide-lg adm-head-tide"></div>
      <h1 class="adm-title">پنل مدیریت سوپال</h1>
      <p class="adm-subtitle">مرور، کنترل و مدیریت کاربران سامانه.</p>
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

  <!-- ============ stat cards ============ -->
  <section class="adm-cards" aria-label="آمار سامانه">
    <article class="adm-stat">
      <span class="adm-stat-kicker"><i aria-hidden="true"></i>تعداد کاربران</span>
      <b class="adm-stat-num" data-count="{{ $totalUsers }}">{{ $fa(number_format($totalUsers)) }}</b>
      <span class="adm-stat-wave" aria-hidden="true"><svg viewBox="0 0 240 12" preserveAspectRatio="none"><path fill="currentColor" d="M0 6C30 0 60 12 90 6S150 0 180 6 240 6V12H0Z"/></svg></span>
    </article>
    <article class="adm-stat">
      <span class="adm-stat-kicker"><i aria-hidden="true"></i>کاربران فعال</span>
      <b class="adm-stat-num adm-stat-num-teal">{{ $fa(number_format($activeUsers)) }}</b>
      <span class="adm-stat-wave" aria-hidden="true"><svg viewBox="0 0 240 12" preserveAspectRatio="none"><path fill="currentColor" d="M0 6C30 0 60 12 90 6S150 0 180 6 240 6V12H0Z"/></svg></span>
    </article>
    <article class="adm-stat">
      <span class="adm-stat-kicker"><i aria-hidden="true"></i>وضعیت ثبت‌نام</span>
      @if($registrationEnabled)
        <span class="adm-stat-pill-chip adm-pill-on"><span class="adm-pill-knob"></span>ثبت‌نام فعال است</span>
      @else
        <span class="adm-stat-pill-chip adm-pill-off"><span class="adm-pill-knob"></span>ثبت‌نام غیرفعال است</span>
      @endif
      <span class="adm-stat-wave" aria-hidden="true"><svg viewBox="0 0 240 12" preserveAspectRatio="none"><path fill="currentColor" d="M0 6C30 0 60 12 90 6S150 0 180 6 240 6V12H0Z"/></svg></span>
    </article>
  </section>

  <!-- users table -- the loop var is $u so it never shadows the authenticated $auth above -->
  <section class="adm-card">
    <div class="adm-card-head">
      <h2 class="adm-card-title">کاربران سامانه</h2>
      <span class="adm-card-count">{{ $fa(number_format($users->count())) }} کاربر</span>
    </div>

    <div class="adm-table-wrap">
      <table class="adm-table">
        <thead>
          <tr>
            <th>نام</th>
            <th>ایمیل</th>
            <th>نقش</th>
            <th>وضعیت</th>
            <th class="adm-th-actions">عملیات</th>
          </tr>
        </thead>
        <tbody>
          @forelse($users as $u)
            @php
              $isAdmin = ($u->role ?? 'user') === 'admin';
              $roleLabel = $isAdmin ? 'مدیر' : 'کاربر';
              $roleClass = $isAdmin ? 'adm-badge adm-badge-admin' : 'adm-badge';
            @endphp
            <tr>
              <td class="adm-cell-user">
                <span class="adm-avatar adm-avatar-sm">{{ $u->name ? mb_substr($u->name, 0, 1) : '؟' }}</span>
                <b>{{ $u->name }}</b>
              </td>
              <td class="adm-cell-mail">{{ $u->email }}</td>
              <td><span class="{{ $roleClass }}">{{ $roleLabel }}</span></td>
              <td>
                @if($u->is_active)
                  <span class="adm-status adm-status-on">فعال</span>
                @else
                  <span class="adm-status adm-status-off">غیرفعال</span>
                @endif
              </td>
              <td class="adm-cell-actions">
                <form method="POST" action="{{ route('admin.users.update-role', $u) }}" class="adm-rowform">
                  @csrf
                  @method('PATCH')
                  <input type="hidden" name="role" value="{{ $isAdmin ? 'user' : 'admin' }}">
                  <button type="submit" class="adm-btn adm-btn-soft" title="تغییر نقش">تغییر نقش</button>
                </form>
                <form method="POST" action="{{ route('admin.users.toggle-active', $u) }}" class="adm-rowform">
                  @csrf
                  @method('PATCH')
                  <button type="submit" class="adm-btn adm-btn-soft adm-btn-toggle {{ $u->is_active ? '' : 'adm-btn-revive' }}">
                    {{ $u->is_active ? 'غیرفعال' : 'فعال' }}
                  </button>
                </form>
                <form method="POST" action="{{ route('admin.users.destroy', $u) }}" class="adm-rowform js-confirm"
                      data-confirm="کاربر برای همیشه حذف شود؟">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="adm-btn adm-btn-danger">حذف</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="5" class="text-center py-8">کاربری ثبت نشده است</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </section>

  <!-- ===== تنظیمات ثبت‌نام ===== -->
  <section class="adm-card">
    <div class="adm-card-head">
      <h2 class="adm-card-title">تنظیمات ثبت‌نام</h2>
      <span class="adm-card-sub">کنترل ثبت‌نام کاربران جدید در سامانه</span>
    </div>
    <div class="adm-toggle-row">
      <div>
        <p class="adm-toggle-title">امکان ثبت‌نام بازدیدکنندگان</p>
        <p class="adm-toggle-desc">وقتی فعال باشد، کاربران جدید می‌توانند از صفحه‌ی ثبت‌نام وارد شوند.</p>
        <a href="{{ route('dashboard') }}" class="adm-link-back">بازگشت به داشبورد</a>
      </div>
      <form method="POST" action="{{ route('admin.settings.registration') }}">
        @csrf
        @method('PATCH')
        <input type="hidden" name="value" value="{{ $registrationEnabled ? '0' : '1' }}">
        <button type="submit" class="adm-pill {{ $registrationEnabled ? 'adm-pill-on' : 'adm-pill-off' }}"
                aria-pressed="{{ $registrationEnabled ? 'true' : 'false' }}">
          <span class="adm-pill-knob" aria-hidden="true"></span>
          @if($registrationEnabled) ریجیستر فعال @else ریجیستر غیرفعال @endif
        </button>
      </form>
    </div>
  </section>
</main>

<footer class="adm-foot">
  <span class="tide" aria-hidden="true"></span>
  <p>سوپال © ۱۴۰۳ — ساخته‌شده با آرامش، از کنار خلیج فارس</p>
</footer>

<script>
document.addEventListener('submit', function (e) {
  var form = e.target.closest('.js-confirm');
  if (!form) return;
  var msg = form.getAttribute('data-confirm');
  if (!msg || !window.confirm(msg)) e.preventDefault();
});
</script>
</body>
</html>