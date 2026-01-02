<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
    /**
     * Check if user has required role
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // First check if logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')
                ->with('error', 'Silakan login terlebih dahulu');
        }

        // If no arguments, allow any authenticated user
        if (empty($arguments)) {
            return null;
        }

        $userRole = session()->get('role');

        // Check if user role is in allowed roles
        if (!in_array($userRole, $arguments)) {
            return redirect()->back()
                ->with('error', 'Anda tidak memiliki akses ke halaman tersebut');
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}
