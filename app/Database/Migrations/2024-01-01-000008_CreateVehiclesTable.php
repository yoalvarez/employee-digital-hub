<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateVehiclesTable extends Migration
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
            'nomor_polisi' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => false,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'merk' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'tipe' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'null' => true,
            ],
            'tahun' => [
                'type' => 'YEAR',
                'null' => true,
            ],
            'kapasitas' => [
                'type' => 'TINYINT',
                'null' => true,
            ],
            'nomor_bpkb' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'nomor_stnk' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'tanggal_pajak' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'kondisi' => [
                'type' => 'ENUM',
                'constraint' => ['Baik', 'Perlu Service', 'Rusak'],
                'default' => 'Baik',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Tersedia', 'Digunakan', 'Service', 'Tidak Aktif'],
                'default' => 'Tersedia',
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'catatan' => [
                'type' => 'TEXT',
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
        $this->forge->addUniqueKey('nomor_polisi', 'uk_vehicles_nopol');
        $this->forge->addKey('status', false, false, 'idx_vehicles_status');
        $this->forge->createTable('vehicles', true);
    }

    public function down()
    {
        $this->forge->dropTable('vehicles', true);
    }
}
