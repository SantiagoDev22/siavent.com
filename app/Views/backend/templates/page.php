<?php

use CodeIgniter\Files\File;

$favicon = 'uploads/settings/' . setting()->get('App.general', 'favicon');
?>

<?= $this->extend('backend/templates/default') ?>

<?= $this->section('head') ?>
<!-- Plantilla para todas las páginas del backend -->

<!-- Sección de etiquetas del head -->
<?= $this->renderSection('head') ?>

<!-- Favicon -->
<link rel="icon" type="<?= (new File(FCPATH . $favicon))->getMimeType() ?>" href="<?= base_url($favicon) ?>">

<!-- Iconos -->
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

<!-- Hojas de estilo -->
<link rel="stylesheet" href="<?= base_url('css/backend.css') ?>">

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Sección del contenido de la página web -->
<?= $this->renderSection('content') ?>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="<?= base_url('js/landing/flowbite.min.js') ?>"></script>
<script src="<?= base_url('js/landing/dropzone.min.js') ?>"></script>

<!-- Sección de scripts de javascript -->
<?= $this->renderSection('javascript') ?>

<style>
    body {
        -webkit-touch-callout: none;
        /*Desactiva la selección en dispositivos iOS*/
        -webkit-user-select: none;
        /*Desactiva la selección en dispositivos basados en WebKit*/
        -moz-user-select: none;
        /*Desactiva la selección en navegadores basados en Gecko*/
        -ms-user-select: none;
        /*Desactiva la selección en dispositivos basados en Trident/Edge*/
        user-select: none;
        /*Estándar CSS para desactivar la selección*/
    }

    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgb(21 20 20 / 90%);
        border-radius: 8px;
    }

    ::-webkit-scrollbar-thumb {
        border-radius: 8px;
        -webkit-box-shadow: inset 0 0 6px rgb(21 20 20 / 90%);
    }
</style>

<?= $this->endSection() ?>