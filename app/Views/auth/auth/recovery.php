<?= $this->extend('auth/templates/auth') ?>

<?= $this->section('head') ?>
    <title>
        Reestablecer Contraseña
    </title>

    <meta
        name="description"
        content="Inicio de sesión."
    >
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="grid justify-center md:items-center">
        <figure>
            <img class="w-[120px] mx-auto h-auto object-contain" src="<?= base_url(['uploads/settings/', setting()->get('App.general', 'logo')]) ?>" alt="">
        </figure>
    </div>
    <div class="flex flex-col md:flex-row md:justify-between w-full">
        <hgroup class="pt-4 pb-4 text-center flex flex-col lg:justify-start lg:items-start items-center justify-center">
            <h1 class="text-xl font-bold">
                Restabler contraseña
            </h1>
            <p class="text-sm text-gray-800">
                Crear una nueva contraseña
            </p>
        </hgroup>
    
        <?= form_open(url_to('backend.auth.recovery', $id, $key), ['class' => 'flex flex-col gap-y-5']) ?>
            <ul class="text-center">
                <li>
                    <small class="text-red-600">
                        <?= esc(session()->getFlashData('error')) ?>
                    </small>
                </li>
            </ul>
    
            <!-- Campo de la contraseña -->
            <div>
                <label for="password" class="text-gray-800 text-15 mb-2 block">
                    Contraseña:
                </label>
                <div class="border border-blue-300 rounded-xl flex items-center gap-x-3 p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4 h-4 fill-blue-300">
                        <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/>
                    </svg>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        required
                        minlength="8"
                        maxlength="32"
                        value=""
                        placeholder="*****"
                        class="text-gray-900 text-13 w-full outline-none"
                    >
                </div>
                <small class="text-red-600">
                    <?= validation_show_error('password') ?>
                </small>
            </div>
            <!-- Fin del campo de la contraseña -->
    
            <!-- Campo de la contraseña -->
            <div>
                <label for="pass_confirm" class="text-gray-800 text-15 mb-2 block">
                    Repetir Contraseña:
                </label>
                <div class="border border-blue-300 rounded-xl flex items-center gap-x-3 p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4 h-4 fill-blue-300">
                        <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/>
                    </svg>
                    <input
                        type="password"
                        name="pass_confirm"
                        id="pass_confirm"
                        required
                        minlength="8"
                        maxlength="32"
                        value=""
                        placeholder="*****"
                        class="text-gray-900 text-13 w-full outline-none"
                    >
                </div>
                <small class="text-red-600">
                    <?= validation_show_error('pass_confirm') ?>
                </small>
            </div>
            <!-- Fin del campo de la contraseña -->
    
            <input
                type="submit"
                value="Enviar"
                class="bg-[#2C8DEB] mt-1.5  text-white font-bold py-3 rounded-[5px] cursor-pointer hover:opacity-90 transition w-auto px-6 shadow-md"
            >
    
            <a
                href="<?= url_to('backend.auth.forgotten') ?>"
                class="text-sm text-right hover:underline"
            >
                ¿Olvidaste tu contraseña?
            </a>
        <?= form_close() ?>
    </div>

<?= $this->endSection() ?>
