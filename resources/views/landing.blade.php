<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>سوپال — فناوری در خدمت انسان</title>
<meta name="description" content="سوپال | راهکارهای نرم‌افزاری از کنار خلیج فارس. سامانه‌های قابل اعتماد برای مسئله‌های بزرگ.">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rastikerdar/sahel-font@v3.4.0/dist/font-face.css">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script>
/* stats counter — registered before Alpine loads */
document.addEventListener('alpine:init', function(){
  Alpine.data('statsCounter', function(){
    return {
      projects: 0, years: 0, satisfaction: 0, started: false,
      init(){
        var el = this.$root;
        var obs = new IntersectionObserver(function(entries){
          if(entries[0].isIntersecting && !this.started){
            this.started = true;
            this.countTo('projects', 80, 1200);
            this.countTo('years', 6, 900);
            this.countTo('satisfaction', 98, 1400);
            obs.disconnect();
          }
        }.bind(this), { threshold: 0.3 });
        obs.observe(el);
      },
      countTo(prop, target, dur){
        var start = performance.now();
        var tick = function(now){
          var p = Math.min((now - start) / dur, 1);
          var eased = 1 - Math.pow(1 - p, 3);
          this[prop] = Math.round(eased * target);
          if(p < 1) requestAnimationFrame(tick);
        }.bind(this);
        requestAnimationFrame(tick);
      },
      fmt(v){
        return v.toLocaleString('fa-IR');
      }
    };
  });
});
</script>
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

  /* ============ signature motif: the tide line ============
     A single thin horizontal line that "breathes" like a tide,
     used everywhere a divider/underline/marker is needed.
     This replaces generic dividers/numbered badges with one
     consistent, ownable device tied to "کنار خلیج فارس". */
  .tide{
    position:relative; height:2px; width:44px; border-radius:2px;
    background:linear-gradient(90deg,#00939d,#7cccd1);
    overflow:hidden;
  }
  .tide::after{
    content:''; position:absolute; inset:0;
    background:linear-gradient(90deg,transparent,rgba(255,255,255,.9),transparent);
    animation:tideMove 2.8s ease-in-out infinite;
  }
  @keyframes tideMove{0%{transform:translateX(-100%)}100%{transform:translateX(100%)}}
  .tide-lg{width:64px;height:3px}

  .reveal{opacity:0;transform:translateY(24px);transition:opacity .6s cubic-bezier(.22,1,.36,1),transform .6s cubic-bezier(.22,1,.36,1)}
  .reveal.in{opacity:1;transform:translateY(0)}
  .reveal-scale{opacity:0;transform:translateY(18px) scale(.97);transition:opacity .6s cubic-bezier(.22,1,.36,1),transform .6s cubic-bezier(.22,1,.36,1)}
  .reveal-scale.in{opacity:1;transform:translateY(0) scale(1)}

  /* nav — crystal glass, pill links */
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

  .nav-login{padding:6px 14px;border-radius:999px;font-weight:600}
  .nav-login::after{display:none}
  .nav-login:hover{color:#16656b;background:rgba(0,147,157,.08)}

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

  /* buttons: primary / secondary / ghost */
  .btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;border-radius:12px;font-weight:600;font-size:14.5px;transition:all .25s cubic-bezier(.22,1,.36,1);white-space:nowrap}
  .btn svg{transition:transform .3s cubic-bezier(.34,1.56,.64,1)}
  .btn-primary{background:#0d4145;color:#fff;padding:.9rem 2.1rem;box-shadow:0 4px 16px rgba(13,65,69,.28)}
  .btn-primary:hover{background:#16656b;transform:translateY(-2px);box-shadow:0 10px 28px rgba(13,65,69,.35)}
  .btn-primary:hover svg{transform:translateX(-4px)}
  .btn-primary:active{transform:translateY(0)}
  .btn-primary:focus-visible{outline:2px solid #7cccd1;outline-offset:3px}
  .btn-secondary{border:1.5px solid #d8e6e6;color:#0d4145;background:#fff;padding:.9rem 2.1rem}
  .btn-secondary:hover{border-color:#00939d;background:#f4f8f8;transform:translateY(-2px)}
  .btn-secondary:focus-visible{outline:2px solid #00939d;outline-offset:3px}
  .btn-ghost{
    color:#fff;border:1.5px solid rgba(255,255,255,.5);
    padding:.9rem 2.1rem;background:rgba(255,255,255,.07);
    backdrop-filter:blur(4px);
  }
  .btn-ghost:hover{background:rgba(255,255,255,.18);border-color:#fff;transform:translateY(-2px);box-shadow:0 8px 20px rgba(0,0,0,.15)}
  .btn-ghost:hover svg{transform:translateX(4px)}
  .btn-ghost:active{transform:translateY(0)}
  .btn-ghost:focus-visible{outline:2px solid #fff;outline-offset:3px}

  /* hero */
  .hero-wash{background:linear-gradient(180deg,rgba(11,44,50,.15) 0%,rgba(11,44,50,.55) 100%)}
  .hero-in{opacity:0;transform:translateY(22px);animation:heroIn .8s cubic-bezier(.22,1,.36,1) forwards}
  .hd1{animation-delay:.05s}.hd2{animation-delay:.16s}.hd3{animation-delay:.27s}.hd4{animation-delay:.38s}.hd5{animation-delay:.49s}
  @keyframes heroIn{to{opacity:1;transform:translateY(0)}}
  .accent{color:#7cccd1}

  /* the tide-edge: wave seam between hero and next section, part of the
     signature motif so the "coastline" literally runs through the page */
  .tide-edge{position:absolute;bottom:-1px;right:0;left:0;line-height:0;pointer-events:none}
  .tide-edge svg{width:100%;height:auto;display:block;filter:drop-shadow(0 10px 22px rgba(13,65,69,.20))}
  /* shimmer line on the wave crest — sits inside the dark hero area,
     never bleeds into the light section below */
  .tide-crest{
    position:absolute;right:0;left:0;bottom:0;
    height:2px;z-index:2;
    background:linear-gradient(90deg,transparent 8%,rgba(124,204,209,.7) 30%,rgba(0,147,157,.85) 50%,rgba(124,204,209,.7) 70%,transparent 92%);
    border-radius:2px;
    opacity:.9;
    animation:tideGlow 6s ease-in-out infinite;
  }
  @keyframes tideGlow{
    0%,100%{opacity:.5}
    50%{opacity:.95}
  }
  @media (prefers-reduced-motion:reduce){.tide-crest{animation:none;opacity:.7}}

  .trust{border:1px solid rgba(255,255,255,.2);background:rgba(255,255,255,.06);backdrop-filter:blur(6px)}
  .trust-item{
    display:flex;align-items:center;gap:8px;
    padding:7px 12px;border-radius:10px;
    background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.14);
    transition:background .2s,transform .3s cubic-bezier(.34,1.56,.64,1),border-color .2s;
  }
  .trust-item:hover{background:rgba(255,255,255,.16);transform:translateY(-2px);border-color:rgba(255,255,255,.3)}
  .trust-icon{
    width:18px;height:18px;flex-shrink:0;color:#7cccd1;
  }
  .trust-item:hover .trust-icon{color:#fff}
  .trust-text{display:flex;flex-direction:column;align-items:flex-start;line-height:1.2}
  .trust-title{color:#fff;font-size:12px;font-weight:600}
  .trust-sub{color:rgba(255,255,255,.65);font-size:10.5px}

  /* cards */
  .card{border:1px solid #E9F2F2;background:#fff;transition:box-shadow .35s ease,border-color .35s ease,transform .3s cubic-bezier(.22,1,.36,1)}
  .card:hover{border-color:#00939d;box-shadow:0 16px 36px rgba(0,147,157,.12);transform:translateY(-5px)}
  .card-icon{transition:transform .4s cubic-bezier(.34,1.56,.64,1)}
  .card:hover .card-icon{transform:scale(1.1) rotate(-3deg)}

  .img-zoom-wrap{overflow:hidden;border-radius:14px;position:relative}
  .img-zoom{transition:transform .7s cubic-bezier(.22,1,.36,1)}
  .img-zoom-wrap:hover .img-zoom{transform:scale(1.05)}

  /* about section — feature rows + floating scorecard */
  .about-item{display:flex;align-items:flex-start;gap:14px}
  .about-ic{width:38px;height:38px;flex-shrink:0;border-radius:10px;background:#e7f4f5;border:1px solid rgba(0,147,157,.16);color:#00939d;display:flex;align-items:center;justify-content:center;transition:background .3s ease,color .3s ease,border-color .3s ease,transform .3s cubic-bezier(.34,1.56,.64,1)}
  .about-ic svg{width:17px;height:17px}
  .about-item:hover .about-ic{background:#0d4145;border-color:#0d4145;color:#7cccd1;transform:translateY(-2px)}
  .about-t{font-weight:700;font-size:13.5px;color:#111827;margin-bottom:2px}
  .about-d{font-size:12.5px;color:#1F2937;opacity:.62;line-height:1.75}
  .about-btn svg{transition:transform .3s cubic-bezier(.34,1.56,.64,1)}
  .about-btn:hover svg{transform:translateX(-5px)}
  .about-pic{position:relative}
  .float-card{
    position:absolute;bottom:18px;left:18px;z-index:10;
    display:flex;align-items:center;gap:11px;
    background:rgba(255,255,255,.94);backdrop-filter:blur(10px);
    border:1px solid rgba(13,65,69,.09);border-radius:14px;
    box-shadow:0 16px 34px rgba(13,65,69,.18);
    padding:11px 16px;
  }
  .float-ic{width:34px;height:34px;flex-shrink:0;border-radius:10px;background:linear-gradient(135deg,#0d4145,#16656b);color:#7cccd1;display:flex;align-items:center;justify-content:center}
  .float-ic svg{width:16px;height:16px}
  .float-num{font-size:21px;font-weight:800;color:#0d4145;letter-spacing:-.02em;line-height:1}
  .float-label{font-size:11px;line-height:1.4;color:#1F2937;opacity:.75}

  .skip-link{position:absolute;right:16px;top:-60px;z-index:100;background:#0d4145;color:#fff;padding:12px 20px;border-radius:8px;font-weight:700;font-size:14px;transition:top .25s ease}
  .skip-link:focus{top:12px;outline:2px solid #7cccd1;outline-offset:2px}

  [x-cloak]{display:none !important}

  .footer-link{transition:color .2s ease,padding-right .25s ease}
  .footer-link:hover{color:#b7dee0;padding-right:6px}
  .social{display:flex;align-items:center;justify-content:center;width:36px;height:36px;border-radius:8px;background:rgba(255,255,255,.06);transition:background .2s,transform .3s cubic-bezier(.34,1.56,.64,1)}
  .social:hover{background:rgba(0,147,157,.2);transform:translateY(-3px)}

  /* stats strip */
  .stat-num{font-variant-numeric:tabular-nums;letter-spacing:-.02em}
  .stat-item{position:relative;transition:transform .3s cubic-bezier(.22,1,.36,1)}
  .stat-item:hover{transform:translateY(-3px)}
  .stat-prefix{color:#00939d;font-size:1.35em;font-weight:700;vertical-align:baseline}
  .stat-suffix{color:#16656b;font-size:.55em;font-weight:600}
  .stat-kicker{display:inline-flex;align-items:center;gap:6px;color:#00939d;font-size:10px;font-weight:600;letter-spacing:.02em;text-transform:uppercase;margin-bottom:6px}
  .stat-kicker-line{width:14px;height:2px;border-radius:2px;background:linear-gradient(90deg,#00939d,#7cccd1)}
  .stat-label{color:#1F2937;font-size:12.5px;opacity:.75;margin-top:4px}
  .stat-line{
    margin:10px auto 0;width:0;height:2px;border-radius:2px;
    background:linear-gradient(90deg,#00939d,#7cccd1);
    transition:width .8s cubic-bezier(.22,1,.36,1) .2s;
  }
  .stat-item:hover .stat-line{width:32px}

  /* process — compact card rail (replaces the old vertical timeline).
     A faint right-to-left thread runs behind the step chips with a small
     glowing dot drifting leftward like a boat on the tide; each card also
     draws its own tide underline in from the right on hover. */
  .proc-flow{position:absolute;top:58px;right:5%;left:5%;height:2px;border-radius:2px;
    background:linear-gradient(90deg,transparent,#00939d 12%,#7cccd1 50%,#00939d 88%,transparent);
    z-index:0;pointer-events:none}
  .proc-flow::after{content:'';position:absolute;top:-4px;width:10px;height:10px;border-radius:50%;
    background:#00939d;box-shadow:0 0 0 5px rgba(0,147,157,.15);
    animation:procFlow 3.2s ease-in-out infinite alternate}
  @keyframes procFlow{0%{right:6%}100%{right:88%}}
  .proc-card{position:relative;z-index:10;overflow:hidden}
  .proc-step{display:inline-flex;align-items:center;gap:5px;padding:5px 13px;border-radius:999px;
    background:linear-gradient(135deg,#00939d,#2b969e);color:#fff;font-size:12px;font-weight:700;line-height:1;
    box-shadow:0 4px 12px rgba(0,147,157,.22)}
  .proc-step i{width:5px;height:5px;border-radius:50%;background:#b7dee0}
  .proc-ic{width:52px;height:52px;border-radius:14px;background:#e7f4f5;border:1px solid rgba(0,147,157,.16);
    color:#00939d;display:flex;align-items:center;justify-content:center;
    margin-top:18px;margin-bottom:16px;
    transition:background .4s,border-color .4s,color .4s,transform .35s cubic-bezier(.34,1.56,.64,1)}
  .proc-ic svg{width:24px;height:24px}
  .proc-card:hover .proc-ic{background:#0d4145;border-color:#0d4145;color:#7cccd1;transform:translateY(-2px)}
  .proc-tide{position:absolute;right:20px;left:20px;bottom:16px;height:3px;border-radius:2px;
    background:linear-gradient(90deg,#00939d,#7cccd1);
    transform:scaleX(.28);transform-origin:right;opacity:.45;
    transition:transform .5s cubic-bezier(.22,1,.36,1),opacity .4s ease}
  .proc-card:hover .proc-tide{transform:scaleX(1);opacity:1}
  @media (prefers-reduced-motion:reduce){.proc-flow::after{animation:none;opacity:.6}}
  @media (max-width:1023px){.proc-flow{display:none}}

  /* services — welded continuation of the process thread.
     The process rail (.proc-flow) ends where this section begins; we replay the
     same gradient thread + drifting glow at the very top of services so the tide
     visibly "flows down" from the step cards above into the glass cards here,
     then melts out of white into canvas-100 via a soft fade band. Numbered
     ۰۵–۱۰ so the six solutions read as the direct continuation of the four
     process steps (۰۱–۰۴), all in existing .reveal-scale→.in (no new JS). */
  .svc-flow{position:absolute;top:0;left:0;right:0;height:116px;z-index:0;pointer-events:none;overflow:hidden;
    background:linear-gradient(180deg,#FAFCFC 0%,rgba(244,248,248,0) 100%)}
  .svc-flow::before{content:'';position:absolute;top:58px;left:0;right:0;height:2px;border-radius:2px;
    background:linear-gradient(90deg,transparent,#00939d 10%,#7cccd1 50%,#00939d 90%,transparent);opacity:.5}
  .svc-flow-dot{position:absolute;top:54px;width:10px;height:10px;border-radius:50%;
    background:#00939d;box-shadow:0 0 0 5px rgba(0,147,157,.14),0 0 14px rgba(0,147,157,.55);
    opacity:0;animation:svcFlowDot 3.6s ease-in-out .3s infinite alternate,svcDotIn .7s ease .2s forwards}
  @keyframes svcDotIn{to{opacity:1}}
  @keyframes svcFlowDot{0%{right:6%}100%{right:88%}}
  .svc-flow-sweep{position:absolute;top:0;left:0;right:0;bottom:0;
    background:linear-gradient(100deg,transparent 30%,rgba(124,204,209,.18) 46%,rgba(255,255,255,.55) 50%,rgba(0,147,157,.16) 54%,transparent 72%);
    background-size:200% 100%;background-position:120% 0;opacity:.6;
    animation:svcSweep 6s ease-in-out infinite}
  @keyframes svcSweep{0%{background-position:120% 0}100%{background-position:-120% 0}}
  .svc-hrd{display:flex;align-items:center;justify-content:center;gap:6px;margin-top:22px}
  .svc-hrd i{width:5px;height:5px;border-radius:50%;background:#b7dee0;transition:background .3s}
  .svc-hrd i:nth-child(2){width:30px;height:2px;border-radius:2px;background:linear-gradient(90deg,#00939d,#7cccd1)}

  .svc-card{position:relative;isolation:isolate;overflow:hidden;
    background:#fff;border:1px solid #E9F2F2;border-radius:16px;
    padding:30px 26px 34px;
    box-shadow:0 1px 2px rgba(13,65,69,.03);
    transition:transform .35s cubic-bezier(.22,1,.36,1),box-shadow .4s ease,border-color .35s ease}
  .svc-card::before{content:'';position:absolute;top:0;right:0;left:0;height:3px;border-radius:3px;
    background:linear-gradient(90deg,#00939d,#7cccd1);
    transform:scaleX(0);transform-origin:right;opacity:0;
    transition:transform .5s cubic-bezier(.22,1,.36,1),opacity .4s ease}
  .svc-card:hover{transform:translateY(-6px);border-color:rgba(0,147,157,.35);
    box-shadow:0 20px 44px rgba(0,147,157,.14)}
  .svc-card:hover::before{transform:scaleX(1);opacity:1}
  .svc-num{position:absolute;top:18px;left:20px;font-weight:800;font-size:32px;line-height:1;letter-spacing:-.02em;
    color:#c9e6e9;z-index:0;opacity:0;transform:translateY(6px);
    transition:color .4s ease,opacity .5s ease .1s,transform .5s ease .1s}
  .svc-card.in .svc-num{opacity:.75;transform:translateY(0)}
  .svc-card:hover .svc-num{color:#00939d;opacity:1}
  .svc-ic{width:56px;height:56px;border-radius:15px;background:#fff;border:1.5px solid rgba(0,147,157,.28);color:#00939d;
    display:flex;align-items:center;justify-content:center;margin-bottom:18px;position:relative;z-index:1;
    box-shadow:0 6px 14px rgba(13,65,69,.06);
    transition:background .35s,border-color .35s,color .35s,transform .35s cubic-bezier(.34,1.56,.64,1)}
  .svc-ic svg{width:24px;height:24px}
  .svc-card:hover .svc-ic{background:#0d4145;border-color:#0d4145;color:#7cccd1;transform:translateY(-2px)}
  .svc-title{position:relative;z-index:1;font-size:16.5px;font-weight:700;color:#111827;margin-bottom:9px}
  .svc-desc{position:relative;z-index:1;font-size:14px;color:#1F2937;opacity:.62;line-height:1.8}
  .svc-waterline{position:absolute;right:18px;left:18px;bottom:0;height:3px;border-radius:3px;
    background:linear-gradient(90deg,#00939d,#7cccd1);
    transform:scaleX(0);transform-origin:right;opacity:0;
    transition:transform .6s cubic-bezier(.22,1,.36,1),opacity .5s ease}
  .svc-card.in .svc-waterline{transform:scaleX(.45);opacity:.55}
  .svc-card:hover .svc-waterline{transform:scaleX(1);opacity:1}
  @media (prefers-reduced-motion:reduce){
    .svc-flow-dot,.svc-flow-sweep,.svc-card::before,.svc-waterline{animation:none !important;transition:none !important}
    .svc-num,.svc-card.in .svc-num{opacity:.75;transform:none}}

  /* portfolio — canvas-tide-welded compact cards.
     Opens on the same canvas tone as services above AND testimonials below
     (both bg-canvas-100), so the seam melts each side; a full-width tide
     hairline + drifting glow dot (.pf-rail) continues the svc-flow thread,
     and a faint dot-grid wash keeps it packed yet airy. */
  .pf-bg{isolation:isolate;
    background:
      radial-gradient(52% 34% at 50% 0,rgba(0,147,157,.06),transparent 70%),
      linear-gradient(180deg,#F4F8F8 0%,#EEF5F5 40%,#F4F8F8 100%)}
  .pf-bg::before{content:'';position:absolute;inset:0;z-index:0;pointer-events:none;
    background-image:radial-gradient(rgba(0,147,157,.14) 1px,transparent 1.6px);
    background-size:26px 26px;background-position:center;opacity:.45;
    -webkit-mask-image:linear-gradient(180deg,transparent,#000 34%,#000 66%,transparent);
            mask-image:linear-gradient(180deg,transparent,#000 34%,#000 66%,transparent)}
  .pf-rail{position:absolute;left:6%;right:6%;top:190px;height:2px;border-radius:2px;z-index:1;pointer-events:none;
    background:linear-gradient(90deg,transparent,#00939d 14%,#7cccd1 50%,#00939d 86%,transparent);opacity:.38}
  .pf-rail::after{content:'';position:absolute;top:-4px;width:10px;height:10px;border-radius:50%;
    background:#00939d;box-shadow:0 0 0 5px rgba(0,147,157,.14),0 0 14px rgba(0,147,157,.55);
    right:8%;animation:pfDrift 3.6s ease-in-out infinite alternate}
  @keyframes pfDrift{0%{right:8%}100%{right:86%}}
  .pf-card{position:relative;z-index:2;isolation:isolate;overflow:hidden;
    background:#fff;border:1px solid rgba(233,242,242,.9);border-radius:16px;
    box-shadow:0 1px 2px rgba(13,65,69,.04);
    transition:transform .35s cubic-bezier(.22,1,.36,1),box-shadow .4s ease,border-color .35s ease}
  .pf-card::before{content:'';position:absolute;top:0;right:0;left:0;height:3px;border-radius:3px;
    background:linear-gradient(90deg,#00939d,#7cccd1);transform:scaleX(0);transform-origin:right;opacity:0;
    transition:transform .5s cubic-bezier(.22,1,.36,1),opacity .4s ease}
  .pf-card:hover{transform:translateY(-5px);border-color:rgba(0,147,157,.35);
    box-shadow:0 18px 40px rgba(0,147,157,.12)}
  .pf-card:hover::before{transform:scaleX(1);opacity:1}
  .pf-cover{position:relative;overflow:hidden;
    background:linear-gradient(135deg,#eaf3f3,#d9eaea)}
  .pf-cover svg{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);
    width:34px;height:34px;color:#a4c8c8;
    transition:transform .5s cubic-bezier(.22,1,.36,1),color .3s ease}
  .pf-cover::after{content:'';position:absolute;inset:0;pointer-events:none;
    background:linear-gradient(180deg,rgba(250,252,252,0) 52%,rgba(234,244,244,.9) 100%)}
  .pf-card:hover .pf-cover svg{transform:translate(-50%,-50%) scale(1.18);color:#00939d}
  .pf-chip{position:relative;z-index:2}
  .pf-title{font-size:15px;font-weight:700;color:#111827;line-height:1.5}
  .pf-desc{font-size:13px;color:#1F2937;opacity:.6;line-height:1.75}
  .pf-cta{display:inline-flex;align-items:center;gap:6px;font-size:13px;font-weight:600;color:#00939d;
    transition:color .3s ease}
  .pf-cta i{width:15px;height:15px;flex-shrink:0;
    transition:transform .3s cubic-bezier(.34,1.56,.64,1)}
  .pf-card:hover .pf-cta{color:#0d4145}
  .pf-card:hover .pf-cta i{transform:translateX(-4px)}
  @media (prefers-reduced-motion:reduce){
    .pf-rail::after,.pf-card::before,.pf-cover svg,.pf-cta i{animation:none;transition:none}
    .pf-rail::after{opacity:.7;right:50%}
    .pf-bg::before{opacity:.4}}
  @media (max-width:767px){.pf-rail{display:none}}

  /* testimonials — deep-sea glass haven.
     A dark ink-900/teal rounded band pinned between the light pf-card grid
     above and the light TEAM section below — categorically unlike every light
     card row on the page: navy body, drifting tide hairline, faint brand
     noise-wave, glow orbits, a glowing glass carousel panel, and a hairline
     seam that closes the band back into the light section. Reuses the page's
     real .tide motif and the existing pfDrift keyframe. */
  .ds-band{
    isolation:isolate;
    background:
      radial-gradient(120% 90% at 50% -10%, rgba(43,150,158,.08) 0%, transparent 55%),
      radial-gradient(90% 70% at 110% 110%, rgba(0,147,157,.06) 0%, transparent 55%),
      linear-gradient(180deg,#F4F8F8 0%,#EDF4F4 45%,#F4F8F8 100%);
    box-shadow:0 20px 44px -30px rgba(13,65,69,.16), inset 0 1px 0 #fff;
  }
  .ds-hairline{position:absolute;top:0;left:10%;right:10%;height:2px;border-radius:2px;z-index:2;
    background:linear-gradient(90deg,transparent,#00939d 16%,#7cccd1 50%,#00939d 84%,transparent);
    opacity:.85}
  .ds-drift{position:absolute;top:-4px;width:9px;height:9px;border-radius:50%;
    background:#7cccd1;box-shadow:0 0 0 4px rgba(0,147,157,.14),0 0 12px rgba(124,204,209,.45);
    animation:pfDrift 6s ease-in-out infinite alternate}
  .ds-wave{position:absolute;inset:auto 0 0 0;height:70%;z-index:0;pointer-events:none;opacity:.32;
    background:repeating-radial-gradient(circle at 18% 40%, rgba(0,147,157,.08) 0 1px, transparent 1px 26px);
    -webkit-mask-image:linear-gradient(180deg,transparent 20%,#000 78%);mask-image:linear-gradient(180deg,transparent 20%,#000 78%)}
  .ds-wave-b{transform:scaleX(-1);opacity:.18;height:54%}
  .ds-glow-orbit{position:absolute;border-radius:50%;z-index:0;pointer-events:none;filter:blur(8px);opacity:.4}
  .ds-glow-tl{top:-90px;left:-70px;width:230px;height:230px;background:radial-gradient(circle,rgba(0,147,157,.20),transparent 65%)}
  .ds-glow-br{bottom:-90px;right:-70px;width:230px;height:230px;background:radial-gradient(circle,rgba(43,150,158,.14),transparent 65%)}
  .ds-tide{box-shadow:0 0 10px rgba(0,147,157,.30)}
  .ds-glass{background:linear-gradient(160deg,rgba(255,255,255,.85),rgba(255,255,255,.5));
    border:1px solid rgba(0,147,157,.16);backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);
    box-shadow:inset 0 1px 0 #fff,0 22px 44px -22px rgba(13,65,69,.25);
    position:relative}
  .ds-glass::before{content:'';position:absolute;top:0;right:0;left:0;height:1px;
    background:linear-gradient(90deg,transparent,rgba(0,147,157,.4),transparent);opacity:.5}
  .ds-xlmark{position:absolute;top:6px;right:50%;transform:translateX(50%);z-index:0;pointer-events:none;
    font-family:Georgia,serif;line-height:1;font-size:150px;color:rgba(0,147,157,.09);
    filter:drop-shadow(0 0 18px rgba(0,147,157,.15))}
  .ds-star{display:inline-block;width:15px;height:15px;margin:0 1px;background:#00939d;
    -webkit-clip-path:polygon(50% 0,61% 35%,98% 35%,68% 57%,79% 91%,50% 70%,21% 91%,32% 57%,2% 35%,39% 35%);
            clip-path:polygon(50% 0,61% 35%,98% 35%,68% 57%,79% 91%,50% 70%,21% 91%,32% 57%,2% 35%,39% 35%);
    box-shadow:0 0 8px rgba(0,147,157,.35)}
  .ds-quote{margin:0}
  .ds-quote[x-cloak]{display:none}
  .ds-quote-text{color:rgba(17,24,39,.85)}
  .ds-ring{position:relative;display:flex;align-items:center;justify-content:center;
    width:48px;height:48px;border-radius:50%;font-weight:700;font-size:15px;
    background:conic-gradient(from 180deg,#00939d,#7cccd1,#00939d)}
  .ds-ring::after{content:'';position:absolute;inset:3px;border-radius:50%;background:#fff}
  .ds-ring span{position:relative;z-index:1;color:#00939d}
  .ds-arrow{width:40px;height:40px;border-radius:11px;flex-shrink:0;display:flex;align-items:center;justify-content:center;
    color:#00939d;background:#fff;border:1px solid rgba(0,147,157,.28);
    transition:background .25s,border-color .25s,transform .3s cubic-bezier(.34,1.56,.64,1)}
  .ds-arrow:hover{background:#e7f4f5;border-color:rgba(0,147,157,.5);transform:translateY(-2px)}
  .ds-arrow:focus-visible,.ds-dot:focus-visible{outline:2px solid #00939d;outline-offset:2px}
  .ds-dot{width:10px;height:10px;border-radius:50%;background:rgba(0,147,157,.25);
    transition:background .25s,transform .3s cubic-bezier(.34,1.56,.64,1)}
  .ds-dot-on{background:#00939d;box-shadow:0 0 10px rgba(0,147,157,.55);transform:scale(1.25)}
  .ds-seam{position:absolute;bottom:0;left:12%;right:12%;height:2px;border-radius:2px;z-index:2;
    background:linear-gradient(90deg,transparent,#00939d 22%,#7cccd1 50%,#00939d 78%,transparent)}
  .ds-seam-glow{position:absolute;top:-4px;width:10px;height:10px;border-radius:50%;opacity:0}
  @media (prefers-reduced-motion:reduce){
    .ds-drift{animation:none;opacity:.6}
    .ds-quote,.ds-arrow,.ds-dot{transition:none !important}
    .ds-wave,.ds-glow-orbit,.ds-tide,.ds-xlmark,.ds-star{animation:none !important}
  }

  /* team — compact welded light band.
     Rolls the old tall 2-col split into a tight band welded to the
     testimonial haven above: same canvas family, a tide hairline +
     drifting glow dot (.tm-rail/.tm-drift) continues the ds-seam thread,
     a shaded pedestal (.tm-slab) floats the sea photo in a glass frame
     under a floating number badge, and the text side stays dense — axis
     pill, giant soft quote mark behind the heading, numbered mini-rows,
     CTA. */
  .tm-band{isolation:isolate;
    background:
      radial-gradient(58% 42% at 100% 0,rgba(0,147,157,.055),transparent 62%),
      radial-gradient(46% 36% at 0% 100%,rgba(0,147,157,.04),transparent 60%),
      linear-gradient(180deg,#F4F8F8 0%,#F0F6F6 46%,#F4F8F8 100%)}
  .tm-band::after{content:'';position:absolute;inset:0;z-index:0;pointer-events:none;
    background-image:radial-gradient(rgba(0,147,157,.12) 1px,transparent 1.6px);
    background-size:26px 26px;background-position:center;opacity:.3;
    -webkit-mask-image:linear-gradient(180deg,transparent,#000 28%,#000 64%,transparent);
            mask-image:linear-gradient(180deg,transparent,#000 28%,#000 64%,transparent)}
  .tm-rail{position:absolute;top:0;left:10%;right:10%;height:2px;border-radius:2px;z-index:2;
    background:linear-gradient(90deg,transparent,#00939d 16%,#7cccd1 50%,#00939d 84%,transparent);
    opacity:.85}
  .tm-drift{position:absolute;top:-4px;width:9px;height:9px;border-radius:50%;
    background:#7cccd1;box-shadow:0 0 0 4px rgba(0,147,157,.14),0 0 12px rgba(124,204,209,.45);
    animation:pfDrift 6s ease-in-out infinite alternate}

  .tm-axis{display:inline-flex;align-items:center;gap:8px;margin-bottom:14px;
    padding:6px 14px;border-radius:999px;
    background:#fff;border:1px solid rgba(0,147,157,.18);
    color:#16656b;font-size:12px;font-weight:700;
    box-shadow:0 1px 2px rgba(13,65,69,.04)}
  .tm-axis::before{content:'';width:7px;height:7px;border-radius:50%;
    background:linear-gradient(135deg,#00939d,#7cccd1)}
  .tm-title{position:relative}
  .tm-xlmark{position:absolute;top:-8px;right:-4px;z-index:0;pointer-events:none;
    font-family:Georgia,serif;line-height:1;font-size:122px;color:rgba(0,147,157,.085);
    filter:drop-shadow(0 0 16px rgba(0,147,157,.12))}

  .tm-pedestal{position:relative}
  .tm-slab{position:absolute;top:18px;right:-12px;bottom:-14px;left:22px;z-index:0;
    border-radius:22px;
    background:linear-gradient(135deg,#d9eaea,#eef5f5);
    border:1px solid rgba(0,147,157,.12);
    box-shadow:inset 0 1px 0 rgba(255,255,255,.7)}
  .tm-frame{position:relative;z-index:10;
    border:1px solid rgba(255,255,255,.6);
    box-shadow:0 24px 48px -22px rgba(13,65,69,.32),0 6px 16px rgba(13,65,69,.08)}
  .tm-badge{position:absolute;bottom:16px;left:16px;z-index:20;
    display:flex;align-items:center;gap:10px;
    background:rgba(255,255,255,.95);backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);
    border:1px solid rgba(13,65,69,.09);border-radius:13px;
    box-shadow:0 14px 30px rgba(13,65,69,.16);
    padding:10px 16px;
    transition:transform .35s cubic-bezier(.34,1.56,.64,1)}
  .tm-badge:hover{transform:translateY(-2px)}
  .tm-badge-ic{width:32px;height:32px;flex-shrink:0;border-radius:9px;
    background:linear-gradient(135deg,#0d4145,#16656b);color:#7cccd1;
    display:flex;align-items:center;justify-content:center}
  .tm-badge-ic svg{width:15px;height:15px}
  .tm-badge-num{font-size:19px;font-weight:800;color:#0d4145;line-height:1;letter-spacing:-.02em}
  .tm-badge-label{font-size:11px;line-height:1.4;color:#1F2937;opacity:.72}
  .tm-live{position:absolute;top:-5px;left:-5px;width:12px;height:12px;border-radius:50%;
    background:#7cccd1;box-shadow:0 0 0 4px rgba(255,255,255,.95);
    animation:tmPulse 2.6s ease-in-out infinite}
  .tm-live::after{content:'';position:absolute;inset:-3px;border-radius:50%;
    border:1.5px solid rgba(0,147,157,.45);
    animation:tmPing 2.6s ease-out infinite}
  @keyframes tmPulse{0%,100%{opacity:.75}50%{opacity:1}}
  @keyframes tmPing{0%{transform:scale(.55);opacity:.9}100%{transform:scale(1.55);opacity:0}}

  .tm-mini{display:flex;flex-direction:column;gap:10px}
  .tm-row{position:relative;overflow:hidden;display:flex;align-items:center;gap:12px;
    background:#fff;border:1px solid rgba(0,147,157,.14);border-radius:12px;
    padding:11px 14px;box-shadow:0 1px 2px rgba(13,65,69,.03);
    transition:transform .3s cubic-bezier(.22,1,.36,1),border-color .3s ease,box-shadow .35s ease}
  .tm-row:hover{transform:translateY(-2px);border-color:rgba(0,147,157,.38);box-shadow:0 10px 24px rgba(0,147,157,.1)}
  .tm-row::after{content:'';position:absolute;right:14px;left:14px;bottom:0;height:2px;border-radius:2px;
    background:linear-gradient(90deg,#00939d,#7cccd1);
    transform:scaleX(0);transform-origin:right;opacity:0;
    transition:transform .45s cubic-bezier(.22,1,.36,1),opacity .35s ease}
  .tm-row:hover::after{transform:scaleX(1);opacity:1}
  .tm-num{width:34px;height:34px;flex-shrink:0;border-radius:10px;
    display:flex;align-items:center;justify-content:center;
    background:linear-gradient(135deg,#00939d,#2b969e);color:#fff;
    font-size:12px;font-weight:800;
    box-shadow:0 4px 12px rgba(0,147,157,.2)}
  .tm-row-t{font-size:14px;font-weight:700;color:#111827;margin-bottom:1px}
  .tm-row-d{font-size:12.5px;color:#1F2937;opacity:.6;line-height:1.6}

  .tm-cta svg{transition:transform .3s cubic-bezier(.34,1.56,.64,1)}
  .tm-cta:hover svg{transform:translateX(-5px)}
  @media (prefers-reduced-motion:reduce){
    .tm-drift{animation:none;opacity:.6}
    .tm-live,.tm-live::after{animation:none !important;opacity:.8}
    .tm-badge,.tm-row,.tm-row::after,.tm-cta svg{transition:none !important}
  }

  /* faq accordion — soft card items with tide accents */
  .faq-list{display:flex;flex-direction:column;gap:10px}
  .faq-item{background:#fff;border:1px solid #E9F2F2;border-radius:14px;
    padding:2px 18px;position:relative;overflow:hidden;
    box-shadow:0 1px 2px rgba(13,65,69,.03);
    transition:border-color .3s ease,box-shadow .35s ease,transform .3s cubic-bezier(.22,1,.36,1)}
  .faq-item::before{content:'';position:absolute;top:0;right:0;left:0;height:2px;border-radius:2px;
    background:linear-gradient(90deg,#00939d,#7cccd1);transform:scaleX(0);transform-origin:right;
    opacity:0;transition:transform .5s cubic-bezier(.22,1,.36,1),opacity .4s ease}
  .faq-item.open{border-color:rgba(0,147,157,.3);box-shadow:0 12px 28px -14px rgba(0,147,157,.18)}
  .faq-item.open::before{transform:scaleX(1);opacity:1}
  .faq-btn{display:flex;align-items:center;gap:12px;width:100%;text-align:right;
    padding:15px 0;cursor:pointer;transition:color .2s ease}
  .faq-btn:hover{color:#16656b}
  .faq-q{display:flex;align-items:center;gap:12px;flex:1}
  .faq-qi{width:30px;height:30px;flex-shrink:0;border-radius:9px;
    background:#e7f4f5;border:1px solid rgba(0,147,157,.16);color:#00939d;
    display:flex;align-items:center;justify-content:center;
    transition:background .3s ease,color .3s ease,transform .3s cubic-bezier(.34,1.56,.64,1)}
  .faq-qi svg{width:14px;height:14px}
  .faq-item.open .faq-qi{background:#0d4145;color:#7cccd1;transform:rotate(-3deg)}
  .faq-chevron{width:22px;height:22px;flex-shrink:0;color:#00939d;
    transition:transform .35s cubic-bezier(.34,1.56,.64,1)}
  .faq-item.open .faq-chevron{transform:rotate(180deg)}
  .faq-a{display:grid;grid-template-rows:0fr;transition:grid-template-rows .4s cubic-bezier(.22,1,.36,1)}
  .faq-item.open .faq-a{grid-template-rows:1fr}
  .faq-a-in{overflow:hidden;min-height:0}
  .faq-a-in p{padding:0 0 16px 8px;color:#1F2937;opacity:.68;font-size:14px;line-height:1.9}

  /* ============ team — compact split-panel welded to the light testimonials band ============
     Same canvas family as the ds-band above, so the two tide seams fuse into one running
     thread: the testimonials band closes with .ds-seam, the team section opens with
     .tm-seam (same gradient hairline + reusing the existing pfDrift glow dot). The sea/hand
     image stands on a glass pedestal (.tm-ped) with a numbered badge + verdict tag floating
     over it and a signature quote parked on the pedestal shoulder; the text side keeps a
     compact rhythm of intro, mini-rows, tiled chips and a teal-underline ghost CTA. */
  .tm-seam{position:absolute;top:0;left:8%;right:8%;height:2px;border-radius:2px;z-index:2;
    background:linear-gradient(90deg,transparent,#00939d 16%,#7cccd1 50%,#00939d 84%,transparent);
    opacity:.7}
  .tm-seam-dot{position:absolute;top:-4px;width:9px;height:9px;border-radius:50%;
    background:#00939d;box-shadow:0 0 0 4px rgba(0,147,157,.13),0 0 12px rgba(0,147,157,.5);
    animation:pfDrift 5.4s ease-in-out infinite alternate;opacity:.9}

  .tm-ped{position:relative;padding:12px;border-radius:1.5rem;
    background:linear-gradient(160deg,rgba(255,255,255,.9),rgba(255,255,255,.62));
    border:1px solid rgba(0,147,157,.13);
    box-shadow:inset 0 1px 0 #fff,0 26px 52px -26px rgba(13,65,69,.26),0 0 0 8px rgba(255,255,255,.5)}
  .tm-ped::before{content:'';position:absolute;top:0;right:12%;left:12%;height:2px;border-radius:2px;
    background:linear-gradient(90deg,transparent,#00939d,#7cccd1,#00939d,transparent);
    opacity:.55;animation:tmGlimmer 4.4s ease-in-out infinite}
  @keyframes tmGlimmer{0%,100%{opacity:.35}50%{opacity:.85}}
  .tm-frame{position:relative;overflow:hidden;border-radius:1.1rem;
    box-shadow:0 14px 30px -14px rgba(13,65,69,.24)}
  .tm-frame img{display:block;width:100%;height:19rem;object-fit:cover}
  .tm-frame::after{content:'';position:absolute;inset:0;pointer-events:none;
    background:linear-gradient(180deg,rgba(250,252,252,0) 62%,rgba(11,44,50,.34) 100%)}
  .tm-frame::before{content:'';position:absolute;top:0;right:0;left:0;height:2px;border-radius:2px;z-index:3;
    background:linear-gradient(90deg,transparent,#7cccd1 35%,rgba(255,255,255,.9) 50%,#7cccd1 65%,transparent);
    background-size:220% 100%;background-position:170% 0;
    animation:tmShimmer 4s ease-in-out infinite}
  @keyframes tmShimmer{55%,100%{background-position:-70% 0}}

  .tm-badge{position:absolute;top:14px;left:14px;z-index:4;display:flex;align-items:center;gap:9px;
    padding:8px 13px;border-radius:13px;
    background:rgba(255,255,255,.9);backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);
    border:1px solid rgba(13,65,69,.1);
    box-shadow:0 12px 26px -10px rgba(13,65,69,.35),inset 0 1px 0 #fff;
    animation:tmBadgeFloat 4.5s ease-in-out infinite}
  @keyframes tmBadgeFloat{0%,100%{transform:translateY(0)}50%{transform:translateY(-5px)}}
  .tm-badge-num{font-size:19px;font-weight:800;color:#0d4145;line-height:1}
  .tm-badge-lbl{display:flex;flex-direction:column;align-items:flex-start;line-height:1.25}
  .tm-badge-t{font-size:11px;font-weight:700;color:#111827}
  .tm-badge-s{font-size:10px;color:#1F2937;opacity:.62}
  .tm-tag{position:absolute;bottom:14px;right:14px;z-index:4;display:inline-flex;align-items:center;gap:6px;
    padding:5px 11px;border-radius:999px;
    background:rgba(255,255,255,.92);backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
    border:1px solid rgba(255,255,255,.75);
    box-shadow:0 8px 18px -8px rgba(13,65,69,.4),inset 0 1px 0 #fff;
    font-size:11px;font-weight:700;color:#16656b}
  .tm-tag i{display:inline-flex}

  .tm-quote{position:absolute;bottom:-1px;right:26px;z-index:4;margin:0;max-width:14rem;padding:12px 15px 13px;
    border-radius:14px 14px 14px 4px;
    background:rgba(255,255,255,.92);backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);
    border:1px solid rgba(0,147,157,.1);
    box-shadow:0 16px 34px -16px rgba(13,65,69,.4),inset 0 1px 0 #fff;
    animation:tmQuoteDrift 6s ease-in-out infinite}
  @keyframes tmQuoteDrift{0%,100%{transform:translateY(0)}50%{transform:translateY(-3px)}}
  .tm-quote::before{content:'“';display:block;font-family:Georgia,serif;font-size:22px;line-height:.8;
    color:#00939d;margin-bottom:5px}
  .tm-quote-t{font-size:12px;line-height:1.75;color:#1F2937;opacity:.85}
  .tm-quote-a{display:block;margin-top:5px;font-size:10.5px;font-weight:700;color:#00939d}

  .tm-mini{display:flex;align-items:center;gap:8px;color:#16656b;font-size:12.5px;font-weight:600}
  .tm-mini i{width:6px;height:6px;border-radius:50%;flex-shrink:0;
    background:linear-gradient(135deg,#00939d,#7cccd1);box-shadow:0 0 0 3px rgba(0,147,157,.12)}
  .tm-mini span{color:#1F2937;font-weight:400;opacity:.7;font-size:12px}

  .tm-chip{display:flex;align-items:center;gap:10px;padding:13px 15px;border-radius:13px;
    background:#fff;border:1px solid rgba(13,65,69,.08);
    box-shadow:0 1px 2px rgba(13,65,69,.04);
    transition:transform .3s cubic-bezier(.22,1,.36,1),border-color .3s ease,box-shadow .35s ease}
  .tm-chip:hover{transform:translateY(-3px);border-color:rgba(0,147,157,.4);
    box-shadow:0 12px 26px -12px rgba(0,147,157,.22)}
  .tm-chip-ic{width:34px;height:34px;flex-shrink:0;border-radius:10px;
    background:#e7f4f5;border:1px solid rgba(0,147,157,.16);color:#00939d;
    display:flex;align-items:center;justify-content:center;
    transition:background .3s ease,color .3s ease,transform .3s cubic-bezier(.34,1.56,.64,1)}
  .tm-chip-ic svg{width:16px;height:16px}
  .tm-chip:hover .tm-chip-ic{background:#0d4145;color:#7cccd1;transform:translateY(-2px)}
  .tm-chip-t{display:flex;flex-direction:column;align-items:flex-start}
  .tm-chip-t b{font-size:12.5px;font-weight:700;color:#111827}
  .tm-chip-t span{font-size:11px;color:#1F2937;opacity:.6}

  .tm-cta{position:relative;display:inline-flex;align-items:center;gap:8px;padding:7px 0;
    font-size:14px;font-weight:700;color:#16656b;transition:color .3s ease}
  .tm-cta::after{content:'';position:absolute;bottom:0;right:0;height:2px;width:100%;border-radius:2px;
    background:linear-gradient(90deg,#00939d,#7cccd1);
    transform-origin:right;transform:scaleX(.3);opacity:.5;
    transition:transform .45s cubic-bezier(.22,1,.36,1),opacity .3s ease}
  .tm-cta i{width:16px;height:16px;flex-shrink:0;
    transition:transform .3s cubic-bezier(.34,1.56,.64,1)}
  .tm-cta:hover{color:#0d4145}
  .tm-cta:hover::after{transform:scaleX(1);opacity:1}
  .tm-cta:hover i{transform:translateX(-5px)}
  .tm-cta:focus-visible{outline:2px solid #00939d;outline-offset:4px;border-radius:4px}

  @media (max-width:767px){
    .tm-frame img{height:15rem}
    .tm-badge{top:10px;left:10px}
    .tm-quote{display:none}
  }
  @media (prefers-reduced-motion:reduce){
    .tm-seam-dot,.tm-ped::before,.tm-frame::before,.tm-badge,.tm-quote{animation:none !important;transition:none !important}
    .tm-badge,.tm-quote{transform:none !important}
  }

  @media (prefers-reduced-motion:reduce){
    .reveal,.reveal-scale,.hero-in,.card,.img-zoom,.btn,.tide::after{animation:none !important;transition:none !important}
    .reveal,.reveal-scale,.hero-in{opacity:1;transform:none}
  }
</style>
</head>
<body class="font-sahel antialiased">

<a href="#main" class="skip-link">پرش به محتوا</a>

<nav id="nav" class="nav-glass fixed top-0 inset-x-0 z-50" role="navigation" aria-label="منوی اصلی" x-data="{open:false}">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <div class="flex items-center justify-between h-16">
      <a href="#home" class="flex items-center gap-2.5" aria-label="سوپال - صفحه اصلی">
        <span class="w-8 h-8 rounded-lg bg-brand-900 flex items-center justify-center">
          <svg class="w-4.5 h-4.5 text-brand-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"><path d="M2 17c1.5 1.5 3 1.5 4.5 0s3-1.5 4.5 0 3 1.5 4.5 0 3-1.5 4.5 0"/><path d="M2 21c1.5 1.5 3 1.5 4.5 0s3-1.5 4.5 0 3 1.5 4.5 0 3-1.5 4.5 0"/><path d="M12 13V4M9 6l3-3 3 3"/></svg>
        </span>
        <span class="font-bold text-[15px] text-ink-900">سوپال</span>
      </a>

      <div class="hidden md:flex items-center gap-8">
        <a href="#home" class="nav-link">خانه</a>
        <a href="#services" class="nav-link">خدمات</a>
        <a href="#portfolio" class="nav-link">نمونه‌کار</a>
        <a href="/about" class="nav-link">درباره ما</a>
        <a href="/contact" class="nav-link">ارتباط</a>
      </div>

      <div class="flex items-center gap-2">
        <a href="{{ route('login') }}" class="nav-link nav-login" aria-label="ورود به حساب">ورود</a>
        <a href="#contact" class="nav-cta">
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
        <a href="#home" @click="open=false" class="nav-link">خانه</a>
        <a href="#services" @click="open=false" class="nav-link">خدمات</a>
        <a href="#portfolio" @click="open=false" class="nav-link">نمونه‌کار</a>
        <a href="/about" @click="open=false" class="nav-link">درباره ما</a>
        <a href="/contact" @click="open=false" class="nav-link">ارتباط</a>
        <a href="{{ route('login') }}" @click="open=false" class="nav-link">ورود</a>
        <a href="/contact" @click="open=false" class="mt-2 inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-full bg-brand-900 text-white text-[14px] font-medium">آغاز گفتگو</a>
      </div>
    </div>
  </div>
</nav>

<main id="main">

<!-- HERO -->
<section id="home" class="relative h-[82vh] min-h-[600px] max-h-[880px] flex items-center justify-center overflow-hidden">
  <div class="absolute inset-0">
    <img src="https://image.qwenlm.ai/public_source/fc55b002-d4a6-4c17-ab99-6d1187c193e3/10739a30b-5a05-4674-b883-e89c08f7e89c.png" alt="اسکله در خلیج فارس" class="w-full h-full object-cover" fetchpriority="high" width="1920" height="1080">
    <div class="hero-wash absolute inset-0"></div>
  </div>

  <div class="relative z-10 text-center px-5 max-w-2xl mx-auto">
    <div class="hero-in hd1 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/15 text-white/85 text-xs mb-7">
      <span class="tide !w-3"></span> از کنار خلیج فارس
    </div>
    <h1 class="hero-in hd2 text-[2.1rem] sm:text-4xl md:text-5xl font-bold text-white mb-5 leading-[1.25] tracking-tight">
      فناوری در خدمت <span class="accent">انسان</span>
    </h1>
    <p class="hero-in hd3 text-base sm:text-lg text-white/85 mb-9 leading-relaxed max-w-lg mx-auto">
      راهکارهای نرم‌افزاری که آرامش و اعتماد را به همراه دارند — ساخته‌شده برای مسئله‌های بزرگ.
    </p>
    <div class="hero-in hd4 flex flex-col sm:flex-row items-center justify-center gap-3.5 mb-11">
      <a href="#contact" class="btn btn-primary w-full sm:w-auto">
        آغاز گفتگو
        <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"/>
        </svg>
      </a>
      <a href="#services" class="btn btn-ghost w-full sm:w-auto">
        <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          <path d="M15.91 11.2l-6.3-3.5a.6.6 0 00-.9.5v7.6a.6.6 0 00.9.5l6.3-3.5a.6.6 0 000-1.1z"/>
        </svg>
        آشنایی با راهکارها
      </a>
    </div>
    <div class="hero-in hd5 trust flex flex-wrap items-center justify-center gap-2 px-3 py-3 rounded-xl max-w-lg mx-auto">
      <span class="trust-item">
        <svg class="trust-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M12 2l2.4 4.86 5.36.78-3.88 3.78.92 5.34L12 14.3l-4.8 2.46.92-5.34-3.88-3.78 5.36-.78L12 2z"/>
        </svg>
        <span class="trust-text">
          <span class="trust-title">رایگان شروع کنید</span>
          <span class="trust-sub">بدون نیاز به کارت اعتباری</span>
        </span>
      </span>
      <span class="trust-item">
        <svg class="trust-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M12 1v22M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>
        </svg>
        <span class="trust-text">
          <span class="trust-title">پرداخت شفاف</span>
          <span class="trust-sub">بدون هزینه پنهان</span>
        </span>
      </span>
      <span class="trust-item">
        <svg class="trust-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          <path d="M12 6v6l4 2"/>
        </svg>
        <span class="trust-text">
          <span class="trust-title">پشتیبانی ۲۴/۷</span>
          <span class="trust-sub">پاسخگویی سریع به فارسی</span>
        </span>
      </span>
    </div>
  </div>

  <div class="tide-edge">
    <svg viewBox="0 0 1440 60" preserveAspectRatio="none" aria-hidden="true"><path fill="#FAFCFC" d="M0 30c120 20 240 20 360 8s240-26 360-18 240 30 360 20 240-24 360-14v34H0z"/></svg>
    <div class="tide-crest" aria-hidden="true"></div>
  </div>
</section>

<!-- STATS -->
<section class="py-14 md:py-16 border-b border-canvas-200" x-data="statsCounter">
  <div class="max-w-6xl mx-auto px-5 sm:px-8">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-x-8 gap-y-10 reveal" x-ref="grid">

      <div class="stat-item text-center">
        <span class="stat-kicker"><span class="stat-kicker-line"></span>اعتماد</span>
        <div class="stat-num text-2xl sm:text-4xl font-bold text-brand-900">
          <span class="stat-prefix">+</span><span x-text="fmt(projects)">۰</span>
        </div>
        <div class="stat-label">پروژه تحویل‌شده</div>
        <div class="stat-line" aria-hidden="true"></div>
      </div>

      <div class="stat-item text-center">
        <span class="stat-kicker"><span class="stat-kicker-line"></span>تجربه</span>
        <div class="stat-num text-2xl sm:text-4xl font-bold text-brand-900">
          <span x-text="fmt(years)">۰</span><span class="stat-suffix">&nbsp;سال</span>
        </div>
        <div class="stat-label">حضور اجرایی</div>
        <div class="stat-line" aria-hidden="true"></div>
      </div>

      <div class="stat-item text-center">
        <span class="stat-kicker"><span class="stat-kicker-line"></span>رضایت</span>
        <div class="stat-num text-2xl sm:text-4xl font-bold text-brand-900">
          <span x-text="fmt(satisfaction)">۰</span><span class="stat-prefix">&nbsp;٪</span>
        </div>
        <div class="stat-label">مشتریان راضی</div>
        <div class="stat-line" aria-hidden="true"></div>
      </div>

      <div class="stat-item text-center">
        <span class="stat-kicker"><span class="stat-kicker-line"></span>پشتیبانی</span>
        <div class="stat-num text-2xl sm:text-4xl font-bold text-brand-900">
          <span class="stat-prefix">۲۴</span><span class="stat-suffix">&nbsp;/ ۷</span>
        </div>
        <div class="stat-label">آماده پاسخگویی</div>
        <div class="stat-line" aria-hidden="true"></div>
      </div>

    </div>
  </div>
</section>

<!-- ABOUT -->
<section id="about" class="py-24 md:py-32">
  <div class="max-w-6xl mx-auto px-5 sm:px-8">
    <div class="grid md:grid-cols-2 gap-14 md:gap-20 items-center">
      <div class="reveal">
        <div class="tide tide-lg mb-6"></div>
        <h2 class="text-2xl sm:text-3xl md:text-[2.2rem] font-bold text-ink-900 mb-5 leading-tight">اینجا انسان وجود دارد</h2>
        <p class="text-[15px] sm:text-base text-ink-800/75 leading-[1.85] mb-7">
          سوپال یک شرکت فناوری معمولی نیست. ما گروهی از انسان‌های آرام و اندیشمند هستیم که در کنار خلیج فارس، فناوری را با همان آرامش و ژرفای دریا برای حل مسئله‌های بزرگ به کار می‌گیریم.
        </p>

        <ul class="space-y-4 mb-8">
          <li class="about-item">
            <span class="about-ic" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="9"/></svg>
            </span>
            <span>
              <span class="about-t">فناوری به وسعت دریا</span>
              <span class="about-d">سامانه‌های بزرگ را با همان آرامش و ژرفای خلیج فارس طراحی و پیاده‌سازی می‌کنیم.</span>
            </span>
          </li>
          <li class="about-item">
            <span class="about-ic" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21s-6-5.2-6-10a6 6 0 1112 0c0 4.8-6 10-6 10z"/><circle cx="12" cy="11" r="2.2"/></svg>
            </span>
            <span>
              <span class="about-t">محصول به مقیاس رشد شما</span>
              <span class="about-d">راهکارها از روز اول با معماری صحیح ساخته می‌شوند تا با رشد کسب‌وکارتان مقیاس‌پذیر بمانند.</span>
            </span>
          </li>
          <li class="about-item">
            <span class="about-ic" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18M5 21V7l7-4 7 4v14M9 9h.01M9 12h.01M9 15h.01M15 9h.01M15 12h.01M15 15h.01"/></svg>
            </span>
            <span>
              <span class="about-t">امنیت و اعتماد</span>
              <span class="about-d">سامانه‌هایی که وقتی از آن‌ها استفاده می‌کنید، احساس آرامش کنید — همان‌طور که با دیدن دریا آرام می‌شوید.</span>
            </span>
          </li>
        </ul>

        <a href="/about" class="btn btn-primary about-btn">
          آشنایی بیشتر با ما
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
        </a>
      </div>

      <div class="reveal-scale">
        <div class="about-pic">
          <div class="img-zoom-wrap shadow-lg ring-1 ring-brand-400/10">
            <img src="https://image.qwenlm.ai/public_source/fc55b002-d4a6-4c17-ab99-6d1187c193e3/1c598ba98-a9aa-4d92-a0a3-99f97776dc2c.png" alt="آب آرام دریا" class="w-full h-72 sm:h-80 md:h-96 object-cover img-zoom" loading="lazy" width="800" height="600">
          </div>
          <div class="float-card" aria-hidden="true">
            <span class="float-ic">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
            </span>
            <span>
              <span class="float-num">+۸۰</span>
              <span class="float-label block">پروژه تحویل‌شده</span>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- PROCESS -->
<section class="py-12 md:py-16">
  <div class="max-w-6xl mx-auto px-5 sm:px-8">
    <div class="text-center mb-10 reveal">
      <div class="tide tide-lg mx-auto mb-6"></div>
      <h2 class="text-2xl sm:text-3xl md:text-[2.2rem] font-bold text-ink-900 mb-3">چطور کار می‌کنیم</h2>
      <p class="text-[15px] sm:text-base text-ink-800/60 max-w-lg mx-auto">مسیری روشن، از شنیدن مسئله تا تحویل و پشتیبانی.</p>
    </div>

    <div class="relative">
      <div class="proc-flow" aria-hidden="true"></div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-5">
        <article class="proc-card card rounded-xl p-7 pt-9 reveal-scale">
          <span class="proc-step"><i aria-hidden="true"></i>۰۱</span>
          <div class="proc-ic" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.35-4.35M8 11h6"/></svg>
          </div>
          <h3 class="text-[16px] font-bold text-ink-900 mb-2.5">شنیدن مسئله</h3>
          <p class="text-ink-800/60 text-[13.5px] leading-relaxed line-clamp-2">جلسه‌ی اکتشافی برای فهم دقیق نیاز واقعی، نه فقط خواسته‌ی ظاهری.</p>
          <span class="proc-tide" aria-hidden="true"></span>
        </article>

        <article class="proc-card card rounded-xl p-7 pt-9 reveal-scale" style="transition-delay:.05s">
          <span class="proc-step"><i aria-hidden="true"></i>۰۲</span>
          <div class="proc-ic" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
          </div>
          <h3 class="text-[16px] font-bold text-ink-900 mb-2.5">طراحی راهکار</h3>
          <p class="text-ink-800/60 text-[13.5px] leading-relaxed line-clamp-2">معماری فنی و تجربه‌ی کاربری مشخص می‌شود؛ همه چیز پیش از کدنویسی تثبیت می‌شود.</p>
          <span class="proc-tide" aria-hidden="true"></span>
        </article>

        <article class="proc-card card rounded-xl p-7 pt-9 reveal-scale" style="transition-delay:.1s">
          <span class="proc-step"><i aria-hidden="true"></i>۰۳</span>
          <div class="proc-ic" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M8 9l-3 3 3 3"/><path d="M16 9l3 3-3 3"/><path d="M13 6l-2 12"/></svg>
          </div>
          <h3 class="text-[16px] font-bold text-ink-900 mb-2.5">ساخت و بازبینی</h3>
          <p class="text-ink-800/60 text-[13.5px] leading-relaxed line-clamp-2">توسعه در چرخه‌های کوتاه، با نسخه‌های قابل‌آزمایش در هر مرحله.</p>
          <span class="proc-tide" aria-hidden="true"></span>
        </article>

        <article class="proc-card card rounded-xl p-7 pt-9 reveal-scale" style="transition-delay:.15s">
          <span class="proc-step"><i aria-hidden="true"></i>۰۴</span>
          <div class="proc-ic" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>
          </div>
          <h3 class="text-[16px] font-bold text-ink-900 mb-2.5">تحویل و پشتیبانی</h3>
          <p class="text-ink-800/60 text-[13.5px] leading-relaxed line-clamp-2">استقرار نهایی همراه با پشتیبانی مستمر تیم، نه قراردادی که با تحویل تمام می‌شود.</p>
          <span class="proc-tide" aria-hidden="true"></span>
        </article>
      </div>
    </div>
  </div>
</section>

<!-- SERVICES -->
<section id="services" class="relative py-20 md:py-28 bg-canvas-100 overflow-hidden">
  <div class="svc-flow" aria-hidden="true">
    <span class="svc-flow-dot"></span>
    <span class="svc-flow-sweep"></span>
  </div>
  <div class="max-w-6xl mx-auto px-5 sm:px-8 relative">
    <div class="text-center mb-14 reveal">
      <div class="tide tide-lg mx-auto mb-6"></div>
      <h2 class="text-2xl sm:text-3xl md:text-[2.2rem] font-bold text-ink-900 mb-3">راهکارها</h2>
      <p class="text-[15px] sm:text-base text-ink-800/60 max-w-lg mx-auto">ما پروژه‌های بزرگ انجام می‌دهیم؛ هر راهکار متناسب با نیاز شما ساخته می‌شود.</p>
      <div class="svc-hrd" aria-hidden="true"><i></i><i></i><i></i></div>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <article class="svc-card reveal-scale">
        <span class="svc-num" aria-hidden="true">۰۵</span>
        <div class="svc-ic" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
        </div>
        <h3 class="svc-title">راهکارهای نرم‌افزاری</h3>
        <p class="svc-desc">طراحی و پیاده‌سازی نرم‌افزارهای اختصاصی متناسب با نیازهای پیچیده سازمان شما.</p>
        <span class="svc-waterline" aria-hidden="true"></span>
      </article>

      <article class="svc-card reveal-scale" style="transition-delay:.05s">
        <span class="svc-num" aria-hidden="true">۰۶</span>
        <div class="svc-ic" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"/></svg>
        </div>
        <h3 class="svc-title">سامانه‌های سازمانی</h3>
        <p class="svc-desc">ساخت سامانه‌های یکپارچه برای مدیریت فرآیندهای بزرگ سازمانی با مقیاس‌پذیری بالا.</p>
        <span class="svc-waterline" aria-hidden="true"></span>
      </article>

      <article class="svc-card reveal-scale" style="transition-delay:.1s">
        <span class="svc-num" aria-hidden="true">۰۷</span>
        <div class="svc-ic" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2"/></svg>
        </div>
        <h3 class="svc-title">زیرساخت دیجیتال</h3>
        <p class="svc-desc">طراحی و استقرار زیرساخت‌های دیجیتال پایدار و امن برای کسب‌وکارهای در حال رشد.</p>
        <span class="svc-waterline" aria-hidden="true"></span>
      </article>

      <article class="svc-card reveal-scale" style="transition-delay:.15s">
        <span class="svc-num" aria-hidden="true">۰۸</span>
        <div class="svc-ic" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
        </div>
        <h3 class="svc-title">راهکارهای هوشمند</h3>
        <p class="svc-desc">بهره‌گیری از هوش مصنوعی و تحلیل داده برای تصمیم‌گیری هوشمندانه‌تر در سازمان شما.</p>
        <span class="svc-waterline" aria-hidden="true"></span>
      </article>

      <article class="svc-card reveal-scale" style="transition-delay:.2s">
        <span class="svc-num" aria-hidden="true">۰۹</span>
        <div class="svc-ic" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
        </div>
        <h3 class="svc-title">سامانه‌های اختصاصی</h3>
        <p class="svc-desc">توسعه اپلیکیشن‌های موبایل و وب سفارشی با تمرکز بر تجربه کاربری و کارایی بالا.</p>
        <span class="svc-waterline" aria-hidden="true"></span>
      </article>

      <article class="svc-card reveal-scale" style="transition-delay:.25s">
        <span class="svc-num" aria-hidden="true">۱۰</span>
        <div class="svc-ic" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
        </div>
        <h3 class="svc-title">برنامه‌نویسی اختصاصی</h3>
        <p class="svc-desc">کدنویسی تمیز، مستند و قابل نگهداری با بهترین شیوه‌های مهندسی نرم‌افزار.</p>
        <span class="svc-waterline" aria-hidden="true"></span>
      </article>
    </div>
  </div>
</section>

<!-- PORTFOLIO -->
<section id="portfolio" class="pf-bg relative overflow-hidden py-14 md:py-20">
  <div class="max-w-6xl mx-auto px-5 sm:px-8 relative z-10">
    <div class="text-center mb-10 reveal">
      <div class="tide tide-lg mx-auto mb-5"></div>
      <h2 class="text-2xl sm:text-3xl md:text-[2.2rem] font-bold text-ink-900 mb-2.5">نمونه‌کار</h2>
      <p class="text-[15px] sm:text-base text-ink-800/60 max-w-lg mx-auto">پروژه‌هایی که با دقت و تعهد ساخته‌ایم.</p>
    </div>

    <div class="pf-rail" aria-hidden="true"></div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-5">
      <article class="pf-card rounded-2xl reveal-scale" style="transition-delay:0s">
        <div class="pf-cover h-24 sm:h-28 flex items-center justify-center" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><path d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/></svg>
        </div>
        <div class="p-4 sm:p-5">
          <span class="pf-chip inline-block px-2.5 py-1 bg-brand-400/20 text-brand-800 text-[11px] font-medium rounded-full mb-3">سامانه سازمانی</span>
          <h3 class="pf-title mb-1">مدیریت زنجیره تأمین</h3>
          <p class="pf-desc mb-3.5 line-clamp-2">سامانه یکپارچه برای مدیریت فرآیندهای تأمین و توزیع.</p>
          <span class="pf-cta">مشاهده<i aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg></i></span>
        </div>
      </article>
      <article class="pf-card rounded-2xl reveal-scale" style="transition-delay:.05s">
        <div class="pf-cover h-24 sm:h-28 flex items-center justify-center" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="M7 15l4-5 3 3 5-7"/></svg>
        </div>
        <div class="p-4 sm:p-5">
          <span class="pf-chip inline-block px-2.5 py-1 bg-brand-400/20 text-brand-800 text-[11px] font-medium rounded-full mb-3">راهکار هوشمند</span>
          <h3 class="pf-title mb-1">پلتفرم تحلیل داده</h3>
          <p class="pf-desc mb-3.5 line-clamp-2">داشبورد تحلیلی برای تصمیم‌گیری مبتنی بر داده.</p>
          <span class="pf-cta">مشاهده<i aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg></i></span>
        </div>
      </article>
      <article class="pf-card rounded-2xl reveal-scale" style="transition-delay:.1s">
        <div class="pf-cover h-24 sm:h-28 flex items-center justify-center" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><path d="M4 7v10c0 2.21 3.58 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.58 4 8 4s8-1.79 8-4M4 7c0-2.21 3.58-4 8-4s8 1.79 8 4"/></svg>
        </div>
        <div class="p-4 sm:p-5">
          <span class="pf-chip inline-block px-2.5 py-1 bg-brand-400/20 text-brand-800 text-[11px] font-medium rounded-full mb-3">زیرساخت دیجیتال</span>
          <h3 class="pf-title mb-1">سکوی ابری اختصاصی</h3>
          <p class="pf-desc mb-3.5 line-clamp-2">استقرار زیرساخت ابری امن و مقیاس‌پذیر برای سازمان.</p>
          <span class="pf-cta">مشاهده<i aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg></i></span>
        </div>
      </article>
      <article class="pf-card rounded-2xl reveal-scale" style="transition-delay:.15s">
        <div class="pf-cover h-24 sm:h-28 flex items-center justify-center" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a8 8 0 11-4-6.9"/><path d="M12 7v5l3 2"/></svg>
        </div>
        <div class="p-4 sm:p-5">
          <span class="pf-chip inline-block px-2.5 py-1 bg-brand-400/20 text-brand-800 text-[11px] font-medium rounded-full mb-3">راهکار هوشمند</span>
          <h3 class="pf-title mb-1">چت‌بات هوشمند</h3>
          <p class="pf-desc mb-3.5 line-clamp-2">سیستم پاسخگوی خودکار مبتنی بر هوش مصنوعی.</p>
          <span class="pf-cta">مشاهده<i aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg></i></span>
        </div>
      </article>
      <article class="pf-card rounded-2xl reveal-scale" style="transition-delay:.2s">
        <div class="pf-cover h-24 sm:h-28 flex items-center justify-center" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3h2l2.4 12.18a2 2 0 001.97 1.62h8.08a2 2 0 001.97-1.62L21 8H6"/><circle cx="12" cy="20" r="1"/><circle cx="17.5" cy="20" r="1"/></svg>
        </div>
        <div class="p-4 sm:p-5">
          <span class="pf-chip inline-block px-2.5 py-1 bg-brand-400/20 text-brand-800 text-[11px] font-medium rounded-full mb-3">سامانه اختصاصی</span>
          <h3 class="pf-title mb-1">اپلیکیشن مدیریت رستوران</h3>
          <p class="pf-desc mb-3.5 line-clamp-2">نرم‌افزار سفارش آنلاین و مدیریت منوی رستوران.</p>
          <span class="pf-cta">مشاهده<i aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg></i></span>
        </div>
      </article>
      <article class="pf-card rounded-2xl reveal-scale" style="transition-delay:.25s">
        <div class="pf-cover h-24 sm:h-28 flex items-center justify-center" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
        </div>
        <div class="p-4 sm:p-5">
          <span class="pf-chip inline-block px-2.5 py-1 bg-brand-400/20 text-brand-800 text-[11px] font-medium rounded-full mb-3">برنامه‌نویسی اختصاصی</span>
          <h3 class="pf-title mb-1">سامانه حسابداری</h3>
          <p class="pf-desc mb-3.5 line-clamp-2">نرم‌افزار مدیریت مالی و حسابداری برای کسب‌وکارهای کوچک.</p>
          <span class="pf-cta">مشاهده<i aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg></i></span>
        </div>
      </article>
    </div>

    <div class="text-center mt-9 reveal">
      <a href="#" class="btn btn-secondary">
        مشاهده ادامه نمونه‌کارها
        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
      </a>
    </div>
  </div>
</section>

<!-- TESTIMONIALS — deep-sea haven (glass carousel) -->
<section class="relative pt-10 pb-16 md:pt-12 md:pb-20" aria-labelledby="testimonials-title">
  <div class="max-w-5xl mx-auto px-5 sm:px-8">

    <div class="ds-band relative rounded-[2rem] overflow-hidden" x-data="sopalTestimonials()" x-on:keydown.arrow-right.prevent="prev()" x-on:keydown.arrow-left.prevent="next()" tabindex="0" role="region" aria-roledescription="carousel" aria-label="نظر مشتریان">

      <!-- top tide hairline with drifting glow dot -->
      <div class="ds-hairline" aria-hidden="true"><span class="ds-drift"></span></div>

      <!-- faint move-drift wave of brand accents + orbit glows -->
      <div class="ds-wave ds-wave-a" aria-hidden="true"></div>
      <div class="ds-wave ds-wave-b" aria-hidden="true"></div>
      <div class="ds-glow-orbit ds-glow-tl" aria-hidden="true"></div>
      <div class="ds-glow-orbit ds-glow-br" aria-hidden="true"></div>

      <div class="relative z-10 px-6 sm:px-12 pt-14 pb-10 md:pt-16 md:pb-12">

        <!-- header -->
        <div class="text-center mb-10 md:mb-12 reveal">
          <div class="tide tide-lg mx-auto mb-6 ds-tide"></div>
          <h2 id="testimonials-title" class="text-2xl sm:text-3xl md:text-[2.2rem] font-bold text-ink-900 mb-3">نظر مشتریان</h2>
          <p class="text-[15px] sm:text-base text-ink-800/60 max-w-lg mx-auto">آنچه همکاران و مشتریان درباره‌ی کار با ما می‌گویند.</p>
        </div>

        <!-- trailing-panel glass card -->
        <div class="ds-glass relative rounded-[1.4rem] px-6 sm:px-12 pt-10 pb-12 text-center">
          <span class="ds-xlmark" aria-hidden="true">”</span>

          <div class="ds-stars mb-8" aria-label="۵ از ۵ ستاره">
            <span class="ds-star"></span><span class="ds-star"></span><span class="ds-star"></span><span class="ds-star"></span><span class="ds-star"></span>
            <span class="block text-ink-800/45 text-[11px] mt-1 font-medium">۵/۵ رضایت</span>
          </div>

          <template x-for="(t, i) in quotes" :key="t.name">
            <figure class="ds-quote" x-show="idx === i" x-transition:enter="transition ease-out duration-500"
              x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
              x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-y-0"
              x-transition:leave-end="opacity-0 -translate-y-3" x-cloak>
              <blockquote class="ds-quote-text text-[16px] sm:text-[18px] md:text-[19px] font-normal text-ink-900/85 leading-[1.9] max-w-xl mx-auto mb-8"
                x-text="t.quote"></blockquote>
              <figcaption class="flex flex-col items-center gap-3">
                <span class="ds-ring" x-text="t.initials" aria-hidden="true"><span></span></span>
                <span class="block text-[14px] font-bold text-ink-900" x-text="t.name"></span>
                <span class="block text-[12.5px] text-ink-800/45" x-text="t.role"></span>
              </figcaption>
            </figure>
          </template>

          <!-- ticker dots + arrows (RTL: prev on right points right, next on left points left) -->
          <div class="flex items-center justify-center gap-6 mt-8">
            <button type="button" @click="prev()" class="ds-arrow" aria-label="نقل‌قول قبلی">
              <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 6l6 6-6 6"/></svg>
            </button>
            <div class="flex items-center gap-2.5">
              <template x-for="(t, i) in quotes" :key="'dot'+i">
                <button type="button" @click="go(i)" class="ds-dot" :class="idx === i ? 'ds-dot-on' : ''"
                  :aria-label="'نقل‌قول ' + (i+1) + ' از ' + quotes.length" :aria-current="idx === i ? 'true' : 'false'"></button>
              </template>
            </div>
            <button type="button" @click="next()" class="ds-arrow" aria-label="نقل‌قول بعدی">
              <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
            </button>
          </div>
        </div>
      </div>

      <!-- hairline seam closing the band back into the light TEAM section below -->
      <div class="ds-seam" aria-hidden="true"><span class="ds-seam-glow"></span></div>
    </div>
  </div>
</section>

<script>
document.addEventListener('alpine:init', function(){
  Alpine.data('sopalTestimonials', function(){
    return {
      idx: 0,
      timer: null,
      quotes: [
        {name:'رضا کریمی', role:'مدیرعامل، شرکت تجارت پویا', initials:'ر.ک',
         quote:'تیم سوپال دقیقاً همان چیزی را ساخت که در ذهن داشتیم؛ حتی با جزئیاتی که خودمان به آن فکر نکرده بودیم.'},
        {name:'سارا محمدی', role:'مدیر محصول، فروشگاه آنلاین دریا', initials:'س.م',
         quote:'پشتیبانی مستمر و پاسخ‌گویی سریع تیم، بزرگ‌ترین دلیل ادامه‌ی همکاری ما بوده.'},
        {name:'مهدی حسینی', role:'CTO، هلدینگ بندر جنوب', initials:'م.ح',
         quote:'کیفیت کد و مستندسازی پروژه، کار تیم فنی داخلی ما را برای نگهداری آینده بسیار ساده کرد.'}
      ],
      init(){
        var reduced = (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches);
        if (reduced) return;
        this.timer = window.setInterval(()=>{ this.next(); }, 6500);
      },
      go(i){ this.idx = i; this.restart(); },
      next(){ this.idx = (this.idx + 1) % this.quotes.length; this.restart(); },
      prev(){ this.idx = (this.idx - 1 + this.quotes.length) % this.quotes.length; this.restart(); },
      restart(){
        if (this.timer) window.clearInterval(this.timer);
        this.timer = window.setInterval(()=>{ this.next(); }, 6500);
      }
    };
  });
});
</script>

<!-- TEAM -->
<section id="team" class="tm-band relative overflow-hidden py-12 md:py-16" aria-labelledby="team-title">
  <div class="tm-rail" aria-hidden="true"><span class="tm-drift"></span></div>

  <div class="max-w-6xl mx-auto px-5 sm:px-8 relative z-10">
    <div class="grid md:grid-cols-2 gap-11 md:gap-12 lg:gap-16 items-center">

      <!-- pedestal + glass frame + floating badge -->
      <div class="tm-pedestal reveal-scale">
        <div class="tm-slab" aria-hidden="true"></div>
        <div class="img-zoom-wrap tm-frame rounded-[1.35rem]">
          <img src="https://image.qwenlm.ai/public_source/fc55b002-d4a6-4c17-ab99-6d1187c193e3/10e18b114-38fe-4953-a8d2-ed1a7c4b577d.png" alt="تیم سوپال" class="w-full h-80 sm:h-96 md:h-[26rem] object-cover img-zoom" loading="lazy" width="800" height="600">
        </div>
        <div class="tm-badge" aria-hidden="true">
          <span class="tm-live"></span>
          <span class="tm-badge-ic">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
          </span>
          <span>
            <span class="tm-badge-num">+۲۸</span>
            <span class="tm-badge-label block">همکار در کنار شما</span>
          </span>
        </div>
      </div>

      <!-- dense text side -->
      <div class="reveal">
        <span class="tm-axis">تیم سوپال</span>

        <div class="tm-title mb-5">
          <span class="tm-xlmark" aria-hidden="true">”</span>
          <h2 id="team-title" class="text-2xl sm:text-3xl md:text-[2.2rem] font-bold text-ink-900 leading-tight">تیم ما</h2>
        </div>
        <p class="text-[15px] sm:text-base text-ink-800/75 leading-[1.85] mb-6">
          ما یک تیم کوچک اما متعهد هستیم. هر عضو تیم سوپال با عشق به کار خود و با احترام به مشتری، پروژه‌ها را پیش می‌برد.
        </p>
        <p class="text-[15px] sm:text-base text-ink-800/75 leading-[1.85] mb-7">
          باور ما ساده است: کیفیت از کمیت مهم‌تر است. به همین دلیل، هر پروژه را با دقت کامل و با حضور مستقیم اعضای ارشد تیم انجام می‌دهیم.
        </p>

        <ul class="tm-mini mb-8">
          <li class="tm-row reveal-scale">
            <span class="tm-num" aria-hidden="true">۰۱</span>
            <span>
              <span class="tm-row-t">تیمِ آرام، با پشتیبانی مستمر</span>
              <span class="tm-row-d block">همکاری که با تحویل پروژه تمام نمی‌شود؛ کنار شما می‌مانیم.</span>
            </span>
          </li>
          <li class="tm-row reveal-scale" style="transition-delay:.06s">
            <span class="tm-num" aria-hidden="true">۰۲</span>
            <span>
              <span class="tm-row-t">حضور مستقیم اعضای ارشد</span>
              <span class="tm-row-d block">کیفیت از کمیت مهم‌تر است؛ همه چیز با دقت کامل پیش می‌رود.</span>
            </span>
          </li>
          <li class="tm-row reveal-scale" style="transition-delay:.12s">
            <span class="tm-num" aria-hidden="true">۰۳</span>
            <span>
              <span class="tm-row-t">اعتماد، محور هر تصمیم</span>
              <span class="tm-row-d block">آرامش، کیفیت و اعتماد — همان‌طور که به دریا اعتماد می‌کنیم.</span>
            </span>
          </li>
        </ul>

        <a href="/about" class="btn btn-secondary tm-cta">
          گروه ما
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="py-24 md:py-32 bg-canvas-100">
  <div class="max-w-3xl mx-auto px-5 sm:px-8">
    <div class="text-center mb-14 reveal">
      <div class="tide tide-lg mx-auto mb-6"></div>
      <h2 class="text-2xl sm:text-3xl md:text-[2.2rem] font-bold text-ink-900 mb-3">سوالات متداول</h2>
      <p class="text-[15px] sm:text-base text-ink-800/60">پاسخ چند پرسشی که معمولاً پیش از شروع همکاری می‌پرسند.</p>
    </div>

    <div class="reveal" x-data="{ openIndex: 0 }">
      <div class="faq-list">
        <template x-for="(item, idx) in [
          {q:'مدت‌زمان ساخت یک پروژه معمولی چقدر است؟', a:'بسته به پیچیدگی، از ۴ تا ۱۲ هفته؛ در جلسه‌ی اکتشافی، برآورد دقیق زمانی به شما اعلام می‌شود.'},
          {q:'آیا پس از تحویل، پشتیبانی ادامه دارد؟', a:'بله. هر پروژه با یک دوره‌ی پشتیبانی مشخص تحویل داده می‌شود و امکان قرارداد پشتیبانی بلندمدت هم وجود دارد.'},
          {q:'آیا امکان همکاری تیم فنی داخلی ما با سوپال هست؟', a:'بله، مستندسازی کامل و همراهی تیم فنی شما در طول پروژه بخشی از روش کار ماست.'},
          {q:'هزینه‌ی پروژه چگونه تعیین می‌شود؟', a:'بر اساس دامنه‌ی کار، پیچیدگی فنی و بازه‌ی زمانی، بعد از جلسه‌ی اول یک پیشنهاد شفاف ارائه می‌شود.'}
        ]" :key="idx">
          <div class="faq-item" :class="openIndex === idx ? 'open' : ''">
            <button
              type="button"
              @click="openIndex = (openIndex === idx ? -1 : idx)"
              class="faq-btn text-[15px] font-bold text-ink-900"
              :aria-expanded="(openIndex === idx).toString()"
            >
              <span class="faq-q">
                <span class="faq-qi" aria-hidden="true">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M9.2 9a2.8 2.8 0 015.6 0c0 1.9-2.8 2.4-2.8 4"/><path d="M12 17h.01"/></svg>
                </span>
                <span x-text="item.q"></span>
              </span>
              <svg class="faq-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div class="faq-a">
              <div class="faq-a-in">
                <p x-text="item.a"></p>
              </div>
            </div>
          </div>
        </template>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section id="contact" class="py-24 md:py-32">
  <div class="max-w-2xl mx-auto px-5 text-center reveal">
    <div class="tide tide-lg mx-auto mb-6"></div>
    <h2 class="text-2xl sm:text-3xl md:text-[2.2rem] font-bold text-ink-900 mb-5 leading-tight">بیایید گفتگو کنیم</h2>
    <p class="text-[15px] sm:text-base text-ink-800/60 mb-9 max-w-md mx-auto leading-relaxed">
      اگر پروژه‌ای در ذهن دارید یا می‌خواهید درباره راهکارهای ما بیشتر بدانید، خوشحال می‌شویم صدای شما را بشنویم.
    </p>
    <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
      <a href="mailto:hello@sopal.ir" class="btn btn-primary w-full sm:w-auto">آغاز گفتگو</a>
      <a href="tel:+987712345678" class="btn btn-secondary w-full sm:w-auto">تماس تلفنی</a>
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
          <li><a href="#home" class="footer-link text-white/50 text-[13px]">خانه</a></li>
          <li><a href="#services" class="footer-link text-white/50 text-[13px]">خدمات</a></li>
          <li><a href="#portfolio" class="footer-link text-white/50 text-[13px]">نمونه‌کار</a></li>
          <li><a href="/about" class="footer-link text-white/50 text-[13px]">درباره ما</a></li>
          <li><a href="/contact" class="footer-link text-white/50 text-[13px]">ارتباط</a></li>
          <li><a href="{{ route('login') }}" class="footer-link text-white/50 text-[13px]">ورود به حساب</a></li>
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

  document.querySelectorAll('a[href^="#"]').forEach(function(a){
    a.addEventListener('click', function(e){
      var id = this.getAttribute('href');
      if(!id || id === '#') return;
      var t = document.querySelector(id);
      if(!t) return;
      e.preventDefault();
      var nav = document.getElementById('nav');
      var off = nav ? nav.offsetHeight + 8 : 68;
      window.scrollTo({ top: t.getBoundingClientRect().top + window.pageYOffset - off, behavior:'smooth' });
    });
  });

  var nav = document.getElementById('nav');
  window.addEventListener('scroll', function(){
    nav.classList.toggle('nav-scrolled', window.scrollY > 12);
  }, { passive:true });
});
</script>
</body>
</html>
