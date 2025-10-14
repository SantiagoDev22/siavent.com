<?php

use CodeIgniter\Files\File;

$lang            = 'es-MX';
$favicon         = 'uploads/settings/' . setting()->get('App.general', 'favicon');
$faviconMimeType = (new File(FCPATH . $favicon, true))->getMimeType();
?>

<?= $this->extend('website/templates/boilerplate') ?>

<?= $this->section('head') ?>
<!-- Plantilla base para todas las páginas del sitio web -->

<!-- Declaración de la URL de la página web -->
<link rel="canonical" href="<?= current_url() ?>" hreflang="<?= esc($lang) ?>">
<link rel="alternate" href="<?= current_url() ?>" hreflang="<?= esc($lang) ?>">

<!-- Favicon -->
<link rel="icon" href="<?= base_url($favicon) ?>" type="<?= $faviconMimeType ?>">

<!-- Hojas de estilos -->
<link rel="stylesheet" href="<?= base_url('css/website.css') ?>">

<!-- Sección de etiquetas agregadas al head -->
<?= $this->renderSection('head') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Sección del contenido agregado a la página web -->
<?= $this->renderSection('content') ?>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<!-- Sección de scripts agregados de javascript -->

<script type="module" src="<?= base_url('js/landing/siema.js') ?>"></script>

<?= $this->renderSection('javascript') ?>
<?= $this->endSection() ?>