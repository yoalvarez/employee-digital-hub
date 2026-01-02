<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Redirect to appropriate page based on login status
        if (session()->get('isLoggedIn')) {
            $role = session()->get('role');

            return match ($role) {
                'admin', 'pimpinan' => redirect()->to('/admin/dashboard'),
                default => redirect()->to('/dashboard'),
            };
        }

        return redirect()->to('/login');
    }
}
