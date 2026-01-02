<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Run seeders in order (respecting foreign key constraints)
        $this->call('RoleSeeder');
        $this->call('SeksiSeeder');
        $this->call('UserSeeder');
    }
}
