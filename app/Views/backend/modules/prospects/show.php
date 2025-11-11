<?php
use CodeIgniter\I18n\Time;

?>

<?= $this->extend('backend/templates/dashboard') ?>

<?= $this->section('head') ?>
    <title>
        <?= esc($prospect['name']) ?> | Prospectos
    </title>

    <meta
        name="description"
        content="Información y datos del prospecto."
    >
<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <div class="grid lg:items-center gap-2 sm:mx-10 p-4">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-y-4">
            <div>
                <h1 class="text-2xl font-bold  mb-2">
                    Datos del Prospecto: <?= esc($prospect['name']) ?>
                </h1>
    
                <h2 class="text-sm">
                    Información y datos del prospecto.
                </h2>
            </div>
    
            <a href="<?= url_to('backend.modules.prospects.index') ?>" class="btn gap-2">
                <i class="bi bi-arrow-left-circle text-xl"></i>
                Volver
            </a>
        </div>
    
        <div class="divider my-0"></div>
    
        <!-- Tabla de datos del prospecto -->
        <div class="overflow-x-auto">
            <div class="flex justify-center items-center pt-5 pb-10">
                <div class="card w-full sm:w-11/12 md:w-10/12 border-spacing-1 shadow-md">
                    <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-200 sm:p-6">
                        <h3 class="mb-4 text-xl font-semibold dark:text-white">
                            General information
                        </h3>
                        <form action="#">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="first-name" class="block mb-2 text-sm font-medium text-gray-800">Nombre Completo</label>
                                    <input type="text" name="first-name" id="first-name" value="<?= esc($prospect['name']) ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 " 
                                    placeholder="Full Name" required="">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-800">Email</label>
                                    <input type="email" name="email" id="email" value="<?= esc($prospect['email']) ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 " 
                                    placeholder="example@company.com" required="">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-800">Número</label>
                                    <input type="number" name="phone" id="phone" value="<?= esc($prospect['phone']) ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 " 
                                    placeholder="e.g. +(12)3456 789" required="">
                                </div>
                                <?php if(!empty($prospect['state'])): ?>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="state" class="block mb-2 text-sm font-medium text-gray-800">Estado</label>
                                    <input type="text" name="state" id="state" value="<?= esc($prospect['state']) ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 " 
                                    placeholder="e.g. San Francisco" required="">
                                </div>
                                <?php endif; ?>
                                
                                <?php if(!empty($prospect['observations'])): ?>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="observations" class="block mb-2 text-sm font-medium text-gray-800">Empresa</label>
                                        <input type="text" name="observations" id="observations" value="<?= esc($prospect['observations']) ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 " 
                                        placeholder="e.g. Empresa" required="">
                                    </div>
                                <?php endif; ?>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="message" class="block mb-2 text-sm font-medium text-gray-800">Observaciones</label>
                                    <input type="text" name="message" id="message" value="<?= esc($prospect['message']) ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 " 
                                    placeholder="Mensaje">
                                </div>
                                <div class="col-span-6 sm:col-full hidden">
                                    <button class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="submit">Save all</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="grid sm:card-actions sm:justify-end p-4 gap-4">
                        <?php if(esc(session('user.role') != 'analyst')): ?>
                                <?= form_open(url_to('backend.modules.prospects.delete', $prospect['id'])) ?>
                                    <label for="modal-submit-delete-<?= esc($prospect['id']) ?>" class="btn btn-outline btn-error gap-2 w-full">
                                        <i class="bi bi-trash"></i> 
                                        Eliminar
                                    </label>
                                    <?= $this->setData([
                                        'id'        => "modal-submit-delete-{$prospect['id']}",
                                        'message'   => '¿Seguro deseas eliminar esta prospecto?',
                                    ])->include('backend/components/modal-submit') ?>
                                <?= form_close() ?>
                        <?php endif ?>
    
                        <a href="tel: <?= esc($prospect['phone']) ?>" class="btn btn-outline gap-2"><i class="bi bi-telephone-outbound-fill"></i> Llamar</a>

                        <a href="mailto:<?=($prospect['email']) ?>" class="btn btn-outline btn-secondary gap-2"><i class="bi bi-envelope-plus"></i>Enviar Correo</a>
                    </div>
                </div>
            </div>
        </div>

    </div>


<?= $this->endSection() ?>
