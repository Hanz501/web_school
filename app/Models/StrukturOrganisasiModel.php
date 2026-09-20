<?php

namespace App\Models;

use CodeIgniter\Model;

class StrukturOrganisasiModel extends Model
{
    protected $table            = 'struktur_organisasi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama',
        'jabatan',
        'level',
        'sub_jabatan',
        'badge_label',
        'icon',
        'foto',
        'urutan',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation Rules
    protected $validationRules = [
        'nama'    => 'required|min_length[3]|max_length[150]',
        'jabatan' => 'required|min_length[2]|max_length[150]',
        'level'   => 'required',
    ];

    public function getAllOrdered(): array
    {
        try {
            return $this->orderBy('urutan', 'ASC')->orderBy('id', 'ASC')->findAll();
        } catch (\Throwable $e) {
            return [];
        }
    }

    public function getGroupedByLevel(): array
    {
        $rows = $this->getAllOrdered();

        $grouped = [
            'kepala_sekolah' => null,
            'komite'         => null,
            'tata_usaha'     => null,
            'waka'           => [],
            'kaprodi'        => [],
            'lainnya'        => [],
        ];

        foreach ($rows as $row) {
            $lvl = $row['level'];
            if ($lvl === 'kepala_sekolah') {
                $grouped['kepala_sekolah'] = $row;
            } elseif ($lvl === 'komite') {
                $grouped['komite'] = $row;
            } elseif ($lvl === 'tata_usaha') {
                $grouped['tata_usaha'] = $row;
            } elseif ($lvl === 'waka') {
                $grouped['waka'][] = $row;
            } elseif ($lvl === 'kaprodi') {
                $grouped['kaprodi'][] = $row;
            } else {
                $grouped['lainnya'][] = $row;
            }
        }

        return $grouped;
    }
}
