{{--
    Status badge component
    Props: $status (Available | Sold | Reserved)
--}}
@props(['status'])

@php
    $class = match($status) {
        'Available' => 'badge-available',
        'Sold'      => 'badge-sold',
        'Reserved'  => 'badge-reserved',
        default     => 'badge-available',
    };
    $icon = match($status) {
        'Available' => 'bi-check-circle-fill',
        'Sold'      => 'bi-x-circle-fill',
        'Reserved'  => 'bi-clock-fill',
        default     => 'bi-check-circle-fill',
    };
@endphp

<span class="{{ $class }}">
    <i class="bi {{ $icon }} mr-1"></i>{{ $status }}
</span>
