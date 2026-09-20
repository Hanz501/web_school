<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    protected $table            = 'profil_sekolah';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_sekolah',
        'npsn',
        'akreditasi',
        'tahun_berdiri',
        'ringkasan_sejarah',
        'visi',
        'misi',
        'nilai_budaya',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getProfil(): array
    {
        $row = $this->first();
        if (!$row) {
            return [
                'nama_sekolah'      => 'SMK UNGGULAN PUSAT KEUNGGULAN',
                'npsn'              => '20194821',
                'akreditasi'        => 'A (Unggul) BAN-S/M & ISO 9001:2015',
                'tahun_berdiri'     => '2012',
                'ringkasan_sejarah' => 'SMK Unggulan didirikan pada tahun 2012 sebagai respons strategis terhadap tingginya kebutuhan industri nasional akan tenaga ahli teknologi informasi, rekayasa digital, dan sistem keuangan modern yang berkarakter kuat serta memiliki kompetensi berstandar internasional.',
                'visi'              => 'Menjadi Pusat Keunggulan Pendidikan Vokasi Terdepan di Asia Tenggara yang Menghasilkan Lulusan Berkarakter Unggul, Berdaya Saing Global, dan Adaptif terhadap Teknologi Masa Depan.',
                'misi'              => [
                    'Menyelenggarakan kurikulum link and match yang selaras secara dinamis dengan standar kompetensi industri tier-1 global.',
                    'Membekali peserta didik dengan sertifikasi profesi resmi BNSP dan sertifikasi vendor internasional terkemuka (Cisco, AWS, Adobe, SAP).',
                    'Mengembangkan ekosistem Teaching Factory (TeFa) berbasis proyek komersial riil untuk menumbuhkan jiwa wirausaha teknologi (technopreneur).',
                    'Membangun budaya kerja industri dengan integritas moral tinggi, kedisiplinan prima, dan wawasan kebinekaan global.'
                ],
                'nilai_budaya'      => [
                    ['icon' => '💎', 'label' => 'Professional', 'sub' => 'Kompeten & Tepat'],
                    ['icon' => '🛡️', 'label' => 'Reliable', 'sub' => 'Berintegritas'],
                    ['icon' => '💡', 'label' => 'Innovative', 'sub' => 'Kreatif Solutif'],
                    ['icon' => '🤝', 'label' => 'Disciplined', 'sub' => 'Etos Kerja Kuat'],
                    ['icon' => '🚀', 'label' => 'Excellence', 'sub' => 'Standar Tertinggi']
                ]
            ];
        }

        $row['misi']         = is_string($row['misi']) ? (json_decode($row['misi'], true) ?? []) : ($row['misi'] ?? []);
        $row['nilai_budaya'] = is_string($row['nilai_budaya']) ? (json_decode($row['nilai_budaya'], true) ?? []) : ($row['nilai_budaya'] ?? []);

        return $row;
    }
}
