<aside class="hidden lg:flex fixed inset-y-0 left-0 w-64 flex-col bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950 text-white shadow-2xl ring-1 ring-slate-950/10">
    <div class="flex h-full flex-col px-6 py-6">
        <div class="mb-10 rounded-3xl bg-white/5 p-4 shadow-inner shadow-slate-950/10 backdrop-blur">
            <div class="flex items-center gap-3">
                <div class="grid h-12 w-12 place-items-center rounded-3xl bg-slate-200/10 text-slate-100 ring-1 ring-white/10">
                    <i class="bi bi-book-half text-xl"></i>
                </div>
                <div>
                    <h2 class="text-base font-semibold text-white">SIPUS-PGRI</h2>
                    <p class="text-sm text-slate-400">Sistem Informasi Perpustakaan</p>
                </div>
            </div>
        </div>

        <nav class="flex-1 space-y-2">
            <a href="{{ route('dashboard') }}" class="group flex items-center gap-3 rounded-3xl px-4 py-3 text-sm font-medium transition hover:bg-white/10 hover:text-white {{ request()->routeIs('dashboard') ? 'bg-white/10 text-white' : 'text-slate-300' }}">
                <i class="bi bi-grid-fill text-lg"></i>
                Dashboard
            </a>
            <a href="{{ route('books.index') }}" class="group flex items-center gap-3 rounded-3xl px-4 py-3 text-sm font-medium transition hover:bg-white/10 hover:text-white {{ request()->routeIs('books.*') ? 'bg-white/10 text-white' : 'text-slate-300' }}">
                <i class="bi bi-journal-bookmark text-lg"></i>
                Data Buku
            </a>
            <a href="{{ route('students.index') }}" class="group flex items-center gap-3 rounded-3xl px-4 py-3 text-sm font-medium transition hover:bg-white/10 hover:text-white {{ request()->routeIs('students.*') ? 'bg-white/10 text-white' : 'text-slate-300' }}">
                <i class="bi bi-people text-lg"></i>
                Data Anggota
            </a>
            <a href="{{ route('borrowings.index') }}" class="group flex items-center gap-3 rounded-3xl px-4 py-3 text-sm font-medium transition hover:bg-white/10 hover:text-white {{ request()->routeIs('borrowings.*') && !request()->filled('status') ? 'bg-white/10 text-white' : 'text-slate-300' }}">
                <i class="bi bi-arrow-right-square text-lg"></i>
                Peminjaman
            </a>
            <a href="{{ route('borrowings.index', ['status' => 'dikembalikan']) }}" class="group flex items-center gap-3 rounded-3xl px-4 py-3 text-sm font-medium transition hover:bg-white/10 hover:text-white {{ request()->routeIs('borrowings.*') && request('status') === 'dikembalikan' ? 'bg-white/10 text-white' : 'text-slate-300' }}">
                <i class="bi bi-arrow-left-square text-lg"></i>
                Pengembalian
            </a>
            <a href="{{ route('reports') }}" class="group flex items-center gap-3 rounded-3xl px-4 py-3 text-sm font-medium transition hover:bg-white/10 hover:text-white {{ request()->routeIs('reports') ? 'bg-white/10 text-white' : 'text-slate-300' }}">
                <i class="bi bi-bar-chart-fill text-lg"></i>
                Laporan
            </a>
        </nav>

        <div class="mt-auto pt-4 border-t border-white/10">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex w-full items-center gap-3 rounded-3xl border border-white/10 bg-white/5 px-4 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                    <i class="bi bi-box-arrow-right text-lg"></i>
                    Logout
                </button>
            </form>
        </div>
    </div>
</aside>

<div x-show="mobileOpen" x-cloak class="fixed inset-0 z-40 bg-slate-950/60 lg:hidden"></div>
<aside x-show="mobileOpen" x-cloak @click.outside="mobileOpen = false" class="fixed inset-y-0 left-0 z-50 w-72 overflow-y-auto bg-slate-950 p-6 shadow-2xl lg:hidden">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-lg font-semibold text-white">SIPUS-PGRI</h2>
            <p class="text-sm text-slate-400">Menu utama</p>
        </div>
        <button type="button" @click="mobileOpen = false" class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-slate-900 text-slate-200 ring-1 ring-white/10">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <nav class="space-y-2">
        <a href="{{ route('dashboard') }}" class="block rounded-3xl px-4 py-3 text-sm font-medium transition hover:bg-white/10 {{ request()->routeIs('dashboard') ? 'bg-white/10 text-white' : 'text-slate-300' }}">
            <i class="bi bi-grid-fill mr-3"></i> Dashboard
        </a>
        <a href="{{ route('books.index') }}" class="block rounded-3xl px-4 py-3 text-sm font-medium transition hover:bg-white/10 {{ request()->routeIs('books.*') ? 'bg-white/10 text-white' : 'text-slate-300' }}">
            <i class="bi bi-journal-bookmark mr-3"></i> Data Buku
        </a>
        <a href="{{ route('students.index') }}" class="block rounded-3xl px-4 py-3 text-sm font-medium transition hover:bg-white/10 {{ request()->routeIs('students.*') ? 'bg-white/10 text-white' : 'text-slate-300' }}">
            <i class="bi bi-people mr-3"></i> Data Anggota
        </a>
        <a href="{{ route('borrowings.index') }}" class="block rounded-3xl px-4 py-3 text-sm font-medium transition hover:bg-white/10 {{ request()->routeIs('borrowings.*') && !request()->filled('status') ? 'bg-white/10 text-white' : 'text-slate-300' }}">
            <i class="bi bi-arrow-right-square mr-3"></i> Peminjaman
        </a>
        <a href="{{ route('borrowings.index', ['status' => 'dikembalikan']) }}" class="block rounded-3xl px-4 py-3 text-sm font-medium transition hover:bg-white/10 {{ request()->routeIs('borrowings.*') && request('status') === 'dikembalikan' ? 'bg-white/10 text-white' : 'text-slate-300' }}">
            <i class="bi bi-arrow-left-square mr-3"></i> Pengembalian
        </a>
        <a href="{{ route('reports') }}" class="block rounded-3xl px-4 py-3 text-sm font-medium transition hover:bg-white/10 {{ request()->routeIs('reports') ? 'bg-white/10 text-white' : 'text-slate-300' }}">
            <i class="bi bi-bar-chart-fill mr-3"></i> Laporan
        </a>
    </nav>

    <div class="mt-8">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-3xl bg-white/5 px-4 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </div>
</aside>
