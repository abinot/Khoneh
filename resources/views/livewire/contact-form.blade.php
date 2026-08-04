@php
    $inputClass = 'w-full bg-white border border-neutral-200 rounded-xl px-4 py-3 text-neutral-900
                   focus:border-sopal-700 focus:ring-2 focus:ring-sopal-700/20 transition-all
                   placeholder:text-neutral-400';
@endphp

<div>
    @if(session('success'))
    <div class="bg-green-50 border border-green-300 text-green-700 p-4 rounded-xl text-center mb-6"
         x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
        {{ session('success') }}
    </div>
    @endif

    @if($errors->has('rate'))
    <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl text-center mb-6">
        {{ $errors->first('rate') }}
    </div>
    @endif

    <form wire:submit="submit" class="space-y-6 bg-white border border-neutral-200 rounded-3xl p-8 shadow-sm">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-neutral-800 text-sm font-bold mb-2">نام <span class="text-sopal-700">*</span></label>
                <input type="text" wire:model="name" class="{{ $inputClass }}" placeholder="نام شما">
                @error('name') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-neutral-800 text-sm font-bold mb-2">ایمیل <span class="text-sopal-700">*</span></label>
                <input type="email" wire:model="email" class="{{ $inputClass }}" placeholder="email@example.com">
                @error('email') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-neutral-800 text-sm font-bold mb-2">تلفن (اختیاری)</label>
            <input type="text" wire:model="phone" class="{{ $inputClass }}" placeholder="۰۹۱۲۳۴۵۶۷۸۹">
            @error('phone') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-neutral-800 text-sm font-bold mb-2">نوع کسب‌وکار <span class="text-sopal-700">*</span></label>
            <select wire:model="businessType" class="{{ $inputClass }}">
                <option value="" class="bg-white">انتخاب کنید</option>
                <option value="restaurant" class="bg-white">رستوران / فست‌فود</option>
                <option value="law_office" class="bg-white">دفتر حقوقی</option>
                <option value="other" class="bg-white">سایر</option>
            </select>
            @error('businessType') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-neutral-800 text-sm font-bold mb-2">پیام <span class="text-sopal-700">*</span></label>
            <textarea wire:model="message" rows="4"
                      class="{{ $inputClass }} resize-none"
                      placeholder="پیام شما..."></textarea>
            @error('message') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
        </div>

        <button type="submit"
                wire:loading.attr="disabled" wire:target="submit"
                class="w-full bg-sopal-800 hover:bg-sopal-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-sopal-800/20 transition-all duration-300 hover:-translate-y-0.5 disabled:opacity-50 disabled:hover:translate-y-0">
            <span wire:loading.remove wire:target="submit">ارسال پیام</span>
            <span wire:loading wire:target="submit">در حال ارسال...</span>
        </button>
    </form>
</div>