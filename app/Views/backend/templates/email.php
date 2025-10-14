<?php
use CodeIgniter\I18n\Time;

?>

<?= $this->extend('backend/templates/default') ?>

<?= $this->section('head') ?>
    <!-- Plantilla para todas los emails -->

    <!-- Sección de etiquetas del head -->
    <?= $this->renderSection('head') ?>

    <style>
        <?= file_get_contents(FCPATH . 'css/backend.css') ?>
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="bg-base-300 min-h-screen" style="display:flex; flex-direction:column; justify-content:center; align-items:center;">
        <div style="margin-left: auto; margin-right:auto; padding-left:1rem; padding-right:1rem; width:100%;">
            <div class="bg-base-100 p-8 rounded shadow-md">
                <!-- Logo de la compañía -->
                <a
                    href="<?= base_url() ?>"
                    target="_blank"
                >
                    <img
                        src="<?= base_url(['uploads/settings/', setting()->get('App.general', 'logo')]) ?>"
                        alt="Logo <?= esc(setting()->get('App.general', 'company')) ?>"
                        style="width: 250px;height: auto;position: relative;object-fit: cover; filter: invert(1);"
                    >
                </a>

                <!-- Sección del contenido del correo -->
                <div class="pt-8">
                    <?= $this->renderSection('content') ?>
                </div>
            </div>

            <!-- Pie de página del correo -->
            <div class="footer footer-center pt-8 text-base-content">
                <p class="whitespace-pre-line">Copyright &copy; <?= Time::now()->year ?> - Todos los derechos reservados por
                    <?= esc(setting()->get('App.general', 'company')) ?>
                </p>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
