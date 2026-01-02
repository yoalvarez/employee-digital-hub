<header class="navbar bg-base-100 border-b border-base-300 sticky top-0 z-30">
    <div class="flex-none lg:hidden">
        <button id="sidebar-toggle" class="btn btn-square btn-ghost">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <div class="flex-1">
        <h1 class="text-xl font-semibold px-4"><?= $pageTitle ?? 'Dashboard' ?></h1>
    </div>

    <div class="flex-none gap-2">
        <details class="dropdown dropdown-end">
            <summary class="btn btn-ghost btn-circle">
                <div class="indicator">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="badge badge-xs badge-primary indicator-item"></span>
                </div>
            </summary>
            <div class="dropdown-content z-[1] card card-compact shadow bg-base-100 w-80 mt-3">
                <div class="card-body">
                    <h3 class="font-bold text-lg">Notifikasi</h3>
                    <div class="divider my-0"></div>
                    <p class="text-sm text-base-content/70">Tidak ada notifikasi baru</p>
                </div>
            </div>
        </details>

        <details class="dropdown dropdown-end">
            <summary class="btn btn-ghost btn-circle avatar placeholder">
                <div class="bg-primary text-primary-content rounded-full w-10">
                    <span class="text-sm"><?= strtoupper(substr(session()->get('name') ?? 'U', 0, 2)) ?></span>
                </div>
            </summary>
            <ul class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52 mt-3">
                <li class="menu-title px-4 py-2">
                    <span><?= session()->get('name') ?? 'User' ?></span>
                </li>
                <li>
                    <a href="<?= base_url('profile') ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Profil
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('settings') ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Pengaturan
                    </a>
                </li>

                <li class="my-1 border-b border-base-200"></li>

            <li>
                <a href="<?= base_url('logout') ?>" class="text-error font-medium hover:bg-error/10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Logout
                </a>
            </li>
            </ul>
        </details>
    </div>
</header>

<script>
    document.addEventListener("click", (e) => {
        const dropdowns = document.querySelectorAll("details.dropdown");
        dropdowns.forEach((dropdown) => {
            if (!dropdown.contains(e.target)) {
                dropdown.removeAttribute("open");
            }
        });
    });
</script>