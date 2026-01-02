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
        <div id="main-content" class="flex-1 ml-64 min-h-screen transition-all duration-300">
            <!-- Navbar -->
            <?= $this->include('components/navbar') ?>

            <!-- Page Content -->
            <main class="p-6">
                <!-- Breadcrumb -->
                <?php if (isset($breadcrumb)): ?>
                <div class="text-sm breadcrumbs mb-4">
                    <ul>
                        <?php foreach ($breadcrumb as $item): ?>
                        <li>
                            <?php if (isset($item['url'])): ?>
                            <a href="<?= $item['url'] ?>"><?= $item['title'] ?></a>
                            <?php else: ?>
                            <?= $item['title'] ?>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
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
