<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<?php echo '<?xml-stylesheet type="text/xsl" href="' . route('sitemap.main') . '"?>'; ?>

<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd http://www.google.com/schemas/sitemap-image/1.1 http://www.google.com/schemas/sitemap-image/1.1/sitemap-image.xsd"
        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @foreach($posts as $post)
        <url>
            <loc>{{ $post['url'] }}</loc>
            <lastmod>{{ $post['lastMod'] }}</lastmod>
            <changeefreq>daily</changeefreq>
            <priority>1.0</priority>
            @foreach($post['images'] as $image)
                <image:image>
                    <image:loc>{{ $image }}</image:loc>
                </image:image>
            @endforeach
        </url>
    @endforeach

</urlset>
