{{--
    Stat card component
    Props: $label, $value, $change, $trend, $icon, $accent, $icon_bg
--}}
@props(['label', 'value', 'change', 'trend' => 'up', 'icon', 'accent', 'icon_bg'])

<div class="card {{ $accent }} p-5 flex items-start gap-4 hover:shadow-card-hover transition-shadow duration-200">

    {{-- Icon --}}
    <div class="flex-shrink-0 w-11 h-11 rounded-xl {{ $icon_bg }} flex items-center justify-center">
        <i class="bi {{ $icon }} text-xl"></i>
    </div>

    {{-- Content --}}
    <div class="min-w-0 flex-1">
        <p class="text-xs font-medium text-slate-500 uppercase tracking-wide truncate">{{ $label }}</p>
        <p class="mt-0.5 text-2xl font-bold text-slate-800 leading-tight">{{ $value }}</p>
        <p class="mt-1 flex items-center gap-1 text-xs {{ $trend === 'up' ? 'text-emerald-600' : 'text-rose-500' }}">
            <i class="bi {{ $trend === 'up' ? 'bi-arrow-up-short' : 'bi-arrow-down-short' }} text-sm font-bold"></i>
            {{ $change }}
        </p>
    </div>

</div>
