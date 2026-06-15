{{--
    Page header with title, subtitle, and optional breadcrumbs slot.
    Props: $title, $subtitle (optional)
--}}
@props(['title', 'subtitle' => null])

<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
    <div>
        <h2 class="text-xl font-bold text-slate-800">{{ $title }}</h2>
        @if ($subtitle)
            <p class="mt-0.5 text-sm text-slate-500">{{ $subtitle }}</p>
        @endif
    </div>
    @if ($slot->isNotEmpty())
        <div class="flex items-center gap-2">
            {{ $slot }}
        </div>
    @endif
</div>
