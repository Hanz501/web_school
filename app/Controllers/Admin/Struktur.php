<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StrukturOrganisasiModel;

class Struktur extends BaseController
{
    protected StrukturOrganisasiModel $strukturModel;

    public function __construct()
    {
        $this->strukturModel = new StrukturOrganisasiModel();
    }

    public function index(): string
    {
        $data = [
            'title'        => 'Manajemen Bagan Struktur Organisasi - Admin',
            'active_menu'  => 'struktur',
            'strukturList' => $this->strukturModel->getAllOrdered(),
            'grouped'      => $this->strukturModel->getGroupedByLevel(),
        ];

        return view('admin/struktur/index', $data);
    }

    public function create(): string
    {
        $data = [
            'title'       => 'Tambah Anggota Struktur Organisasi - Admin',
            'active_menu' => 'struktur',
            'struktur'    => null,
        ];

        return view('admin/struktur/form', $data);
    }

    public function store(): \CodeIgniter\HTTP\RedirectResponse
    {
        $rules = [
            'nama'    => 'required|min_length[3]|max_length[150]',
            'jabatan' => 'required|min_length[2]|max_length[150]',
            'level'   => 'required',
            'foto'    => 'permit_empty|max_size[foto,4096]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fotoName = null;
        $fotoFile = $this->request->getFile('foto');
        if ($fotoFile && $fotoFile->isValid() && !$fotoFile->hasMoved()) {
            $fotoName = $fotoFile->getRandomName();
            if (!is_dir(FCPATH . 'images/struktur/')) {
                @mkdir(FCPATH . 'images/struktur/', 0777, true);
            }
            $fotoFile->move(FCPATH . 'images/struktur/', $fotoName);
        }

        $this->strukturModel->insert([
            'nama'        => $this->request->getPost('nama'),
            'jabatan'     => $this->request->getPost('jabatan'),
            'level'       => $this->request->getPost('level'),
            'sub_jabatan' => $this->request->getPost('sub_jabatan'),
            'badge_label' => $this->request->getPost('badge_label'),
            'icon'        => $this->request->getPost('icon') ?: '👨‍💼',
            'foto'        => $fotoName,
            'urutan'      => (int) ($this->request->getPost('urutan') ?: 0),
        ]);

        return redirect()->to(base_url('admin/struktur'))->with('success', 'Anggota struktur organisasi berhasil ditambahkan!');
    }

    public function edit(int $id): string|\CodeIgniter\HTTP\RedirectResponse
    {
        $struktur = $this->strukturModel->find($id);
        if (!$struktur) {
            return redirect()->to(base_url('admin/struktur'))->with('error', 'Data anggota struktur tidak ditemukan.');
        }

        $data = [
            'title'       => 'Edit Anggota Struktur Organisasi - Admin',
            'active_menu' => 'struktur',
            'struktur'    => $struktur,
        ];

        return view('admin/struktur/form', $data);
    }

    public function update(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        $struktur = $this->strukturModel->find($id);
        if (!$struktur) {
            return redirect()->to(base_url('admin/struktur'))->with('error', 'Data anggota struktur tidak ditemukan.');
        }

        $rules = [
            'nama'    => 'required|min_length[3]|max_length[150]',
            'jabatan' => 'required|min_length[2]|max_length[150]',
            'level'   => 'required',
            'foto'    => 'permit_empty|max_size[foto,4096]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fotoName = $struktur['foto'];
        $fotoFile = $this->request->getFile('foto');
        if ($fotoFile && $fotoFile->isValid() && !$fotoFile->hasMoved()) {
            $fotoName = $fotoFile->getRandomName();
            if (!is_dir(FCPATH . 'images/struktur/')) {
                @mkdir(FCPATH . 'images/struktur/', 0777, true);
            }
            $fotoFile->move(FCPATH . 'images/struktur/', $fotoName);

            // Remove old photo if exists
            if (!empty($struktur['foto']) && file_exists(FCPATH . 'images/struktur/' . $struktur['foto'])) {
                @unlink(FCPATH . 'images/struktur/' . $struktur['foto']);
            }
        }

        $this->strukturModel->update($id, [
            'nama'        => $this->request->getPost('nama'),
            'jabatan'     => $this->request->getPost('jabatan'),
            'level'       => $this->request->getPost('level'),
            'sub_jabatan' => $this->request->getPost('sub_jabatan'),
            'badge_label' => $this->request->getPost('badge_label'),
            'icon'        => $this->request->getPost('icon') ?: '👨‍💼',
            'foto'        => $fotoName,
            'urutan'      => (int) ($this->request->getPost('urutan') ?: 0),
        ]);

        return redirect()->to(base_url('admin/struktur'))->with('success', 'Data anggota struktur organisasi berhasil diperbarui!');
    }

    public function delete(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        $struktur = $this->strukturModel->find($id);
        if ($struktur) {
            if (!empty($struktur['foto']) && file_exists(FCPATH . 'images/struktur/' . $struktur['foto'])) {
                @unlink(FCPATH . 'images/struktur/' . $struktur['foto']);
            }
            $this->strukturModel->delete($id);
            return redirect()->to(base_url('admin/struktur'))->with('success', 'Anggota struktur organisasi berhasil dihapus.');
        }

        return redirect()->to(base_url('admin/struktur'))->with('error', 'Data anggota struktur tidak ditemukan.');
    }
}
