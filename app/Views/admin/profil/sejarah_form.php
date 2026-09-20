<?= $this->extend('admin/layouts/admin_main') ?>

<?= $this->section('admin_content') ?>

<div class="max-w-3xl mx-auto space-y-6">

  <!-- Header -->
  <div class="flex items-center justify-between">
    <div>
      <a href="<?= base_url('admin/profil') ?>" class="text-xs font-bold text-stone-500 hover:text-amber-800 transition-colors">
        ← Kembali ke Profil Sekolah & Sejarah
      </a>
      <h1 class="text-2xl font-extrabold text-stone-900 tracking-tight mt-1">
        <?= $sejarah ? 'Edit Peristiwa Sejarah' : 'Tambah Peristiwa Sejarah Baru' ?>
      </h1>
    </div>
  </div>

  <!-- Form Card -->
  <div class="liquid-glass-elevated rounded-3xl p-6 sm:p-8 border border-amber-900/10 shadow-xl">
    <form action="<?= $sejarah ? base_url('admin/profil/sejarah/update/' . $sejarah['id']) : base_url('admin/profil/sejarah/store') ?>" method="POST" class="space-y-6">
      <?= csrf_field() ?>

      <!-- Tahun, Badge & Urutan -->
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div>
          <label for="tahun" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Tahun *</label>
          <input 
            type="text" 
            name="tahun" 
            id="tahun" 
            value="<?= old('tahun', $sejarah['tahun'] ?? '') ?>" 
            required 
            placeholder="Contoh: 2026" 
            class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm font-mono focus:outline-none focus:border-amber-600 transition-all">
        </div>

        <div>
          <label for="badge_tahun" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Label Badge</label>
          <input 
            type="text" 
            name="badge_tahun" 
            id="badge_tahun" 
            value="<?= old('badge_tahun', $sejarah['badge_tahun'] ?? '') ?>" 
            placeholder="Tahun 2026" 
            class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 transition-all">
        </div>

        <div>
          <label for="urutan" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Nomor Urutan</label>
          <input 
            type="number" 
            name="urutan" 
            id="urutan" 
            value="<?= old('urutan', $sejarah['urutan'] ?? '1') ?>" 
            min="0" 
            class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm font-mono focus:outline-none focus:border-amber-600 transition-all">
        </div>
      </div>

      <!-- Judul Peristiwa -->
      <div>
        <label for="judul" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Judul Milestone / Peristiwa Sejarah *</label>
        <input 
          type="text" 
          name="judul" 
          id="judul" 
          value="<?= old('judul', $sejarah['judul'] ?? '') ?>" 
          required 
          placeholder="Contoh: Peresmian Gedung R&D & Ekspansi Kelas Industri" 
          class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 transition-all">
      </div>

      <!-- Deskripsi -->
      <div>
        <label for="deskripsi" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Uraian / Deskripsi Lengkap Peristiwa *</label>
        <textarea 
          name="deskripsi" 
          id="deskripsi" 
          rows="4" 
          required 
          placeholder="Jelaskan capaian, perintisan, atau tonggak sejarah yang terjadi pada periode ini..." 
          class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm leading-relaxed focus:outline-none focus:border-amber-600 transition-all"><?= old('deskripsi', $sejarah['deskripsi'] ?? '') ?></textarea>
      </div>

      <!-- Color Scheme -->
      <div>
        <label for="color_scheme" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Skema Warna UI</label>
        <select 
          name="color_scheme" 
          id="color_scheme" 
          class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 transition-all">
          <option value="amber" <?= (old('color_scheme', $sejarah['color_scheme'] ?? '') === 'amber') ? 'selected' : '' ?>>Amber (Standar Emas Vokasi)</option>
          <option value="emerald" <?= (old('color_scheme', $sejarah['color_scheme'] ?? '') === 'emerald') ? 'selected' : '' ?>>Emerald (Prestasi / Sukses)</option>
          <option value="orange" <?= (old('color_scheme', $sejarah['color_scheme'] ?? '') === 'orange') ? 'selected' : '' ?>>Orange (Inovasi & Teknologi)</option>
        </select>
      </div>

      <!-- Action Buttons -->
      <div class="pt-4 border-t border-stone-200 flex items-center justify-end gap-3">
        <a href="<?= base_url('admin/profil') ?>" class="px-5 py-2.5 rounded-2xl text-xs font-bold text-stone-700 hover:bg-stone-100 transition-colors">
          Batal
        </a>
        <button type="submit" class="btn-amber-gradient px-7 py-3 rounded-2xl text-xs font-extrabold shadow-md">
          <?= $sejarah ? 'Simpan Perubahan' : 'Tambahkan Peristiwa' ?>
        </button>
      </div>

    </form>
  </div>

</div>

<?= $this->endSection() ?>
