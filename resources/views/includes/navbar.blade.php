{{-- Top navigation bar --}}
<header class="flex-shrink-0 h-16 bg-white border-b border-surface-200 flex items-center justify-between px-4 sm:px-6 lg:px-8 gap-4">

    {{-- Left: hamburger + page title --}}
    <div class="flex items-center gap-3">
        <button id="sidebar-open"
                class="lg:hidden text-slate-500 hover:text-slate-700 p-1.5 rounded-lg hover:bg-surface-100 transition-colors">
            <i class="bi bi-list text-xl"></i>
        </button>
        <h1 class="text-sm font-semibold text-slate-800 hidden sm:block">
            @yield('page-title', 'Dashboard')
        </h1>
    </div>

    {{-- Right: search + notifications + avatar --}}
    <div class="flex items-center gap-2 sm:gap-3">

        {{-- Global search (decorative, not functional — JS search is on the Properties page) --}}
        <div class="hidden md:flex items-center gap-2 bg-surface-100 rounded-lg px-3 py-2 w-56 border border-surface-200">
            <i class="bi bi-search text-slate-400 text-sm"></i>
            <span class="text-sm text-slate-400">Quick search…</span>
        </div>

        {{-- Notification bell --}}
        <button class="relative p-2 rounded-lg text-slate-500 hover:text-slate-700 hover:bg-surface-100 transition-colors">
            <i class="bi bi-bell text-lg"></i>
            <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-rose-500 ring-2 ring-white"></span>
        </button>

        {{-- Avatar --}}
        <div class="flex items-center gap-2 cursor-pointer group">
            <div class="w-8 h-8 rounded-full bg-brand-100 text-brand-700 flex items-center justify-center text-xs font-semibold">
                AM
            </div>
            <span class="hidden sm:block text-sm font-medium text-slate-700 group-hover:text-brand-600 transition-colors">
                Ahmed
            </span>
            <i class="bi bi-chevron-down text-xs text-slate-400 hidden sm:block"></i>
        </div>

    </div>

</header>
