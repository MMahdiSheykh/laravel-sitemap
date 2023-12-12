<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<?php echo '<?xml-stylesheet type="text/xsl" href="' . route('sitemap.main') . '"?>'; ?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc>{{ route('sitemap.posts') }}</loc>
        <lastmod>{{ $lastmodPosts }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ route('sitemap.pages') }}</loc>
        <lastmod>{{ $lastmodPages }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ route('sitemap.portfolio') }}</loc>
        <lastmod>{{ $lastmodPortfolio }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ route('sitemap.locations') }}</loc>
        <lastmod>{{ $lastmodLocations }}</lastmod>
    </sitemap>
</sitemapindex>
