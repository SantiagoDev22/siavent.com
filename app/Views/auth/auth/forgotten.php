<?= $this->extend('auth/templates/auth') ?>

<?= $this->section('head') ?>
    <title>
        Recuperación de Cuenta
    </title>

    <meta
        name="description"
        content="Recuperación de cuenta."
    >
<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <div class="grid justify-center md:items-center">
        <figure>
            <img class="w-[120px] mx-auto h-auto object-contain" src="<?= base_url(['uploads/settings/', setting()->get('App.general', 'logo')]) ?>" alt="Logo <?= setting()->get('App.general', 'company') ?>">
        </figure>
    </div>
    <div class="flex flex-col md:flex-row md:justify-between w-full">
        <hgroup class="pt-4 pb-4 text-center flex flex-col lg:justify-start lg:items-start items-center justify-center">
            <h1 class="text-3xl font-bold">
                Recuperar Cuenta
            </h1>
            <p class="text-lg text-gray-800">
                Ingresa tu correo electrónico
            </p>
        </hgroup>

        <?= form_open(url_to('backend.auth.forgotten'), ['class' => 'flex flex-col gap-y-5']) ?>
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
                <label for="email" class="text-gray-800 text-15 mb-2 block">
                    Correo electr&oacute;nico
                </label>
                <div class="border border-[#808080] rounded-[5px] flex items-center gap-x-3 p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4 h-4 fill-[#808080]">
                        <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                    </svg>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        required
                        maxlength="256"
                        value="<?= set_value('email') ?>"
                        placeholder="Correo electrónico"
                        class="text-gray-900 text-13 w-full outline-none"
                    >
                </div>
                <small class="text-red-600">
                    <?= validation_show_error('email') ?>
                </small>
            </div>
            <!-- Fin del campo del usuario -->

            <input
                type="submit"
                value="Recuperar Cuenta"
                class="bg-[#2C8DEB] mt-1.5  text-white font-bold py-3 rounded-[5px] cursor-pointer hover:opacity-90 transition w-auto px-6 shadow-md"
            >

            <a
                href="<?= url_to('backend.auth.login') ?>"
                class="text-sm text-right text-[#1875D0] hover:underline">
                < REGRESAR
            </a>
        <?= form_close() ?>
    </div>

<?= $this->endSection() ?>
