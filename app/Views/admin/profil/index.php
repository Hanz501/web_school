<?= $this->extend('admin/layouts/admin_main') ?>

<?= $this->section('admin_content') ?>

<div class="space-y-8">

  <!-- Page Header -->
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
      <h1 class="text-2xl sm:text-3xl font-extrabold text-stone-900 tracking-tight">
        Kelola Profil & Visi Misi Sekolah
      </h1>
      <p class="text-xs sm:text-sm text-stone-500 mt-1">
        Atur identitas lembaga, visi misi, 5 pilar budaya mutu PRIDE, dan linimasa sejarah sekolah.
      </p>
    </div>

    <div class="flex items-center gap-2">
      <a href="<?= base_url('admin/profil/sejarah/create') ?>" class="btn-amber-gradient px-4 py-2.5 rounded-2xl text-xs font-extrabold inline-flex items-center gap-2 shadow-md">
        <span>+ Tambah Peristiwa Sejarah</span>
      </a>
    </div>
  </div>

  <!-- Form 1: Pengaturan Profil, Visi, Misi & Nilai Budaya -->
  <div class="liquid-glass-elevated rounded-3xl p-6 sm:p-8 border border-amber-900/10 shadow-xl space-y-6">
    <div class="border-b border-stone-200/80 pb-4">
      <span class="px-3 py-1 rounded-full text-xs font-mono font-bold bg-amber-100 text-amber-900 uppercase">MODUL 1</span>
      <h2 class="text-lg font-extrabold text-stone-900 mt-2">Identitas Lembaga, Visi & Misi</h2>
    </div>

    <form action="<?= base_url('admin/profil/update') ?>" method="POST" class="space-y-6">
      <?= csrf_field() ?>

      <!-- Baris 1: Nama Sekolah, NPSN, Akreditasi, Tahun Berdiri -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div>
          <label for="nama_sekolah" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Nama Sekolah *</label>
          <input 
            type="text" 
            name="nama_sekolah" 
            id="nama_sekolah" 
            value="<?= old('nama_sekolah', $profil['nama_sekolah'] ?? '') ?>" 
            required 
            class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 transition-all">
        </div>

        <div>
          <label for="npsn" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">NPSN *</label>
          <input 
            type="text" 
            name="npsn" 
            id="npsn" 
            value="<?= old('npsn', $profil['npsn'] ?? '') ?>" 
            required 
            class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm font-mono focus:outline-none focus:border-amber-600 transition-all">
        </div>

        <div>
          <label for="akreditasi" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Status Akreditasi *</label>
          <input 
            type="text" 
            name="akreditasi" 
            id="akreditasi" 
            value="<?= old('akreditasi', $profil['akreditasi'] ?? '') ?>" 
            required 
            class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 transition-all">
        </div>

        <div>
          <label for="tahun_berdiri" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Tahun Berdiri *</label>
          <input 
            type="text" 
            name="tahun_berdiri" 
            id="tahun_berdiri" 
            value="<?= old('tahun_berdiri', $profil['tahun_berdiri'] ?? '') ?>" 
            required 
            class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm font-mono focus:outline-none focus:border-amber-600 transition-all">
        </div>
      </div>

      <!-- Ringkasan Sejarah Singkat (Pengantar) -->
      <div>
        <label for="ringkasan_sejarah" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Ringkasan Pengantar Sejarah Sekolah *</label>
        <textarea 
          name="ringkasan_sejarah" 
          id="ringkasan_sejarah" 
          rows="3" 
          required 
          class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 transition-all"><?= old('ringkasan_sejarah', $profil['ringkasan_sejarah'] ?? '') ?></textarea>
      </div>

      <!-- Visi Sekolah -->
      <div>
        <label for="visi" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">Visi Utama Sekolah *</label>
        <textarea 
          name="visi" 
          id="visi" 
          rows="3" 
          required 
          class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 transition-all"><?= old('visi', $profil['visi'] ?? '') ?></textarea>
      </div>

      <!-- Misi Strategis (Newline-separated) -->
      <div>
        <label for="misi" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-1">Daftar Misi Strategis Vokasi *</label>
        <span class="text-[11px] text-stone-500 block mb-2">Pisahkan setiap poin misi dengan baris baru (Enter)</span>
        <textarea 
          name="misi" 
          id="misi" 
          rows="5" 
          required 
          class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm leading-relaxed focus:outline-none focus:border-amber-600 transition-all"><?= old('misi', $profil['misi_text'] ?? '') ?></textarea>
      </div>

      <!-- 5 Pilar Nilai Budaya (PRIDE) -->
      <div class="p-5 rounded-2xl bg-amber-50/60 border border-amber-900/10 space-y-4">
        <div>
          <h3 class="text-xs font-mono font-bold text-amber-950 uppercase tracking-wider">5 Pilar Nilai Budaya (PRIDE / Core Values)</h3>
          <p class="text-[11px] text-stone-500">Ikon emoji, label nilai, dan sub-keterangan singkat yang tampil pada tab profil.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-5 gap-3">
          <?php 
            $nilaiBudaya = $profil['nilai_budaya'] ?? [];
            for ($i = 0; $i < 5; $i++): 
              $nb = $nilaiBudaya[$i] ?? ['icon' => '💎', 'label' => '', 'sub' => ''];
          ?>
            <div class="p-3 rounded-xl bg-white border border-stone-200 space-y-2">
              <div class="flex items-center gap-2">
                <input 
                  type="text" 
                  name="nilai_icon[]" 
                  value="<?= esc($nb['icon']) ?>" 
                  class="w-10 text-center px-2 py-1.5 rounded-lg border border-stone-200 text-sm focus:outline-none focus:border-amber-600" 
                  title="Emoji Icon">
                <input 
                  type="text" 
                  name="nilai_label[]" 
                  value="<?= esc($nb['label']) ?>" 
                  placeholder="Label Nilai" 
                  class="w-full px-2 py-1.5 rounded-lg border border-stone-200 text-xs font-bold focus:outline-none focus:border-amber-600">
              </div>
              <input 
                type="text" 
                name="nilai_sub[]" 
                value="<?= esc($nb['sub']) ?>" 
                placeholder="Deskripsi singkat" 
                class="w-full px-2 py-1 rounded-lg border border-stone-200 text-[11px] text-stone-600 focus:outline-none focus:border-amber-600">
            </div>
          <?php endfor; ?>
        </div>
      </div>

      <!-- Action Button -->
      <div class="pt-2 flex justify-end">
        <button type="submit" class="btn-amber-gradient px-8 py-3.5 rounded-2xl text-xs font-extrabold shadow-md">
          Simpan Pembaruan Profil & Visi Misi
        </button>
      </div>

    </form>
  </div>

  <!-- Form 2: Tabel Linimasa Sejarah & Milestone -->
  <div class="liquid-glass-elevated rounded-3xl p-6 sm:p-8 border border-amber-900/10 shadow-xl space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-stone-200/80 pb-4">
      <div>
        <span class="px-3 py-1 rounded-full text-xs font-mono font-bold bg-amber-100 text-amber-900 uppercase">MODUL 2</span>
        <h2 class="text-lg font-extrabold text-stone-900 mt-2">Linimasa & Peristiwa Sejarah Sekolah</h2>
      </div>

      <a href="<?= base_url('admin/profil/sejarah/create') ?>" class="px-4 py-2 rounded-xl text-xs font-bold bg-white text-stone-800 border border-stone-200 hover:border-amber-600 transition-colors shadow-sm self-start sm:self-auto">
        + Tambah Peristiwa
      </a>
    </div>

    <!-- Table Linimasa -->
    <div class="overflow-x-auto">
      <table class="w-full text-left text-xs text-stone-700">
        <thead class="bg-stone-100 text-stone-900 uppercase font-mono text-[10px]">
          <tr>
            <th class="p-3.5 rounded-l-xl">Urutan</th>
            <th class="p-3.5">Tahun</th>
            <th class="p-3.5">Judul Peristiwa</th>
            <th class="p-3.5">Deskripsi Perjalanan</th>
            <th class="p-3.5">Warna Badge</th>
            <th class="p-3.5 rounded-r-xl text-right">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-stone-200/60">
          <?php if (!empty($sejarahList)): ?>
            <?php foreach ($sejarahList as $s): ?>
              <tr class="hover:bg-amber-50/50 transition-colors">
                <td class="p-3.5 font-mono font-bold text-amber-800"><?= esc($s['urutan']) ?></td>
                <td class="p-3.5">
                  <span class="px-2 py-0.5 rounded text-[11px] font-mono font-bold bg-amber-100 text-amber-900">
                    <?= esc($s['badge_tahun']) ?>
                  </span>
                </td>
                <td class="p-3.5 font-bold text-stone-900"><?= esc($s['judul']) ?></td>
                <td class="p-3.5 text-stone-600 max-w-xs truncate"><?= esc($s['deskripsi']) ?></td>
                <td class="p-3.5 font-mono text-[11px]"><?= esc($s['color_scheme']) ?></td>
                <td class="p-3.5 text-right space-x-2 whitespace-nowrap">
                  <a href="<?= base_url('admin/profil/sejarah/edit/' . $s['id']) ?>" class="px-3 py-1 rounded-lg text-xs font-bold bg-white text-stone-700 border border-stone-200 hover:border-amber-600 transition-colors">
                    Edit
                  </a>
                  <a href="<?= base_url('admin/profil/sejarah/delete/' . $s['id']) ?>" onclick="return confirm('Yakin ingin menghapus peristiwa sejarah ini?')" class="px-3 py-1 rounded-lg text-xs font-bold bg-red-50 text-red-600 border border-red-200 hover:bg-red-100 transition-colors">
                    Hapus
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="6" class="p-6 text-center text-stone-500">Belum ada peristiwa sejarah yang dicatat.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

  </div>

</div>

<?= $this->endSection() ?>
