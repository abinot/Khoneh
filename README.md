# سوپال (Sopal)

پلتفرم چندمستاجری مدیریت رستوران، فست‌فود و دفتر حقوقی — از کنار خلیج فارس.
همراه با جریان احراز هویت (ورود / ثبت‌نام / داشبورد / پنل ادمین) و توسعه‌ی تمام‌عیار آن.

## امکانات

- صفحه‌ی فرود (لندینگ) با موتیف «کشند/موج» — برند تیل و کانواس
- صفحات درباره/تماس/قیمت‌گذاری
- فرم‌های تماس، خبرنامه و پیش‌سفارش (ذخیره در SQLite)
- **احراز هویت جلسه‌ای**: ورود، ثبت‌نام (با گیت 404 وقتی غیرفعال است)، خروج
- **داشبورد کاربر**: نام + نقش + دکمه‌ی خروج + لینک پنل (فقط ادمین)
- **پنل ادمین**: آمار (تعداد کاربران، فعال، وضعیت ثبت‌نام)، لیست کاربران + غیرفعال‌سازی + تغییر نقش + حذف، تنظیم ثبت‌نام (روشن/خاموش — سبز/قرمز)
- امنیت: password hash (بکریت)، CSRF، جلسه‌ی امن، throttle ورود، بازبینی `is_active` در هر درخواست

## نیازمندی‌ها

- PHP 8.3+، Composer
- Node.js + npm (برای asset ها — اختیاری؛ صفحات عمومی خودکفا CDN هستند)
- SQLite

## نصب

```bash
git clone <repo> sopal && cd sopal
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --force
php artisan db:seed --force
php artisan serve
```

### کاربر ادمین پیش‌فرض

Seeder یک ادمین `fenfen1290@gmail.com` با **رمز تصادفی ۲۰ کاراکتری** می‌سازد و آن را هنگام اجرا در ترمینال چاپ می‌کند:

```bash
php artisan db:seed --force
# Admin created for fenfen1290@gmail.com. Login password: <random-20-chars>
```

> ⚠️ **در اولین ورود، رمز را عوض کنید.** (بازنشانی رمز یا تغییر دستی در DB؛ فعلاً ماژول بازنشانی پیاده نشده است.)

### تنظیم ثبت‌نام

کلید `registration_enabled` در جدول `settings`:
- `1` → ثبت‌نام باز (پنل ادمین: پیل سبز «ریجیستر فعال»)
- `0` → صفحه‌ی ثبت‌نام 404 می‌شود («صفحه مورد نظر وجود ندارد») و پیل قرمز «ریجیستر غیرفعال»

## پیکربندی متغیرهای محیط (`.env`)

- `APP_ENV` — در تولید `production`
- `APP_DEBUG` — در تولید `false`
- `APP_KEY` — تولید با `php artisan key:generate`
- `SESSION_DRIVER=database` ، `SESSION_LIFETIME`، `SESSION_SECURE_COOKIE` (روی HTTPS `true`)
- `DB_CONNECTION=sqlite` (فایل `database/database.sqlite`)
- `MAIL_MAILER` — فعلاً `log`؛ برای ارسال واقعی مرز SMTP
- `QUEUE_CONNECTION=database` ، `CACHE_STORE=database`

## تست

```bash
php artisan test          # 27 تست — احراز هویت، پنل، گیت 404
```

داده‌ی تستخزانه در هر تست `:memory:` ساخته و با `RefreshDatabase` واچ می‌شود.

## استقرار تولید

```bash
./deploy.sh               # قفل‌ها، migrate، cache، optimize، restart
./backup.sh               # پشتیبان SQLite به storage/backups
```

جزئیات کامل در بخش‌های زیر:

## امنیت (خلاصه)

- CSRF روی همه‌ی فرم‌ها (`@csrf`)
- Prepared statements همیشه (Eloquent)
- رمزها با `password_hash`/بکریت (کست `hashed`)
- throttle: حداکثر ۵ تلاش ورود در دقیقه
- بازبینی کاربر غیرفعال در هر درخواست (`EnsureUserIsActive`)
- ادمین اصلی: غیرفعالی/تغییر نقش/حذف توسط ادمین دیگر ممنوع
- خروجی همه‌جا escape شده؛ بدون `{!! !!}`

## لایسنس

همه‌ی حقوق محفوظ © ۱۴۰۳ سوپال.