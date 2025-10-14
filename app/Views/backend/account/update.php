<?= $this->extend('backend/templates/dashboard') ?>

<?= $this->section('head') ?>
    <title><?= esc($user['name']) ?> | Mis Datos</title>
    <meta name="description" content="Modificar mi información.">

<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="grid lg:items-center gap-2 sm:mx-10 p-4">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-y-4">
            <div>
                <h1 class="text-2xl font-bold  mb-2">
                    Mis Datos: <?= esc($user['name']) ?>
                </h1>
                <h2 class="text-sm">
                    Modificar mi información.
                </h2>
            </div>

            <!-- Botón de retroceso -->
            <label for="modal-confirm" class="btn gap-2">
            <i class="bi bi-arrow-left-circle text-xl"></i>
                Volver
            </label>
            <!-- Fin del botón de retroceso -->
        </div>

        <div class="divider my-0"></div>

        <!-- Formulario de modificación de usuarios -->
        <?= form_open(url_to('backend.account.update', $user['id'])) ?>
            <div class="flex justify-center items-center pt-5 pb-10">
                <div class="card w-full sm:w-11/12 md:w-10/12 border-spacing-1 shadow-md">
                    <div class="card-body">
                        <div class="form-control">
                            <div class="input-group">
                                <a aria-label="nombre-usuario" class="justify-start btn w-4/12">
                                    <label for="name">Usuario:</label>
                                </a>
                                <input type="text" name="name" value="<?= esc($user['name']) ?>" class="w-full input input-bordered input-primary">
                            </div>
                        </div>
                        <div class="form-control">
                            <div class="input-group">
                                <a aria-label="nombre prospecto" class="justify-start btn w-4/12">
                                    <label for="email">Email:</label>
                                </a>
                                <input type="text" name="email" value="<?= esc($user['email']) ?>" class="w-full input input-bordered input-primary">
                            </div>
                        </div>
                        <div class="form-control">
                            <div class="input-group">
                                <a aria-label="phone" class="justify-start btn w-4/12">
                                    <label for="phone">Teléfono:</label>
                                </a>
                                <input type="text" name="phone" value="<?= esc($user['phone']) ?>" class="w-full input input-bordered input-primary">
                            </div>
                        </div>
                        <div><label for="contraseña" class="label text-sm"><small>Cambiar Contraseña</small></label></div>
                        <div class="form-control">
                            <div class="input-group">
                                <a aria-label="password" class="justify-start btn w-4/12">
                                    <label for="password">Contraseña:</label>
                                </a>
                                <input type="password" placeholder="*****" name="password" value="" class="w-full input input-primary">
                            </div>
                        </div>
                        <div class="form-control">
                            <div class="input-group">
                                <a aria-label="pass_confirm" class="justify-start btn w-4/12">
                                    <label for="pass_confirm">Repetir Contraseña:</label>
                                </a>
                                <input type="password" placeholder="*****" name="pass_confirm" value="" class="w-full input input-primary">
                            </div>
                        </div>
                    </div>
                    <!-- Botones de confirmación -->
                    <div class="card-actions justify-end p-4">
                        <!-- Save User -->
                        <label for="modal-submit" class="btn btn-primary">
                            Guardar
                        </label>
                    </div>
                    <!-- Fin de los botones de confirmación -->
                </div>
            </div>


            <!-- Modal de submit -->
            <?= $this->setData([
                'id'      => 'modal-submit',
                'message' => '¿Deseas guardar los cambios?',
            ])->include('backend/components/modal-submit') ?>
            <!-- Fin del modal de submit -->
        <?= form_close() ?>
        <!-- Fin del formulario de modificación de usuarios -->
    </div>

    <!-- Modal de confirmación -->
    <?= $this->setData([
        'id'        => 'modal-confirm',
        'routeName' => 'backend.dashboard.index',
        'message'   => '¿Deseas cancelar las modificaciones?',
    ])->include('backend/components/modal-confirm') ?>
    <!-- Fin del modal de confirmación -->
<?= $this->endSection() ?>
