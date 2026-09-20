<?= $this->extend('admin/layouts/admin_main') ?>

<?= $this->section('admin_content') ?>

<div class="space-y-6">
  
  <!-- Header & Actions -->
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
      <h1 class="text-2xl font-extrabold text-stone-900 tracking-tight">Manajemen Galeri & Fasilitas</h1>
      <p class="text-xs text-stone-500">Kelola foto laboratorium, sarana komputasi, dan infrastruktur modern sekolah.</p>
    </div>
    <a href="<?= base_url('admin/galeri/create') ?>" class="btn-amber-gradient px-5 py-2.5 rounded-2xl text-xs font-bold inline-flex items-center gap-2 self-start sm:self-auto shadow-md">
      <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
      <span>Tambah Foto Galeri</span>
    </a>
  </div>

  <!-- Gallery Grid Cards -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php if (!empty($galeriList)): ?>
      <?php foreach ($galeriList as $g): ?>
        <div class="liquid-glass-elevated rounded-3xl overflow-hidden border border-amber-900/10 flex flex-col justify-between shadow-lg group">
          
          <div>
            <!-- Photo Thumbnail -->
            <div class="relative w-full h-44 bg-stone-100 overflow-hidden">
              <?php if (!empty($g['foto']) && file_exists(FCPATH . 'images/galeri/' . $g['foto'])): ?>
                <img src="<?= base_url('images/galeri/' . $g['foto']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
              <?php else: ?>
                <div class="w-full h-full flex flex-col items-center justify-center p-4 bg-amber-50 text-amber-800">
                  <svg class="w-8 h-8 opacity-40 mb-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                  <span class="text-[10px] font-mono text-stone-500"><?= esc($g['foto'] ?? 'Belum ada foto') ?></span>
                </div>
              <?php endif; ?>

              <div class="absolute top-3 left-3">
                <span class="px-2.5 py-1 rounded-full text-[10px] font-mono font-bold uppercase bg-white/90 backdrop-blur-md text-amber-900 border border-amber-900/10 shadow-sm">
                  <?= esc($g['kategori']) ?>
                </span>
              </div>
            </div>

            <!-- Content Info -->
            <div class="p-5">
              <h3 class="font-extrabold text-stone-900 text-sm mb-1.5"><?= esc($g['judul']) ?></h3>
              <p class="text-stone-600 text-xs line-clamp-2 leading-relaxed"><?= esc($g['deskripsi']) ?></p>
            </div>
          </div>

          <!-- Actions -->
          <div class="p-4 bg-stone-50/80 border-t border-stone-200/80 flex items-center justify-between">
            <span class="text-[11px] font-mono text-stone-500">ID: #<?= $g['id'] ?></span>
            <div class="flex items-center gap-2">
              <a href="<?= base_url('admin/galeri/edit/' . $g['id']) ?>" class="px-3 py-1 rounded-xl text-xs font-bold bg-white text-stone-700 border border-stone-200 hover:border-amber-600 transition-colors">
                Edit
              </a>
              <a href="<?= base_url('admin/galeri/delete/' . $g['id']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus foto galeri ini?')" class="px-3 py-1 rounded-xl text-xs font-bold bg-red-50 text-red-700 hover:bg-red-100 transition-colors">
                Hapus
              </a>
            </div>
          </div>

        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="col-span-3 py-12 text-center text-stone-500">
        Belum ada foto galeri fasilitas. Klik "Tambah Foto Galeri" untuk mengunggah.
      </div>
    <?php endif; ?>
  </div>

</div>

<?= $this->endSection() ?>
