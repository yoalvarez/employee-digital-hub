<?php
$currentUrl = current_url();
$userRole = session()->get('role') ?? 'pegawai';
$userName = session()->get('name') ?? 'User';
$userInitials = strtoupper(substr($userName, 0, 2));

$adminMenus = [
    [
        'title' => 'Dashboard',
        'url' => '/admin/dashboard',
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>',
    ],
    [
        'title' => 'Manajemen User',
        'url' => '/admin/users',
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>',
    ],
    [
        'title' => 'Inventaris Aset',
        'url' => '/admin/assets',
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>',
    ],
    [
        'title' => 'Tiket Layanan',
        'url' => '/admin/tickets',
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" /></svg>',
    ],
    [
        'title' => 'Kendaraan Dinas',
        'url' => '/admin/vehicles',
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" /></svg>',
    ],
    [
        'title' => 'Peminjaman',
        'url' => '/admin/vehicle-bookings',
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>',
    ],
    [
        'title' => 'Knowledge Base',
        'url' => '/admin/articles',
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>',
    ],
];

$userMenus = [
    [
        'title' => 'Dashboard',
        'url' => '/dashboard',
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>',
    ],
    [
        'title' => 'Aset Saya',
        'url' => '/my-assets',
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>',
    ],
    [
        'title' => 'Tiket Bantuan',
        'url' => '/tickets',
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" /></svg>',
    ],
    [
        'title' => 'Peminjaman Kendaraan',
        'url' => '/vehicle-booking',
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>',
    ],
    [
        'title' => 'Knowledge Base',
        'url' => '/knowledge-base',
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>',
    ],
];

$menus = ($userRole === 'admin') ? $adminMenus : $userMenus;
?>

<!-- Mobile Overlay -->
<div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-30 lg:hidden hidden" onclick="closeMobileSidebar()"></div>

<!-- Sidebar -->
<aside id="sidebar" class="fixed top-0 left-0 h-screen w-64 bg-white shadow-lg z-40 flex flex-col transition-all duration-300 -translate-x-full lg:translate-x-0">
    <!-- Header with Logo and Toggle -->
    <div class="p-4 flex items-center justify-between border-b border-base-200">
        <a href="<?= base_url('/') ?>" class="sidebar-logo text-2xl font-bold text-primary transition-all duration-300 overflow-hidden">
            EDH
        </a>
        <button id="sidebar-collapse-btn" class="btn btn-ghost btn-sm btn-square hidden lg:flex" title="Toggle Sidebar">
            <svg id="collapse-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
            </svg>
        </button>
        <!-- Mobile Close Button -->
        <button id="sidebar-close-btn" class="btn btn-ghost btn-sm btn-square lg:hidden" onclick="closeMobileSidebar()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Navigation Menu -->
    <div class="flex-1 overflow-y-auto p-4">
        <nav>
            <ul class="space-y-2">
                <?php foreach ($menus as $menu):
                    $isActive = strpos($currentUrl, base_url($menu['url'])) === 0;
                ?>
                <li>
                    <a href="<?= base_url($menu['url']) ?>"
                       class="sidebar-menu-item flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all duration-200 <?= $isActive ? 'bg-primary text-primary-content' : 'hover:bg-base-200' ?>"
                       title="<?= $menu['title'] ?>">
                        <span class="flex-shrink-0"><?= $menu['icon'] ?></span>
                        <span class="menu-text whitespace-nowrap overflow-hidden transition-all duration-300"><?= $menu['title'] ?></span>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>

    <!-- User Profile Section -->
    <div class="border-t border-base-200">
        <!-- Profile Dropdown -->
        <div class="relative">
            <button id="profile-toggle" class="w-full p-4 flex items-center gap-3 hover:bg-base-200 transition-colors duration-200">
                <div class="avatar placeholder flex-shrink-0">
                    <div class="bg-primary text-primary-content rounded-full w-10 h-10">
                        <span class="text-sm"><?= $userInitials ?></span>
                    </div>
                </div>
                <div class="menu-text flex-1 text-left overflow-hidden transition-all duration-300">
                    <p class="font-medium text-sm truncate"><?= $userName ?></p>
                    <p class="text-xs text-base-content/60 capitalize"><?= $userRole ?></p>
                </div>
                <svg id="profile-chevron" xmlns="http://www.w3.org/2000/svg" class="menu-text h-4 w-4 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                </svg>
            </button>

            <!-- Profile Menu -->
            <div id="profile-menu" class="hidden absolute bottom-full left-0 w-full bg-white border-t border-base-200 shadow-lg">
                <ul class="p-2 space-y-1">
                    <li>
                        <a href="<?= base_url('profile') ?>" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-base-200 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span class="menu-text text-sm">Profil</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('settings') ?>" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-base-200 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="menu-text text-sm">Pengaturan</span>
                        </a>
                    </li>
                    <li class="border-t border-base-200 pt-1 mt-1">
                        <a href="<?= base_url('logout') ?>" class="flex items-center gap-3 px-3 py-2 rounded-lg text-error hover:bg-error/10 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span class="menu-text text-sm">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>

<script>
(function() {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');
    const collapseBtn = document.getElementById('sidebar-collapse-btn');
    const collapseIcon = document.getElementById('collapse-icon');
    const profileToggle = document.getElementById('profile-toggle');
    const profileMenu = document.getElementById('profile-menu');
    const profileChevron = document.getElementById('profile-chevron');
    const overlay = document.getElementById('sidebar-overlay');
    const STORAGE_KEY = 'sidebar-collapsed';

    // Collapse/Expand functions
    function collapseSidebar() {
        sidebar.classList.remove('w-64');
        sidebar.classList.add('w-20');
        mainContent?.classList.remove('lg:ml-64');
        mainContent?.classList.add('lg:ml-20');
        collapseIcon.style.transform = 'rotate(180deg)';

        sidebar.querySelectorAll('.menu-text').forEach(el => {
            el.classList.add('lg:opacity-0', 'lg:w-0');
        });
        sidebar.querySelector('.sidebar-logo')?.classList.add('lg:opacity-0', 'lg:w-0');

        // Close profile menu when collapsed
        profileMenu?.classList.add('hidden');
        profileChevron?.classList.remove('rotate-180');

        localStorage.setItem(STORAGE_KEY, 'true');
    }

    function expandSidebar() {
        sidebar.classList.remove('w-20');
        sidebar.classList.add('w-64');
        mainContent?.classList.remove('lg:ml-20');
        mainContent?.classList.add('lg:ml-64');
        collapseIcon.style.transform = 'rotate(0deg)';

        sidebar.querySelectorAll('.menu-text').forEach(el => {
            el.classList.remove('lg:opacity-0', 'lg:w-0');
        });
        sidebar.querySelector('.sidebar-logo')?.classList.remove('lg:opacity-0', 'lg:w-0');

        localStorage.setItem(STORAGE_KEY, 'false');
    }

    function toggleSidebar() {
        const isCollapsed = sidebar.classList.contains('w-20');
        if (isCollapsed) {
            expandSidebar();
        } else {
            collapseSidebar();
        }
    }

    // Profile menu toggle
    function toggleProfileMenu() {
        const isCollapsed = sidebar.classList.contains('w-20');
        if (isCollapsed && window.innerWidth >= 1024) {
            // Don't open menu when sidebar is collapsed on desktop
            return;
        }
        profileMenu?.classList.toggle('hidden');
        profileChevron?.classList.toggle('rotate-180');
    }

    // Mobile sidebar functions
    window.openMobileSidebar = function() {
        sidebar.classList.remove('-translate-x-full');
        overlay?.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    window.closeMobileSidebar = function() {
        sidebar.classList.add('-translate-x-full');
        overlay?.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
        profileMenu?.classList.add('hidden');
        profileChevron?.classList.remove('rotate-180');
    }

    // Initialize state from localStorage
    function initSidebar() {
        const isCollapsed = localStorage.getItem(STORAGE_KEY) === 'true';
        if (isCollapsed && window.innerWidth >= 1024) {
            sidebar.style.transition = 'none';
            mainContent && (mainContent.style.transition = 'none');
            collapseSidebar();
            setTimeout(() => {
                sidebar.style.transition = '';
                mainContent && (mainContent.style.transition = '');
            }, 50);
        }
    }

    // Event listeners
    collapseBtn?.addEventListener('click', toggleSidebar);
    profileToggle?.addEventListener('click', toggleProfileMenu);

    // Close profile menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!profileToggle?.contains(e.target) && !profileMenu?.contains(e.target)) {
            profileMenu?.classList.add('hidden');
            profileChevron?.classList.remove('rotate-180');
        }
    });

    // Handle window resize
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 1024) {
            sidebar.classList.remove('-translate-x-full');
            overlay?.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        } else {
            if (!overlay?.classList.contains('hidden')) {
                // Keep sidebar open on mobile if overlay is shown
            } else {
                sidebar.classList.add('-translate-x-full');
            }
        }
    });

    // Initialize
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initSidebar);
    } else {
        initSidebar();
    }
})();
</script>
