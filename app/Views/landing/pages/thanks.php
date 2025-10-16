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

<main class=" w-full min-h-screen relative">
    <div class=" absolute bottom-3 left-1/2 transform lg:block hidden -translate-x-1/2">
        <p class=" lg:text-base text-sm font-poppins text-center py-4 leading-[180px] text-white lg:px-0 px-7">Sia Ventilación® Todos los derechos reservados 2025 • Política de privacidad <br class=" lg:block hidden ">
            Diseño y desarrollo por Leads al Cubo</p>
    </div>
    <div class=" bg-fondo-thanks w-full min-h-screen lg:min-h-screen bg-center place-content-center bg-cover object-cover">
        <div class=" flex flex-col items-center justify-center">
            <div>
                <figure>
                    <img class=" w-auto lg:h-[172px] h-[144px]" width="0" height="0" loading="lazy" src="<?= base_url('images/landing/home/logo.svg') ?>" alt="">
                </figure>
            </div>
            <div class=" flex items-center justify-center flex-col">
                <h1 class=" lg:mt-20 mt-[60px] lg:text-[34px] text-[28px] uppercase text-center font-poppins  leading-[140%] font-extrabold text-[#E73636]">¡Gracias!</h1>
                <h2 class=" lg:text-[28px] text-[24px] text-white text-center leading-[140%] font-poppins font-extrabold uppercase mt-[12px]">Hemos recibido tus datos con éxito</h2>
                <p class=" lg:text-lg text-base text-center text-white leading-[180%] font-poppins font-medium">Un experto se pondrá en contacto contigo a la brevedad.</p>
                <a href="" class=" px-[20px] py-[10px] rounded-[25px] mt-10 border-white border-[2px] hover:border-transparent bg-transparent hover:bg-white text-white hover:text-[#E73636] font-medium text-xl font-poppins">Regresar</a>
                <p class=" lg:text-lg text-base leading-[180%] text-center text-white font-poppins font-medium mt-10">¿Tienes dudas? Envíanos un mensaje</p>
                <a href="tel:7226480074" class=" font-bold text-white lg:text-lg text-base leading-[180%] text-center font-poppins">722 648 0074</a>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection() ?>