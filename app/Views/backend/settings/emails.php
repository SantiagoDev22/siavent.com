<?= $this->extend('backend/templates/dashboard') ?>

<?= $this->section('head') ?>
    <title>Correos | Configuraciones</title>
    <meta name="description" content="Consulta todas las configuraciones del sitio web.">
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
    <!-- Mensaje de notificación -->
    <?php if (session()->has('toast-success')): ?>
        <?= $this->setData([
            'message' => session()->getFlashdata('toast-success'),
        ])->include('backend/components/toast-success') ?>
    <?php endif ?>
    <!-- Fin del mensaje de notificación -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnEditar = document.getElementById('btn_submit');
            const inputTo = document.querySelector('#to');
            const inputCC = document.querySelector('#cc');
            const inputBCC = document.querySelector('#bcc');
            const form = document.querySelector('form');

            // Función para habilitar los campos y cambiar el botón a "Guardar"
            function enableEditMode() {
                inputCC.disabled = false;
                inputCC.classList.remove('bg-gray-50', 'border-gray-300'); // Quita estilos de deshabilitado
                inputCC.classList.add('bg-white', 'border-blue-500', 'focus:ring-blue-500', 'focus:border-blue-500');

                inputBCC.disabled = false;
                inputBCC.classList.remove('bg-gray-50', 'border-gray-300'); // Quita estilos de deshabilitado
                inputBCC.classList.add('bg-white', 'border-blue-500', 'focus:ring-blue-500', 'focus:border-blue-500');

                inputTo.disabled = false;
                inputTo.classList.remove('bg-gray-50', 'border-gray-300'); // Quita estilos de deshabilitado
                inputTo.classList.add('bg-white', 'border-blue-500', 'focus:ring-blue-500', 'focus:border-blue-500');
                inputTo.focus();

                btnEditar.value = 'Guardar';
                btnEditar.classList.remove('btn-outline', 'btn-primary');
                btnEditar.classList.add('btn-success'); // Cambia el color del botón

                // Remover el evento anterior y agregar el nuevo evento para guardar
                btnEditar.removeEventListener('click', enableEditMode);
                btnEditar.addEventListener('click', submitForm);
            }

            // Función para enviar el formulario
            function submitForm(event) {
                event.preventDefault();
                if (form.checkValidity()) {
                    form.submit();
                } else {
                    // Disparar la validación HTML5
                    form.reportValidity();
                }
            }

            // Escuchar el evento de click en el botón "Editar"
            btnEditar.addEventListener('click', enableEditMode);

            // Agregar validación en tiempo real para los campos de correo electrónico
            [inputTo, inputCC, inputBCC].forEach(input => {
                input.addEventListener('input', function() {
                    if (this.value === '') {
                        this.setCustomValidity('Este campo es obligatorio.');
                    } else if (!this.value.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/)) {
                        this.setCustomValidity('Por favor, introduce una dirección de correo electrónico válida.');
                    } else {
                        this.setCustomValidity('');
                    }
                    this.reportValidity();
                });
            });
        });
    </script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="grid lg:items-center gap-2 sm:mx-10 p-4 rounded-lg">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-y-4">
            <div>
                <h1 class="text-2xl font-bold mb-2">
                    Configuraciones de Correo
                </h1>
                <h2 class="text-sm text-gray-500">
                    Información y correos contacto.
                </h2>
            </div>
            <a href="<?= url_to('backend.dashboard.index') ?>" class="btn gap-2">
                <i class="bi bi-arrow-left-circle text-xl"></i>
                Inicio
            </a>
        </div>

        <div class="divider my-0"></div>

        <div class="overflow-x-auto">
            <div class="flex justify-center items-center p-5 pb-10">
                <div class="card w-full sm:w-11/12 md:w-10/12 border-spacing-1 shadow-sm px-4">
                    <?= form_open(url_to('backend.settings.emails')) ?>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-left py-10 sm:py-4">
                            <div class="col-span-1 md:col-span-2">
                                <label for="emails" class="block mb-2 text-sm font-medium text-gray-700">
                                    <span>Remitente:</span>
                                    <span class="text-sm text-error hover:cursor-pointer" data-tooltip-target="tooltip-hover" data-tooltip-trigger="hover" type="button"><i class="ri-alert-line"></i></span>
                                </label>
                                <div>
                                    <span id="tooltip-hover" role="tooltip" class="absolute z-10 invisible inline-block text-xs text-blue-500">Este correo se configura a nivel de servidor.</span>
                                    <input type="text" name="emails" id="emails"
                                        placeholder="eg: remitente@mail.com" disabled
                                        value="<?= esc(config('Email')->SMTPUser) ?>"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full md:w-1/2 p-2.5"
                                        title="Este campo no se puede editar.">
                                    <label class="label">
                                        <span class="label-text-alt text-error">
                                            <?= validation_show_error('emails') ?>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label for="emails[to]" class="block mb-2 text-sm font-medium text-gray-700">
                                    Destinatarios:
                                </label>
                                <input type="email" name="emails[to]" id="to" required
                                    placeholder="eg: destinatario@mail.com" disabled
                                    value="<?= esc(setting()->get('App.emails', 'to')) ?>"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    >
                            </div>

                            <div>
                                <label for="emails[cc]" class="block mb-2 text-sm font-medium text-gray-700">
                                    Destinatarios CC:
                                </label>
                                <input type="email" name="emails[cc]" id="cc"
                                    placeholder="eg: copia@mail.com" disabled
                                    value="<?= esc(setting()->get('App.emails', 'cc')) ?>"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    >
                            </div>

                            <div>
                                <label for="emails[bcc]" class="block mb-2 text-sm font-medium text-gray-700">
                                    Destinatarios BCC:
                                </label>
                                <input type="email" name="emails[bcc]" id="bcc"
                                    placeholder="eg: copiaoculta@mail.com" disabled
                                    value="<?= esc(setting()->get('App.emails', 'bcc')) ?>"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    >
                            </div>
                        </div>

                        <div class="card-actions justify-end px-8 pb-7">
                            <input id="btn_submit" type="button" class="btn btn-outline btn-primary" value="Editar">
                        </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>