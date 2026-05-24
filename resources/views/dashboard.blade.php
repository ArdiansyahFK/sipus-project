<x-app-layout>
    <div class="space-y-6">
        <section class="rounded-[32px] bg-white p-6 shadow-soft">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.24em] text-slate-500">Dashboard</p>
                    <h1 class="mt-4 text-3xl font-semibold text-slate-900">Selamat Datang di SIPUS-PGRI</h1>
                    <p class="mt-3 max-w-2xl text-slate-600">Sistem Informasi Perpustakaan Sekolah dengan tampilan profesional dan mudah dikelola oleh admin.</p>
                </div>
                <div class="rounded-3xl bg-slate-50 p-5 text-center shadow-sm">
                    <p class="text-sm text-slate-500">Ringkasan Total</p>
                    <p class="mt-3 text-3xl font-semibold text-slate-900">{{ number_format($summary['borrowings']) }} Transaksi</p>
                </div>
            </div>
        </section>

        <section class="grid gap-4 xl:grid-cols-4 lg:grid-cols-2">
            <article class="rounded-[28px] bg-white p-6 shadow-soft transition hover:-translate-y-1 hover:shadow-xl">
                <div class="flex h-14 w-14 items-center justify-center rounded-3xl bg-sky-100 text-sky-700">
                    <i class="bi bi-journal-bookmark text-2xl"></i>
                </div>
                <p class="mt-6 text-3xl font-semibold text-slate-900">{{ $summary['books'] }}</p>
                <p class="mt-2 text-sm text-slate-500">Total Buku</p>
            </article>
            <article class="rounded-[28px] bg-white p-6 shadow-soft transition hover:-translate-y-1 hover:shadow-xl">
                <div class="flex h-14 w-14 items-center justify-center rounded-3xl bg-emerald-100 text-emerald-700">
                    <i class="bi bi-people text-2xl"></i>
                </div>
                <p class="mt-6 text-3xl font-semibold text-slate-900">{{ $summary['students'] }}</p>
                <p class="mt-2 text-sm text-slate-500">Anggota Terdaftar</p>
            </article>
            <article class="rounded-[28px] bg-white p-6 shadow-soft transition hover:-translate-y-1 hover:shadow-xl">
                <div class="flex h-14 w-14 items-center justify-center rounded-3xl bg-amber-100 text-amber-700">
                    <i class="bi bi-arrow-right-square text-2xl"></i>
                </div>
                <p class="mt-6 text-3xl font-semibold text-slate-900">{{ $summary['borrowings'] }}</p>
                <p class="mt-2 text-sm text-slate-500">Peminjaman</p>
            </article>
            <article class="rounded-[28px] bg-white p-6 shadow-soft transition hover:-translate-y-1 hover:shadow-xl">
                <div class="flex h-14 w-14 items-center justify-center rounded-3xl bg-slate-100 text-slate-700">
                    <i class="bi bi-book-half text-2xl"></i>
                </div>
                <p class="mt-6 text-3xl font-semibold text-slate-900">{{ $summary['borrowed'] }}</p>
                <p class="mt-2 text-sm text-slate-500">Buku Dipinjam</p>
            </article>
        </section>
    </div>
</x-app-layout>
