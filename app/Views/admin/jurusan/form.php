<?= $this->extend('admin/layouts/admin_main') ?>

<?= $this->section('admin_content') ?>

<div class="max-w-4xl mx-auto space-y-6">
  
  <!-- Header -->
  <div class="flex items-center justify-between">
    <div>
      <a href="<?= base_url('admin/jurusan') ?>" class="text-xs font-bold text-stone-500 hover:text-amber-800 transition-colors">
        ← Kembali ke Daftar Jurusan
      </a>
      <h1 class="text-2xl font-extrabold text-stone-900 tracking-tight mt-1">
        Edit Jurusan: <?= esc($jurusan['nama']) ?> (<?= esc($jurusan['kode']) ?>)
      </h1>
    </div>
  </div>

  <!-- Form Card -->
  <div class="liquid-glass-elevated rounded-3xl p-6 sm:p-8 border border-amber-900/10 shadow-xl">
    <form action="<?= base_url('admin/jurusan/update/' . $jurusan['id']) ?>" method="POST" class="space-y-6">
      <?= csrf_field() ?>

      <!-- Nama & Kategori -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label for="nama" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Nama Lengkap Jurusan *</label>
          <input 
            type="text" 
            name="nama" 
            id="nama" 
            value="<?= old('nama', $jurusan['nama']) ?>" 
            required 
            class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20 transition-all">
        </div>

        <div>
          <label for="kategori" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Kategori Bidang Keahlian *</label>
          <input 
            type="text" 
            name="kategori" 
            id="kategori" 
            value="<?= old('kategori', $jurusan['kategori']) ?>" 
            required 
            class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20 transition-all">
        </div>
      </div>

      <!-- Kuota & Status PPDB -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 p-4 rounded-2xl bg-amber-50/60 border border-amber-900/10">
        <div>
          <label for="kuota" class="block text-xs font-bold text-amber-950 uppercase tracking-wider mb-2">Total Kuota Daya Tampung (Siswa) *</label>
          <input 
            type="number" 
            name="kuota" 
            id="kuota" 
            value="<?= old('kuota', $jurusan['kuota']) ?>" 
            required 
            min="1" 
            class="w-full px-4 py-2.5 rounded-xl bg-white border border-amber-300 text-stone-900 text-sm font-mono font-bold focus:outline-none focus:border-amber-600 transition-all">
        </div>

        <div>
          <label for="terisi" class="block text-xs font-bold text-amber-950 uppercase tracking-wider mb-2">Jumlah Kursi Terisi / Diterima (Siswa) *</label>
          <input 
            type="number" 
            name="terisi" 
            id="terisi" 
            value="<?= old('terisi', $jurusan['terisi']) ?>" 
            required 
            min="0" 
            class="w-full px-4 py-2.5 rounded-xl bg-white border border-amber-300 text-stone-900 text-sm font-mono font-bold focus:outline-none focus:border-amber-600 transition-all">
        </div>
      </div>

      <!-- Tagline & Deskripsi -->
      <div>
        <label for="tagline" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Tagline Program</label>
        <input 
          type="text" 
          name="tagline" 
          id="tagline" 
          value="<?= old('tagline', $jurusan['tagline']) ?>" 
          placeholder="Architecting Next-Gen Intelligent Digital Systems" 
          class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 transition-all">
      </div>

      <div>
        <label for="deskripsi" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Deskripsi Lengkap Keahlian *</label>
        <textarea 
          name="deskripsi" 
          id="deskripsi" 
          rows="3" 
          required 
          class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 transition-all"><?= old('deskripsi', $jurusan['deskripsi']) ?></textarea>
      </div>

      <!-- Grid 2 Kolom: Kompetensi (Newline separated) & Karir -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label for="kompetensi" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-1">Daftar Kompetensi Inti</label>
          <span class="text-[11px] text-stone-500 block mb-2">Pisahkan setiap kompetensi dengan baris baru (Enter)</span>
          <textarea 
            name="kompetensi" 
            id="kompetensi" 
            rows="5" 
            class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-xs font-mono leading-relaxed focus:outline-none focus:border-amber-600 transition-all"><?= old('kompetensi', $jurusan['kompetensi_text'] ?? '') ?></textarea>
        </div>

        <div>
          <label for="karir" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-1">Daftar Peluang Karir / Profesi</label>
          <span class="text-[11px] text-stone-500 block mb-2">Pisahkan setiap profesi dengan baris baru (Enter)</span>
          <textarea 
            name="karir" 
            id="karir" 
            rows="5" 
            class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-xs font-mono leading-relaxed focus:outline-none focus:border-amber-600 transition-all"><?= old('karir', $jurusan['karir_text'] ?? '') ?></textarea>
        </div>
      </div>

      <!-- Sertifikasi, TEFA & Mitra -->
      <div>
        <label for="sertifikasi" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Sertifikasi Industri Resmi</label>
        <input 
          type="text" 
          name="sertifikasi" 
          id="sertifikasi" 
          value="<?= old('sertifikasi', $jurusan['sertifikasi']) ?>" 
          class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 transition-all">
      </div>

      <div>
        <label for="tefa" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Teaching Factory (TEFA)</label>
        <input 
          type="text" 
          name="tefa" 
          id="tefa" 
          value="<?= old('tefa', $jurusan['tefa']) ?>" 
          class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 transition-all">
      </div>

      <div>
        <label for="mitra" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-1">Mitra Industri Strategis</label>
        <span class="text-[11px] text-stone-500 block mb-2">Pisahkan setiap nama perusahaan dengan baris baru (Enter)</span>
        <textarea 
          name="mitra" 
          id="mitra" 
          rows="3" 
          class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-xs font-mono leading-relaxed focus:outline-none focus:border-amber-600 transition-all"><?= old('mitra', $jurusan['mitra_text'] ?? '') ?></textarea>
      </div>

      <!-- Action Buttons -->
      <div class="pt-4 border-t border-stone-200 flex items-center justify-end gap-3">
        <a href="<?= base_url('admin/jurusan') ?>" class="px-5 py-2.5 rounded-2xl text-xs font-bold text-stone-700 hover:bg-stone-100 transition-colors">
          Batal
        </a>
        <button type="submit" class="btn-amber-gradient px-7 py-3 rounded-2xl text-xs font-extrabold shadow-md">
          Simpan Pembaruan Jurusan
        </button>
      </div>

    </form>
  </div>

</div>

<?= $this->endSection() ?>
