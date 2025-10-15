<?php
$lang    = 'es-mx';
$company = setting()->get('App.general', 'company');

?>
<?= $this->extend('website/templates/fullpage') ?>

<!-- Secction Head HTML -->
<?= $this->section('head') ?>
<!-- MetaTags -->
<title>Privacy | <?= $company ?></title>

<meta name="description" content="Privacy <?= $company ?>">

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

<main>
    
</main>



<?= $this->endSection() ?>