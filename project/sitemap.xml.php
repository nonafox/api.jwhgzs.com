<? header('Content-type: application/xml') ?>
<?= '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset>
    <?
        /* sitemap 生成 */
        function go($loc, $lastmod = 0, $changfreq = 'daily', $priority = '0.8') {
            $lastmod = $lastmod === 0 ? date('Y-m-d') : $lastmod;
            echo(<<<XML
<url><loc>$loc</loc><lastmod>$lastmod</lastmod><changfreq>$changfreq</changfreq><priority>$priority</priority></url>
XML
            );
        }
        
        foreach (c::$SEO_INF['urls'] as $v) {
            go(u($v));
        }
    ?>
</urlset>