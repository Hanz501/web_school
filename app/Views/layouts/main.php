<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($title ?? 'SMK Unggulan - Pusat Keunggulan Vokasi') ?></title>
  <meta name="description" content="<?= esc($meta_description ?? 'SMK Unggulan - Sekolah Menengah Kejuruan Pusat Keunggulan dengan kurikulum link and match industri.') ?>">
  <meta name="theme-color" content="#FFF8F6">

  <!-- Favicon -->
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23B45309'><path d='M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5'/></svg>">

  <!-- Google Fonts: Plus Jakarta Sans & JetBrains Mono -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Tailwind CSS CDN with Warm Light Liquid Glass Tokens -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          fontFamily: {
            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
            mono: ['"JetBrains Mono"', 'monospace']
          },
          colors: {
            warmbg: {
              100: '#FFF8F6',
              200: '#F9F2F0',
              300: '#DFD9D7',
            },
            warmsurface: 'rgba(255, 248, 246, 0.75)',
            warmcard: 'rgba(255, 255, 255, 0.85)',
            warmborder: 'rgba(180, 83, 9, 0.12)',
            stoneborder: 'rgba(68, 64, 60, 0.08)',
            amber: {
              50: '#FFFBEB',
              100: '#FEF3C7',
              200: '#FDE68A',
              300: '#FCD34D',
              400: '#FBBF24',
              500: '#F59E0B', 
              600: '#D97706',
              700: '#B45309', // Primary Accent
              800: '#92400E', // Hover Accent
              900: '#78350F',
              950: '#451A03',
            },
            caramel: '#C26727', // Secondary Accent
            emeraldstatus: '#059669',
            emeraldstatusbg: 'rgba(5, 150, 105, 0.1)',
            stonecharcoal: '#1C1917', // Headings
            stoneslate: '#57534E',    // Secondary Body
            stonemuted: '#78716C',    // Muted
          }
        }
      }
    }
  </script>

  <!-- Custom Warm Light Liquid Glass Theme -->
  <link rel="stylesheet" href="<?= base_url('css/liquid-theme.css') ?>">
</head>
<body class="bg-[#FFF8F6] text-[#1C1917] antialiased selection:bg-amber-100 selection:text-amber-900 min-h-screen flex flex-col justify-between">

  <!-- Sticky Header (Navbar) -->
  <?= $this->include('partials/navbar') ?>

  <!-- Dynamic Content Section -->
  <main class="flex-grow">
    <?= $this->renderSection('content') ?>
  </main>

  <!-- Footer Component -->
  <?= $this->include('partials/footer') ?>

  <!-- Modal Popups -->
  <?= $this->include('partials/modal_berita') ?>
  <?= $this->include('partials/modal_galeri') ?>
  <?= $this->include('partials/modal_maps') ?>
  <?= $this->include('partials/modal_profil') ?>

  <!-- Core JavaScript Handlers (Vanilla JS) -->
  <script src="<?= base_url('js/roda-jurusan.js') ?>"></script>
  <script src="<?= base_url('js/modal-handler.js') ?>"></script>
</body>
</html>
