<?php

use CodeIgniter\I18n\Time;

?>

<?= $this->extend('backend/templates/dashboard') ?>

<?= $this->section('head') ?>
<title>Landings | Dashboard</title>
<meta name="description" content="Búsqueda y consulta de todas las landings registradas.">

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="grid lg:items-center gap-2 sm:mx-10 p-4">
    <div class="w-full flex flex-col lg:flex-row lg:items-center lg:justify-between gap-y-4">
        <div>
            <h1 class="text-2xl font-bold mb-2">
                Landings
            </h1>

            <h2 class="text-sm">
                Búsqueda y consulta de todas las landings.
            </h2>
        </div>
        <?php if (esc(session('user.role')) !== 'analyst') : ?>
            <a href="<?= url_to('backend.modules.landing.create') ?>" class="btn gap-2 btn-secondary">
                <i class="bi bi-plus-circle text-xl"></i>
                Crear Nueva
            </a>
        <?php endif ?>
    </div>
    <!-- Filtros de consulta -->
    <div>
        <?= form_open(url_to('backend.modules.landing.index'), ['method' => 'get']) ?>
            <div class="flex flex-col lg:flex-row items-end lg:items-center justify-between gap-4">
                <div class="form-control w-full">
                    <div class="input-group">
                        <!-- Campo de búsqueda -->
                        <input type="text" name="q" placeholder="Buscar..." value="<?= esc($queryParam) ?>" class="input input-bordered w-full">

                        <!-- Botón de submit -->
                        <button type="submit" class="btn btn-primary gap-2">
                            <i class="bi bi-search text-xl"></i>
                        </button>
                    </div>
                </div>
                <button data-collapse-toggle="filters" type="button" aria-label="Filtrado de resultados" class="btn btn-secondary btn-square gap-2">
                    <i class="bi bi-filter-right text-xl"></i>
                </button>
            </div>
            <div id="filters" class="hidden bg-base-200 p-6 rounded-xl">
                <div class="grid grid-cols-1 lg:grid-cols-4 items-end gap-2">
                    <!-- Campo de filtrado de búsqueda -->
                    <div class="form-control">
                        <label for="filter" class="label">
                            <span class="label-text">
                                Filtro de búsqueda:
                            </span>
                        </label>
                        <select name="filter" id="filter" class="select select-bordered">
                            <option value="" selected>
                                Buscar por...
                            </option>
                            <?php foreach ($filterFields as $field => $description) : ?>
                                <option value="<?= esc($field) ?>" <?= $field === $filterParam ? ' selected' : '' ?>>
                                    <?= esc($description) ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <!-- Fin del campo de filtrado de búsqueda -->

                    <!-- Campo del modo de ordenamiento de resultados -->
                    <div class="form-control">
                        <label for="sortOrder" class="label">
                            <span class="label-text">
                                Modo de ordenamiento:
                            </span>
                        </label>
                        <select name="sortOrder" id="sortOrder" class="select select-bordered">
                            <option value="" selected>
                                Ordenar...
                            </option>
                            <?php foreach ($sortOrderFields as $field => $description) : ?>
                                <option value="<?= esc($field) ?>" <?= $field === $sortOrderParam ? ' selected' : '' ?>>
                                    <?= esc($description) ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <!-- Fin del campo del modo de ordenamiento de resultados -->

                    <!-- Campo de filtrado de fecha desde -->
                    <div class="form-control">
                        <label for="dateFrom" class="label">
                            <span class="label-text">
                                Desde:
                            </span>
                        </label>
                        <input name="dateFrom" id="dateFrom" type="date" value="<?= esc($dateFromParam) ?>" class="input input-bordered w-full">
                    </div>
                    <!-- Fin del campo de filtrado de fecha desde  -->

                    <!-- Campo de filtrado de fecha hasta -->
                    <div class="form-control">
                        <label for="dateTo" class="label">
                            <span class="label-text">
                                Hasta:
                            </span>
                        </label>
                        <input name="dateTo" id="dateTo" type="date" value="<?= esc($dateToParam) ?>" class="input input-bordered w-full">
                    </div>
                    <!-- Fin del campo de filtrado de fecha hasta -->
                </div>

                <!-- Botón para aplicar los filtros de búsqueda -->
                <div class="pt-4 flex flex-col lg:flex-row lg:justify-end gap-2">
                    <a href="<?= url_to('backend.modules.landing.index') ?>" class="btn btn-secondary">
                        Restaurar
                    </a>
                    <input type="submit" value="Aplicar" class="btn btn-primary">
                </div>
            </div>
        <?= form_close() ?>
    </div>
    <!-- Fin de los filtros de consulta -->

    <div class="divider my-0"></div>

    <!-- contenedor de dashboard -->
    <div class="overflow-x-auto">
        <table class="table w-full">
            <!-- head -->
            <thead>
                <tr>
                    <th>Fecha de Creación</th>
                    <th>Título Landing</th>
                    <th>Link</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- rows -->
                <?php foreach ($landings as $landing) : ?>
                    <tr>
                        <th><?= esc(Time::parse($landing['created_at'])->toDateString()) ?></th>
                        <td class="font-medium"><?= esc($landing['title']) ?></td>
                        <td><a href="<?= ENVIRONMENT === 'production' ? single_service('uri', 'https://siavent.com/')->setPath($landing['slug'])
                            : url_to('landing.pages.index', $landing['slug']) ?>" target="_blank" class="link link-hover"><?= esc($landing['name']) ?></a></td>
                        <td>
                            <div class="flex justify-center items-center gap-2 ">
                                <a type="button" href="<?= url_to('backend.modules.landing.update', $landing['id']) ?>" class="btn btn-sm btn-outline btn-primary">details</a>
                                <?php if ($sessionUser['role'] !== 'analyst') : ?>
                                    <!-- Metodo para duplicar una landing -->
                                    <a type="button" href="<?= url_to('backend.modules.landing.copy', $landing['id']) ?>" class="btn btn-sm btn-outline btn-success"><i class="bi bi-files"></i></a>
                                    <!-- Metodo para eliminar una landing -->
                                    <?= form_open(url_to('backend.modules.landing.delete', $landing['id'])) ?>
                                    <label for="modal-submit-delete-<?= esc($landing['id']) ?>" class="btn btn-sm btn-outline btn-error"><i class="bi bi-trash"></i></label>
                                    <?= $this->setData([
                                        'id'      => "modal-submit-delete-{$landing['id']}",
                                        'message' => "¿Desear eliminar esta Landing? <br> '{$landing['title']}'",
                                    ])->include('backend/components/modal-submit') ?>
                                    <?= form_close() ?>
                                <?php endif ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <!-- Fin de dashboard -->

    <!-- Paginación -->
    <div class="flex justify-end pt-4">
        <?= $pager->links('landing', 'backend_pagination') ?>
    </div>
    <!-- Fin de la paginación -->
</div>

<!-- Notificación exitosa -->
<?php if (session()->has('toast-success')) : ?>
    <?= $this->setVar('message', session()->getFlashdata('toast-success'))->include('backend/components/toast-success') ?>
<?php endif ?>
<!-- Fin de la notificación exitosa -->

<?= $this->endSection() ?>