<header class="fixed top-0 right-0 left-0 z-30 bg-white/95 backdrop-blur border-b border-slate-200 shadow-sm lg:left-64">
    <div class="mx-auto flex h-20 max-w-7xl items-center justify-between gap-3 px-4 sm:px-6 lg:px-8">
        <button type="button" @click="mobileOpen = true" class="inline-flex h-12 w-12 items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 text-slate-700 shadow-sm transition hover:bg-slate-100 lg:hidden">
            <i class="bi bi-list text-lg"></i>
        </button>

        <div class="flex flex-1 items-center justify-center lg:justify-start">
            <form method="GET" action="{{ route('books.index') }}" class="w-full max-w-md">
                <div class="relative">
                    <span class="pointer-events-none absolute inset-y-0 left-4 flex items-center text-slate-400">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="search" name="search" value="{{ request('search') }}" placeholder="Cari buku atau anggota..." class="w-full rounded-full border border-slate-200 bg-slate-50 py-3 pl-12 pr-4 text-sm text-slate-900 shadow-sm outline-none transition duration-200 focus:border-sky-300 focus:ring-2 focus:ring-sky-100" />
                </div>
            </form>
        </div>

        <div class="flex items-center gap-3">
            <button type="button" class="relative inline-flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-slate-100 text-slate-700 transition duration-200 hover:bg-slate-200 hover:scale-[1.03]">
                <i class="bi bi-bell text-lg"></i>
                <span class="absolute right-3 top-3 h-2.5 w-2.5 rounded-full bg-rose-500 ring-2 ring-white"></span>
            </button>

            <a href="{{ route('profile.edit') }}" class="inline-flex min-w-[180px] items-center gap-3 rounded-2xl border border-slate-200 bg-slate-50 px-3 py-2 shadow-sm transition duration-200 hover:bg-slate-100">
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-slate-900 text-white">
                    <i class="bi bi-person-fill text-base"></i>
                </div>
                <div class="min-w-0">
                    <p class="truncate text-sm font-semibold text-slate-900">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-slate-500">Administrator</p>
                </div>
            </a>
        </div>
    </div>
</header>
