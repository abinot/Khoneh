
<x-layouts::khoneh :title="__('اَبینوت')">

@push('styles')
@vite('resources/css/khoneh.css')
@endpush

@push('scripts')
@vite('resources/js/khoneh.js')
@endpush

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

                <span class="ab-hero__chip">راهکار رایانه‌ای • آموزش • یاری مردمی</span>

                <h1>اَبینوت</h1>
                <p class="ab-hero__motto">یک نامه و توان</p>

                <p class="ab-hero__copy">
                    اگر بنگاه، فروشگاه یا پیشه‌ای دارید، ما بخش رایانه‌ای کار شما را می‌سازیم؛ تارنما، کارافزار همراه و سامانه‌ی ویژه‌ای که فروش را بالا ببرد، کارهای روزانه را سامان دهد و خریداران تازه بیاورد. نخستین رایزنی برای شناخت نیاز شما رایگان است؛ همین امروز پیام بدهید و نشست رو در رو را بخواهید.
                </p>

                <div class="ab-hero__actions">
                    <a href="#products" class="ab-btn ab-btn--primary">
                        دیدن راهکارها
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true"><path d="M15 18 9 12l6-6"/></svg>
                    </a>
                    <a href="#disciplines" class="ab-btn ab-btn--ghost">زمینه‌های کاری</a>
                </div>
            </div>
        </div>
    </section>

    {{-- ====================== نوار چهار ویژگی ====================== --}}
    @php
        $features = [
            ['نوآوری',          'برای هر بنگاه، راهکار ویژه‌ی همان بنگاه را می‌سازیم؛ نه رونوشتی از کار دیگران.',   '<path d="M12 2v4M12 18v4M4.9 4.9l2.8 2.8M16.3 16.3l2.8 2.8M2 12h4M18 12h4M4.9 19.1l2.8-2.8M16.3 7.7l2.8-2.8"/><circle cx="12" cy="12" r="3.2"/>'],
            ['گسترش سنجیده',  'از روز نخست به پاسبانی، سرراستی و ماندگاری کار می‌اندیشیم تا فردا گرفتار نشوید.',          '<path d="m8 6-6 6 6 6M16 6l6 6-6 6M14 4l-4 16"/>'],
            ['یادگیری با ساختن',   'شالوده‌ی آموزش ما ورزیدن و ساختن با دست خویش است؛ نه تنها نگاه کردن.',                '<path d="M4 4.5A2.5 2.5 0 0 1 6.5 2H20v18H6.5A2.5 2.5 0 0 0 4 22.5V4.5Z"/><path d="M4 20.5V22"/>'],
            ['یاری مردمی', 'بخشی از توان خود را برای یاری به انجمن‌های مردمی و کارهای همگانی به کار می‌بندیم.',    '<path d="M12 21s-8-4.7-8-11a4.5 4.5 0 0 1 8-2.8A4.5 4.5 0 0 1 20 10c0 6.3-8 11-8 11Z"/>'],
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
            ['title' => 'سامانه‌ی ویژه‌ی بنگاه', 'meta' => 'سفارش‌ها، خریداران، انبار و سیاهه‌ی شما در یک سامانه‌ی یکپارچه و سرراست؛ ارزان‌تر و بی‌دردسرتر.', 'tags' => ['ویژه‌ی شما', 'گسترش‌پذیر'], 'icon' => '<rect x="5" y="4" width="14" height="16" rx="2"/><path d="M9 8h6M9 12h6M9 16h3"/>'],
            ['title' => 'تارنما و کارافزار همراه', 'meta' => 'تارنما و کارافزار همراهی که تند باز شود، زیبا باشد و بازدیدکننده را به خریدار دگرگون کند.', 'tags' => ['تارنما', 'کارافزار همراه'], 'icon' => '<rect x="3" y="4" width="18" height="13" rx="2"/><path d="M8 21h8M12 17v4M7 8h10M7 11h6"/>'],
            ['title' => 'سامانه‌ی آموزش', 'meta' => 'بستری برای آموزش خریداران، همکاران یا دانشجویان شما؛ روشن، گام‌به‌گام و همراه با ورز کاربردی.', 'tags' => ['گام‌به‌گام', 'کاربردی'], 'icon' => '<path d="m12 3 9 5-9 5-9-5 9-5Z"/><path d="M5 11v5c4 3 10 3 14 0v-5M21 8v7"/>'],
            ['title' => 'پاسبانی و نگه‌داشت', 'meta' => 'آزمون رخنه، پشتیبان‌گیری و نگه‌داشت تارنما و سامانه‌ی شما تا همیشه پایدار و در دسترس بماند.', 'tags' => ['آزمون رخنه', 'نگه‌داشت پیوسته'], 'icon' => '<path d="M12 3 5 6v5c0 5 3 8 7 10 4-2 7-5 7-10V6l-7-3Z"/><path d="m9 12 2 2 4-4"/>'],
        ];
    @endphp

    <section id="products" class="ab-section ab-section--alt">
        <div class="ab-gridbg"></div>
        <div class="ab-wrap">
            <div class="ab-products-head">
                <div class="ab-head ab-reveal">
                    <div class="ab-eyebrow"><span class="ab-eyebrownum">۰۱</span><span class="ab-eyebrowrule"></span><span>راهکارها</span></div>
                    <h2 class="ab-title">برای بنگاه شما چه می‌سازیم</h2>
                    <p class="ab-lead">از تارنمای فروشگاهی تا سامانه‌ی درون‌بنگاهی و آزمون رخنه؛ هر کار را با شناخت نیاز شما آغاز می‌کنیم. نخستین رایزنی رایگان است؛ پیام بدهید تا راهکار ویژه‌ی بنگاه شما را پیدا کنیم.</p>
                </div>
                <a href="#contact" class="ab-btn ab-btn--ghost ab-reveal">
                    رایزنی رایگان درباره‌ی کار شما
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true"><path d="M15 18 9 12l6-6"/></svg>
                </a>
            </div>

            <div class="ab-cells ab-products ab-reveal">
                @foreach ($products as $p)
                    <a href="mailto:dorud@abinot.ir?subject={{ rawurlencode('رایزنی رایگان درباره‌ی ' . $p['title']) }}"
                       aria-label="رایزنی رایگان با اَبینوت درباره‌ی {{ $p['title'] }}"
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

    {{-- ====================== زمینه‌های کاری ====================== --}}
    @php
        $disciplines = [
            [
                'icon' => '<path d="m3 8 9-5 9 5-9 5-9-5Z"/><path d="M6 10v5c4 3 8 3 12 0v-5M21 8v7"/>',
                'title' => 'آموزش', 'sub' => 'رایگان و در دسترس',
                'teaser' => 'یادگیری با ورزیدن و ساختن پیش می‌رود؛ از نخستین گام تا به سرانجام رساندن یک کار راستین.',
                'p1' => 'آموزش را تا جایی که بتوانیم رایگان و در دسترس همگان می‌خواهیم؛ چون یادگیری می‌تواند درهای تازه‌ای از کار را بگشاید. راه باید برای نوجو روشن باشد و برای کارآزموده نیز ارزش کاربردی داشته باشد.',
                'p2' => 'شیوه‌ی ما بر ورز، بازخورد و ساختن کار استوار است؛ نه تنها نگاه کردن به درس‌ها. ما برای پیشبرد کارهای خود به نیروی تازه نیاز داریم؛ پس اگر دانشجو یا نوجو هستید، خودتان در تلگرام یا رایانامه پیام بدهید و پیگیر بمانید. کوشش و پیگیری شما، نخستین نشان شایستگی است.',
                'steps' => [['شناخت نیاز', 'اندازه‌ی دانسته‌ها، آماج و پیش‌نیازهای یادگیرندگان روشن می‌شود.'], ['چیدن راه', 'یادگیری به گام‌های کوچک و پیوسته بخش می‌شود.'], ['ورز و ساختن', 'هر بخش با ورز و ساختن یک کار کاربردی همراه است.'], ['بازبینی', 'کاستی‌ها بررسی می‌شوند و راه بر پایه‌ی پیشرفت بهبود می‌یابد.']],
            ],
            [
                'icon' => '<path d="m8 6-6 6 6 6M16 6l6 6-6 6M14 4l-4 16"/>',
                'title' => 'رایانش', 'sub' => 'کارافزار، تارنما و پاسبانی',
                'teaser' => 'ابزارهایی ساده، پاسداری‌شده و ماندگار که گره از کار بنگاه شما می‌گشایند و فروش را بالا می‌برند.',
                'p1' => 'ما کارافزار و تارنما می‌سازیم و پاسبانی را بخشی از برنامه‌ی کار می‌دانیم؛ نه کاری که تنها در پایان افزوده شود. ابزار خوب باید روشن، ماندگار و سازگار با نیاز راستین شما باشد؛ چه یک پیشه‌ی کوچک، چه یک بنگاه بزرگ.',
                'p2' => 'از سامانه‌ی فروشگاهی و بنگاهی تا تارنما و آزمون رخنه، راه کار با شناخت نیاز شما آغاز می‌شود و با ساختن گام‌به‌گام و بازبینی پیاپی پیش می‌رود. اگر پیشه‌ی سنتی دارید، ما بخش رایانه‌ای آن را به کار شما می‌افزاییم تا کارها آسان‌تر و درآمد بیشتر شود. نخستین رایزنی رایگان است.',
                'steps' => [['شناخت نیاز', 'نیازها، مرزها و سنجه‌های کامیابی بررسی می‌شوند.'], ['چیدن راهکار', 'ساختار، پاسبانی و راه گسترش از آغاز دیده می‌شود.'], ['ساختن گام‌به‌گام', 'کار در گام‌های کوچک و دیدنی پیش می‌رود.'], ['آزمون و سپردن', 'راهکار آزموده می‌شود و شیوه‌ی نگه‌داشت آن نوشته می‌شود.']],
            ],
            [
                'icon' => '<path d="M12 21s-8-4.7-8-11a4.5 4.5 0 0 1 8-2.8A4.5 4.5 0 0 1 20 10c0 6.3-8 11-8 11Z"/>',
                'title' => 'یاری همگانی', 'sub' => 'در کنار انجمن‌های مردمی',
                'teaser' => 'بخشی از توان ما باید در خدمت کارهایی باشد که ارزششان تنها با زر سنجیده نمی‌شود.',
                'p1' => 'می‌خواهیم بخشی از توان اَبینوت در کنار انجمن‌های نیکوکاری، گروه‌های خودجوش و پاسداران زبان و فرهنگ و زیستبوم و کشور باشد؛ به‌ویژه آنجا که یک ابزار رایانه‌ای می‌تواند کار را آسان‌تر یا دستاورد آن را بیشتر کند.',
                'p2' => 'راه همراهی می‌تواند آموزش، رایزنی، ساختن ابزار یا همراهی در بهبود یک سامانه باشد. دامنه و شیوه‌ی همراهی بر پایه‌ی نیاز و توان ما، با گفتگوی روشن برگزیده می‌شود. انجمن‌ها خودشان از راه رایانامه‌ی همیاری به نشانی hamyari@abinot.ir پیام بدهند و پیگیر بمانند. همه‌ی یاری‌ها رایگان نیست و ما تا جایی که بتوانیم یاری می‌رسانیم. حساب این کار با کار بازرگانی یکی نیست.',
                'steps' => [['گفتگو', 'آماج، نیاز و توان گروه همکار شنیده می‌شود.'], ['گزینش نخستین کار', 'راهکار کوچک و شدنی بر کارهای گران و پراکنده برتری دارد.'], ['همراهی در ساختن', 'راهکار با همکاری گروه و بر پایه‌ی بازخورد ساخته می‌شود.'], ['سپردن دانش', 'تا جایی که بشود، شیوه‌ی به‌کارگیری و نگه‌داشت نیز آموخته می‌شود.']],
            ],
        ];
        $stepNumbers = ['۱', '۲', '۳', '۴'];
    @endphp

    <section id="disciplines" class="ab-section ab-section--surface">
        <div class="ab-gridbg ab-gridbg--fine"></div>
        <div class="ab-wrap">
            <div class="ab-head ab-reveal">
                <div class="ab-eyebrow"><span class="ab-eyebrownum">۰۲</span><span class="ab-eyebrowrule"></span><span>زمینه‌های کاری</span></div>
                <h2 class="ab-title">سه راه، یک سو</h2>
                <p class="ab-lead">آموزش، ابزارسازی رایانه‌ای و یاری همگانی سه راه از هم گسسته نیستند؛ هر یک به دیگری نیرو می‌بخشد.</p>
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

    {{-- ====================== درباره‌ی اَبینوت ====================== --}}
    <section id="about" class="ab-section">
        <div class="ab-about__bg">
            <img src="{{ asset('welcome/darbareyeh-ma-pz.jpeg') }}" alt="" loading="lazy" decoding="async">
            <div class="ab-about__wash"></div>
            <div class="ab-gridbg"></div>
        </div>

        <div class="ab-wrap">
            <div class="ab-about__grid">
                <div class="ab-about__text ab-reveal">
                    <div class="ab-eyebrow"><span class="ab-eyebrownum">۰۳</span><span class="ab-eyebrowrule"></span><span>درباره‌ی اَبینوت</span></div>
                    <h2 class="ab-title">نامه‌ای که سال‌ها پیش نوشتیم،<br>و هنوز می‌نویسیم.</h2>
                    <p>اَبینوت نامه‌ای برای ایران است؛ کوششی برای به‌کار بستن توان رایانش در راه بهروزی مردم و زیستبوم. برای ما، ساختن تنها نوشتن برنامه نیست؛ شناخت نیاز، پاسخگو بودن و سپردن دانشی است که به دیگران نیز توان ساختن می‌دهد.</p>
                    <p>می‌خواهیم آرام و پیوسته پیش برویم، روشن گفتگو کنیم و از یاد نبریم که پشت هر کار، کسانی هستند که گاه و باورشان را به ما سپرده‌اند. ما در بوشهر هستیم؛ اگر بنگاه شما در بوشهر و پیرامون آن است، می‌توانیم رو در رو بنشینیم و گفتگو کنیم.</p>
                </div>

                <div class="ab-cells ab-caps ab-reveal" role="list" aria-label="شیوه‌ی کار اَبینوت">
                    @foreach ([
                        ['پاسبانی از آغاز', 'پاسبانی از روز نخست و از گام شناخت در برنامه‌ی کار هست.'],
                        ['ساختن گام‌به‌گام', 'پیشرفت کار به گام‌های روشن و دیدنی بخش می‌شود.'],
                        ['نوشتن و روشن نگه‌داشتن', 'گزینش‌ها و شیوه‌ی نگه‌داشت باید برای گروه شما روشن بماند.'],
                        ['سپردن دانش', 'آماج ما تنها سپردن کارافزار نیست؛ توان به‌کارگیری آن نیز ارزشمند است.'],
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

    {{-- ====================== پایبندی‌ها ====================== --}}
    @php
        $values = [
            ['آرامش',    '<path d="M3 15c3-3 6-3 9 0s6 3 9 0"/><path d="M3 10c3-3 6-3 9 0s6 3 9 0"/>', 'کار درست به شتاب‌زدگی نیاز ندارد. با گام‌های سنجیده، پیوسته پیش می‌رویم و ارزش کار را برای شتاب از دست نمی‌دهیم.'],
            ['روشن‌گویی',   '<circle cx="12" cy="12" r="9"/><path d="M12 3v18M3 12h18"/>',                 'درباره‌ی گزینش‌ها، مرزها و آنچه می‌سپاریم روشن سخن می‌گوییم؛ پیچیدگی بیهوده و نوید بی‌پشتوانه جایی در کار ما ندارد.'],
            ['ماندگاری', '<path d="M12 3v18M5 8l7-5 7 5M5 16l7 5 7-5"/>',                               'راهکار باید پس از سپردن نیز دریافتنی، نگه‌داشتنی و گسترش‌یافتنی باشد؛ نه اینکه برای هر دگرگونی کوچک به سازنده وابسته بماند.'],
        ];
    @endphp

    <section id="values" class="ab-section ab-section--alt">
        <div class="ab-gridbg ab-gridbg--fine"></div>
        <div class="ab-wrap">
            <div class="ab-head ab-head--center ab-reveal">
                <div class="ab-eyebrow"><span class="ab-eyebrownum">۰۴</span><span class="ab-eyebrowrule"></span><span>پایبندی‌های ما</span></div>
                <h2 class="ab-title">سه پیمان برای کار درست</h2>
                <p class="ab-lead">این پیمان‌ها باید در شیوه‌ی کار ما دیده شوند؛ نه اینکه تنها در نوشته‌ها بمانند.</p>
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
                    <p>اگر بنگاهی دارید و می‌خواهید فروش را بیشتر کنید و کارها را سامان دهید، در نخستین رایزنی رایگان با ما گفتگو کنید. می‌توانیم در بوشهر رو در رو بنشینیم و راهکار ویژه‌ی شما را پیدا کنیم. دانشجویان و جویندگان کارآموزی نیز خودشان پیام بدهند و پیگیر بمانند.</p>

                    <div class="ab-cta__actions">
                        <a href="mailto:dorud@abinot.ir?subject={{ rawurlencode('رایزنی رایگان با اَبینوت') }}" class="ab-btn ab-btn--primary">
                            آغاز رایزنی رایگان
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 2 11 13M22 2l-7 20-4-9-9-4 20-7Z"/></svg>
                        </a>
                        <a href="#disciplines" class="ab-btn ab-btn--ghost">شناخت راه‌های کاری</a>
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
                    بازگشت به بالای برگه
                </a>
            </div>
        </div>

        <div class="ab-wrap">
            <div class="ab-footer__grid">
                <div class="ab-footer__brand">
                    <a href="#top" aria-label="اَبینوت — بازگشت به بالا">
                        <img src="{{ asset('welcome/Abinot neshan-sepid.svg') }}" alt="اَبینوت" width="140" height="60" loading="lazy">
                    </a>
                    <p>خانه‌ای برای آموزش، ابزارسازی رایانه‌ای و یاری مردمی؛ در کنار مردم ایران، آرام و پیوسته.</p>
                    <a href="mailto:dorud@abinot.ir" class="ab-footer__mail">
                        dorud@abinot.ir
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true"><path d="M15 18 9 12l6-6"/></svg>
                    </a>
                </div>

                <nav aria-label="پیوندهای تند">
                    <h3>پیوندهای تند</h3>
                    <ul>
                        <li><a href="#top">خانه</a></li>
                        <li><a href="#products">راهکارها</a></li>
                        <li><a href="#disciplines">زمینه‌های کاری</a></li>
                        <li><a href="#about">درباره‌ی ما</a></li>
                        <li><a href="#values">پایبندی‌ها</a></li>
                    </ul>
                </nav>

                <nav aria-label="کارها">
                    <h3>زمینه‌ها</h3>
                    <ul>
                        <li><a href="#disciplines">آموزش رایگان</a></li>
                        <li><a href="#products">ساختن کارافزار</a></li>
                        <li><a href="#products">ساختن تارنما و کارافزار همراه</a></li>
                        <li><a href="#products">پاسبانی و نگه‌داشت</a></li>
                        <li><a href="#disciplines">یاری همگانی</a></li>
                    </ul>
                </nav>

                <div>
                    <h3>راه‌های پیوند</h3>
                    <ul>
                        <li class="ab-footer__row">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg>
                            <a href="mailto:dorud@abinot.ir" dir="ltr">dorud@abinot.ir</a>
                        </li>
                        <li class="ab-footer__row">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            <span>برای آغاز کار، خواسته و نیازتان را کوتاه و روشن بنویسید.</span>
                        </li>
                        <li class="ab-footer__row">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" aria-hidden="true"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.9.6 2.8a2 2 0 0 1-.4 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.2a2 2 0 0 1 2.1-.4c.9.3 1.9.5 2.8.6a2 2 0 0 1 1.7 2Z"/></svg>
                            <span>شماره‌ی پیوند: <a href="tel:+989177719311" dir="ltr">۰۹۱۷۷۷۱۹۳۱۱</a></span>
                        </li>
                        <li class="ab-footer__row">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" aria-hidden="true"><path d="M22 2 11 13M22 2l-7 20-4-9-9-4 20-7Z"/></svg>
                            <span>تلگرام: <a href="https://t.me/abinot_ir" dir="ltr">abinot_ir</a> • بله: <a href="https://ble.ir/abinot" dir="ltr">abinot</a></span>
                        </li>
                        <li class="ab-footer__row">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.2" cy="6.8" r="1" fill="currentColor" stroke="none"/></svg>
                            <span>اینستاگرام: <a href="https://instagram.com/abinot_ir" dir="ltr">abinot_ir</a></span>
                        </li>
                        <li class="ab-footer__row">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" aria-hidden="true"><path d="M12 21s-7-5.5-7-11a7 7 0 0 1 14 0c0 5.5-7 11-7 11Z"/><circle cx="12" cy="10" r="2.5"/></svg>
                            <span>نشانی: بوشهر، سرتل، ادیب ۱۱، شماره‌ی ۸، یکای ۳ — نشست رو در رو با هماهنگی پیشین.</span>
                        </li>
                        <li class="ab-footer__row">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg>
                            <span>رایانامه‌ی همیاری انجمن‌ها: <a href="mailto:hamyari@abinot.ir" dir="ltr">hamyari@abinot.ir</a></span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="ab-footer__bottom">
                <span>© اَبینوت — همه‌ی دستاوردها از آن اَبینوت است.</span>
                <p>
                    پرسشی درباره‌ی نگه‌داشت داده‌ها یا شیوه‌ی کار ما دارید؟
                    <a href="mailto:dorud@abinot.ir?subject={{ rawurlencode('پرسش درباره‌ی شیوه‌ی کار اَبینوت') }}">از راه رایانامه با ما در میان بگذارید.</a>
                </p>
            </div>
        </div>
    </footer>

</div>

</x-layouts::khoneh>
