<?php

// Prepare writable subdirectories in /tmp for Vercel Serverless environment
$writableDirs = [
    '/tmp/cache',
    '/tmp/logs',
    '/tmp/session',
    '/tmp/uploads',
    '/tmp/debugbar'
];

foreach ($writableDirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0777, true);
    }
}

// Forward Vercel serverless requests to CodeIgniter 4 front controller
require __DIR__ . '/../public/index.php';
