<?= $this->extend('admin/layouts/admin_main') ?>

<?= $this->section('admin_content') ?>

<div class="max-w-4xl mx-auto space-y-6">
  
  <!-- Header -->
  <div class="flex items-center justify-between">
    <div>
      <a href="<?= base_url('admin/berita') ?>" class="text-xs font-bold text-stone-500 hover:text-amber-800 transition-colors">
        ← Kembali ke Daftar Berita
      </a>
      <h1 class="text-2xl font-extrabold text-stone-900 tracking-tight mt-1">
        <?= isset($berita) ? 'Edit Berita: ' . esc($berita['judul']) : 'Tulis Berita Baru' ?>
      </h1>
    </div>
  </div>

  <!-- Form Card -->
  <div class="liquid-glass-elevated rounded-3xl p-6 sm:p-8 border border-amber-900/10 shadow-xl">
    <form action="<?= isset($berita) ? base_url('admin/berita/update/' . $berita['id']) : base_url('admin/berita/store') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
      <?= csrf_field() ?>

      <!-- Judul -->
      <div>
        <label for="judul" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Judul Artikel / Berita *</label>
        <input 
          type="text" 
          name="judul" 
          id="judul" 
          value="<?= old('judul', $berita['judul'] ?? '') ?>" 
          required 
          placeholder="Contoh: Siswa RPL Sabet Juara 1 Hackathon Nasional..." 
          class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20 transition-all">
      </div>

      <!-- Grid 3 Kolom: Kategori, Penulis, Tanggal -->
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div>
          <label for="kategori" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Kategori *</label>
          <select 
            name="kategori" 
            id="kategori" 
            required 
            class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20 transition-all">
            <?php 
              $currentKat = old('kategori', $berita['kategori'] ?? 'KARYA SISWA');
              $options = ['KARYA SISWA', 'KERJASAMA INDUSTRI', 'PRESTASI NASIONAL', 'AGENDA SEKOLAH', 'PENGUMUMAN'];
              foreach ($options as $opt):
            ?>
              <option value="<?= $opt ?>" <?= $currentKat === $opt ? 'selected' : '' ?>><?= $opt ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div>
          <label for="penulis" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Penulis / Sumber *</label>
          <input 
            type="text" 
            name="penulis" 
            id="penulis" 
            value="<?= old('penulis', $berita['penulis'] ?? 'Humas Vokasi') ?>" 
            required 
            class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20 transition-all">
        </div>

        <div>
          <label for="tanggal" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Tanggal Publikasi *</label>
          <input 
            type="text" 
            name="tanggal" 
            id="tanggal" 
            value="<?= old('tanggal', $berita['tanggal'] ?? date('d F Y')) ?>" 
            required 
            placeholder="12 Mei 2025" 
            class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20 transition-all">
        </div>
      </div>

      <!-- Ringkasan -->
      <div>
        <label for="ringkasan" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Ringkasan Singkat (Lead Paragraph) *</label>
        <textarea 
          name="ringkasan" 
          id="ringkasan" 
          rows="2" 
          required 
          placeholder="Ringkasan 1-2 kalimat yang tampil di kartu berita..." 
          class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20 transition-all"><?= old('ringkasan', $berita['ringkasan'] ?? '') ?></textarea>
      </div>

      <!-- Konten Lengkap -->
      <div>
        <label for="konten" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Isi Konten Artikel Lengkap *</label>
        <textarea 
          name="konten" 
          id="konten" 
          rows="6" 
          required 
          placeholder="Tuliskan isi artikel selengkapnya di sini..." 
          class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20 transition-all"><?= old('konten', $berita['konten'] ?? '') ?></textarea>
      </div>

      <!-- Upload Foto -->
      <div>
        <label for="foto" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Cover Foto Artikel (Opsional / Max 5MB)</label>
        <input 
          type="file" 
          name="foto" 
          id="foto" 
          accept="image/*" 
          class="w-full text-xs text-stone-600 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-amber-100 file:text-amber-900 hover:file:bg-amber-200 cursor-pointer">

        <?php if (!empty($berita['foto']) && file_exists(FCPATH . 'images/berita/' . $berita['foto'])): ?>
          <div class="mt-3 flex items-center gap-3 p-3 rounded-2xl bg-stone-50 border border-stone-200">
            <img src="<?= base_url('images/berita/' . $berita['foto']) ?>" class="w-16 h-12 rounded-xl object-cover">
            <span class="text-xs text-stone-600">Foto saat ini: <strong><?= esc($berita['foto']) ?></strong> (Upload baru untuk mengganti)</span>
          </div>
        <?php endif; ?>
      </div>

      <!-- Action Buttons -->
      <div class="pt-4 border-t border-stone-200 flex items-center justify-end gap-3">
        <a href="<?= base_url('admin/berita') ?>" class="px-5 py-2.5 rounded-2xl text-xs font-bold text-stone-700 hover:bg-stone-100 transition-colors">
          Batal
        </a>
        <button type="submit" class="btn-amber-gradient px-7 py-3 rounded-2xl text-xs font-extrabold shadow-md">
          <?= isset($berita) ? 'Simpan Perubahan' : 'Publikasikan Berita' ?>
        </button>
      </div>

    </form>
  </div>

</div>

<?= $this->endSection() ?>
