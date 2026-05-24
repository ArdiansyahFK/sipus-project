<x-app-layout>
    <div class="container-fluid">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
            <div>
                <h2 class="h4 mb-1">Laporan SIPUS-PGRI</h2>
                <p class="text-muted mb-0">Ringkasan laporan perpustakaan dengan tampilan profesional.</p>
            </div>
        </div>

        <div class="row gx-3 gy-3 mb-4">
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card h-100 shadow-soft">
                    <div class="stat-card-icon bg-primary-soft text-primary"><i class="bi bi-book"></i></div>
                    <div class="stat-number">{{ $summary['books'] }}</div>
                    <div class="stat-label">Total Buku</div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card h-100 shadow-soft">
                    <div class="stat-card-icon bg-success-soft text-success"><i class="bi bi-people"></i></div>
                    <div class="stat-number">{{ $summary['students'] }}</div>
                    <div class="stat-label">Total Anggota</div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card h-100 shadow-soft">
                    <div class="stat-card-icon bg-warning-soft text-warning"><i class="bi bi-arrow-right-square"></i></div>
                    <div class="stat-number">{{ $summary['borrowings'] }}</div>
                    <div class="stat-label">Transaksi</div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card h-100 shadow-soft">
                    <div class="stat-card-icon bg-info-soft text-info"><i class="bi bi-book-half"></i></div>
                    <div class="stat-number">{{ $summary['borrowed'] }}</div>
                    <div class="stat-label">Buku Dipinjam</div>
                </div>
            </div>
        </div>

        <div class="card card-panel shadow-soft">
            <div class="card-header border-0 pb-0 mb-3">
                <h3 class="h5 mb-1">Laporan Ringkas</h3>
                <p class="text-muted mb-0">Lihat ringkasan data perpustakaan dalam satu halaman.</p>
            </div>
            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-12 col-md-4">
                        <div class="p-3 rounded-4 bg-surface-soft">
                            <h6 class="mb-2">Kategori</h6>
                            <p class="mb-0 text-muted">{{ $summary['categories'] }} kategori buku terdaftar.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="p-3 rounded-4 bg-surface-soft">
                            <h6 class="mb-2">Petugas</h6>
                            <p class="mb-0 text-muted">{{ $summary['petugas'] }} petugas aktif.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="p-3 rounded-4 bg-surface-soft">
                            <h6 class="mb-2">Status</h6>
                            <p class="mb-0 text-muted">Buku yang dipinjam saat ini: {{ $summary['borrowed'] }}.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
