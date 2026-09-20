<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProfilModel;
use App\Models\SejarahModel;

class Profil extends BaseController
{
    protected ProfilModel $profilModel;
    protected SejarahModel $sejarahModel;

    public function __construct()
    {
        $this->profilModel  = new ProfilModel();
        $this->sejarahModel = new SejarahModel();
    }

    public function index(): string
    {
        $profil = $this->profilModel->getProfil();
        
        // Format array misi to newline separated text for textarea
        $misiArr = $profil['misi'] ?? [];
        $profil['misi_text'] = implode("\n", $misiArr);

        $data = [
            'title'        => 'Kelola Profil & Visi Misi Sekolah - Admin',
            'active_menu'  => 'profil',
            'profil'       => $profil,
            'sejarahList'  => $this->sejarahModel->getAllOrdered(),
        ];

        return view('admin/profil/index', $data);
    }

    public function update(): \CodeIgniter\HTTP\RedirectResponse
    {
        $rules = [
            'nama_sekolah'      => 'required|max_length[200]',
            'npsn'              => 'required|max_length[50]',
            'akreditasi'        => 'required|max_length[100]',
            'tahun_berdiri'     => 'required|max_length[10]',
            'visi'              => 'required',
            'misi'              => 'required',
            'ringkasan_sejarah' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Convert newline separated string into array and json_encode
        $misiText = $this->request->getPost('misi');
        $misiArr  = array_values(array_filter(array_map('trim', explode("\n", (string)$misiText))));

        // Parse Nilai Budaya (PRIDE)
        $icons  = $this->request->getPost('nilai_icon') ?? [];
        $labels = $this->request->getPost('nilai_label') ?? [];
        $subs   = $this->request->getPost('nilai_sub') ?? [];

        $nilaiBudayaArr = [];
        for ($i = 0; $i < count($labels); $i++) {
            if (!empty(trim($labels[$i]))) {
                $nilaiBudayaArr[] = [
                    'icon'  => $icons[$i] ?? '💎',
                    'label' => trim($labels[$i]),
                    'sub'   => trim($subs[$i] ?? ''),
                ];
            }
        }

        if (empty($nilaiBudayaArr)) {
            $nilaiBudayaArr = [
                ['icon' => '💎', 'label' => 'Professional', 'sub' => 'Kompeten & Tepat'],
                ['icon' => '🛡️', 'label' => 'Reliable', 'sub' => 'Berintegritas'],
                ['icon' => '💡', 'label' => 'Innovative', 'sub' => 'Kreatif Solutif'],
                ['icon' => '🤝', 'label' => 'Disciplined', 'sub' => 'Etos Kerja Kuat'],
                ['icon' => '🚀', 'label' => 'Excellence', 'sub' => 'Standar Tertinggi']
            ];
        }

        $row = $this->profilModel->first();
        $payload = [
            'nama_sekolah'      => $this->request->getPost('nama_sekolah'),
            'npsn'              => $this->request->getPost('npsn'),
            'akreditasi'        => $this->request->getPost('akreditasi'),
            'tahun_berdiri'     => $this->request->getPost('tahun_berdiri'),
            'ringkasan_sejarah' => $this->request->getPost('ringkasan_sejarah'),
            'visi'              => $this->request->getPost('visi'),
            'misi'              => json_encode($misiArr),
            'nilai_budaya'      => json_encode($nilaiBudayaArr),
        ];

        if ($row) {
            $this->profilModel->update($row['id'], $payload);
        } else {
            $this->profilModel->insert($payload);
        }

        return redirect()->to(base_url('admin/profil'))->with('success', 'Data Profil Sekolah, Visi & Misi berhasil diperbarui!');
    }

    public function createSejarah(): string
    {
        $data = [
            'title'       => 'Tambah Peristiwa Sejarah Baru - Admin',
            'active_menu' => 'profil',
            'sejarah'     => null,
        ];

        return view('admin/profil/sejarah_form', $data);
    }

    public function storeSejarah(): \CodeIgniter\HTTP\RedirectResponse
    {
        $rules = [
            'tahun'     => 'required|max_length[20]',
            'judul'     => 'required|min_length[3]|max_length[255]',
            'deskripsi' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $tahun = $this->request->getPost('tahun');
        $badge = $this->request->getPost('badge_tahun') ?: 'Tahun ' . $tahun;

        $this->sejarahModel->insert([
            'tahun'        => $tahun,
            'badge_tahun'  => $badge,
            'judul'        => $this->request->getPost('judul'),
            'deskripsi'    => $this->request->getPost('deskripsi'),
            'urutan'       => (int) ($this->request->getPost('urutan') ?: 0),
            'color_scheme' => $this->request->getPost('color_scheme') ?: 'amber',
        ]);

        return redirect()->to(base_url('admin/profil'))->with('success', 'Peristiwa sejarah baru berhasil ditambahkan!');
    }

    public function editSejarah(int $id): string|\CodeIgniter\HTTP\RedirectResponse
    {
        $sejarah = $this->sejarahModel->find($id);
        if (!$sejarah) {
            return redirect()->to(base_url('admin/profil'))->with('error', 'Data peristiwa sejarah tidak ditemukan.');
        }

        $data = [
            'title'       => 'Edit Peristiwa Sejarah - Admin',
            'active_menu' => 'profil',
            'sejarah'     => $sejarah,
        ];

        return view('admin/profil/sejarah_form', $data);
    }

    public function updateSejarah(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        $sejarah = $this->sejarahModel->find($id);
        if (!$sejarah) {
            return redirect()->to(base_url('admin/profil'))->with('error', 'Data peristiwa sejarah tidak ditemukan.');
        }

        $rules = [
            'tahun'     => 'required|max_length[20]',
            'judul'     => 'required|min_length[3]|max_length[255]',
            'deskripsi' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $tahun = $this->request->getPost('tahun');
        $badge = $this->request->getPost('badge_tahun') ?: 'Tahun ' . $tahun;

        $this->sejarahModel->update($id, [
            'tahun'        => $tahun,
            'badge_tahun'  => $badge,
            'judul'        => $this->request->getPost('judul'),
            'deskripsi'    => $this->request->getPost('deskripsi'),
            'urutan'       => (int) ($this->request->getPost('urutan') ?: 0),
            'color_scheme' => $this->request->getPost('color_scheme') ?: 'amber',
        ]);

        return redirect()->to(base_url('admin/profil'))->with('success', 'Data peristiwa sejarah berhasil diperbarui!');
    }

    public function deleteSejarah(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        $sejarah = $this->sejarahModel->find($id);
        if ($sejarah) {
            $this->sejarahModel->delete($id);
            return redirect()->to(base_url('admin/profil'))->with('success', 'Peristiwa sejarah berhasil dihapus.');
        }

        return redirect()->to(base_url('admin/profil'))->with('error', 'Data peristiwa sejarah tidak ditemukan.');
    }
}
