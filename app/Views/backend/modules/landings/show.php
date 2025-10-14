
<?php

?>

<?= $this->extend('backend/templates/dashboard') ?>

<?= $this->section('head') ?>
    <title>
        <?= esc($landing['title']) ?> | Landing
    </title>

    <meta name="description" content="Información y datos de landing.">

<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="grid lg:items-center gap-2 sm:mx-10 p-4">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-y-4">
            <div>
                <h1 class="text-2xl font-bold  mb-2">
                    Landing: <?= esc($landing['title']) ?>
                </h1>

                <h2 class="text-sm">
                    Información y datos de Landing.
                </h2>
            </div>
            <?php if(esc(session('user.role')) !== 'analyst'): ?>
            <a href="<?= url_to('backend.modules.landing.copy', $landing['id']) ?>" class="btn btn-outline gap-2 btn-secondary">
                <i class="bi bi-plus-circle text-xl"></i>
                Duplicar
            </a>
            <?php endif; ?>
        </div>

        <div class="divider my-0"></div>

        <!-- contenedor de landing  -->
        <div class="overflow-x-auto">
            <div class="flex justify-center items-center pt-5 pb-10">
                <div class="card w-full sm:w-11/12 md:w-10/12 border-spacing-1 shadow-md">
                    <div class="card-body">
                        <div class="form-control">
                            <div class="input-group">
                                <a aria-label="nombre empresa" class="justify-start btn w-4/12">
                                    <label for="slug"><small class="lowercase text-right"><?= esc(base_url()) ?></small></label>
                                </a>
                                <input type="text" name="slug" value="<?= esc($landing['slug']) ?>" class="w-full input input-bordered input-primary" disabled>
                            </div>
                        </div>
                        <div class="form-control">
                            <div class="input-group">
                                <a aria-label="title" class="justify-start btn w-4/12">
                                    <label for="title">Título: <small>(H1)</small></label>
                                </a>
                                <input type="text" name="title" value="<?= esc($landing['title']) ?>" class="w-full input input-bordered input-primary" disabled>
                            </div>
                        </div>
                        <div class="form-control">
                            <div class="input-group">
                                <a aria-label="subtitle" class="justify-start btn w-4/12">
                                    <label for="subtitle">Subtitulo: <small>H2</small></label>
                                </a>
                                <input type="text" name="subtitle" value="<?= esc($landing['subtitle']) ?>" class="w-full input input-bordered input-primary" disabled>
                            </div>
                        </div>
                        <div class="form-control hidden">
                            <div class="input-group">
                                <a aria-label="logo" class="justify-start btn w-4/12">
                                    <i class="bi bi-image text-2xl"></i>
                                    <label for="logo">Logo</label>
                                </a>
                                <img
                                    src="<?= base_url(['uploads/settings/', setting()->get('App.general', 'logo')]) ?>"
                                    alt="Logo de la empresa"
                                    class="h-8 w-auto object-cover"
                                >
                                <input type="text" name="logo" value="<?= esc(setting()->get('App.general', 'logo')) ?>" class="w-full input input-bordered input-primary hidden">
                            </div>
                        </div>
                    </div>
                    <?php if(esc(session('user.role')) !== 'analyst'): ?>
                    <div class="card-actions justify-end p-4">
                        <?= form_open(url_to('backend.modules.landing.delete', $landing['id'])) ?>
                            <label for="modal-submit-delete-<?= esc($landing['id']) ?>" class="btn btn-outline btn-error gap-2">
                                <i class="bi bi-trash"></i>
                                Eliminar
                            </label>
                            <?= $this->setData([
                                'id'      => "modal-submit-delete-{$landing['id']}",
                                'message' => '¿Seguro deseas eliminar esta landing?',
                            ])->include('backend/components/modal-submit') ?>
                        <?= form_close() ?>

                        <a href="<?= url_to('backend.modules.landing.update', $landing['id']) ?>" class="btn btn-outline btn-primary gap-2">
                            <i class="bi bi-pencil-fill"></i>
                            Editar
                        </a>
                    </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <!-- Fin de contenedor landing -->

        <!-- Paginación -->
        <div class="flex justify-end pt-4">

        </div>
        <!-- Fin de la paginación -->
    </div>
<?= $this->endSection() ?>
