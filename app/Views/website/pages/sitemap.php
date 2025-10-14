<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <!-- URLs del sitio web -->
    <url>
        <loc><?= url_to('website.pages.home') ?></loc>
        <lastmod><?= esc($fileTime('website/pages/home')) ?></lastmod>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?= url_to('') ?></loc>
        <lastmod><?= esc($fileTime('')) ?></lastmod>
        <priority>0.8</priority>
    </url>

    <!-- URLs dinamics -->
    <?php foreach ($array as $item): ?>
        <url>
            <loc><?= url_to('', $item['base_urls']) ?></loc>
            <lastmod><?= esc(w3cDate($item['updated_at'])) ?></lastmod>
            <priority>0.8</priority>
        </url>
    <?php endforeach ?>

</urlset>
