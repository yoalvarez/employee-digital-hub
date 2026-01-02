<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeksiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode' => 'SUBUM',
                'nama' => 'Subbagian Umum dan Kepatuhan Internal',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode' => 'PDI',
                'nama' => 'Seksi Pengolahan Data dan Informasi',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode' => 'PELAYANAN',
                'nama' => 'Seksi Pelayanan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode' => 'PENAGIHAN',
                'nama' => 'Seksi Penagihan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode' => 'PEMERIKSAAN',
                'nama' => 'Seksi Pemeriksaan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode' => 'PENGAWASAN1',
                'nama' => 'Seksi Pengawasan I',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode' => 'PENGAWASAN2',
                'nama' => 'Seksi Pengawasan II',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode' => 'PENGAWASAN3',
                'nama' => 'Seksi Pengawasan III',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode' => 'PENGAWASAN4',
                'nama' => 'Seksi Pengawasan IV',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode' => 'PENGAWASAN5',
                'nama' => 'Seksi Pengawasan V',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode' => 'PENGAWASAN6',
                'nama' => 'Seksi Pengawasan VI',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('seksi')->insertBatch($data);
    }
}
