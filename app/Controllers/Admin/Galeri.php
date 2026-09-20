<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GaleriModel;

class Galeri extends BaseController
{
    protected GaleriModel $galeriModel;

    public function __construct()
    {
        $this->galeriModel = new GaleriModel();
    }

    public function index(): string
    {
        $data = [
            'title'       => 'Manajemen Galeri & Fasilitas - Admin',
            'active_menu' => 'galeri',
            'galeriList'  => $this->galeriModel->orderBy('id', 'DESC')->findAll(),
        ];

        return view('admin/galeri/index', $data);
    }

    public function create(): string
    {
        $data = [
            'title'       => 'Tambah Foto Galeri Baru - Admin',
            'active_menu' => 'galeri',
            'galeri'      => null,
        ];

        return view('admin/galeri/form', $data);
    }

    public function store(): \CodeIgniter\HTTP\RedirectResponse
    {
        $rules = [
            'judul'     => 'required|min_length[3]|max_length[255]',
            'kategori'  => 'required',
            'deskripsi' => 'required',
            'foto'      => 'uploaded[foto]|max_size[foto,5120]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fotoName = null;
        $fotoFile = $this->request->getFile('foto');
        if ($fotoFile && $fotoFile->isValid() && !$fotoFile->hasMoved()) {
            $fotoName = $fotoFile->getRandomName();
            $fotoFile->move(FCPATH . 'images/galeri/', $fotoName);
        }

        $this->galeriModel->insert([
            'judul'     => $this->request->getPost('judul'),
            'kategori'  => $this->request->getPost('kategori'),
            'foto'      => $fotoName,
            'deskripsi' => $this->request->getPost('deskripsi'),
            'icon'      => $this->request->getPost('icon') ?: 'monitor',
        ]);

        return redirect()->to(base_url('admin/galeri'))->with('success', 'Foto fasilitas berhasil ditambahkan!');
    }

    public function edit(int $id): string|\CodeIgniter\HTTP\RedirectResponse
    {
        $galeri = $this->galeriModel->find($id);
        if (!$galeri) {
            return redirect()->to(base_url('admin/galeri'))->with('error', 'Data galeri tidak ditemukan.');
        }

        $data = [
            'title'       => 'Edit Galeri Fasilitas - Admin',
            'active_menu' => 'galeri',
            'galeri'      => $galeri,
        ];

        return view('admin/galeri/form', $data);
    }

    public function update(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        $galeri = $this->galeriModel->find($id);
        if (!$galeri) {
            return redirect()->to(base_url('admin/galeri'))->with('error', 'Data galeri tidak ditemukan.');
        }

        $rules = [
            'judul'     => 'required|min_length[3]|max_length[255]',
            'kategori'  => 'required',
            'deskripsi' => 'required',
            'foto'      => 'permit_empty|max_size[foto,5120]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fotoName = $galeri['foto'];
        $fotoFile = $this->request->getFile('foto');
        if ($fotoFile && $fotoFile->isValid() && !$fotoFile->hasMoved()) {
            $fotoName = $fotoFile->getRandomName();
            $fotoFile->move(FCPATH . 'images/galeri/', $fotoName);

            // Remove old file if exists
            if (!empty($galeri['foto']) && file_exists(FCPATH . 'images/galeri/' . $galeri['foto'])) {
                @unlink(FCPATH . 'images/galeri/' . $galeri['foto']);
            }
        }

        $this->galeriModel->update($id, [
            'judul'     => $this->request->getPost('judul'),
            'kategori'  => $this->request->getPost('kategori'),
            'foto'      => $fotoName,
            'deskripsi' => $this->request->getPost('deskripsi'),
            'icon'      => $this->request->getPost('icon') ?: 'monitor',
        ]);

        return redirect()->to(base_url('admin/galeri'))->with('success', 'Data galeri berhasil diperbarui!');
    }

    public function delete(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        $galeri = $this->galeriModel->find($id);
        if ($galeri) {
            if (!empty($galeri['foto']) && file_exists(FCPATH . 'images/galeri/' . $galeri['foto'])) {
                @unlink(FCPATH . 'images/galeri/' . $galeri['foto']);
            }
            $this->galeriModel->delete($id);
            return redirect()->to(base_url('admin/galeri'))->with('success', 'Foto galeri berhasil dihapus.');
        }

        return redirect()->to(base_url('admin/galeri'))->with('error', 'Data galeri tidak ditemukan.');
    }
}
