<?= $this->extend('auth/templates/page') ?>

<?= $this->section('head') ?>
<!-- Plantilla base para todas las páginas de autenticación del sistema -->

<!-- Sección de etiquetas agregadas al head -->
<?= $this->renderSection('head') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class=" bg-[#ECECEC] bg-center min-h-screen flex flex-col lg:justify-start justify-center lg:pt-[100px] items-center">
    <main class="container">
        <div class="bg-white rounded-[40px] shadow-md container flex flex-col items-center pt-7 px-5 md:px-12 pb-11 max-w-full sm:max-w-lg lg:max-w-3xl">
            <!-- Sección del contenido agregado a la página web -->
            <?= $this->renderSection('content') ?>
        </div>
    </main>
    <div class="p-2">
        <ul class="flex items-center justify-end gap-5">
            <li class="hover:underline"><a target="_blank" href="https://develogy.com.mx/politica-de-privacidad">Privacidad</a></li>
            <li class="hover:underline"><a target="_blank" href="https://develogy.com.mx/terminos-y-condiciones">Condiciones</a></li>
        </ul>
    </div>
    <div class="w-full p-2 pr-4 bottom-2 absolute">
        <ul class="flex items-center justify-center md:justify-end gap-5 text-center text-sm">
            <li class="hover:underline"><a target="_blank" href="https://develogy.com.mx/">© 2023 Develogy™. Todos los derechos reservados.</a></li>
        </ul>
    </div>
</div>

<style>
    body {
        -webkit-touch-callout: none;
        /*Desactiva la selección en dispositivos iOS*/
        -webkit-user-select: none;
        /*Desactiva la selección en dispositivos basados en WebKit */
        -moz-user-select: none;
        /*Desactiva la selección en navegadores basados en Gecko */
        -ms-user-select: none;
        /*Desactiva la selección en dispositivos basados en Trident/Edge */
        user-select: none;
        /*Estándar CSS para desactivar la selección */
    }
</style>
<?= $this->endSection() ?>