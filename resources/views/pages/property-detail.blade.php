@extends('layouts.app')

@section('title', $property['name'])
@section('page-title', 'Property Detail')

@section('content')

    {{-- ── Back button + actions row ──────────────────────── --}}
    <div class="flex items-center justify-between mb-6 gap-4">

        <a href="{{ route('properties.index') }}" class="btn-secondary">
            <i class="bi bi-arrow-left text-sm"></i>
            Back to Properties
        </a>

        <div class="flex items-center gap-2">
            {{-- Edit button — disabled (UI only) --}}
            <button class="btn-disabled" disabled>
                <i class="bi bi-pencil text-sm"></i>
                <span class="hidden sm:inline">Edit Property</span>
            </button>
        </div>

    </div>

    {{-- ── Main two-column layout ──────────────────────────── --}}
    <div class="grid grid-cols-1 xl:grid-cols-5 gap-6">

        {{-- Left: gallery + features (3/5) --}}
        <div class="xl:col-span-3 space-y-5">

            {{-- Image gallery --}}
            <div class="card overflow-hidden">

                {{-- Main image --}}
                <div class="relative h-64 sm:h-80 bg-surface-200 overflow-hidden">
                    <img
                        id="gallery-main"
                        src="{{ $property['images'][0] }}"
                        alt="{{ $property['name'] }}"
                        class="w-full h-full object-cover transition-opacity duration-300"
                    >
                    {{-- Status badge overlay --}}
                    <div class="absolute top-4 right-4">
                        <x-status-badge :status="$property['status']" />
                    </div>
                </div>

                {{-- Thumbnails --}}
                <div class="flex gap-2 p-3 overflow-x-auto bg-surface-50 border-t border-surface-200">
                    @foreach ($property['images'] as $index => $img)
                        <button
                            data-thumb="{{ $img }}"
                            class="flex-shrink-0 w-16 h-12 rounded-lg overflow-hidden border-2 transition-all duration-150
                                   {{ $index === 0 ? 'border-brand-500 ring-2 ring-brand-200' : 'border-surface-200 hover:border-brand-300' }}"
                        >
                            <img src="{{ $img }}" alt="Thumbnail {{ $index + 1 }}" class="w-full h-full object-cover">
                        </button>
                    @endforeach
                </div>

            </div>

            {{-- Features list --}}
            <div class="card p-5">
                <h3 class="text-sm font-semibold text-slate-800 mb-4 flex items-center gap-2">
                    <i class="bi bi-stars text-brand-500"></i>
                    Property Features
                </h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-y-2.5 gap-x-3">
                    @foreach ($property['features'] as $feature)
                        <div class="flex items-center gap-2 text-sm text-slate-700">
                            <i class="bi bi-check-circle-fill text-emerald-500 flex-shrink-0"></i>
                            <span>{{ $feature }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Description --}}
            <div class="card p-5">
                <h3 class="text-sm font-semibold text-slate-800 mb-3 flex items-center gap-2">
                    <i class="bi bi-file-text text-brand-500"></i>
                    Description
                </h3>
                <p class="text-sm text-slate-600 leading-relaxed">
                    {{ $property['description'] }}
                </p>
            </div>

        </div>

        {{-- Right: property info card (2/5) --}}
        <div class="xl:col-span-2 space-y-5">

            {{-- Price + name --}}
            <div class="card p-5">
                <div class="flex items-start justify-between gap-2 mb-3">
                    @php
                        $typeClass = match($property['type']) {
                            'Apartment' => 'badge-apartment',
                            'Villa'     => 'badge-villa',
                            'Office'    => 'badge-office',
                            default     => 'badge-apartment',
                        };
                    @endphp
                    <span class="{{ $typeClass }}">{{ $property['type'] }}</span>
                    <x-status-badge :status="$property['status']" />
                </div>

                <h2 class="text-lg font-bold text-slate-800 leading-snug">{{ $property['name'] }}</h2>

                <p class="mt-1 text-sm text-slate-500 flex items-center gap-1">
                    <i class="bi bi-geo-alt text-slate-400"></i>
                    {{ $property['location'] }}
                </p>

                <div class="mt-4 pt-4 border-t border-surface-200">
                    <p class="text-xs text-slate-400 uppercase tracking-wide font-medium">Listing Price</p>
                    <p class="text-3xl font-bold text-brand-700 mt-1">{{ $property['price'] }}</p>
                </div>
            </div>

            {{-- Key details grid --}}
            <div class="card p-5">
                <h3 class="text-sm font-semibold text-slate-800 mb-4">Property Details</h3>

                <dl class="space-y-3">

                    @if ($property['bedrooms'] > 0)
                        <div class="flex items-center justify-between text-sm">
                            <dt class="text-slate-500 flex items-center gap-2">
                                <i class="bi bi-door-open text-slate-400 w-4 text-center"></i>Bedrooms
                            </dt>
                            <dd class="font-medium text-slate-800">{{ $property['bedrooms'] }}</dd>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <dt class="text-slate-500 flex items-center gap-2">
                                <i class="bi bi-droplet text-slate-400 w-4 text-center"></i>Bathrooms
                            </dt>
                            <dd class="font-medium text-slate-800">{{ $property['bathrooms'] }}</dd>
                        </div>
                    @endif

                    <div class="flex items-center justify-between text-sm">
                        <dt class="text-slate-500 flex items-center gap-2">
                            <i class="bi bi-aspect-ratio text-slate-400 w-4 text-center"></i>Total Area
                        </dt>
                        <dd class="font-medium text-slate-800">{{ $property['area'] }}</dd>
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <dt class="text-slate-500 flex items-center gap-2">
                            <i class="bi bi-calendar3 text-slate-400 w-4 text-center"></i>Year Built
                        </dt>
                        <dd class="font-medium text-slate-800">{{ $property['year_built'] }}</dd>
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <dt class="text-slate-500 flex items-center gap-2">
                            <i class="bi bi-tag text-slate-400 w-4 text-center"></i>Property Type
                        </dt>
                        <dd class="font-medium text-slate-800">{{ $property['type'] }}</dd>
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <dt class="text-slate-500 flex items-center gap-2">
                            <i class="bi bi-info-circle text-slate-400 w-4 text-center"></i>Status
                        </dt>
                        <dd><x-status-badge :status="$property['status']" /></dd>
                    </div>

                </dl>
            </div>

            {{-- Agent contact card --}}
            <div class="card p-5">
                <h3 class="text-sm font-semibold text-slate-800 mb-4">Assigned Agent</h3>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-full bg-brand-100 text-brand-700 flex items-center justify-center font-semibold text-sm flex-shrink-0">
                        KM
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-800">Kareem Mansour</p>
                        <p class="text-xs text-slate-500">Senior Property Consultant</p>
                    </div>
                </div>
                <div class="space-y-2">
                    <div class="flex items-center gap-2 text-xs text-slate-600">
                        <i class="bi bi-telephone text-slate-400"></i>
                        +20 100 234 5678
                    </div>
                    <div class="flex items-center gap-2 text-xs text-slate-600">
                        <i class="bi bi-envelope text-slate-400"></i>
                        kareem@readmin.eg
                    </div>
                </div>
                <button class="btn-disabled w-full justify-center mt-4" disabled>
                    <i class="bi bi-chat-dots text-sm"></i>
                    Contact Agent
                </button>
            </div>

        </div>

    </div>

@endsection
