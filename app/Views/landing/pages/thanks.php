<?= $this->extend('landing/templates/page') ?>

<!-- Secction Head HTML -->
<?= $this->section('head') ?>
    <title>Gracias - On Eventos</title>
    <meta name="description" content="On Eventos">
<?= $this->endSection() ?>
<!-- EndSecction Head -->

<!-- Secction to use JavaScript -->
<?= $this->section('javascript') ?>
<?= $this->endSection() ?>
<!-- EndSecction Javascripts-->

<!-- Section Body Html -->
<?= $this->section('content') ?>

<main class="grid place-content-center lg:grid-cols-[23%_77%] grid-cols-[10%_90%] py-20 h-screen">
    <div class=" bg-[#000] w-full h-screen">

    </div>
    <div class="w-full flex flex-col justify-center items-center">
        <h1 class="font-bold text-4xl lg:text-5xl text-[#000] mb-6">
            ¡Muchas gracias<br>por contactarnos!
        </h1>
        <p class="text-[#282828] text-lg lg:text-xl mb-6">
            Ya tenemos tus datos y están siendo<br>
            asignados a un asesor para que te contacte<br>
            a la brevedad posible y resuelva tus dudas.
        </p>

        <hr class="w-full max-w-xl border-[#999] my-6">

        <div class="flex flex-col justify-center items-center gap-4 mb-10 w-full max-w-xl">
            <a href="<?= esc(setting()->get('App.apps', 'whatsapp')) ?>" target="_blank"
               class="bg-black text-white px-6 py-2 rounded-full w-fit flex items-center justify-center gap-2 text-sm lg:text-base hover:bg-[#222] transition">
                <img src="<?= base_url('images/index/whatsapp.svg') ?>" alt="WhatsApp" class="w-5 h-5">
                Mándanos un WhatsApp
            </a>
            <a href="tel:4422702947" class="bg-black text-white px-6 py-2 rounded-full w-fit flex items-center justify-center gap-2 text-sm lg:text-base hover:bg-[#222] transition">
                <img src="<?= base_url('images/index/image.png') ?>" alt="Llamar" class="w-5 h-5">
                Llámanos al 442 270 2947
            </a>
        </div>

        <p class="text-[#282828] text-sm lg:text-base mb-4">Síguenos en redes sociales</p>
        <div class="flex items-center justify-center gap-4">
            <a href="https://www.instagram.com/oneventos/" target="_blank" rel="noopener noreferrer">
                <img class="w-6 h-6" src="<?= base_url('images/index/instagram.svg') ?>" alt="Instagram">
            </a>
            <a href="https://www.tiktok.com/@oneventos" target="_blank" rel="noopener noreferrer">
                <img class="w-6 h-6" src="<?= base_url('images/index/tiktok.svg') ?>" alt="TikTok">
            </a>
            <a href="https://www.youtube.com/@oneventos9515" target="_blank" rel="noopener noreferrer">
                <img class="w-6 h-6" src="<?= base_url('images/index/youtube.svg') ?>" alt="YouTube">
            </a>
        </div>
    </div>
</main>

<?= $this->endSection() ?>