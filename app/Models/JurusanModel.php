<?php

namespace App\Models;

use CodeIgniter\Model;

class JurusanModel extends Model
{
    protected $table            = 'jurusan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'kode',
        'nama',
        'kategori',
        'kuota',
        'terisi',
        'angle',
        'icon',
        'tagline',
        'deskripsi',
        'kompetensi',
        'karir',
        'sertifikasi',
        'mitra',
        'tefa',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getAllFormatted(): array
    {
        $rows = $this->orderBy('angle', 'ASC')->findAll();
        foreach ($rows as &$row) {
            $row['kompetensi'] = is_string($row['kompetensi']) ? (json_decode($row['kompetensi'], true) ?? []) : ($row['kompetensi'] ?? []);
            $row['karir']      = is_string($row['karir']) ? (json_decode($row['karir'], true) ?? []) : ($row['karir'] ?? []);
            $row['mitra']      = is_string($row['mitra']) ? (json_decode($row['mitra'], true) ?? []) : ($row['mitra'] ?? []);
        }
        return $rows;
    }
}
