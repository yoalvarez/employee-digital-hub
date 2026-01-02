<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateVehicleBookingsTable extends Migration
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
            'kode_booking' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ],
            'vehicle_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'keperluan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'tujuan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'jumlah_penumpang' => [
                'type' => 'TINYINT',
                'null' => true,
            ],
            'tanggal_mulai' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'jam_mulai' => [
                'type' => 'TIME',
                'null' => false,
            ],
            'tanggal_selesai' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'jam_selesai' => [
                'type' => 'TIME',
                'null' => false,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Pending', 'Approved', 'Rejected', 'Ongoing', 'Completed', 'Cancelled'],
                'default' => 'Pending',
            ],
            'approved_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'approved_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'catatan_approval' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'km_awal' => [
                'type' => 'INT',
                'null' => true,
            ],
            'km_akhir' => [
                'type' => 'INT',
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
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey('kode_booking', 'uk_bookings_kode');
        $this->forge->addKey('vehicle_id', false, false, 'idx_bookings_vehicle');
        $this->forge->addKey('user_id', false, false, 'idx_bookings_user');
        $this->forge->addKey('status', false, false, 'idx_bookings_status');
        $this->forge->addKey(['tanggal_mulai', 'tanggal_selesai'], false, false, 'idx_bookings_tanggal');
        $this->forge->addForeignKey('vehicle_id', 'vehicles', 'id', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('approved_by', 'users', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('vehicle_bookings', true);
    }

    public function down()
    {
        $this->forge->dropTable('vehicle_bookings', true);
    }
}
