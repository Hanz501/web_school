<?php

namespace App\Models;

use CodeIgniter\Model;

class PesanModel extends Model
{
    protected $table            = 'pesan_masuk';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_lengkap',
        'email',
        'pesan',
        'is_read',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'nama_lengkap' => 'required|min_length[3]|max_length[150]',
        'email'        => 'required|valid_email|max_length[150]',
        'pesan'        => 'required|min_length[10]|max_length[3000]',
    ];

    protected $validationMessages = [
        'nama_lengkap' => [
            'required'   => 'Nama lengkap wajib diisi.',
            'min_length' => 'Nama lengkap minimal 3 karakter.',
            'max_length' => 'Nama lengkap maksimal 150 karakter.',
        ],
        'email' => [
            'required'    => 'Alamat email wajib diisi.',
            'valid_email' => 'Format email tidak valid.',
            'max_length'  => 'Email maksimal 150 karakter.',
        ],
        'pesan' => [
            'required'   => 'Pesan / masukan tidak boleh kosong.',
            'min_length' => 'Pesan minimal 10 karakter.',
            'max_length' => 'Pesan maksimal 3000 karakter.',
        ],
    ];

    /**
     * Get unread messages count
     */
    public function getUnreadCount(): int
    {
        return $this->where('is_read', 0)->countAllResults();
    }

    /**
     * Get latest messages with search and pagination support
     */
    public function getFilteredPesan(?string $keyword = null, ?string $status = null, int $perPage = 15)
    {
        $builder = $this->orderBy('created_at', 'DESC');

        if (!empty($keyword)) {
            $builder->groupStart()
                ->like('nama_lengkap', $keyword)
                ->orLike('email', $keyword)
                ->orLike('pesan', $keyword)
                ->groupEnd();
        }

        if ($status === 'unread') {
            $builder->where('is_read', 0);
        } elseif ($status === 'read') {
            $builder->where('is_read', 1);
        }

        return $builder->paginate($perPage, 'pesan');
    }
}
