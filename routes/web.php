<?php

use Illuminate\Support\Facades\Route;

// sitemap routes
Route::get('/index-sitemap.xml', [\App\Http\Controllers\Sitemap::class, 'index'])->name('sitemap.index');
Route::get('/post-sitemap.xml', [\App\Http\Controllers\Sitemap::class, 'posts'])->name('sitemap.posts');
Route::get('/page-sitemap.xml', [\App\Http\Controllers\Sitemap::class, 'pages'])->name('sitemap.pages');
Route::get('/portfolio-sitemap.xml', [\App\Http\Controllers\Sitemap::class, 'portfolio'])->name('sitemap.portfolio');
Route::get('/location.kml', [\App\Http\Controllers\Sitemap::class, 'locations'])->name('sitemap.locations');
Route::get('/main-sitemap.xsl', [\App\Http\Controllers\Sitemap::class, 'main'])->name('sitemap.main');