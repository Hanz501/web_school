<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\GaleriModel;
use App\Models\JurusanModel;
use App\Models\PesanModel;
use App\Models\SejarahModel;
use App\Models\StrukturOrganisasiModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index(): string
    {
        $beritaModel   = new BeritaModel();
        $galeriModel   = new GaleriModel();
        $jurusanModel  = new JurusanModel();
        $sejarahModel  = new SejarahModel();
        $strukturModel = new StrukturOrganisasiModel();
        $userModel     = new UserModel();
        $pesanModel    = new PesanModel();

        $totalBerita   = $beritaModel->countAllResults();
        $totalGaleri   = $galeriModel->countAllResults();
        $totalJurusan  = $jurusanModel->countAllResults();
        $totalSejarah  = $sejarahModel->countAllResults();
        $totalStruktur = $strukturModel->countAllResults();
        $totalAdmin    = $userModel->countAllResults();
        $totalPesan    = $pesanModel->countAllResults();
        $unreadPesan   = $pesanModel->getUnreadCount();

        $recentBerita  = $beritaModel->orderBy('id', 'DESC')->findAll(5);
        $recentGaleri  = $galeriModel->orderBy('id', 'DESC')->findAll(6);
        $recentPesan   = $pesanModel->orderBy('created_at', 'DESC')->findAll(5);

        $data = [
            'title'        => 'Dashboard Admin - SMK Unggulan',
            'active_menu'  => 'dashboard',
            'stats'        => [
                'total_berita'   => $totalBerita,
                'total_galeri'   => $totalGaleri,
                'total_jurusan'  => $totalJurusan,
                'total_sejarah'  => $totalSejarah,
                'total_struktur' => $totalStruktur,
                'total_admin'    => $totalAdmin,
                'total_pesan'    => $totalPesan,
                'unread_pesan'   => $unreadPesan,
            ],
            'recentBerita' => $recentBerita,
            'recentGaleri' => $recentGaleri,
            'recentPesan'  => $recentPesan,
        ];

        return view('admin/dashboard', $data);
    }
}
