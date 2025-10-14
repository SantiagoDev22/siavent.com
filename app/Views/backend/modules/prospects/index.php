
<?php
use CodeIgniter\I18n\Time;

?>

<?= $this->extend('backend/templates/dashboard') ?>

<?= $this->section('head') ?>
    <title>Prospectos | Dashboard</title>
    <meta name="description" content="Búsqueda y consulta de todos los prospectos registrados.">
    
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="grid lg:items-center gap-2 sm:mx-10 p-4">
        <div class="w-full flex flex-col lg:flex-row lg:items-center lg:justify-between gap-y-4">
            <div>
                <h1 class="text-2xl font-bold mb-2">
                    Prospectos
                </h1>
    
                <h2 class="text-sm">
                    Búsqueda y consulta de todos los prospectos registrados.
                </h2>
            </div>
            <?php if (session('user.role')!= 'analyst') :?>
            <a
                href="<?= single_service('uri', url_to('backend.modules.prospects.download'))->setQuery($downloadParams) ?>"
                class="btn gap-2 btn-success hover:brightness-95 hidden"
                target="_blank">
                <i class="bi bi-filetype-exe text-xl"></i>
                Exportar
            </a>
            <?php endif ?>
        </div>
        <!-- Filtros de consulta -->
        <div>
            <?= form_open(url_to('backend.modules.prospects.index'), ['method' => 'get']) ?>
                <div class="flex flex-col lg:flex-row items-end lg:items-center justify-between gap-4">
                    <div class="form-control w-full">
                        <div class="input-group">
                            <!-- Campo de búsqueda -->
                            <input
                                type="text"
                                name="q"
                                placeholder="Buscar..."
                                value="<?= esc($queryParam) ?>"
                                class="input input-bordered w-full"
                            >

                            <!-- Botón de submit -->
                            <button type="submit" class="btn btn-primary gap-2" aria-label="Botón que realiza una búsqueda">
                                <i class="bi bi-search text-xl"></i>
                            </button>
                        </div>
                    </div>
                    <button
                        data-collapse-toggle="filters"
                        type="button"
                        aria-label="Filtrado de resultados"
                        class="btn btn-secondary btn-square gap-2"
                    >
                        <i class="bi bi-filter-right text-xl"></i>
                    </button>
                </div>
                <!-- Filtros de busqueda -->
                <div id="filters" class="hidden bg-base-200 p-6 rounded-xl">
                    <div class="grid grid-cols-1 lg:grid-cols-4 items-end gap-2">
                        <!-- Campo de filtrado de búsqueda -->
                        <div class="form-control">
                            <label for="filter" class="label">
                                <span class="label-text">
                                    Filtro de búsqueda:
                                </span>
                            </label>
                            <select
                                name="filter"
                                id="filter"
                                class="select select-bordered"
                            >
                                <option value="" selected>
                                    Buscar por...
                                </option>
                                <?php foreach ($filterFields as $field => $description): ?>
                                    <option value="<?= esc($field) ?>"<?= $field === $filterParam ? ' selected' : '' ?>>
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
                            <select
                                name="sortOrder"
                                id="sortOrder"
                                class="select select-bordered"
                            >
                                <option value="" selected>
                                    Ordenar...
                                </option>
                                <?php foreach ($sortOrderFields as $field => $description): ?>
                                    <option value="<?= esc($field) ?>"<?= $field === $sortOrderParam ? ' selected' : '' ?>>
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
                            <input
                                name="dateFrom"
                                id="dateFrom"
                                type="date"
                                value="<?= esc($dateFromParam) ?>"
                                class="input input-bordered w-full"
                            >
                        </div>
                        <!-- Fin del campo de filtrado de fecha desde  -->

                        <!-- Campo de filtrado de fecha hasta -->
                        <div class="form-control">
                            <label for="dateTo" class="label">
                                <span class="label-text">
                                    Hasta:
                                </span>
                            </label>
                            <input
                                name="dateTo"
                                id="dateTo"
                                type="date"
                                value="<?= esc($dateToParam) ?>"
                                class="input input-bordered w-full"
                            >
                        </div>
                        <!-- Fin del campo de filtrado de fecha hasta -->
                    </div>

                    <!-- Botón para aplicar los filtros de búsqueda -->
                    <div class="pt-4 flex flex-col lg:flex-row lg:justify-end gap-2">
                        <input
                            type="submit"
                            value="Aplicar"
                            class="btn btn-primary"
                        >
                        <a
                            href="<?= url_to('backend.modules.prospects.index') ?>"
                            class="btn btn-secondary"
                        >
                            Restaurar
                        </a>
                    </div>
                </div>
            <?= form_close() ?>
        </div>
        <!-- Fin de los filtros de consulta -->
    
        <div class="divider my-0"></div>

        <!-- Tabla de prospectos -->
        <div class="overflow-x-auto">
            <table class="table w-full">
                <!-- head -->
                <thead>
                <tr>
                    <th>Fecha de Registro</th>
                    <th>Nombre Prospecto</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <!-- row 1 -->
                <?php foreach($prospects as $prospect): ?>
                <tr>
                    <th><?= esc(Time::parse($prospect['created_at'])->toDateString()) ?></th>
                    <td><?= esc($prospect['name']) ?></td>
                    <td><?= esc($prospect['phone']) ?></td>
                    <td>
                        <div class="flex justify-center items-center gap-2 ">
                            <a href="<?= url_to('backend.modules.prospects.show', $prospect['id']) ?>" class="btn btn-sm btn-outline btn-primary">details</a>
                            <a href="tel: <?= esc($prospect['phone']) ?>" class="btn btn-sm btn-outline"><i class="bi bi-telephone-outbound-fill"></i></a>
                            <a href="mailto:<?=($prospect['email']) ?>" class="btn btn-sm btn-outline btn-secondary"><i class="bi bi-envelope-plus"></i></a>
                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <!-- Fin de la tabla de prospectos -->
    
        <!-- Paginación -->
        <div class="flex justify-end pt-4">
            <?= $pager->links('prospects', 'backend_pagination') ?>
        </div>
        <!-- Fin de la paginación -->
    </div>
    
    <!-- Notificación exitosa -->
    <?php if (session()->has('toast-success')): ?>
        <?= $this->setVar('message', session()->getFlashdata('toast-success'))->include('backend/components/toast-success') ?>
    <?php endif ?>
    <!-- Fin de la notificación exitosa -->
    
<?= $this->endSection() ?>
