{{--
    Property card component for the listing grid.
    Props: $property (array)
--}}
@props(['property'])

@php
    $statusClass = match($property['status']) {
        'Available' => 'badge-available',
        'Sold'      => 'badge-sold',
        'Reserved'  => 'badge-reserved',
        default     => 'badge-available',
    };
    $typeClass = match($property['type']) {
        'Apartment' => 'badge-apartment',
        'Villa'     => 'badge-villa',
        'Office'    => 'badge-office',
        default     => 'badge-apartment',
    };
    $statusIcon = match($property['status']) {
        'Available' => 'bi-check-circle-fill',
        'Sold'      => 'bi-x-circle-fill',
        'Reserved'  => 'bi-clock-fill',
        default     => 'bi-check-circle-fill',
    };
@endphp

<div
    class="card overflow-hidden flex flex-col hover:shadow-card-hover transition-shadow duration-200 group"
    data-property-card
    data-name="{{ strtolower($property['name']) }}"
    data-status="{{ strtolower($property['status']) }}"
    data-type="{{ strtolower($property['type']) }}"
>
    {{-- Image --}}
    <div class="relative overflow-hidden h-48 bg-surface-200 flex-shrink-0">
        <img
            src="{{ $property['images'][0] }}"
            alt="{{ $property['name'] }}"
            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
            loading="lazy"
        >
        {{-- Type badge over image --}}
        <span class="absolute top-3 left-3 {{ $typeClass }} shadow-sm">
            {{ $property['type'] }}
        </span>
        {{-- Status badge over image --}}
        <span class="absolute top-3 right-3 {{ $statusClass }} shadow-sm">
            <i class="bi {{ $statusIcon }} mr-1"></i>{{ $property['status'] }}
        </span>
    </div>

    {{-- Body --}}
    <div class="p-4 flex flex-col flex-1">
        <h3 class="text-sm font-semibold text-slate-800 leading-snug line-clamp-2 group-hover:text-brand-600 transition-colors">
            {{ $property['name'] }}
        </h3>

        <p class="mt-1 text-xs text-slate-500 flex items-center gap-1">
            <i class="bi bi-geo-alt text-slate-400"></i>
            {{ $property['location'] }}
        </p>

        {{-- Meta row --}}
        <div class="mt-3 flex items-center gap-3 text-xs text-slate-500 border-t border-surface-100 pt-3">
            @if ($property['bedrooms'] > 0)
                <span class="flex items-center gap-1">
                    <i class="bi bi-door-open text-slate-400"></i>{{ $property['bedrooms'] }} Beds
                </span>
                <span class="flex items-center gap-1">
                    <i class="bi bi-droplet text-slate-400"></i>{{ $property['bathrooms'] }} Baths
                </span>
            @endif
            <span class="flex items-center gap-1">
                <i class="bi bi-aspect-ratio text-slate-400"></i>{{ $property['area'] }}
            </span>
        </div>

        {{-- Price + action --}}
        <div class="mt-4 flex items-center justify-between">
            <p class="text-base font-bold text-brand-700">{{ $property['price'] }}</p>
            <a href="{{ route('properties.show', $property['id']) }}"
               class="btn-primary text-xs px-3 py-1.5">
                View Details
            </a>
        </div>
    </div>
</div>
