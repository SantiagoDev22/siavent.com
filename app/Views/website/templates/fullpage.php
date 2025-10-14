<?= $this->extend('website/templates/default') ?>

<?= $this->section('head') ?>
    <!-- Plantilla base para todas las páginas del sitio web que no requieren Google Tag Manager -->
    <meta name="robots" content="none">

    <!-- Sección de etiquetas agregadas al head -->
    <?= $this->renderSection('head') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <!-- Sección del contenido agregado a la página web -->
    <?= $this->renderSection('content') ?>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
    <!-- Sección de scripts agregados de javascript -->
    <?= $this->renderSection('javascript') ?>
<?= $this->endSection() ?>
