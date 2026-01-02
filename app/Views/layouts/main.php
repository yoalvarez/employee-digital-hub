<!DOCTYPE html>
<html lang="id" data-theme="corporate">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Employee Digital Hub - Internal Office System">
    <meta name="csrf-token" content="<?= csrf_hash() ?>">
    <title><?= $title ?? 'Employee Digital Hub' ?></title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('favicon.ico') ?>">

    <!-- Styles -->
    <link rel="stylesheet" href="<?= base_url('build/css/main.css') ?>">

    <!-- Additional styles -->
    <?= $this->renderSection('styles') ?>
</head>
<body class="min-h-screen bg-base-200">
    <div class="flex">
        <!-- Sidebar -->
        <?= $this->include('components/sidebar') ?>

        <!-- Main Content -->
        <div id="main-content" class="flex-1 min-h-screen transition-all duration-300 lg:ml-64">
            <!-- Mobile Header -->
            <header class="sticky top-0 z-20 bg-base-100 border-b border-base-300 lg:hidden">
                <div class="flex items-center justify-between p-4">
                    <button onclick="openMobileSidebar()" class="btn btn-ghost btn-square">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <h1 class="text-lg font-semibold"><?= $pageTitle ?? 'EDH' ?></h1>
                    <div class="w-10"></div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-4 lg:p-6">
                <!-- Page Header (Desktop) -->
                <?php if (isset($pageTitle)): ?>
                <div class="hidden lg:flex items-center justify-between mb-6">
                    <div>
                        <h1 class="text-2xl font-bold"><?= $pageTitle ?></h1>
                        <?php if (isset($breadcrumb) && count($breadcrumb) > 1): ?>
                        <div class="text-sm breadcrumbs mt-1">
                            <ul>
                                <?php foreach ($breadcrumb as $item): ?>
                                <li>
                                    <?php if (isset($item['url'])): ?>
                                    <a href="<?= $item['url'] ?>" class="text-base-content/70 hover:text-primary"><?= $item['title'] ?></a>
                                    <?php else: ?>
                                    <span class="text-base-content/50"><?= $item['title'] ?></span>
                                    <?php endif; ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?= $this->renderSection('page_actions') ?>
                </div>
                <?php endif; ?>

                <!-- Flash Messages -->
                <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span><?= session()->getFlashdata('success') ?></span>
                </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-error mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span><?= session()->getFlashdata('error') ?></span>
                </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('warning')): ?>
                <div class="alert alert-warning mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span><?= session()->getFlashdata('warning') ?></span>
                </div>
                <?php endif; ?>

                <!-- Main Content Section -->
                <?= $this->renderSection('content') ?>
            </main>

            <!-- Footer -->
            <footer class="footer footer-center p-4 bg-base-300 text-base-content mt-auto">
                <div>
                    <p>&copy; <?= date('Y') ?> KPP Pratama - Employee Digital Hub</p>
                </div>
            </footer>
        </div>
    </div>

    <!-- Toast Container -->
    <div id="toast-container" class="toast toast-top toast-end z-50"></div>

    <!-- Scripts -->
    <script src="<?= base_url('build/js/app.js') ?>"></script>

    <!-- Additional scripts -->
    <?= $this->renderSection('scripts') ?>
</body>
</html>
