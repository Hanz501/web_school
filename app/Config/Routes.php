<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// 1. Public Routes
$routes->get('/', 'Home::index');
$routes->post('pesan/kirim', 'Home::kirimPesan');

// 2. Auth Routes
$routes->get('admin/login', 'Auth::login');
$routes->post('admin/login', 'Auth::attemptLogin');
$routes->get('admin/logout', 'Auth::logout');

// 3. Protected Admin Routes
$routes->group('admin', ['filter' => 'auth'], static function ($routes) {
    // Dashboard
    $routes->get('', 'Admin\Dashboard::index');
    $routes->get('dashboard', 'Admin\Dashboard::index');

    // CRUD Berita
    $routes->get('berita', 'Admin\Berita::index');
    $routes->get('berita/create', 'Admin\Berita::create');
    $routes->post('berita/store', 'Admin\Berita::store');
    $routes->get('berita/edit/(:num)', 'Admin\Berita::edit/$1');
    $routes->post('berita/update/(:num)', 'Admin\Berita::update/$1');
    $routes->get('berita/delete/(:num)', 'Admin\Berita::delete/$1');

    // CRUD Galeri
    $routes->get('galeri', 'Admin\Galeri::index');
    $routes->get('galeri/create', 'Admin\Galeri::create');
    $routes->post('galeri/store', 'Admin\Galeri::store');
    $routes->get('galeri/edit/(:num)', 'Admin\Galeri::edit/$1');
    $routes->post('galeri/update/(:num)', 'Admin\Galeri::update/$1');
    $routes->get('galeri/delete/(:num)', 'Admin\Galeri::delete/$1');

    // CRUD Jurusan
    $routes->get('jurusan', 'Admin\Jurusan::index');
    $routes->get('jurusan/edit/(:segment)', 'Admin\Jurusan::edit/$1');
    $routes->post('jurusan/update/(:segment)', 'Admin\Jurusan::update/$1');

    // Manajemen Profil Sekolah & Sejarah
    $routes->get('profil', 'Admin\Profil::index');
    $routes->post('profil/update', 'Admin\Profil::update');
    $routes->get('profil/sejarah/create', 'Admin\Profil::createSejarah');
    $routes->post('profil/sejarah/store', 'Admin\Profil::storeSejarah');
    $routes->get('profil/sejarah/edit/(:num)', 'Admin\Profil::editSejarah/$1');
    $routes->post('profil/sejarah/update/(:num)', 'Admin\Profil::updateSejarah/$1');
    $routes->get('profil/sejarah/delete/(:num)', 'Admin\Profil::deleteSejarah/$1');

    // Manajemen Bagan Struktur Organisasi
    $routes->get('struktur', 'Admin\Struktur::index');
    $routes->get('struktur/create', 'Admin\Struktur::create');
    $routes->post('struktur/store', 'Admin\Struktur::store');
    $routes->get('struktur/edit/(:num)', 'Admin\Struktur::edit/$1');
    $routes->post('struktur/update/(:num)', 'Admin\Struktur::update/$1');
    $routes->get('struktur/delete/(:num)', 'Admin\Struktur::delete/$1');

    // Kotak Masuk Pesan & Pengaduan
    $routes->get('pesan', 'Admin\Pesan::index');
    $routes->get('pesan/read/(:num)', 'Admin\Pesan::markAsRead/$1');
    $routes->get('pesan/mark-all-read', 'Admin\Pesan::markAllRead');
    $routes->get('pesan/delete/(:num)', 'Admin\Pesan::delete/$1');
});
