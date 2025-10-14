<?php use CodeIgniter\I18n\Time;

?>

<?= $this->extend('backend/templates/dashboard') ?>

<?= $this->section('head') ?>
    <title>Usuarios | Configuraciones</title>
    <meta name="description" content="Búsqueda y consulta de todos los usuarios de acceso.">

<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
    <!-- Mensaje de notificación -->
    <?php if (session()->has('toast-success')): ?>
        <?= $this->setData([
            'message' => session()->getFlashdata('toast-success'),
        ])->include('backend/components/toast-success') ?>
    <?php endif ?>
    <!-- Fin del mensaje de notificación -->
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="grid lg:items-center gap-2 sm:mx-10 p-4">
    <div class="w-full flex flex-col lg:flex-row lg:items-center lg:justify-between gap-y-4">
        <div>
            <h1 class="text-2xl font-bold  mb-2">
                Todos los Usuarios
            </h1>
            <h2 class="text-sm">
                Búsqueda y consulta de todos los usuarios de acceso.
            </h2>
        </div>

        <!-- Botón para registrar un nuevo usuario de acceso -->
        <a
            href="<?= url_to('backend.users.create') ?>"
            class="btn btn-primary gap-2">
            <i class="bi bi-plus-circle text-xl"></i>
            Nuevo Usuario
        </a>
        <!-- Fin del botón para registrar un nuevo usuario de acceso -->
    </div>
    <!-- Filtros de consulta -->
    <div>
        <!-- Formulario de búsqueda y consulta de resultados -->
        <?= form_open(url_to('backend.users.index'), ['method' => 'get']) ?>
            <div class="flex flex-col lg:flex-row items-end lg:items-center justify-between gap-4">
                <!-- Campo de búsqueda -->
                <div class="form-control w-full">
                    <div class="input-group">
                        <input
                            type="text"
                            name="q"
                            maxlength="256"
                            value="<?= esc($queryParam) ?>"
                            placeholder="Buscar..."
                            class="input input-bordered w-full"
                        >

                        <!-- Botón de submit -->
                        <button
                            type="submit"
                            aria-label="Botón que realiza una búsqueda"
                            class="btn btn-primary btn-square"
                        >
                            <i class="bi bi-search text-xl"></i>
                        </button>
                        <!-- Fin del botón de submit -->
                    </div>
                </div>
                <!-- Fin del campo de búsqueda -->

                <!-- Botón que muestra los campos de filtrado -->
                <button
                    type="button"
                    data-collapse-toggle="filters"
                    aria-label="Botón que muestra los filtros de búsqueda y consulta"
                    class="btn btn-secondary btn-square gap-2"
                >
                    <i class="bi bi-filter-right text-xl"></i>
                </button>
                <!-- Fin del botón que muestra los campos de filtrado -->
            </div>

            <!-- Filtros de búsqueda y consulta -->
            <div id="filters" class="hidden pt-4">
                <div class="bg-base-200 p-6 rounded-xl">
                    <div class="pb-4 grid grid-cols-1 lg:grid-cols-4 items-end gap-2">
                        <!-- Campo de filtrado de búsqueda -->
                        <div class="form-control w-full">
                            <label for="filter" class="label">
                                <span class="label-text">
                                    Filtro de búsqueda:
                                </span>
                            </label>
                            <?= form_dropdown('filter', $filterFields, $filterParam, [
                                'id'    => 'filter',
                                'class' => 'select select-bordered w-full',
                            ]) ?>
                        </div>
                        <!-- Fin del campo de filtrado de búsqueda -->

                        <!-- Campo de ordenamiento -->
                        <div class="form-control w-full">
                            <label for="sortBy" class="label">
                                <span class="label-text">
                                    Campo de ordenamiento:
                                </span>
                            </label>
                            <?= form_dropdown('sortBy', $sortByFields, $sortByParam, [
                                'id'    => 'sortBy',
                                'class' => 'select select-bordered w-full',
                            ]) ?>
                        </div>
                        <!-- Fin del campo de ordenamiento -->

                        <!-- Campo del modo de ordenamiento -->
                        <div class="form-control w-full">
                            <label for="sortOrder" class="label">
                                <span class="label-text">
                                    Modo de ordenamiento:
                                </span>
                            </label>
                            <?= form_dropdown('sortOrder', $sortOrderFields, $sortOrderParam, [
                                'id'    => 'sortOrder',
                                'class' => 'select select-bordered w-full',
                            ]) ?>
                        </div>
                        <!-- Fin del campo del modo de ordenamiento -->

                        <!-- Campo de filtrado por rol -->
                        <div class="form-control w-full">
                            <label for="role_id" class="label">
                                <span class="label-text">
                                    Filtrar por rol:
                                </span>
                            </label>
                            <select name="role_id" id="role_id" class="select select-bordered w-full">
                                <option value="" selected>
                                    Todos
                                </option>
                                <?php foreach ($roles as $role): ?>
                                    <option
                                        value="<?= esc($role['id']) ?>"
                                        <?= $role['id'] === $roleParam ? 'selected' : '' ?>
                                    >
                                        <?= esc($role['description']) ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <!-- Fin del campo de filtrado por rol -->

                        <!-- Campo de filtrado por fecha desde -->
                        <div class="form-control w-full">
                            <label for="dateFrom" class="label">
                                <span class="label-text">
                                    Desde:
                                </span>
                            </label>
                            <input
                                type="date"
                                name="dateFrom"
                                id="dateFrom"
                                value="<?= esc($dateFromParam) ?>"
                                class="input input-bordered w-full"
                            >
                        </div>
                        <!-- Fin del campo de filtrado por fecha desde -->

                        <!-- Campo de filtrado por fecha hasta -->
                        <div class="form-control w-full">
                            <label for="dateTo" class="label">
                                <span class="label-text">
                                    Hasta:
                                </span>
                            </label>
                            <input
                                type="date"
                                name="dateTo"
                                id="dateTo"
                                value="<?= esc($dateToParam) ?>"
                                class="input input-bordered w-full"
                            >
                        </div>
                        <!-- Fin del campo de filtrado por fecha hasta -->
                    </div>

                    <div class="flex flex-col lg:flex-row lg:items-center justify-end gap-3">
                        <!-- Botón que aplica los filtros -->
                        <input type="submit" value="Aplicar" class="btn btn-primary">

                        <!-- Botón para restaurar los filtros -->
                        <a
                            href="<?= url_to('backend.users.index') ?>"
                            class="btn btn-secondary"
                        >
                            Restaurar
                        </a>
                    </div>
                </div>
            </div>
            <!-- Fin de los filtros de búsqueda y consulta -->
        <?= form_close() ?>
    </div>
    <!-- Fin de Filtros de Consulta -->
    <div class="divider my-0"></div>

    <!-- Tabla de usuarios -->
    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Activo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr class="hover">
                        <td>
                            <?= esc(Time::parse($user['created_at'])->toDateString()) ?>
                        </td>
                        <th>
                            <?= esc($user['name']) ?>
                        </th>
                        <td>
                            <?= esc($user['email']) ?>
                        </td>
                        <td>
                            <?= esc($user['role']) ?>
                        </td>
                        <td>
                            <div class="badge <?= $user['active'] ? 'badge-success' : 'badge-error' ?>">
                                <?= esc($user['active'] ? 'Sí' : 'No') ?>
                            </div>
                        </td>
                        <td>
                            <div class="flex gap-2">
                                <!-- Formulario que alterna el estado de cuenta del usuario -->
                                <?= form_open(url_to('backend.users.toggleActive', $user['id'])) ?>
                                    <label
                                        for="modal-submit-toggleActive-<?= esc($user['id']) ?>"
                                        class="btn btn-square btn-outline btn-sm <?= $user['active'] ? 'btn-success' : 'btn-error' ?>"
                                    >
                                        <i class="text-xl <?= $user['active'] ? 'bi-toggle-on' : 'bi-toggle-off' ?>"></i>
                                    </label>

                                    <?= $this->setData([
                                        'id'      => "modal-submit-toggleActive-{$user['id']}",
                                        'message' => $user['active']
                                            ? 'Desactivar la cuenta este usuario'
                                            : 'Activar la cuenta de este usuario',
                                    ])->include('backend/components/modal-submit') ?>
                                <?= form_close() ?>
                                <!-- Fin del formulario que alterna el estado de cuenta del usuario -->

                                <!-- Botón para editar los datos del usuario -->
                                <a
                                    href="<?= url_to('backend.users.update', $user['id']) ?>"
                                    aria-label="Botón para editar los datos del usuario"
                                    class="btn btn-square btn-outline btn-sm"
                                >
                                    <i class="bi bi-pencil-fill text-xl"></i>
                                </a>
                                <!-- Fin del botón para editar los datos del usuario -->

                                <!-- Formulario para eliminar el usuario -->
                                <?= form_open(url_to('backend.users.delete', $user['id'])) ?>
                                    <label
                                        for="modal-submit-delete-<?= esc($user['id']) ?>"
                                        class="btn btn-square btn-error btn-outline btn-sm"
                                    >
                                        <i class="bi bi-trash text-xl"></i>
                                    </label>

                                    <?= $this->setData([
                                        'id'      => "modal-submit-delete-{$user['id']}",
                                        'message' => '¿Deseas eliminar este usuario?',
                                    ])->include('backend/components/modal-submit') ?>
                                <?= form_close() ?>
                                <!-- Fin del formulario para eliminar el usuario -->
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <!-- Fin de la tabla de usuarios -->

    <!-- Paginación -->
    <div class="flex justify-end pt-4">
            
    </div>
    <!-- Fin de la paginación -->
</div>

    <!-- Paginación -->
    
    <!-- Fin de la paginación -->
<?= $this->endSection() ?>
