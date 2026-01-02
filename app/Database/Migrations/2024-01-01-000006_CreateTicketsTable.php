<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTicketsTable extends Migration
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
            'nomor_tiket' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'asset_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'kategori' => [
                'type' => 'ENUM',
                'constraint' => ['Hardware', 'Software', 'Jaringan', 'Akun', 'Lainnya'],
                'null' => false,
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => false,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'prioritas' => [
                'type' => 'ENUM',
                'constraint' => ['Rendah', 'Sedang', 'Tinggi', 'Urgent'],
                'default' => 'Sedang',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Open', 'In Progress', 'Pending', 'Resolved', 'Closed'],
                'default' => 'Open',
            ],
            'assigned_to' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'lampiran' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'resolved_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'closed_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'rating' => [
                'type' => 'TINYINT',
                'null' => true,
            ],
            'feedback' => [
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
        $this->forge->addUniqueKey('nomor_tiket', 'uk_tickets_nomor');
        $this->forge->addKey('user_id', false, false, 'idx_tickets_user');
        $this->forge->addKey('asset_id', false, false, 'idx_tickets_asset');
        $this->forge->addKey('status', false, false, 'idx_tickets_status');
        $this->forge->addKey('assigned_to', false, false, 'idx_tickets_assigned');
        $this->forge->addKey('created_at', false, false, 'idx_tickets_created');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('asset_id', 'assets', 'id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('assigned_to', 'users', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('tickets', true);
    }

    public function down()
    {
        $this->forge->dropTable('tickets', true);
    }
}
