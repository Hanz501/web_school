<!-- Sticky Header (Navbar) -->
<header class="sticky top-0 z-50 w-full bg-[#FFF8F6]/80 backdrop-blur-md border-b border-amber-900/10 transition-all duration-300">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-20">
      
      <!-- Kiri: Logo SMK UNGGULAN (Ikon emblem perisai sirkuit mikro bernuansa warm bronze) -->
      <a href="<?= base_url() ?>" class="flex items-center gap-3.5 group">
        <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-[#92400E] via-[#B45309] to-[#D97706] text-white flex items-center justify-center shadow-md shadow-amber-900/20 group-hover:scale-105 transition-transform duration-300 border border-amber-300/30">
          <!-- Emblem Perisai Sirkuit Mikro -->
          <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
            <path d="M12 8v4"/>
            <path d="M12 12l2.5 2.5"/>
            <circle cx="12" cy="12" r="1" fill="currentColor"/>
          </svg>
        </div>
        <div class="flex flex-col">
          <div class="flex items-center gap-2">
            <span class="font-extrabold text-lg sm:text-xl tracking-tight text-[#1C1917] leading-tight">SMK UNGGULAN</span>
          </div>
          <span class="text-[10px] sm:text-[11px] font-bold tracking-widest text-[#B45309] uppercase">PUSAT KEUNGGULAN</span>
        </div>
      </a>

      <!-- Tengah: Menu Horizontal -->
      <nav id="main-nav" class="relative hidden md:flex items-center gap-1 lg:gap-2">
        <!-- Floating Animated Sliding Indicator Line -->
        <span id="nav-active-glider" class="absolute bottom-1 h-[2.5px] bg-gradient-to-r from-amber-600 to-orange-500 rounded-full pointer-events-none transition-all duration-300 ease-[cubic-bezier(0.25,1,0.5,1)]" style="left: 0; width: 0; opacity: 0;"></span>

        <a href="#hero" class="nav-item relative px-3.5 py-2 text-sm font-bold text-[#B45309] rounded-xl transition-colors duration-200">
          <span>Beranda</span>
        </a>

        <!-- Profil Sekolah (Memicu Modal Popup Terpadu Tanpa Buka Halaman Baru) -->
        <div class="relative group/nav-dropdown">
          <button type="button" data-open-profil="sejarah" class="px-3.5 py-2 text-sm font-semibold text-[#57534E] hover:text-[#B45309] hover:bg-amber-50/60 rounded-xl transition-colors inline-flex items-center gap-1.5 cursor-pointer">
            <span>Profil Sekolah</span>
            <svg class="w-3.5 h-3.5 opacity-70 group-hover/nav-dropdown:rotate-180 transition-transform duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          
          <!-- Dropdown Submenu -->
          <div class="absolute top-full left-0 mt-1 w-52 py-2 bg-white/95 backdrop-blur-md rounded-2xl border border-amber-900/12 shadow-xl opacity-0 invisible group-hover/nav-dropdown:opacity-100 group-hover/nav-dropdown:visible transition-all duration-200 z-50">
            <button type="button" data-open-profil="sejarah" class="w-full text-left px-4 py-2 text-xs font-bold text-[#57534E] hover:text-[#B45309] hover:bg-amber-50/80 flex items-center gap-2 transition-colors">
              <span>📜</span>
              <span>Sejarah Sekolah</span>
            </button>
            <button type="button" data-open-profil="visimisi" class="w-full text-left px-4 py-2 text-xs font-bold text-[#57534E] hover:text-[#B45309] hover:bg-amber-50/80 flex items-center gap-2 transition-colors">
              <span>🎯</span>
              <span>Visi & Misi</span>
            </button>
            <button type="button" data-open-profil="struktur" class="w-full text-left px-4 py-2 text-xs font-bold text-[#57534E] hover:text-[#B45309] hover:bg-amber-50/80 flex items-center gap-2 transition-colors">
              <span>👥</span>
              <span>Struktur Organisasi</span>
            </button>
            <button type="button" data-open-profil="jurusan" class="w-full text-left px-4 py-2 text-xs font-bold text-[#57534E] hover:text-[#B45309] hover:bg-amber-50/80 flex items-center gap-2 transition-colors">
              <span>🎓</span>
              <span>Ringkasan Jurusan</span>
            </button>
          </div>
        </div>

        <a href="#jurusan" class="nav-item relative px-3.5 py-2 text-sm font-semibold text-[#57534E] hover:text-[#B45309] hover:bg-amber-50/60 rounded-xl transition-colors duration-200">
          <span>Program Keahlian</span>
        </a>
        <a href="#galeri" class="nav-item relative px-3.5 py-2 text-sm font-semibold text-[#57534E] hover:text-[#B45309] hover:bg-amber-50/60 rounded-xl transition-colors duration-200">
          <span>Galeri & Event</span>
        </a>
        <a href="#berita" class="nav-item relative px-3.5 py-2 text-sm font-semibold text-[#57534E] hover:text-[#B45309] hover:bg-amber-50/60 rounded-xl transition-colors duration-200">
          <span>Berita & Artikel</span>
        </a>
        <a href="#kontak" class="nav-item relative px-3.5 py-2 text-sm font-semibold text-[#57534E] hover:text-[#B45309] hover:bg-amber-50/60 rounded-xl transition-colors duration-200">
          <span>Kontak</span>
        </a>
      </nav>

      <!-- Kanan: Tombol Solid Amber "PPDB Online" & Tombol Ikon User Lingkaran (Portal Siswa) -->
      <div class="flex items-center gap-3">
        <!-- Tombol Solid Amber PPDB Online -->
        <a href="#daftar" class="btn-amber-solid px-5 py-2.5 rounded-full text-xs sm:text-sm font-extrabold inline-flex items-center gap-2">
          <span>PPDB Online</span>
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>

        <!-- Tombol Ikon User Lingkaran (Portal Siswa / Admin) -->
        <a href="<?= base_url('admin/login') ?>" class="w-10 h-10 rounded-full bg-white/90 border border-amber-900/15 text-[#57534E] hover:text-[#B45309] hover:border-[#B45309] hover:bg-amber-50 flex items-center justify-center transition-all shadow-sm" title="Portal Siswa & Guru" aria-label="Portal Siswa">
          <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
            <circle cx="12" cy="7" r="4"/>
          </svg>
        </a>

        <!-- Mobile Toggle Button -->
        <button id="mobile-menu-toggle" type="button" class="md:hidden p-2 rounded-xl text-[#1C1917] hover:bg-amber-100/50 focus:outline-none" aria-label="Menu Navigasi">
          <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
        </button>
      </div>

    </div>

    <!-- Mobile Drawer Menu -->
    <div id="mobile-nav-drawer" class="hidden md:hidden pb-4 pt-2 border-t border-amber-900/10">
      <div class="flex flex-col space-y-1.5 liquid-glass-elevated p-4 rounded-2xl border border-amber-900/10">
        <a href="#hero" class="mobile-nav-item px-4 py-2.5 rounded-xl text-sm font-bold text-[#B45309] bg-amber-50/80 transition-all">Beranda</a>
        
        <!-- Mobile Profil Modal Trigger -->
        <div class="px-4 py-2 rounded-xl bg-amber-50/50 border border-amber-900/10 space-y-1">
          <div class="text-[11px] font-mono font-bold uppercase text-[#B45309]">Profil Sekolah</div>
          <div class="grid grid-cols-2 gap-1.5 pt-1">
            <button type="button" data-open-profil="sejarah" class="text-left px-2.5 py-1.5 rounded-lg bg-white text-xs font-bold text-[#57534E] hover:text-[#B45309]">📜 Sejarah</button>
            <button type="button" data-open-profil="visimisi" class="text-left px-2.5 py-1.5 rounded-lg bg-white text-xs font-bold text-[#57534E] hover:text-[#B45309]">🎯 Visi Misi</button>
            <button type="button" data-open-profil="struktur" class="text-left px-2.5 py-1.5 rounded-lg bg-white text-xs font-bold text-[#57534E] hover:text-[#B45309]">👥 Struktur</button>
            <button type="button" data-open-profil="jurusan" class="text-left px-2.5 py-1.5 rounded-lg bg-white text-xs font-bold text-[#57534E] hover:text-[#B45309]">🎓 Jurusan</button>
          </div>
        </div>

        <a href="#jurusan" class="mobile-nav-item px-4 py-2.5 rounded-xl text-sm font-semibold text-[#57534E] hover:bg-amber-50 transition-all">Program Keahlian</a>
        <a href="#galeri" class="mobile-nav-item px-4 py-2.5 rounded-xl text-sm font-semibold text-[#57534E] hover:bg-amber-50 transition-all">Galeri & Event</a>
        <a href="#berita" class="mobile-nav-item px-4 py-2.5 rounded-xl text-sm font-semibold text-[#57534E] hover:bg-amber-50 transition-all">Berita & Artikel</a>
        <a href="#kontak" class="mobile-nav-item px-4 py-2.5 rounded-xl text-sm font-semibold text-[#57534E] hover:bg-amber-50 transition-all">Kontak</a>
        <div class="pt-2 border-t border-stone-200 flex items-center justify-between">
          <a href="<?= base_url('admin/login') ?>" class="text-xs font-bold text-[#57534E] flex items-center gap-1.5">
            <svg class="w-4 h-4 text-[#B45309]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            <span>Portal Siswa & GTK</span>
          </a>
          <button type="button" data-open-maps class="text-xs font-bold text-[#B45309]">📍 Peta Kampus</button>
        </div>
      </div>
    </div>

  </div>
</header>
