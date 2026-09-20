<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;

class Berita extends BaseController
{
    protected BeritaModel $beritaModel;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
    }

    public function index(): string
    {
        $data = [
            'title'       => 'Manajemen Berita & Artikel - Admin',
            'active_menu' => 'berita',
            'beritaList'  => $this->beritaModel->orderBy('id', 'DESC')->findAll(),
        ];

        return view('admin/berita/index', $data);
    }

    public function create(): string
    {
        $data = [
            'title'       => 'Tambah Berita Baru - Admin',
            'active_menu' => 'berita',
            'berita'      => null,
        ];

        return view('admin/berita/form', $data);
    }

    public function store(): \CodeIgniter\HTTP\RedirectResponse
    {
        $rules = [
            'judul'     => 'required|min_length[5]|max_length[255]',
            'kategori'  => 'required',
            'tanggal'   => 'required',
            'penulis'   => 'required',
            'ringkasan' => 'required',
            'konten'    => 'required',
            'foto'      => 'permit_empty|uploaded[foto]|max_size[foto,5120]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fotoName = null;
        $fotoFile = $this->request->getFile('foto');
        if ($fotoFile && $fotoFile->isValid() && !$fotoFile->hasMoved()) {
            $fotoName = $fotoFile->getRandomName();
            $fotoFile->move(FCPATH . 'images/berita/', $fotoName);
        }

        $judul = $this->request->getPost('judul');
        $slug  = url_title($judul, '-', true);

        $this->beritaModel->insert([
            'judul'          => $judul,
            'slug'           => $slug,
            'kategori'       => $this->request->getPost('kategori'),
            'kategori_color' => $this->request->getPost('kategori_color') ?: 'amber',
            'penulis'        => $this->request->getPost('penulis'),
            'tanggal'        => $this->request->getPost('tanggal'),
            'ringkasan'      => $this->request->getPost('ringkasan'),
            'konten'         => $this->request->getPost('konten'),
            'waktu_baca'     => $this->request->getPost('waktu_baca') ?: '3 menit baca',
            'foto'           => $fotoName,
        ]);

        return redirect()->to(base_url('admin/berita'))->with('success', 'Berita berhasil dipublikasikan!');
    }

    public function edit(int $id): string|\CodeIgniter\HTTP\RedirectResponse
    {
        $berita = $this->beritaModel->find($id);
        if (!$berita) {
            return redirect()->to(base_url('admin/berita'))->with('error', 'Berita tidak ditemukan.');
        }

        $data = [
            'title'       => 'Edit Berita - Admin',
            'active_menu' => 'berita',
            'berita'      => $berita,
        ];

        return view('admin/berita/form', $data);
    }

    public function update(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        $berita = $this->beritaModel->find($id);
        if (!$berita) {
            return redirect()->to(base_url('admin/berita'))->with('error', 'Berita tidak ditemukan.');
        }

        $rules = [
            'judul'     => 'required|min_length[5]|max_length[255]',
            'kategori'  => 'required',
            'tanggal'   => 'required',
            'penulis'   => 'required',
            'ringkasan' => 'required',
            'konten'    => 'required',
            'foto'      => 'permit_empty|max_size[foto,5120]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fotoName = $berita['foto'];
        $fotoFile = $this->request->getFile('foto');
        if ($fotoFile && $fotoFile->isValid() && !$fotoFile->hasMoved()) {
            $fotoName = $fotoFile->getRandomName();
            $fotoFile->move(FCPATH . 'images/berita/', $fotoName);

            // Remove old file if exists
            if (!empty($berita['foto']) && file_exists(FCPATH . 'images/berita/' . $berita['foto'])) {
                @unlink(FCPATH . 'images/berita/' . $berita['foto']);
            }
        }

        $judul = $this->request->getPost('judul');
        $slug  = url_title($judul, '-', true);

        $this->beritaModel->update($id, [
            'judul'          => $judul,
            'slug'           => $slug,
            'kategori'       => $this->request->getPost('kategori'),
            'kategori_color' => $this->request->getPost('kategori_color') ?: 'amber',
            'penulis'        => $this->request->getPost('penulis'),
            'tanggal'        => $this->request->getPost('tanggal'),
            'ringkasan'      => $this->request->getPost('ringkasan'),
            'konten'         => $this->request->getPost('konten'),
            'waktu_baca'     => $this->request->getPost('waktu_baca') ?: '3 menit baca',
            'foto'           => $fotoName,
        ]);

        return redirect()->to(base_url('admin/berita'))->with('success', 'Berita berhasil diperbarui!');
    }

    public function delete(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        $berita = $this->beritaModel->find($id);
        if ($berita) {
            if (!empty($berita['foto']) && file_exists(FCPATH . 'images/berita/' . $berita['foto'])) {
                @unlink(FCPATH . 'images/berita/' . $berita['foto']);
            }
            $this->beritaModel->delete($id);
            return redirect()->to(base_url('admin/berita'))->with('success', 'Berita berhasil dihapus.');
        }

        return redirect()->to(base_url('admin/berita'))->with('error', 'Berita tidak ditemukan.');
    }
}
