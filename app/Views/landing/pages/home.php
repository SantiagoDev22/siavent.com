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
        <div class=" absolute lg:bottom-0 bottom-10 right-6 lg:right-10 z-30">
            <figure>
                <img class=" w-auto lg:h-[370px] h-[220px]" src="<?= base_url('images/landing/home/puntos.svg') ?>" alt="">
            </figure>
        </div>
        <div class=" relative z-10">
            <figure>
                <img class=" w-full lg:h-[925px] h-[825px] bg-cover bg-no-repeat object-cover" width="0" height="0" src="<?= base_url('images/landing/covers/1760499527_8dbe01b934c7dd535f20.webp') ?>" alt="<?= esc($landing['title']) ?>">
            </figure>
        </div>
        <div class=" absolute flex items-start container z-20 flex-col justify-center inset-0">
            <h1 class=" uppercase text-white lg:text-[34px] leading-[140%]  text-[28px] font-poppins font-extrabold"><span class=" text-[#E73636]">Sistemas Integrales</span> de Ventilación y <br class="lg:block hidden"> Extracción de Aire</h1>
            <h2 class=" uppercase text-white lg:text-[28px] leading-[140%]  text-[24px] font-poppins font-extrabold mt-5">Eleva la productividad mejorando la <br class=" lg:block hidden"> calidad del aire en tu empresa</h2>
            <a href="#form" class=" px-[20px] py-[10px] mt-10 rounded-[25px] bg-[#E73636] hover:bg-[#032039] text-white font-poppins text-xl font-medium">Cotiza Ahora</a>


        </div>

    </section>

    <section class=" relative">
        <div class=" absolute bottom-0 right-0 z-0">
            <figure>
                <img class=" w-full bg-cover object-cover h-[825px]" width="0" height="0" loading="lazy" src="<?= base_url('images/landing/home/fondo.webp') ?>" alt="">
            </figure>
        </div>
        <div class=" container relative z-20">
            <div class=" flex items-center justify-between lg:flex-row flex-col lg:gap-x-[124px] ">
                <div class=" lg:flex-1 flex flex-col lg:items-start  items-start">
                    <h2 class="uppercase text-[#093B57] lg:text-[28px] leading-[140%]  text-[24px] font-poppins font-extrabold"><span class=" text-[#E73636]">Los expertos</span> en ventilación, <br class=" lg:block hidden"> extracción y aire <br class=" lg:block hidden"> acondicionado <span class=" text-[#E73636]">que necesitas</span></h2>
                    <h3 class=" text-[#093B57] lg:text-[24px] text-xl leading-[140%]  font-bold mt-5">Nuestros servicios</h3>
                    <ul class=" grid lg:grid-cols-2 grid-cols-1 gap-y-4 mt-5">
                        <li class=" flex items-center gap-x-5">
                            <figure>
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_2009_952)">
                                        <path d="M18.599 4.19251L7.08321 15.7075C7.00579 15.7852 6.91378 15.8469 6.81246 15.889C6.71114 15.9311 6.60251 15.9527 6.4928 15.9527C6.38309 15.9527 6.27445 15.9311 6.17313 15.889C6.07182 15.8469 5.9798 15.7852 5.90238 15.7075L1.44905 11.25C1.37162 11.1723 1.27961 11.1106 1.17829 11.0685C1.07697 11.0264 0.968341 11.0048 0.85863 11.0048C0.748918 11.0048 0.640287 11.0264 0.538968 11.0685C0.437649 11.1106 0.345638 11.1723 0.268213 11.25C0.190483 11.3274 0.128805 11.4194 0.0867207 11.5208C0.044636 11.6221 0.0229721 11.7307 0.0229721 11.8404C0.0229721 11.9501 0.044636 12.0588 0.0867207 12.1601C0.128805 12.2614 0.190483 12.3534 0.268213 12.4308L4.72321 16.885C5.19317 17.3541 5.83004 17.6175 6.49405 17.6175C7.15805 17.6175 7.79492 17.3541 8.26488 16.885L19.7799 5.37251C19.8575 5.2951 19.9191 5.20314 19.9611 5.1019C20.0031 5.00065 20.0247 4.89212 20.0247 4.78251C20.0247 4.67289 20.0031 4.56436 19.9611 4.46312C19.9191 4.36188 19.8575 4.26992 19.7799 4.19251C19.7025 4.11478 19.6104 4.0531 19.5091 4.01101C19.4078 3.96893 19.2992 3.94727 19.1895 3.94727C19.0798 3.94727 18.9711 3.96893 18.8698 4.01101C18.7685 4.0531 18.6765 4.11478 18.599 4.19251Z" fill="#E73636" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_2009_952">
                                            <rect width="20" height="20" fill="white" transform="translate(0 0.5)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </figure>
                            <p class=" text-[#032039] lg:text-lg text-base leading-[180%] font-poppins font-medium">Fabricación</p>
                        </li>
                        <li class=" flex items-center gap-x-5">
                            <figure>
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_2009_952)">
                                        <path d="M18.599 4.19251L7.08321 15.7075C7.00579 15.7852 6.91378 15.8469 6.81246 15.889C6.71114 15.9311 6.60251 15.9527 6.4928 15.9527C6.38309 15.9527 6.27445 15.9311 6.17313 15.889C6.07182 15.8469 5.9798 15.7852 5.90238 15.7075L1.44905 11.25C1.37162 11.1723 1.27961 11.1106 1.17829 11.0685C1.07697 11.0264 0.968341 11.0048 0.85863 11.0048C0.748918 11.0048 0.640287 11.0264 0.538968 11.0685C0.437649 11.1106 0.345638 11.1723 0.268213 11.25C0.190483 11.3274 0.128805 11.4194 0.0867207 11.5208C0.044636 11.6221 0.0229721 11.7307 0.0229721 11.8404C0.0229721 11.9501 0.044636 12.0588 0.0867207 12.1601C0.128805 12.2614 0.190483 12.3534 0.268213 12.4308L4.72321 16.885C5.19317 17.3541 5.83004 17.6175 6.49405 17.6175C7.15805 17.6175 7.79492 17.3541 8.26488 16.885L19.7799 5.37251C19.8575 5.2951 19.9191 5.20314 19.9611 5.1019C20.0031 5.00065 20.0247 4.89212 20.0247 4.78251C20.0247 4.67289 20.0031 4.56436 19.9611 4.46312C19.9191 4.36188 19.8575 4.26992 19.7799 4.19251C19.7025 4.11478 19.6104 4.0531 19.5091 4.01101C19.4078 3.96893 19.2992 3.94727 19.1895 3.94727C19.0798 3.94727 18.9711 3.96893 18.8698 4.01101C18.7685 4.0531 18.6765 4.11478 18.599 4.19251Z" fill="#E73636" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_2009_952">
                                            <rect width="20" height="20" fill="white" transform="translate(0 0.5)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </figure>
                            <p class=" text-[#032039] lg:text-lg text-base leading-[180%] font-poppins font-medium">Instalación de material</p>
                        </li>
                        <li class=" flex items-center gap-x-5">
                            <figure>
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_2009_952)">
                                        <path d="M18.599 4.19251L7.08321 15.7075C7.00579 15.7852 6.91378 15.8469 6.81246 15.889C6.71114 15.9311 6.60251 15.9527 6.4928 15.9527C6.38309 15.9527 6.27445 15.9311 6.17313 15.889C6.07182 15.8469 5.9798 15.7852 5.90238 15.7075L1.44905 11.25C1.37162 11.1723 1.27961 11.1106 1.17829 11.0685C1.07697 11.0264 0.968341 11.0048 0.85863 11.0048C0.748918 11.0048 0.640287 11.0264 0.538968 11.0685C0.437649 11.1106 0.345638 11.1723 0.268213 11.25C0.190483 11.3274 0.128805 11.4194 0.0867207 11.5208C0.044636 11.6221 0.0229721 11.7307 0.0229721 11.8404C0.0229721 11.9501 0.044636 12.0588 0.0867207 12.1601C0.128805 12.2614 0.190483 12.3534 0.268213 12.4308L4.72321 16.885C5.19317 17.3541 5.83004 17.6175 6.49405 17.6175C7.15805 17.6175 7.79492 17.3541 8.26488 16.885L19.7799 5.37251C19.8575 5.2951 19.9191 5.20314 19.9611 5.1019C20.0031 5.00065 20.0247 4.89212 20.0247 4.78251C20.0247 4.67289 20.0031 4.56436 19.9611 4.46312C19.9191 4.36188 19.8575 4.26992 19.7799 4.19251C19.7025 4.11478 19.6104 4.0531 19.5091 4.01101C19.4078 3.96893 19.2992 3.94727 19.1895 3.94727C19.0798 3.94727 18.9711 3.96893 18.8698 4.01101C18.7685 4.0531 18.6765 4.11478 18.599 4.19251Z" fill="#E73636" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_2009_952">
                                            <rect width="20" height="20" fill="white" transform="translate(0 0.5)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </figure>
                            <p class=" text-[#032039] lg:text-lg text-base leading-[180%] font-poppins font-medium">Distribución</p>
                        </li>
                        <li class=" flex items-center gap-x-5">
                            <figure>
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_2009_952)">
                                        <path d="M18.599 4.19251L7.08321 15.7075C7.00579 15.7852 6.91378 15.8469 6.81246 15.889C6.71114 15.9311 6.60251 15.9527 6.4928 15.9527C6.38309 15.9527 6.27445 15.9311 6.17313 15.889C6.07182 15.8469 5.9798 15.7852 5.90238 15.7075L1.44905 11.25C1.37162 11.1723 1.27961 11.1106 1.17829 11.0685C1.07697 11.0264 0.968341 11.0048 0.85863 11.0048C0.748918 11.0048 0.640287 11.0264 0.538968 11.0685C0.437649 11.1106 0.345638 11.1723 0.268213 11.25C0.190483 11.3274 0.128805 11.4194 0.0867207 11.5208C0.044636 11.6221 0.0229721 11.7307 0.0229721 11.8404C0.0229721 11.9501 0.044636 12.0588 0.0867207 12.1601C0.128805 12.2614 0.190483 12.3534 0.268213 12.4308L4.72321 16.885C5.19317 17.3541 5.83004 17.6175 6.49405 17.6175C7.15805 17.6175 7.79492 17.3541 8.26488 16.885L19.7799 5.37251C19.8575 5.2951 19.9191 5.20314 19.9611 5.1019C20.0031 5.00065 20.0247 4.89212 20.0247 4.78251C20.0247 4.67289 20.0031 4.56436 19.9611 4.46312C19.9191 4.36188 19.8575 4.26992 19.7799 4.19251C19.7025 4.11478 19.6104 4.0531 19.5091 4.01101C19.4078 3.96893 19.2992 3.94727 19.1895 3.94727C19.0798 3.94727 18.9711 3.96893 18.8698 4.01101C18.7685 4.0531 18.6765 4.11478 18.599 4.19251Z" fill="#E73636" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_2009_952">
                                            <rect width="20" height="20" fill="white" transform="translate(0 0.5)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </figure>
                            <p class=" text-[#032039] lg:text-lg text-base leading-[180%] font-poppins font-medium">Mantenimiento</p>
                        </li>
                        <li class=" flex items-center gap-x-5">
                            <figure>
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_2009_952)">
                                        <path d="M18.599 4.19251L7.08321 15.7075C7.00579 15.7852 6.91378 15.8469 6.81246 15.889C6.71114 15.9311 6.60251 15.9527 6.4928 15.9527C6.38309 15.9527 6.27445 15.9311 6.17313 15.889C6.07182 15.8469 5.9798 15.7852 5.90238 15.7075L1.44905 11.25C1.37162 11.1723 1.27961 11.1106 1.17829 11.0685C1.07697 11.0264 0.968341 11.0048 0.85863 11.0048C0.748918 11.0048 0.640287 11.0264 0.538968 11.0685C0.437649 11.1106 0.345638 11.1723 0.268213 11.25C0.190483 11.3274 0.128805 11.4194 0.0867207 11.5208C0.044636 11.6221 0.0229721 11.7307 0.0229721 11.8404C0.0229721 11.9501 0.044636 12.0588 0.0867207 12.1601C0.128805 12.2614 0.190483 12.3534 0.268213 12.4308L4.72321 16.885C5.19317 17.3541 5.83004 17.6175 6.49405 17.6175C7.15805 17.6175 7.79492 17.3541 8.26488 16.885L19.7799 5.37251C19.8575 5.2951 19.9191 5.20314 19.9611 5.1019C20.0031 5.00065 20.0247 4.89212 20.0247 4.78251C20.0247 4.67289 20.0031 4.56436 19.9611 4.46312C19.9191 4.36188 19.8575 4.26992 19.7799 4.19251C19.7025 4.11478 19.6104 4.0531 19.5091 4.01101C19.4078 3.96893 19.2992 3.94727 19.1895 3.94727C19.0798 3.94727 18.9711 3.96893 18.8698 4.01101C18.7685 4.0531 18.6765 4.11478 18.599 4.19251Z" fill="#E73636" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_2009_952">
                                            <rect width="20" height="20" fill="white" transform="translate(0 0.5)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </figure>
                            <p class=" text-[#032039] lg:text-lg text-base leading-[180%] font-poppins font-medium">Venta</p>
                        </li>
                        <li class=" flex items-center gap-x-5">
                            <figure>
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_2009_952)">
                                        <path d="M18.599 4.19251L7.08321 15.7075C7.00579 15.7852 6.91378 15.8469 6.81246 15.889C6.71114 15.9311 6.60251 15.9527 6.4928 15.9527C6.38309 15.9527 6.27445 15.9311 6.17313 15.889C6.07182 15.8469 5.9798 15.7852 5.90238 15.7075L1.44905 11.25C1.37162 11.1723 1.27961 11.1106 1.17829 11.0685C1.07697 11.0264 0.968341 11.0048 0.85863 11.0048C0.748918 11.0048 0.640287 11.0264 0.538968 11.0685C0.437649 11.1106 0.345638 11.1723 0.268213 11.25C0.190483 11.3274 0.128805 11.4194 0.0867207 11.5208C0.044636 11.6221 0.0229721 11.7307 0.0229721 11.8404C0.0229721 11.9501 0.044636 12.0588 0.0867207 12.1601C0.128805 12.2614 0.190483 12.3534 0.268213 12.4308L4.72321 16.885C5.19317 17.3541 5.83004 17.6175 6.49405 17.6175C7.15805 17.6175 7.79492 17.3541 8.26488 16.885L19.7799 5.37251C19.8575 5.2951 19.9191 5.20314 19.9611 5.1019C20.0031 5.00065 20.0247 4.89212 20.0247 4.78251C20.0247 4.67289 20.0031 4.56436 19.9611 4.46312C19.9191 4.36188 19.8575 4.26992 19.7799 4.19251C19.7025 4.11478 19.6104 4.0531 19.5091 4.01101C19.4078 3.96893 19.2992 3.94727 19.1895 3.94727C19.0798 3.94727 18.9711 3.96893 18.8698 4.01101C18.7685 4.0531 18.6765 4.11478 18.599 4.19251Z" fill="#E73636" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_2009_952">
                                            <rect width="20" height="20" fill="white" transform="translate(0 0.5)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </figure>
                            <p class=" text-[#032039] lg:text-lg text-base leading-[180%] font-poppins font-medium">Conservación de equipos en general</p>
                        </li>
                        <li class=" flex items-center gap-x-5">
                            <figure>
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_2009_952)">
                                        <path d="M18.599 4.19251L7.08321 15.7075C7.00579 15.7852 6.91378 15.8469 6.81246 15.889C6.71114 15.9311 6.60251 15.9527 6.4928 15.9527C6.38309 15.9527 6.27445 15.9311 6.17313 15.889C6.07182 15.8469 5.9798 15.7852 5.90238 15.7075L1.44905 11.25C1.37162 11.1723 1.27961 11.1106 1.17829 11.0685C1.07697 11.0264 0.968341 11.0048 0.85863 11.0048C0.748918 11.0048 0.640287 11.0264 0.538968 11.0685C0.437649 11.1106 0.345638 11.1723 0.268213 11.25C0.190483 11.3274 0.128805 11.4194 0.0867207 11.5208C0.044636 11.6221 0.0229721 11.7307 0.0229721 11.8404C0.0229721 11.9501 0.044636 12.0588 0.0867207 12.1601C0.128805 12.2614 0.190483 12.3534 0.268213 12.4308L4.72321 16.885C5.19317 17.3541 5.83004 17.6175 6.49405 17.6175C7.15805 17.6175 7.79492 17.3541 8.26488 16.885L19.7799 5.37251C19.8575 5.2951 19.9191 5.20314 19.9611 5.1019C20.0031 5.00065 20.0247 4.89212 20.0247 4.78251C20.0247 4.67289 20.0031 4.56436 19.9611 4.46312C19.9191 4.36188 19.8575 4.26992 19.7799 4.19251C19.7025 4.11478 19.6104 4.0531 19.5091 4.01101C19.4078 3.96893 19.2992 3.94727 19.1895 3.94727C19.0798 3.94727 18.9711 3.96893 18.8698 4.01101C18.7685 4.0531 18.6765 4.11478 18.599 4.19251Z" fill="#E73636" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_2009_952">
                                            <rect width="20" height="20" fill="white" transform="translate(0 0.5)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </figure>
                            <p class=" text-[#032039] lg:text-lg text-base leading-[180%] font-poppins font-medium">Cálculo</p>
                        </li>
                    </ul>
                    <a href="#form" class=" px-[20px] rounded-[25px] mt-10 border-[#E73636] bg-transparent hover:bg-[#E73636] hover:text-white text-[#E73636] font-medium text-xl font-poppins border-[2px] hover:border-transparent py-[10px]">Habla con un experto</a>
                </div>
                <div class="w-full lg:flex-1">

                    <!-- GRID (visible en lg+) -->
                    <div class="hidden lg:grid grid-cols-2 gap-x-5">
                        <div class="flex lg:flex-col flex-row gap-y-5 items-center justify-center">
                            <div class="shadow-md rounded-[40px]">
                                <figure class="border-white border-[10px] rounded-[32px]">
                                    <img class="w-auto lg:w-auto lg:h-[232px] bg-cover object-cover rounded-[32px]" loading="lazy" src="<?= base_url('images/landing/home/image-1.webp') ?>" alt="">
                                </figure>
                            </div>
                            <div class="shadow-md rounded-[40px]">
                                <figure class="border-white border-[10px] rounded-[32px]">
                                    <img class="w-auto lg:w-auto lg:h-[232px] bg-cover object-cover rounded-[32px]" loading="lazy" src="<?= base_url('images/landing/home/image-2.webp') ?>" alt="">
                                </figure>
                            </div>
                            <div class="shadow-md rounded-[40px]">
                                <figure class="border-white border-[10px] rounded-[32px]">
                                    <img class="w-auto lg:w-auto lg:h-[232px]" loading="lazy" src="<?= base_url('images/landing/home/image-3.webp') ?>" alt="">
                                </figure>
                            </div>
                        </div>

                        <div class="flex lg:flex-col flex-row items-center gap-y-5 justify-center">
                            <div class="shadow-md rounded-[40px]">
                                <figure class="border-white border-[10px] rounded-[32px]">
                                    <img class="w-auto lg:w-auto lg:h-[232px] bg-cover object-cover rounded-[32px]" loading="lazy" src="<?= base_url('images/landing/home/image-4.webp') ?>" alt="">
                                </figure>
                            </div>
                            <div class="shadow-md rounded-[40px]">
                                <figure class="border-white border-[10px] rounded-[32px]">
                                    <img class="w-auto lg:w-auto lg:h-[232px] bg-cover object-cover rounded-[32px]" loading="lazy" src="<?= base_url('images/landing/home/image-5.webp') ?>" alt="">
                                </figure>
                            </div>
                        </div>
                    </div>

                    <!-- SLIDER HORIZONTAL LIBRE (visible en <lg) -->
                    <div id="carouselAuto" class="lg:hidden overflow-x-auto py-4 scroll-hidden">
                        <div class="flex gap-4 px-4">
                            <div class="flex-shrink-0 w-[250px] shadow-md rounded-[32px]">
                                <figure class="border-white border-[10px] rounded-[32px] overflow-hidden">
                                    <img class="w-full h-[280px] object-cover rounded-[32px]" loading="lazy" src="<?= base_url('images/landing/home/image-1.webp') ?>" alt="">
                                </figure>
                            </div>
                            <div class="flex-shrink-0 w-[250px] shadow-md rounded-[32px]">
                                <figure class="border-white border-[10px] rounded-[32px] overflow-hidden">
                                    <img class="w-full h-[280px] object-cover rounded-[32px]" loading="lazy" src="<?= base_url('images/landing/home/image-2.webp') ?>" alt="">
                                </figure>
                            </div>
                            <div class="flex-shrink-0 w-[250px] shadow-md rounded-[32px]">
                                <figure class="border-white border-[10px] rounded-[32px] overflow-hidden">
                                    <img class="w-full h-[280px] object-cover rounded-[32px]" loading="lazy" src="<?= base_url('images/landing/home/image-3.webp') ?>" alt="">
                                </figure>
                            </div>
                            <div class="flex-shrink-0 w-[250px] shadow-md rounded-[32px]">
                                <figure class="border-white border-[10px] rounded-[32px] overflow-hidden">
                                    <img class="w-full h-[280px] object-cover rounded-[32px]" loading="lazy" src="<?= base_url('images/landing/home/image-4.webp') ?>" alt="">
                                </figure>
                            </div>
                            <div class="flex-shrink-0 w-[250px] shadow-md rounded-[32px]">
                                <figure class="border-white border-[10px] rounded-[32px] overflow-hidden">
                                    <img class="w-full h-[280px] object-cover rounded-[32px]" loading="lazy" src="<?= base_url('images/landing/home/image-5.webp') ?>" alt="">
                                </figure>
                            </div>
                        </div>
                    </div>

                    <script>
                        const carouselAuto = document.getElementById('carouselAuto');
                        const scrollAmount = 250 + 16; // ancho tarjeta + gap (px)
                        let scrollPosition = 0;

                        setInterval(() => {
                            // Si llegamos al final, reiniciamos
                            if (scrollPosition >= carouselAuto.scrollWidth - carouselAuto.clientWidth) {
                                scrollPosition = 0;
                            } else {
                                scrollPosition += scrollAmount;
                            }
                            carouselAuto.scrollTo({
                                left: scrollPosition,
                                behavior: 'smooth'
                            });
                        }, 2000);
                    </script>


                </div>

                <!-- CSS para ocultar scrollbar -->
                <style>
                    .scroll-hidden::-webkit-scrollbar {
                        display: none;
                    }

                    .scroll-hidden {
                        -ms-overflow-style: none;
                        /* IE y Edge */
                        scrollbar-width: none;
                        /* Firefox */
                    }
                </style>

            </div>

            <div class=" grid xl:grid-col-5 lg:grid-cols-5 grid-cols-2 lg:mt-[125px] mt-[50px] gap-y-3 gap-x-3 lg:pb-[115px] pb-[75px]">
                <div class=" shadow-md rounded-[20px] lg:rounded-[40px] border-white border-[10px]">
                    <figure>
                        <img class=" h-[146px] bg-[#093B57] rounded-[20px] lg:rounded-[40px] w-full lg:h-[176px]" width="0" height="0" loading="lazy" src="<?= base_url('images/landing/home/box-1.svg') ?>" alt="">
                    </figure>
                </div>
                <div class=" shadow-md rounded-[20px] lg:rounded-[40px] border-white border-[10px]">
                    <figure>
                        <img class=" h-[146px] bg-[#093B57] rounded-[20px] lg:rounded-[40px] w-full lg:h-[176px]" width="0" height="0" loading="lazy" src="<?= base_url('images/landing/home/box-2.svg') ?>" alt="">
                    </figure>
                </div>
                <div class=" shadow-md rounded-[20px] lg:rounded-[40px] border-white border-[10px]">
                    <figure>
                        <img class=" h-[146px] bg-[#093B57] rounded-[20px] lg:rounded-[40px] w-full lg:h-[176px]" width="0" height="0" loading="lazy" src="<?= base_url('images/landing/home/box-3.svg') ?>" alt="">
                    </figure>
                </div>
                <div class=" shadow-md rounded-[20px] lg:rounded-[40px] border-white border-[10px]">
                    <figure>
                        <img class=" h-[146px] bg-[#093B57] rounded-[20px] lg:rounded-[40px] w-full lg:h-[176px]" width="0" height="0" loading="lazy" src="<?= base_url('images/landing/home/box-4.svg') ?>" alt="">
                    </figure>
                </div>
                <div class=" shadow-md rounded-[20px] lg:rounded-[40px] border-white border-[10px]">
                    <figure>
                        <img class=" h-[146px] bg-[#093B57] rounded-[20px] lg:rounded-[40px] w-full lg:h-[176px]" width="0" height="0" loading="lazy" src="<?= base_url('images/landing/home/box-5.svg') ?>" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <section class=" relative">

        <div class=" bg-[#093B57] lg:py-[120px] py-[80px] relative">
            <div class=" absolute lg:-top-48 lg:block hidden left-6 lg:left-10">
                <figure>
                    <img class=" w-auto lg:h-[370px] h-[220px]" src="<?= base_url('images/landing/home/puntos.svg') ?>" alt="">
                </figure>
            </div>
            <div class=" absolute lg:-bottom-48 lg:block hidden z-20 lg:right-10">
                <figure>
                    <img class=" w-auto lg:h-[370px] h-[220px]" src="<?= base_url('images/landing/home/puntos.svg') ?>" alt="">
                </figure>
            </div>
            <div class=" container">
                <h2 class=" lg:text-[28px] text-[24px] font-poppins font-black uppercase leading-[140%] text-white text-center">¿Por qué elegirnos para la ventilación de tu empresa?</h2>
                <div class=" flex items-center justify-center lg:gap-x-[124px] lg:flex-row flex-col lg:mt-20 mt-10">
                    <div class=" shadow-md lg:rounded-[40px] rounded-[20px] border-white border-[10px] lg:flex-1 lg:order-1 order-2 lg:mt-0 mt-[60px]">
                        <figure>
                            <img class=" w-full bg-cover object-cover lg:rounded-[40px] rounded-[20px] lg:h-[700px] h-[500px]" width="0" height="0" loading="lazy" src="<?= base_url('images/landing/home/trabajadores.webp') ?>" alt="">
                        </figure>
                    </div>
                    <div class=" flex flex-col lg:items-start items-start lg:flex-1 lg:order-2 order-1">
                        <h3 class=" lg:text-[24px] text-xl text-white font-bold leading-[140%]">Atención personalizada</h3>
                        <p class=" text-white lg:text-lg text-base leading-[180%] font-medium mt-[10px] lg:mt-5">Le damos seguimiento ajustándonos a tu proyecto con atención personalizada.</p>
                        <div class=" w-[84px] h-[4px] rounded-[4px] bg-[#FE5757] mt-5 lg:mt-10"></div>
                        <h3 class=" lg:text-[24px] text-xl text-white font-bold leading-[140%]  mt-5 lg:mt-10">Cumplimiento Normativo</h3>
                        <p class=" text-white lg:text-lg text-base leading-[180%] font-medium mt-[10px] lg:mt-5">Le damos seguimiento ajustándonos a tu proyecto con atención personalizada.</p>
                        <div class=" w-[84px] h-[4px] rounded-[4px] bg-[#FE5757] mt-5 lg:mt-10"></div>
                        <h3 class=" lg:text-[24px] text-xl text-white font-bold leading-[140%]  mt-5 lg:mt-10">Atención personalizada</h3>
                        <p class=" text-white lg:text-lg text-base leading-[180%] font-medium mt-[10px] lg:mt-5">Cumplimos con todas las normativas locales e internacionales en relación a la calidad del aire, salud y seguridad.</p>
                        <div class=" w-[84px] h-[4px] rounded-[4px] bg-[#FE5757] mt-5 lg:mt-10"></div>
                        <h3 class=" lg:text-[24px] text-xl text-white font-bold leading-[140%]  mt-5 lg:mt-10">Proyectos personalizados</h3>
                        <p class=" text-white lg:text-lg text-base leading-[180%] font-medium mt-[10px] lg:mt-5">Ajustamos el proyecto a la medida cumpliendo tus principales necesidades.</p>
                        <div class=" w-[84px] h-[4px] rounded-[4px] bg-[#FE5757] mt-5 lg:mt-10"></div>
                        <h3 class=" lg:text-[24px] text-xl text-white font-bold leading-[140%]  mt-5 lg:mt-10">Servicio Integral</h3>
                        <p class=" text-white lg:text-lg text-base leading-[180%] font-medium mt-[10px] lg:mt-5">Cubrimos todas las necesidades del cliente desde la instalación y mantenimiento a largo plazo.</p>
                        <a href="#form" class="px-[20px] py-[10px] rounded-[24px] bg-white text-[#E73636] hover:text-white hover:bg-[#E73636] font-poppins mt-10 text-xl font-medium transition-all ease-in-out duration-300">Contáctanos</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class=" relative">
        <div class=" absolute w-full top-0 z-0 left-0">
            <figure>
                <img class=" w-full lg:h-[825px] bg-cover object-cover h-[825px]" width="0" height="0" loading="lazy" src="<?= base_url('images/landing/home/fondo-2.webp') ?>" alt="">
            </figure>
        </div>
        <div class=" container lg:pt-[120px] relative z-20 pt-[80px]">
            <h2 class=" uppercase text-[#093B57] text-center lg:text-[28px] text-[24px] leading-[140%] font-extrabold">Conoce nuestro proceso de trabajo</h2>
            <div class=" flex items-center justify-center lg:flex-row flex-col gap-y-5 lg:mt-[200px] mt-[42px]">
                <div class=" lg:flex-1 relative lg:mt-0 mt-[100px]">
                    <div class=" absolute left-0 -top-[90px]">
                        <figure>
                            <svg width="69" height="162" viewBox="0 0 69 162" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.2" d="M0.960007 41V0.52002H68.72V161.34H23.62V41H0.960007Z" fill="#FE5757" />
                            </svg>
                        </figure>
                    </div>
                    <p class=" lg:text-lg text-base text-[#032039] font-medium leading-[180%]"><span class=" text-[#E73636] font-bold">Evaluación de la necesidad:</span> Valoramos las necesidades de tu proyecto, cumpliendo las normativas y necesidades del cliente.</p>
                </div>
                <div class=" lg:flex-1 relative lg:mt-0 mt-[100px]">
                    <div class=" absolute left-0 -top-[90px]">
                        <figure>
                            <svg width="114" height="163" viewBox="0 0 114 163" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.2" d="M1.26001 129.8C15.4867 118.653 27.1467 109.047 36.24 100.98C45.3333 92.9133 52.96 84.6266 59.12 76.12C65.28 67.4667 68.36 59.2533 68.36 51.48C68.36 46.7866 67.26 43.12 65.06 40.48C63.0067 37.84 59.9267 36.52 55.82 36.52C51.5667 36.52 48.2667 38.3533 45.92 42.02C43.5733 45.54 42.4733 50.7466 42.62 57.64H0.820007C1.26001 44.5866 4.12001 33.8066 9.40001 25.3C14.68 16.6466 21.5733 10.34 30.08 6.37997C38.5867 2.2733 48.0467 0.219971 58.46 0.219971C76.5 0.219971 89.92 4.6933 98.72 13.64C107.52 22.5866 111.92 34.1733 111.92 48.4C111.92 63.6533 106.787 77.9533 96.52 91.3C86.4 104.647 73.7133 116.6 58.46 127.16H113.46V162.14H1.26001V129.8Z" fill="#FE5757" />
                            </svg>
                        </figure>
                    </div>
                    <p class=" lg:text-lg text-base text-[#032039] font-medium leading-[180%]"><span class=" text-[#E73636] font-bold">Propuesta y planificación:</span> Elaboramos una propuesta personalizada solucionando todas tus necesidades.</p>
                </div>
                <div class=" lg:flex-1 relative lg:mt-0 mt-[100px]">
                    <div class=" absolute left-0 -top-[90px]">
                        <figure>
                            <svg width="115" height="166" viewBox="0 0 115 166" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.2" d="M2.56005 51.48C3.14672 34.9067 8.28005 22.22 17.9601 13.42C27.6401 4.47333 41.1334 0 58.4401 0C69.7334 0 79.34 1.98 87.2601 5.94C95.3267 9.75334 101.413 15.0333 105.52 21.78C109.627 28.38 111.68 35.86 111.68 44.22C111.68 54.1933 109.26 62.1867 104.42 68.2C99.5801 74.0667 94.08 78.0267 87.9201 80.08V80.96C105.667 87.56 114.54 100.173 114.54 118.8C114.54 128.04 112.413 136.18 108.16 143.22C103.907 150.26 97.7467 155.76 89.6801 159.72C81.6134 163.68 72.0067 165.66 60.8601 165.66C42.5267 165.66 28.0067 161.26 17.3 152.46C6.74005 143.513 1.24005 129.873 0.800049 111.54H42.82C42.5267 117.407 43.7734 121.953 46.5601 125.18C49.3467 128.407 53.5267 130.02 59.1 130.02C63.3534 130.02 66.6534 128.7 69.0001 126.06C71.4934 123.42 72.7401 119.9 72.7401 115.5C72.7401 109.927 70.9067 105.82 67.2401 103.18C63.7201 100.54 57.9267 99.22 49.8601 99.22H42.1601V64.24H49.6401C55.2134 64.3867 59.9067 63.5067 63.7201 61.6C67.6801 59.5467 69.66 55.5133 69.66 49.5C69.66 44.9533 68.5601 41.58 66.3601 39.38C64.1601 37.0333 61.1534 35.86 57.3401 35.86C53.0867 35.86 49.9334 37.4 47.8801 40.48C45.9734 43.4133 44.8734 47.08 44.5801 51.48H2.56005Z" fill="#FE5757" />
                            </svg>
                        </figure>
                    </div>
                    <p class=" lg:text-lg text-base text-[#032039] font-medium leading-[180%]"><span class=" text-[#E73636] font-bold">Instalación y puesta en marcha:</span> Damos inicio al proyecto y lo llevamos a cabo en el menor tiempo posible.</p>
                </div>
            </div>
            <div class=" flex items-start">
                <a href="#form" class=" px-[20px] py-[10px] rounded-[25px] border-2 border-[#E73636] hover:border-transparent text-[#E73636] font-medium text-xl hover:text-white bg-transparent hover:bg-[#E73636] transition-all ease-in-out duration-300 font-poppins mt-[42px]">Contacta a un asesor</a>
            </div>
            <div class=" lg:mt-[350px] mt-[80px]">
                <h2 class=" lg:text-[28px] text-[24px] leading-[140%] uppercase text-center font-extrabold text-[#093B57]">Estamos respaldados por las mejores marcas del país</h2>


            </div>
        </div>

        <div class="relative overflow-hidden w-full bg-white lg:mt-20 mt-[60px]">
            <div class="flex ">
                <!-- CONTENEDOR PRINCIPAL -->
                <div class="w-full">
                    <!-- DESKTOP/LG+ : Carrusel infinito (animación) -->
                    <div class="hidden lg:block relative overflow-hidden">
                        <div class="carousel-track flex items-center gap-x-6 will-change-transform">
                            <!-- --- SET ORIGINAL --- -->
                            <figure class="flex-shrink-0 min-w-[150px]">
                                <img class="w-auto max-h-[87px] object-contain" src="<?= base_url('images/landing/home/greenheck.webp') ?>" alt="">
                            </figure>
                            <figure class="flex-shrink-0 min-w-[150px]">
                                <img class="w-auto max-h-[87px] object-contain" src="<?= base_url('images/landing/home/carrier.webp') ?>" alt="">
                            </figure>
                            <figure class="flex-shrink-0 min-w-[150px]">
                                <img class="w-auto max-h-[87px] object-contain" src="<?= base_url('images/landing/home/mirage.webp') ?>" alt="">
                            </figure>
                            <figure class="flex-shrink-0 min-w-[150px]">
                                <img class="w-auto max-h-[87px] object-contain" src="<?= base_url('images/landing/home/sp.webp') ?>" alt="">
                            </figure>
                            <figure class="flex-shrink-0 min-w-[150px]">
                                <img class="w-auto max-h-[87px] object-contain" src="<?= base_url('images/landing/home/vermont.webp') ?>" alt="">
                            </figure>
                            <figure class="flex-shrink-0 min-w-[150px]">
                                <img class="w-auto max-h-[87px] object-contain" src="<?= base_url('images/landing/home/trane.webp') ?>" alt="">
                            </figure>
                            <figure class="flex-shrink-0 min-w-[150px]">
                                <img class="w-auto max-h-[87px] object-contain" src="<?= base_url('images/landing/home/york.webp') ?>" alt="">
                            </figure>

                            <!-- --- DUPLICADO (para que no se note salto al llegar al final) --- -->
                            <figure aria-hidden="true" class="flex-shrink-0 min-w-[150px]">
                                <img class="w-auto max-h-[87px] object-contain" src="<?= base_url('images/landing/home/greenheck.webp') ?>" alt="">
                            </figure>
                            <figure aria-hidden="true" class="flex-shrink-0 min-w-[150px]">
                                <img class="w-auto max-h-[87px] object-contain" src="<?= base_url('images/landing/home/carrier.webp') ?>" alt="">
                            </figure>
                            <figure aria-hidden="true" class="flex-shrink-0 min-w-[150px]">
                                <img class="w-auto max-h-[87px] object-contain" src="<?= base_url('images/landing/home/mirage.webp') ?>" alt="">
                            </figure>
                            <figure aria-hidden="true" class="flex-shrink-0 min-w-[150px]">
                                <img class="w-auto max-h-[87px] object-contain" src="<?= base_url('images/landing/home/sp.webp') ?>" alt="">
                            </figure>
                            <figure aria-hidden="true" class="flex-shrink-0 min-w-[150px]">
                                <img class="w-auto max-h-[87px] object-contain" src="<?= base_url('images/landing/home/vermont.webp') ?>" alt="">
                            </figure>
                            <figure aria-hidden="true" class="flex-shrink-0 min-w-[150px]">
                                <img class="w-auto max-h-[87px] object-contain" src="<?= base_url('images/landing/home/trane.webp') ?>" alt="">
                            </figure>
                            <figure aria-hidden="true" class="flex-shrink-0 min-w-[150px]">
                                <img class="w-auto max-h-[87px] object-contain" src="<?= base_url('images/landing/home/york.webp') ?>" alt="">
                            </figure>
                        </div>
                    </div>

                    <!-- MOBILE/SMALL : Scroll horizontal libre (touch friendly) -->
                    <!-- MOBILE/SMALL : Scroll horizontal libre (touch friendly) -->
                    <div class="lg:hidden">
                        <div id="carouselContinuous" class="overflow-x-auto no-scrollbar py-2 whitespace-nowrap">
                            <div class="flex gap-x-6 items-center px-4" id="carouselContent">
                                <figure class="flex-shrink-0 min-w-[120px]">
                                    <img class="w-auto max-h-[87px] object-contain" src="<?= base_url('images/landing/home/greenheck.webp') ?>" alt="">
                                </figure>
                                <figure class="flex-shrink-0 min-w-[120px]">
                                    <img class="w-auto max-h-[87px] object-contain" src="<?= base_url('images/landing/home/carrier.webp') ?>" alt="">
                                </figure>
                                <figure class="flex-shrink-0 min-w-[120px]">
                                    <img class="w-auto max-h-[87px] object-contain" src="<?= base_url('images/landing/home/mirage.webp') ?>" alt="">
                                </figure>
                                <figure class="flex-shrink-0 min-w-[120px]">
                                    <img class="w-auto max-h-[87px] object-contain" src="<?= base_url('images/landing/home/sp.webp') ?>" alt="">
                                </figure>
                                <figure class="flex-shrink-0 min-w-[120px]">
                                    <img class="w-auto max-h-[87px] object-contain" src="<?= base_url('images/landing/home/vermont.webp') ?>" alt="">
                                </figure>
                                <figure class="flex-shrink-0 min-w-[120px]">
                                    <img class="w-auto max-h-[87px] object-contain" src="<?= base_url('images/landing/home/trane.webp') ?>" alt="">
                                </figure>
                                <figure class="flex-shrink-0 min-w-[120px]">
                                    <img class="w-auto max-h-[87px] object-contain" src="<?= base_url('images/landing/home/york.webp') ?>" alt="">
                                </figure>
                            </div>
                        </div>
                    </div>

                    <script>
                        const carousel = document.getElementById('carouselContinuous');
                        const content = document.getElementById('carouselContent');

                        // Clonamos contenido para loop infinito
                        content.innerHTML += content.innerHTML;

                        let scrollSpeed = 0.5; // px por frame, ajusta para más rápido/lento
                        let scrollPos = 0;

                        function animateScroll() {
                            scrollPos += scrollSpeed;
                            if (scrollPos >= content.scrollWidth / 2) {
                                scrollPos = 0;
                            }
                            carousel.scrollLeft = scrollPos;
                            requestAnimationFrame(animateScroll);
                        }

                        // Iniciamos la animación
                        requestAnimationFrame(animateScroll);
                    </script>

                </div>

                <!-- CSS adicional -->
                <style>
                    /* Animación infinite (lg+) */
                    @keyframes scrollInfinite {
                        0% {
                            transform: translateX(0);
                        }

                        100% {
                            transform: translateX(-50%);
                        }

                        /* -50% porque duplicamos el set */
                    }

                    /* Track del carrusel en desktop */
                    .carousel-track {
                        width: max-content;
                        /* se ajusta al contenido */
                        animation: scrollInfinite 28s linear infinite;
                        gap: 24px;
                    }



                    /* Ocultar scrollbar en móviles (soporta Webkit + Firefox) */
                    .no-scrollbar {
                        -ms-overflow-style: none;
                        /* IE and Edge */
                        scrollbar-width: none;
                        /* Firefox */
                    }

                    .no-scrollbar::-webkit-scrollbar {
                        display: none;
                    }

                    /* Chrome, Safari, Opera */

                    /* Ajustes de min-width para evitar que se encimen imágenes al reducir */
                    @media (min-width: 1024px) {

                        /* en lg+ dejamos min-w un poco más grande para mejor separación */
                        .carousel-track figure {
                            min-width: 150px;
                        }
                    }

                    @media (max-width: 1023px) {
                        .carousel-track figure {
                            min-width: 120px;
                        }
                    }
                </style>


            </div>
        </div>
    </section>
    <section class="relative">
        <div class=" absolute z-20 lg:top-48 lg:block hidden left-6 lg:left-10">
            <figure>
                <img class=" w-auto lg:h-[370px] h-[220px]" src="<?= base_url('images/landing/home/puntos.svg') ?>" alt="">
            </figure>
        </div>
        <div class=" relative lg:mt-[91px]">
            <figure>
                <img class=" w-full bg-cover object-cover lg:h-[1050px] h-[1250px]" width="0" height="0" loading="lazy" src="<?= base_url('images/landing/home/fondo-azul.webp') ?>" alt="">
            </figure>
        </div>
        <?= form_open(url_to('landing.pages.prospects'), ['id' => 'form-contact', 'onsubmit' => 'document.getElementById("loading_icon").classList.remove("hidden")']) ?>
        <input type="hidden" name="origin" value="<?= esc($landing['id'] ?? 'default_landing_id') ?>">
        <div id="form" class=" absolute inset-0 flex items-center justify-center">
            <div class=" flex items-center lg:flex-row flex-col container justify-center lg:gap-x-[56px] lg:pt-0 pt-[160px]">
                <div class=" flex flex-col items-start">
                    <figure>
                        <img src="<?= base_url('images/landing/home/logo.svg') ?>" alt="">
                    </figure>
                    <p class=" lg:text-lg text-base mt-10 text-white leading-[180%] font-poppins font-medium">Envíanos tus datos y un experto se pondrá en contacto <br class=" lg:block hidden">contigo a la brevedad. Será un placer atenderte.</p>
                </div>
                <div class=" lg:max-w-[450px] w-full">
                    <div class=" flex flex-col items-center justify-center w-full lg:mt-0 mt-[60px]">
                        <div class=" flex items-center gap-x-5 justify-center w-full">
                            <figure>
                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22.1667 1.1665H5.83333C4.28681 1.16836 2.80415 1.78353 1.71059 2.87709C0.617029 3.97065 0.0018525 5.45331 0 6.99984L0 20.9998C0.0018525 22.5464 0.617029 24.029 1.71059 25.1226C2.80415 26.2161 4.28681 26.8313 5.83333 26.8332H22.1667C23.7132 26.8313 25.1958 26.2161 26.2894 25.1226C27.383 24.029 27.9981 22.5464 28 20.9998V6.99984C27.9981 5.45331 27.383 3.97065 26.2894 2.87709C25.1958 1.78353 23.7132 1.16836 22.1667 1.1665ZM5.83333 3.49984H22.1667C22.8652 3.50121 23.5474 3.7116 24.1254 4.10394C24.7035 4.49628 25.1508 5.05261 25.41 5.70134L16.4757 14.6368C15.8182 15.2917 14.928 15.6594 14 15.6594C13.072 15.6594 12.1818 15.2917 11.5243 14.6368L2.59 5.70134C2.84917 5.05261 3.29655 4.49628 3.87456 4.10394C4.45256 3.7116 5.13475 3.50121 5.83333 3.49984ZM22.1667 24.4998H5.83333C4.90508 24.4998 4.01484 24.1311 3.35846 23.4747C2.70208 22.8183 2.33333 21.9281 2.33333 20.9998V8.74984L9.87467 16.2865C10.9697 17.3788 12.4533 17.9922 14 17.9922C15.5467 17.9922 17.0303 17.3788 18.1253 16.2865L25.6667 8.74984V20.9998C25.6667 21.9281 25.2979 22.8183 24.6415 23.4747C23.9852 24.1311 23.0949 24.4998 22.1667 24.4998Z" fill="white" />
                                </svg>
                            </figure>
                            <input type="email" name="email" id="email" class=" rounded-[24px] w-full text-base text-[#093B57] placeholder:text-base placeholder:text-[#093B57] placeholder:font-medium px-[16px] py-[9px]" required placeholder="Correo electrónico">
                        </div>
                        <div class=" flex items-center gap-x-5 justify-center w-full mt-5">
                            <figure>
                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_2221_63)">
                                        <path d="M14 0C6.28017 0 0 6.28017 0 14C0 21.7198 6.28017 28 14 28C21.7198 28 28 21.7198 28 14C28 6.28017 21.7198 0 14 0ZM9.33333 24.6913V24.5C9.33333 21.9263 11.4263 19.8333 14 19.8333C16.5737 19.8333 18.6667 21.9263 18.6667 24.5V24.6913C17.2363 25.3178 15.659 25.6667 14 25.6667C12.341 25.6667 10.7637 25.3178 9.33333 24.6913ZM20.9125 23.3928C20.3805 20.0573 17.4837 17.5 14 17.5C10.5163 17.5 7.62067 20.0573 7.0875 23.3928C4.20583 21.266 2.33333 17.8477 2.33333 14C2.33333 7.567 7.567 2.33333 14 2.33333C20.433 2.33333 25.6667 7.567 25.6667 14C25.6667 17.8477 23.7942 21.266 20.9125 23.3928ZM14 5.83333C11.4263 5.83333 9.33333 7.92633 9.33333 10.5C9.33333 13.0737 11.4263 15.1667 14 15.1667C16.5737 15.1667 18.6667 13.0737 18.6667 10.5C18.6667 7.92633 16.5737 5.83333 14 5.83333ZM14 12.8333C12.7132 12.8333 11.6667 11.7868 11.6667 10.5C11.6667 9.21317 12.7132 8.16667 14 8.16667C15.2868 8.16667 16.3333 9.21317 16.3333 10.5C16.3333 11.7868 15.2868 12.8333 14 12.8333Z" fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_2221_63">
                                            <rect width="28" height="28" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </figure>
                            <input type="text" name="name" id="name" class=" rounded-[24px] w-full text-base text-[#093B57] placeholder:text-base placeholder:text-[#093B57] placeholder:font-medium px-[16px] py-[9px]" required placeholder="Nombre*">
                        </div>
                        <div class=" flex items-center gap-x-5 justify-center w-full mt-5">
                            <figure>
                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_2221_53)">
                                        <path d="M17.5525 -0.000101562C17.521 -0.00126823 10.479 -0.00126823 10.4475 -0.000101562C7.25552 0.0278984 4.66669 2.63423 4.66669 5.83207V22.1654C4.66669 25.3819 7.28352 27.9987 10.5 27.9987H17.5C20.7165 27.9987 23.3334 25.3819 23.3334 22.1654V5.83323C23.3334 2.63423 20.7445 0.0290651 17.5525 -0.000101562ZM21 22.1654C21 24.0951 19.4297 25.6654 17.5 25.6654H10.5C8.57035 25.6654 7.00002 24.0951 7.00002 22.1654V5.83323C7.00002 4.13807 8.21102 2.72173 9.81285 2.4009L10.6225 4.0214C10.8197 4.4169 11.2245 4.66657 11.6667 4.66657H16.3334C16.7755 4.66657 17.1792 4.4169 17.3775 4.0214L18.1872 2.4009C19.789 2.72057 21 4.13807 21 5.83323V22.1654ZM15.1667 23.3321H12.8334C12.1894 23.3321 11.6667 22.8094 11.6667 22.1654C11.6667 21.5214 12.1894 20.9987 12.8334 20.9987H15.1667C15.8107 20.9987 16.3334 21.5214 16.3334 22.1654C16.3334 22.8094 15.8107 23.3321 15.1667 23.3321Z" fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_2221_53">
                                            <rect width="28" height="28" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>

                            </figure>
                            <input type="tel" name="phone" id="phone" class=" rounded-[24px] w-full text-base text-[#093B57] placeholder:text-base placeholder:text-[#093B57] placeholder:font-medium px-[16px] py-[9px]" required placeholder="Teléfono">
                        </div>
                        <div class=" flex items-center gap-x-5 justify-center w-full mt-5">
                            <figure>
                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_2221_93)">
                                        <path d="M8.16667 16.3333C8.16667 16.6428 8.04375 16.9395 7.82496 17.1583C7.60616 17.3771 7.30942 17.5 7 17.5H5.83333C5.52391 17.5 5.22717 17.3771 5.00838 17.1583C4.78958 16.9395 4.66667 16.6428 4.66667 16.3333C4.66667 16.0239 4.78958 15.7272 5.00838 15.5084C5.22717 15.2896 5.52391 15.1667 5.83333 15.1667H7C7.30942 15.1667 7.60616 15.2896 7.82496 15.5084C8.04375 15.7272 8.16667 16.0239 8.16667 16.3333ZM12.8333 15.1667H11.6667C11.3572 15.1667 11.0605 15.2896 10.8417 15.5084C10.6229 15.7272 10.5 16.0239 10.5 16.3333C10.5 16.6428 10.6229 16.9395 10.8417 17.1583C11.0605 17.3771 11.3572 17.5 11.6667 17.5H12.8333C13.1428 17.5 13.4395 17.3771 13.6583 17.1583C13.8771 16.9395 14 16.6428 14 16.3333C14 16.0239 13.8771 15.7272 13.6583 15.5084C13.4395 15.2896 13.1428 15.1667 12.8333 15.1667ZM7 19.8333H5.83333C5.52391 19.8333 5.22717 19.9562 5.00838 20.175C4.78958 20.3938 4.66667 20.6906 4.66667 21C4.66667 21.3094 4.78958 21.6062 5.00838 21.825C5.22717 22.0438 5.52391 22.1667 5.83333 22.1667H7C7.30942 22.1667 7.60616 22.0438 7.82496 21.825C8.04375 21.6062 8.16667 21.3094 8.16667 21C8.16667 20.6906 8.04375 20.3938 7.82496 20.175C7.60616 19.9562 7.30942 19.8333 7 19.8333ZM12.8333 19.8333H11.6667C11.3572 19.8333 11.0605 19.9562 10.8417 20.175C10.6229 20.3938 10.5 20.6906 10.5 21C10.5 21.3094 10.6229 21.6062 10.8417 21.825C11.0605 22.0438 11.3572 22.1667 11.6667 22.1667H12.8333C13.1428 22.1667 13.4395 22.0438 13.6583 21.825C13.8771 21.6062 14 21.3094 14 21C14 20.6906 13.8771 20.3938 13.6583 20.175C13.4395 19.9562 13.1428 19.8333 12.8333 19.8333ZM7 5.83333H5.83333C5.52391 5.83333 5.22717 5.95625 5.00838 6.17504C4.78958 6.39383 4.66667 6.69058 4.66667 7C4.66667 7.30942 4.78958 7.60616 5.00838 7.82496C5.22717 8.04375 5.52391 8.16667 5.83333 8.16667H7C7.30942 8.16667 7.60616 8.04375 7.82496 7.82496C8.04375 7.60616 8.16667 7.30942 8.16667 7C8.16667 6.69058 8.04375 6.39383 7.82496 6.17504C7.60616 5.95625 7.30942 5.83333 7 5.83333ZM12.8333 5.83333H11.6667C11.3572 5.83333 11.0605 5.95625 10.8417 6.17504C10.6229 6.39383 10.5 6.69058 10.5 7C10.5 7.30942 10.6229 7.60616 10.8417 7.82496C11.0605 8.04375 11.3572 8.16667 11.6667 8.16667H12.8333C13.1428 8.16667 13.4395 8.04375 13.6583 7.82496C13.8771 7.60616 14 7.30942 14 7C14 6.69058 13.8771 6.39383 13.6583 6.17504C13.4395 5.95625 13.1428 5.83333 12.8333 5.83333ZM7 10.5H5.83333C5.52391 10.5 5.22717 10.6229 5.00838 10.8417C4.78958 11.0605 4.66667 11.3572 4.66667 11.6667C4.66667 11.9761 4.78958 12.2728 5.00838 12.4916C5.22717 12.7104 5.52391 12.8333 5.83333 12.8333H7C7.30942 12.8333 7.60616 12.7104 7.82496 12.4916C8.04375 12.2728 8.16667 11.9761 8.16667 11.6667C8.16667 11.3572 8.04375 11.0605 7.82496 10.8417C7.60616 10.6229 7.30942 10.5 7 10.5ZM12.8333 10.5H11.6667C11.3572 10.5 11.0605 10.6229 10.8417 10.8417C10.6229 11.0605 10.5 11.3572 10.5 11.6667C10.5 11.9761 10.6229 12.2728 10.8417 12.4916C11.0605 12.7104 11.3572 12.8333 11.6667 12.8333H12.8333C13.1428 12.8333 13.4395 12.7104 13.6583 12.4916C13.8771 12.2728 14 11.9761 14 11.6667C14 11.3572 13.8771 11.0605 13.6583 10.8417C13.4395 10.6229 13.1428 10.5 12.8333 10.5ZM28 11.6667V22.1667C27.9981 23.7132 27.383 25.1958 26.2894 26.2894C25.1958 27.383 23.7132 27.9981 22.1667 28H5.83333C4.28681 27.9981 2.80415 27.383 1.71059 26.2894C0.617029 25.1958 0.0018525 23.7132 0 22.1667V5.83333C0.0018525 4.28681 0.617029 2.80415 1.71059 1.71059C2.80415 0.617029 4.28681 0.0018525 5.83333 0L12.8333 0C14.3799 0.0018525 15.8625 0.617029 16.9561 1.71059C18.0496 2.80415 18.6648 4.28681 18.6667 5.83333H22.1667C23.7132 5.83519 25.1958 6.45036 26.2894 7.54392C27.383 8.63748 27.9981 10.1201 28 11.6667ZM5.83333 25.6667H16.3333V5.83333C16.3333 4.90508 15.9646 4.01484 15.3082 3.35846C14.6518 2.70208 13.7616 2.33333 12.8333 2.33333H5.83333C4.90508 2.33333 4.01484 2.70208 3.35846 3.35846C2.70208 4.01484 2.33333 4.90508 2.33333 5.83333V22.1667C2.33333 23.0949 2.70208 23.9852 3.35846 24.6415C4.01484 25.2979 4.90508 25.6667 5.83333 25.6667ZM25.6667 11.6667C25.6667 10.7384 25.2979 9.84817 24.6415 9.19179C23.9852 8.53542 23.0949 8.16667 22.1667 8.16667H18.6667V25.6667H22.1667C23.0949 25.6667 23.9852 25.2979 24.6415 24.6415C25.2979 23.9852 25.6667 23.0949 25.6667 22.1667V11.6667ZM22.1667 15.1667C21.9359 15.1667 21.7104 15.2351 21.5185 15.3633C21.3266 15.4915 21.1771 15.6737 21.0888 15.8869C21.0005 16.1 20.9774 16.3346 21.0224 16.5609C21.0674 16.7872 21.1785 16.9951 21.3417 17.1583C21.5049 17.3215 21.7127 17.4326 21.9391 17.4776C22.1654 17.5226 22.3999 17.4995 22.6131 17.4112C22.8263 17.3229 23.0085 17.1734 23.1367 16.9815C23.2649 16.7896 23.3333 16.5641 23.3333 16.3333C23.3333 16.0239 23.2104 15.7272 22.9916 15.5084C22.7728 15.2896 22.4761 15.1667 22.1667 15.1667ZM22.1667 19.8333C21.9359 19.8333 21.7104 19.9018 21.5185 20.03C21.3266 20.1581 21.1771 20.3404 21.0888 20.5535C21.0005 20.7667 20.9774 21.0013 21.0224 21.2276C21.0674 21.4539 21.1785 21.6618 21.3417 21.825C21.5049 21.9881 21.7127 22.0992 21.9391 22.1442C22.1654 22.1893 22.3999 22.1662 22.6131 22.0779C22.8263 21.9896 23.0085 21.84 23.1367 21.6482C23.2649 21.4563 23.3333 21.2307 23.3333 21C23.3333 20.6906 23.2104 20.3938 22.9916 20.175C22.7728 19.9562 22.4761 19.8333 22.1667 19.8333ZM22.1667 10.5C21.9359 10.5 21.7104 10.5684 21.5185 10.6966C21.3266 10.8248 21.1771 11.007 21.0888 11.2202C21.0005 11.4334 20.9774 11.668 21.0224 11.8943C21.0674 12.1206 21.1785 12.3285 21.3417 12.4916C21.5049 12.6548 21.7127 12.7659 21.9391 12.8109C22.1654 12.8559 22.3999 12.8328 22.6131 12.7445C22.8263 12.6562 23.0085 12.5067 23.1367 12.3148C23.2649 12.123 23.3333 11.8974 23.3333 11.6667C23.3333 11.3572 23.2104 11.0605 22.9916 10.8417C22.7728 10.6229 22.4761 10.5 22.1667 10.5Z" fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_2221_93">
                                            <rect width="28" height="28" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </figure>
                            <input type="text" name="empresa" id="empresa" class=" rounded-[24px] w-full text-base text-[#093B57] placeholder:text-base placeholder:text-[#093B57] placeholder:font-medium px-[16px] py-[9px]" required placeholder="Empresa*">
                        </div>
                        <div class=" flex items-center gap-x-5 justify-center w-full mt-5">
                            <figure>
                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_2221_68)">
                                        <path d="M14 7C13.077 7 12.1748 7.2737 11.4073 7.78647C10.6399 8.29925 10.0418 9.02809 9.68854 9.88081C9.33533 10.7335 9.24292 11.6718 9.42298 12.5771C9.60305 13.4823 10.0475 14.3139 10.7002 14.9665C11.3528 15.6191 12.1843 16.0636 13.0896 16.2437C13.9948 16.4237 14.9331 16.3313 15.7858 15.9781C16.6386 15.6249 17.3674 15.0268 17.8802 14.2593C18.393 13.4919 18.6666 12.5896 18.6666 11.6667C18.6666 10.429 18.175 9.242 17.2998 8.36683C16.4246 7.49167 15.2377 7 14 7ZM14 14C13.5385 14 13.0874 13.8632 12.7037 13.6068C12.3199 13.3504 12.0209 12.986 11.8443 12.5596C11.6677 12.1332 11.6215 11.6641 11.7115 11.2115C11.8015 10.7588 12.0237 10.3431 12.3501 10.0168C12.6764 9.69043 13.0921 9.4682 13.5448 9.37817C13.9974 9.28814 14.4665 9.33434 14.8929 9.51095C15.3193 9.68755 15.6837 9.98662 15.9401 10.3703C16.1965 10.7541 16.3333 11.2052 16.3333 11.6667C16.3333 12.2855 16.0875 12.879 15.6499 13.3166C15.2123 13.7542 14.6188 14 14 14Z" fill="white" />
                                        <path d="M14 27.9999C13.0176 28.0049 12.0483 27.7745 11.1732 27.328C10.2982 26.8814 9.54286 26.2317 8.9705 25.4332C4.52433 19.3001 2.26917 14.6894 2.26917 11.7284C2.26917 8.61718 3.50509 5.6334 5.70505 3.43344C7.905 1.23348 10.8888 -0.00244141 14 -0.00244141C17.1112 -0.00244141 20.095 1.23348 22.2949 3.43344C24.4949 5.6334 25.7308 8.61718 25.7308 11.7284C25.7308 14.6894 23.4757 19.3001 19.0295 25.4332C18.4571 26.2317 17.7018 26.8814 16.8268 27.328C15.9517 27.7745 14.9824 28.0049 14 27.9999ZM14 2.54439C11.5645 2.54717 9.22952 3.51591 7.50735 5.23808C5.78518 6.96025 4.81644 9.29521 4.81366 11.7307C4.81366 14.0757 7.02216 18.4122 11.0308 23.9411C11.3711 24.4098 11.8176 24.7913 12.3337 25.0544C12.8497 25.3174 13.4208 25.4546 14 25.4546C14.5792 25.4546 15.1503 25.3174 15.6663 25.0544C16.1824 24.7913 16.6289 24.4098 16.9692 23.9411C20.9778 18.4122 23.1863 14.0757 23.1863 11.7307C23.1836 9.29521 22.2148 6.96025 20.4926 5.23808C18.7705 3.51591 16.4355 2.54717 14 2.54439Z" fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_2221_68">
                                            <rect width="28" height="28" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </figure>
                            <select name="estados" id="estados" required class="rounded-[24px] w-full text-base text-[#093B57] placeholder:text-base placeholder:text-[#093B57] placeholder:font-medium px-[16px] py-[10px]">
                                <option value="" disabled selected class="text-palosaltos-gray-2">Estado*</option>
                                <?php if (isset($states) && is_array($states)): ?>
                                    <?php foreach ($states as $state): ?>
                                        <option value="<?= esc($state['id']) ?>" <?= set_select('estados', $state['id']) ?>><?= esc($state['name']) ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class=" flex items-center gap-x-5 justify-center w-full mt-5">
                            <figure>
                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_2221_21)">
                                        <path d="M14.9915 0.0350321C10.9431 -0.244968 6.96479 1.2367 4.09479 4.1067C1.23646 6.96503 -0.245206 10.9434 0.034794 14.9917C0.536461 22.2834 6.84813 28 14.3965 28H22.1665C25.5965 28 27.9998 25.2 27.9998 21.175V14.385C27.9998 6.84837 22.2831 0.536699 14.9915 0.0350321ZM25.6665 21.175C25.6665 23.8584 24.2548 25.6667 22.1665 25.6667H14.3965C8.07313 25.6667 2.78813 20.9067 2.36813 14.84C2.13479 11.4567 3.37146 8.14337 5.75146 5.7517C7.94479 3.55837 10.9198 2.33337 14.0231 2.33337C14.2915 2.33337 14.5715 2.33337 14.8398 2.3567C20.9181 2.7767 25.6665 8.0617 25.6665 14.385V21.175Z" fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_2221_21">
                                            <rect width="28" height="28" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </figure>
                            <textarea name="" id="" class="rounded-[24px] w-full text-base text-[#093B57] resize-none placeholder:text-base placeholder:text-[#093B57] placeholder:font-medium px-[16px] py-[9px]"></textarea>
                        </div>
                        <div class="mt-6 text-center w-full">
                            <button type="submit" class="px-[20px] py-[10px] w-full rounded-[25px] text-center mt-10 transition-all ease-in-out duration-300 bg-[#E73636] hover:text-[#E73636] hover:bg-white text-white font-poppins font-medium text-xl flex items-center justify-center">
                                <svg id="loading_icon" class="hidden animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span>Enviar</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <footer class=" bg-[#032039]">
        <p class=" lg:text-base text-sm font-poppins text-center py-4 leading-[180px] text-white  lg:px-0 px-7">Sia Ventilación® Todos los derechos reservados 2025 • Política de privacidad <br class=" lg:block hidden ">
            Diseño y desarrollo por Leads al Cubo</p>
    </footer>
    <a href="#" class="fixed lg:bottom-8 lg:right-9 right-4 bottom-3 z-40 group">
        <div class="group relative inline-flex items-center rounded-full bg-gradient-to-r from-[#1AC133] to-[#7BF385] shadow-md p-[15px] transition-all ease-in duration-500 lg:hover:w-[300px]">
            <!-- Figure que se mueve -->
            <figure class="w-[50px] h-[50px] transition-transform duration-300 lg:group-hover:-translate-x-0 flex-shrink-0">
                <!-- SVG -->
                <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M25 0C11.2147 0 0 11.2147 0 25C0 29.8496 1.37637 34.5071 3.99331 38.5484L0.195442 46.9143C-0.154035 47.6862 -0.0265003 48.5888 0.521731 49.2331C0.942428 49.7267 1.5536 50 2.18299 50C2.37512 50 2.5689 49.9752 2.76103 49.9222L13.2255 47.0518C16.8378 48.983 20.8891 50 25 50C38.7853 50 50 38.7853 50 25C50 11.2147 38.7853 0 25 0ZM25 45.634C21.3495 45.634 17.7554 44.6618 14.6101 42.825C14.2722 42.6279 13.8929 42.5268 13.5087 42.5268C13.3149 42.5268 13.1211 42.5533 12.9306 42.6047L6.09514 44.4796L8.47522 39.2341C8.7982 38.5203 8.71538 37.6888 8.25825 37.0545C5.71088 33.5249 4.36597 29.356 4.36597 25C4.36597 13.623 13.6213 4.36597 25 4.36597C36.3787 4.36597 45.634 13.6213 45.634 25C45.634 36.3787 36.3787 45.634 25 45.634Z" fill="white" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M34.6111 28.7432C33.5643 28.1171 32.2012 27.4182 30.9689 27.9217C30.0231 28.3092 29.4186 29.79 28.8058 30.5469C28.4911 30.9345 28.1151 30.9957 27.6315 30.802C24.0787 29.3875 21.3574 27.0157 19.3981 23.7495C19.0668 23.241 19.1248 22.8418 19.5256 22.3698C20.1185 21.6725 20.8606 20.8808 21.0212 19.9417C21.1819 19.0026 20.7413 17.9044 20.3521 17.068C19.8552 15.9997 19.3003 14.4743 18.2304 13.8697C17.2449 13.3132 15.9497 13.6246 15.0718 14.3385C13.558 15.5707 12.8276 17.502 12.8491 19.4166C12.8557 19.9599 12.922 20.5032 13.0495 21.0282C13.3543 22.2903 13.9389 23.4696 14.5948 24.5909C15.0901 25.4356 15.6283 26.2554 16.2097 27.0455C18.1095 29.626 20.473 31.8686 23.2092 33.5448C24.5773 34.3828 26.0497 35.1166 27.5751 35.6201C29.2861 36.1849 30.8099 36.7729 32.6566 36.4234C34.5912 36.0557 36.4976 34.8599 37.2644 32.9949C37.4913 32.4433 37.6056 31.8288 37.4781 31.2458C37.2147 30.0417 35.5833 29.3245 34.6094 28.7415L34.6111 28.7432Z" fill="white" />
                </svg>
            </figure>

            <!-- Texto absolutamente posicionado -->
            <span class="absolute left-full ml-3 top-1/2 -translate-y-1/2 opacity-0 group-hover:-translate-x-[240px] font-poppins text-lg lg:group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap text-white font-semibold pointer-events-none">
                Envianos un mensaje
            </span>
        </div>

    </a>

</main>
<?= $this->endSection() ?>