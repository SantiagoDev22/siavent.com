<?= $this->extend('auth/templates/auth') ?>

<?= $this->section('head') ?>
<title>
    Bienvenido
</title>

<meta name="description" content="Inicio de sesión.">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <div class="grid justify-center md:items-center">
        <figure>
            <img class="w-[120px] mx-auto h-auto object-contain"
                src="<?= base_url(['uploads/settings/', setting()->get('App.general', 'logo')]) ?>" alt="Logo <?= setting()->get('App.general', 'company') ?>">
        </figure>
    </div>

    <div class="flex flex-col md:flex-row md:justify-between w-full">
        <hgroup class="pt-4 pb-4 text-center flex flex-col lg:justify-start lg:items-start items-center justify-center">
            <h1 class="text-3xl font-bold">
                Bienvenido
            </h1>
            <p class="text-lg text-gray-800">
                Ingresa tus datos.
            </p>
        </hgroup>
    
        <?= form_open(url_to('backend.auth.login'), ['class' => 'flex flex-col gap-y-5']) ?>
            <ul class="text-center">
                <li>
                    <small class="text-red-600">
                        <?= esc(session()->getFlashData('error')) ?>
                    </small>
                </li>
                <li>
                    <small class="text-green-600">
                        <?= esc(session()->getFlashData('success')) ?>
                    </small>
                </li>
            </ul>
    
            <!-- Campo del usuario -->
            <div>
                <label for="email" class="text-gray-800 text-15 mb-2 block hidden">
                    Correo electr&oacute;nico
                </label>
                <div class="border border-[#808080] rounded-[5px] flex items-center gap-x-3 p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4 h-4 fill-[#808080]">
                        <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                    </svg>
                    <input type="email" autofocus name="email" id="email" required maxlength="256" value="<?= set_value('email') ?>"
                        placeholder="Correo electrónico" class="text-gray-900 text-13 w-full outline-none">
                </div>
                <small class="text-red-600">
                    <?= validation_show_error('email') ?>
                </small>
            </div>
            <!-- Fin del campo del usuario -->
    
            <!-- Campo de la contraseña -->
            <div>
                <label for="password" class="text-gray-800 text-15 mb-2 block hidden">
                    Contraseña
                </label>
                <div class="border border-[#808080] rounded-[5px] flex items-center gap-x-3 p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4 h-4 fill-[#808080]">
                        <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z" />
                    </svg>
                    <input type="password" name="password" id="password" required minlength="8" maxlength="32" value=""
                        placeholder="Contraseña" class="text-gray-900 text-13 w-full outline-none">
                </div>
                <small class="text-red-600">
                    <?= validation_show_error('password') ?>
                </small>
            </div>
            <!-- Fin del campo de la contraseña -->
            <div class=" flex items-start">
                <a href="<?= url_to('backend.auth.forgotten') ?>" class="text-sm text-right text-[#1875D0] hover:underline">
                    ¿Olvidaste tu contraseña?
                </a>
            </div>
    
            <div class=" flex items-end justify-end">
                <input type="submit" value="Iniciar sesión"
                    class="bg-[#2C8DEB] mt-1.5  text-white font-bold py-3 rounded-[5px] cursor-pointer hover:opacity-90 transition w-auto px-6 shadow-md">
            </div>
    
        <?= form_close() ?>
    </div>

<?= $this->endSection() ?>