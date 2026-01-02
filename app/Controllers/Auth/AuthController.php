<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    protected UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    /**
     * Display login form
     */
    public function login()
    {
        // Redirect if already logged in
        if (session()->get('isLoggedIn')) {
            return $this->redirectToDashboard();
        }

        return view('auth/login', [
            'title' => 'Login - Employee Digital Hub',
        ]);
    }

    /**
     * Process login attempt
     */
    public function attemptLogin()
    {
        $rules = [
            'nip' => 'required|min_length[18]|max_length[18]',
            'password' => 'required|min_length[6]',
        ];

        $messages = [
            'nip' => [
                'required' => 'NIP harus diisi',
                'min_length' => 'NIP harus 18 digit',
                'max_length' => 'NIP harus 18 digit',
            ],
            'password' => [
                'required' => 'Password harus diisi',
                'min_length' => 'Password minimal 6 karakter',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $nip = $this->request->getPost('nip');
        $password = $this->request->getPost('password');
        $remember = $this->request->getPost('remember');

        // Find user by NIP
        $user = $this->userModel->getByNip($nip);

        if (!$user) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'NIP tidak ditemukan');
        }

        // Check if user is active
        if (!$user['is_active']) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Akun Anda tidak aktif. Hubungi administrator.');
        }

        // Verify password
        if (!password_verify($password, $user['password'])) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Password salah');
        }

        // Get user details with role and seksi
        $userDetails = $this->userModel->getUserWithDetails($user['id']);

        // Set session data
        $sessionData = [
            'user_id' => $user['id'],
            'nip' => $user['nip'],
            'name' => $user['nama'],
            'email' => $user['email'],
            'role_id' => $user['role_id'],
            'role' => $userDetails['role_name'] ?? 'pegawai',
            'seksi_id' => $user['seksi_id'],
            'seksi' => $userDetails['seksi_nama'] ?? '',
            'jabatan' => $user['jabatan'],
            'foto' => $user['foto'],
            'isLoggedIn' => true,
        ];

        session()->set($sessionData);

        // Update last login
        $this->userModel->updateLastLogin($user['id']);

        // Handle remember me
        if ($remember) {
            // Set cookie for 30 days
            $response = service('response');
            $response->setCookie('remember_token', bin2hex(random_bytes(32)), 60 * 60 * 24 * 30);
        }

        return $this->redirectToDashboard()->with('success', 'Selamat datang, ' . $user['nama'] . '!');
    }

    /**
     * Logout user
     */
    public function logout()
    {
        // Clear session
        session()->destroy();

        // Clear remember cookie
        $response = service('response');
        $response->deleteCookie('remember_token');

        return redirect()->to('/login')->with('success', 'Anda telah berhasil logout');
    }

    /**
     * Redirect to appropriate dashboard based on role
     */
    protected function redirectToDashboard()
    {
        $role = session()->get('role');

        return match ($role) {
            'admin' => redirect()->to('/admin/dashboard'),
            'pimpinan' => redirect()->to('/admin/dashboard'),
            default => redirect()->to('/dashboard'),
        };
    }
}
