<!-- Modal Pop-up Berita & Artikel Lengkap (#modal-artikel) -->
<div id="modal-artikel" class="modal-backdrop fixed inset-0 z-50 flex items-center justify-center p-3 sm:p-4 md:p-6 bg-black/60 backdrop-blur-sm overflow-y-auto" role="dialog" aria-modal="true" aria-labelledby="modal-artikel-title">
  
  <div class="modal-dialog relative w-full max-w-lg sm:max-w-xl md:max-w-2xl my-auto liquid-glass-elevated bg-white/98 rounded-2xl sm:rounded-3xl border border-amber-900/15 shadow-2xl overflow-hidden transform transition-all">
    
    <!-- Modal Header with Badge -->
    <div class="p-5 sm:p-6 pb-3 sm:pb-4 border-b border-stone-200/80">
      <div class="space-y-1.5">
        <div class="flex items-center gap-2">
          <span id="modal-artikel-badge" class="px-2.5 py-0.5 rounded-full text-[11px] font-bold uppercase tracking-wider bg-amber-100 text-[#B45309] border border-amber-300">
            Karya Siswa
          </span>
          <span class="text-stone-300">•</span>
          <span id="modal-artikel-time" class="text-[11px] text-[#78716C] font-mono">3 menit baca</span>
        </div>
        <h3 id="modal-artikel-title" class="text-base sm:text-lg md:text-xl font-extrabold text-[#1C1917] tracking-tight leading-snug">
          Judul Artikel Berita
        </h3>
        <p id="modal-artikel-meta" class="text-xs font-semibold text-[#B45309]">
          Humas Vokasi • 12 Mei 2025
        </p>
      </div>
    </div>

    <!-- Article Content Body (Full Image + 3-4 Paragraphs) -->
    <div class="p-5 sm:p-6 max-h-[58vh] sm:max-h-[62vh] overflow-y-auto">
      
      <!-- Modal Banner Image Container -->
      <div id="modal-artikel-image-box" class="relative w-full h-36 sm:h-44 md:h-48 rounded-xl sm:rounded-2xl overflow-hidden mb-4 bg-stone-100 border border-amber-900/10 shadow-inner">
        <div class="w-full h-full bg-gradient-to-tr from-amber-600/20 via-orange-500/10 to-amber-100/40 flex flex-col items-center justify-center text-center p-4">
          <div class="w-10 h-10 rounded-xl bg-amber-500/20 text-[#B45309] flex items-center justify-center mb-1.5 shadow-sm">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
          </div>
          <span class="text-xs font-bold text-[#1C1917]">Dokumentasi Warta SMK Unggulan</span>
          <span class="text-[10px] text-[#78716C]">Pusat Keunggulan Vokasi 2025</span>
        </div>
      </div>

      <!-- Article Rich Text Paragraphs -->
      <div id="modal-artikel-content" class="text-[#57534E] space-y-3 text-xs sm:text-sm leading-relaxed">
        <!-- Injected dynamically by modal-handler.js -->
      </div>

    </div>

    <!-- Modal Footer -->
    <div class="p-4 sm:p-5 bg-stone-50/90 border-t border-stone-200/80 flex flex-wrap items-center justify-between gap-3">
      <div class="flex items-center gap-2 text-[11px] text-[#78716C]">
        <svg class="w-3.5 h-3.5 text-[#B45309]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
        <span>Publikasi Resmi Humas SMK Unggulan</span>
      </div>
      <button type="button" data-close-modal class="btn-amber-solid px-5 py-2 rounded-xl text-xs font-extrabold shadow-sm">
        Tutup
      </button>
    </div>

  </div>
</div>

<!-- Alias for modal-berita to support both ID triggers seamlessly -->
<div id="modal-berita" class="hidden"></div>
