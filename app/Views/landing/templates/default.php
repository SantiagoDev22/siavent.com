<?php

use CodeIgniter\Files\File;

$favicon = 'uploads/settings/' . setting()->get('App.general', 'favicon');
$lang    = 'es-MX';

?>

<!doctype html>
<html lang="<?= esc($lang) ?>">

<head>
    <!-- Plantilla base para todas las páginas del sitio web -->

    <!-- Etiquetas del head -->
    <?= $this->renderSection('head') ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="index">
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="content-language" content="">

    <!-- Fuentes tipográficas -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Font Family -->
    <link href="" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="<?= (new File(FCPATH . $favicon))->getMimeType() ?>" href="<?= base_url($favicon) ?>">

    <!-- Etiqueta Hreflang -->
    <link rel="alternate" hreflang="<?= esc($lang) ?>" href="<?= current_url() ?>" />

    <!-- Hojas de estilo -->
    <link rel="stylesheet" href="<?= base_url('css/website.css') ?>">

    <!-- Canonical -->
    <link rel="canonical" href="<?= current_url() ?>" />
</head>

<body>
    <!-- Sección del contenido de la página web -->
    <?= $this->renderSection('content') ?>

    <!-- Scripts de JavaScript -->
    <?= $this->renderSection('javascript') ?>
</body>

</html>