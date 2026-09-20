<?= $this->extend('admin/layouts/admin_main') ?>

<?= $this->section('admin_content') ?>

<div class="space-y-6">
  
  <!-- Header -->
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
      <h1 class="text-2xl font-extrabold text-stone-900 tracking-tight">Manajemen Program Keahlian</h1>
      <p class="text-xs text-stone-500">Kelola kurikulum, prospek karir, dan status kuota pendaftaran PPDB untuk Roda 360° interaktif.</p>
    </div>
  </div>

  <!-- Jurusan Cards Grid -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <?php foreach ($jurusanList as $j): ?>
      <?php 
        $kuota = $j['kuota'] ?: 72;
        $terisi = $j['terisi'] ?: 0;
        $persen = round(($terisi / $kuota) * 100);
      ?>
      <div class="liquid-glass-elevated rounded-3xl p-6 border border-amber-900/10 shadow-lg flex flex-col justify-between space-y-4">
        
        <div>
          <!-- Header -->
          <div class="flex items-start justify-between gap-4 pb-4 border-b border-stone-200/80">
            <div class="flex items-center gap-3">
              <div class="w-12 h-12 rounded-2xl bg-amber-600 text-white flex items-center justify-center font-extrabold text-sm shadow-md shadow-amber-600/20">
                <?= esc($j['kode']) ?>
              </div>
              <div>
                <span class="text-[10px] font-mono font-bold uppercase text-amber-800"><?= esc($j['kategori']) ?></span>
                <h3 class="text-lg font-extrabold text-stone-900 leading-snug"><?= esc($j['nama']) ?></h3>
              </div>
            </div>

            <span class="px-2.5 py-1 rounded-full text-[10px] font-mono font-bold bg-amber-100 text-amber-900">
              Angle: <?= $j['angle'] ?>°
            </span>
          </div>

          <!-- Kuota PPDB Bar -->
          <div class="py-4">
            <div class="flex items-center justify-between text-xs text-stone-600 mb-1.5 font-bold">
              <span>Status Kuota Kursi PPDB:</span>
              <span class="text-amber-800 font-mono"><?= $terisi ?> / <?= $kuota ?> (<?= $persen ?>%)</span>
            </div>
            <div class="w-full h-2.5 bg-stone-100 rounded-full overflow-hidden border border-stone-200">
              <div class="h-full bg-gradient-to-r from-amber-500 to-amber-700 rounded-full" style="width: <?= $persen ?>%"></div>
            </div>
          </div>

          <p class="text-xs text-stone-600 line-clamp-2 leading-relaxed mb-3">
            <?= esc($j['deskripsi']) ?>
          </p>

          <div class="text-[11px] text-stone-500">
            <span class="font-bold text-stone-700">Sertifikasi:</span> <?= esc($j['sertifikasi']) ?>
          </div>
        </div>

        <!-- Action Button -->
        <div class="pt-4 border-t border-stone-200/80 flex items-center justify-between">
          <span class="text-[11px] font-mono text-stone-400">ID: <?= esc($j['id']) ?></span>
          <a href="<?= base_url('admin/jurusan/edit/' . $j['id']) ?>" class="btn-amber-gradient px-4 py-2 rounded-xl text-xs font-bold inline-flex items-center gap-1.5 shadow-sm">
            <span>Edit Data & Kuota</span>
            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
          </a>
        </div>

      </div>
    <?php endforeach; ?>
  </div>

</div>

<?= $this->endSection() ?>
