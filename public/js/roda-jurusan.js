/**
 * ============================================================================
 * RODA INTERAKTIF 4 PROGRAM KEAHLIAN (PRESISI TINGGI) - SMK UNGGULAN
 * Garis Melengkung Berputar (Muter) pada Jalur Lingkaran Penanda (Guide Circle Track)
 * ============================================================================
 */

document.addEventListener('DOMContentLoaded', () => {
  const container = document.getElementById('orbit-wheel-container');
  const panel = document.getElementById('jurusan-detail-panel');

  if (!container || !panel || !window.DAFTAR_JURUSAN || !window.DAFTAR_JURUSAN.length) {
    return;
  }

  const jurusanData = window.DAFTAR_JURUSAN;
  let activeIndex = 0;
  let currentArcRotation = 0; // Sudut rotasi garis penanda
  let autoRotateTimer = null;
  const AUTO_ROTATE_DELAY = 6000; // 6 detik per pergantian jika idle

  // Sub-labels for center hub
  const subCategoryLabels = {
    'rpl': 'SOFTWARE ENG',
    'dkv': 'CREATIVE DESIGN',
    'ak': 'DIGITAL FINANCE',
    'tkj': 'NETWORK & CYBER'
  };

  // Icon SVG mapping helper
  const iconSvgs = {
    'code-2': `<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>`,
    'palette': `<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="13.5" cy="6.5" r=".5" fill="currentColor"/><circle cx="17.5" cy="10.5" r=".5" fill="currentColor"/><circle cx="8.5" cy="7.5" r=".5" fill="currentColor"/><circle cx="6.5" cy="12.5" r=".5" fill="currentColor"/><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"/></svg>`,
    'calculator': `<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect width="16" height="20" x="4" y="2" rx="2"/><line x1="8" x2="16" y1="6" y2="6"/><line x1="16" x2="16" y1="14" y2="18"/><path d="M16 10h.01"/><path d="M12 10h.01"/><path d="M8 10h.01"/><path d="M12 14h.01"/><path d="M8 14h.01"/><path d="M12 18h.01"/><path d="M8 18h.01"/></svg>`,
    'network': `<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="16" y="16" width="6" height="6" rx="1"/><rect x="2" y="16" width="6" height="6" rx="1"/><rect x="9" y="2" width="6" height="6" rx="1"/><path d="M5 16v-3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3"/><path d="M12 12V8"/></svg>`,
    'default': `<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/></svg>`
  };

  function getIconSvg(iconName) {
    return iconSvgs[iconName] || iconSvgs['default'];
  }

  // 1. Build the Orbit Wheel Structure with Guide Track Circles
  function buildOrbitWheel() {
    container.innerHTML = `
      <div class="orbit-track-glow"></div>
      
      <!-- Concentric Orbit Track Rings with Visible Guide Line (Jalur Lingkaran Penanda Tebal) -->
      <div class="orbit-track">
        <svg class="w-full h-full" viewBox="0 0 360 360" fill="none">
          <!-- Outer Dashed Node Orbit (Radius 150px) -->
          <circle cx="180" cy="180" r="150" stroke="rgba(180, 83, 9, 0.25)" stroke-dasharray="6 6" stroke-width="2" />
          
          <!-- JALUR LINGKARAN PENANDA TEBAL (Radius 120px) - Rel visual jelas tempat garis meluncur -->
          <circle cx="180" cy="180" r="120" stroke="rgba(180, 83, 9, 0.45)" stroke-width="3" />
          
          <!-- Inner Decorative Halo Ring (Radius 76px) -->
          <circle cx="180" cy="180" r="76" stroke="rgba(180, 83, 9, 0.2)" stroke-width="1.5" />
        </svg>
      </div>

      <!-- Rotating Arc Carrier: GARIS TEBAL YANG MUTER PADA JALUR LINGKARAN -->
      <div id="orbit-arc-carrier" class="orbit-arc-carrier">
        <!-- Curved Amber Arc Line Bracket (Tebal, Tegas & Terang) -->
        <div class="orbit-traveling-arc">
          <svg viewBox="0 0 80 30" class="w-[84px] h-[32px] overflow-visible">
            <defs>
              <linearGradient id="travelArcGrad" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" stop-color="#C26727" />
                <stop offset="50%" stop-color="#B45309" />
                <stop offset="100%" stop-color="#C26727" />
              </linearGradient>
            </defs>
            <!-- Busur tebal (stroke-width 7.5) persis menempel pada rel r=120px -->
            <path d="M 4 22 A 120 120 0 0 1 76 22" fill="none" stroke="url(#travelArcGrad)" stroke-width="7.5" stroke-linecap="round" />
            <!-- Glowing Center Indicator Dot -->
            <circle cx="40" cy="16.5" r="4" fill="#B45309" stroke="#FFFFFF" stroke-width="1.5" />
          </svg>
        </div>
      </div>

      <!-- Dynamic Center Hub -->
      <div class="orbit-center-hub" id="orbit-center-hub">
        <div id="center-hub-icon" class="w-7 h-7 flex items-center justify-center text-[#B45309] mb-1">
          ${getIconSvg(jurusanData[0].icon)}
        </div>
        <span id="center-hub-code" class="text-xl font-extrabold text-[#1C1917] font-sans tracking-tight leading-none">${jurusanData[0].kode}</span>
        <span id="center-hub-label" class="text-[10px] font-extrabold text-[#059669] font-mono uppercase tracking-wider mt-1.5">SOFTWARE ENG</span>
      </div>

      <!-- Container untuk 4 Node Jurusan (Tetap Stasioner di Posisi 0°, 90°, 180°, 270°) -->
      <div id="orbit-nodes-container" class="absolute inset-0 pointer-events-none"></div>
    `;

    const nodesContainer = document.getElementById('orbit-nodes-container');
    const radius = 150; // Jari-jari orbit dari titik pusat (180px)

    jurusanData.forEach((item, index) => {
      // Posisi tetap 4 Jurusan: 0° (Atas / RPL), 90° (Kanan / DKV), 180° (Bawah / AK), 270° (Kiri / TKJ)
      const baseAngleDeg = item.angle !== undefined ? Number(item.angle) : (index * 90);
      const angleRad = (baseAngleDeg - 90) * (Math.PI / 180);

      // Hitung koordinat (x, y) dalam persentase
      const leftPercent = 50 + (radius / 180) * 50 * Math.cos(angleRad);
      const topPercent = 50 + (radius / 180) * 50 * Math.sin(angleRad);

      const node = document.createElement('div');
      node.className = `orbit-node group pointer-events-auto ${index === activeIndex ? 'is-active' : ''}`;
      node.id = `orbit-node-${item.id}`;
      node.style.left = `${leftPercent}%`;
      node.style.top = `${topPercent}%`;
      node.setAttribute('data-index', index);
      node.setAttribute('data-angle', baseAngleDeg);
      node.setAttribute('title', item.nama);
      node.setAttribute('aria-label', item.nama);

      // Node tetap dengan label kapsul
      node.innerHTML = `
        <div class="node-icon-wrapper text-[#57534E] group-hover:text-[#B45309] transition-all duration-300">
          ${getIconSvg(item.icon)}
        </div>

        <!-- Capsule Label Pill di bawah Node -->
        <div class="node-pill-label">
          ${item.kode}
        </div>
      `;

      node.addEventListener('click', () => {
        selectJurusan(index);
        restartAutoRotate();
      });

      nodesContainer.appendChild(node);
    });
  }

  // 2. Select & Putar Garis Melengkung (MUTER) ke Jurusan yang Dipilih
  function selectJurusan(index) {
    if (index < 0 || index >= jurusanData.length) return;
    activeIndex = index;
    const currentItem = jurusanData[index];
    const targetAngle = currentItem.angle !== undefined ? Number(currentItem.angle) : (index * 90);

    // Hitung lintasan terpendek agar garis busur berputar (MUTER) ke node tujuan
    let diff = (targetAngle - (currentArcRotation % 360)) % 360;
    if (diff > 180) diff -= 360;
    if (diff < -180) diff += 360;
    currentArcRotation += diff;

    // Putar Garis Busur (MUTER) mengelilingi jalur lingkaran menuju jurusan terpilih
    const arcCarrier = document.getElementById('orbit-arc-carrier');
    if (arcCarrier) {
      arcCarrier.style.transform = `rotate(${currentArcRotation}deg)`;
    }

    // Highlight node yang aktif
    const nodes = document.querySelectorAll('.orbit-node');
    nodes.forEach((n, idx) => {
      if (idx === index) {
        n.classList.add('is-active');
      } else {
        n.classList.remove('is-active');
      }
    });

    // Update Dynamic Center Hub
    const hubIcon = document.getElementById('center-hub-icon');
    const hubCode = document.getElementById('center-hub-code');
    const hubLabel = document.getElementById('center-hub-label');
    
    if (hubIcon) hubIcon.innerHTML = getIconSvg(currentItem.icon);
    if (hubCode) hubCode.textContent = currentItem.kode;
    if (hubLabel) {
      const subTag = subCategoryLabels[currentItem.id] || (currentItem.kategori ? currentItem.kategori.split(',')[0].substring(0, 16).toUpperCase() : 'PROGRAM UNGGULAN');
      hubLabel.textContent = subTag;
    }

    // Animate and Render Info Panel with Morph & Slide-Fade
    renderPanelWithMorph(currentItem);
  }

  let morphTimeout = null;

  // 3. Render Panel with Morph & Slide-Fade Animation
  function renderPanelWithMorph(item) {
    if (morphTimeout) {
      clearTimeout(morphTimeout);
      morphTimeout = null;
    }

    panel.style.transition = 'opacity 0.12s ease, transform 0.12s ease';
    panel.style.opacity = '0';
    panel.style.transform = 'translateY(6px)';

    morphTimeout = setTimeout(() => {
      const kuota = item.kuota || 72;

      // Kompetensi Inti Pills (Pill abu-abu hangat / krem)
      const kompetensiList = (item.kompetensi || []).map(k => `
        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl text-xs font-semibold bg-stone-100 text-[#57534E] border border-stone-200 shadow-sm">
          <span>${k}</span>
        </span>
      `).join('');

      // Prospek Karir Lulusan Pills (Pill bergaris tepi teal lembut)
      const karirList = (item.karir || []).map(c => `
        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl text-xs font-bold bg-[#059669]/5 text-[#059669] border border-[#059669]/30 shadow-sm">
          <svg class="w-3.5 h-3.5 text-[#059669]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
          <span>${c}</span>
        </span>
      `).join('');

      panel.innerHTML = `
        <div class="liquid-glass-elevated rounded-3xl p-6 sm:p-9 relative overflow-hidden border border-amber-900/12 shadow-xl min-h-[480px] flex flex-col justify-between">
          
          <div>
            <!-- Top Row: Tag Kategori (Kiri) & Kuota (Kanan) -->
            <div class="flex flex-wrap items-center justify-between gap-3 pb-3">
              <span class="inline-flex items-center px-3.5 py-1 rounded-full bg-amber-100/90 text-[#B45309] text-xs font-bold border border-amber-300/60 uppercase tracking-wide">
                ${item.kategori}
              </span>

              <div class="flex items-center gap-1.5 text-xs font-extrabold text-[#059669] font-mono">
                <span class="w-2 h-2 rounded-full bg-[#059669]"></span>
                <span>KUOTA TERSEDIA: ${kuota} KURSI</span>
              </div>
            </div>

            <!-- Judul Jurusan Besar (H2/H3) -->
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#1C1917] tracking-tight mt-2 mb-3">
              ${item.nama} (${item.kode})
            </h2>

            <!-- Paragraf Deskripsi Fokus Pembelajaran -->
            <p class="text-[#57534E] text-sm sm:text-base leading-relaxed mb-6 font-normal">
              ${item.deskripsi}
            </p>

            <!-- Section: Kompetensi Keahlian Inti -->
            <div class="space-y-2.5 pb-6">
              <h4 class="text-xs font-mono font-bold uppercase tracking-wider text-[#1C1917]">
                KOMPETENSI KEAHLIAN INTI:
              </h4>
              <div class="flex flex-wrap gap-2">
                ${kompetensiList}
              </div>
            </div>

            <!-- Section: Prospek Karir Lulusan -->
            <div class="space-y-2.5 pb-7 border-b border-stone-200/80">
              <h4 class="text-xs font-mono font-bold uppercase tracking-wider text-[#059669]">
                PROSPEK KARIR LULUSAN:
              </h4>
              <div class="flex flex-wrap gap-2">
                ${karirList}
              </div>
            </div>
          </div>

          <!-- Garis Pembatas Bawah: Sertifikasi & Tombol Aksi -->
          <div class="pt-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-2.5 text-xs text-[#57534E]">
              <svg class="w-5 h-5 text-[#B45309] flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>
              <span><strong>Sertifikasi:</strong> ${item.sertifikasi || 'BNSP & Oracle Certified Associate'}</span>
            </div>

            <!-- Tombol Aksi "Pilih Jurusan Ini >" -->
            <a href="#daftar" class="btn-amber-solid px-6 py-2.5 rounded-full text-xs font-extrabold inline-flex items-center justify-center gap-2 flex-shrink-0 shadow-md">
              <span>Pilih Jurusan Ini</span>
              <span>›</span>
            </a>
          </div>

        </div>
      `;

      panel.style.transition = 'opacity 0.25s cubic-bezier(0.16, 1, 0.3, 1), transform 0.25s cubic-bezier(0.16, 1, 0.3, 1)';
      panel.style.opacity = '1';
      panel.style.transform = 'translateY(0)';
      morphTimeout = null;
    }, 120);
  }

  // 4. Auto Rotate Logic
  function startAutoRotate() {
    if (autoRotateTimer) clearInterval(autoRotateTimer);
    autoRotateTimer = setInterval(() => {
      const nextIndex = (activeIndex + 1) % jurusanData.length;
      selectJurusan(nextIndex);
    }, AUTO_ROTATE_DELAY);
  }

  function stopAutoRotate() {
    if (autoRotateTimer) {
      clearInterval(autoRotateTimer);
      autoRotateTimer = null;
    }
  }

  function restartAutoRotate() {
    stopAutoRotate();
    startAutoRotate();
  }

  // Pause on hover
  container.addEventListener('mouseenter', stopAutoRotate);
  container.addEventListener('mouseleave', startAutoRotate);
  panel.addEventListener('mouseenter', stopAutoRotate);
  panel.addEventListener('mouseleave', startAutoRotate);

  // Keyboard navigation support (Arrow Keys)
  document.addEventListener('keydown', (e) => {
    const rect = container.getBoundingClientRect();
    const inView = rect.top < window.innerHeight && rect.bottom >= 0;
    if (!inView) return;

    if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
      const nextIndex = (activeIndex + 1) % jurusanData.length;
      selectJurusan(nextIndex);
      restartAutoRotate();
    } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
      const prevIndex = (activeIndex - 1 + jurusanData.length) % jurusanData.length;
      selectJurusan(prevIndex);
      restartAutoRotate();
    }
  });

  // Initialize
  buildOrbitWheel();
  selectJurusan(0);
  startAutoRotate();
});
