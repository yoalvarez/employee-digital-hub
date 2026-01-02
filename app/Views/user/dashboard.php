<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="space-y-6">
    <!-- Welcome Card -->
    <div class="card bg-gradient-to-r from-primary to-primary-focus text-primary-content">
        <div class="card-body">
            <h2 class="card-title text-2xl">Selamat Datang, <?= session()->get('name') ?>!</h2>
            <p class="opacity-90">
                <?= session()->get('jabatan') ?> - <?= session()->get('seksi') ?>
            </p>
            <p class="text-sm opacity-75 mt-2">
                <?= date('l, d F Y') ?>
            </p>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Assets Card -->
        <div class="stat-card">
            <div class="card-body">
                <div class="flex items-center gap-4">
                    <div class="bg-primary/10 p-4 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-base-content/60 text-sm">Aset Saya</p>
                        <p class="text-3xl font-bold"><?= $stats['assets'] ?? 0 ?></p>
                    </div>
                </div>
                <div class="card-actions justify-end mt-4">
                    <a href="<?= base_url('my-assets') ?>" class="btn btn-ghost btn-sm">Lihat Semua</a>
                </div>
            </div>
        </div>

        <!-- Open Tickets Card -->
        <div class="stat-card">
            <div class="card-body">
                <div class="flex items-center gap-4">
                    <div class="bg-warning/10 p-4 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-warning" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-base-content/60 text-sm">Tiket Aktif</p>
                        <p class="text-3xl font-bold"><?= $stats['openTickets'] ?? 0 ?></p>
                    </div>
                </div>
                <div class="card-actions justify-end mt-4">
                    <a href="<?= base_url('tickets') ?>" class="btn btn-ghost btn-sm">Lihat Semua</a>
                </div>
            </div>
        </div>

        <!-- Pending Bookings Card -->
        <div class="stat-card">
            <div class="card-body">
                <div class="flex items-center gap-4">
                    <div class="bg-info/10 p-4 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-info" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-base-content/60 text-sm">Peminjaman Aktif</p>
                        <p class="text-3xl font-bold"><?= $stats['pendingBookings'] ?? 0 ?></p>
                    </div>
                </div>
                <div class="card-actions justify-end mt-4">
                    <a href="<?= base_url('vehicle-booking') ?>" class="btn btn-ghost btn-sm">Lihat Semua</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="card bg-base-100 shadow-md">
        <div class="card-body">
            <h3 class="card-title">Aksi Cepat</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                <a href="<?= base_url('tickets/create') ?>" class="btn btn-outline btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Buat Tiket
                </a>
                <a href="<?= base_url('vehicle-booking/create') ?>" class="btn btn-outline btn-info">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Pinjam Kendaraan
                </a>
                <a href="<?= base_url('my-assets') ?>" class="btn btn-outline btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Lihat Aset
                </a>
                <a href="<?= base_url('knowledge-base') ?>" class="btn btn-outline btn-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    Knowledge Base
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
