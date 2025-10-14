<?php $lang = 'es-MX' ?>

<!doctype html>
<html lang="<?= esc($lang) ?>">
<head>
    <!-- Plantilla base para todas las platillas del sitio web -->

    <!-- Meta etiquetas generales -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="<?= esc(setting()->get('App.general', 'company')) ?>">

    <!-- Sección de etiquetas agregadas al head -->
    <?= $this->renderSection('head') ?>
</head>
<body>
    <!-- Sección del contenido agregado a la página web -->
    <?= $this->renderSection('content') ?>

    <!-- Sección de scripts agregados de javascript -->
    <?= $this->renderSection('javascript') ?>
</body>
</html>
