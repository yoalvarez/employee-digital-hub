<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nip' => '000000000000000000',
                'nama' => 'Administrator',
                'email' => 'admin@kpp.local',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'role_id' => 1,
                'seksi_id' => 1,
                'jabatan' => 'Administrator Sistem',
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nip' => '198501012010011001',
                'nama' => 'Budi Santoso',
                'email' => 'budi.santoso@kpp.local',
                'password' => password_hash('pegawai123', PASSWORD_DEFAULT),
                'role_id' => 2,
                'seksi_id' => 2,
                'jabatan' => 'Pelaksana',
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nip' => '197512152000121002',
                'nama' => 'Siti Rahayu',
                'email' => 'siti.rahayu@kpp.local',
                'password' => password_hash('pimpinan123', PASSWORD_DEFAULT),
                'role_id' => 3,
                'seksi_id' => 1,
                'jabatan' => 'Kepala Subbagian Umum',
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
