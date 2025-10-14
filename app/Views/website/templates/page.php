<?php
$lang       = 'es-MX';
$tagManager = setting()->get('App.apps', 'google:tagManager');
$company    = setting()->get('App.general', 'company');
?>

<?= $this->extend('website/templates/default') ?>

<?= $this->section('head') ?>
    <!-- Plantilla base para todas las páginas del sitio web que requieren Google Tag Manager -->

    <!-- Google Tag Manager -->
    <?php if (ENVIRONMENT === 'production'): ?>
        <script>
            (function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != "dataLayer" ? "&l=" + l : "";
                j.async = true;
                j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, "script", "dataLayer", "<?= esc($tagManager, 'js') ?>");
        </script>
    <?php endif ?>
    <!-- End Google Tag Manager -->

    <meta name="robots" content="index, follow">

    <!-- Meta etiquetas generales de Open Graph -->
    <meta property="og:site_name" content="<?= esc($company) ?>">
    <meta property="og:url" content="<?= current_url() ?>">
    <meta property="og:locale" content="<?= esc($lang) ?>">
    <meta property="og:type" content="website">
    <meta property="og:image:alt" content="Preview HQH">

    <!-- Meta etiquetas generales de Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@grupohqh">
    <meta name="twitter:image:alt" content="Preview HQH">

    <!-- Meta etiquetas generales de geolocalización -->
    <meta name="geo.region" content="MX-SLP" />
    <meta name="geo.placename" content="San Luis Potosí" />
    <meta name="geo.position" content="22.138285;-100.981492" />
    <meta name="ICBM" content="22.138285, -100.981492" />


    <!-- Meta etiquetas generales de Dublin Core -->
    <meta name="DC.Identifier" content="<?= current_url() ?>">
    <meta name="DC.Format" content="text/html">
    <meta name="DC.Language" content="<?= esc($lang) ?>">
    <meta name="DC.Creator" content="<?= esc($company) ?>">
    <meta name="DC.Publisher" content="<?= esc($company) ?>">
    <meta name="DC.Coverage" content="22.138285, -100.981492">
    <meta name="DC.Type" content="Service">

    <!-- Datos estructurados -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "<?= esc($company) ?>",
            "url": "<?= current_url() ?>",
            "logo": "<?= base_url('images/pages/layouts/logo.svg') ?>",
            "sameAs": [
                "https://www.youtube.com/channel/UCRSpzv_vE8-wK-ZG6Us_3nA"
            ],
            "contactPoint": [
                {
                "@type": "ContactPoint",
                "telephone": "<?= esc(setting()->get('App.general', 'phones')) ?>",
                "contactType": "customer service",
                "contactOption": "TollFree",
                "areaServed": "MX",
                "availableLanguage": "es"
                }
            ]
        }
    </script>

    <!-- Sección de etiquetas agregadas al head -->
    <?= $this->renderSection('head') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <!-- Google Tag Manager (noscript) -->
    <?php if (ENVIRONMENT === 'production'): ?>
        <noscript>
            <iframe
                src="<?= single_service('uri', 'https://www.googletagmanager.com/ns.html')->setQueryArray(['id' => $tagManager]) ?>"
                height="0"
                width="0"
                style="display: none; visibility: hidden;">
            </iframe>
        </noscript>
    <?php endif ?>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Sección del contenido agregado a la página web -->
    <?= $this->renderSection('content') ?>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
    <!-- Sección de scripts agregados de javascript -->

    <?= $this->renderSection('javascript') ?>
<?= $this->endSection() ?>
