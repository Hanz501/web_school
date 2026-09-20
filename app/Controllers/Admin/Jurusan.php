<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JurusanModel;

class Jurusan extends BaseController
{
    protected JurusanModel $jurusanModel;

    public function __construct()
    {
        $this->jurusanModel = new JurusanModel();
    }

    public function index(): string
    {
        $data = [
            'title'       => 'Manajemen Program Keahlian (Jurusan) - Admin',
            'active_menu' => 'jurusan',
            'jurusanList' => $this->jurusanModel->getAllFormatted(),
        ];

        return view('admin/jurusan/index', $data);
    }

    public function edit(string $id): string|\CodeIgniter\HTTP\RedirectResponse
    {
        $jurusan = $this->jurusanModel->find($id);
        if (!$jurusan) {
            return redirect()->to(base_url('admin/jurusan'))->with('error', 'Program keahlian tidak ditemukan.');
        }

        // Format json to newline separated text for easy textarea editing
        $kompetensiArr = is_string($jurusan['kompetensi']) ? (json_decode($jurusan['kompetensi'], true) ?? []) : ($jurusan['kompetensi'] ?? []);
        $karirArr      = is_string($jurusan['karir']) ? (json_decode($jurusan['karir'], true) ?? []) : ($jurusan['karir'] ?? []);
        $mitraArr      = is_string($jurusan['mitra']) ? (json_decode($jurusan['mitra'], true) ?? []) : ($jurusan['mitra'] ?? []);

        $jurusan['kompetensi_text'] = implode("\n", $kompetensiArr);
        $jurusan['karir_text']      = implode("\n", $karirArr);
        $jurusan['mitra_text']      = implode("\n", $mitraArr);

        $data = [
            'title'       => 'Edit Program Keahlian: ' . $jurusan['nama'] . ' - Admin',
            'active_menu' => 'jurusan',
            'jurusan'     => $jurusan,
        ];

        return view('admin/jurusan/form', $data);
    }

    public function update(string $id): \CodeIgniter\HTTP\RedirectResponse
    {
        $jurusan = $this->jurusanModel->find($id);
        if (!$jurusan) {
            return redirect()->to(base_url('admin/jurusan'))->with('error', 'Program keahlian tidak ditemukan.');
        }

        $rules = [
            'nama'      => 'required|min_length[3]|max_length[150]',
            'kategori'  => 'required',
            'kuota'     => 'required|is_natural_no_zero',
            'terisi'    => 'required|is_natural',
            'deskripsi' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Convert newline separated string into array and json_encode
        $kompetensiText = $this->request->getPost('kompetensi');
        $karirText      = $this->request->getPost('karir');
        $mitraText      = $this->request->getPost('mitra');

        $kompetensiArr = array_values(array_filter(array_map('trim', explode("\n", (string)$kompetensiText))));
        $karirArr      = array_values(array_filter(array_map('trim', explode("\n", (string)$karirText))));
        $mitraArr      = array_values(array_filter(array_map('trim', explode("\n", (string)$mitraText))));

        $this->jurusanModel->update($id, [
            'nama'        => $this->request->getPost('nama'),
            'kategori'    => $this->request->getPost('kategori'),
            'kuota'       => (int) $this->request->getPost('kuota'),
            'terisi'      => (int) $this->request->getPost('terisi'),
            'tagline'     => $this->request->getPost('tagline'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'sertifikasi' => $this->request->getPost('sertifikasi'),
            'tefa'        => $this->request->getPost('tefa'),
            'kompetensi'  => json_encode($kompetensiArr),
            'karir'       => json_encode($karirArr),
            'mitra'       => json_encode($mitraArr),
        ]);

        return redirect()->to(base_url('admin/jurusan'))->with('success', 'Data jurusan ' . $jurusan['kode'] . ' berhasil diperbarui!');
    }
}
