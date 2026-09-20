<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($title ?? 'Admin Panel - SMK Unggulan') ?></title>
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23B45309'><path d='M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5'/></svg>">

  <!-- Google Fonts: Plus Jakarta Sans & JetBrains Mono -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Tailwind CSS CDN with Config -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
            mono: ['"JetBrains Mono"', 'monospace']
          },
          colors: {
            brandamber: {
              50: '#FFFBEB',
              100: '#FEF3C7',
              500: '#F59E0B',
              600: '#D97706',
              700: '#B45309',
              800: '#92400E',
              900: '#78350F',
            }
          }
        }
      }
    }
  </script>

  <!-- Liquid Glass Styles -->
  <link rel="stylesheet" href="<?= base_url('css/liquid-theme.css') ?>">
</head>
<body class="bg-[#F6F3EE] text-[#1C1917] antialiased flex min-h-screen">

  <!-- Sidebar Navigation -->
  <aside class="w-64 bg-[#FDFCFA]/95 border-r border-amber-900/10 backdrop-blur-xl flex flex-col justify-between hidden md:flex flex-shrink-0 z-30">
    <div>
      <!-- Brand Logo -->
      <div class="p-6 border-b border-stone-200/80">
        <a href="<?= base_url('admin') ?>" class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-amber-700 to-amber-500 text-white flex items-center justify-center shadow-md">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
          </div>
          <div>
            <span class="font-extrabold text-base text-stone-900 leading-none block">PANEL ADMIN</span>
            <span class="text-[11px] text-amber-800 font-semibold">SMK Unggulan</span>
          </div>
        </a>
      </div>

      <!-- Nav Links -->
      <nav class="p-4 space-y-1.5">
        <a href="<?= base_url('admin') ?>" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-xs font-bold transition-all <?= ($active_menu ?? '') === 'dashboard' ? 'bg-amber-600 text-white shadow-md shadow-amber-600/20' : 'text-stone-700 hover:bg-amber-50 hover:text-amber-800' ?>">
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>
          <span>Dashboard</span>
        </a>

        <a href="<?= base_url('admin/berita') ?>" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-xs font-bold transition-all <?= ($active_menu ?? '') === 'berita' ? 'bg-amber-600 text-white shadow-md shadow-amber-600/20' : 'text-stone-700 hover:bg-amber-50 hover:text-amber-800' ?>">
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/><path d="M18 14h-8"/><path d="M15 18h-5"/><path d="M10 6h8v4h-8V6Z"/></svg>
          <span>Kelola Berita & Artikel</span>
        </a>

        <a href="<?= base_url('admin/galeri') ?>" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-xs font-bold transition-all <?= ($active_menu ?? '') === 'galeri' ? 'bg-amber-600 text-white shadow-md shadow-amber-600/20' : 'text-stone-700 hover:bg-amber-50 hover:text-amber-800' ?>">
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
          <span>Kelola Galeri Fasilitas</span>
        </a>

        <a href="<?= base_url('admin/jurusan') ?>" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-xs font-bold transition-all <?= ($active_menu ?? '') === 'jurusan' ? 'bg-amber-600 text-white shadow-md shadow-amber-600/20' : 'text-stone-700 hover:bg-amber-50 hover:text-amber-800' ?>">
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m10 15 5-3-5-3v6Z"/></svg>
          <span>Kelola Program Keahlian</span>
        </a>

        <a href="<?= base_url('admin/profil') ?>" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-xs font-bold transition-all <?= ($active_menu ?? '') === 'profil' ? 'bg-amber-600 text-white shadow-md shadow-amber-600/20' : 'text-stone-700 hover:bg-amber-50 hover:text-amber-800' ?>">
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M12 8v4"/><path d="M12 12l2.5 2.5"/></svg>
          <span>Kelola Profil & Visi Misi</span>
        </a>

        <a href="<?= base_url('admin/struktur') ?>" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-xs font-bold transition-all <?= ($active_menu ?? '') === 'struktur' ? 'bg-amber-600 text-white shadow-md shadow-amber-600/20' : 'text-stone-700 hover:bg-amber-50 hover:text-amber-800' ?>">
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          <span>Struktur Organisasi</span>
        </a>

        <?php 
          $sidebarUnreadCount = (new \App\Models\PesanModel())->getUnreadCount();
        ?>
        <a href="<?= base_url('admin/pesan') ?>" class="flex items-center justify-between px-4 py-3 rounded-2xl text-xs font-bold transition-all <?= ($active_menu ?? '') === 'pesan' ? 'bg-amber-600 text-white shadow-md shadow-amber-600/20' : 'text-stone-700 hover:bg-amber-50 hover:text-amber-800' ?>">
          <div class="flex items-center gap-3">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
            <span>Pesan & Masukan</span>
          </div>
          <?php if ($sidebarUnreadCount > 0): ?>
            <span class="px-2 py-0.5 rounded-full text-[10px] font-mono font-bold <?= ($active_menu ?? '') === 'pesan' ? 'bg-white text-amber-700' : 'bg-emerald-500 text-white animate-pulse' ?>">
              <?= $sidebarUnreadCount ?>
            </span>
          <?php endif; ?>
        </a>
      </nav>
    </div>

    <!-- Bottom Profile & Logout -->
    <div class="p-4 border-t border-stone-200/80 space-y-2">
      <a href="<?= base_url() ?>" target="_blank" class="w-full flex items-center justify-between px-3 py-2 rounded-xl text-xs font-semibold text-stone-600 bg-stone-100 hover:bg-stone-200 transition-colors">
        <span>Lihat Website</span>
        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
      </a>

      <div class="flex items-center justify-between pt-2">
        <div class="flex items-center gap-2">
          <div class="w-8 h-8 rounded-full bg-amber-600 text-white font-bold text-xs flex items-center justify-center">
            <?= substr(session()->get('namaLengkap') ?? 'A', 0, 1) ?>
          </div>
          <div class="truncate max-w-[100px]">
            <span class="text-xs font-bold text-stone-900 block truncate"><?= esc(session()->get('namaLengkap') ?? 'Admin') ?></span>
            <span class="text-[10px] text-stone-500 font-mono">@<?= esc(session()->get('username') ?? 'admin') ?></span>
          </div>
        </div>

        <a href="<?= base_url('admin/logout') ?>" class="p-2 rounded-xl text-red-600 hover:bg-red-50 transition-colors" title="Logout">
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
        </a>
      </div>
    </div>
  </aside>

  <!-- Main Content Area -->
  <div class="flex-grow flex flex-col min-w-0">
    
    <!-- Topbar Header -->
    <header class="h-16 bg-[#FDFCFA]/80 border-b border-amber-900/10 backdrop-blur-md px-6 flex items-center justify-between sticky top-0 z-20">
      <div class="flex items-center gap-3">
        <span class="text-xs font-bold text-amber-800 uppercase tracking-wide">CMS Administrator</span>
      </div>

      <div class="flex items-center gap-3">
        <a href="<?= base_url() ?>" target="_blank" class="px-3 py-1.5 rounded-xl text-xs font-bold text-stone-700 bg-white border border-stone-200 hover:border-amber-600 transition-colors shadow-sm inline-flex items-center gap-1.5">
          <span>🌐 Pratinjau Website</span>
        </a>
      </div>
    </header>

    <!-- Page Body -->
    <main class="p-6 sm:p-8 flex-grow">
      
      <!-- Flash Alert Notifications -->
      <?php if (session()->getFlashdata('success')): ?>
        <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-300 text-emerald-900 text-xs sm:text-sm font-semibold flex items-center gap-3 shadow-sm">
          <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
          <span><?= session()->getFlashdata('success') ?></span>
        </div>
      <?php endif; ?>

      <?php if (session()->getFlashdata('error')): ?>
        <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-300 text-red-900 text-xs sm:text-sm font-semibold flex items-center gap-3 shadow-sm">
          <svg class="w-5 h-5 text-red-600 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
          <span><?= session()->getFlashdata('error') ?></span>
        </div>
      <?php endif; ?>

      <?php if (session()->getFlashdata('errors')): ?>
        <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-300 text-red-900 text-xs sm:text-sm font-semibold shadow-sm space-y-1">
          <div class="font-bold flex items-center gap-2">
            <svg class="w-4 h-4 text-red-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
            <span>Terdapat beberapa kesalahan input:</span>
          </div>
          <ul class="list-disc pl-6 space-y-0.5 text-xs text-red-800">
            <?php foreach (session()->getFlashdata('errors') as $err): ?>
              <li><?= esc($err) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <!-- Dynamic Section -->
      <?= $this->renderSection('admin_content') ?>

    </main>

    <!-- Admin Footer -->
    <footer class="p-6 text-center text-xs text-stone-500 border-t border-stone-200/60 bg-[#FDFCFA]/40">
      Panel Admin SMK Unggulan © <?= date('Y') ?> • CodeIgniter 4 MVC
    </footer>

  </div>

</body>
</html>
