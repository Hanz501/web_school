<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($title ?? 'Login Administrator - SMK Unggulan') ?></title>
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23B45309'><path d='M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5'/></svg>">

  <!-- Google Fonts & Tailwind -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="<?= base_url('css/liquid-theme.css') ?>">
</head>
<body class="min-h-screen bg-[#F6F3EE] flex items-center justify-center p-4 relative overflow-hidden">

  <!-- Ambient Glow Backgrounds -->
  <div class="absolute -top-32 -left-32 w-96 h-96 bg-amber-400/20 rounded-full blur-3xl pointer-events-none"></div>
  <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-orange-400/20 rounded-full blur-3xl pointer-events-none"></div>

  <!-- Main Login Card -->
  <div class="w-full max-w-md liquid-glass-elevated bg-white/90 backdrop-blur-2xl p-8 sm:p-10 rounded-3xl border border-amber-900/15 shadow-2xl relative z-10">
    
    <!-- School Emblem -->
    <div class="text-center mb-8">
      <div class="inline-flex w-14 h-14 rounded-2xl bg-gradient-to-tr from-amber-700 to-amber-500 text-white items-center justify-center shadow-lg shadow-amber-600/30 mb-3">
        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
      </div>
      <h1 class="text-2xl font-extrabold text-stone-900 tracking-tight">Login Administrator</h1>
      <p class="text-xs text-stone-500 mt-1">Panel Pengelolaan Konten & Vokasi SMK Unggulan</p>
    </div>

    <!-- Flash Alerts -->
    <?php if (session()->getFlashdata('error')): ?>
      <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-900 text-xs font-semibold flex items-center gap-2">
        <svg class="w-4 h-4 text-red-600 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
        <span><?= session()->getFlashdata('error') ?></span>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
      <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-900 text-xs font-semibold flex items-center gap-2">
        <svg class="w-4 h-4 text-emerald-600 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        <span><?= session()->getFlashdata('success') ?></span>
      </div>
    <?php endif; ?>

    <!-- Login Form -->
    <form action="<?= base_url('admin/login') ?>" method="POST" class="space-y-4">
      <?= csrf_field() ?>

      <div>
        <label for="login" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-1.5">Username atau Email</label>
        <div class="relative">
          <input 
            type="text" 
            name="login" 
            id="login" 
            value="<?= old('login') ?>" 
            required 
            placeholder="admin / admin@smk-unggulan.sch.id" 
            class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20 transition-all">
        </div>
      </div>

      <div>
        <label for="password" class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-1.5">Password</label>
        <div class="relative">
          <input 
            type="password" 
            name="password" 
            id="password" 
            required 
            placeholder="••••••••" 
            class="w-full px-4 py-3 rounded-2xl bg-white border border-stone-200 text-stone-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20 transition-all">
        </div>
      </div>

      <button 
        type="submit" 
        class="w-full btn-amber-gradient py-3.5 rounded-2xl text-sm font-extrabold flex items-center justify-center gap-2 shadow-lg mt-2">
        <span>Masuk ke Dashboard</span>
        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
      </button>
    </form>

    <!-- Info Box: Default Credentials -->
    <div class="mt-6 p-4 rounded-2xl bg-amber-500/10 border border-amber-900/10 text-xs text-stone-600">
      <div class="font-bold text-amber-950 mb-1 flex items-center gap-1.5">
        <svg class="w-3.5 h-3.5 text-amber-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
        Akun Default Administrator:
      </div>
      <p class="font-mono text-[11px] text-stone-700">User: <strong>admin</strong> | Pass: <strong>admin123</strong></p>
    </div>

    <div class="text-center mt-6">
      <a href="<?= base_url() ?>" class="text-xs font-bold text-stone-500 hover:text-amber-800 transition-colors">
        ← Kembali ke Halaman Utama Website
      </a>
    </div>

  </div>

</body>
</html>
