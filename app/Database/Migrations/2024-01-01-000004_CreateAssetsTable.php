<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAssetsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kode_asset' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'kategori' => [
                'type' => 'ENUM',
                'constraint' => ['PC', 'Laptop', 'Printer', 'Scanner', 'Monitor', 'UPS', 'Router', 'Switch', 'Lainnya'],
                'null' => false,
            ],
            'merk' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'model' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'serial_number' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'spesifikasi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'tahun_perolehan' => [
                'type' => 'YEAR',
                'null' => true,
            ],
            'nilai_perolehan' => [
                'type' => 'DECIMAL',
                'constraint' => '15,2',
                'null' => true,
            ],
            'lokasi' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'kondisi' => [
                'type' => 'ENUM',
                'constraint' => ['Baik', 'Rusak Ringan', 'Rusak Berat', 'Sedang Diperbaiki', 'Afkir'],
                'default' => 'Baik',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Tersedia', 'Digunakan', 'Dipinjam', 'Dihapuskan'],
                'default' => 'Tersedia',
            ],
            'catatan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey('kode_asset', 'uk_assets_kode');
        $this->forge->addKey('kategori', false, false, 'idx_assets_kategori');
        $this->forge->addKey('kondisi', false, false, 'idx_assets_kondisi');
        $this->forge->addKey('status', false, false, 'idx_assets_status');
        $this->forge->createTable('assets', true);
    }

    public function down()
    {
        $this->forge->dropTable('assets', true);
    }
}
