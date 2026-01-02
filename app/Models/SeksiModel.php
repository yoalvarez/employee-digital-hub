<?php

namespace App\Models;

use CodeIgniter\Model;

class SeksiModel extends Model
{
    protected $table = 'seksi';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;

    protected $allowedFields = [
        'kode',
        'nama',
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    /**
     * Get seksi by kode
     */
    public function getByKode(string $kode): ?array
    {
        return $this->where('kode', $kode)->first();
    }

    /**
     * Get all seksi as dropdown options
     */
    public function getDropdownOptions(): array
    {
        $seksiList = $this->orderBy('nama', 'ASC')->findAll();
        $options = [];

        foreach ($seksiList as $seksi) {
            $options[$seksi['id']] = $seksi['nama'];
        }

        return $options;
    }
}
