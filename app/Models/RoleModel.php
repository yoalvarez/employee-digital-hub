<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;

    protected $allowedFields = [
        'name',
        'description',
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    /**
     * Get role by name
     */
    public function getByName(string $name): ?array
    {
        return $this->where('name', $name)->first();
    }

    /**
     * Get all roles as dropdown options
     */
    public function getDropdownOptions(): array
    {
        $roles = $this->findAll();
        $options = [];

        foreach ($roles as $role) {
            $options[$role['id']] = ucfirst($role['name']);
        }

        return $options;
    }
}
