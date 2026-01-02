<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Admin Dashboard - Employee Digital Hub',
            'pageTitle' => 'Admin Dashboard',
            'breadcrumb' => [
                ['title' => 'Dashboard'],
            ],
        ];

        $db = \Config\Database::connect();

        // Count total users
        $totalUsers = $db->table('users')
            ->where('deleted_at IS NULL')
            ->countAllResults();

        // Count total assets
        $totalAssets = $db->table('assets')
            ->where('deleted_at IS NULL')
            ->countAllResults();

        // Count open tickets
        $openTickets = $db->table('tickets')
            ->whereIn('status', ['Open', 'In Progress', 'Pending'])
            ->countAllResults();

        // Count pending bookings
        $pendingBookings = $db->table('vehicle_bookings')
            ->where('status', 'Pending')
            ->countAllResults();

        // Count total vehicles
        $totalVehicles = $db->table('vehicles')
            ->where('deleted_at IS NULL')
            ->countAllResults();

        // Count published articles
        $publishedArticles = $db->table('articles')
            ->where('is_published', 1)
            ->where('deleted_at IS NULL')
            ->countAllResults();

        $data['stats'] = [
            'users' => $totalUsers,
            'assets' => $totalAssets,
            'openTickets' => $openTickets,
            'pendingBookings' => $pendingBookings,
            'vehicles' => $totalVehicles,
            'articles' => $publishedArticles,
        ];

        // Get recent tickets
        $data['recentTickets'] = $db->table('tickets')
            ->select('tickets.*, users.nama as user_nama')
            ->join('users', 'users.id = tickets.user_id', 'left')
            ->orderBy('tickets.created_at', 'DESC')
            ->limit(5)
            ->get()
            ->getResultArray();

        // Get recent bookings
        $data['recentBookings'] = $db->table('vehicle_bookings')
            ->select('vehicle_bookings.*, users.nama as user_nama, vehicles.nama as vehicle_nama, vehicles.nomor_polisi')
            ->join('users', 'users.id = vehicle_bookings.user_id', 'left')
            ->join('vehicles', 'vehicles.id = vehicle_bookings.vehicle_id', 'left')
            ->orderBy('vehicle_bookings.created_at', 'DESC')
            ->limit(5)
            ->get()
            ->getResultArray();

        return view('admin/dashboard', $data);
    }
}
