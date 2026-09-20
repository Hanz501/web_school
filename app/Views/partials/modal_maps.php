<!-- Modal Pop-up Google Maps Interaktif (#modal-maps) -->
<div id="modal-maps" class="modal-backdrop fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 bg-black/50 backdrop-blur-sm overflow-y-auto" role="dialog" aria-modal="true" aria-labelledby="modal-maps-title">
  
  <div class="modal-dialog relative w-full max-w-4xl my-8 liquid-glass-elevated bg-white/95 rounded-3xl border border-amber-900/15 shadow-2xl overflow-hidden">
    
    <!-- Modal Header -->
    <div class="p-6 sm:p-7 border-b border-stone-200/80 flex items-center justify-between">
      <div class="flex items-center gap-3.5">
        <div class="w-10 h-10 rounded-2xl bg-amber-500/15 text-[#B45309] flex items-center justify-center border border-amber-900/10">
          <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
            <circle cx="12" cy="10" r="3"/>
          </svg>
        </div>
        <div>
          <h3 id="modal-maps-title" class="text-xl font-extrabold text-[#1C1917] tracking-tight">
            Kawasan Pendidikan Vokasi Terpadu
          </h3>
          <p class="text-xs text-[#78716C]">Jl. Teknologi Vokasi No. 42 • Kompleks Kawasan Industri & Sains Terpadu</p>
        </div>
      </div>
    </div>

    <!-- Map Body Area -->
    <div class="p-6 sm:p-7 space-y-6">
      
      <!-- Interactive Google Maps Frame -->
      <div class="relative w-full h-80 sm:h-96 rounded-2xl overflow-hidden border border-amber-900/15 bg-stone-100 shadow-inner">
        <iframe 
          class="w-full h-full border-0"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126922.25032585252!2d106.75782977467265!3d-6.229386708453478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e49fe3bfb3%3A0x25b1e9c909a9f40f!2sJakarta%20Pusat%2C%20Kota%20Jakarta%20Pusat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
          allowfullscreen="" 
          loading="lazy" 
          referrerpolicy="no-referrer-when-downgrade"
          title="Peta Kampus Terpadu SMK Unggulan">
        </iframe>

        <!-- Floating Map Overlay Card -->
        <div class="absolute bottom-4 left-4 right-4 sm:right-auto sm:max-w-sm liquid-glass-elevated p-4 rounded-2xl border border-amber-900/15 shadow-xl text-xs">
          <div class="flex items-center gap-2 font-bold text-[#B45309] mb-1">
            <span class="w-2.5 h-2.5 rounded-full bg-red-500 animate-ping"></span>
            Kampus Utama SMK Unggulan
          </div>
          <p class="text-[#57534E] mb-2">Jl. Teknologi Vokasi No. 42, Kompleks Kawasan Industri & Sains Terpadu</p>
          <div class="flex items-center gap-2">
            <a 
              href="https://maps.google.com" 
              target="_blank" 
              rel="noopener noreferrer" 
              class="btn-amber-solid px-3.5 py-1.5 rounded-lg font-bold text-[11px] inline-flex items-center gap-1.5 shadow-sm">
              <span>Buka Google Maps</span>
              <svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
            </a>
          </div>
        </div>
      </div>

      <!-- Detail Akses Transportasi & Transit Info -->
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
        <div class="p-4 rounded-2xl bg-amber-50/70 border border-amber-900/10">
          <div class="flex items-center gap-2 font-extrabold text-[#1C1917] mb-1">
            <span>🚇 LRT Vokasi</span>
            <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-[#059669]/10 text-[#059669]">300 meter</span>
          </div>
          <p class="text-[#57534E]">5 menit jalan kaki melalui skywalk pedestrian khusus pelajar & publik.</p>
        </div>

        <div class="p-4 rounded-2xl bg-amber-50/70 border border-amber-900/10">
          <div class="flex items-center gap-2 font-extrabold text-[#1C1917] mb-1">
            <span>🚗 Exit Tol Sains</span>
            <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-amber-100 text-[#B45309]">1.2 km</span>
          </div>
          <p class="text-[#57534E]">Akses langsung pintu tol bebas hambatan koridor industri sains terpadu.</p>
        </div>

        <div class="p-4 rounded-2xl bg-amber-50/70 border border-amber-900/10">
          <div class="flex items-center gap-2 font-extrabold text-[#1C1917] mb-1">
            <span>🕒 Jam Admisi</span>
            <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-stone-100 text-stone-700">07.30 - 16.00</span>
          </div>
          <p class="text-[#57534E]">Lobby Pelayanan Terpadu Satu Pintu (PTSP) Gedung Rektorat Lt. 1.</p>
        </div>
      </div>

    </div>

    <!-- Modal Footer -->
    <div class="p-4 sm:p-6 bg-stone-50/90 border-t border-stone-200/80 flex items-center justify-end gap-3">
      <button type="button" data-close-modal class="btn-amber-solid px-6 py-2.5 rounded-xl text-xs font-extrabold">
        Tutup
      </button>
    </div>

  </div>
</div>
