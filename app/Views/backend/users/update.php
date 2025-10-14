<?= $this->extend('backend/templates/dashboard') ?>

<?= $this->section('head') ?>
    <title><?= esc($user['name']) ?> | Usuarios</title>
    <meta name="description" content="Modifica o actualiza los datos del usuario.">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="grid lg:items-center gap-2 sm:mx-10 p-4 rounded-lg">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-y-4">
            <div>
                <h1 class="text-2xl font-bold mb-2">
                    Datos del Usuario: <?= esc($user['name']) ?>
                </h1>
                <h2 class="text-sm text-gray-500">
                    Modifica o actualiza los datos del usuario.
                </h2>
            </div>

            <!-- Botón de retroceso -->
            <a href="<?= url_to('backend.users.index') ?>" class="btn gap-2">
                <i class="bi bi-arrow-left-circle text-xl"></i>
                Volver
            </a>
            <!-- Fin del botón de retroceso -->
        </div>

        <div class="divider my-0"></div>

        <!-- Formulario de modificación de usuarios -->
        <?= form_open(url_to('backend.users.update', $user['id'])) ?>
            <div class="flex justify-center items-center p-5 pb-10">
                <div class="card w-full sm:w-11/12 md:w-10/12 border-spacing-1 shadow-sm px-4">
                    <div class="card-body">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-700">
                                    Usuario:
                                </label>
                                <input type="text" name="name" id="name" value="<?= esc($user['name']) ?>"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Nombre de usuario">
                                <label class="label">
                                    <span class="label-text-alt text-error">
                                        <?= validation_show_error('name') ?>
                                    </span>
                                </label>
                            </div>

                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-700">
                                    Email:
                                </label>
                                <input type="email" name="email" id="email" value="<?= esc($user['email']) ?>"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Correo electrónico">
                                <label class="label">
                                    <span class="label-text-alt text-error">
                                        <?= validation_show_error('email') ?>
                                    </span>
                                </label>
                            </div>

                            <div>
                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-700">
                                    Teléfono:
                                </label>
                                <input type="text" name="phone" id="phone" value="<?= esc($user['phone']) ?>"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Número de teléfono">
                                <label class="label">
                                    <span class="label-text-alt text-error">
                                        <?= validation_show_error('phone') ?>
                                    </span>
                                </label>
                            </div>

                            <div>
                                <label for="role" class="block mb-2 text-sm font-medium text-gray-700">
                                    Rol de usuario:
                                </label>
                                <select name="role" id="role" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <?php foreach ($roles as $role): ?>
                                        <option value="<?= esc($role['id']) ?>" <?= $user['role_id'] === $role['id'] ? 'selected' : '' ?>>
                                            <?= esc($role['description']) ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-700">
                                    Contraseña:
                                </label>
                                <input type="password" name="password" id="password" placeholder="Nueva contraseña"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <label class="label">
                                    <span class="label-text-alt text-error">
                                        <?= validation_show_error('password') ?>
                                    </span>
                                </label>
                            </div>

                            <div>
                                <label for="pass_confirm" class="block mb-2 text-sm font-medium text-gray-700">
                                    Repetir Contraseña:
                                </label>
                                <input type="password" name="pass_confirm" id="pass_confirm" placeholder="Repetir nueva contraseña"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="card-body">
                        <h2 class="text-xl font-semibold mb-1">Módulos</h2>
                        <p class="text-gray-600 mb-4 text-sm">Selecciona los módulos a los que se le otorgará permisos a este usuario.</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <?php foreach ($modules as $module) : ?>
                                <?php $isChecked = false; ?>
                                <?php foreach ($permissions as $permission) : ?>
                                    <?php if ($permission['module_id'] === $module['id']) : ?>
                                        <?php $isChecked = true; ?>
                                        <?php break; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <div class="flex items-center">
                                    <input type="checkbox" name="modules[]" value="<?= $module['id'] ?>" id="modules_<?= $module['id'] ?>"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        <?= $isChecked ? 'checked' : '' ?>>
                                    <label for="modules_<?= $module['id'] ?>" class="ml-2 text-sm font-medium text-gray-900">
                                        <?= esc($module['name']) ?>
                                    </label>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>

                    <!-- Botones de confirmación -->
                    <div class="card-actions justify-end p-4">
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                    </div>
                    <!-- Fin de los botones de confirmación -->
                </div>
            </div>
        <?= form_close() ?>
        <!-- Fin del formulario de modificación de usuarios -->
    </div>
<?= $this->endSection() ?>