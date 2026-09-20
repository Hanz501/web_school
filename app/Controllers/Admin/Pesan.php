<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PesanModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;

class Pesan extends BaseController
{
    protected PesanModel $pesanModel;

    public function __construct()
    {
        $this->pesanModel = new PesanModel();
    }

    public function index(): string
    {
        $keyword = $this->request->getGet('q');
        $status  = $this->request->getGet('status');

        $pesanList   = $this->pesanModel->getFilteredPesan($keyword, $status, 20);
        $unreadCount = $this->pesanModel->getUnreadCount();
        $totalCount  = $this->pesanModel->countAllResults();

        $data = [
            'title'       => 'Kotak Masuk Pesan & Pengaduan - Admin',
            'active_menu' => 'pesan',
            'pesanList'   => $pesanList,
            'pager'       => $this->pesanModel->pager,
            'unreadCount' => $unreadCount,
            'totalCount'  => $totalCount,
            'keyword'     => $keyword,
            'status'      => $status,
        ];

        return view('admin/pesan/index', $data);
    }

    public function markAsRead(int $id): RedirectResponse
    {
        $pesan = $this->pesanModel->find($id);
        if (!$pesan) {
            return redirect()->to(base_url('admin/pesan'))->with('error', 'Pesan tidak ditemukan.');
        }

        $newStatus = $pesan['is_read'] ? 0 : 1;
        $this->pesanModel->update($id, ['is_read' => $newStatus]);

        $statusText = $newStatus ? 'ditandai sudah dibaca' : 'ditandai belum dibaca';
        return redirect()->to(base_url('admin/pesan'))->with('success', "Pesan dari {$pesan['nama_lengkap']} berhasil {$statusText}.");
    }

    public function markAllRead(): RedirectResponse
    {
        $this->pesanModel->where('is_read', 0)->set(['is_read' => 1])->update();
        return redirect()->to(base_url('admin/pesan'))->with('success', 'Semua pesan berhasil ditandai sudah dibaca.');
    }

    public function delete(int $id): RedirectResponse
    {
        $pesan = $this->pesanModel->find($id);
        if (!$pesan) {
            return redirect()->to(base_url('admin/pesan'))->with('error', 'Pesan tidak ditemukan.');
        }

        $this->pesanModel->delete($id);
        return redirect()->to(base_url('admin/pesan'))->with('success', "Pesan dari {$pesan['nama_lengkap']} berhasil dihapus.");
    }
}
