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
<!-- Section carrusel -->
<?php
if (isset($sections) && is_array($sections)) {
    $section_texts = [];
    $section_texts_two  = [];
    $section_text_three  = [];
    $section_carrusel  = [];

    foreach ($sections as $section) {
        if ($section['section_type'] === 'parrafo_imagen' && $section['sort_order'] == 0) {
            $section_texts = json_decode($section['content'], true);
        }
        if ($section['section_type'] === 'parrafo_imagen' && $section['sort_order'] == 1) {
            $section_texts_two = json_decode($section['content'], true);
        }
        if ($section['section_type'] === 'parrafo_imagen' && $section['sort_order'] == 2) {
            $section_text_three = json_decode($section['content'], true);
        }
        if ($section['section_type'] === 'carrusel_texto' && $section['sort_order'] == 3) {
            $section_carrusel = json_decode($section['content'], true);
        }
    }
}
?>
<main>
    <?= $this->include('landing/layouts/navbar') ?>
    <!-- Above the fold -->
    <section class=" relative ">
        <div class=" relative z-10">
            <figure>
                <img class=" w-full min-h-screen lg:[@media(max-height:760px)]:h-[24rem] lg:h-[900px] bg-cover bg-no-repeat object-cover" width="0" height="0" src="<?= base_url('images/landing/hero.webp') ?>" alt="">
            </figure>
        </div>
        <div class=" absolute top-0 w-full h-full bg-gradient-to-t from-black to-transparent from-[10%] to-[100%] z-20"></div>
        <div class=" absolute flex items-end justify-center lg:mb-20 mb-14  inset-0 z-30 ">
            <div class=" flex lg:flex-row lg:text-start text-center flex-col lg:gap-x-5 gap-y-5 items-center justify-center container">
                <h1 class=" text-white lg:text-H1 text-h1"> <?= esc($landing['title'] ?? 'La opción para planear tu graduación') ?>
                </h1>
                <div class=" bg-white w-full lg:w-[3px] h-[3px] lg:h-[180px] xl:h-[120px]"></div>
                <div class=" flex flex-col lg:max-w-[48rem]">
                    <h2 class=" lg:text-H2 text-h2 text-white">
                        <?= esc($landing['subtitle'] ?? 'Creamos tu evento a la medida, con servicios a tu gusto y colaboraciones con los mejores proveedores de la industria.') ?>

                    </h2>
                    <p class=" text-white lg:text-[22px] text-[18px] mt-5">Tú decides, nosotros lo hacemos realidad.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Above the fold end -->

    <section>
        <div class=" container">
            <div class=" flex items-center justify-center lg:py-[120px] py-[80px]">
                <figure>
                    <img class=" w-auto h-[240px] lg:h-[300px]" width="0" height="0" loading="lazy" src="<?= base_url('images/landing/logo_one.svg') ?>" alt="">
                </figure>
            </div>
        </div>
    </section>
    <section>
        <div class=" flex items-center justify-between lg:flex-row flex-col xl:gap-x-0 lg:gap-x-10 ">
            <div class=" flex flex-col lg:max-w-[24rem] xl:max-w-[28rem] 2xl:max-w-[32rem] lg:px-0 px-7 lg:ml-10 2xl:ml-48 xl:ml-36">
                <h3 class=" lg:text-[30px] text-[22px] font-semibold text-[#221f20]"> <?= esc($section_texts['title']) ?></h3>
                <div class=" w-full h-[3px] bg-[#221f20] mt-5"></div>
                <p class=" lg:text-P text-p text-[#221f20] font-normal mt-5"> <?= ($section_texts['paragraph_content']) ?></p>

            </div>
            <div class=" lg:mt-0 mt-5 relative">
                <div class=" absolute bottom-0 lg:-left-20">
                    <figure>
                        <img class=" w-auto h-[200px] lg:h-[300px] 2xl:h-[380px]" width="0" height="0" loading="lazy" src="<?= base_url('images/landing/icono.svg') ?>" alt="">
                    </figure>
                </div>
                <figure class=" required:">
                    <img class=" w-auto h-[500px] lg:[@media(max-height:768px)]:h-[35rem] lg:h-[800px] object-scale-down" width="0" height="0" loading="lazy" src="<?= base_url($section_texts['section_image']) ?>" alt="">
                </figure>
            </div>
        </div>
    </section>
    <section>
        <div class=" bg-black lg:py-[120px] py-[80px]">
            <div class=" container">
                <div class=" flex lg:flex-row lg:gap-x-10 lg:text-start text-center flex-col items-center justify-center">
                    <h3 class=" font-medium text-white lg:text-[50px] lg:max-w-[20rem] xl:max-w-[36rem]">
                        <?= esc($section_texts_two['title']) ?></h3>
                    <div class=" lg:h-[220px] w-full lg:mt-0 mt-5 h-[3px] lg:w-[3px] bg-white"></div>
                    <div class=" flex-col flex lg:items-start text-white items-center">
                        <p class=" lg:text-P text-p text-white lg:mt-10 mt-5"><?= ($section_texts_two['paragraph_content']) ?></p>
                        <a class=" open-modal-btn cursor-pointer lg:mt-10 mt-5 lg:text-xl bg-white rounded-[24px] font-normal transition-all ease-in duration-200 hover:text-white hover:bg-[#de5f0f] px-[20px] lg:px-10 py-[12px] text-lg text-black">
                            ¡Cotiza aquí!
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class=" overflow-hidden">
        <div class=" container lg:mt-20 mt-10 relative">
            <div class=" absolute z-10 -left-20 top-[100px] lg:block hidden">
                <figure>
                    <img class=" w-auto lg:h-[200px]" src="<?= base_url('images/landing/circulos.svg') ?>" alt="">
                </figure>
            </div>
            <div class=" absolute z-10 -right-20 top-[240px] lg:block hidden">
                <figure>
                    <img class=" w-auto lg:h-[200px]" src="<?= base_url('images/landing/circulos.svg') ?>" alt="">
                </figure>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 lg:[@media(max-height:768px)]:grid-cols-4 gap-6 2xl:grid-cols-4 relative z-20">
                <div class=" relative top-0 ">

                    <p class=" lg:text-[24px] text-xl ml-5 text-p text-[#221f20]">Producciones <br> memorables </p>
                    <figure class=" relative z-10 lg:mt-6 mt-5">
                        <img class=" w-full lg:h-[390px] object-cover rounded-[30px]" width="0" height="0" loading="lazy" src="<?= base_url('images/landing/image_1.webp') ?>" alt="Imagen 1">
                    </figure>
                    <div class=" z-20 relative w-full flex flex-col lg:text-start text-center lg:text-base text-sm text-[#221f20] items-center justify-start lg:pt-10 pt-10 lg:px-5 px-4 lg:[@media(max-height:768px)]:min-h-[350px] min-h-[300px] rounded-[24px] bg-[#f3f3f3] shadow-xl -mt-14">
                        <div class="w-0 h-0 border-l-[30px] absolute -top-10 z-20 left-1/2 transform -translate-x-1/2 border-r-[30px] border-b-[40px] border-l-transparent border-r-transparent border-b-[#f3f3f3]"></div>
                        <p>Creamos tu evento a la medida, con servicios a tu gusto y colaboraciones con los mejores proveedores de la industria.</p>
                        <p class="mt-10">Tú decides, nosotros lo hacemos realidad.</p>
                    </div>
                </div>
                <div class=" relative top-0 ">
                    <p class=" lg:text-[24px] text-xl ml-5 text-p text-[#221f20]">Website <br> personalizado</p>
                    <figure class=" relative z-10 lg:mt-6 mt-5">
                        <img class=" w-full lg:h-[390px] object-cover rounded-[30px]" width="0" height="0" loading="lazy" src="<?= base_url('images/landing/image_2.webp') ?>" alt="Imagen 1">
                    </figure>
                    <div class=" z-20 relative w-full flex flex-col lg:text-start text-center lg:text-base text-sm text-[#221f20] items-start justify-start lg:pt-10 pt-10 lg:px-5 px-4 lg:[@media(max-height:768px)]:min-h-[350px] min-h-[300px] rounded-[24px] bg-[#f3f3f3] shadow-xl -mt-14">
                        <div class="w-0 h-0 border-l-[30px] absolute -top-10 z-20 left-1/2 transform -translate-x-1/2 border-r-[30px] border-b-[40px] border-l-transparent border-r-transparent border-b-[#f3f3f3]"></div>
                        <p>La información más importante de tu evento al alcance de un clic. Diseñamos una invitación digital ligada a una web que incluye:</p>
                        <ul class=" mt-5">
                            <li class=" flex items-center  gap-x-2">
                                <span>📅</span>
                                <p>Detalles del evento</p>
                            </li>
                            <li class=" flex items-center  gap-x-2">
                                <span>⏳</span>
                                <p>Countdown e itinerario</p>
                            </li>
                            <li class=" flex items-center  gap-x-2">
                                <span>📍</span>
                                <p>Galerías de fotos</p>
                            </li>
                            <li class=" flex items-center  gap-x-2">
                                <span>🤝</span>
                                <p>Convenios exclusivos</p>
                            </li>
                            <li class=" flex items-center  gap-x-2">
                                <span>📲</span>
                                <p>Contacto directo</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class=" relative top-0 ">
                    <p class=" lg:text-[24px] text-xl ml-5 text-p text-[#221f20]">Layouts 3D</p>
                    <figure class=" relative z-10 lg:mt-14 mt-5">
                        <img class=" w-full lg:h-[390px] object-cover rounded-[30px]" width="0" height="0" loading="lazy" src="<?= base_url('images/landing/image_3.webp') ?>" alt="Imagen 1">
                    </figure>
                    <div class=" z-20 relative w-full flex flex-col lg:text-start text-center lg:text-base text-sm text-[#221f20] items-center justify-start lg:pt-10 pt-10 lg:px-5 px-4 lg:[@media(max-height:768px)]:min-h-[350px] min-h-[300px] rounded-[24px] bg-[#f3f3f3] shadow-xl -mt-14">
                        <div class="w-0 h-0 border-l-[30px] absolute -top-10 z-20 left-1/2 transform -translate-x-1/2 border-r-[30px] border-b-[40px] border-l-transparent border-r-transparent border-b-[#f3f3f3]"></div>

                        <p>Navega en un modelo a escala de tu evento, donde podrás visualizar la ubicación exacta de tus mesas. Así es como nos aseguramos que la distribución del espacio sea la ideal.</p>
                        <p class="mt-10">¡Así tu fiesta será increíble y sin sorpresas!</p>
                    </div>
                </div>
                <div class=" relative top-0 ">
                    <p class=" lg:text-[24px] text-xl ml-5 text-p text-[#221f20]">Menús <br> especiales </p>
                    <figure class=" relative z-10 lg:mt-6 mt-5">
                        <img class=" w-full lg:h-[390px] object-cover rounded-[30px]" width="0" height="0" loading="lazy" src="<?= base_url('images/landing/image_4.webp') ?>" alt="Imagen 1">
                    </figure>
                    <div class=" z-20 relative w-full flex flex-col lg:text-start text-center lg:text-base text-sm text-[#221f20] items-center justify-start lg:pt-10 pt-10 lg:px-5 px-4 lg:[@media(max-height:768px)]:min-h-[350px] min-h-[300px] rounded-[24px] bg-[#f3f3f3] shadow-xl -mt-14">
                        <div class="w-0 h-0 border-l-[30px] absolute -top-10 z-20 left-1/2 transform -translate-x-1/2 border-r-[30px] border-b-[40px] border-l-transparent border-r-transparent border-b-[#f3f3f3]"></div>
                        <p>Adaptamos nuestros menús para satisfacer las necesidades de tus invitados y nos aseguramos de que todos puedan disfrutar de la comida en tu evento:</p>
                        <ul class="-ml-14 mt-5">
                            <li class=" flex items-center  gap-x-2">
                                <span>🌱</span>
                                <p>Vegetarianos</p>
                            </li>
                            <li class=" flex items-center  gap-x-2">
                                <span>🌿</span>
                                <p>Veganos</p>
                            </li>
                            <li class=" flex items-center  gap-x-2">
                                <span>🍰</span>
                                <p>Postres sin azúcar</p>
                            </li>
                            <li class=" flex items-center  gap-x-2">
                                <span>🚫</span>
                                <p>Opciones para alérgicos</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class=" flex items-center justify-center">
                <a class=" open-modal-btn cursor-pointer lg:mt-10 mt-5 lg:text-xl bg-black rounded-[24px] font-normal transition-all ease-in duration-200 hover:text-white hover:bg-[#de5f0f] px-[20px] lg:px-10 py-[12px] text-lg text-white">
                    ¡Cotiza aquí!
                </a>
            </div>
        </div>
    </section>

    <section>
        <div class=" bg-black lg:py-20 py-10 lg:mt-20 mt-10">
            <div class=" container">
                <div class=" flex items-center text-white justify-center flex-col">
                    <figure>
                        <img class=" w-auto h-[30px] lg:h-[35px]" width="0" height="0" loading="lazy" src="<?= base_url('/images/landing/logo-icon.svg') ?>" alt="">
                    </figure>
                    <h3 class=" lg:text-[30px] text-[24px] lg:mt-10 mt-5 text-white font-semibold"><?= esc($section_text_three['title']) ?></h3>
                    <p class=" lg:text-P text-p text-white lg:mt-14 mt-10"><?= ($section_text_three['paragraph_content']) ?></p>
                    <a class=" open-modal-btn cursor-pointer lg:mt-20 mt-5 group lg:text-xl bg-white rounded-[24px] font-normal transition-all ease-in duration-200 hover:text-white hover:bg-[#de5f0f] px-[20px] lg:px-10 py-[12px] text-lg text-black">
                        ¡Cotiza aquí!
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class=" lg:mt-20 mt-10 lg:mb-20 mb-10">
        <div class=" container">
            <div class=" relative">
                <div class="siema relative z-10 overflow-hidden">

                    <?php foreach ($section_carrusel['carousel_images'] as $index => $image): ?>
                        <div class=" flex items-center justify-center relative">
                            <div class=" absolute w-full h-full bg-gradient-to-t opacity-40 from-black to-transparent from-[40%] to-[90%] z-20"></div>
                            <figure class=" w-full">
                                <img class=" w-full h-[450px] lg:h-[600px] object-cover" width="0" height="0" loading="lazy" src="<?= base_url($image) ?>" alt="<?= esc($image) ?>">
                            </figure>
                        </div>
                    <?php endforeach; ?>

                </div>
                <!-- Paginador -->
                <div id="pagination" class="flex absolute z-20  items-end mb-10 inset-0 justify-center mt-6 gap-3">

                </div>
            </div>
        </div>
    </section>





    <?= $this->include('landing/components/modal') ?>
    <?= $this->include('landing/layouts/footer') ?>

</main>
<?= $this->endSection() ?>