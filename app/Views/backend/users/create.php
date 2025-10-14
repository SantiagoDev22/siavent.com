<?= $this->extend('backend/templates/dashboard') ?>

<?= $this->section('head') ?>
    <title>Crear Usuario | Configuraciones</title>
    <meta name="description" content="Ingresa los datos de acceso del nuevo usuario.">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="grid lg:items-center gap-2 sm:mx-10 p-4 rounded-lg">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-y-4">
            <div>
                <h1 class="text-2xl font-bold mb-2">
                    Crear Nuevo Usuario
                </h1>
                <h2 class="text-sm text-gray-500">
                    Registra los campos correctamente y guarda tus cambios.
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

        <!-- Formulario de creación de usuarios -->
        <?= form_open(url_to('backend.users.create')) ?>
            <div class="flex justify-center items-center p-5 pb-10">
                <div class="card w-full sm:w-11/12 md:w-10/12 border-spacing-1 shadow-sm px-4">
                    <div class="card-body">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-700">
                                    Usuario:
                                </label>
                                <input required type="text" name="name" id="name"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Nombre de usuario" value="<?= set_value('name') ?>">
                            </div>

                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-700">
                                    Email:
                                </label>
                                <input required type="email" name="email" id="email"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Correo electrónico" value="<?= set_value('email') ?>">
                            </div>

                            <div>
                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-700">
                                    Teléfono:
                                </label>
                                <input type="text" name="phone" id="phone"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Número de teléfono" value="<?= set_value('phone') ?>">
                            </div>

                            <div>
                                <label for="role" class="block mb-2 text-sm font-medium text-gray-700">
                                    Rol de usuario:
                                </label>
                                <select name="role" id="role" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <?php foreach ($roles as $role): ?>
                                        <option value="<?= esc($role['id']) ?>" <?= set_select('role', $role['id']) ?>>
                                            <?= esc($role['description']) ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-700">
                                    Contraseña:
                                </label>
                                <input required type="password" name="password" id="password"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Contraseña">
                            </div>

                            <div>
                                <label for="pass_confirm" class="block mb-2 text-sm font-medium text-gray-700">
                                    Repetir Contraseña:
                                </label>
                                <input required type="password" name="pass_confirm" id="pass_confirm"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Repetir contraseña">
                            </div>
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
        <!-- Fin del formulario de creación de usuarios -->
    </div>
<?= $this->endSection() ?>