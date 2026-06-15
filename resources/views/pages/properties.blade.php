@extends('layouts.app')

@section('title', 'Properties')
@section('page-title', 'Properties')

@section('content')

    <x-page-header
        title="All Properties"
        subtitle="{{ count($properties) }} listings available on the platform"
    >
        {{-- Slot: right-side action (disabled for UI-only demo) --}}
        <button class="btn-disabled" disabled>
            <i class="bi bi-plus-lg"></i>
            Add Property
        </button>
    </x-page-header>

    {{-- ── Filters bar ────────────────────────────────────── --}}
    <div class="card p-4 mb-6">
        <div class="flex flex-col sm:flex-row gap-3">

            {{-- Search --}}
            <div class="relative flex-1">
                <i class="bi bi-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm pointer-events-none"></i>
                <input
                    id="property-search"
                    type="search"
                    placeholder="Search by property name…"
                    class="form-input pl-9"
                >
            </div>

            {{-- Filter by Status --}}
            <select id="filter-status" class="form-input sm:w-44">
                <option value="">All Statuses</option>
                <option value="available">Available</option>
                <option value="sold">Sold</option>
                <option value="reserved">Reserved</option>
            </select>

            {{-- Filter by Type --}}
            <select id="filter-type" class="form-input sm:w-40">
                <option value="">All Types</option>
                <option value="apartment">Apartment</option>
                <option value="villa">Villa</option>
                <option value="office">Office</option>
            </select>

        </div>
    </div>

    {{-- ── Property cards grid ────────────────────────────── --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">

        @foreach ($properties as $property)
            <x-property-card :property="$property" />
        @endforeach

    </div>

    {{-- Empty state (hidden by default, shown via JS when all filtered) --}}
    <div id="properties-empty" class="hidden mt-12 text-center py-16">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-surface-100 mb-4">
            <i class="bi bi-buildings text-3xl text-slate-400"></i>
        </div>
        <h3 class="text-sm font-semibold text-slate-700 mb-1">No properties found</h3>
        <p class="text-sm text-slate-400">Try adjusting your search or filter criteria.</p>
    </div>

@endsection
