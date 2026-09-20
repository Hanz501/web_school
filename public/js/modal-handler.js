/**
 * ============================================================================
 * MODAL, GALLERY FILTER & INTERACTION HANDLER - SMK UNGGULAN
 * Handlers untuk Modal Warta Popup, Modal Maps, Gallery Filtering, & Copy Clipboard
 * ============================================================================
 */

document.addEventListener('DOMContentLoaded', () => {
  // 1. Modal Helper Functions
  function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (!modal) {
      console.warn(`Modal #${modalId} tidak ditemukan.`);
      return;
    }
    
    modal.classList.add('is-open');
    document.body.classList.add('overflow-hidden'); // Lock background scroll
  }

  function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (!modal) return;

    modal.classList.remove('is-open');
    
    // Check if any other modal is open before removing overflow lock
    const openModals = document.querySelectorAll('.modal-backdrop.is-open');
    if (openModals.length === 0) {
      document.body.classList.remove('overflow-hidden');
    }
  }

  // 2. Global Event Delegation for Close Buttons & Backdrop
  document.addEventListener('click', (e) => {
    // Close Button [X] or Close Action
    const closeBtn = e.target.closest('[data-close-modal]');
    if (closeBtn) {
      e.preventDefault();
      const modal = closeBtn.closest('.modal-backdrop');
      if (modal) {
        closeModal(modal.id);
      }
      return;
    }

    // Close on Clicking Backdrop Overlay
    if (e.target.classList.contains('modal-backdrop')) {
      closeModal(e.target.id);
      return;
    }

    // 3. News Article Modal Trigger (#modal-artikel)
    const beritaBtn = e.target.closest('[data-open-berita]');
    if (beritaBtn) {
      e.preventDefault();
      const rawId = beritaBtn.getAttribute('data-open-berita');
      const beritaData = window.DAFTAR_BERITA || [];

      // Find news item by ID
      let item = beritaData.find(b => String(b.id) === String(rawId));

      // Fallback: extract from DOM if not found
      if (!item) {
        const card = beritaBtn.closest('.liquid-glass') || beritaBtn.closest('div');
        const cardTitle = card ? card.querySelector('h3')?.textContent?.trim() : 'Detail Warta';
        const cardCategory = card ? card.querySelector('span')?.textContent?.trim() : 'Karya Siswa';
        const cardSummary = card ? card.querySelector('p')?.textContent?.trim() : '';

        item = {
          id: rawId,
          judul: cardTitle,
          kategori: cardCategory,
          penulis: 'Humas SMK Unggulan',
          tanggal: 'Mei 2025',
          waktu_baca: '3 menit baca',
          ringkasan: cardSummary,
          konten: cardSummary + '<br><br>Karya dan prestasi ini merupakan perwujudan nyata komitmen SMK Unggulan dalam merealisasikan kurikulum merdeka vokasi berstandar industri 4.0 dan membekali siswa dengan portofolio bertaraf global.'
        };
      }

      if (item) {
        const titleEl = document.getElementById('modal-artikel-title');
        const badgeEl = document.getElementById('modal-artikel-badge');
        const metaEl = document.getElementById('modal-artikel-meta');
        const contentEl = document.getElementById('modal-artikel-content');
        const timeEl = document.getElementById('modal-artikel-time');

        if (titleEl) titleEl.textContent = item.judul;
        if (badgeEl) badgeEl.textContent = item.kategori;
        if (metaEl) metaEl.textContent = `${item.penulis || 'Humas Vokasi'} • ${item.tanggal || ''}`;
        if (timeEl) timeEl.textContent = item.waktu_baca || '3 menit baca';

        // Render Gambar / Foto Berita
        const imageBoxEl = document.getElementById('modal-artikel-image-box');
        if (imageBoxEl) {
          const baseUrl = window.BASE_URL ? (window.BASE_URL.endsWith('/') ? window.BASE_URL : window.BASE_URL + '/') : '/';
          if (item.foto && item.foto.trim() !== '') {
            imageBoxEl.innerHTML = `
              <img src="${baseUrl}images/berita/${item.foto}" 
                   alt="${(item.judul || 'Dokumentasi Berita').replace(/"/g, '&quot;')}" 
                   class="w-full h-full object-cover"
                   onerror="this.parentElement.innerHTML='<div class=\\'w-full h-full bg-gradient-to-tr from-amber-600/20 via-orange-500/10 to-amber-100/40 flex flex-col items-center justify-center text-center p-4\\'><div class=\\'w-10 h-10 rounded-xl bg-amber-500/20 text-[#B45309] flex items-center justify-center mb-1.5 shadow-sm\\'><svg class=\\'w-5 h-5\\' viewBox=\\'0 0 24 24\\' fill=\\'none\\' stroke=\\'currentColor\\' stroke-width=\\'2\\'><rect width=\\'18\\' height=\\'18\\' x=\\'3\\' y=\\'3\\' rx=\\'2\\' ry=\\'2\\'/><circle cx=\\'9\\' cy=\\'9\\' r=\\'2\\'/><path d=\\'m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21\\'/></svg></div><span class=\\'text-xs font-bold text-[#1C1917]\\'>Dokumentasi Warta SMK Unggulan</span><span class=\\'text-[10px] text-[#78716C]\\'>Pusat Keunggulan Vokasi 2025</span></div>'">
            `;
          } else {
            imageBoxEl.innerHTML = `
              <div class="w-full h-full bg-gradient-to-tr from-amber-600/20 via-orange-500/10 to-amber-100/40 flex flex-col items-center justify-center text-center p-4">
                <div class="w-10 h-10 rounded-xl bg-amber-500/20 text-[#B45309] flex items-center justify-center mb-1.5 shadow-sm">
                  <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                </div>
                <span class="text-xs font-bold text-[#1C1917]">Dokumentasi Warta SMK Unggulan</span>
                <span class="text-[10px] text-[#78716C]">Pusat Keunggulan Vokasi 2025</span>
              </div>
            `;
          }
        }
        
        if (contentEl) {
          contentEl.innerHTML = `
            ${item.ringkasan ? `<p class="text-base text-[#1C1917] font-semibold leading-relaxed mb-4">${item.ringkasan}</p>` : ''}
            <div class="p-5 rounded-2xl bg-amber-50/70 border border-amber-900/10 text-[#57534E] text-sm sm:text-base leading-relaxed mb-4">
              ${item.konten || item.ringkasan || ''}
            </div>
            <p class="text-xs text-[#78716C] leading-relaxed italic border-t border-stone-200/80 pt-4">
              Publikasi resmi Lembaga Hubungan Masyarakat & Pusat Keunggulan Vokasi Industri SMK Unggulan. Informasi lebih lanjut hubungi pusat humas di kampus utama.
            </p>
          `;
        }

        openModal('modal-artikel');
      }
      return;
    }

    // 3.5. Gallery Item Modal Trigger (#modal-galeri)
    const galeriBtn = e.target.closest('[data-open-galeri]');
    if (galeriBtn) {
      e.preventDefault();
      const rawId = galeriBtn.getAttribute('data-open-galeri');
      const galeriData = window.DAFTAR_GALERI || [];

      // Find gallery item by ID
      let item = galeriData.find(g => String(g.id) === String(rawId));

      // Fallback: extract from DOM if not found
      if (!item) {
        const card = galeriBtn.closest('.galeri-card-item') || galeriBtn;
        const cardTitle = card ? card.querySelector('h3')?.textContent?.trim() : 'Dokumentasi Fasilitas';
        const cardCategory = card ? card.querySelector('span')?.textContent?.trim() : 'Dokumentasi Kampus';
        const cardDesc = card ? card.querySelector('p')?.textContent?.trim() : '';

        item = {
          id: rawId,
          judul: cardTitle,
          kategori: cardCategory,
          tag: 'Dokumentasi Kampus',
          deskripsi: cardDesc
        };
      }

      if (item) {
        const titleEl = document.getElementById('modal-galeri-title');
        const badgeEl = document.getElementById('modal-galeri-badge');
        const tagEl = document.getElementById('modal-galeri-tag');
        const metaEl = document.getElementById('modal-galeri-meta');
        const contentEl = document.getElementById('modal-galeri-content');
        const imageBoxEl = document.getElementById('modal-galeri-image-box');

        if (titleEl) titleEl.textContent = item.judul;
        if (badgeEl) badgeEl.textContent = item.kategori || 'Dokumentasi Kampus';
        if (tagEl) tagEl.textContent = item.tag || 'Dokumentasi Resmi';
        if (metaEl) metaEl.textContent = `Pusat Keunggulan Vokasi • ${item.kategori || 'Fasilitas Terpadu'}`;

        // Render Image in Gallery Modal
        if (imageBoxEl) {
          const baseUrl = window.BASE_URL ? (window.BASE_URL.endsWith('/') ? window.BASE_URL : window.BASE_URL + '/') : '/';
          if (item.foto && item.foto.trim() !== '') {
            imageBoxEl.innerHTML = `
              <img src="${baseUrl}images/galeri/${item.foto}" 
                   alt="${(item.judul || 'Dokumentasi Galeri').replace(/"/g, '&quot;')}" 
                   class="w-full h-full object-cover"
                   onerror="this.parentElement.innerHTML='<div class=\\'w-full h-full bg-gradient-to-tr from-amber-700/20 via-orange-600/15 to-amber-100/50 flex flex-col items-center justify-center p-4 text-center\\'><div class=\\'w-10 h-10 rounded-xl bg-white/90 text-[#B45309] flex items-center justify-center mb-2 shadow-sm\\'><svg class=\\'w-5 h-5\\' viewBox=\\'0 0 24 24\\' fill=\\'none\\' stroke=\\'currentColor\\' stroke-width=\\'2\\'><rect width=\\'18\\' height=\\'18\\' x=\\'3\\' y=\\'3\\' rx=\\'2\\' ry=\\'2\\'/><circle cx=\\'9\\' cy=\\'9\\' r=\\'2\\'/><path d=\\'m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21\\'/></svg></div><span class=\\'text-xs font-bold text-[#1C1917]\\'>Dokumentasi Kampus SMK Unggulan</span></div>'">
            `;
          } else {
            imageBoxEl.innerHTML = `
              <div class="w-full h-full bg-gradient-to-tr from-amber-700/20 via-orange-600/15 to-amber-100/50 flex flex-col items-center justify-center p-4 text-center">
                <div class="w-10 h-10 rounded-xl bg-white/90 text-[#B45309] flex items-center justify-center mb-2 shadow-sm">
                  <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                </div>
                <span class="text-xs font-bold text-[#1C1917]">Dokumentasi Kampus SMK Unggulan</span>
                <span class="text-[10px] text-[#78716C]">Pusat Keunggulan Vokasi 2025</span>
              </div>
            `;
          }
        }

        // Render Detailed Description Body
        if (contentEl) {
          contentEl.innerHTML = `
            <div class="p-5 rounded-2xl bg-amber-50/70 border border-amber-900/10 text-[#57534E] text-sm sm:text-base leading-relaxed mb-4">
              <p class="font-medium text-[#1C1917] mb-2">${item.deskripsi || ''}</p>
              <p class="text-xs text-[#78716C] leading-relaxed">
                Fasilitas dan pencapaian ini merupakan wujud nyata komitmen berkelanjutan SMK Unggulan dalam membangun ekosistem vokasi modern bertaraf internasional dan relevan dengan standar industri 4.0.
              </p>
            </div>
            <div class="grid grid-cols-2 gap-3 pt-2">
              <div class="p-3 rounded-xl bg-white border border-amber-900/10 text-xs">
                <span class="text-stone-400 font-mono text-[10px] uppercase block">Kategori</span>
                <span class="font-bold text-[#B45309]">${item.kategori || 'Umum'}</span>
              </div>
              <div class="p-3 rounded-xl bg-white border border-amber-900/10 text-xs">
                <span class="text-stone-400 font-mono text-[10px] uppercase block">Standar Mutu</span>
                <span class="font-bold text-[#1C1917]">ISO 9001:2015 & Industri</span>
              </div>
            </div>
          `;
        }

        openModal('modal-galeri');
      }
      return;
    }

    // 4. Google Maps Modal Trigger (#modal-maps)
    const mapsBtn = e.target.closest('[data-open-maps]');
    if (mapsBtn) {
      e.preventDefault();
      openModal('modal-maps');
      return;
    }

    // 5. School Profile Modal Trigger (#modal-profil)
    const profilBtn = e.target.closest('[data-open-profil]');
    if (profilBtn) {
      e.preventDefault();
      const targetTab = profilBtn.getAttribute('data-open-profil') || 'sejarah';
      switchProfilTab(targetTab);
      openModal('modal-profil');

      // Close mobile nav drawer if open
      const mobileNav = document.getElementById('mobile-nav-drawer');
      if (mobileNav && !mobileNav.classList.contains('hidden')) {
        mobileNav.classList.add('hidden');
      }
      return;
    }

    // 6. Profil Modal Internal Tab Switching
    const tabBtn = e.target.closest('[data-profil-tab]');
    if (tabBtn) {
      e.preventDefault();
      const tabName = tabBtn.getAttribute('data-profil-tab');
      if (tabName) {
        switchProfilTab(tabName);
      }
      return;
    }
  });

  // Helper to switch tabs inside School Profile Modal
  function switchProfilTab(tabName) {
    const tabButtons = document.querySelectorAll('.profil-tab-btn');
    const tabPanes = document.querySelectorAll('.profil-tab-pane');

    // Update Tab Buttons UI
    tabButtons.forEach(btn => {
      const btnTab = btn.getAttribute('data-profil-tab');
      if (btnTab === tabName) {
        btn.classList.add('bg-[#B45309]', 'text-white', 'shadow-sm', 'font-extrabold');
        btn.classList.remove('bg-white', 'text-[#57534E]', 'border', 'border-amber-900/10', 'font-bold');
      } else {
        btn.classList.remove('bg-[#B45309]', 'text-white', 'shadow-sm', 'font-extrabold');
        btn.classList.add('bg-white', 'text-[#57534E]', 'border', 'border-amber-900/10', 'font-bold');
      }
    });

    // Toggle Content Panes
    tabPanes.forEach(pane => {
      if (pane.id === `tab-content-${tabName}`) {
        pane.classList.remove('hidden');
      } else {
        pane.classList.add('hidden');
      }
    });
  }

  // 5. Close Modal on ESC Key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      document.querySelectorAll('.modal-backdrop.is-open').forEach(modal => {
        closeModal(modal.id);
      });
      // Also close mobile navbar if open
      const mobileNav = document.getElementById('mobile-nav-drawer');
      if (mobileNav && !mobileNav.classList.contains('hidden')) {
        mobileNav.classList.add('hidden');
      }
    }
  });

  // 6. Gallery Tab Filter Handler
  const filterBtns = document.querySelectorAll('.galeri-filter-btn');
  const galleryCards = document.querySelectorAll('.galeri-card-item');
  let galleryFilterTimer = null;

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const filterValue = btn.getAttribute('data-filter');

      // Update button active state cleanly with consistent border sizing
      filterBtns.forEach(b => {
        b.classList.remove('bg-[#B45309]', 'text-white', 'shadow-md', 'font-extrabold', 'border-transparent');
        b.classList.add('bg-white/80', 'text-[#57534E]', 'border-amber-900/12', 'font-bold');
      });

      btn.classList.add('bg-[#B45309]', 'text-white', 'shadow-md', 'font-extrabold', 'border-transparent');
      btn.classList.remove('bg-white/80', 'text-[#57534E]', 'border-amber-900/12', 'font-bold');

      if (galleryFilterTimer) {
        clearTimeout(galleryFilterTimer);
        galleryFilterTimer = null;
      }

      // Phase 1: Fade out all cards that will be hidden
      galleryCards.forEach(card => {
        const cardCategory = card.getAttribute('data-kategori');
        const shouldShow = (filterValue === 'all' || cardCategory === filterValue);

        if (!shouldShow) {
          card.style.opacity = '0';
          card.style.transform = 'scale(0.96) translateY(6px)';
        }
      });

      // Phase 2: After brief fade out, update display and smoothly fade in matching cards
      galleryFilterTimer = setTimeout(() => {
        galleryCards.forEach(card => {
          const cardCategory = card.getAttribute('data-kategori');
          const shouldShow = (filterValue === 'all' || cardCategory === filterValue);

          if (shouldShow) {
            card.style.display = 'flex';
            // Force reflow for smooth opacity transition
            void card.offsetWidth;
            card.style.opacity = '1';
            card.style.transform = 'translateY(0) scale(1)';
          } else {
            card.style.display = 'none';
          }
        });
        galleryFilterTimer = null;
      }, 150);
    });
  });

  // 7. Copy WhatsApp Number to Clipboard with Visual Tooltip Feedback
  const copyWaBtn = document.getElementById('copy-wa-btn');
  const copyWaTooltip = document.getElementById('copy-wa-tooltip');

  if (copyWaBtn && copyWaTooltip) {
    copyWaBtn.addEventListener('click', () => {
      const textToCopy = copyWaBtn.getAttribute('data-copy-text') || '+62 812-3456-7890';
      
      navigator.clipboard.writeText(textToCopy).then(() => {
        copyWaTooltip.classList.remove('hidden');
        copyWaBtn.classList.add('border-[#059669]', 'bg-emerald-50');

        setTimeout(() => {
          copyWaTooltip.classList.add('hidden');
          copyWaBtn.classList.remove('border-[#059669]', 'bg-emerald-50');
        }, 2200);
      }).catch(err => {
        console.error('Gagal menyalin:', err);
      });
    });
  }

  // 8. Mobile Navbar Menu Drawer Toggle
  const mobileToggleBtn = document.getElementById('mobile-menu-toggle');
  const mobileNavDrawer = document.getElementById('mobile-nav-drawer');

  if (mobileToggleBtn && mobileNavDrawer) {
    mobileToggleBtn.addEventListener('click', () => {
      mobileNavDrawer.classList.toggle('hidden');
    });

    // Close when clicking any nav link inside mobile drawer
    mobileNavDrawer.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        mobileNavDrawer.classList.add('hidden');
      });
    });
  }

  // 9. Ultra-Smooth Sliding ScrollSpy Nav Indicator
  const sectionIds = ['hero', 'jurusan', 'galeri', 'berita', 'kontak'];
  const sections = sectionIds.map(id => document.getElementById(id)).filter(Boolean);
  const desktopNav = document.getElementById('main-nav');
  const desktopNavLinks = document.querySelectorAll('#main-nav a.nav-item');
  const mobileNavLinks = document.querySelectorAll('#mobile-nav-drawer a.mobile-nav-item');
  const glider = document.getElementById('nav-active-glider');

  let activeSectionId = 'hero';

  function moveGliderTo(link) {
    if (!glider || !link || !desktopNav) return;
    const navRect = desktopNav.getBoundingClientRect();
    const linkRect = link.getBoundingClientRect();
    
    // Position relative to #main-nav container
    const left = linkRect.left - navRect.left + 12;
    const width = Math.max(linkRect.width - 24, 20);

    glider.style.left = `${left}px`;
    glider.style.width = `${width}px`;
    glider.style.opacity = '1';
  }

  function updateActiveNav(targetSectionId = null) {
    if (sections.length === 0) return;

    let currentSectionId = targetSectionId;

    if (!currentSectionId) {
      const scrollY = window.scrollY || window.pageYOffset;
      const windowHeight = window.innerHeight;
      const documentHeight = document.documentElement.scrollHeight;
      
      // If near top of page
      if (scrollY < 120) {
        currentSectionId = 'hero';
      }
      // If near bottom of page -> activate last section ('kontak')
      else if (windowHeight + scrollY >= documentHeight - 120) {
        currentSectionId = 'kontak';
      } 
      else {
        // Find which section is currently active based on viewport checkPoint
        const checkPoint = 200;
        for (let i = sections.length - 1; i >= 0; i--) {
          const section = sections[i];
          const rect = section.getBoundingClientRect();
          if (rect.top <= checkPoint) {
            currentSectionId = section.id;
            break;
          }
        }
      }
    }

    if (!currentSectionId) currentSectionId = 'hero';
    activeSectionId = currentSectionId;

    // Update Desktop Nav
    desktopNavLinks.forEach(link => {
      const href = link.getAttribute('href') || '';
      const targetId = href.replace('#', '');

      if (targetId === currentSectionId) {
        link.classList.remove('text-[#57534E]', 'font-semibold', 'hover:bg-amber-50/60');
        link.classList.add('text-[#B45309]', 'font-bold');
        moveGliderTo(link);
      } else {
        link.classList.remove('text-[#B45309]', 'font-bold');
        link.classList.add('text-[#57534E]', 'font-semibold', 'hover:bg-amber-50/60');
      }
    });

    // Update Mobile Drawer Nav
    mobileNavLinks.forEach(link => {
      const href = link.getAttribute('href') || '';
      const targetId = href.replace('#', '');
      if (targetId === currentSectionId) {
        link.classList.remove('text-[#57534E]', 'font-semibold');
        link.classList.add('text-[#B45309]', 'font-bold', 'bg-amber-50/80');
      } else {
        link.classList.remove('text-[#B45309]', 'font-bold', 'bg-amber-50/80');
        link.classList.add('text-[#57534E]', 'font-semibold');
      }
    });
  }

  // Nav link click listeners for instant glider glide
  desktopNavLinks.forEach(link => {
    link.addEventListener('click', () => {
      const targetId = link.getAttribute('href')?.replace('#', '');
      if (targetId) {
        updateActiveNav(targetId);
      }
    });
  });

  // Smooth throttled scroll listener for 60fps performance
  let isScrolling = false;
  window.addEventListener('scroll', () => {
    if (!isScrolling) {
      window.requestAnimationFrame(() => {
        updateActiveNav();
        isScrolling = false;
      });
      isScrolling = true;
    }
  }, { passive: true });

  // Recalculate glider position on window resize
  window.addEventListener('resize', () => {
    const activeLink = document.querySelector(`#main-nav a.nav-item[href="#${activeSectionId}"]`);
    if (activeLink) moveGliderTo(activeLink);
  });

  // Initial call on DOM ready & after window loads (fonts/images)
  setTimeout(updateActiveNav, 100);
  window.addEventListener('load', () => setTimeout(updateActiveNav, 200));
});
