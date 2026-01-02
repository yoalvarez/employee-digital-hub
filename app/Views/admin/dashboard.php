<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="space-y-6">
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Users -->
        <div class="stat-card">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-base-content/60 text-sm">Total Pengguna</p>
                        <p class="text-3xl font-bold mt-1"><?= $stats['users'] ?? 0 ?></p>
                    </div>
                    <div class="bg-primary/10 p-4 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
                <a href="<?= base_url('admin/users') ?>" class="text-primary text-sm mt-4 inline-flex items-center hover:underline">
                    Kelola Pengguna
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Assets -->
        <div class="stat-card">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-base-content/60 text-sm">Total Aset IT</p>
                        <p class="text-3xl font-bold mt-1"><?= $stats['assets'] ?? 0 ?></p>
                    </div>
                    <div class="bg-success/10 p-4 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-success" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
                <a href="<?= base_url('admin/assets') ?>" class="text-primary text-sm mt-4 inline-flex items-center hover:underline">
                    Kelola Aset
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Open Tickets -->
        <div class="stat-card">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-base-content/60 text-sm">Tiket Terbuka</p>
                        <p class="text-3xl font-bold mt-1"><?= $stats['openTickets'] ?? 0 ?></p>
                    </div>
                    <div class="bg-warning/10 p-4 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-warning" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                        </svg>
                    </div>
                </div>
                <a href="<?= base_url('admin/tickets') ?>" class="text-primary text-sm mt-4 inline-flex items-center hover:underline">
                    Kelola Tiket
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Pending Bookings -->
        <div class="stat-card">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-base-content/60 text-sm">Peminjaman Pending</p>
                        <p class="text-3xl font-bold mt-1"><?= $stats['pendingBookings'] ?? 0 ?></p>
                    </div>
                    <div class="bg-info/10 p-4 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-info" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
                <a href="<?= base_url('admin/vehicle-bookings') ?>" class="text-primary text-sm mt-4 inline-flex items-center hover:underline">
                    Kelola Peminjaman
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Vehicles -->
        <div class="stat-card">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-base-content/60 text-sm">Total Kendaraan</p>
                        <p class="text-3xl font-bold mt-1"><?= $stats['vehicles'] ?? 0 ?></p>
                    </div>
                    <div class="bg-secondary/10 p-4 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                    </div>
                </div>
                <a href="<?= base_url('admin/vehicles') ?>" class="text-primary text-sm mt-4 inline-flex items-center hover:underline">
                    Kelola Kendaraan
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Articles -->
        <div class="stat-card">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-base-content/60 text-sm">Artikel Terbit</p>
                        <p class="text-3xl font-bold mt-1"><?= $stats['articles'] ?? 0 ?></p>
                    </div>
                    <div class="bg-accent/10 p-4 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                </div>
                <a href="<?= base_url('admin/articles') ?>" class="text-primary text-sm mt-4 inline-flex items-center hover:underline">
                    Kelola Artikel
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Activity Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Tickets -->
        <div class="card bg-base-100 shadow-md">
            <div class="card-body">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="card-title text-lg">Tiket Terbaru</h3>
                    <a href="<?= base_url('admin/tickets') ?>" class="btn btn-ghost btn-sm">Lihat Semua</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>No. Tiket</th>
                                <th>Pelapor</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($recentTickets)): ?>
                                <?php foreach ($recentTickets as $ticket): ?>
                                <tr>
                                    <td class="font-mono text-sm"><?= esc($ticket['nomor_tiket']) ?></td>
                                    <td><?= esc($ticket['user_nama'] ?? '-') ?></td>
                                    <td>
                                        <?php
                                        $statusClass = match($ticket['status']) {
                                            'Open' => 'badge-error',
                                            'In Progress' => 'badge-warning',
                                            'Pending' => 'badge-info',
                                            'Resolved' => 'badge-success',
                                            'Closed' => 'badge-ghost',
                                            default => 'badge-ghost',
                                        };
                                        ?>
                                        <span class="badge <?= $statusClass ?> badge-sm"><?= $ticket['status'] ?></span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="text-center text-base-content/60">Belum ada tiket</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Recent Bookings -->
        <div class="card bg-base-100 shadow-md">
            <div class="card-body">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="card-title text-lg">Peminjaman Terbaru</h3>
                    <a href="<?= base_url('admin/vehicle-bookings') ?>" class="btn btn-ghost btn-sm">Lihat Semua</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Kendaraan</th>
                                <th>Peminjam</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($recentBookings)): ?>
                                <?php foreach ($recentBookings as $booking): ?>
                                <tr>
                                    <td>
                                        <div class="font-medium"><?= esc($booking['vehicle_nama'] ?? '-') ?></div>
                                        <div class="text-xs text-base-content/60"><?= esc($booking['nomor_polisi'] ?? '') ?></div>
                                    </td>
                                    <td><?= esc($booking['user_nama'] ?? '-') ?></td>
                                    <td>
                                        <?php
                                        $statusClass = match($booking['status']) {
                                            'Pending' => 'badge-warning',
                                            'Approved' => 'badge-success',
                                            'Rejected' => 'badge-error',
                                            'Ongoing' => 'badge-info',
                                            'Completed' => 'badge-ghost',
                                            'Cancelled' => 'badge-error',
                                            default => 'badge-ghost',
                                        };
                                        ?>
                                        <span class="badge <?= $statusClass ?> badge-sm"><?= $booking['status'] ?></span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="text-center text-base-content/60">Belum ada peminjaman</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
