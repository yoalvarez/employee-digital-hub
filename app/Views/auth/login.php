<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>
<h2 class="card-title justify-center text-2xl mb-6">Login</h2>

<form action="<?= base_url('login') ?>" method="POST">
    <?= csrf_field() ?>

    <!-- NIP -->
    <div class="form-control w-full mb-4">
        <label class="label" for="nip">
            <span class="label-text font-medium">NIP</span>
        </label>
        <input type="text"
               id="nip"
               name="nip"
               class="input input-bordered w-full <?= session('errors.nip') ? 'input-error' : '' ?>"
               placeholder="Masukkan NIP Anda"
               value="<?= old('nip') ?>"
               required
               autofocus>
        <?php if (session('errors.nip')): ?>
        <label class="label">
            <span class="label-text-alt text-error"><?= session('errors.nip') ?></span>
        </label>
        <?php endif; ?>
    </div>

    <!-- Password -->
    <div class="form-control w-full mb-6">
        <label class="label" for="password">
            <span class="label-text font-medium">Password</span>
        </label>
        <input type="password"
               id="password"
               name="password"
               class="input input-bordered w-full <?= session('errors.password') ? 'input-error' : '' ?>"
               placeholder="Masukkan password"
               required>
        <?php if (session('errors.password')): ?>
        <label class="label">
            <span class="label-text-alt text-error"><?= session('errors.password') ?></span>
        </label>
        <?php endif; ?>
    </div>

    <!-- Remember Me -->
    <div class="form-control mb-6">
        <label class="label cursor-pointer justify-start gap-3">
            <input type="checkbox" name="remember" class="checkbox checkbox-primary checkbox-sm" />
            <span class="label-text">Ingat saya</span>
        </label>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary w-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
        </svg>
        Login
    </button>
</form>
<?= $this->endSection() ?>
