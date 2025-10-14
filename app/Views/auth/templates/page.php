<?php
use CodeIgniter\Files\File;

$favicon = 'uploads/settings/' . setting()->get('App.general', 'favicon');
?>

<?= $this->extend('auth/templates/default') ?>

<?= $this->section('head') ?>
    <!-- Plantilla para todas las páginas del backend -->

    <!-- Sección de etiquetas del head -->
    <?= $this->renderSection('head') ?>

    <!-- Favicon -->
    <link rel="icon" type="<?= (new File(FCPATH . $favicon))->getMimeType() ?>" href="<?= base_url($favicon) ?>">

    <!-- Hojas de estilo -->
    <link rel="stylesheet" href="<?= base_url('css/login.css') ?>">

<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <!-- Sección del contenido de la página web -->
    <?= $this->renderSection('content') ?>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
    <!-- Sección de scripts de javascript -->
    <?= $this->renderSection('javascript') ?>
<?= $this->endSection() ?>
