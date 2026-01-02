<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    /**
     * Check if user is authenticated
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('isLoggedIn')) {
            // Store intended URL
            session()->set('redirect_url', current_url());

            return redirect()->to('/login')
                ->with('error', 'Silakan login terlebih dahulu');
        }

        // Check if user is still active
        $userModel = new \App\Models\UserModel();
        $userId = session()->get('user_id');

        if (!$userModel->isActive($userId)) {
            session()->destroy();
            return redirect()->to('/login')
                ->with('error', 'Akun Anda tidak aktif');
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}
