<?php
$lang    = 'es-mx';
$company = setting()->get('App.general', 'company');

?>
<?= $this->extend('website/templates/fullpage') ?>

<!-- Secction Head HTML -->
<?= $this->section('head') ?>
    <!-- MetaTags -->
    <title>Error 404 | <?= esc($company) ?></title>

    <meta name="description" content="Error 404">

<?= $this->endSection() ?>
<!-- EndSecction Head -->

<!-- Secction to use JavaScript -->
<?= $this->section('javascript') ?>

    <!-- yours scripts -->
    <script src="<?= base_url('') ?>"></script>

<?= $this->endSection() ?>
<!-- EndSecction Javascripts-->

<!-- Section Body Html -->
<?= $this->section('content') ?>

    <div>
        <h1 class='text-center'>Error 404</h1><br/>
    </div>


<?= $this->endSection() ?>
