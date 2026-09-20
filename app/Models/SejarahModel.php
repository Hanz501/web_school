<?php

namespace App\Models;

use CodeIgniter\Model;

class SejarahModel extends Model
{
    protected $table            = 'sejarah';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'tahun',
        'badge_tahun',
        'judul',
        'deskripsi',
        'urutan',
        'color_scheme',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation Rules
    protected $validationRules = [
        'tahun'     => 'required|max_length[20]',
        'judul'     => 'required|min_length[3]|max_length[255]',
        'deskripsi' => 'required',
    ];

    public function getAllOrdered(): array
    {
        return $this->orderBy('urutan', 'ASC')->orderBy('tahun', 'ASC')->findAll();
    }
}
