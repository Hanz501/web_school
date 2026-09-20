<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriModel extends Model
{
    protected $table            = 'galeri';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'judul',
        'kategori',
        'foto',
        'deskripsi',
        'icon',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'judul'     => 'required|min_length[3]|max_length[255]',
        'kategori'  => 'required|max_length[100]',
        'deskripsi' => 'required',
    ];

    public function getAllGaleri(): array
    {
        return $this->orderBy('id', 'ASC')->findAll();
    }
}
