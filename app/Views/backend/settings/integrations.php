<?= $this->extend('backend/templates/dashboard') ?>

<?= $this->section('head') ?>
    <title>Integraciones | Configuraciones</title>
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
            const inputWhatsapp = document.querySelector('#whatsapp');
            const inputGtag = document.querySelector('#gtag');

            function enableEditMode() {
                inputWhatsapp.disabled = false;
                inputWhatsapp.classList.remove('bg-gray-50', 'border-gray-300');
                inputWhatsapp.classList.add('bg-white', 'border-blue-500', 'focus:ring-blue-500', 'focus:border-blue-500');
                inputWhatsapp.placeholder = "Agrega el link de WhatsApp Personalizado";
                inputWhatsapp.focus();

                inputGtag.disabled = false;
                inputGtag.classList.remove('bg-gray-50', 'border-gray-300');
                inputGtag.classList.add('bg-white', 'border-blue-500', 'focus:ring-blue-500', 'focus:border-blue-500');
                inputGtag.placeholder = "Agrega el código del Tag Manager";

                btnEditar.value = 'Guardar';
                btnEditar.classList.remove('btn-outline', 'btn-primary');
                btnEditar.classList.add('btn-success');

                btnEditar.removeEventListener('click', enableEditMode);
                btnEditar.addEventListener('click', submitForm);
            }

            function submitForm(event) {
                event.preventDefault();
                const form = document.querySelector('form');
                if (form.checkValidity()) {
                    form.submit();
                } else {
                    form.reportValidity();
                }
            }

            btnEditar.addEventListener('click', enableEditMode);
        });
    </script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="grid lg:items-center gap-2 sm:mx-10 p-4 rounded-lg">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-y-4">
            <div>
                <h1 class="text-2xl font-bold mb-2">
                    Integraciones
                </h1>
                <h2 class="text-sm text-gray-500">
                    Configura tus integraciones.
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
                    <?= form_open(url_to('backend.settings.integrations')) ?>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-left py-10 sm:py-4">
                            <div>
                                <label for="whatsapp" class="block mb-2 text-sm font-medium text-gray-700">
                                    WhatsApp:
                                </label>
                                <input type="text" name="whatsapp" id="whatsapp"
                                    placeholder="https://api.whatsapp.com/send?phone=your-custom-text"
                                    value="<?= esc(setting()->get('App.apps', 'whatsapp')) ?>"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                    disabled>
                                <label class="label">
                                    <span class="label-text-alt text-error">
                                        <?= validation_show_error('whatsapp') ?>
                                    </span>
                                </label>
                            </div>
                            <div>
                                <label for="gtag" class="block mb-2 text-sm font-medium text-gray-700">
                                    Google Tag Manager:
                                </label>
                                <input type="text" name="gtag" id="gtag"
                                    placeholder="GTM-XXXXXXX"
                                    value="<?= esc(setting()->get('App.apps', 'google:tagManager')) ?>"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                    disabled>
                                <label class="label">
                                    <span class="label-text-alt text-error">
                                        <?= validation_show_error('gtag') ?>
                                    </span>
                                </label>
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