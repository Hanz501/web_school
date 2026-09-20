<?= $this->extend('admin/layouts/admin_main') ?>

<?= $this->section('admin_content') ?>

<div class="space-y-8">
  
  <!-- Welcome Banner -->
  <div class="liquid-glass-elevated bg-gradient-to-r from-amber-600 via-amber-700 to-amber-800 text-white p-6 sm:p-8 rounded-3xl border border-white/20 shadow-xl relative overflow-hidden">
    <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>
    <div class="relative z-10 max-w-2xl space-y-2">
      <span class="px-3 py-1 rounded-full text-xs font-mono font-bold bg-white/20 uppercase">OVERVIEW SYSTEM</span>
      <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Selamat Datang, <?= esc(session()->get('namaLengkap') ?? 'Admin') ?>!</h1>
      <p class="text-xs sm:text-sm text-amber-100 leading-relaxed">
        Kelola data berita, portofolio galeri fasilitas, dan informasi program keahlian sekolah secara realtime dari panel kontrol ini.
      </p>
    </div>
  </div>

  <!-- Metric Statistics Cards -->
  <!-- Metric Statistics Cards -->
  <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-3 sm:gap-4">
    <!-- Card 1: Berita -->
    <div class="liquid-glass-elevated p-4 sm:p-5 rounded-2xl border border-amber-900/10">
      <div class="flex items-center justify-between mb-2">
        <span class="text-[10px] font-bold text-stone-500 uppercase tracking-wider">Berita</span>
        <div class="w-7 h-7 rounded-lg bg-amber-500/15 text-amber-800 flex items-center justify-center">
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Z"/></svg>
        </div>
      </div>
      <div class="text-2xl sm:text-3xl font-extrabold text-stone-900 font-mono"><?= $stats['total_berita'] ?? 0 ?></div>
      <span class="text-[10px] text-amber-800 font-semibold block mt-0.5">Artikel Warta</span>
    </div>

    <!-- Card 2: Galeri -->
    <div class="liquid-glass-elevated p-4 sm:p-5 rounded-2xl border border-amber-900/10">
      <div class="flex items-center justify-between mb-2">
        <span class="text-[10px] font-bold text-stone-500 uppercase tracking-wider">Galeri</span>
        <div class="w-7 h-7 rounded-lg bg-orange-500/15 text-orange-800 flex items-center justify-center">
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
        </div>
      </div>
      <div class="text-2xl sm:text-3xl font-extrabold text-stone-900 font-mono"><?= $stats['total_galeri'] ?? 0 ?></div>
      <span class="text-[10px] text-orange-800 font-semibold block mt-0.5">Fasilitas Lab</span>
    </div>

    <!-- Card 3: Jurusan -->
    <div class="liquid-glass-elevated p-4 sm:p-5 rounded-2xl border border-amber-900/10">
      <div class="flex items-center justify-between mb-2">
        <span class="text-[10px] font-bold text-stone-500 uppercase tracking-wider">Jurusan</span>
        <div class="w-7 h-7 rounded-lg bg-amber-500/15 text-amber-800 flex items-center justify-center">
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m10 15 5-3-5-3v6Z"/></svg>
        </div>
      </div>
      <div class="text-2xl sm:text-3xl font-extrabold text-stone-900 font-mono"><?= $stats['total_jurusan'] ?? 0 ?></div>
      <span class="text-[10px] text-amber-800 font-semibold block mt-0.5">Program Keahlian</span>
    </div>

    <!-- Card 4: Sejarah -->
    <div class="liquid-glass-elevated p-4 sm:p-5 rounded-2xl border border-amber-900/10">
      <div class="flex items-center justify-between mb-2">
        <span class="text-[10px] font-bold text-stone-500 uppercase tracking-wider">Sejarah</span>
        <div class="w-7 h-7 rounded-lg bg-amber-500/15 text-amber-800 flex items-center justify-center">
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
      </div>
      <div class="text-2xl sm:text-3xl font-extrabold text-stone-900 font-mono"><?= $stats['total_sejarah'] ?? 0 ?></div>
      <span class="text-[10px] text-amber-800 font-semibold block mt-0.5">Milestone Linimasa</span>
    </div>

    <!-- Card 5: Struktur Organisasi -->
    <div class="liquid-glass-elevated p-4 sm:p-5 rounded-2xl border border-amber-900/10">
      <div class="flex items-center justify-between mb-2">
        <span class="text-[10px] font-bold text-stone-500 uppercase tracking-wider">Struktur</span>
        <div class="w-7 h-7 rounded-lg bg-emerald-500/15 text-emerald-800 flex items-center justify-center">
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
        </div>
      </div>
      <div class="text-2xl sm:text-3xl font-extrabold text-stone-900 font-mono"><?= $stats['total_struktur'] ?? 0 ?></div>
      <span class="text-[10px] text-emerald-800 font-semibold block mt-0.5">Pimpinan & Guru</span>
    </div>

    <!-- Card 6: Pesan Masuk -->
    <a href="<?= base_url('admin/pesan') ?>" class="liquid-glass-elevated p-4 sm:p-5 rounded-2xl border border-amber-900/10 hover:border-amber-600/40 transition-all block group">
      <div class="flex items-center justify-between mb-2">
        <span class="text-[10px] font-bold text-stone-500 uppercase tracking-wider group-hover:text-amber-800">Pesan</span>
        <div class="w-7 h-7 rounded-lg bg-emerald-500/15 text-emerald-700 flex items-center justify-center">
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
        </div>
      </div>
      <div class="flex items-baseline gap-2">
        <div class="text-2xl sm:text-3xl font-extrabold text-stone-900 font-mono"><?= $stats['total_pesan'] ?? 0 ?></div>
        <?php if (($stats['unread_pesan'] ?? 0) > 0): ?>
          <span class="text-[10px] font-mono font-bold px-1.5 py-0.5 rounded bg-emerald-500 text-white animate-pulse">
            <?= $stats['unread_pesan'] ?> baru
          </span>
        <?php endif; ?>
      </div>
      <span class="text-[10px] text-stone-500 font-semibold block mt-0.5">Kotak Masuk</span>
    </a>

    <!-- Card 7: Administrator -->
    <div class="liquid-glass-elevated p-4 sm:p-5 rounded-2xl border border-amber-900/10">
      <div class="flex items-center justify-between mb-2">
        <span class="text-[10px] font-bold text-stone-500 uppercase tracking-wider">Admin</span>
        <div class="w-7 h-7 rounded-lg bg-stone-500/15 text-stone-800 flex items-center justify-center">
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2a5 5 0 0 0-5 5v3H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2h-1V7a5 5 0 0 0-5-5z"/></svg>
        </div>
      </div>
      <div class="text-2xl sm:text-3xl font-extrabold text-stone-900 font-mono"><?= $stats['total_admin'] ?? 1 ?></div>
      <span class="text-[10px] text-stone-700 font-semibold block mt-0.5">User Berwenang</span>
    </div>
  </div>

  <!-- Quick Actions Grid -->
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
    <a href="<?= base_url('admin/profil') ?>" class="liquid-glass p-4 rounded-2xl border border-amber-900/10 hover:border-amber-600/40 flex items-center gap-3.5 group transition-all">
      <div class="w-10 h-10 rounded-xl bg-amber-600 text-white flex items-center justify-center group-hover:scale-105 transition-transform shadow-md flex-shrink-0">
        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M12 8v4"/><path d="M12 12l2.5 2.5"/></svg>
      </div>
      <div class="min-w-0">
        <span class="text-xs font-bold text-stone-900 block group-hover:text-amber-800 truncate">Visi & Misi</span>
        <span class="text-[10px] text-stone-500 truncate block">Edit profil & PRIDE</span>
      </div>
    </a>

    <a href="<?= base_url('admin/struktur') ?>" class="liquid-glass p-4 rounded-2xl border border-amber-900/10 hover:border-amber-600/40 flex items-center gap-3.5 group transition-all">
      <div class="w-10 h-10 rounded-xl bg-emerald-600 text-white flex items-center justify-center group-hover:scale-105 transition-transform shadow-md flex-shrink-0">
        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
      </div>
      <div class="min-w-0">
        <span class="text-xs font-bold text-stone-900 block group-hover:text-amber-800 truncate">Struktur Bagan</span>
        <span class="text-[10px] text-stone-500 truncate block">Pimpinan & Kaprodi</span>
      </div>
    </a>

    <a href="<?= base_url('admin/pesan') ?>" class="liquid-glass p-4 rounded-2xl border border-amber-900/10 hover:border-amber-600/40 flex items-center gap-3.5 group transition-all">
      <div class="w-10 h-10 rounded-xl bg-emerald-600 text-white flex items-center justify-center group-hover:scale-105 transition-transform shadow-md flex-shrink-0">
        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
      </div>
      <div class="min-w-0">
        <span class="text-xs font-bold text-stone-900 block group-hover:text-amber-800 truncate">Pesan & Masukan</span>
        <span class="text-[10px] text-stone-500 truncate block"><?= $stats['unread_pesan'] ?? 0 ?> pesan belum dibaca</span>
      </div>
    </a>

    <a href="<?= base_url('admin/jurusan') ?>" class="liquid-glass p-4 rounded-2xl border border-amber-900/10 hover:border-amber-600/40 flex items-center gap-3.5 group transition-all">
      <div class="w-10 h-10 rounded-xl bg-orange-600 text-white flex items-center justify-center group-hover:scale-105 transition-transform shadow-md flex-shrink-0">
        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m10 15 5-3-5-3v6Z"/></svg>
      </div>
      <div class="min-w-0">
        <span class="text-xs font-bold text-stone-900 block group-hover:text-amber-800 truncate">Program Keahlian</span>
        <span class="text-[10px] text-stone-500 truncate block">Kuota PPDB 360°</span>
      </div>
    </a>
  </div>

  <!-- Recent Articles & Gallery & Pesan Grid -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    
    <!-- Recent News Table (Col 6) -->
    <div class="lg:col-span-6 liquid-glass-elevated p-6 sm:p-7 rounded-3xl border border-amber-900/10 space-y-4">
      <div class="flex items-center justify-between pb-4 border-b border-stone-200/80">
        <h3 class="text-sm font-extrabold text-stone-900">Artikel Berita Terbaru</h3>
        <a href="<?= base_url('admin/berita') ?>" class="text-xs font-bold text-amber-800 hover:text-amber-950">Lihat Semua →</a>
      </div>

      <div class="divide-y divide-stone-200/60">
        <?php if (!empty($recentBerita)): ?>
          <?php foreach ($recentBerita as $b): ?>
            <div class="py-3 flex items-center justify-between gap-4">
              <div class="min-w-0">
                <span class="text-[10px] font-mono font-bold px-2 py-0.5 rounded bg-amber-100 text-amber-900 mr-2">
                  <?= esc($b['kategori']) ?>
                </span>
                <span class="text-xs font-bold text-stone-900 hover:text-amber-800 truncate block sm:inline mt-1 sm:mt-0">
                  <?= esc($b['judul']) ?>
                </span>
                <span class="text-[11px] text-stone-500 block"><?= esc($b['tanggal']) ?> • <?= esc($b['penulis']) ?></span>
              </div>
              <a href="<?= base_url('admin/berita/edit/' . $b['id']) ?>" class="px-2.5 py-1 rounded-lg text-xs font-bold bg-white text-stone-700 border border-stone-200 hover:border-amber-600 transition-colors flex-shrink-0">
                Edit
              </a>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p class="text-xs text-stone-500 py-4 text-center">Belum ada artikel berita.</p>
        <?php endif; ?>
      </div>
    </div>

    <!-- Recent Messages Preview (Col 6) -->
    <div class="lg:col-span-6 liquid-glass-elevated p-6 sm:p-7 rounded-3xl border border-amber-900/10 space-y-4">
      <div class="flex items-center justify-between pb-4 border-b border-stone-200/80">
        <div class="flex items-center gap-2">
          <h3 class="text-sm font-extrabold text-stone-900">Pesan & Masukan Terbaru</h3>
          <?php if (($stats['unread_pesan'] ?? 0) > 0): ?>
            <span class="px-2 py-0.5 rounded-full text-[10px] font-mono font-bold bg-emerald-500 text-white">
              <?= $stats['unread_pesan'] ?> Baru
            </span>
          <?php endif; ?>
        </div>
        <a href="<?= base_url('admin/pesan') ?>" class="text-xs font-bold text-amber-800 hover:text-amber-950">Buka Kotak Masuk →</a>
      </div>

      <div class="divide-y divide-stone-200/60">
        <?php if (!empty($recentPesan)): ?>
          <?php foreach ($recentPesan as $p): ?>
            <div class="py-3 flex items-start justify-between gap-3 <?= !$p['is_read'] ? 'bg-amber-50/40 -mx-3 px-3 rounded-xl' : '' ?>">
              <div class="min-w-0">
                <div class="flex items-center gap-2">
                  <span class="text-xs font-extrabold text-stone-900"><?= esc($p['nama_lengkap']) ?></span>
                  <?php if (!$p['is_read']): ?>
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                  <?php endif; ?>
                  <span class="text-[10px] text-stone-400 font-mono"><?= date('d/m H:i', strtotime($p['created_at'])) ?></span>
                </div>
                <p class="text-[11px] text-stone-600 line-clamp-1 mt-0.5"><?= esc($p['pesan']) ?></p>
              </div>
              <a href="<?= base_url('admin/pesan') ?>" class="text-[11px] font-bold text-amber-800 hover:underline flex-shrink-0">
                Detail
              </a>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p class="text-xs text-stone-500 py-4 text-center">Belum ada pesan masuk dari pengunjung.</p>
        <?php endif; ?>
      </div>
    </div>

  </div>

</div>

<?= $this->endSection() ?>
