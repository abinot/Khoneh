<div
    x-data
    x-init="$nextTick(() => { $dispatch('startCounters') })"
    :class="{ 'dark': $wire.darkMode }"
    class="min-h-screen"
>
    <div class="dark:bg-gray-900 dark:text-white">
        @include('livewire.components.hero')
        @include('livewire.components.features')
        @include('livewire.components.stats')
        @include('livewire.components.pricing')
        @include('livewire.components.testimonials')
        @include('livewire.components.footer')
    </div>
</div>
