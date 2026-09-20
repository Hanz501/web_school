<!-- Modal Pop-up Profil Sekolah Terpadu (#modal-profil) -->
<div id="modal-profil" class="modal-backdrop fixed inset-0 z-50 flex items-center justify-center p-3 sm:p-4 md:p-6 bg-black/60 backdrop-blur-sm overflow-y-auto" role="dialog" aria-modal="true" aria-labelledby="modal-profil-title">
  
  <div class="modal-dialog relative w-full max-w-2xl lg:max-w-5xl my-auto liquid-glass-elevated bg-[#FFFDFB]/98 rounded-2xl sm:rounded-3xl border border-amber-900/15 shadow-2xl overflow-hidden transform transition-all flex flex-col max-h-[92vh]">
    
    <!-- Modal Header with Badge & Close Button [X] -->
    <div class="p-5 sm:p-6 pb-4 border-b border-stone-200/80 flex items-center justify-between gap-4 bg-gradient-to-r from-amber-500/10 via-orange-500/5 to-transparent flex-shrink-0">
      <div class="flex items-center gap-3.5">
        <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-[#92400E] via-[#B45309] to-[#D97706] text-white flex items-center justify-center shadow-md border border-amber-300/30 flex-shrink-0">
          <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
            <path d="M12 8v4"/>
            <path d="M12 12l2.5 2.5"/>
            <circle cx="12" cy="12" r="1" fill="currentColor"/>
          </svg>
        </div>
        <div>
          <div class="flex items-center gap-2">
            <span class="px-2 py-0.5 rounded-md text-[10px] font-mono font-bold uppercase tracking-wider bg-amber-100 text-[#B45309] border border-amber-300">
              PROFIL RESMI
            </span>
            <span class="text-xs text-[#78716C] font-mono">NPSN: <?= esc($profil['npsn'] ?? '20194821') ?></span>
          </div>
          <h3 id="modal-profil-title" class="text-lg sm:text-2xl font-extrabold text-[#1C1917] tracking-tight leading-tight mt-0.5">
            <?= esc($profil['nama_sekolah'] ?? 'Profil SMK Unggulan') ?>
          </h3>
        </div>
      </div>
    </div>

    <!-- Multi-Tab Selector Bar -->
    <div class="px-5 sm:px-6 pt-3 pb-3 border-b border-stone-200/80 bg-stone-50/70 flex-shrink-0 flex items-center gap-2 overflow-x-auto no-scrollbar">
      <button type="button" data-profil-tab="sejarah" class="profil-tab-btn active-tab px-4 py-2 rounded-xl text-xs font-extrabold transition-all flex items-center gap-2 whitespace-nowrap bg-[#B45309] text-white shadow-sm">
        <span>📜</span>
        <span>Sejarah & Perjalanan</span>
      </button>
      <button type="button" data-profil-tab="visimisi" class="profil-tab-btn px-4 py-2 rounded-xl text-xs font-bold transition-all flex items-center gap-2 whitespace-nowrap bg-white text-[#57534E] hover:bg-amber-50 border border-amber-900/10">
        <span>🎯</span>
        <span>Visi, Misi & Nilai</span>
      </button>
      <button type="button" data-profil-tab="struktur" class="profil-tab-btn px-4 py-2 rounded-xl text-xs font-bold transition-all flex items-center gap-2 whitespace-nowrap bg-white text-[#57534E] hover:bg-amber-50 border border-amber-900/10">
        <span>👥</span>
        <span>Bagan Struktur Organisasi</span>
      </button>
      <button type="button" data-profil-tab="jurusan" class="profil-tab-btn px-4 py-2 rounded-xl text-xs font-bold transition-all flex items-center gap-2 whitespace-nowrap bg-white text-[#57534E] hover:bg-amber-50 border border-amber-900/10">
        <span>🎓</span>
        <span>Program Keahlian</span>
      </button>
    </div>

    <!-- Scrollable Tab Content Container -->
    <div class="p-5 sm:p-7 overflow-y-auto flex-grow space-y-6">
      
      <!-- ===================================================================
           TAB 1: SEJARAH & MILESTONE SEKOLAH (DINAMIS DARI DATABASE)
           =================================================================== -->
      <div id="tab-content-sejarah" class="profil-tab-pane space-y-6">
        <div class="liquid-glass rounded-2xl p-5 sm:p-6 border border-amber-900/12 bg-amber-50/40">
          <h4 class="text-base sm:text-lg font-extrabold text-[#1C1917] mb-2 flex items-center gap-2">
            <span class="w-2.5 h-2.5 rounded-full bg-[#B45309]"></span>
            Kilasan Sejarah & Dedikasi Vokasi
          </h4>
          <p class="text-xs sm:text-sm text-[#57534E] leading-relaxed">
            <?= esc($profil['ringkasan_sejarah'] ?? 'SMK Unggulan didirikan dengan dedikasi mencetak talenta vokasi berdaya saing global.') ?>
          </p>
        </div>

        <!-- Timeline Sejarah Vertikal (Looping dari Tabel `sejarah`) -->
        <div class="space-y-4 relative before:absolute before:inset-0 before:left-4 sm:before:left-6 before:w-0.5 before:bg-amber-200">
          <?php if (!empty($sejarahList)): ?>
            <?php foreach ($sejarahList as $s): ?>
              <?php 
                $scheme = $s['color_scheme'] ?? 'amber';
                $circleBg = $scheme === 'emerald' ? 'bg-[#059669]' : ($scheme === 'orange' ? 'bg-[#D97706]' : 'bg-[#B45309]');
                $borderBadge = $scheme === 'emerald' ? 'border-[#059669]/30 text-[#059669] bg-emerald-50' : 'border-amber-200 text-[#B45309] bg-amber-50';
                $cardBg = $scheme === 'emerald' ? 'bg-emerald-50/30 border-[#059669]/20' : 'bg-white/90 border-amber-900/10';
                $shortYear = substr($s['tahun'], -2);
              ?>
              <div class="relative flex items-start gap-4 sm:gap-6 pl-1 sm:pl-2">
                <div class="w-7 h-7 sm:w-9 sm:h-9 rounded-full <?= $circleBg ?> text-white flex items-center justify-center font-mono font-bold text-xs shadow-md z-10 flex-shrink-0 border-2 border-white">
                  <?= esc($shortYear) ?>
                </div>
                <div class="liquid-glass p-4 sm:p-5 rounded-2xl border <?= $cardBg ?> flex-grow">
                  <div class="flex items-center justify-between mb-1">
                    <h5 class="text-sm sm:text-base font-extrabold text-[#1C1917]"><?= esc($s['judul']) ?></h5>
                    <span class="text-xs font-mono font-bold px-2 py-0.5 rounded border <?= $borderBadge ?>"><?= esc($s['badge_tahun']) ?></span>
                  </div>
                  <p class="text-xs text-[#57534E] leading-relaxed">
                    <?= esc($s['deskripsi']) ?>
                  </p>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p class="text-xs text-stone-500 py-4 text-center">Belum ada linimasa sejarah yang dicatat.</p>
          <?php endif; ?>
        </div>
      </div>

      <!-- ===================================================================
           TAB 2: VISI, MISI & NILAI BUDAYA (DINAMIS DARI DATABASE)
           =================================================================== -->
      <div id="tab-content-visimisi" class="profil-tab-pane hidden space-y-6">
        
        <!-- Kartu Visi Utama -->
        <div class="p-6 rounded-2xl bg-gradient-to-tr from-amber-600/15 via-orange-500/10 to-amber-50 border border-amber-900/15">
          <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#B45309] text-white text-[11px] font-mono font-bold mb-3 shadow-sm">
            <span>🎯</span>
            <span>VISI SEKOLAH</span>
          </div>
          <h4 class="text-base sm:text-lg md:text-xl font-extrabold text-[#1C1917] leading-snug">
            "<?= esc($profil['visi'] ?? 'Menjadi Pusat Keunggulan Pendidikan Vokasi Terdepan.') ?>"
          </h4>
        </div>

        <!-- Misi Strategis (Grid 2 Kolom Dinamis) -->
        <div>
          <h4 class="text-sm font-mono font-bold uppercase tracking-wider text-[#B45309] mb-3">Misi Strategis Vokasi</h4>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-3.5">
            <?php 
              $misiList = $profil['misi'] ?? [];
              foreach ($misiList as $mIdx => $misi): 
            ?>
              <div class="p-4 rounded-xl bg-white border border-amber-900/10 shadow-sm flex items-start gap-3">
                <span class="w-6 h-6 rounded-lg bg-amber-100 text-[#B45309] font-mono font-extrabold text-xs flex items-center justify-center flex-shrink-0 mt-0.5"><?= $mIdx + 1 ?></span>
                <p class="text-xs text-[#57534E] leading-relaxed">
                  <?= esc($misi) ?>
                </p>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- 5 Pilar Nilai Budaya Utama (PRIDE / Core Values Dinamis) -->
        <div class="p-5 rounded-2xl bg-amber-50/60 border border-amber-900/10">
          <h4 class="text-xs font-mono font-bold uppercase tracking-wider text-[#B45309] mb-3">5 Pilar Nilai Budaya (PRIDE)</h4>
          <div class="grid grid-cols-2 sm:grid-cols-5 gap-2.5 text-center">
            <?php 
              $nilaiBudayaList = $profil['nilai_budaya'] ?? [];
              foreach ($nilaiBudayaList as $nb): 
            ?>
              <div class="p-2.5 rounded-xl bg-white border border-amber-900/10 shadow-xs">
                <span class="text-lg"><?= esc($nb['icon'] ?? '💎') ?></span>
                <span class="block text-xs font-extrabold text-[#1C1917] mt-1"><?= esc($nb['label'] ?? '') ?></span>
                <span class="text-[10px] text-[#78716C]"><?= esc($nb['sub'] ?? '') ?></span>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

      </div>

      <!-- ===================================================================
           TAB 3: BAGAN STRUKTUR ORGANISASI (DINAMIS DARI DATABASE)
           =================================================================== -->
      <div id="tab-content-struktur" class="profil-tab-pane hidden space-y-6">
        
        <!-- Header Info Bagan -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 p-3.5 rounded-2xl bg-amber-500/10 border border-amber-900/15">
          <div class="flex items-center gap-2.5">
            <span class="text-lg">🌳</span>
            <div>
              <h4 class="text-xs sm:text-sm font-extrabold text-[#1C1917]">Bagan Hierarki Organisasi & Tata Kelola</h4>
              <p class="text-[11px] text-[#57534E]">Struktur kepemimpinan, unit penjamin mutu, manajemen waka, dan kepala program keahlian.</p>
            </div>
          </div>
          <div class="text-[11px] font-mono text-[#B45309] font-bold bg-white/80 px-2.5 py-1 rounded-lg border border-amber-900/10 self-start sm:self-center">
            Periode 2024 - 2026
          </div>
        </div>

        <!-- Scrollable Organigram Canvas -->
        <div class="overflow-x-auto pb-4 no-scrollbar">
          <div class="min-w-[760px] p-6 rounded-3xl bg-gradient-to-b from-amber-50/50 via-white to-amber-50/30 border border-amber-900/12 flex flex-col items-center">
            
            <!-- ================= LEVEL 1: KEPALA SEKOLAH (PUNCAK) ================= -->
            <?php $ks = $strukturOrganisasi['kepala_sekolah'] ?? null; ?>
            <div class="relative z-10 flex flex-col items-center">
              <div class="w-80 p-5 rounded-2xl bg-white border-2 border-[#B45309] shadow-lg hover:shadow-xl transition-all text-center relative group">
                <!-- Glowing Crown/Badge -->
                <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 px-3 py-0.5 rounded-full bg-[#B45309] text-white text-[10px] font-mono font-extrabold tracking-wider shadow-sm uppercase">
                  <?= esc($ks['badge_label'] ?? 'Pimpinan Puncak') ?>
                </div>
                
                <!-- Avatar KS -->
                <div class="w-16 h-16 rounded-full mx-auto mb-2.5 bg-gradient-to-tr from-[#92400E] via-[#B45309] to-[#D97706] text-white flex items-center justify-center text-xl font-extrabold shadow-md border-2 border-amber-200 overflow-hidden">
                  <?php if (!empty($ks['foto']) && file_exists(FCPATH . 'images/struktur/' . $ks['foto'])): ?>
                    <img src="<?= base_url('images/struktur/' . $ks['foto']) ?>" class="w-full h-full object-cover">
                  <?php else: ?>
                    <span><?= esc($ks['icon'] ?? '👨‍💼') ?></span>
                  <?php endif; ?>
                </div>
                
                <h5 class="text-sm font-extrabold text-[#1C1917] leading-tight">
                  <?= esc($ks['nama'] ?? 'Kepala Sekolah') ?>
                </h5>
                <span class="text-xs font-bold text-[#B45309] block mt-0.5"><?= esc($ks['jabatan'] ?? 'Kepala Sekolah') ?></span>
                <p class="text-[10px] text-[#78716C] mt-1 italic"><?= esc($ks['sub_jabatan'] ?? 'Penanggung Jawab Utama') ?></p>
              </div>

              <!-- Garis Vertikal Turun dari Kepala Sekolah -->
              <div class="w-0.5 h-8 bg-amber-400"></div>
            </div>

            <!-- ================= LEVEL 1.5: KOMITE & TATA USAHA (SAYAP) ================= -->
            <?php 
              $komite = $strukturOrganisasi['komite'] ?? null; 
              $tu     = $strukturOrganisasi['tata_usaha'] ?? null;
            ?>
            <div class="relative w-full max-w-xl flex items-center justify-between">
              
              <!-- Garis Horizontal Penghubung Komite & KTU -->
              <div class="absolute top-1/2 left-16 right-16 h-0.5 bg-amber-300 -translate-y-1/2 z-0"></div>
              
              <!-- Titik Tengah Cabang Turun -->
              <div class="absolute top-1/2 left-1/2 -translate-x-1/2 w-3 h-3 rounded-full bg-amber-500 border-2 border-white shadow-sm z-10"></div>

              <!-- Sayap Kiri: Komite Sekolah -->
              <div class="relative z-10 w-52 p-3.5 rounded-xl bg-white border border-amber-900/15 shadow-sm text-center">
                <span class="px-2 py-0.5 rounded text-[9px] font-mono font-bold uppercase bg-stone-100 text-[#57534E]"><?= esc($komite['badge_label'] ?? 'Mitra / Penasihat') ?></span>
                <div class="w-9 h-9 rounded-full bg-stone-100 text-[#57534E] flex items-center justify-center text-sm mx-auto my-1 overflow-hidden">
                  <?php if (!empty($komite['foto']) && file_exists(FCPATH . 'images/struktur/' . $komite['foto'])): ?>
                    <img src="<?= base_url('images/struktur/' . $komite['foto']) ?>" class="w-full h-full object-cover">
                  <?php else: ?>
                    <?= esc($komite['icon'] ?? '🏛️') ?>
                  <?php endif; ?>
                </div>
                <h6 class="text-xs font-bold text-[#1C1917]"><?= esc($komite['nama'] ?? 'Ketua Komite') ?></h6>
                <span class="text-[10px] text-[#B45309] font-semibold"><?= esc($komite['jabatan'] ?? 'Komite Sekolah') ?></span>
              </div>

              <!-- Sayap Kanan: Kepala Tata Usaha -->
              <div class="relative z-10 w-52 p-3.5 rounded-xl bg-white border border-amber-900/15 shadow-sm text-center">
                <span class="px-2 py-0.5 rounded text-[9px] font-mono font-bold uppercase bg-stone-100 text-[#57534E]"><?= esc($tu['badge_label'] ?? 'Administrasi') ?></span>
                <div class="w-9 h-9 rounded-full bg-stone-100 text-[#57534E] flex items-center justify-center text-sm mx-auto my-1 overflow-hidden">
                  <?php if (!empty($tu['foto']) && file_exists(FCPATH . 'images/struktur/' . $tu['foto'])): ?>
                    <img src="<?= base_url('images/struktur/' . $tu['foto']) ?>" class="w-full h-full object-cover">
                  <?php else: ?>
                    <?= esc($tu['icon'] ?? '📋') ?>
                  <?php endif; ?>
                </div>
                <h6 class="text-xs font-bold text-[#1C1917]"><?= esc($tu['nama'] ?? 'Kepala Tata Usaha') ?></h6>
                <span class="text-[10px] text-[#B45309] font-semibold"><?= esc($tu['jabatan'] ?? 'Tata Usaha') ?></span>
              </div>

            </div>

            <!-- Garis Vertikal Turun ke Level Waka -->
            <div class="w-0.5 h-8 bg-amber-400"></div>

            <!-- ================= LEVEL 2: WAKIL KEPALA SEKOLAH ================= -->
            <?php $wakaList = $strukturOrganisasi['waka'] ?? []; ?>
            <div class="relative w-full z-10">
              
              <!-- Garis Horizontal Bar Menghubungkan Waka -->
              <div class="absolute top-0 left-12 right-12 h-0.5 bg-amber-400"></div>
              
              <!-- Grid Waka Cards -->
              <div class="grid grid-cols-<?= max(1, count($wakaList)) ?> gap-4 pt-4">
                <?php foreach ($wakaList as $wIdx => $waka): ?>
                  <div class="flex flex-col items-center">
                    <div class="w-0.5 h-4 bg-amber-400 -mt-4 mb-0"></div>
                    <div class="w-full p-4 rounded-2xl bg-white border border-amber-900/15 shadow-sm hover:border-[#B45309] hover:shadow-md transition-all text-center">
                      <span class="px-2 py-0.5 rounded text-[9px] font-mono font-bold uppercase bg-amber-100 text-[#B45309] block mb-1"><?= esc($waka['badge_label'] ?: 'Waka ' . ($wIdx + 1)) ?></span>
                      <div class="w-10 h-10 rounded-full bg-amber-500/15 text-[#B45309] flex items-center justify-center text-base mx-auto mb-1.5 overflow-hidden">
                        <?php if (!empty($waka['foto']) && file_exists(FCPATH . 'images/struktur/' . $waka['foto'])): ?>
                          <img src="<?= base_url('images/struktur/' . $waka['foto']) ?>" class="w-full h-full object-cover">
                        <?php else: ?>
                          <?= esc($waka['icon'] ?? '📚') ?>
                        <?php endif; ?>
                      </div>
                      <h6 class="text-xs font-extrabold text-[#1C1917] leading-tight"><?= esc($waka['nama']) ?></h6>
                      <span class="text-[11px] font-bold text-[#B45309] block mt-0.5"><?= esc($waka['jabatan']) ?></span>
                      <p class="text-[10px] text-[#78716C] mt-1"><?= esc($waka['sub_jabatan'] ?? '') ?></p>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>

            <!-- Garis Vertikal Turun ke Level Kaprodi -->
            <div class="w-0.5 h-8 bg-amber-400"></div>

            <!-- ================= LEVEL 3: KEPALA PROGRAM KEAHLIAN (KAPRODI) ================= -->
            <?php $kaprodiList = $strukturOrganisasi['kaprodi'] ?? []; ?>
            <div class="relative w-full z-10">
              
              <!-- Garis Horizontal Bar Menghubungkan Kaprodi -->
              <div class="absolute top-0 left-12 right-12 h-0.5 bg-amber-400"></div>
              
              <!-- Grid Kaprodi Cards -->
              <div class="grid grid-cols-<?= max(1, count($kaprodiList)) ?> gap-4 pt-4">
                <?php foreach ($kaprodiList as $kaprodi): ?>
                  <div class="flex flex-col items-center">
                    <div class="w-0.5 h-4 bg-amber-400 -mt-4 mb-0"></div>
                    <div class="w-full p-4 rounded-2xl bg-amber-50/80 border border-amber-900/12 shadow-xs hover:shadow-md transition-all text-center">
                      <span class="px-2 py-0.5 rounded text-[9px] font-mono font-bold uppercase bg-amber-200 text-[#92400E] block mb-1"><?= esc($kaprodi['badge_label'] ?: 'Kaprodi') ?></span>
                      <div class="w-10 h-10 rounded-full bg-white text-[#B45309] flex items-center justify-center text-base mx-auto mb-1.5 shadow-xs overflow-hidden">
                        <?php if (!empty($kaprodi['foto']) && file_exists(FCPATH . 'images/struktur/' . $kaprodi['foto'])): ?>
                          <img src="<?= base_url('images/struktur/' . $kaprodi['foto']) ?>" class="w-full h-full object-cover">
                        <?php else: ?>
                          <?= esc($kaprodi['icon'] ?? '💻') ?>
                        <?php endif; ?>
                      </div>
                      <h6 class="text-xs font-extrabold text-[#1C1917] leading-tight"><?= esc($kaprodi['nama']) ?></h6>
                      <span class="text-[11px] font-bold text-[#B45309] block mt-0.5"><?= esc($kaprodi['jabatan']) ?></span>
                      <p class="text-[10px] text-[#78716C] mt-1"><?= esc($kaprodi['sub_jabatan'] ?? '') ?></p>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>

          </div>
        </div>

        <div class="text-center text-xs text-[#78716C] font-mono flex items-center justify-center gap-1.5">
          <span>💡</span>
          <span>Tip: Geser / scroll ke samping pada layar kecil untuk melihat bagan selengkapnya</span>
        </div>

      </div>

      <!-- ===================================================================
           TAB 4: PROGRAM KEAHLIAN RINGKAS (DINAMIS DARI DATABASE `jurusan`)
           =================================================================== -->
      <div id="tab-content-jurusan" class="profil-tab-pane hidden space-y-4">
        
        <div class="flex items-center justify-between">
          <p class="text-xs text-[#57534E]">
            SMK Unggulan menyelenggarakan <?= count($jurusan) ?> Program Keahlian dengan kurikulum <em>link and match</em> berstandar industri 4.0:
          </p>
          <a href="#jurusan" data-close-modal class="text-xs font-extrabold text-[#B45309] hover:underline flex items-center gap-1">
            <span>Buka Roda Interaktif</span>
            <span>➔</span>
          </a>
        </div>

        <!-- Dynamic Grid Jurusan Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <?php foreach ($jurusan as $j): ?>
            <div class="p-4 rounded-2xl bg-white border border-amber-900/12 shadow-xs hover:border-[#B45309] transition-all space-y-2">
              <div class="flex items-center justify-between">
                <span class="px-2 py-0.5 rounded-md text-[10px] font-mono font-bold bg-amber-100 text-[#B45309]"><?= esc($j['kode']) ?></span>
                <span class="text-[10px] font-mono text-[#059669] font-bold">Kuota: <?= esc($j['kuota']) ?> Siswa</span>
              </div>
              <h5 class="text-sm font-extrabold text-[#1C1917]"><?= esc($j['nama']) ?></h5>
              <p class="text-xs text-[#57534E] leading-relaxed line-clamp-3">
                <?= esc($j['deskripsi']) ?>
              </p>
              <div class="pt-2 border-t border-stone-100 text-[11px] text-[#78716C]">
                <strong>Sertifikasi:</strong> <?= esc($j['sertifikasi'] ?? '-') ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

    </div>

    <!-- Modal Footer -->
    <div class="p-4 sm:p-5 bg-stone-50/90 border-t border-stone-200/80 flex flex-wrap items-center justify-between gap-3 flex-shrink-0">
      <div class="flex items-center gap-2 text-[11px] text-[#78716C]">
        <svg class="w-4 h-4 text-[#B45309]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        <span>Lembaga Pendidikan Vokasi Terakreditasi <?= esc($profil['akreditasi'] ?? 'A (Unggul) BAN-S/M') ?></span>
      </div>
      <div class="flex items-center gap-2">
        <a href="#daftar" data-close-modal class="btn-amber-solid px-5 py-2 rounded-xl text-xs font-extrabold shadow-sm">
          Daftar PPDB Online ➔
        </a>
        <button type="button" data-close-modal class="px-4 py-2 rounded-xl bg-white border border-stone-300 hover:bg-stone-100 text-xs font-bold text-[#57534E] transition-colors">
          Tutup
        </button>
      </div>
    </div>

  </div>
</div>
