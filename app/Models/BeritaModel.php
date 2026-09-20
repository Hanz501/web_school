<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table            = 'berita';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'judul',
        'slug',
        'kategori',
        'kategori_color',
        'penulis',
        'tanggal',
        'ringkasan',
        'konten',
        'foto',
        'waktu_baca',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'judul'     => 'required|min_length[5]|max_length[255]',
        'kategori'  => 'required|max_length[100]',
        'ringkasan' => 'required',
        'konten'    => 'required',
    ];

    public function getLatestBerita(int $limit = 6): array
    {
        return $this->orderBy('id', 'DESC')->findAll($limit);
    }
}
