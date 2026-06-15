@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

    <x-page-header
        title="Welcome back, Ahmed 👋"
        subtitle="Here's what's happening with your properties today."
    />

    {{-- ── Statistics cards ──────────────────────────────── --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">
        @foreach ($stats as $stat)
            <x-stat-card
                :label="$stat['label']"
                :value="$stat['value']"
                :change="$stat['change']"
                :trend="$stat['trend']"
                :icon="$stat['icon']"
                :accent="$stat['accent']"
                :icon_bg="$stat['icon_bg']"
            />
        @endforeach
    </div>

    {{-- ── Two-column lower section ────────────────────────── --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        {{-- Recent Properties table (2/3 width on xl) --}}
        <div class="xl:col-span-2 card overflow-hidden">

            <div class="flex items-center justify-between px-5 py-4 border-b border-surface-200">
                <div>
                    <h3 class="text-sm font-semibold text-slate-800">Recent Properties</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Latest 5 listings added to the platform</p>
                </div>
                <a href="{{ route('properties.index') }}" class="btn-secondary text-xs px-3 py-1.5">
                    View All
                    <i class="bi bi-arrow-right text-xs"></i>
                </a>
            </div>

            {{-- Table --}}
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-surface-50 border-b border-surface-200">
                            <th class="text-left text-xs font-semibold text-slate-500 uppercase tracking-wide px-5 py-3">Property</th>
                            <th class="text-left text-xs font-semibold text-slate-500 uppercase tracking-wide px-5 py-3 hidden sm:table-cell">Type</th>
                            <th class="text-left text-xs font-semibold text-slate-500 uppercase tracking-wide px-5 py-3">Price</th>
                            <th class="text-left text-xs font-semibold text-slate-500 uppercase tracking-wide px-5 py-3 hidden md:table-cell">Status</th>
                            <th class="text-right text-xs font-semibold text-slate-500 uppercase tracking-wide px-5 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-100">
                        @foreach ($recentProperties as $property)
                            <tr class="hover:bg-surface-50 transition-colors group">
                                {{-- Property name + location --}}
                                <td class="px-5 py-3.5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-lg overflow-hidden flex-shrink-0 bg-surface-200">
                                            <img src="{{ $property['images'][0] }}"
                                                 alt="{{ $property['name'] }}"
                                                 class="w-full h-full object-cover">
                                        </div>
                                        <div class="min-w-0">
                                            <p class="font-medium text-slate-800 truncate max-w-[160px] group-hover:text-brand-600 transition-colors">
                                                {{ $property['name'] }}
                                            </p>
                                            <p class="text-xs text-slate-400 truncate max-w-[160px]">
                                                {{ $property['location'] }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                {{-- Type --}}
                                <td class="px-5 py-3.5 hidden sm:table-cell">
                                    @php
                                        $typeClass = match($property['type']) {
                                            'Apartment' => 'badge-apartment',
                                            'Villa'     => 'badge-villa',
                                            'Office'    => 'badge-office',
                                            default     => 'badge-apartment',
                                        };
                                    @endphp
                                    <span class="{{ $typeClass }}">{{ $property['type'] }}</span>
                                </td>

                                {{-- Price --}}
                                <td class="px-5 py-3.5 font-semibold text-slate-800">
                                    {{ $property['price'] }}
                                </td>

                                {{-- Status --}}
                                <td class="px-5 py-3.5 hidden md:table-cell">
                                    <x-status-badge :status="$property['status']" />
                                </td>

                                {{-- Action --}}
                                <td class="px-5 py-3.5 text-right">
                                    <a href="{{ route('properties.show', $property['id']) }}"
                                       class="text-brand-600 hover:text-brand-800 text-xs font-medium transition-colors">
                                        View <i class="bi bi-arrow-right"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        {{-- Activity / quick stats sidebar (1/3 width on xl) --}}
        <div class="flex flex-col gap-4">

            {{-- Property type breakdown --}}
            <div class="card p-5">
                <h3 class="text-sm font-semibold text-slate-800 mb-4">Listings by Type</h3>
                <div class="space-y-3">
                    @php
                        $breakdown = [
                            ['label' => 'Apartments', 'count' => 112, 'pct' => 45, 'color' => 'bg-brand-500'],
                            ['label' => 'Villas',     'count' => 84,  'pct' => 34, 'color' => 'bg-purple-500'],
                            ['label' => 'Offices',    'count' => 52,  'pct' => 21, 'color' => 'bg-slate-400'],
                        ];
                    @endphp
                    @foreach ($breakdown as $item)
                        <div>
                            <div class="flex items-center justify-between text-xs mb-1">
                                <span class="text-slate-600 font-medium">{{ $item['label'] }}</span>
                                <span class="text-slate-500">{{ $item['count'] }} <span class="text-slate-400">({{ $item['pct'] }}%)</span></span>
                            </div>
                            <div class="h-1.5 bg-surface-200 rounded-full overflow-hidden">
                                <div class="{{ $item['color'] }} h-full rounded-full" style="width: {{ $item['pct'] }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Recent activity feed --}}
            <div class="card p-5 flex-1">
                <h3 class="text-sm font-semibold text-slate-800 mb-4">Recent Activity</h3>
                <div class="space-y-4">
                    @php
                        $activities = [
                            ['icon' => 'bi-house-add', 'color' => 'text-brand-500 bg-brand-50',   'text' => 'Palm Grove Villa listed',          'time' => '2 hours ago'],
                            ['icon' => 'bi-person-add', 'color' => 'text-emerald-600 bg-emerald-50', 'text' => 'New client: Sara Hassan',        'time' => '4 hours ago'],
                            ['icon' => 'bi-currency-dollar', 'color' => 'text-amber-600 bg-amber-50', 'text' => 'Zamalek Flat marked as Sold',  'time' => '6 hours ago'],
                            ['icon' => 'bi-bell', 'color' => 'text-rose-500 bg-rose-50',            'text' => '8 new property requests',          'time' => '1 day ago'],
                            ['icon' => 'bi-pencil-square', 'color' => 'text-slate-500 bg-slate-50', 'text' => 'Maadi Apt. status updated',       'time' => '2 days ago'],
                        ];
                    @endphp
                    @foreach ($activities as $activity)
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 w-7 h-7 rounded-lg {{ $activity['color'] }} flex items-center justify-center">
                                <i class="bi {{ $activity['icon'] }} text-xs"></i>
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="text-xs font-medium text-slate-700 leading-snug">{{ $activity['text'] }}</p>
                                <p class="text-[11px] text-slate-400 mt-0.5">{{ $activity['time'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>

@endsection
