<?php
$company = setting()->get('App.general', 'company');
?>
<?= $this->extend('landing/templates/page') ?>

<!-- Secction Head HTML -->
<?= $this->section('head') ?>
<!-- MetaTags -->
<title><?= esc($landing['title']) ?> | <?= esc($company) ?></title>
<meta name="description" content="<?= esc($landing['title']) ?> | <?= esc($company) ?>">
<link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
<?= $this->endSection() ?>
<!-- EndSecction Head -->

<!-- Secction to use JavaScript -->
<?= $this->section('javascript') ?>
<!-- Siema JS -->
<script src="https://unpkg.com/siema@1.5.1/dist/siema.min.js"></script>
<script src="<?= base_url('js/landing/slider.js') ?>"></script>

<?= $this->endSection() ?>
<!-- EndSecction Javascripts-->

<!-- Section Body Html -->
<?= $this->section('content') ?>
<main>
    <?= $this->include('landing/layouts/navbar'); ?>

    <section class=" relative ">
        <div class=" relative z-10">
            <figure>
                <img class=" w-full bg-cover bg-no-repeat object-contain" width="0" height="0"
                    src="<?= base_url('images/landing/covers/1760499527_8dbe01b934c7dd535f20.webp') ?>" alt="<?= esc($landing['title']) ?>">
            </figure>
        </div>
        <div class=" absolute flex items-center justify-center lg:mb-20 mb-14  inset-0 z-30 ">
            <div class="flex pl-24 pt-24 lg:flex-row lg:text-start text-center flex-col lg:gap-x-5 gap-y-5 items-center justify-start container">
                <div class="w-[708px] inline-flex flex-col justify-start items-start gap-10">
                    <div class="self-stretch flex flex-col justify-start items-start gap-5">
                        <div class="self-stretch justify-start"><span class="text-red-500 text-4xl font-extrabold font-['Poppins'] uppercase leading-[47.60px]">Sistemas Integrales</span><span class="text-white text-4xl font-extrabold font-['Poppins'] uppercase leading-[47.60px]"> de Ventilación y Extracción de Aire</span></div>
                        <div class="self-stretch justify-start text-white text-3xl font-extrabold font-['Poppins'] uppercase leading-10">Eleva la productividad mejorando la calidad del aire en tu empresa</div>
                    </div>
                    <div data-state="Default" data-type="Complementary 1" class="px-5 py-2.5 bg-red-500 rounded-3xl inline-flex justify-center items-center gap-2.5">
                        <div class="text-center justify-start text-white text-xl font-medium font-['Poppins']">Cotiza Ahora</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 right-14 z-10">
            <figure>
                <img class="w-[160px] bg-cover bg-no-repeat object-scale-down" width="0" height="0"
                    src="<?= base_url('images/default/c_rculoss.webp') ?>" loading="lazy" alt="circulos decorativos">
            </figure>
        </div>
    </section>
    <section class="w-full container flex items-center justify-center">
        <div class="w-[500px] inline-flex flex-col justify-start items-start gap-10">
            <div class="self-stretch flex flex-col justify-start items-start gap-5">
                <div class="self-stretch justify-start">
                    <span class="text-red-500 text-3xl font-extrabold font-['Poppins'] uppercase leading-10">Los expertos</span>
                    <span class="text-sky-950 text-3xl font-extrabold font-['Poppins'] uppercase leading-10"> en ventilación, extracción y aire acondicionado </span>
                    <span class="text-red-500 text-3xl font-extrabold font-['Poppins'] uppercase leading-10">que necesitas</span>
                </div>
                <div class="self-stretch justify-start text-sky-950 text-2xl font-bold font-['Poppins'] leading-loose">
                    Nuestros servicios
                </div>
                <div class="inline-flex justify-start items-start gap-14 flex-wrap content-start">
                    <div class="w-36 inline-flex flex-col justify-start items-start gap-2.5">
                        <div class="self-stretch inline-flex justify-start items-center gap-5">
                            <div class="w-5 h-5 relative overflow-hidden">
                                <div class="w-5 h-3.5 left-[0.02px] top-[3.45px] absolute bg-red-500"></div>
                            </div>
                            <div class="justify-start text-teal-950 text-lg font-medium font-['Poppins'] leading-loose">
                                Fabricación
                            </div>
                        </div>
                        <div class="self-stretch inline-flex justify-start items-center gap-5">
                            <div class="w-5 h-5 relative overflow-hidden">
                                <div class="w-5 h-3.5 left-[0.02px] top-[3.45px] absolute bg-red-500"></div>
                            </div>
                            <div class="justify-start text-teal-950 text-lg font-medium font-['Poppins'] leading-loose">
                                Distribución
                            </div>
                        </div>
                        <div class="inline-flex justify-start items-center gap-5">
                            <div class="w-5 h-5 relative overflow-hidden">
                                <div class="w-5 h-3.5 left-[0.02px] top-[3.45px] absolute bg-red-500"></div>
                            </div>
                            <div class="justify-start text-teal-950 text-lg font-medium font-['Poppins'] leading-loose">
                                Venta</div>
                        </div>
                        <div class="inline-flex justify-start items-center gap-5">
                            <div class="w-5 h-5 relative overflow-hidden">
                                <div class="w-5 h-3.5 left-[0.02px] top-[3.45px] absolute bg-red-500"></div>
                            </div>
                            <div class="justify-start text-teal-950 text-lg font-medium font-['Poppins'] leading-loose">
                                Cálculo
                            </div>
                        </div>
                    </div>
                    <div class="w-72 inline-flex flex-col justify-start items-start gap-2.5">
                        <div class="inline-flex justify-start items-center gap-5">
                            <div class="w-5 h-5 relative overflow-hidden">
                                <div class="w-5 h-3.5 left-[0.02px] top-[3.45px] absolute bg-red-500"></div>
                            </div>
                            <div class="justify-start text-teal-950 text-lg font-medium font-['Poppins'] leading-loose">
                                Instalación de material
                            </div>
                        </div>
                        <div class="inline-flex justify-start items-center gap-5">
                            <div class="w-5 h-5 relative overflow-hidden">
                                <div class="w-5 h-3.5 left-[0.02px] top-[3.45px] absolute bg-red-500"></div>
                            </div>
                            <div class="justify-start text-teal-950 text-lg font-medium font-['Poppins'] leading-loose">
                                Mantenimiento
                            </div>
                        </div>
                        <div class="self-stretch inline-flex justify-start items-center gap-5">
                            <div class="w-5 h-5 relative overflow-hidden">
                                <div class="w-5 h-3.5 left-[0.02px] top-[3.45px] absolute bg-red-500"></div>
                            </div>
                            <div
                                class="flex-1 justify-start text-teal-950 text-lg font-medium font-['Poppins'] leading-loose">
                                Conservación de equipos en general
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div data-state="Default" data-type="Secondary 1" class="px-5 py-2.5 rounded-3xl outline outline-2 outline-offset-[-2px] outline-red-500 inline-flex justify-center items-center gap-2.5">
                <div class="text-center justify-start text-red-500 text-xl font-medium font-['Poppins']">
                    Habla con un experto
                </div>
            </div>
        </div>
        <div class="inline-flex justify-start items-center gap-5">
            <div class="w-72 inline-flex flex-col justify-start items-start gap-5">
                <div class="self-stretch h-56 p-2.5 bg-white rounded-[40px] shadow-[0px_0px_40px_0px_rgba(9,59,87,0.10)] flex flex-col justify-start items-start gap-2.5">
                    <img class="self-stretch flex-1 rounded-[32px]" src="https://placehold.co/272x212" loading="lazy" alt="Placeholder image" />
                </div>
                <div class="self-stretch h-56 p-2.5 bg-white rounded-[40px] shadow-[0px_0px_40px_0px_rgba(9,59,87,0.10)] flex flex-col justify-start items-start gap-2.5">
                    <img class="self-stretch flex-1 rounded-[32px]" src="https://placehold.co/272x212" loading="lazy" alt="Placeholder image" />
                </div>
                <div class="self-stretch h-56 p-2.5 bg-white rounded-[40px] shadow-[0px_0px_40px_0px_rgba(9,59,87,0.10)] flex flex-col justify-start items-start gap-2.5">
                    <img class="self-stretch flex-1 rounded-[32px]" src="https://placehold.co/272x212" loading="lazy" alt="Placeholder image" />
                </div>
            </div>
            <div class="w-72 inline-flex flex-col justify-start items-start gap-5">
                <div class="self-stretch h-56 p-2.5 bg-white rounded-[40px] shadow-[0px_0px_40px_0px_rgba(9,59,87,0.10)] flex flex-col justify-start items-start gap-2.5">
                    <img class="self-stretch flex-1 rounded-[32px]" src="https://placehold.co/272x212" loading="lazy" alt="Placeholder image" />
                </div>
                <div class="self-stretch h-56 p-2.5 bg-white rounded-[40px] shadow-[0px_0px_40px_0px_rgba(9,59,87,0.10)] flex flex-col justify-start items-start gap-2.5">
                    <img class="self-stretch flex-1 rounded-[32px]" src="https://placehold.co/272x212" loading="lazy" alt="Placeholder image" />
                </div>
            </div>
        </div>
    </section>
    <section class="relative">
        <div>
            <div class="relative w-full flex flex-row gap-3 py-20 justify-center z-20">
                <div class="w-56 h-44 relative">
                    <div class="w-56 h-44 left-0 top-0 absolute bg-white rounded-[40px] shadow-[0px_0px_40px_0px_rgba(9,59,87,0.10)]"></div>
                    <div class="w-52 h-40 left-[10px] top-[10px] absolute bg-sky-950 rounded-[34px]"></div>
                    <div class="w-44 left-[30px] top-[102px] absolute text-center justify-start"><span class="text-white text-lg font-medium font-['Poppins'] leading-snug">Ayudando a más de </span><span class="text-rose-500 text-lg font-extrabold font-['Poppins'] leading-snug">150 empresas</span></div>
                    <img class="w-20 h-20 left-[75px] top-[10px] absolute" src="<?= base_url('images/landing/elements/Edificios.svg') ?>" alt="Edificios" />
                </div>
                <div class="w-56 h-44 relative">
                    <div class="w-56 h-44 left-0 top-0 absolute bg-white rounded-[40px] shadow-[0px_0px_40px_0px_rgba(9,59,87,0.10)]"></div>
                    <div class="w-52 h-40 left-[10px] top-[10px] absolute bg-sky-950 rounded-[34px]"></div>
                    <div class="w-44 left-[30px] top-[102px] absolute text-center justify-start"><span class="text-rose-500 text-lg font-black font-['Poppins'] leading-snug">+ 30 años</span><span class="text-white text-lg font-medium font-['Poppins'] leading-snug"> de experiencia</span></div>
                    <img class="w-20 h-20 left-[73px] top-[10px] absolute" src="<?= base_url('images/landing/elements/Garantia_021.svg') ?>" alt="Garantia" />
                </div>
                <div class="w-56 h-44 relative">
                    <div class="w-56 h-44 left-0 top-0 absolute bg-white rounded-[40px] shadow-[0px_0px_40px_0px_rgba(9,59,87,0.10)]"></div>
                    <div class="w-52 h-40 left-[10px] top-[10px] absolute bg-sky-950 rounded-[34px]"></div>
                    <div class="w-44 left-[30px] top-[102px] absolute text-center justify-start"><span class="text-rose-500 text-lg font-black font-['Poppins'] leading-snug">Calidad </span><span class="text-white text-lg font-medium font-['Poppins'] leading-snug">Garantizada</span></div>
                    <img class="w-20 h-20 left-[70px] top-[10px] absolute" src="<?= base_url('images/landing/elements/Garantia1.svg') ?>" alt="Garantia" />
                </div>
                <div class="w-56 h-44 relative">
                    <div class="w-56 h-44 left-0 top-0 absolute bg-white rounded-[40px] shadow-[0px_0px_40px_0px_rgba(9,59,87,0.10)]"></div>
                    <div class="w-52 h-40 left-[10px] top-[10px] absolute bg-sky-950 rounded-[34px]"></div>
                    <div class="w-44 left-[30px] top-[102px] absolute text-center justify-start"><span class="text-rose-500 text-lg font-black font-['Poppins'] leading-snug">Tecnología</span><span class="text-white text-lg font-medium font-['Poppins'] leading-snug"> de vanguardia</span></div>
                    <img class="w-20 h-20 left-[75px] top-[10px] absolute" src="<?= base_url('images/landing/elements/Aire-Acondicionado.svg') ?>" alt="Aire Acondicionado" />
                </div>
                <div class="w-56 h-44 relative">
                    <div class="w-56 h-44 left-0 top-0 absolute bg-white rounded-[40px] shadow-[0px_0px_40px_0px_rgba(9,59,87,0.10)]"></div>
                    <div class="w-52 h-40 left-[10px] top-[10px] absolute bg-sky-950 rounded-[34px]"></div>
                    <div class="w-44 left-[30px] top-[102px] absolute text-center justify-start text-white text-lg font-medium font-['Poppins'] leading-snug">Sistemas eficientes</div>
                    <img class="w-20 h-20 left-[75px] top-[10px] absolute" src="<?= base_url('images/landing/elements/Aire-Acondicionado_021.svg') ?>" alt="Aire-Acondicionado" />
                </div>
            </div>
            <div class="absolute top-32 left-14 z-10">
                <figure>
                    <img class="w-[160px] bg-cover bg-no-repeat object-scale-down" width="0" height="0"
                        src="<?= base_url('images/default/c_rculos.webp') ?>" loading="lazy" alt="circulos decorativos">
                </figure>
            </div>
        </div>
    </section>
    <section class="bg-[#093B57] py-24 relative">
        <div class="self-stretch text-center justify-start text-white text-3xl font-extrabold font-['Poppins'] uppercase leading-10">¿Por qué elegirnos para la ventilación de tu empresa?</div>
        <div class="py-24 grid grid-cols-2 container gap-4 justify-center items-center">
            <div class="w-[500px] h-[724px] p-2.5 bg-white rounded-[40px] shadow-[0px_0px_40px_0px_rgba(9,59,87,0.10)] inline-flex flex-col justify-start items-start gap-2.5">
                <img class="self-stretch flex-1 rounded-[32px]" src="<?= base_url('images/default/hombres-construccion.webp') ?>" />
            </div>
            <div class="w-[604px] inline-flex flex-col justify-start items-start gap-5">
                <div class="self-stretch flex flex-col justify-start items-start gap-4">
                    <div class="self-stretch justify-start text-white text-2xl font-bold font-['Poppins'] leading-loose">Atención personalizada</div>
                    <div class="self-stretch justify-start text-slate-50 text-lg font-medium font-['Poppins'] leading-loose">Le damos seguimiento ajustándonos a tu proyecto con atención personalizada.</div>
                </div>
                <div class="w-20 h-1 bg-rose-500 rounded"></div>
                <div class="self-stretch flex flex-col justify-start items-start gap-4">
                    <div class="self-stretch justify-start text-white text-2xl font-bold font-['Poppins'] leading-loose">Cumplimiento Normativo</div>
                    <div class="self-stretch justify-start text-slate-50 text-lg font-medium font-['Poppins'] leading-loose">Cumplimos con todas las normativas locales e internacionales en relación a la calidad del aire, salud y seguridad.</div>
                </div>
                <div class="w-20 h-1 bg-rose-500 rounded"></div>
                <div class="self-stretch flex flex-col justify-start items-start gap-4">
                    <div class="self-stretch justify-start text-white text-2xl font-bold font-['Poppins'] leading-loose">Proyectos personalizados</div>
                    <div class="self-stretch justify-start text-slate-50 text-lg font-medium font-['Poppins'] leading-loose">Ajustamos el proyecto a la medida cumpliendo tus principales necesidades.</div>
                </div>
                <div class="w-20 h-1 bg-rose-500 rounded"></div>
                <div class="self-stretch flex flex-col justify-start items-start gap-4">
                    <div class="self-stretch justify-start text-white text-2xl font-bold font-['Poppins'] leading-loose">Servicio Integral</div>
                    <div class="self-stretch justify-start text-slate-50 text-lg font-medium font-['Poppins'] leading-loose">Cubrimos todas las necesidades del cliente desde la instalación y mantenimiento a largo plazo.</div>
                </div>
                <div data-state="Default" data-type="Complementary 3" class="px-5 py-2.5 bg-white rounded-3xl inline-flex justify-center items-center gap-2.5">
                    <div class="text-center justify-start text-red-500 text-xl font-medium font-['Poppins']">Contáctanos</div>
                </div>
            </div>
        </div>
        <div class="absolute -bottom-24 right-14 z-10">
            <figure>
                <img class="w-[160px] bg-cover bg-no-repeat object-scale-down" width="0" height="0"
                    src="<?= base_url('images/default/c_rculos.webp') ?>" loading="lazy" alt="circulos decorativos">
            </figure>
        </div>
    </section>
</main>
<?= $this->endSection() ?>