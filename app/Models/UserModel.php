<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $protectFields = true;

    protected $allowedFields = [
        'nip',
        'nama',
        'email',
        'password',
        'role_id',
        'seksi_id',
        'jabatan',
        'no_telepon',
        'foto',
        'is_active',
        'last_login',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [
        'nip' => 'required|min_length[18]|max_length[18]|is_unique[users.nip,id,{id}]',
        'nama' => 'required|min_length[3]|max_length[100]',
        'email' => 'permit_empty|valid_email|is_unique[users.email,id,{id}]',
        'password' => 'permit_empty|min_length[6]',
        'role_id' => 'required|integer',
    ];

    protected $validationMessages = [
        'nip' => [
            'required' => 'NIP harus diisi',
            'min_length' => 'NIP harus 18 digit',
            'max_length' => 'NIP harus 18 digit',
            'is_unique' => 'NIP sudah terdaftar',
        ],
        'nama' => [
            'required' => 'Nama harus diisi',
            'min_length' => 'Nama minimal 3 karakter',
        ],
        'email' => [
            'valid_email' => 'Format email tidak valid',
            'is_unique' => 'Email sudah terdaftar',
        ],
        'password' => [
            'min_length' => 'Password minimal 6 karakter',
        ],
    ];

    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    /**
     * Hash password before insert/update
     */
    protected function hashPassword(array $data): array
    {
        if (isset($data['data']['password']) && !empty($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        } else {
            unset($data['data']['password']);
        }

        return $data;
    }

    /**
     * Get user with role and seksi
     */
    public function getUserWithDetails(int $id): ?array
    {
        return $this->select('users.*, roles.name as role_name, seksi.nama as seksi_nama, seksi.kode as seksi_kode')
            ->join('roles', 'roles.id = users.role_id', 'left')
            ->join('seksi', 'seksi.id = users.seksi_id', 'left')
            ->find($id);
    }

    /**
     * Get user by NIP
     */
    public function getByNip(string $nip): ?array
    {
        return $this->where('nip', $nip)->first();
    }

    /**
     * Get user by email
     */
    public function getByEmail(string $email): ?array
    {
        return $this->where('email', $email)->first();
    }

    /**
     * Get all users with role and seksi
     */
    public function getAllWithDetails(): array
    {
        return $this->select('users.*, roles.name as role_name, seksi.nama as seksi_nama')
            ->join('roles', 'roles.id = users.role_id', 'left')
            ->join('seksi', 'seksi.id = users.seksi_id', 'left')
            ->findAll();
    }

    /**
     * Update last login timestamp
     */
    public function updateLastLogin(int $id): bool
    {
        return $this->update($id, ['last_login' => date('Y-m-d H:i:s')]);
    }

    /**
     * Check if user is active
     */
    public function isActive(int $id): bool
    {
        $user = $this->find($id);
        return $user && $user['is_active'] == 1;
    }

    /**
     * Get users by role
     */
    public function getByRole(int $roleId): array
    {
        return $this->where('role_id', $roleId)->findAll();
    }

    /**
     * Get users by seksi
     */
    public function getBySeksi(int $seksiId): array
    {
        return $this->where('seksi_id', $seksiId)->findAll();
    }
}
