<?php
$lang    = 'es-mx';
$company = setting()->get('App.general', 'company');

?>
<?= $this->extend('website/templates/page') ?>

<!-- Secction Head HTML -->
<?= $this->section('head') ?>
<!-- MetaTags -->
<title>Home Page | <?= esc($company) ?></title>

<meta name="description" content="enter your description">

<!-- MetaTags OpenGraph -->
<meta property="og:title" content="">
<meta property="og:description" content="">
<meta property="og:url" content="<?= current_url('') ?>">
<meta property="og:image" content="<?= base_url('') ?>">
<meta property="og:image:alt" content="">
<meta property="og:type" content="website">

<!-- MetaTags Twitter -->
<meta name="twitter:title" content="">
<meta name="twitter:description" content="">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="">
<meta name="twitter:image" content="<?= base_url('') ?>">
<meta name="twitter:image:alt" content="">

<!-- MetaTags DublinCore -->
<meta name="DC.Title" content="">
<meta name="DC.Description" content="">
<meta name="DC.Type" content="">

<!-- MetaTags GeoTag -->
<meta name="geo.region" content="">
<meta name="geo.placename" content="">
<meta name="geo.position" content="">
<meta name="ICBM" content="">

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
<?= $this->include('website/layouts/navbar') ?>

<div>
    <h1 class='text-center'>Welcome To My Website!</h1><br />
</div>

<?= $this->include('website/layouts/footer') ?>

<?= $this->endSection() ?>