<?= $this->extend('admin/layouts/admin_main') ?>

<?= $this->section('admin_content') ?>

<div class="space-y-8">

  <!-- Header -->
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
      <h1 class="text-2xl sm:text-3xl font-extrabold text-stone-900 tracking-tight">
        Manajemen Bagan Struktur Organisasi
      </h1>
      <p class="text-xs sm:text-sm text-stone-500 mt-1">
        Kelola hierarki kepemimpinan, komite sekolah, waka, dan kepala program keahlian (kaprodi).
      </p>
    </div>

    <div class="flex items-center gap-2">
      <a href="<?= base_url('admin/struktur/create') ?>" class="btn-amber-gradient px-4 py-2.5 rounded-2xl text-xs font-extrabold inline-flex items-center gap-2 shadow-md">
        <span>+ Tambah Anggota Pimpinan</span>
      </a>
    </div>
  </div>

  <!-- Visual Hierarchy Preview Cards -->
  <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
    <!-- Level 1: Kepala Sekolah -->
    <div class="p-5 rounded-2xl bg-amber-500/10 border border-amber-900/15 shadow-sm">
      <span class="px-2.5 py-0.5 rounded-full text-[10px] font-mono font-bold uppercase bg-[#B45309] text-white">LEVEL 1: PUNCAK</span>
      <h3 class="text-xs font-bold text-stone-900 mt-2 mb-1">Kepala Sekolah</h3>
      <?php if (!empty($grouped['kepala_sekolah'])): ?>
        <p class="text-xs font-extrabold text-amber-950 truncate"><?= esc($grouped['kepala_sekolah']['nama']) ?></p>
        <span class="text-[11px] text-stone-600 block mt-0.5 truncate"><?= esc($grouped['kepala_sekolah']['sub_jabatan']) ?></span>
      <?php else: ?>
        <p class="text-xs text-stone-500 italic">Belum diatur</p>
      <?php endif; ?>
    </div>

    <!-- Level 1.5: Komite & Tata Usaha -->
    <div class="p-5 rounded-2xl bg-white border border-stone-200 shadow-sm">
      <span class="px-2.5 py-0.5 rounded-full text-[10px] font-mono font-bold uppercase bg-stone-100 text-stone-700">LEVEL 1.5: SAYAP</span>
      <h3 class="text-xs font-bold text-stone-900 mt-2 mb-1">Komite & Tata Usaha</h3>
      <p class="text-xs font-semibold text-stone-800">
        <?= (!empty($grouped['komite']) ? '1 Komite' : '0 Komite') ?> • 
        <?= (!empty($grouped['tata_usaha']) ? '1 KTU' : '0 KTU') ?>
      </p>
    </div>

    <!-- Level 2: Waka -->
    <div class="p-5 rounded-2xl bg-white border border-stone-200 shadow-sm">
      <span class="px-2.5 py-0.5 rounded-full text-[10px] font-mono font-bold uppercase bg-amber-100 text-amber-900">LEVEL 2: MANAJEMEN</span>
      <h3 class="text-xs font-bold text-stone-900 mt-2 mb-1">Wakil Kepala Sekolah</h3>
      <p class="text-xs font-extrabold text-amber-900"><?= count($grouped['waka'] ?? []) ?> Pejabat Waka Aktif</p>
    </div>

    <!-- Level 3: Kaprodi -->
    <div class="p-5 rounded-2xl bg-white border border-stone-200 shadow-sm">
      <span class="px-2.5 py-0.5 rounded-full text-[10px] font-mono font-bold uppercase bg-emerald-100 text-emerald-900">LEVEL 3: KAPRODI</span>
      <h3 class="text-xs font-bold text-stone-900 mt-2 mb-1">Kepala Program Keahlian</h3>
      <p class="text-xs font-extrabold text-emerald-900"><?= count($grouped['kaprodi'] ?? []) ?> Kaprodi Jurusan Aktif</p>
    </div>
  </div>

  <!-- Data Table -->
  <div class="liquid-glass-elevated rounded-3xl p-6 sm:p-8 border border-amber-900/10 shadow-xl space-y-4">
    <div class="flex items-center justify-between pb-3 border-b border-stone-200/80">
      <h2 class="text-base font-extrabold text-stone-900">Daftar Lengkap Pimpinan & Struktur</h2>
      <span class="text-xs font-mono font-bold text-stone-500">Total: <?= count($strukturList) ?> Anggota</span>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full text-left text-xs text-stone-700">
        <thead class="bg-stone-100 text-stone-900 uppercase font-mono text-[10px]">
          <tr>
            <th class="p-3.5 rounded-l-xl">Urutan</th>
            <th class="p-3.5">Level & Badge</th>
            <th class="p-3.5">Nama & Gelar</th>
            <th class="p-3.5">Jabatan</th>
            <th class="p-3.5">Tugas / Sub-Jabatan</th>
            <th class="p-3.5">Ikon / Foto</th>
            <th class="p-3.5 rounded-r-xl text-right">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-stone-200/60">
          <?php if (!empty($strukturList)): ?>
            <?php foreach ($strukturList as $s): ?>
              <tr class="hover:bg-amber-50/50 transition-colors">
                <td class="p-3.5 font-mono font-bold text-amber-800"><?= esc($s['urutan']) ?></td>
                <td class="p-3.5">
                  <span class="px-2 py-0.5 rounded text-[10px] font-mono font-bold uppercase 
                    <?= $s['level'] === 'kepala_sekolah' ? 'bg-[#B45309] text-white' : ($s['level'] === 'waka' ? 'bg-amber-100 text-amber-900' : ($s['level'] === 'kaprodi' ? 'bg-emerald-100 text-emerald-900' : 'bg-stone-100 text-stone-800')) ?>">
                    <?= esc($s['level']) ?>
                  </span>
                  <?php if (!empty($s['badge_label'])): ?>
                    <span class="block text-[10px] text-stone-500 font-mono mt-0.5"><?= esc($s['badge_label']) ?></span>
                  <?php endif; ?>
                </td>
                <td class="p-3.5 font-extrabold text-stone-900"><?= esc($s['nama']) ?></td>
                <td class="p-3.5 font-bold text-amber-900"><?= esc($s['jabatan']) ?></td>
                <td class="p-3.5 text-stone-600 max-w-xs truncate"><?= esc($s['sub_jabatan']) ?></td>
                <td class="p-3.5">
                  <div class="w-8 h-8 rounded-full bg-amber-50 border border-amber-200 flex items-center justify-center text-sm">
                    <?php if (!empty($s['foto']) && file_exists(FCPATH . 'images/struktur/' . $s['foto'])): ?>
                      <img src="<?= base_url('images/struktur/' . $s['foto']) ?>" class="w-full h-full object-cover rounded-full">
                    <?php else: ?>
                      <?= esc($s['icon'] ?: '👨‍💼') ?>
                    <?php endif; ?>
                  </div>
                </td>
                <td class="p-3.5 text-right space-x-2 whitespace-nowrap">
                  <a href="<?= base_url('admin/struktur/edit/' . $s['id']) ?>" class="px-3 py-1 rounded-lg text-xs font-bold bg-white text-stone-700 border border-stone-200 hover:border-amber-600 transition-colors">
                    Edit
                  </a>
                  <a href="<?= base_url('admin/struktur/delete/' . $s['id']) ?>" onclick="return confirm('Yakin ingin menghapus anggota struktur ini?')" class="px-3 py-1 rounded-lg text-xs font-bold bg-red-50 text-red-600 border border-red-200 hover:bg-red-100 transition-colors">
                    Hapus
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="7" class="p-6 text-center text-stone-500">Belum ada data struktur organisasi.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

  </div>

</div>

<?= $this->endSection() ?>
