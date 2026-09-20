<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- =========================================================================
     1. HERO SECTION DENGAN BACKGROUND VIDEO DRONE KAMPUS
     ========================================================================= -->
<section id="hero" class="relative pt-16 pb-20 sm:pb-28 overflow-hidden min-h-[85vh] flex items-center justify-center">
  
  <!-- Video Background Drone Kampus (public/videos/drone-campus.mp4) -->
  <div class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none z-0">
    <video 
      id="hero-drone-video"
      autoplay 
      loop 
      muted 
      playsinline 
      class="w-full h-full object-cover opacity-85 scale-105 transform transition-opacity duration-700">
      <source src="<?= base_url('videos/drone-campus.mp4') ?>" type="video/mp4">
    </video>

    <!-- Warm Light Scrim & Gradient Overlay (Balanced for high video visibility and crisp readability) -->
    <div class="absolute inset-0 bg-gradient-to-b from-[#FFF8F6]/40 via-[#FFF8F6]/55 to-[#FFF8F6]"></div>
    
    <!-- Warm Light Accent Ambient Glow -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-96 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>
  </div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full space-y-10">
    
    <!-- Hero Headline & Copywriting -->
    <div class="text-center max-w-4xl mx-auto space-y-6 pt-4">
      
      <!-- Judul Utama (H1) dengan Pantulan Cahaya Bergerak Pelan dari Kanan ke Kiri -->
      <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-[1.15] drop-shadow-sm">
        <span class="hero-text-shimmer">Mencetak Generasi Vokasi</span> 
        <span class="hero-accent-shimmer">Berdaya Saing Global</span> 
        <span class="hero-text-shimmer">&</span> 
        <span class="hero-accent-shimmer">Berkarakter Industri</span>
      </h1>

      <!-- Paragraf Ringkas 2 Baris dengan Pantulan Cahaya Lembut Bergerak dari Kanan ke Kiri -->
      <p class="text-base sm:text-lg max-w-3xl mx-auto leading-relaxed font-normal">
        <span class="hero-sub-shimmer">
          Pendidikan kejuruan berstandar global dengan kurikulum link and match industri, penguasaan Artificial Intelligence, arsitektur cloud computing, dan rekayasa digital masa depan.
        </span>
      </p>

      <!-- Action Buttons -->
      <div class="flex flex-wrap items-center justify-center gap-3 sm:gap-4 pt-2">
        <a href="#jurusan" class="btn-amber-solid px-7 py-3.5 rounded-full text-sm font-extrabold inline-flex items-center gap-2 shadow-lg">
          <span>Jelajahi Jurusan</span>
          <span class="text-base">➔</span>
        </a>
        <button type="button" data-open-profil="sejarah" class="btn-outline-warm px-6 py-3.5 rounded-full text-sm font-bold inline-flex items-center gap-2 shadow-sm bg-white/70 backdrop-blur-sm hover:text-[#B45309] hover:border-[#B45309] transition-all">
          <span>🏛️ Profil Sekolah</span>
        </button>
        <a href="#kontak" class="px-6 py-3.5 rounded-full text-sm font-bold inline-flex items-center gap-2 text-[#57534E] hover:text-[#B45309] hover:bg-white/50 transition-all">
          <span>Daftar PPDB</span>
          <span class="text-base">➔</span>
        </a>
      </div>

    </div>

    <!-- 3 Floating Metric Cards (Grid 3 Kolom) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-8 max-w-5xl mx-auto">
      
      <!-- Card 1: 98.4% Penyerapan -->
      <div class="liquid-glass rounded-3xl p-6 sm:p-7 border border-amber-900/12 flex items-center gap-5 hover:-translate-y-1 transition-all duration-300">
        <div class="w-14 h-14 rounded-2xl bg-[#059669]/10 text-[#059669] flex items-center justify-center flex-shrink-0 border border-[#059669]/20 shadow-sm">
          <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
            <polyline points="22 4 12 14.01 9 11.01"/>
          </svg>
        </div>
        <div>
          <div class="text-2xl sm:text-3xl font-extrabold text-[#1C1917] font-mono tracking-tight leading-none mb-1">
            98.4%
          </div>
          <div class="text-xs sm:text-sm font-medium text-[#57534E] leading-snug">
            Lulusan Terserap Kerja & Industri
          </div>
        </div>
      </div>

      <!-- Card 2: Akreditasi A -->
      <div class="liquid-glass rounded-3xl p-6 sm:p-7 border border-amber-900/12 flex items-center gap-5 hover:-translate-y-1 transition-all duration-300">
        <div class="w-14 h-14 rounded-2xl bg-amber-500/15 text-[#B45309] flex items-center justify-center flex-shrink-0 border border-amber-900/15 shadow-sm">
          <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="8" r="7"/>
            <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/>
          </svg>
        </div>
        <div>
          <div class="text-2xl sm:text-3xl font-extrabold text-[#1C1917] font-mono tracking-tight leading-none mb-1">
            Akreditasi A
          </div>
          <div class="text-xs sm:text-sm font-medium text-[#57534E] leading-snug">
            Unggul BAN-SM & ISO 9001:2015
          </div>
        </div>
      </div>

      <!-- Card 3: 50+ Mitra Industri -->
      <div class="liquid-glass rounded-3xl p-6 sm:p-7 border border-amber-900/12 flex items-center gap-5 hover:-translate-y-1 transition-all duration-300">
        <div class="w-14 h-14 rounded-2xl bg-orange-500/15 text-[#C26727] flex items-center justify-center flex-shrink-0 border border-orange-900/15 shadow-sm">
          <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
            <circle cx="9" cy="7" r="4"/>
            <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
          </svg>
        </div>
        <div>
          <div class="text-2xl sm:text-3xl font-extrabold text-[#1C1917] font-mono tracking-tight leading-none mb-1">
            50+ Mitra
          </div>
          <div class="text-xs sm:text-sm font-medium text-[#57534E] leading-snug">
            Industri Multinasional & Tech Giant
          </div>
        </div>
      </div>

    </div>

  </div>
</section>

<!-- =========================================================================
     2. SECTION PROFIL SEKOLAH SHOWCASE (WIDE & PROMINENT INTERACTIVE TRIGGER)
     ========================================================================= -->
<section id="profil" class="py-12 sm:py-16 bg-[#FFF8F6] relative">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="relative rounded-3xl overflow-hidden liquid-glass-elevated border border-amber-900/15 p-6 sm:p-10 lg:p-12 shadow-xl bg-gradient-to-br from-white/95 via-amber-50/40 to-orange-50/30">
      
      <!-- Ambient Decorative Background Glow -->
      <div class="absolute -top-24 -right-24 w-96 h-96 bg-gradient-to-br from-amber-400/20 to-orange-500/10 rounded-full blur-3xl pointer-events-none"></div>
      <div class="absolute -bottom-24 -left-24 w-80 h-80 bg-amber-600/10 rounded-full blur-2xl pointer-events-none"></div>

      <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
        
        <!-- Left Column: Copywriting & Main Trigger (Col 7) -->
        <div class="lg:col-span-7 space-y-5">
          <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-500/15 border border-amber-900/15 text-xs font-mono font-bold text-[#B45309] uppercase tracking-wider">
            <span>🏛️ PROFIL & IDENTITAS LEMBAGA</span>
          </div>

          <h2 class="text-2xl sm:text-4xl font-extrabold text-[#1C1917] tracking-tight leading-tight">
            Mengenal Lebih Dekat <br class="hidden sm:inline">
            <span class="text-[#B45309]"><?= esc($profil['nama_sekolah'] ?? 'SMK Unggulan Pusat Keunggulan') ?></span>
          </h2>

          <p class="text-sm sm:text-base text-[#57534E] leading-relaxed">
            <?= esc($profil['ringkasan_sejarah'] ?? 'Berdiri sejak tahun 2012 dengan dedikasi mencetak talenta vokasi berdaya saing global.') ?>
          </p>

          <!-- Action Buttons -->
          <div class="flex flex-wrap items-center gap-3 pt-2">
            <button type="button" data-open-profil="sejarah" class="btn-amber-solid px-6 py-3 rounded-2xl text-xs sm:text-sm font-extrabold inline-flex items-center gap-2 shadow-lg cursor-pointer">
              <span>Buka Profil Lengkap</span>
              <span class="text-base">↗</span>
            </button>
            <button type="button" data-open-profil="struktur" class="btn-outline-warm px-5 py-3 rounded-2xl text-xs sm:text-sm font-bold inline-flex items-center gap-2 bg-white/80 backdrop-blur-sm cursor-pointer">
              <span>👥 Bagan Organisasi</span>
            </button>
            <button type="button" data-open-profil="visimisi" class="px-4 py-3 rounded-2xl text-xs sm:text-sm font-bold text-[#57534E] hover:text-[#B45309] hover:bg-amber-100/50 transition-colors cursor-pointer">
              <span>🎯 Visi & Misi</span>
            </button>
          </div>
        </div>

        <!-- Right Column: 4 Interactive Mini-Cards Grid (Col 5) -->
        <div class="lg:col-span-5 grid grid-cols-2 gap-3.5 sm:gap-4">
          
          <!-- Card 1: Sejarah -->
          <button type="button" data-open-profil="sejarah" class="text-left p-4 sm:p-5 rounded-2xl bg-white/90 border border-amber-900/12 hover:border-[#B45309] hover:shadow-md hover:-translate-y-1 transition-all group cursor-pointer">
            <div class="w-10 h-10 rounded-xl bg-amber-100 text-[#B45309] flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
              📜
            </div>
            <h4 class="text-xs sm:text-sm font-extrabold text-[#1C1917] group-hover:text-[#B45309] transition-colors mb-1">
              Sejarah Sekolah
            </h4>
            <p class="text-[11px] text-[#78716C] leading-snug line-clamp-2">
              Linimasa dedikasi vokasi dari 2012 hingga ekspansi global.
            </p>
          </button>

          <!-- Card 2: Visi Misi -->
          <button type="button" data-open-profil="visimisi" class="text-left p-4 sm:p-5 rounded-2xl bg-white/90 border border-amber-900/12 hover:border-[#B45309] hover:shadow-md hover:-translate-y-1 transition-all group cursor-pointer">
            <div class="w-10 h-10 rounded-xl bg-orange-100 text-[#C26727] flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
              🎯
            </div>
            <h4 class="text-xs sm:text-sm font-extrabold text-[#1C1917] group-hover:text-[#B45309] transition-colors mb-1">
              Visi & Misi
            </h4>
            <p class="text-[11px] text-[#78716C] leading-snug line-clamp-2">
              4 Misi strategis dan 5 pilar budaya kerja industri PRIDE.
            </p>
          </button>

          <!-- Card 3: Bagan Struktur -->
          <button type="button" data-open-profil="struktur" class="text-left p-4 sm:p-5 rounded-2xl bg-white/90 border border-amber-900/12 hover:border-[#B45309] hover:shadow-md hover:-translate-y-1 transition-all group cursor-pointer">
            <div class="w-10 h-10 rounded-xl bg-amber-500/15 text-[#92400E] flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
              👥
            </div>
            <h4 class="text-xs sm:text-sm font-extrabold text-[#1C1917] group-hover:text-[#B45309] transition-colors mb-1">
              Bagan Pimpinan
            </h4>
            <p class="text-[11px] text-[#78716C] leading-snug line-clamp-2">
              Struktur bercabang kepala sekolah, waka & kaprodi.
            </p>
          </button>

          <!-- Card 4: Status Akreditasi -->
          <button type="button" data-open-profil="visimisi" class="text-left p-4 sm:p-5 rounded-2xl bg-white/90 border border-amber-900/12 hover:border-[#B45309] hover:shadow-md hover:-translate-y-1 transition-all group cursor-pointer">
            <div class="w-10 h-10 rounded-xl bg-[#059669]/15 text-[#059669] flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
              🏆
            </div>
            <h4 class="text-xs sm:text-sm font-extrabold text-[#1C1917] group-hover:text-[#059669] transition-colors mb-1">
              Akreditasi A
            </h4>
            <p class="text-[11px] text-[#78716C] leading-snug line-clamp-2">
              BAN-S/M, ISO 9001:2015 & Lisensi Lembaga Vokasi.
            </p>
          </button>

        </div>

      </div>

    </div>
  </div>
</section>

<!-- =========================================================================
     3. SECTION PROGRAM KEAHLIAN
     ========================================================================= -->
<section id="jurusan" class="py-20 sm:py-28 bg-gradient-to-b from-[#FFF8F6] via-[#F9F2F0] to-[#FFF8F6] border-y border-amber-900/10 relative">
  
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- Header Section -->
    <div class="text-center max-w-3xl mx-auto mb-14 space-y-3">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full liquid-glass border border-amber-900/15 text-xs font-mono font-bold uppercase text-[#B45309]">
        <span>PILIHAN JURUSAN</span>
      </div>
      <h2 class="text-2xl sm:text-4xl font-extrabold text-[#1C1917] tracking-tight">
        Program Keahlian Unggulan
      </h2>
      <p class="text-sm sm:text-base text-[#57534E]">
        Pilih program keahlian untuk mengeksplorasi kurikulum inti, prospek karir lulusan, sertifikasi resmi, dan unit teaching factory.
      </p>
    </div>

    <!-- Layout 2 Kolom (Split 5:7 di Desktop) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-start">
      
      <!-- KOLOM KIRI (Visual Roda Presisi ~360px) - Col 5 -->
      <div class="lg:col-span-5 flex flex-col items-center justify-center lg:sticky lg:top-28">
        <div id="orbit-wheel-container" class="relative w-80 h-80 sm:w-[360px] sm:h-[360px] my-4">
          <!-- Dynamically populated & rendered with exact angles (0°, 90°, 180°, 270°) by roda-jurusan.js -->
        </div>

        <div class="text-center mt-3 text-xs text-[#78716C] font-mono flex items-center justify-center gap-1.5">
          <span>💡</span>
          <span>Klik node jurusan atau gunakan tombol panah keyboard ← / →</span>
        </div>
      </div>

      <!-- KOLOM KANAN (Panel Detail Jurusan dengan Morph & Slide-Fade) - Col 7 -->
      <div class="lg:col-span-7 min-h-[500px]" id="jurusan-detail-panel">
        <!-- Injected smoothly with Morph & Slide-Fade transition by roda-jurusan.js -->
      </div>

    </div>

  </div>
</section>

<!-- =========================================================================
     3. DOKUMENTASI & GALERI PRESTASI KAMPUS
     ========================================================================= -->
<section id="galeri" class="py-20 sm:py-28 bg-[#FFF8F6]">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
      <div>
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full liquid-glass border border-amber-900/15 text-xs font-mono font-bold uppercase text-[#B45309] mb-2">
          <span>DOKUMENTASI KAMPUS</span>
        </div>
        <h2 class="text-2xl sm:text-4xl font-extrabold text-[#1C1917] tracking-tight">
          Galeri Prestasi & Fasilitas Unggulan
        </h2>
        <p class="text-xs sm:text-sm text-[#57534E] mt-1 max-w-xl">
          Eksplorasi rekam jejak inovasi, kejuaraan bergengsi, dan infrastruktur komputasi standar industri tier-3.
        </p>
      </div>

      <!-- Header dengan Tab Filter Dinamis -->
      <?php
        $uniqueCategories = [];
        foreach ($galeri as $item) {
            $cat = trim($item['kategori'] ?? '');
            if ($cat !== '' && !in_array($cat, $uniqueCategories)) {
                $uniqueCategories[] = $cat;
            }
        }
      ?>
      <div class="flex flex-wrap items-center gap-2" id="galeri-filter-tabs">
        <button type="button" data-filter="all" class="galeri-filter-btn px-4 py-2 rounded-full text-xs font-extrabold bg-[#B45309] text-white shadow-md border border-transparent transition-all">
          Semua
        </button>
        <?php foreach ($uniqueCategories as $catName): ?>
          <button type="button" data-filter="<?= esc($catName) ?>" class="galeri-filter-btn px-4 py-2 rounded-full text-xs font-bold bg-white/80 text-[#57534E] hover:bg-amber-50 border border-amber-900/12 transition-all">
            <?= esc($catName) ?>
          </button>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Grid 4 Kolom Kartu Foto Presisi -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" id="galeri-cards-grid">
      <?php foreach ($galeri as $item): ?>
        <div class="galeri-card-item liquid-glass rounded-2xl overflow-hidden flex flex-col group hover:-translate-y-1.5 hover:border-amber-600/30 cursor-pointer" data-kategori="<?= esc(trim($item['kategori'] ?? '')) ?>" data-open-galeri="<?= $item['id'] ?>">
          
          <!-- Image Container with Hover Zoom & Gradient Overlay -->
          <div class="relative w-full h-48 bg-stone-100 overflow-hidden">
            <?php if (!empty($item['foto']) && file_exists(FCPATH . 'images/galeri/' . $item['foto'])): ?>
              <img 
                src="<?= base_url('images/galeri/' . $item['foto']) ?>" 
                alt="<?= esc($item['judul']) ?>" 
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                loading="lazy">
            <?php else: ?>
              <!-- Simulated Graphic Card Banner -->
              <div class="w-full h-full bg-gradient-to-tr from-amber-700/20 via-orange-600/15 to-amber-100/50 flex flex-col items-center justify-center p-4 text-center group-hover:scale-105 transition-transform duration-500">
                <div class="w-10 h-10 rounded-xl bg-white/90 text-[#B45309] flex items-center justify-center mb-2 shadow-sm">
                  <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                </div>
                <span class="text-xs font-bold text-[#1C1917] line-clamp-1"><?= esc($item['judul']) ?></span>
              </div>
            <?php endif; ?>

            <!-- Overlay Gradient Dark Text at Bottom -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent flex items-end p-4">
              <span class="px-2.5 py-0.5 rounded-md text-[10px] font-mono font-bold uppercase bg-white/90 text-[#B45309]">
                <?= esc($item['kategori']) ?>
              </span>
            </div>
          </div>

          <!-- Card Content -->
          <div class="p-5 flex-grow flex flex-col justify-between">
            <div>
              <h3 class="text-base font-extrabold text-[#1C1917] group-hover:text-[#B45309] transition-colors leading-snug mb-2">
                <?= esc($item['judul']) ?>
              </h3>
              <p class="text-xs text-[#57534E] leading-relaxed line-clamp-3">
                <?= esc($item['deskripsi']) ?>
              </p>
            </div>

            <div class="mt-4 pt-3 border-t border-stone-200/70 flex items-center justify-between text-xs font-bold text-[#B45309]">
              <span>Lihat Detail Dokumentasi</span>
              <span class="group-hover:translate-x-1 transition-transform">➔</span>
            </div>
          </div>

        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- =========================================================================
     4. WARTA & PRESTASI SISWA (DENGAN POPUP MODAL TERPISAH)
     ========================================================================= -->
<section id="berita" class="py-20 sm:py-28 bg-[#F9F2F0] border-y border-amber-900/10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <div class="text-center max-w-3xl mx-auto mb-14 space-y-3">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full liquid-glass border border-amber-900/15 text-xs font-mono font-bold uppercase text-[#B45309]">
        <span>WARTA & ARTIKEL</span>
      </div>
      <h2 class="text-2xl sm:text-4xl font-extrabold text-[#1C1917] tracking-tight">
        Kabar Inovasi & Prestasi Siswa
      </h2>
      <p class="text-sm sm:text-base text-[#57534E]">
        Pemberitaan terkini seputar riset terapan, kejuaraan internasional, dan kemitraan strategis kejuruan.
      </p>
    </div>

    <!-- Grid 3 Kolom Artikel Warta -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
      <?php foreach ($berita as $item): ?>
        <div class="liquid-glass rounded-3xl p-6 sm:p-7 border border-amber-900/12 flex flex-col justify-between hover:-translate-y-1.5 transition-all duration-300 group">
          
          <div>
            <?php if (!empty($item['foto'])): ?>
              <div class="w-full h-44 rounded-2xl overflow-hidden mb-5 border border-amber-900/10 shadow-inner bg-stone-100 relative group-hover:shadow-md transition-all">
                <img src="<?= base_url('images/berita/' . $item['foto']) ?>" 
                     alt="<?= esc($item['judul']) ?>" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                     onerror="this.parentElement.style.display='none'">
              </div>
            <?php endif; ?>

            <div class="flex items-center justify-between gap-2 mb-4">
              <span class="px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-amber-100 text-[#B45309] border border-amber-300">
                <?= esc($item['kategori']) ?>
              </span>
              <span class="text-xs text-[#78716C] font-mono"><?= esc($item['tanggal']) ?></span>
            </div>

            <h3 class="text-lg sm:text-xl font-extrabold text-[#1C1917] group-hover:text-[#B45309] transition-colors leading-snug mb-3">
              <?= esc($item['judul']) ?>
            </h3>

            <p class="text-xs sm:text-sm text-[#57534E] line-clamp-3 leading-relaxed mb-6">
              <?= esc($item['ringkasan']) ?>
            </p>
          </div>

          <div class="pt-4 border-t border-stone-200/80 flex items-center justify-between">
            <span class="text-xs text-[#78716C]"><?= esc($item['penulis']) ?></span>
            
            <!-- Perilaku Klik "Baca Selengkapnya ➔" (Memicu Modal Popup Terpisah #modal-artikel) -->
            <button 
              type="button" 
              data-open-berita="<?= $item['id'] ?>" 
              class="inline-flex items-center gap-1 text-xs font-extrabold text-[#B45309] hover:text-[#92400E] transition-colors">
              <span>Baca Selengkapnya</span>
              <span class="transition-transform group-hover:translate-x-1">➔</span>
            </button>
          </div>

        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- =========================================================================
     5. KONTAK TERPADU & INTERACTIVE MAPS POPUP
     ========================================================================= -->
<section id="kontak" class="py-20 sm:py-28 bg-[#FFF8F6]">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full liquid-glass border border-amber-900/15 text-xs font-mono font-bold uppercase text-[#B45309]">
        <span>LAYANAN INFORMASI & ADMISI</span>
      </div>
      <h2 class="text-2xl sm:text-4xl font-extrabold text-[#1C1917] tracking-tight">
        Kontak Terpadu & Kawasan Kampus
      </h2>
      <p class="text-sm sm:text-base text-[#57534E]">
        Hubungi tim admisi kami untuk konsultasi program keahlian, jadwal tes minat bakat, dan kunjungan fisik kampus.
      </p>
    </div>

    <!-- Layout 2 Kolom: Kiri (Kontak & Maps Bersusun), Kanan (Formulir Pesan Full Height) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-8 items-stretch">
      
      <!-- Kolom Kiri: 2 Card Bersusun (Kontak di Atas, Maps di Bawah) -->
      <div class="lg:col-span-6 flex flex-col gap-6">
        
        <!-- Card 1 (Atas): Hubungi Pusat Admisi & Kemitraan -->
        <div class="liquid-glass-elevated rounded-3xl p-6 sm:p-7 border border-amber-900/12 space-y-5">
          <div>
            <span class="text-xs font-mono font-bold text-[#B45309] uppercase tracking-wider">PUSAT ADMISI & KEMITRAAN</span>
            <h3 class="text-xl sm:text-2xl font-extrabold text-[#1C1917] mt-1">
              Terhubung Langsung dengan Kami
            </h3>
          </div>

          <!-- WhatsApp Box -->
          <div class="p-4 sm:p-5 rounded-2xl bg-[#059669]/10 border border-[#059669]/20 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-3.5">
              <div class="w-11 h-11 rounded-2xl bg-[#059669] text-white flex items-center justify-center flex-shrink-0 shadow-md">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
              </div>
              <div>
                <span class="text-[11px] font-bold text-[#059669] uppercase tracking-wider">WhatsApp Hotline</span>
                <div class="text-sm sm:text-base font-extrabold text-[#1C1917] font-mono tracking-tight">
                  <?= esc($kontak['whatsapp']) ?>
                </div>
              </div>
            </div>

            <div class="flex items-center gap-2">
              <!-- Tombol Chat Langsung -->
              <a 
                href="https://wa.me/<?= esc($kontak['whatsapp_raw']) ?>?text=Halo%20Admin%20SMK%20Unggulan,%20saya%20ingin%20konsultasi%20PPDB" 
                target="_blank" 
                rel="noopener noreferrer" 
                class="px-3.5 py-2 rounded-xl bg-[#059669] hover:bg-[#047857] text-white text-xs font-extrabold inline-flex items-center gap-1.5 shadow-md transition-all">
                <span>Chat Langsung</span>
                <span>↗</span>
              </a>

              <!-- Tombol Salin Nomor Clipboard dengan Tooltip Feedback -->
              <button 
                type="button" 
                id="copy-wa-btn" 
                data-copy-text="<?= esc($kontak['whatsapp']) ?>" 
                class="relative px-3 py-2 rounded-xl bg-white text-[#1C1917] border border-stone-300 hover:bg-stone-50 text-xs font-bold flex items-center justify-center transition-all" 
                title="Salin Nomor WhatsApp">
                <svg class="w-4 h-4 text-[#57534E]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="14" height="14" x="8" y="8" rx="2" ry="2"/><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/></svg>
                <span id="copy-wa-tooltip" class="hidden absolute -top-8 left-1/2 -translate-x-1/2 px-2 py-1 rounded bg-[#1C1917] text-white text-[10px] font-bold whitespace-nowrap shadow-md">
                  Tersalin!
                </span>
              </button>
            </div>
          </div>

          <!-- Hotline Telepon & Surel Resmi -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
            <!-- Hotline Telepon -->
            <div class="p-3.5 rounded-2xl bg-amber-50/70 border border-amber-900/10 space-y-1.5">
              <span class="text-[10px] font-mono font-bold text-[#B45309] uppercase">Hotline Telepon</span>
              <div class="text-xs font-extrabold text-[#1C1917]">
                <?= esc($kontak['telepon']) ?>
              </div>
              <a href="tel:02188907712" class="inline-flex items-center gap-1 text-[11px] font-bold text-[#B45309] hover:text-[#92400E]">
                <span>Panggil Sekarang</span>
                <span>📞</span>
              </a>
            </div>

            <!-- Surel Resmi -->
            <div class="p-3.5 rounded-2xl bg-amber-50/70 border border-amber-900/10 space-y-1.5">
              <span class="text-[10px] font-mono font-bold text-[#B45309] uppercase">Surel Resmi</span>
              <div class="text-xs font-extrabold text-[#1C1917] truncate">
                <?= esc($kontak['email']) ?>
              </div>
              <a href="mailto:<?= esc($kontak['email']) ?>" class="inline-flex items-center gap-1 text-[11px] font-bold text-[#B45309] hover:text-[#92400E]">
                <span>Kirim Email</span>
                <span>✉</span>
              </a>
            </div>
          </div>

          <!-- Baris Ikon Media Sosial -->
          <div class="pt-2 border-t border-stone-200/80 flex items-center justify-between">
            <span class="text-xs font-semibold text-[#57534E]">Media Sosial Resmi:</span>
            <div class="flex items-center gap-2.5">
              <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-xl bg-white border border-amber-900/15 flex items-center justify-center text-[#57534E] hover:text-[#B45309] hover:border-[#B45309] shadow-sm transition-all" aria-label="Instagram">
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
              </a>
              <a href="https://tiktok.com" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-xl bg-white border border-amber-900/15 flex items-center justify-center text-[#57534E] hover:text-[#B45309] hover:border-[#B45309] shadow-sm transition-all" aria-label="TikTok">
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M19.589 6.686a4.793 4.793 0 0 1-3.77-4.245V2h-3.445v13.672a2.896 2.896 0 0 1-5.201 1.743l-.007-.012a2.895 2.895 0 0 1 2.313-4.631c.314 0 .619.05 1.05.158V9.431c-.347-.047-.702-.072-1.062-.072C5.38 9.359 2 12.739 2 16.915 2 21.09 5.38 24.47 9.555 24.47c4.176 0 7.556-3.38 7.556-7.555V8.657a8.214 8.214 0 0 0 4.889 1.574V6.786a4.79 4.79 0 0 1-2.411-.1z"/></svg>
              </a>
              <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-xl bg-white border border-amber-900/15 flex items-center justify-center text-[#57534E] hover:text-[#B45309] hover:border-[#B45309] shadow-sm transition-all" aria-label="YouTube">
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
              </a>
            </div>
          </div>
        </div>

        <!-- Card 2 (Bawah): Kawasan Pendidikan Vokasi Terpadu & Maps -->
        <div class="liquid-glass-elevated rounded-3xl p-6 sm:p-7 border border-amber-900/12 space-y-4">
          <div>
            <span class="text-xs font-mono font-bold text-[#B45309] uppercase tracking-wider">LOKASI & AKSESIBILITAS</span>
            <h3 class="text-xl sm:text-2xl font-extrabold text-[#1C1917] mt-1">
              Kawasan Pendidikan Vokasi Terpadu
            </h3>
            <p class="text-xs sm:text-sm text-[#57534E] mt-1.5 leading-relaxed">
              <?= esc($kontak['alamat']) ?>
            </p>
          </div>

          <!-- Embed Google Maps Interaktif Langsung -->
          <div class="relative w-full h-48 sm:h-56 rounded-2xl overflow-hidden border border-amber-900/15 bg-stone-100 shadow-inner group">
            <iframe 
              class="w-full h-full border-0"
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126922.25032585252!2d106.75782977467265!3d-6.229386708453478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e49fe3bfb3%3A0x25b1e9c909a9f40f!2sJakarta%20Pusat%2C%20Kota%20Jakarta%20Pusat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
              allowfullscreen="" 
              loading="lazy" 
              referrerpolicy="no-referrer-when-downgrade"
              title="Peta Kampus Terpadu SMK Unggulan">
            </iframe>

            <!-- Floating Map Info Badge -->
            <div class="absolute top-2.5 left-2.5 z-10 flex items-center gap-2 pointer-events-none">
              <span class="px-2.5 py-1 rounded-full bg-white/95 backdrop-blur-md text-[#1C1917] font-extrabold text-[11px] shadow-md border border-amber-900/15 flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-red-500 animate-ping"></span>
                <span>📍 Kampus Utama</span>
              </span>
            </div>

            <!-- Quick Action Buttons on Map Bottom -->
            <div class="absolute bottom-2.5 right-2.5 z-10 flex items-center gap-1.5">
              <button 
                type="button" 
                data-open-maps 
                class="btn-amber-solid px-3 py-1.5 rounded-xl text-[11px] font-bold inline-flex items-center gap-1 shadow-md"
                title="Perbesar Peta & Rute Transportasi">
                <span>Perbesar</span>
                <svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 3 21 3 21 9"/><polyline points="9 21 3 21 3 15"/><line x1="21" y1="3" x2="14" y2="10"/><line x1="3" y1="21" x2="10" y2="14"/></svg>
              </button>
              <a 
                href="https://maps.google.com" 
                target="_blank" 
                rel="noopener noreferrer" 
                class="px-3 py-1.5 rounded-xl bg-white/95 hover:bg-white text-[#1C1917] border border-amber-900/15 text-[11px] font-bold inline-flex items-center gap-1 shadow-md transition-all"
                title="Buka di Aplikasi Google Maps">
                <span>Maps</span>
                <svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
              </a>
            </div>
          </div>

          <!-- Info Transit Ringkas -->
          <div class="grid grid-cols-2 gap-2.5 pt-1">
            <div class="p-2.5 rounded-xl bg-amber-50/70 border border-amber-900/10 text-xs">
              <span class="font-bold text-[#1C1917] block text-[11px]">🚇 LRT Vokasi</span>
              <span class="text-[#57534E] text-[10px]"><?= esc($kontak['transit_lrt']) ?></span>
            </div>
            <div class="p-2.5 rounded-xl bg-amber-50/70 border border-amber-900/10 text-xs">
              <span class="font-bold text-[#1C1917] block text-[11px]">🚗 Akses Tol</span>
              <span class="text-[#57534E] text-[10px]"><?= esc($kontak['transit_tol']) ?></span>
            </div>
          </div>
        </div>

      </div>

      <!-- Kolom Kanan: Formulir Isian Kirim Pesan & Masukan (Full Height Sejajar dengan Kiri) -->
      <div class="lg:col-span-6 flex flex-col">
        <div class="liquid-glass-elevated rounded-3xl p-6 sm:p-8 border border-amber-900/12 flex flex-col justify-between h-full space-y-6 shadow-xl relative overflow-hidden">
          
          <!-- Background Ambient Glow -->
          <div class="absolute -top-12 -right-12 w-48 h-48 bg-amber-400/10 rounded-full blur-3xl pointer-events-none"></div>

          <div>
            <div class="flex items-center justify-between">
              <span class="text-xs font-mono font-bold text-[#B45309] uppercase tracking-wider">FORMULIR KONTAK & KONSULTASI</span>
              <span class="px-2.5 py-0.5 rounded-full text-[10px] font-mono font-bold bg-amber-100 text-amber-900 border border-amber-300">
                Respon Cepat
              </span>
            </div>
            <h3 class="text-xl sm:text-2xl font-extrabold text-[#1C1917] mt-1">
              Kirimkan Pesan & Masukan
            </h3>
            <p class="text-xs sm:text-sm text-[#57534E] mt-1.5 leading-relaxed">
              Silakan isi formulir di bawah ini untuk konsultasi pendaftaran PPDB, kemitraan industri, atau pertanyaan seputar sekolah. Pesan Anda akan langsung masuk ke panel pengelola sekolah.
            </p>
          </div>

          <!-- Flash Message Status Feedback -->
          <?php if (session()->getFlashdata('pesan_success')): ?>
            <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-300 text-emerald-900 text-xs sm:text-sm font-semibold flex items-start gap-3 shadow-sm animate-in fade-in">
              <div class="w-6 h-6 rounded-full bg-emerald-500 text-white flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
              </div>
              <div class="leading-relaxed">
                <?= session()->getFlashdata('pesan_success') ?>
              </div>
            </div>
          <?php endif; ?>

          <?php if (session()->getFlashdata('pesan_errors')): ?>
            <div class="p-4 rounded-2xl bg-red-50 border border-red-300 text-red-900 text-xs space-y-1 shadow-sm">
              <div class="font-bold flex items-center gap-1.5 text-red-800">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                <span>Mohon periksa kesalahan input berikut:</span>
              </div>
              <ul class="list-disc list-inside space-y-0.5 text-red-700 pl-1">
                <?php foreach (session()->getFlashdata('pesan_errors') as $err): ?>
                  <li><?= esc($err) ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

          <!-- Formulir Kontak -->
          <form action="<?= base_url('pesan/kirim') ?>" method="POST" id="form-kirim-pesan" class="space-y-4 flex-1 flex flex-col justify-between">
            <?= csrf_field() ?>

            <div class="space-y-4">
              <!-- Field 1: Nama Lengkap -->
              <div>
                <label for="nama_lengkap" class="block text-xs font-mono font-bold uppercase text-[#1C1917] mb-1.5">
                  1. Nama Lengkap <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                  <input 
                    type="text" 
                    id="nama_lengkap" 
                    name="nama_lengkap" 
                    value="<?= esc(old('nama_lengkap') ?? '') ?>" 
                    required 
                    minlength="3" 
                    maxlength="150"
                    placeholder="Contoh: Muhammad Raihan Pratama" 
                    class="w-full px-4 py-3 rounded-2xl bg-white/90 border border-amber-900/15 focus:border-[#B45309] focus:ring-4 focus:ring-[#B45309]/15 text-xs sm:text-sm text-[#1C1917] placeholder-stone-400 outline-none transition-all shadow-sm">
                  <div class="absolute right-3.5 top-1/2 -translate-y-1/2 pointer-events-none text-stone-400">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                  </div>
                </div>
              </div>

              <!-- Field 2: Email -->
              <div>
                <label for="email" class="block text-xs font-mono font-bold uppercase text-[#1C1917] mb-1.5">
                  2. Alamat Email Aktif <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                  <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="<?= esc(old('email') ?? '') ?>" 
                    required 
                    maxlength="150"
                    placeholder="Contoh: raihan.pratama@gmail.com" 
                    class="w-full px-4 py-3 rounded-2xl bg-white/90 border border-amber-900/15 focus:border-[#B45309] focus:ring-4 focus:ring-[#B45309]/15 text-xs sm:text-sm text-[#1C1917] placeholder-stone-400 outline-none transition-all shadow-sm">
                  <div class="absolute right-3.5 top-1/2 -translate-y-1/2 pointer-events-none text-stone-400">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                  </div>
                </div>
              </div>

              <!-- Field 3: Pesan / Masukan -->
              <div>
                <div class="flex items-center justify-between mb-1.5">
                  <label for="pesan" class="block text-xs font-mono font-bold uppercase text-[#1C1917]">
                    3. Isi Pesan / Masukan <span class="text-red-500">*</span>
                  </label>
                  <span id="pesan-char-counter" class="text-[10px] font-mono text-stone-400">0 / 3000</span>
                </div>
                <textarea 
                  id="pesan" 
                  name="pesan" 
                  rows="4" 
                  required 
                  minlength="10" 
                  maxlength="3000"
                  placeholder="Tuliskan pertanyaan mengenai kurikulum, program magang industri, jalur pendaftaran, atau masukan untuk sekolah..." 
                  class="w-full px-4 py-3 rounded-2xl bg-white/90 border border-amber-900/15 focus:border-[#B45309] focus:ring-4 focus:ring-[#B45309]/15 text-xs sm:text-sm text-[#1C1917] placeholder-stone-400 outline-none transition-all shadow-sm leading-relaxed resize-none"><?= esc(old('pesan') ?? '') ?></textarea>
              </div>
            </div>

            <!-- Bottom Actions & Security Notice -->
            <div class="pt-3 space-y-3">
              <button 
                type="submit" 
                id="btn-submit-pesan" 
                style="background: linear-gradient(135deg, #B45309 0%, #D97706 50%, #92400E 100%); color: #FFFFFF;"
                class="w-full py-4 px-6 rounded-2xl bg-gradient-to-r from-amber-700 via-amber-600 to-amber-800 hover:from-amber-800 hover:to-amber-900 text-white font-extrabold text-sm sm:text-base flex items-center justify-center gap-2.5 shadow-xl shadow-amber-900/25 hover:shadow-2xl hover:scale-[1.01] active:scale-[0.99] transition-all cursor-pointer border border-amber-500/30">
                <span class="text-white font-black tracking-wide">Kirim Pesan ke Admin Sekolah</span>
                <svg class="w-4 h-4 text-amber-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
              </button>

              <div class="flex items-center justify-center gap-1.5 text-[11px] text-[#57534E]">
                <svg class="w-3.5 h-3.5 text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                <span>Pesan terenkripsi & diteruskan langsung ke sistem informasi administrasi.</span>
              </div>
            </div>

          </form>

        </div>
      </div>

    </div>

  </div>
</section>

<!-- =========================================================================
     DATA INJECTION DARI PHP CODEIGNITER 4 KE JAVASCRIPT CLIENT
     ========================================================================= -->
<script>
  window.DAFTAR_JURUSAN = <?= json_encode($jurusan, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) ?>;
  window.DAFTAR_BERITA  = <?= json_encode($berita, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) ?>;
  window.DAFTAR_GALERI  = <?= json_encode($galeri, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) ?>;
  window.BASE_URL = "<?= base_url() ?>";

  // Realtime Character Counter for Pesan
  document.addEventListener('DOMContentLoaded', function() {
    const pesanInput = document.getElementById('pesan');
    const charCounter = document.getElementById('pesan-char-counter');
    if (pesanInput && charCounter) {
      const updateCount = () => {
        const len = pesanInput.value.length;
        charCounter.textContent = `${len} / 3000`;
        if (len >= 2900) {
          charCounter.classList.add('text-red-500', 'font-bold');
        } else {
          charCounter.classList.remove('text-red-500', 'font-bold');
        }
      };
      pesanInput.addEventListener('input', updateCount);
      updateCount();
    }
  });
</script>

<?= $this->endSection() ?>
