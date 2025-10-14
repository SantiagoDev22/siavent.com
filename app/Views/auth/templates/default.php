<?php
$lang = service('request')->getLocale();
?>

<!doctype html>
<html lang="<?= esc($lang) ?>">

<head>
    <!-- Plantilla base para todas las páginas del backend -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Sección de etiquetas del head -->
    <?= $this->renderSection('head') ?>

    <!-- Declaración de la URL de la página web -->
    <link rel="canonical" href="<?= current_url() ?>" hreflang="<?= esc($lang) ?>">
</head>

<body>
    <!-- Sección del contenido de la página web -->
    <?= $this->renderSection('content') ?>

    <!-- Sección de scripts de javascript -->
    <?= $this->renderSection('javascript') ?>
</body>

</html>