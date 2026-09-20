<?= $this->extend('admin/layouts/admin_main') ?>

<?= $this->section('admin_content') ?>

<div class="space-y-6">
  
  <!-- Header & Actions -->
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
      <h1 class="text-2xl font-extrabold text-stone-900 tracking-tight">Manajemen Berita & Artikel</h1>
      <p class="text-xs text-stone-500">Kelola artikel kegiatan, karya inovasi siswa, dan rilis pers sekolah.</p>
    </div>
    <a href="<?= base_url('admin/berita/create') ?>" class="btn-amber-gradient px-5 py-2.5 rounded-2xl text-xs font-bold inline-flex items-center gap-2 self-start sm:self-auto shadow-md">
      <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
      <span>Tulis Berita Baru</span>
    </a>
  </div>

  <!-- News Table -->
  <div class="liquid-glass-elevated rounded-3xl border border-amber-900/10 overflow-hidden shadow-xl">
    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="border-b border-stone-200/80 bg-stone-50/60 text-[11px] font-mono font-bold uppercase tracking-wider text-stone-600">
            <th class="py-4 px-6">Foto</th>
            <th class="py-4 px-6">Judul & Ringkasan</th>
            <th class="py-4 px-6">Kategori</th>
            <th class="py-4 px-6">Penulis / Tanggal</th>
            <th class="py-4 px-6 text-right">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-stone-200/60 text-xs">
          <?php if (!empty($beritaList)): ?>
            <?php foreach ($beritaList as $b): ?>
              <tr class="hover:bg-amber-50/30 transition-colors">
                <!-- Foto Thumbnail -->
                <td class="py-4 px-6 w-24">
                  <div class="w-16 h-12 rounded-xl bg-stone-100 overflow-hidden flex items-center justify-center border border-stone-200">
                    <?php if (!empty($b['foto']) && file_exists(FCPATH . 'images/berita/' . $b['foto'])): ?>
                      <img src="<?= base_url('images/berita/' . $b['foto']) ?>" class="w-full h-full object-cover">
                    <?php else: ?>
                      <svg class="w-5 h-5 text-stone-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                    <?php endif; ?>
                  </div>
                </td>

                <!-- Judul & Ringkasan -->
                <td class="py-4 px-6 max-w-xs">
                  <h4 class="font-extrabold text-stone-900 text-sm mb-1 leading-snug"><?= esc($b['judul']) ?></h4>
                  <p class="text-stone-500 line-clamp-2 leading-relaxed text-[11px]"><?= esc($b['ringkasan']) ?></p>
                </td>

                <!-- Kategori Badge -->
                <td class="py-4 px-6 whitespace-nowrap">
                  <span class="px-2.5 py-1 rounded-full text-[10px] font-mono font-bold uppercase bg-amber-100 text-amber-900 border border-amber-300">
                    <?= esc($b['kategori']) ?>
                  </span>
                </td>

                <!-- Meta -->
                <td class="py-4 px-6 whitespace-nowrap">
                  <span class="font-bold text-stone-900 block"><?= esc($b['penulis']) ?></span>
                  <span class="text-stone-500 text-[11px] font-mono"><?= esc($b['tanggal']) ?></span>
                </td>

                <!-- Aksi (Edit / Hapus) -->
                <td class="py-4 px-6 text-right whitespace-nowrap">
                  <div class="flex items-center justify-end gap-2">
                    <a href="<?= base_url('admin/berita/edit/' . $b['id']) ?>" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-white text-stone-700 border border-stone-200 hover:border-amber-600 hover:text-amber-800 transition-colors">
                      Edit
                    </a>
                    <a href="<?= base_url('admin/berita/delete/' . $b['id']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-red-50 text-red-700 hover:bg-red-100 transition-colors">
                      Hapus
                    </a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="5" class="py-8 text-center text-stone-500">
                Belum ada berita tersimpan. Silakan klik tombol "Tulis Berita Baru".
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>

<?= $this->endSection() ?>
