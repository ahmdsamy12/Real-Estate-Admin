{{--
    Sidebar navigation
    Uses Bootstrap Icons for menu icons.
    Active state is detected via Route::currentRouteName().
--}}

@php
    $navItems = [
        [
            'route'  => 'dashboard',
            'label'  => 'Dashboard',
            'icon'   => 'bi-speedometer2',
            'match'  => ['dashboard'],
        ],
        [
            'route'  => 'properties.index',
            'label'  => 'Properties',
            'icon'   => 'bi-buildings',
            'match'  => ['properties.index', 'properties.show'],
        ],
    ];
@endphp

<aside id="sidebar"
       class="sidebar fixed inset-y-0 left-0 z-30 w-64 flex flex-col
              bg-white border-r border-surface-200
              -translate-x-full lg:translate-x-0 lg:static lg:inset-auto">

    {{-- Logo --}}
    <div class="flex items-center justify-between h-16 px-5 border-b border-surface-200 flex-shrink-0">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5">
            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-brand-600 text-white">
                <i class="bi bi-house-heart-fill text-sm"></i>
            </span>
            <span class="text-sm font-bold text-slate-800 tracking-tight">RE<span class="text-brand-600">Admin</span></span>
        </a>
        <button id="sidebar-close" class="lg:hidden text-slate-400 hover:text-slate-600 p-1 rounded-md">
            <i class="bi bi-x-lg text-lg"></i>
        </button>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 overflow-y-auto py-5 px-3 space-y-0.5">

        <p class="px-4 py-1 text-[10px] font-semibold uppercase tracking-widest text-slate-400 mb-1">Main</p>

        @foreach ($navItems as $item)
            @php
                $isActive = in_array(request()->route()?->getName(), $item['match']);
            @endphp
            <a href="{{ route($item['route']) }}"
               class="nav-link {{ $isActive ? 'active' : '' }}">
                <i class="bi {{ $item['icon'] }} text-base flex-shrink-0"></i>
                {{ $item['label'] }}
                @if ($isActive)
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-brand-500"></span>
                @endif
            </a>
        @endforeach

        <div class="pt-4">
            <p class="px-4 py-1 text-[10px] font-semibold uppercase tracking-widest text-slate-400 mb-1">System</p>
            <a href="#" class="nav-link text-slate-400 cursor-not-allowed pointer-events-none">
                <i class="bi bi-gear text-base flex-shrink-0"></i>
                Settings
                <span class="ml-auto text-[10px] bg-surface-200 text-slate-500 rounded px-1.5 py-0.5">Soon</span>
            </a>
            <a href="#" class="nav-link text-slate-400 cursor-not-allowed pointer-events-none">
                <i class="bi bi-bar-chart-line text-base flex-shrink-0"></i>
                Reports
                <span class="ml-auto text-[10px] bg-surface-200 text-slate-500 rounded px-1.5 py-0.5">Soon</span>
            </a>
        </div>

    </nav>

    {{-- User avatar block --}}
    <div class="flex items-center gap-3 px-4 py-4 border-t border-surface-200 flex-shrink-0">
        <div class="w-8 h-8 rounded-full bg-brand-100 text-brand-700 flex items-center justify-center text-xs font-semibold flex-shrink-0">
            AM
        </div>
        <div class="min-w-0">
            <p class="text-sm font-medium text-slate-800 truncate">Ahmed Mostafa</p>
            <p class="text-xs text-slate-400 truncate">Super Admin</p>
        </div>
        <button class="ml-auto text-slate-400 hover:text-slate-600 flex-shrink-0">
            <i class="bi bi-box-arrow-right text-base"></i>
        </button>
    </div>

</aside>
