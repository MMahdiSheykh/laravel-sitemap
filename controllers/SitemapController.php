<?php

namespace App\Http\Controllers;

use App\Models\{Post, Setting};
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $lastmodPosts =
            Post::query()->latest()->where('post_type', 'post')->first() <> null ?
                Post::query()->latest()->where('post_type', 'post')->first()->updated_at : '';
        $lastmodPages =
            Post::query()->latest()->where('post_type', 'page')->first() <> null ?
                Post::query()->latest()->where('post_type', 'page')->first()->updated_at : '';
        $lastmodPortfolio =
            Post::query()->latest()->where('post_type', 'portfolio')->first() <> null ?
                Post::query()->latest()->where('post_type', 'portfolio')->first()->updated_at : '';
        $lastmodLocations =
            Setting::query()->where('name', 'footer')->first() <> null ?
                Setting::query()->where('name', 'footer')->first()->updated_at : '';

        return response()
            ->view('sitemap.index-sitemap', compact('lastmodPosts', 'lastmodPages', 'lastmodPortfolio', 'lastmodLocations'))
            ->header('Content-Type', 'text/xml');
    }

    public function posts()
    {
        $posts = Post::query()
            ->latest()
            ->where('post_type', 'post')
            ->where('status_id', 1)
            ->get()
            ->map(function ($post) {
                return [
                    'url' => $post->path(),
                    'images' => [...$post->files()->whereIn('type', [1, 2])->get()->map(fn($image) => $image->url)],
                    'lastMod' => $post->updated_at->format('Y-m-d H:i:s')
                ];
            });

        return response()
            ->view('sitemap.post-sitemap', compact('posts'))
            ->header('Content-Type', 'text/xml');
    }

    public function locations()
    {
        return response()->view('sitemap.locations')
            ->header('Content-Type', 'text/xml');
    }

    public function pages()
    {
        $posts = Post::query()
            ->latest()
            ->where('post_type', 'page')
            ->where('status_id', 1)
            ->get()
            ->map(function ($post) {
                return [
                    'url' => $post->path(),
                    'images' => [...$post->files()->whereIn('type', [1, 2])->get()->map(fn($image) => $image->url)],
                    'lastMod' => $post->updated_at->format('Y-m-d H:i:s')
                ];
            });

        return response()
            ->view('sitemap.post-sitemap', compact('posts'))
            ->header('Content-Type', 'text/xml');
    }

    public function portfolio()
    {
        $posts = Post::query()
            ->latest()
            ->where('post_type', 'portfolio')
            ->where('status_id', 1)
            ->get()
            ->map(function ($post) {
                return [
                    'url' => $post->path(),
                    'images' => [...$post->files()->whereIn('type', [1, 2])->get()->map(fn($image) => $image->url)],
                    'lastMod' => $post->updated_at->format('Y-m-d H:i:s')
                ];
            });

        return response()
            ->view('sitemap.post-sitemap', compact('posts'))
            ->header('Content-Type', 'text/xml');
    }

    public function main()
    {
        return response()
            ->view('sitemap.main-sitemap')
            ->header('Content-Type', 'text/xsl');
    }
}
