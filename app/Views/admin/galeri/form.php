<?= $this->extend('admin/layouts/admin_main') ?>

<?= $this->section('admin_content') ?>

<div class="max-w-3xl mx-auto space-y-6">
  
  <!-- Header -->
  <div class="flex items-center justify-between">
    <div>
      <a href="<?= base_url('admin/galeri') ?>" class="text-xs font-bold text-stone-500 hover:text-amber-800 transition-colors">
        ← Kembali ke Daftar Galeri
      </a>
      <h1 class="text-2xl font-extrabold text-stone-900 tracking-tight mt-1">
        <?= isset($galeri) ? 'Edit Foto Fasilitas: ' . esc($galeri['judul']) : 'Tambah Foto Fasilitas Baru' ?>
      </h1>
    </div>
  </div>

  <!-- Form Card -->
  <div class="liquid-glass-elevated rounded-3xl p-6 sm:p-8 border border-amber-900/10 shadow-xl">
    <form action="<?= isset($galeri) ? base_url('admin/galeri/update/' . $galeri['id']) : base_url('admin/galeri/store') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
      <?= csrf_field() ?>

      <!-- Judul Fasilitas -->
      <div>
        <label for="judul" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Nama Fasilitas / Ruang Lab *</label>
        <input 
          type="text" 
          name="judul" 
          id="judul" 
          value="<?= old('judul', $galeri['judul'] ?? '') ?>" 
          required 
          placeholder="Contoh: Lab Apple iMac & 3D Render Farm..." 
          class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20 transition-all">
      </div>

      <!-- Kategori & Icon -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label for="kategori" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Kategori Fasilitas *</label>
          <input 
            type="text" 
            name="kategori" 
            id="kategori" 
            value="<?= old('kategori', $galeri['kategori'] ?? 'FASILITAS RPL') ?>" 
            required 
            placeholder="FASILITAS RPL / FASILITAS DKV / KAMPUS" 
            class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20 transition-all">
        </div>

        <div>
          <label for="icon" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Ikon Representatif</label>
          <select 
            name="icon" 
            id="icon" 
            class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20 transition-all">
            <?php 
              $currentIcon = old('icon', $galeri['icon'] ?? 'monitor');
              $icons = ['monitor' => 'Monitor / Komputer iMac', 'server' => 'Server & Network Pod', 'cpu' => 'CPU & AI Lab', 'landmark' => 'Bank & FinTech', 'book-open' => 'Perpustakaan', 'sparkles' => 'Auditorium & Panggung'];
              foreach ($icons as $val => $label):
            ?>
              <option value="<?= $val ?>" <?= $currentIcon === $val ? 'selected' : '' ?>><?= $label ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <!-- Deskripsi -->
      <div>
        <label for="deskripsi" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Deskripsi Spesifikasi & Fasilitas *</label>
        <textarea 
          name="deskripsi" 
          id="deskripsi" 
          rows="3" 
          required 
          placeholder="Tuliskan spesifikasi unit, software berlisensi, atau kapasitas ruang lab..." 
          class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20 transition-all"><?= old('deskripsi', $galeri['deskripsi'] ?? '') ?></textarea>
      </div>

      <!-- Upload Foto -->
      <div>
        <label for="foto" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Upload Foto Fasilitas <?= isset($galeri) ? '(Opsional jika tidak diganti)' : '*' ?></label>
        <input 
          type="file" 
          name="foto" 
          id="foto" 
          accept="image/*" 
          <?= isset($galeri) ? '' : 'required' ?>
          class="w-full text-xs text-stone-600 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-amber-100 file:text-amber-900 hover:file:bg-amber-200 cursor-pointer">

        <?php if (!empty($galeri['foto']) && file_exists(FCPATH . 'images/galeri/' . $galeri['foto'])): ?>
          <div class="mt-3 flex items-center gap-3 p-3 rounded-2xl bg-stone-50 border border-stone-200">
            <img src="<?= base_url('images/galeri/' . $galeri['foto']) ?>" class="w-16 h-12 rounded-xl object-cover">
            <span class="text-xs text-stone-600">Foto saat ini: <strong><?= esc($galeri['foto']) ?></strong></span>
          </div>
        <?php endif; ?>
      </div>

      <!-- Action Buttons -->
      <div class="pt-4 border-t border-stone-200 flex items-center justify-end gap-3">
        <a href="<?= base_url('admin/galeri') ?>" class="px-5 py-2.5 rounded-2xl text-xs font-bold text-stone-700 hover:bg-stone-100 transition-colors">
          Batal
        </a>
        <button type="submit" class="btn-amber-gradient px-7 py-3 rounded-2xl text-xs font-extrabold shadow-md">
          <?= isset($galeri) ? 'Simpan Perubahan' : 'Upload & Simpan Foto' ?>
        </button>
      </div>

    </form>
  </div>

</div>

<?= $this->endSection() ?>
