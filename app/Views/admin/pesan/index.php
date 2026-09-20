<?= $this->extend('admin/layouts/admin_main') ?>

<?= $this->section('admin_content') ?>

<div class="space-y-6">
  
  <!-- Header & Actions -->
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
      <div class="flex items-center gap-3">
        <h1 class="text-2xl font-extrabold text-stone-900 tracking-tight">Kotak Masuk & Pesan Pengunjung</h1>
        <?php if (($unreadCount ?? 0) > 0): ?>
          <span class="px-2.5 py-0.5 rounded-full text-xs font-mono font-bold bg-emerald-500 text-white shadow-sm animate-pulse">
            <?= $unreadCount ?> Baru
          </span>
        <?php endif; ?>
      </div>
      <p class="text-xs text-stone-500 mt-1">Daftar aspirasi, konsultasi PPDB, dan pesan yang dikirimkan oleh pengunjung website sekolah.</p>
    </div>

    <div class="flex items-center gap-2.5">
      <?php if (($unreadCount ?? 0) > 0): ?>
        <a href="<?= base_url('admin/pesan/mark-all-read') ?>" class="px-4 py-2 rounded-2xl bg-white border border-stone-300 text-stone-700 hover:bg-stone-50 text-xs font-bold inline-flex items-center gap-1.5 shadow-sm transition-all" onclick="return confirm('Tandai semua pesan sebagai sudah dibaca?')">
          <svg class="w-3.5 h-3.5 text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
          <span>Tandai Semua Dibaca</span>
        </a>
      <?php endif; ?>
    </div>
  </div>

  <!-- Filter & Search Bar -->
  <div class="liquid-glass-elevated rounded-2xl p-4 border border-amber-900/10 shadow-md">
    <form method="GET" action="<?= base_url('admin/pesan') ?>" class="flex flex-col sm:flex-row items-center justify-between gap-3">
      <!-- Status Tabs -->
      <div class="flex items-center gap-1.5 w-full sm:w-auto overflow-x-auto pb-1 sm:pb-0">
        <a href="<?= base_url('admin/pesan' . ($keyword ? '?q=' . urlencode($keyword) : '')) ?>" 
           class="px-3.5 py-1.5 rounded-xl text-xs font-bold whitespace-nowrap transition-all <?= empty($status) ? 'bg-amber-600 text-white shadow-sm' : 'bg-stone-100 text-stone-600 hover:bg-stone-200' ?>">
          Semua (<?= $totalCount ?? count($pesanList) ?>)
        </a>
        <a href="<?= base_url('admin/pesan?status=unread' . ($keyword ? '&q=' . urlencode($keyword) : '')) ?>" 
           class="px-3.5 py-1.5 rounded-xl text-xs font-bold whitespace-nowrap transition-all <?= $status === 'unread' ? 'bg-emerald-600 text-white shadow-sm' : 'bg-stone-100 text-stone-600 hover:bg-stone-200' ?>">
          Belum Dibaca (<?= $unreadCount ?? 0 ?>)
        </a>
        <a href="<?= base_url('admin/pesan?status=read' . ($keyword ? '&q=' . urlencode($keyword) : '')) ?>" 
           class="px-3.5 py-1.5 rounded-xl text-xs font-bold whitespace-nowrap transition-all <?= $status === 'read' ? 'bg-stone-700 text-white shadow-sm' : 'bg-stone-100 text-stone-600 hover:bg-stone-200' ?>">
          Sudah Dibaca
        </a>
      </div>

      <!-- Search Input -->
      <div class="relative w-full sm:w-72">
        <input 
          type="text" 
          name="q" 
          value="<?= esc($keyword ?? '') ?>" 
          placeholder="Cari nama, email, isi pesan..." 
          class="w-full pl-9 pr-8 py-2 rounded-xl bg-stone-50 border border-stone-200 text-xs focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 outline-none">
        <svg class="w-4 h-4 text-stone-400 absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        <?php if (!empty($keyword)): ?>
          <a href="<?= base_url('admin/pesan' . ($status ? '?status=' . urlencode($status) : '')) ?>" class="absolute right-2.5 top-1/2 -translate-y-1/2 text-stone-400 hover:text-stone-600 text-xs font-bold">✕</a>
        <?php endif; ?>
      </div>
    </form>
  </div>

  <!-- Messages Table / List -->
  <div class="liquid-glass-elevated rounded-3xl border border-amber-900/10 overflow-hidden shadow-xl">
    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="border-b border-stone-200/80 bg-stone-50/60 text-[11px] font-mono font-bold uppercase tracking-wider text-stone-600">
            <th class="py-4 px-6 w-12 text-center">Status</th>
            <th class="py-4 px-6">Pengirim</th>
            <th class="py-4 px-6">Pesan / Masukan</th>
            <th class="py-4 px-6">Waktu Masuk</th>
            <th class="py-4 px-6 text-right">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-stone-200/60 text-xs">
          <?php if (!empty($pesanList)): ?>
            <?php foreach ($pesanList as $p): ?>
              <tr class="hover:bg-amber-50/40 transition-colors <?= !$p['is_read'] ? 'bg-amber-50/20 font-semibold' : '' ?>">
                
                <!-- Status Icon / Badge -->
                <td class="py-4 px-6 text-center">
                  <?php if (!$p['is_read']): ?>
                    <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-emerald-100 text-emerald-700 border border-emerald-300" title="Pesan Belum Dibaca">
                      <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-ping"></span>
                    </span>
                  <?php else: ?>
                    <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-stone-100 text-stone-400 border border-stone-200" title="Sudah Dibaca">
                      <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    </span>
                  <?php endif; ?>
                </td>

                <!-- Pengirim (Nama & Email) -->
                <td class="py-4 px-6 whitespace-nowrap">
                  <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl <?= !$p['is_read'] ? 'bg-amber-600 text-white font-black' : 'bg-stone-200 text-stone-700 font-bold' ?> flex items-center justify-center text-xs shadow-sm flex-shrink-0">
                      <?= esc(strtoupper(substr($p['nama_lengkap'] ?: 'P', 0, 2))) ?>
                    </div>
                    <div>
                      <span class="font-extrabold text-stone-900 block <?= !$p['is_read'] ? 'text-stone-900' : 'text-stone-700' ?>">
                        <?= esc($p['nama_lengkap']) ?>
                      </span>
                      <a href="mailto:<?= esc($p['email']) ?>" class="text-[11px] text-amber-800 font-mono hover:underline block truncate max-w-[180px]">
                        <?= esc($p['email']) ?>
                      </a>
                    </div>
                  </div>
                </td>

                <!-- Preview Pesan -->
                <td class="py-4 px-6 max-w-sm">
                  <p class="text-stone-700 line-clamp-2 leading-relaxed text-xs">
                    <?= esc($p['pesan']) ?>
                  </p>
                </td>

                <!-- Tanggal / Waktu -->
                <td class="py-4 px-6 whitespace-nowrap text-stone-500 font-mono text-[11px]">
                  <div class="text-stone-900 font-bold"><?= date('d M Y', strtotime($p['created_at'])) ?></div>
                  <div class="text-[10px] text-stone-400"><?= date('H:i', strtotime($p['created_at'])) ?> WIB</div>
                </td>

                <!-- Aksi -->
                <td class="py-4 px-6 text-right whitespace-nowrap">
                  <div class="inline-flex items-center gap-1.5">
                    <!-- Tombol Buka Detail Modal -->
                    <button 
                      type="button" 
                      class="px-3 py-1.5 rounded-xl bg-amber-100 hover:bg-amber-200 text-amber-900 font-bold text-xs inline-flex items-center gap-1 transition-all"
                      onclick='openMessageModal(<?= json_encode([
                        'id' => $p['id'],
                        'nama_lengkap' => $p['nama_lengkap'],
                        'email' => $p['email'],
                        'pesan' => $p['pesan'],
                        'is_read' => (int) $p['is_read'],
                        'waktu' => date('d F Y, H:i', strtotime($p['created_at'])) . ' WIB',
                        'mark_url' => base_url('admin/pesan/read/' . $p['id']),
                        'delete_url' => base_url('admin/pesan/delete/' . $p['id']),
                      ], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) ?>)'>
                      <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                      <span>Detail</span>
                    </button>

                    <!-- Tombol Toggle Baca -->
                    <a 
                      href="<?= base_url('admin/pesan/read/' . $p['id']) ?>" 
                      class="p-1.5 rounded-xl border border-stone-200 hover:bg-stone-100 text-stone-600 transition-colors"
                      title="<?= $p['is_read'] ? 'Tandai Belum Dibaca' : 'Tandai Sudah Dibaca' ?>">
                      <?php if ($p['is_read']): ?>
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                      <?php else: ?>
                        <svg class="w-3.5 h-3.5 text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                      <?php endif; ?>
                    </a>

                    <!-- Tombol Hapus -->
                    <a 
                      href="<?= base_url('admin/pesan/delete/' . $p['id']) ?>" 
                      onclick="return confirm('Hapus pesan dari <?= esc(addslashes($p['nama_lengkap'])) ?>?')"
                      class="p-1.5 rounded-xl border border-red-200 text-red-600 hover:bg-red-50 transition-colors" 
                      title="Hapus Pesan">
                      <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                    </a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="5" class="py-12 text-center text-stone-500">
                <div class="flex flex-col items-center justify-center gap-2">
                  <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-700 flex items-center justify-center border border-amber-900/10">
                    <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                  </div>
                  <span class="text-sm font-bold text-stone-800">Belum ada pesan masuk</span>
                  <p class="text-xs text-stone-400">Pesan dan masukan dari pengunjung website akan tampil di halaman ini.</p>
                </div>
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <?php if (isset($pager) && $pager): ?>
      <div class="p-4 border-t border-stone-200/80 bg-stone-50/40">
        <?= $pager->links('pesan', 'default_full') ?>
      </div>
    <?php endif; ?>
  </div>

</div>

<!-- MODAL DETAIL PESAN -->
<div id="messageDetailModal" class="fixed inset-0 z-50 hidden bg-stone-900/60 backdrop-blur-sm flex items-center justify-center p-4">
  <div class="liquid-glass-elevated w-full max-w-xl rounded-3xl border border-amber-900/20 bg-white/95 p-6 sm:p-8 shadow-2xl space-y-6 animate-in fade-in zoom-in-95 duration-200">
    
    <div class="flex items-start justify-between border-b border-stone-200 pb-4">
      <div class="flex items-center gap-3">
        <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-amber-700 to-amber-500 text-white flex items-center justify-center font-bold text-base shadow-md" id="modalInitial">
          P
        </div>
        <div>
          <h3 class="text-lg font-extrabold text-stone-900" id="modalNama">Nama Pengirim</h3>
          <p class="text-xs text-stone-500" id="modalWaktu">Waktu Kirim</p>
        </div>
      </div>
      <button type="button" onclick="closeMessageModal()" class="w-8 h-8 rounded-full bg-stone-100 text-stone-500 hover:bg-stone-200 flex items-center justify-center font-bold">
        ✕
      </button>
    </div>

    <!-- Email Box -->
    <div class="p-3.5 rounded-2xl bg-amber-50/80 border border-amber-900/10 flex items-center justify-between">
      <div class="text-xs">
        <span class="text-stone-500 font-mono block text-[10px] uppercase">Alamat Email</span>
        <span class="font-extrabold text-amber-900 font-mono text-xs sm:text-sm" id="modalEmail">email@example.com</span>
      </div>
      <a id="modalReplyBtn" href="mailto:" class="px-3.5 py-1.5 rounded-xl bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs inline-flex items-center gap-1.5 shadow-sm transition-all">
        <span>Balas Email</span>
        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/></svg>
      </a>
    </div>

    <!-- Isi Pesan -->
    <div class="space-y-2">
      <label class="text-xs font-mono font-bold text-stone-500 uppercase tracking-wider block">Isi Pesan / Masukan</label>
      <div class="p-4 rounded-2xl bg-stone-50 border border-stone-200 text-xs sm:text-sm text-stone-800 whitespace-pre-wrap leading-relaxed max-h-60 overflow-y-auto" id="modalPesan">
        Isi pesan di sini...
      </div>
    </div>

    <!-- Footer Modal Actions -->
    <div class="flex items-center justify-between pt-2 border-t border-stone-200">
      <a id="modalDeleteBtn" href="#" onclick="return confirm('Hapus pesan ini secara permanen?')" class="text-xs font-bold text-red-600 hover:text-red-700 hover:underline inline-flex items-center gap-1">
        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/></svg>
        <span>Hapus Pesan</span>
      </a>

      <div class="flex items-center gap-2">
        <a id="modalToggleReadBtn" href="#" class="px-4 py-2 rounded-xl bg-stone-100 hover:bg-stone-200 text-stone-800 text-xs font-bold transition-all">
          Ubah Status
        </a>
        <button type="button" onclick="closeMessageModal()" class="px-5 py-2 rounded-xl bg-amber-600 hover:bg-amber-700 text-white text-xs font-extrabold shadow-sm transition-all">
          Tutup
        </button>
      </div>
    </div>

  </div>
</div>

<script>
function openMessageModal(data) {
  document.getElementById('modalNama').textContent = data.nama_lengkap;
  document.getElementById('modalEmail').textContent = data.email;
  document.getElementById('modalWaktu').textContent = data.waktu;
  document.getElementById('modalPesan').textContent = data.pesan;
  document.getElementById('modalInitial').textContent = (data.nama_lengkap || 'P').substring(0, 2).toUpperCase();
  document.getElementById('modalReplyBtn').href = 'mailto:' + encodeURIComponent(data.email) + '?subject=' + encodeURIComponent('Tanggapan SMK Unggulan: Mengenai Pesan Anda');
  document.getElementById('modalDeleteBtn').href = data.delete_url;
  
  const toggleBtn = document.getElementById('modalToggleReadBtn');
  toggleBtn.href = data.mark_url;
  toggleBtn.textContent = data.is_read ? 'Tandai Belum Dibaca' : 'Tandai Sudah Dibaca';

  document.getElementById('messageDetailModal').classList.remove('hidden');
}

function closeMessageModal() {
  document.getElementById('messageDetailModal').classList.add('hidden');
}

// Close on backdrop click
document.getElementById('messageDetailModal')?.addEventListener('click', function(e) {
  if (e.target === this) {
    closeMessageModal();
  }
});
</script>

<?= $this->endSection() ?>
