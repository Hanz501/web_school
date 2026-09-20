<?= $this->extend('admin/layouts/admin_main') ?>

<?= $this->section('admin_content') ?>

<div class="max-w-3xl mx-auto space-y-6">

  <!-- Header -->
  <div class="flex items-center justify-between">
    <div>
      <a href="<?= base_url('admin/struktur') ?>" class="text-xs font-bold text-stone-500 hover:text-amber-800 transition-colors">
        ← Kembali ke Bagan Struktur Organisasi
      </a>
      <h1 class="text-2xl font-extrabold text-stone-900 tracking-tight mt-1">
        <?= $struktur ? 'Edit Anggota Struktur: ' . esc($struktur['nama']) : 'Tambah Anggota Struktur Baru' ?>
      </h1>
    </div>
  </div>

  <!-- Form Card -->
  <div class="liquid-glass-elevated rounded-3xl p-6 sm:p-8 border border-amber-900/10 shadow-xl">
    <form action="<?= $struktur ? base_url('admin/struktur/update/' . $struktur['id']) : base_url('admin/struktur/store') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
      <?= csrf_field() ?>

      <!-- Nama & Jabatan -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label for="nama" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Nama Lengkap & Gelar *</label>
          <input 
            type="text" 
            name="nama" 
            id="nama" 
            value="<?= old('nama', $struktur['nama'] ?? '') ?>" 
            required 
            placeholder="Contoh: Dr. H. Hendra Wijaya, M.Kom., IPM." 
            class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 transition-all">
        </div>

        <div>
          <label for="jabatan" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Jabatan Resmi *</label>
          <input 
            type="text" 
            name="jabatan" 
            id="jabatan" 
            value="<?= old('jabatan', $struktur['jabatan'] ?? '') ?>" 
            required 
            placeholder="Contoh: Kepala Sekolah / Waka Kurikulum" 
            class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 transition-all">
        </div>
      </div>

      <!-- Level Hierarki & Badge Label -->
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div>
          <label for="level" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Level Hierarki Bagan *</label>
          <select 
            name="level" 
            id="level" 
            required 
            class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 transition-all">
            <option value="kepala_sekolah" <?= (old('level', $struktur['level'] ?? '') === 'kepala_sekolah') ? 'selected' : '' ?>>Level 1 - Kepala Sekolah (Puncak)</option>
            <option value="komite" <?= (old('level', $struktur['level'] ?? '') === 'komite') ? 'selected' : '' ?>>Level 1.5 - Komite Sekolah (Sayap Kiri)</option>
            <option value="tata_usaha" <?= (old('level', $struktur['level'] ?? '') === 'tata_usaha') ? 'selected' : '' ?>>Level 1.5 - Kepala Tata Usaha (Sayap Kanan)</option>
            <option value="waka" <?= (old('level', $struktur['level'] ?? 'waka') === 'waka') ? 'selected' : '' ?>>Level 2 - Wakil Kepala Sekolah (Waka)</option>
            <option value="kaprodi" <?= (old('level', $struktur['level'] ?? '') === 'kaprodi') ? 'selected' : '' ?>>Level 3 - Kepala Program Keahlian (Kaprodi)</option>
            <option value="lainnya" <?= (old('level', $struktur['level'] ?? '') === 'lainnya') ? 'selected' : '' ?>>Lainnya / Staf Khusus</option>
          </select>
        </div>

        <div>
          <label for="badge_label" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Label Badge / Tingkat</label>
          <input 
            type="text" 
            name="badge_label" 
            id="badge_label" 
            value="<?= old('badge_label', $struktur['badge_label'] ?? '') ?>" 
            placeholder="Pimpinan Puncak / Waka 1 / Kaprodi" 
            class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 transition-all">
        </div>

        <div>
          <label for="urutan" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Nomor Urutan Tampil</label>
          <input 
            type="number" 
            name="urutan" 
            id="urutan" 
            value="<?= old('urutan', $struktur['urutan'] ?? '1') ?>" 
            min="0" 
            class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm font-mono focus:outline-none focus:border-amber-600 transition-all">
        </div>
      </div>

      <!-- Tugas / Sub-Jabatan -->
      <div>
        <label for="sub_jabatan" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Bidang Tanggung Jawab / Tugas Khusus</label>
        <input 
          type="text" 
          name="sub_jabatan" 
          id="sub_jabatan" 
          value="<?= old('sub_jabatan', $struktur['sub_jabatan'] ?? '') ?>" 
          placeholder="Contoh: Kurikulum Merdeka & Standar Industri" 
          class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 transition-all">
      </div>

      <!-- Icon & Foto Upload -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 p-4 rounded-2xl bg-amber-50/60 border border-amber-900/10">
        <div>
          <label for="icon" class="block text-xs font-bold text-amber-950 uppercase tracking-wider mb-2">Ikon Emoji Default</label>
          <input 
            type="text" 
            name="icon" 
            id="icon" 
            value="<?= old('icon', $struktur['icon'] ?? '👨‍💼') ?>" 
            placeholder="👨‍💼 / 📚 / 🎖️ / 🤝 / 🏗️ / 💻 / 🌐 / 🎨 / 📊" 
            class="w-full px-4 py-2.5 rounded-xl bg-white border border-amber-300 text-stone-900 text-sm focus:outline-none focus:border-amber-600 transition-all">
        </div>

        <div>
          <label for="foto" class="block text-xs font-bold text-amber-950 uppercase tracking-wider mb-2">Upload Foto Profil (Opsional)</label>
          <input 
            type="file" 
            name="foto" 
            id="foto" 
            accept="image/*" 
            class="w-full text-xs text-stone-700 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-amber-600 file:text-white hover:file:bg-amber-700 cursor-pointer">
          <?php if (!empty($struktur['foto'])): ?>
            <span class="text-[10px] text-stone-500 block mt-1">Foto saat ini: <?= esc($struktur['foto']) ?></span>
          <?php endif; ?>
        </div>
      </div>

      <!-- Action Buttons -->
      <div class="pt-4 border-t border-stone-200 flex items-center justify-end gap-3">
        <a href="<?= base_url('admin/struktur') ?>" class="px-5 py-2.5 rounded-2xl text-xs font-bold text-stone-700 hover:bg-stone-100 transition-colors">
          Batal
        </a>
        <button type="submit" class="btn-amber-gradient px-7 py-3 rounded-2xl text-xs font-extrabold shadow-md">
          <?= $struktur ? 'Simpan Perubahan' : 'Tambahkan Anggota' ?>
        </button>
      </div>

    </form>
  </div>

</div>

<?= $this->endSection() ?>
