<?php
$company = setting()->get('App.general', 'company');
?>
<?= $this->extend('landing/templates/page') ?>

<!-- Secction Head HTML -->
<?= $this->section('head') ?>
<!-- MetaTags -->
<title><?= esc($landing['title']) ?> | <?= esc($company) ?></title>
<meta name="description" content="<?= esc($landing['title']) ?> | <?= esc($company) ?>">
<?= $this->endSection() ?>
<!-- EndSecction Head -->
<!-- Secction to use JavaScript -->
<?= $this->section('javascript') ?>
<!-- Siema JS -->
<script src="https://unpkg.com/siema@1.5.1/dist/siema.min.js"></script>
<!-- Inicializar Siema -->
<!-- Inicializar Siema + paginador -->

<script src="<?= base_url('js/landing/slider.js') ?>"></script>

<?= $this->endSection() ?>
<!-- EndSecction Javascripts-->

<!-- Section Body Html -->
<?= $this->section('content') ?>
<main>
    <?= $this->include('landing/layouts/navbar'); ?>
 
</main>
<?= $this->endSection() ?>