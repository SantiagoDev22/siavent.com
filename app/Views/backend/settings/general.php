<?= $this->extend('backend/templates/dashboard') ?>

<?= $this->section('head') ?>
    <title>General | Configuraciones</title>
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
            const inputCompany = document.querySelector('#company');
            const inputPhones = document.querySelector('#phones');
            const inputSchedules = document.querySelector('#schedules');
            const form = document.querySelector('form');

            // Función para habilitar los campos y cambiar el botón a "Guardar"
            function enableEditMode() {
                inputCompany.disabled = false;
                inputCompany.classList.remove('bg-gray-50', 'border-gray-300');
                inputCompany.classList.add('bg-white', 'border-blue-500', 'focus:ring-blue-500', 'focus:border-blue-500');
                inputCompany.focus();

                inputPhones.disabled = false;
                inputPhones.classList.remove('bg-gray-50', 'border-gray-300');
                inputPhones.classList.add('bg-white', 'border-blue-500', 'focus:ring-blue-500', 'focus:border-blue-500');

                inputSchedules.disabled = false;
                inputSchedules.classList.remove('bg-gray-50', 'border-gray-300');
                inputSchedules.classList.add('bg-white', 'border-blue-500', 'focus:ring-blue-500', 'focus:border-blue-500');

                btnEditar.value = 'Guardar';
                btnEditar.classList.remove('btn-outline', 'btn-primary');
                btnEditar.classList.add('btn-success');

                btnEditar.removeEventListener('click', enableEditMode);
                btnEditar.addEventListener('click', submitForm);
            }

            // Función para enviar el formulario
            function submitForm(event) {
                event.preventDefault();
                if (form.checkValidity()) {
                    form.submit();
                } else {
                    form.reportValidity();
                }
            }

            // Escuchar el evento de click en el botón "Editar"
            btnEditar.addEventListener('click', enableEditMode);
        });

        function previewImage(event, inputId) {
            const file = event.target.files[0];
            const container = document.querySelector(`[data-preview="${inputId}"]`);
            const imagePreview = container.querySelector('img');
            const defaultIcon = container.querySelector('svg');
            const textPreview = container.querySelector('div[id^="text-alternate"]');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                    defaultIcon.classList.add('hidden');
                    textPreview.classList.add('hidden');
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="grid lg:items-center gap-2 sm:mx-10 p-4 rounded-lg">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-y-4">
            <div>
                <h1 class="text-2xl font-bold mb-2">
                    Información del Sitio Web
                </h1>
                <h2 class="text-sm text-gray-500">
                    Información y datos contacto.
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
                    <?= form_open_multipart(url_to('backend.settings.general')) ?>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-left py-10 sm:py-4">
                            <div>
                                <label for="company" class="block mb-2 text-sm font-medium text-gray-700">
                                    Empresa:
                                </label>
                                <input type="text" name="company" id="company"
                                    placeholder="eg: Empresa" disabled
                                    value="<?= esc(setting()->get('App.general', 'company')) ?>"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>

                            <div>
                                <label for="phones" class="block mb-2 text-sm font-medium text-gray-700">
                                    Teléfonos:
                                </label>
                                <input type="text" name="phones" id="phones"
                                    placeholder="eg: 000 000 0000" disabled
                                    value="<?= esc(setting()->get('App.general', 'phones')) ?>"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>

                            <div>
                                <label for="schedules" class="block mb-2 text-sm font-medium text-gray-700">
                                    Horarios:
                                </label>
                                <input type="text" name="schedules" id="schedules"
                                    placeholder="eg: Lun-Vie 9:00 - 18:00" disabled
                                    value="<?= esc(setting()->get('App.general', 'schedules')) ?>"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>

                            <div class="col-span-1 md:col-span-2">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="favicon" class="block text-sm font-medium text-gray-700">
                                            Favicon
                                        </label>
                                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-300 px-6 pt-5 pb-6">
                                            <div class="space-y-1 text-center" data-preview="favicon">
                                                <?php if (!empty(setting()->get('App.general', 'favicon'))): ?>
                                                    <img id="image-preview-favicon"
                                                        src="<?= base_url(['uploads/settings/', setting()->get('App.general', 'favicon')]) ?>"
                                                        alt="Favicon de <?= esc(setting()->get('App.general', 'company')) ?>"
                                                        class="mx-auto h-12 w-auto rounded-md">
                                                <?php else: ?>
                                                    <svg class="mx-auto h-12 w-12 text-gray-400" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.69a1.5 1.5 0 00-2.12 0l-.88.88.97.97a.75.75 0 11-1.06 1.06l-5.16-5.16a1.5 1.5 0 00-2.12 0L3 16.061zM11.25 9a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" clip-rule="evenodd" />
                                                    </svg>
                                                <?php endif; ?>
                                                <div class="mt-4">
                                                    <label for="favicon" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                        <span>Subir un archivo</span>
                                                        <input id="favicon" name="favicon" type="file" class="sr-only" accept="image/*" onchange="previewImage(event, 'favicon')">
                                                    </label>
                                                    <p class="text-xs text-gray-500 mt-1">PNG, SVG (max. 32x32)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="logo" class="block text-sm font-medium text-gray-700">
                                            Logo
                                        </label>
                                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-300 px-6 pt-5 pb-6">
                                            <div class="space-y-1 text-center" data-preview="logo">
                                                <?php if (!empty(setting()->get('App.general', 'logo'))): ?>
                                                    <img id="image-preview-logo"
                                                        src="<?= base_url(['uploads/settings/', setting()->get('App.general', 'logo')]) ?>"
                                                        alt="Logo de <?= esc(setting()->get('App.general', 'company')) ?>"
                                                        class="mx-auto h-12 w-auto rounded-md">
                                                <?php else: ?>
                                                    <svg class="mx-auto h-12 w-12 text-gray-400" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.69a1.5 1.5 0 00-2.12 0l-.88.88.97.97a.75.75 0 11-1.06 1.06l-5.16-5.16a1.5 1.5 0 00-2.12 0L3 16.061zM11.25 9a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" clip-rule="evenodd" />
                                                    </svg>
                                                <?php endif; ?>
                                                <div class="mt-4">
                                                    <label for="logo" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                        <span>Subir un archivo</span>
                                                        <input id="logo" name="logo" type="file" class="sr-only" accept="image/*" onchange="previewImage(event, 'logo')">
                                                    </label>
                                                    <p class="text-xs text-gray-500 mt-1">PNG, SVG (max. 500KB)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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