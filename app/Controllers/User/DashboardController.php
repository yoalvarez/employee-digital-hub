<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard - Employee Digital Hub',
            'pageTitle' => 'Dashboard',
            'breadcrumb' => [
                ['title' => 'Dashboard'],
            ],
        ];

        // Get basic stats for the user
        $userId = session()->get('user_id');

        // Count user's assets
        $db = \Config\Database::connect();

        $assetCount = $db->table('asset_assignments')
            ->where('user_id', $userId)
            ->where('is_active', 1)
            ->countAllResults();

        // Count user's open tickets
        $openTickets = $db->table('tickets')
            ->where('user_id', $userId)
            ->whereIn('status', ['Open', 'In Progress', 'Pending'])
            ->countAllResults();

        // Count user's pending bookings
        $pendingBookings = $db->table('vehicle_bookings')
            ->where('user_id', $userId)
            ->whereIn('status', ['Pending', 'Approved'])
            ->countAllResults();

        $data['stats'] = [
            'assets' => $assetCount,
            'openTickets' => $openTickets,
            'pendingBookings' => $pendingBookings,
        ];

        return view('user/dashboard', $data);
    }
}
