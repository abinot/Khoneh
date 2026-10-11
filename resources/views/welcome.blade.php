<x-layouts::khoneh :title="__('اَبینوت | آموزش، فناوری و همراهی اجتماعی')">

{{-- ============================================================
     اَبینوت — نسخهٔ یکپارچهٔ روشن و تیره
     • یک فایل، دو پوسته: روشن (پیش‌فرض) و تیره
     • اگر پوستهٔ کلی برنامه تیره باشد (کلاس .dark)، صفحه هم تیره آغاز می‌شود
     • دکمهٔ تعویض پوسته در گوشهٔ پایین؛ انتخاب کاربر در مرورگر ماندگار می‌شود
     • بدون وابستگی به رنگ‌های سفارشی Tailwind (sea-*): همهٔ رنگ‌ها از متغیرهای CSS
     ============================================================ --}}

<style>
    html { scroll-behavior: smooth; }

    /* ───────────── توکن‌ها: پوستهٔ روشن (پیش‌فرض) ───────────── */
    .ab-page {
        --ab-canvas: #f4f7f9;
        --ab-surface: #ffffff;
        --ab-surface-2: #eaf0f4;
        --ab-ink: #10242f;
        --ab-muted: #4f6676;
        --ab-line: #d6e1e7;
        --ab-edge: #aec2ce;
        --ab-accent: #2a6f8f;          /* خطوط و نمادها */
        --ab-accent-ink: #1b4c66;      /* متن تأکیدی روی سطح */
        --ab-accent-fill: #7593b1;     /* پس‌زمینهٔ دکمهٔ اصلی */
        --ab-accent-fill-hover: #9db1cf;
        --ab-accent-soft: #e2edf3;
        --ab-wash: 244, 247, 249;      /* لایهٔ روشنِ روی تصویر */
        --ab-grid: rgba(27, 76, 102, .075);
        --ab-shadow: 0 24px 48px -40px rgba(16, 36, 47, .55);
        --ab-footer: #e7eef2;
        --ab-logo-filter: brightness(0) saturate(100%) invert(17%) sepia(20%) saturate(1468%) hue-rotate(154deg) brightness(88%) contrast(94%);
        --ab-focus: #2a6f8f;
        color-scheme: light;
    }

    /* ───────────── پوستهٔ تیره ───────────── */
    .ab-page[data-ab-theme="dark"],
    .dark .ab-page:not([data-ab-theme]) {
        --ab-canvas: #08121a;
        --ab-surface: #0e1c27;
        --ab-surface-2: #13273a;
        --ab-ink: #e8f0f4;
        --ab-muted: #9db3bf;
        --ab-line: #1f3544;
        --ab-edge: #365363;
        --ab-accent: #5fa3c4;
        --ab-accent-ink: #9fcbe0;
        --ab-accent-fill: #2b6a8a;
        --ab-accent-fill-hover: #357b9f;
        --ab-accent-soft: #14303f;
        --ab-wash: 6, 16, 24;
        --ab-grid: rgba(159, 203, 224, .07);
        --ab-shadow: 0 24px 48px -36px rgba(0, 0, 0, .85);
        --ab-footer: #050e14;
        --ab-logo-filter: none;
        --ab-focus: #8fc2db;
        color-scheme: dark;
    }

    /* ───────────── پایه ───────────── */
    .ab-page {
        position: relative;
        isolation: isolate;
        direction: rtl;
        color: var(--ab-ink);
        background: var(--ab-canvas);
        letter-spacing: 0;
        transition: background-color .25s ease, color .25s ease;
    }
    .ab-page *, .ab-page *::before, .ab-page *::after { box-sizing: border-box; }
    .ab-page [hidden] { display: none !important; }
    .ab-page a { color: inherit; text-decoration: none; }
    .ab-page button { font: inherit; color: inherit; }
    .ab-page :is(section, footer, main) { scroll-margin-top: 84px; }
    .ab-page :is(h1, h2, h3, p, ul, ol) { margin: 0; }
    .ab-page :is(ul, ol) { padding: 0; list-style: none; }
    .ab-page svg { flex: none; }
    .ab-page p { text-wrap: pretty; }

    .ab-page :is(a, button):focus-visible,
    .ab-skip:focus-visible {
        outline: 3px solid var(--ab-focus);
        outline-offset: 3px;
    }

    .ab-skip {
        position: fixed;
        inset-block-start: -6rem;
        inset-inline-start: 1rem;
        z-index: 9999;
        padding: .8rem 1.1rem;
        color: #fff;
        background: #173f55;
        border: 1px solid #8fb2c4;
        font-weight: 800;
        transition: inset-block-start .2s ease;
    }
    .ab-skip:focus { inset-block-start: 1rem; }

    .ab-wrap {
        position: relative;
        width: 100%;
        max-width: 1800px;
        margin-inline: auto;
        padding-inline: clamp(1.25rem, 3vw, 3.5rem);
    }

    /* شبکهٔ مهندسی: فقط لایهٔ پس‌زمینه، با محو شدن به یک سو */
    .ab-gridbg {
        position: absolute;
        inset: 0;
        pointer-events: none;
        background-image:
            linear-gradient(var(--ab-grid) 1px, transparent 1px),
            linear-gradient(90deg, var(--ab-grid) 1px, transparent 1px);
        background-size: 56px 56px;
        -webkit-mask-image: linear-gradient(270deg, #000 0%, transparent 78%);
        mask-image: linear-gradient(270deg, #000 0%, transparent 78%);
    }
    .ab-gridbg--fine { background-size: 28px 28px; -webkit-mask-image: none; mask-image: none; opacity: .6; }

    /* ───────────── اجزای مشترک ───────────── */
    .ab-mark { display: flex; align-items: stretch; height: 40px; gap: 0; }
    .ab-mark span { display: block; width: 2px; background: var(--ab-accent-ink); }
    .ab-mark span:nth-child(2) { width: 46px; background: none; }
    .ab-mark span:nth-child(4) { width: 8px; background: none; }
    .ab-mark span:nth-child(5) { background: var(--ab-accent); opacity: .65; }
    .ab-mark--lg { height: 56px; }
    .ab-mark--lg span:nth-child(2) { width: 64px; }
    .ab-mark--lg span:nth-child(4) { width: 10px; }

    .ab-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: .65rem;
        min-height: 52px;
        padding: .85rem 1.5rem;
        border: 1px solid transparent;
        border-radius: 2px;
        font-size: .93rem;
        font-weight: 800;
        line-height: 1.4;
        cursor: pointer;
        transition: background-color .18s ease, border-color .18s ease, color .18s ease;
    }
    .ab-btn svg { transition: transform .2s ease; }
    .ab-btn:hover svg { transform: translateX(-3px); }
    .ab-btn--primary { color: #fff; background: var(--ab-accent-fill); border-color: var(--ab-accent-fill); }
    .ab-btn--primary:hover { background: var(--ab-accent-fill-hover); border-color: var(--ab-accent-fill-hover); }
    .ab-btn--ghost { color: var(--ab-ink); background: transparent; border-color: var(--ab-edge); }
    .ab-btn--ghost:hover { background: var(--ab-surface); border-color: var(--ab-accent); }

    /* شبکهٔ مرزبندی‌شده: خطوط ظریف با فاصلهٔ ۱ پیکسل، بدون ترفند border */
    .ab-cells {
        display: grid;
        gap: 1px;
        background: var(--ab-line);
        border: 1px solid var(--ab-edge);
        border-radius: 2px;
        box-shadow: var(--ab-shadow);
        overflow: hidden;
    }
    .ab-cells > * { min-width: 0; background: var(--ab-surface); }

    .ab-icon {
        display: grid;
        place-items: center;
        width: 52px;
        height: 52px;
        border-radius: 2px;
        color: var(--ab-accent-ink);
        background: var(--ab-accent-soft);
        border: 1px solid var(--ab-line);
    }
    .ab-icon--solid { color: #fff; background: var(--ab-accent-fill); border-color: transparent; }

    /* سرتیتر بخش */
    .ab-head { max-width: 840px; margin-bottom: 2.75rem; }
    .ab-head--center { margin-inline: auto; text-align: center; }
    .ab-eyebrow { display: flex; align-items: center; gap: .85rem; margin-bottom: 1.1rem; color: var(--ab-accent-ink); font-weight: 800; font-size: .88rem; }
    .ab-head--center .ab-eyebrow { justify-content: center; }
    .ab-eyebrow__num { font-variant-numeric: tabular-nums; font-size: 1.05rem; font-weight: 900; }
    .ab-eyebrow__rule { width: 40px; height: 2px; background: var(--ab-accent); }
    .ab-title { font-size: clamp(1.9rem, 3.8vw, 3.1rem); font-weight: 900; line-height: 1.25; color: var(--ab-ink); }
    .ab-lead { max-width: 720px; margin-top: 1rem; font-size: 1.05rem; line-height: 2.1; color: var(--ab-muted); }
    .ab-head--center .ab-lead { margin-inline: auto; }

    .ab-section {
        position: relative;
        padding-block: clamp(4.5rem, 9vw, 7rem);
        border-top: 1px solid var(--ab-line);
        overflow: hidden;
    }
    .ab-section--alt { background: var(--ab-surface-2); }
    .ab-section--surface { background: var(--ab-surface); }

    /* ───────────── قهرمان ───────────── */
    .ab-hero {
        position: relative;
        display: flex;
        align-items: center;
        min-height: min(800px, 88svh);
        padding-block: clamp(8rem, 15vh, 11rem) clamp(7.5rem, 12vh, 9.5rem);
        background: var(--ab-canvas);
        overflow: hidden;
    }
    .ab-hero__img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: center 46%; }
    .ab-hero__wash {
        position: absolute;
        inset: 0;
        background: linear-gradient(270deg,
            rgba(var(--ab-wash), .70) 0%,
            rgba(var(--ab-wash), .50) 36%,
            rgba(var(--ab-wash), .30) 58%,
            rgba(var(--ab-wash), .10) 100%);
    }

    .ab-hero__body { position: relative; z-index: 1; max-width: 800px; padding-inline-start: clamp(1rem, 2.2vw, 2rem); border-inline-start: 2px solid var(--ab-accent); }
    .ab-hero__chip {
        display: inline-flex;
        align-items: center;
        gap: .65rem;
        margin-top: 1.5rem;
        padding: .5rem .9rem;
        font-size: .8rem;
        font-weight: 800;
        color: var(--ab-accent-ink);
        background: rgba(var(--ab-wash), .7);
        border: 1px solid var(--ab-edge);
        border-radius: 2px;
        backdrop-filter: blur(8px);
    }
    .ab-hero__chip::before { content: ""; width: 8px; height: 8px; background: var(--ab-accent); }
    .ab-hero h1 { margin-top: 1.1rem; font-size: clamp(3.8rem, 9vw, 7.2rem); font-weight: 950; line-height: 1.05; color: var(--ab-ink); }
    .ab-hero__motto { display: block; margin-top: .35rem; font-size: clamp(1.15rem, 2vw, 1.5rem); font-weight: 850; color: var(--ab-accent-ink); }
    .ab-hero__copy { max-width: 660px; margin-top: 1.5rem; font-size: clamp(1.02rem, 1.5vw, 1.15rem); line-height: 2.15; color: var(--ab-ink); opacity: .9; }
    .ab-hero__actions { display: flex; flex-wrap: wrap; gap: .75rem; margin-top: 2.25rem; }

    /* ───────────── نوار چهار اصل ───────────── */
    .ab-features { position: relative; z-index: 3; margin-top: -4.25rem; padding-bottom: 1rem; }
    .ab-features .ab-cells { grid-template-columns: repeat(4, 1fr); }
    .ab-feature { display: grid; grid-template-columns: 52px minmax(0, 1fr); gap: 1rem; align-items: start; padding: 1.75rem; border-top: 3px solid var(--ab-accent); }
    .ab-feature h2 { margin-top: .15rem; font-size: 1rem; font-weight: 900; color: var(--ab-ink); }
    .ab-feature p { margin-top: .5rem; font-size: .86rem; line-height: 1.95; color: var(--ab-muted); }

    /* ───────────── راهکارها ───────────── */
    .ab-products-head { display: flex; align-items: flex-end; justify-content: space-between; gap: 2.5rem; }
    .ab-products-head .ab-head { margin-bottom: 2.75rem; }
    .ab-products-head > .ab-btn { margin-bottom: 2.75rem; flex: none; }
    .ab-products { grid-template-columns: repeat(4, 1fr); }
    .ab-product {
        position: relative;
        display: flex;
        flex-direction: column;
        min-height: 320px;
        padding: 2rem;
        transition: background-color .18s ease;
    }
    .ab-product::before {
        content: "";
        position: absolute;
        inset: 0 0 auto 0;
        height: 3px;
        background: var(--ab-accent);
        transform: scaleX(0);
        transform-origin: right;
        transition: transform .3s ease;
    }
    .ab-product:hover { background: var(--ab-surface-2); }
    .ab-product:hover::before { transform: scaleX(1); }
    .ab-product .ab-icon { width: 60px; height: 60px; margin-bottom: 1.5rem; }
    .ab-product h3 { margin-bottom: .6rem; font-size: 1.12rem; font-weight: 900; color: var(--ab-ink); }
    .ab-product p { margin-bottom: 1.5rem; font-size: .92rem; line-height: 2; color: var(--ab-muted); }
    .ab-product__foot { display: flex; align-items: center; justify-content: space-between; gap: .75rem; margin-top: auto; padding-top: 1.2rem; border-top: 1px solid var(--ab-line); }
    .ab-tags { display: flex; flex-wrap: wrap; gap: .4rem; }
    .ab-tag { padding: .25rem .65rem; font-size: .74rem; font-weight: 800; color: var(--ab-accent-ink); background: var(--ab-accent-soft); border: 1px solid var(--ab-line); border-radius: 2px; }
    .ab-product__go { color: var(--ab-accent-ink); opacity: .55; transition: opacity .2s ease, transform .2s ease; }
    .ab-product:hover .ab-product__go { opacity: 1; transform: translateX(-4px); }

    /* ───────────── حوزه‌های کاری ───────────── */
    .ab-disciplines { grid-template-columns: repeat(3, 1fr); }
    .ab-discipline {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
        min-height: 360px;
        padding: 2rem;
        text-align: right;
        border: 0;
        border-radius: 0;
        cursor: pointer;
        transition: background-color .18s ease, box-shadow .18s ease;
    }
    .ab-discipline:hover { background: var(--ab-surface-2); box-shadow: inset 0 3px 0 var(--ab-accent); }
    .ab-discipline .ab-icon { width: 60px; height: 60px; margin-bottom: 1.5rem; }
    .ab-discipline h3 { font-size: 1.3rem; font-weight: 900; color: var(--ab-ink); }
    .ab-discipline__sub { margin: .35rem 0 1.2rem; font-size: .84rem; font-weight: 800; color: var(--ab-accent-ink); }
    .ab-discipline p { margin-bottom: 1.5rem; font-size: .94rem; line-height: 2.05; color: var(--ab-muted); }
    .ab-discipline__more { display: inline-flex; align-items: center; gap: .5rem; width: 100%; margin-top: auto; padding-top: 1.2rem; border-top: 1px solid var(--ab-line); font-size: .88rem; font-weight: 900; color: var(--ab-accent-ink); }
    .ab-discipline__more svg { transition: transform .2s ease; }
    .ab-discipline:hover .ab-discipline__more svg { transform: translateX(-4px); }

    /* ───────────── پنجرهٔ نامه ───────────── */
    .ab-modal { position: fixed; inset: 0; z-index: 200; display: flex; align-items: center; justify-content: center; padding: 1rem; }
    .ab-modal__backdrop { position: absolute; inset: 0; background: rgba(3, 12, 18, .78); -webkit-backdrop-filter: blur(5px); backdrop-filter: blur(5px); opacity: 0; transition: opacity .3s ease; }
    .ab-modal__card {
        position: relative;
        width: 100%;
        max-width: 820px;
        max-height: min(88svh, 880px);
        overflow: auto;
        padding: 2rem;
        color: var(--ab-ink);
        background: var(--ab-surface);
        border: 1px solid var(--ab-edge);
        border-top: 4px solid var(--ab-accent);
        border-radius: 2px;
        box-shadow: 0 40px 110px rgba(0, 0, 0, .4);
        opacity: 0;
        transform: translateY(14px);
        transition: opacity .3s ease, transform .3s ease;
    }
    .ab-modal__card:focus { outline: none; }
    .ab-modal.is-open .ab-modal__backdrop { opacity: 1; }
    .ab-modal.is-open .ab-modal__card { opacity: 1; transform: none; }
    .ab-modal__close {
        position: sticky;
        top: 0;
        float: left;
        z-index: 2;
        display: grid;
        place-items: center;
        width: 42px;
        height: 42px;
        margin: -.6rem 0 0 -.6rem;
        background: var(--ab-surface-2);
        border: 1px solid var(--ab-edge);
        border-radius: 2px;
        cursor: pointer;
    }
    .ab-modal__close:hover { background: var(--ab-accent-soft); }
    .ab-modal__head { display: flex; align-items: center; gap: 1.25rem; margin-bottom: 1.5rem; }
    .ab-modal__head .ab-icon { width: 58px; height: 58px; flex: none; }
    .ab-modal__head h2 { margin-bottom: .25rem; font-size: 1.55rem; font-weight: 900; color: var(--ab-ink); }
    .ab-modal__head p { font-size: .86rem; font-weight: 800; color: var(--ab-accent-ink); }
    .ab-modal__text p { margin-bottom: .9rem; font-size: 1rem; line-height: 2.15; }
    .ab-steps { margin-top: 2rem; padding: 1.5rem; background: var(--ab-surface-2); border: 1px solid var(--ab-line); border-top: 3px solid var(--ab-accent); border-radius: 2px; }
    .ab-steps h3 { margin-bottom: 1.2rem; font-size: .95rem; font-weight: 900; color: var(--ab-ink); }
    .ab-steps ol { display: grid; gap: 1rem; }
    .ab-steps li { display: grid; grid-template-columns: 34px minmax(0, 1fr); gap: .9rem; align-items: start; font-size: .95rem; line-height: 2; }
    .ab-steps b { display: grid; place-items: center; width: 32px; height: 32px; font-size: .82rem; font-weight: 900; color: #fff; background: var(--ab-accent-fill); border-radius: 2px; }
    .ab-steps strong { font-weight: 900; color: var(--ab-ink); }

    /* ───────────── دربارهٔ اَبینوت ───────────── */
    .ab-about__bg { position: absolute; inset: 0; }
    .ab-about__bg img { width: 100%; height: 100%; object-fit: cover; }
    .ab-about__wash { position: absolute; inset: 0; background: linear-gradient(270deg, rgba(var(--ab-wash), .97) 0%, rgba(var(--ab-wash), .91) 57%, rgba(var(--ab-wash), .78) 100%); }
    .ab-about__grid { display: grid; grid-template-columns: minmax(0, 1.15fr) minmax(0, 1fr); gap: clamp(2.5rem, 6vw, 6rem); align-items: center; }
    .ab-about__text p { margin-top: 1.1rem; font-size: 1.05rem; line-height: 2.15; }
    .ab-about__text .ab-title { margin-bottom: 1.5rem; }
    .ab-caps { grid-template-columns: repeat(2, 1fr); }
    .ab-cap { padding: 2rem; border-top: 3px solid var(--ab-accent); }
    .ab-cap h3 { margin-bottom: .6rem; font-size: 1rem; font-weight: 900; color: var(--ab-ink); }
    .ab-cap p { font-size: .87rem; line-height: 1.95; color: var(--ab-muted); }

    /* ───────────── اصول ───────────── */
    .ab-values { grid-template-columns: repeat(3, 1fr); }
    .ab-value { padding: 2.5rem; border-top: 4px solid var(--ab-accent); }
    .ab-value .ab-icon { width: 56px; height: 56px; margin-bottom: 1.25rem; }
    .ab-value h3 { margin-bottom: .75rem; font-size: 1.2rem; font-weight: 900; color: var(--ab-ink); }
    .ab-value p { font-size: .95rem; line-height: 2.1; color: var(--ab-muted); }

    /* ───────────── فراخوان پایانی ───────────── */
    .ab-cta {
        position: relative;
        padding: clamp(3rem, 7vw, 5.5rem) clamp(1.25rem, 4vw, 4rem);
        text-align: center;
        background: var(--ab-accent-soft);
        border: 1px solid var(--ab-edge);
        border-inline-start: 5px solid var(--ab-accent);
        border-radius: 2px;
        box-shadow: var(--ab-shadow);
        overflow: hidden;
    }
    .ab-cta__inner { position: relative; z-index: 1; max-width: 800px; margin-inline: auto; }
    .ab-cta .ab-mark { justify-content: center; margin: 0 auto 2rem; }
    .ab-cta h2 { font-size: clamp(1.9rem, 3.8vw, 2.9rem); font-weight: 900; line-height: 1.3; color: var(--ab-ink); }
    .ab-cta p { max-width: 680px; margin: 1.25rem auto 2rem; font-size: 1.05rem; line-height: 2.1; color: var(--ab-muted); }
    .ab-cta__actions { display: flex; flex-wrap: wrap; justify-content: center; gap: .75rem; }

    /* ───────────── پانوشت ───────────── */
    .ab-footer { color: var(--ab-muted); background: var(--ab-footer); border-top: 4px solid var(--ab-accent); }
    .ab-footer h3 { margin-bottom: 1.25rem; font-size: .98rem; font-weight: 900; color: var(--ab-ink); display: inline-flex; align-items: center; gap: .75rem; }
    .ab-footer h3::before { content: ""; width: 20px; height: 2px; background: var(--ab-accent); }
    .ab-footer a { transition: color .18s ease; }
    .ab-footer a:hover { color: var(--ab-ink); }
    .ab-footer__top { border-bottom: 1px solid var(--ab-line); }
    .ab-footer__top a { display: inline-flex; align-items: center; gap: .6rem; padding-block: 1rem; font-size: .86rem; font-weight: 800; }
    .ab-footer__grid { display: grid; grid-template-columns: 1.6fr 1fr 1fr 1.2fr; gap: 3rem; padding-block: 4rem; }
    .ab-footer__brand img { display: block; max-width: 140px; max-height: 64px; margin-bottom: 1.25rem; object-fit: contain; object-position: right; filter: var(--ab-logo-filter); }
    .ab-footer__brand p { margin-bottom: 1.5rem; font-size: .9rem; line-height: 2.05; }
    .ab-footer__mail { display: inline-flex; align-items: center; gap: .6rem; padding-bottom: .25rem; font-size: .86rem; font-weight: 800; color: var(--ab-accent-ink); border-bottom: 2px solid var(--ab-accent); }
    .ab-footer ul { display: grid; gap: .9rem; }
    .ab-footer li { font-size: .9rem; line-height: 1.85; }
    .ab-footer li.ab-footer__row { display: flex; align-items: flex-start; gap: .75rem; }
    .ab-footer li.ab-footer__row svg { margin-top: .3rem; color: var(--ab-accent); }
    .ab-footer__bottom { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 1rem; padding-block: 1.5rem; border-top: 1px solid var(--ab-line); font-size: .82rem; }
    .ab-footer__bottom p { max-width: 620px; line-height: 1.9; }
    .ab-footer__bottom a { font-weight: 800; color: var(--ab-ink); text-decoration: underline; text-underline-offset: 5px; text-decoration-color: var(--ab-edge); }

    /* ───────────── دکمهٔ تعویض پوسته ───────────── */
    .ab-theme {
        position: fixed;
        inset-inline-end: 1.25rem;
        inset-block-end: 1.25rem;
        z-index: 150;
        display: none;
        place-items: center;
        width: 48px;
        height: 48px;
        color: var(--ab-ink);
        background: var(--ab-surface);
        border: 1px solid var(--ab-edge);
        border-radius: 2px;
        box-shadow: 0 14px 30px -14px rgba(0, 0, 0, .45);
        cursor: pointer;
        transition: background-color .18s ease, border-color .18s ease;
    }
    .ab-theme:hover { background: var(--ab-surface-2); border-color: var(--ab-accent); }
    .ab-js .ab-theme { display: grid; }
    .ab-theme .ab-i-sun { display: none; }
    .ab-page[data-ab-theme="dark"] .ab-theme .ab-i-sun,
    .dark .ab-page:not([data-ab-theme]) .ab-theme .ab-i-sun { display: block; }
    .ab-page[data-ab-theme="dark"] .ab-theme .ab-i-moon,
    .dark .ab-page:not([data-ab-theme]) .ab-theme .ab-i-moon { display: none; }

    /* ───────────── ظهور هنگام اسکرول (بهبود تدریجی) ───────────── */
    .ab-js .ab-reveal { opacity: 0; transform: translateY(14px); transition: opacity .6s ease, transform .6s ease; }
    .ab-js .ab-reveal.is-in { opacity: 1; transform: none; }

    /* ───────────── واکنش‌گرایی ───────────── */
    @media (max-width: 1100px) {
        .ab-features .ab-cells { grid-template-columns: repeat(2, 1fr); }
        .ab-products { grid-template-columns: repeat(2, 1fr); }
        .ab-about__grid { grid-template-columns: 1fr; gap: 2.5rem; }
        .ab-footer__grid { grid-template-columns: repeat(2, 1fr); gap: 2.5rem; }
    }
    @media (max-width: 820px) {
        .ab-disciplines, .ab-values { grid-template-columns: 1fr; }
        .ab-discipline { min-height: 0; padding: 1.5rem; }
        .ab-value { padding: 2rem; }
        .ab-products-head { flex-direction: column; align-items: flex-start; gap: 0; }
        .ab-products-head > .ab-btn { margin-bottom: 2.25rem; }
    }
    @media (max-width: 720px) {
        .ab-hero { min-height: 0; padding-block: 7.5rem 7.5rem; }
        .ab-hero__wash { background: linear-gradient(270deg, rgba(var(--ab-wash), .97) 0%, rgba(var(--ab-wash), .93) 60%, rgba(var(--ab-wash), .78) 100%); }
        .ab-hero__body { padding-inline-start: .9rem; }
        .ab-hero h1 { font-size: clamp(3.5rem, 16vw, 5.25rem); }
        .ab-hero__copy { line-height: 2.05; }
        .ab-about__wash { background: rgba(var(--ab-wash), .94); }
        .ab-modal { align-items: flex-end; padding: 0; }
        .ab-modal__card { max-height: 92svh; border-radius: 0; border-inline: 0; border-bottom: 0; padding: 1.5rem 1.25rem; }
        .ab-footer__grid { grid-template-columns: 1fr; gap: 2.25rem; padding-block: 3rem; }
        .ab-footer__bottom { flex-direction: column; align-items: flex-start; }
    }
    @media (max-width: 560px) {
        .ab-features .ab-cells, .ab-products, .ab-caps { grid-template-columns: 1fr; }
        .ab-product { min-height: 0; padding: 1.5rem; }
        .ab-cap { padding: 1.5rem; }
        .ab-feature { padding: 1.4rem; }
        .ab-hero__actions .ab-btn, .ab-cta__actions .ab-btn { width: 100%; }
    }
    @media (prefers-reduced-motion: reduce) {
        html { scroll-behavior: auto; }
        .ab-page *, .ab-page *::before, .ab-page *::after { animation-duration: .01ms !important; animation-iteration-count: 1 !important; transition-duration: .01ms !important; scroll-behavior: auto !important; }
        .ab-js .ab-reveal { opacity: 1; transform: none; }
    }
</style>

<a href="#main-content" class="ab-skip">پرش به محتوای اصلی</a>

<div class="ab-page" dir="rtl" data-ab-root>

    {{-- ====================== HERO ====================== --}}
    <section id="top" class="ab-hero">
        <img class="ab-hero__img" src="{{ asset('welcome/paszamineh.png') }}" alt="" fetchpriority="high" loading="eager" decoding="async">
        <div class="ab-hero__wash"></div>
        <div class="ab-gridbg"></div>

        <div class="ab-wrap">
            <div class="ab-hero__body">
                <div class="ab-mark" aria-hidden="true"><span></span><span></span><span></span><span></span><span></span></div>

                <span class="ab-hero__chip">فناوری، آموزش و همراهی اجتماعی</span>

                <h1>اَبینوت</h1>
                <p class="ab-hero__motto">یک نامه و توان</p>

                <p class="ab-hero__copy">
                    اَبینوت در سه مسیر کار می‌کند: ساخت نرم‌افزار و راهکارهای دیجیتال، آموزش رایگان برنامه‌نویسی،
                    و همراهی با سازمان‌های مردم‌نهاد و کنشگران محیط‌زیست؛ در خدمت انسان و طبیعت.
                </p>

                <div class="ab-hero__actions">
                    <a href="#products" class="ab-btn ab-btn--primary">
                        دیدن راهکارها
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true"><path d="M15 18 9 12l6-6"/></svg>
                    </a>
                    <a href="#disciplines" class="ab-btn ab-btn--ghost">حوزه‌های کاری</a>
                </div>
            </div>
        </div>
    </section>

    {{-- ====================== نوار چهار اصل ====================== --}}
    @php
        $features = [
            ['نوآوری',          'راه‌حل متناسب با مسئله؛ نه بازسازی بی‌دلیل الگوهای تکراری.',   '<path d="M12 2v4M12 18v4M4.9 4.9l2.8 2.8M16.3 16.3l2.8 2.8M2 12h4M18 12h4M4.9 19.1l2.8-2.8M16.3 7.7l2.8-2.8"/><circle cx="12" cy="12" r="3.2"/>'],
            ['توسعهٔ سنجیده',  'توجه به امنیت، سادگی و نگهداری‌پذیری از آغاز کار.',          '<path d="m8 6-6 6 6 6M16 6l6 6-6 6M14 4l-4 16"/>'],
            ['یادگیری عملی',   'تمرین و ساخت پروژه، بخش اصلی مسیر آموزش است.',                '<path d="M4 4.5A2.5 2.5 0 0 1 6.5 2H20v18H6.5A2.5 2.5 0 0 0 4 22.5V4.5Z"/><path d="M4 20.5V22"/>'],
            ['همراهی اجتماعی', 'توان فنی را برای کارهای سودمند و اثرگذار به کار می‌گیریم.',    '<path d="M12 21s-8-4.7-8-11a4.5 4.5 0 0 1 8-2.8A4.5 4.5 0 0 1 20 10c0 6.3-8 11-8 11Z"/>'],
        ];
    @endphp

    <div class="ab-features">
        <div class="ab-wrap">
            <div class="ab-cells">
                @foreach ($features as $f)
                    <article class="ab-feature">
                        <span class="ab-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $f[2] !!}</svg>
                        </span>
                        <div>
                            <h2>{{ $f[0] }}</h2>
                            <p>{{ $f[1] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>

    <main id="main-content">

    {{-- ====================== راهکارها ====================== --}}
    @php
        $products = [
            ['title' => 'سامانه‌های سازمانی', 'meta' => 'ابزارهای یکپارچه برای ساده‌تر کردن فرایندها و مدیریت اطلاعات.', 'tags' => ['سفارشی', 'قابل‌گسترش'], 'icon' => '<rect x="5" y="4" width="14" height="16" rx="2"/><path d="M9 8h6M9 12h6M9 16h3"/>'],
            ['title' => 'وب‌سایت و اپلیکیشن', 'meta' => 'محصولات دیجیتال واکنش‌گرا با تمرکز بر تجربهٔ کاربری و سرعت.', 'tags' => ['وب', 'موبایل'], 'icon' => '<rect x="3" y="4" width="18" height="13" rx="2"/><path d="M8 21h8M12 17v4M7 8h10M7 11h6"/>'],
            ['title' => 'پلتفرم‌های آموزشی', 'meta' => 'مسیرهای یادگیری روشن، تمرین‌محور و متناسب با نیاز مخاطب.', 'tags' => ['تعامل‌پذیر', 'پروژه‌محور'], 'icon' => '<path d="m12 3 9 5-9 5-9-5 9-5Z"/><path d="M5 11v5c4 3 10 3 14 0v-5M21 8v7"/>'],
            ['title' => 'امنیت و زیرساخت', 'meta' => 'توجه به امنیت، پایداری و نگهداری‌پذیری در طراحی و پیاده‌سازی.', 'tags' => ['امنیت', 'پایش'], 'icon' => '<path d="M12 3 5 6v5c0 5 3 8 7 10 4-2 7-5 7-10V6l-7-3Z"/><path d="m9 12 2 2 4-4"/>'],
        ];
    @endphp

    <section id="products" class="ab-section ab-section--alt">
        <div class="ab-gridbg"></div>
        <div class="ab-wrap">
            <div class="ab-products-head">
                <div class="ab-head ab-reveal">
                    <div class="ab-eyebrow"><span class="ab-eyebrow__num">۰۱</span><span class="ab-eyebrow__rule"></span><span>راهکارها</span></div>
                    <h2 class="ab-title">چیزهایی که می‌سازیم</h2>
                    <p class="ab-lead">از ابزارهای سازمانی تا آموزش و امنیت؛ هر راهکار از شناخت مسئله آغاز می‌شود و با نیاز واقعی سنجیده می‌شود.</p>
                </div>
                <a href="#contact" class="ab-btn ab-btn--ghost ab-reveal">
                    گفت‌وگو دربارهٔ پروژه
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true"><path d="M15 18 9 12l6-6"/></svg>
                </a>
            </div>

            <div class="ab-cells ab-products ab-reveal">
                @foreach ($products as $p)
                    <a href="mailto:hello@abinot.ir?subject={{ rawurlencode('گفت‌وگو دربارهٔ ' . $p['title']) }}"
                       aria-label="گفت‌وگو با اَبینوت دربارهٔ {{ $p['title'] }}"
                       class="ab-product">
                        <span class="ab-icon">
                            <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $p['icon'] !!}</svg>
                        </span>
                        <h3>{{ $p['title'] }}</h3>
                        <p>{{ $p['meta'] }}</p>
                        <div class="ab-product__foot">
                            <div class="ab-tags">
                                @foreach ($p['tags'] as $tag)
                                    <span class="ab-tag">{{ $tag }}</span>
                                @endforeach
                            </div>
                            <svg class="ab-product__go" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M15 18 9 12l6-6"/></svg>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ====================== حوزه‌های کاری ====================== --}}
    @php
        $disciplines = [
            [
                'icon' => '<path d="m3 8 9-5 9 5-9 5-9-5Z"/><path d="M6 10v5c4 3 8 3 12 0v-5M21 8v7"/>',
                'title' => 'آموزش', 'sub' => 'رایگان و در دسترس',
                'teaser' => 'یادگیری با تمرین و ساختن پیش می‌رود؛ از نخستین گام تا انجام یک پروژهٔ واقعی.',
                'p1' => 'آموزش را تا جای ممکن رایگان و در دسترس می‌خواهیم؛ زیرا یادگیری می‌تواند راه رسیدن به فرصت‌های تازه را هموار کند. مسیر باید برای تازه‌کار روشن باشد و برای فرد باتجربه نیز ارزش عملی داشته باشد.',
                'p2' => 'روش ما بر تمرین، بازخورد و ساخت پروژه استوار است؛ نه تماشای صرف درس‌ها. برنامهٔ هر دوره با توجه به نیاز و توان یادگیرندگان طراحی می‌شود.',
                'steps' => [['شناخت نیاز', 'سطح، هدف و پیش‌نیازهای یادگیرندگان روشن می‌شود.'], ['طراحی مسیر', 'یادگیری به گام‌های کوچک و پیوسته تقسیم می‌شود.'], ['تمرین و ساخت', 'هر بخش با تمرین و پروژه‌ای کاربردی همراه است.'], ['بازخورد', 'اشتباه‌ها بررسی می‌شوند و مسیر بر پایهٔ پیشرفت اصلاح می‌شود.']],
            ],
            [
                'icon' => '<path d="m8 6-6 6 6 6M16 6l6 6-6 6M14 4l-4 16"/>',
                'title' => 'فناوری', 'sub' => 'نرم‌افزار، وب و امنیت',
                'teaser' => 'ابزارهایی ساده، امن و نگهداری‌پذیر که برای حل مسئله ساخته می‌شوند.',
                'p1' => 'نرم‌افزار و وب می‌سازیم و امنیت را بخشی از طراحی می‌دانیم، نه کاری که تنها در پایان انجام شود. ابزار خوب باید روشن، قابل‌نگهداری و متناسب با نیاز واقعی باشد.',
                'p2' => 'از سامانه‌های سازمانی و پلتفرم‌های آموزشی تا برنامه‌های وب و زیرساخت‌ها، مسیر کار با شناخت مسئله آغاز می‌شود و با آزمون و بازبینی ادامه می‌یابد.',
                'steps' => [['شناخت مسئله', 'نیازها، محدودیت‌ها و معیارهای موفقیت بررسی می‌شوند.'], ['طراحی راهکار', 'معماری، امنیت و امکان توسعه از ابتدا دیده می‌شوند.'], ['پیاده‌سازی مرحله‌ای', 'کار در گام‌های کوچک و قابل‌بازبینی پیش می‌رود.'], ['آزمون و تحویل', 'راهکار بررسی و شیوهٔ نگهداری آن مستند می‌شود.']],
            ],
            [
                'icon' => '<path d="M12 21s-8-4.7-8-11a4.5 4.5 0 0 1 8-2.8A4.5 4.5 0 0 1 20 10c0 6.3-8 11-8 11Z"/>',
                'title' => 'تعهد اجتماعی', 'sub' => 'همراهی با گروه‌های اثرگذار',
                'teaser' => 'بخشی از توان فنی باید در خدمت کارهایی باشد که ارزششان تنها با پول سنجیده نمی‌شود.',
                'p1' => 'می‌خواهیم بخشی از توان اَبینوت در اختیار سازمان‌های مردم‌نهاد، گروه‌های داوطلبانه و کنشگران محیط‌زیست قرار گیرد؛ به‌ویژه جایی که یک ابزار دیجیتال می‌تواند کار را آسان‌تر یا اثر آن را بیشتر کند.',
                'p2' => 'راه همکاری می‌تواند آموزش، مشاوره، ساخت ابزار یا همراهی در بهبود یک سامانه باشد. دامنه و شیوهٔ همکاری بر پایهٔ نیاز و توان موجود، با گفت‌وگوی روشن تعیین می‌شود.',
                'steps' => [['گفت‌وگو', 'هدف، نیاز و توان گروه همکار شنیده می‌شود.'], ['انتخاب اولویت', 'راه‌حل کوچک و شدنی بر کارهای پرهزینه و پراکنده ترجیح دارد.'], ['همکاری در اجرا', 'راهکار با مشارکت گروه و بر پایهٔ بازخورد ساخته می‌شود.'], ['انتقال دانش', 'تا حد امکان، شیوهٔ استفاده و نگهداری نیز آموزش داده می‌شود.']],
            ],
        ];
        $stepNumbers = ['۱', '۲', '۳', '۴'];
    @endphp

    <section id="disciplines" class="ab-section ab-section--surface">
        <div class="ab-gridbg ab-gridbg--fine"></div>
        <div class="ab-wrap">
            <div class="ab-head ab-reveal">
                <div class="ab-eyebrow"><span class="ab-eyebrow__num">۰۲</span><span class="ab-eyebrow__rule"></span><span>حوزه‌های کاری</span></div>
                <h2 class="ab-title">سه مسیر، یک جهت</h2>
                <p class="ab-lead">آموزش، ساخت فناوری و همراهی اجتماعی سه کار جدا از هم نیستند؛ هر کدام می‌توانند دیگری را نیرومندتر کنند.</p>
            </div>

            <div class="ab-cells ab-disciplines ab-reveal" data-ab-letters>
                @foreach ($disciplines as $i => $d)
                    <button type="button" class="ab-discipline" data-ab-letter="{{ $i }}" aria-haspopup="dialog" aria-controls="ab-letter-modal">
                        <span class="ab-icon ab-icon--solid">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $d['icon'] !!}</svg>
                        </span>
                        <h3>{{ $d['title'] }}</h3>
                        <span class="ab-discipline__sub">{{ $d['sub'] }}</span>
                        <p>{{ $d['teaser'] }}</p>
                        <span class="ab-discipline__more">
                            خواندن نامه
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true"><path d="M15 18 9 12l6-6"/></svg>
                        </span>
                    </button>
                @endforeach
            </div>

            {{-- مودال --}}
            <div id="ab-letter-modal" class="ab-modal" data-ab-modal hidden
                 role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="ab-letter-title-0">
                <div class="ab-modal__backdrop" data-ab-modal-backdrop></div>
                <div class="ab-modal__card" data-ab-modal-card tabindex="-1">
                    <button type="button" class="ab-modal__close" data-ab-modal-close aria-label="بستن پنجره">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><path d="m18 6-12 12M6 6l12 12"/></svg>
                    </button>

                    @foreach ($disciplines as $i => $d)
                        <section data-ab-modal-panel="{{ $i }}" @if($i !== 0) hidden @endif>
                            <header class="ab-modal__head">
                                <span class="ab-icon ab-icon--solid">
                                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $d['icon'] !!}</svg>
                                </span>
                                <div>
                                    <h2 id="ab-letter-title-{{ $i }}">{{ $d['title'] }}</h2>
                                    <p>{{ $d['sub'] }}</p>
                                </div>
                            </header>

                            <div class="ab-modal__text">
                                <p>{{ $d['p1'] }}</p>
                                <p>{{ $d['p2'] }}</p>
                            </div>

                            <div class="ab-steps">
                                <h3>چگونگی پیش‌برد کار</h3>
                                <ol>
                                    @foreach ($d['steps'] as $stepIndex => $step)
                                        <li>
                                            <b aria-hidden="true">{{ $stepNumbers[$stepIndex] }}</b>
                                            <span><strong>{{ $step[0] }}:</strong> {{ $step[1] }}</span>
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                        </section>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ====================== دربارهٔ اَبینوت ====================== --}}
    <section id="about" class="ab-section">
        <div class="ab-about__bg">
            <img src="{{ asset('welcome/darbareyeh-ma-pz.jpeg') }}" alt="" loading="lazy" decoding="async">
            <div class="ab-about__wash"></div>
            <div class="ab-gridbg"></div>
        </div>

        <div class="ab-wrap">
            <div class="ab-about__grid">
                <div class="ab-about__text ab-reveal">
                    <div class="ab-eyebrow"><span class="ab-eyebrow__num">۰۳</span><span class="ab-eyebrow__rule"></span><span>دربارهٔ اَبینوت</span></div>
                    <h2 class="ab-title">نامه‌ای که سال‌ها پیش نوشتیم،<br>و هنوز می‌نویسیم.</h2>
                    <p>اَبینوت نامه‌ای برای ایران است؛ تلاشی برای به‌کارگرفتن توان فناوری در خدمت انسان و طبیعت. برای ما، ساختن تنها نوشتن کد نیست؛ فهمیدن نیاز، پاسخ‌گو بودن و انتقال دانشی است که به دیگران نیز امکان ساختن می‌دهد.</p>
                    <p>می‌خواهیم آرام و پیوسته پیش برویم، روشن گفت‌وگو کنیم و به یاد داشته باشیم پشت هر پروژه، انسان‌هایی هستند که وقت و اعتمادشان را به ما سپرده‌اند.</p>
                </div>

                <div class="ab-cells ab-caps ab-reveal" role="list" aria-label="اصول عملیاتی اَبینوت">
                    @foreach ([
                        ['امنیت از آغاز', 'امنیت از مرحلهٔ شناخت و طراحی در نظر گرفته می‌شود.'],
                        ['ساخت مرحله‌ای', 'پیشرفت کار به گام‌های روشن و قابل‌بازبینی تقسیم می‌شود.'],
                        ['مستندسازی', 'تصمیم‌ها و شیوهٔ نگهداری باید برای تیم روشن بماند.'],
                        ['انتقال دانش', 'هدف، تنها تحویل ابزار نیست؛ توان ادارهٔ آن نیز مهم است.'],
                    ] as [$label, $description])
                        <article class="ab-cap" role="listitem">
                            <h3>{{ $label }}</h3>
                            <p>{{ $description }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ====================== اصول ====================== --}}
    @php
        $values = [
            ['آرامش',    '<path d="M3 15c3-3 6-3 9 0s6 3 9 0"/><path d="M3 10c3-3 6-3 9 0s6 3 9 0"/>', 'کار درست به شتاب‌زدگی نیاز ندارد. با گام‌های سنجیده، پیوسته پیش می‌رویم و کیفیت را فدای عجله نمی‌کنیم.'],
            ['شفافیت',   '<circle cx="12" cy="12" r="9"/><path d="M12 3v18M3 12h18"/>',                 'دربارهٔ تصمیم‌ها، محدودیت‌ها و آنچه تحویل می‌دهیم روشن حرف می‌زنیم؛ پیچیدگی بی‌دلیل و وعدهٔ بی‌پشتوانه جایی در کار ما ندارد.'],
            ['ماندگاری', '<path d="M12 3v18M5 8l7-5 7 5M5 16l7 5 7-5"/>',                               'راهکار باید پس از تحویل نیز قابل فهم، نگهداری و گسترش باشد؛ نه اینکه برای هر تغییر کوچک به سازنده وابسته بماند.'],
        ];
    @endphp

    <section id="values" class="ab-section ab-section--alt">
        <div class="ab-gridbg ab-gridbg--fine"></div>
        <div class="ab-wrap">
            <div class="ab-head ab-head--center ab-reveal">
                <div class="ab-eyebrow"><span class="ab-eyebrow__num">۰۴</span><span class="ab-eyebrow__rule"></span><span>اصول ما</span></div>
                <h2 class="ab-title">سه اصل برای کار درست</h2>
                <p class="ab-lead">این اصول باید در شیوهٔ کار ما دیده شوند، نه اینکه فقط در نوشته‌ها بمانند.</p>
            </div>

            <div class="ab-cells ab-values ab-reveal">
                @foreach ($values as [$title, $icon, $text])
                    <article class="ab-value">
                        <span class="ab-icon">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $icon !!}</svg>
                        </span>
                        <h3>{{ $title }}</h3>
                        <p>{{ $text }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ====================== فراخوان پایانی ====================== --}}
    <section id="contact" class="ab-section ab-section--surface">
        <div class="ab-gridbg ab-gridbg--fine"></div>
        <div class="ab-wrap">
            <div class="ab-cta ab-reveal">
                <div class="ab-gridbg"></div>
                <div class="ab-cta__inner">
                    <div class="ab-mark ab-mark--lg" aria-hidden="true"><span></span><span></span><span></span><span></span><span></span></div>

                    <h2>از کجا آغاز کنیم؟</h2>
                    <p>اگر مسئله‌ای برای حل‌کردن، ایده‌ای برای ساختن یا پیشنهادی برای همکاری داری، برایمان بنویس. اگر می‌خواهی یادگیری را آغاز کنی، حوزه‌های کاری ما نقطهٔ شروع خوبی هستند.</p>

                    <div class="ab-cta__actions">
                        <a href="mailto:hello@abinot.ir?subject={{ rawurlencode('گفت‌وگو با اَبینوت') }}" class="ab-btn ab-btn--primary">
                            نوشتن به اَبینوت
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 2 11 13M22 2l-7 20-4-9-9-4 20-7Z"/></svg>
                        </a>
                        <a href="#disciplines" class="ab-btn ab-btn--ghost">شناخت مسیرهای کاری</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </main>

    {{-- ====================== پانوشت ====================== --}}
    <footer class="ab-footer">
        <div class="ab-footer__top">
            <div class="ab-wrap">
                <a href="#top">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true"><path d="M18 15l-6-6-6 6"/></svg>
                    بازگشت به بالای صفحه
                </a>
            </div>
        </div>

        <div class="ab-wrap">
            <div class="ab-footer__grid">
                <div class="ab-footer__brand">
                    <a href="#top" aria-label="اَبینوت — بازگشت به بالا">
                        <img src="{{ asset('welcome/Abinot neshan-sepid.svg') }}" alt="اَبینوت" width="140" height="60" loading="lazy">
                    </a>
                    <p>خانه‌ای برای آموزش، فناوری و تعهد اجتماعی؛ در کنار مردم ایران، آرام و پیوسته.</p>
                    <a href="mailto:hello@abinot.ir" class="ab-footer__mail">
                        hello@abinot.ir
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true"><path d="M15 18 9 12l6-6"/></svg>
                    </a>
                </div>

                <nav aria-label="دسترسی سریع">
                    <h3>دسترسی سریع</h3>
                    <ul>
                        <li><a href="#top">خانه</a></li>
                        <li><a href="#products">راهکارها</a></li>
                        <li><a href="#disciplines">حوزه‌های کاری</a></li>
                        <li><a href="#about">دربارهٔ ما</a></li>
                        <li><a href="#values">اصول</a></li>
                    </ul>
                </nav>

                <nav aria-label="خدمات">
                    <h3>حوزه‌ها</h3>
                    <ul>
                        <li><a href="#disciplines">آموزش رایگان</a></li>
                        <li><a href="#products">تولید نرم‌افزار</a></li>
                        <li><a href="#products">طراحی وب و برنامه</a></li>
                        <li><a href="#products">امنیت و زیرساخت</a></li>
                        <li><a href="#disciplines">همراهی اجتماعی</a></li>
                    </ul>
                </nav>

                <div>
                    <h3>راه‌های ارتباطی</h3>
                    <ul>
                        <li class="ab-footer__row">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg>
                            <a href="mailto:hello@abinot.ir">hello@abinot.ir</a>
                        </li>
                        <li class="ab-footer__row">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            <span>برای شروع همکاری، هدف و نیازتان را کوتاه و روشن بنویسید.</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="ab-footer__bottom">
                <span>© اَبینوت — تمامی حقوق محفوظ است.</span>
                <p>
                    پرسش دربارهٔ حریم خصوصی یا شیوهٔ استفاده؟
                    <a href="mailto:hello@abinot.ir?subject={{ rawurlencode('پرسش دربارهٔ سیاست‌های اَبینوت') }}">از راه ایمیل با ما در میان بگذارید.</a>
                </p>
            </div>
        </div>
    </footer>

    {{-- تعویض پوسته (فقط با جاوااسکریپت نمایش داده می‌شود) --}}
    <button type="button" class="ab-theme" data-ab-theme-toggle aria-label="تعویض پوستهٔ روشن و تیره">
        <svg class="ab-i-moon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 12.8A9 9 0 1 1 11.2 3a7 7 0 0 0 9.8 9.8Z"/></svg>
        <svg class="ab-i-sun" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></svg>
    </button>
</div>

<script>
(function () {
    'use strict';

    var root = document.querySelector('[data-ab-root]');
    if (!root) return;
    root.classList.add('ab-js');

    /* ───────────── پوسته ───────────── */
    var STORE_KEY = 'abinot-theme';
    var toggle = root.querySelector('[data-ab-theme-toggle]');

    function readStored() {
        try { var v = window.localStorage.getItem(STORE_KEY); return v === 'dark' || v === 'dark' ? v : null; }
        catch (e) { return null; }
    }
    function writeStored(v) {
        try { window.localStorage.setItem(STORE_KEY, v); } catch (e) { /* بدون ذخیره ادامه می‌دهیم */ }
    }
    function appDark() { return document.documentElement.classList.contains('dark'); }
    function currentTheme() { return root.getAttribute('data-ab-theme') || (appDark() ? 'dark' : 'dark'); }

    var saved = readStored();
    if (saved) root.setAttribute('data-ab-theme', saved);

    if (toggle) {
        toggle.addEventListener('click', function () {
            var next = currentTheme() === 'dark' ? 'dark' : 'dark';
            root.setAttribute('data-ab-theme', next);
            writeStored(next);
        });
    }

    /* ───────────── ظهور هنگام اسکرول ───────────── */
    var reveals = Array.prototype.slice.call(root.querySelectorAll('.ab-reveal'));
    var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if ('IntersectionObserver' in window && !reduce) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) { entry.target.classList.add('is-in'); io.unobserve(entry.target); }
            });
        }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });
        reveals.forEach(function (el) { io.observe(el); });
    } else {
        reveals.forEach(function (el) { el.classList.add('is-in'); });
    }

    /* ───────────── پنجرهٔ نامه‌ها ───────────── */
    var letterRoot = root.querySelector('[data-ab-letters]');
    var modal = root.querySelector('[data-ab-modal]');
    if (!letterRoot || !modal) return;

    var backdrop = modal.querySelector('[data-ab-modal-backdrop]');
    var card = modal.querySelector('[data-ab-modal-card]');
    var closeButton = modal.querySelector('[data-ab-modal-close]');
    var panels = Array.prototype.slice.call(modal.querySelectorAll('[data-ab-modal-panel]'));
    var opener = null, closeTimer = null, closing = false;
    var prevBody = '', prevRoot = '';

    function focusables() {
        return Array.prototype.slice.call(card.querySelectorAll(
            'a[href], button:not([disabled]), input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])'
        )).filter(function (el) { return !el.closest('[hidden]') && el.getAttribute('aria-hidden') !== 'true'; });
    }

    function openModal(index, button) {
        if (closeTimer) window.clearTimeout(closeTimer);
        closing = false;
        opener = button;

        panels.forEach(function (panel) {
            panel.hidden = panel.getAttribute('data-ab-modal-panel') !== String(index);
        });
        var active = panels[Number(index)];
        var heading = active && active.querySelector('h2');
        if (heading) modal.setAttribute('aria-labelledby', heading.id);

        prevBody = document.body.style.overflow;
        prevRoot = document.documentElement.style.overflow;
        modal.hidden = false;
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
        document.documentElement.style.overflow = 'hidden';

        window.requestAnimationFrame(function () { modal.classList.add('is-open'); });
        closeButton.focus();
    }

    function closeModal() {
        if (modal.hidden || closing) return;
        closing = true;
        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');

        closeTimer = window.setTimeout(function () {
            modal.hidden = true;
            document.body.style.overflow = prevBody;
            document.documentElement.style.overflow = prevRoot;
            closing = false;
            if (opener && typeof opener.focus === 'function') opener.focus();
        }, 300);
    }

    letterRoot.querySelectorAll('[data-ab-letter]').forEach(function (button) {
        button.addEventListener('click', function () { openModal(button.getAttribute('data-ab-letter'), button); });
    });
    closeButton.addEventListener('click', closeModal);
    backdrop.addEventListener('click', closeModal);

    document.addEventListener('keydown', function (event) {
        if (modal.hidden) return;
        if (event.key === 'Escape') { event.preventDefault(); closeModal(); return; }
        if (event.key !== 'Tab') return;

        var items = focusables();
        if (!items.length) { event.preventDefault(); card.focus(); return; }
        var first = items[0], last = items[items.length - 1];
        if (event.shiftKey && document.activeElement === first) { event.preventDefault(); last.focus(); }
        else if (!event.shiftKey && document.activeElement === last) { event.preventDefault(); first.focus(); }
    });
})();
</script>

</x-layouts::app>