<?= $this->extend('landing/templates/default') ?>

<?= $this->section('head') ?>
    <!-- Plantilla para todas las páginas del sitio web que requieren Google Tag Manager -->

    <!-- HEADER Google Tag Manager -->
    <?php if (ENVIRONMENT === 'production') : ?>
        <script>
            (function(w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start': new Date().getTime(),
                    event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', '<?= esc(setting()->get('App.apps', 'google:tagManager')) ?>');
        </script>
    <?php endif ?>
    <!-- End HEADER Google Tag Manager -->

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "",
        "url": "",
        "logo": "",
        "alternateName": "",
        "sameAs": [
            "",
        ],
        "contactPoint": [
            {
            "@type": "ContactPoint",
            "telephone": "",
            "contactType": "customer service",
            "contactOption": "TollFree",
            "areaServed": "MX",
            "availableLanguage": "es"
            }
        ]
    }
    </script>

    <style>
        /* body {
            -webkit-touch-callout: none; //Desactiva la selección en dispositivos iOS
            -webkit-user-select: none; //Desactiva la selección en dispositivos basados en WebKit
            -moz-user-select: none; //Desactiva la selección en navegadores basados en Gecko
            -ms-user-select: none; //Desactiva la selección en dispositivos basados en Trident/Edge
            user-select: none; //Estándar CSS para desactivar la selección
        }  */

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
        }
    </style>

    <!-- Sección de etiquetas del head -->
    <?= $this->renderSection('head') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <!-- BODY Google Tag Manager (noscript) -->
    <?php if (ENVIRONMENT === 'production') : ?>
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=<?= esc(setting()->get('App.apps', 'google:tagManager'), 'url') ?>" height="0" width="0" style="display: none; visibility: hidden;">
            </iframe>
        </noscript>
    <?php endif ?>
    <!-- End BODY Google Tag Manager (noscript) -->

    <!-- Sección del contenido de la página web -->
    <?= $this->renderSection('content') ?>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Siema -->
    <script src="<?= base_url('js/landing/siema.js') ?>"></script>
    <!-- Slider Siema -->
    <script src="<?= base_url('js/landing/slider-images.js') ?>"></script>
    <!--Flowbite -->
    <script src="<?= base_url('js/landing/flowbite.min.js') ?>"></script>
    <!--Observe -->
    <script src="<?= base_url('js/landing/observe.js') ?>"></script>
    <!-- Sección de scripts de JavaScript -->
    <?= $this->renderSection('javascript') ?>
<?= $this->endSection() ?>
