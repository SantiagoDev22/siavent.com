<?= $this->extend('backend/templates/dashboard') ?>

<?= $this->section('head') ?>
    <title>
        <?= esc($prospect['name']) ?> | Modificar
    </title>

    <meta
        name="description"
        content="Modifica o actualiza los datos del prospecto."
    >
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-y-4">
        <div>
            <h1 class="text-2xl font-bold mb-2">
                <?= esc($prospect['name']) ?>
            </h1>

            <h2 class="text-sm">
                Modifica o actualiza los datos del prospecto.
            </h2>
        </div>

        <label for="modal-action" class="btn gap-2">
            <i class="bi bi-arrow-left-circle text-xl"></i>
            Volver
        </label>
    </div>

    <div class="divider"></div>

    <!-- Formulario de modificación del prospecto -->
    <?= form_open(url_to('backend.modules.prospects.update', $prospect['id'])) ?>
        <div class="flex flex-col gap-y-2">
            <!-- Campo del nombre -->
            <div class="form-control">
                <label for="name" class="label">
                    <span class="label-text">
                        Nombre completo:
                    </span>
                </label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    required
                    maxlength="64"
                    placeholder="Escribe su nombre completo"
                    value="<?= esc($prospect['name']) ?>"
                    class="input input-bordered input-primary"
                >
                <label class="label">
                    <span class="label-text-alt text-error">
                        <?= validation_show_error('name') ?>
                    </span>
                </label>
            </div>
            <!-- Fin del campo del nombre -->

            <!-- Campo del teléfono -->
            <div class="form-control">
                <label for="phone" class="label">
                    <span class="label-text">
                        Teléfono:
                    </span>
                </label>
                <input
                    type="tel"
                    name="phone"
                    id="phone"
                    required
                    pattern="[+0-9]{1,15}"
                    maxlength="15"
                    placeholder="Escribe su teléfono"
                    value="<?= esc($prospect['phone']) ?>"
                    class="input input-bordered input-primary"
                >
                <label class="label">
                    <span class="label-text-alt text-error">
                        <?= validation_show_error('phone') ?>
                    </span>
                </label>
            </div>
            <!-- Fin del campo del teléfono -->

            <!-- Campo del email -->
            <div class="form-control">
                <label for="email" class="label">
                    <span class="label-text">
                        Email:
                    </span>
                </label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    required
                    maxlength="256"
                    placeholder="Escribe su email"
                    value="<?= esc($prospect['email']) ?>"
                    class="input input-bordered input-primary"
                >
                <label class="label">
                    <span class="label-text-alt text-error">
                        <?= validation_show_error('email') ?>
                    </span>
                </label>
            </div>
            <!-- Fin del campo del email -->

            <!-- Campo de la empresa -->
            <div class="form-control">
                <label for="enterprise" class="label">
                    <span class="label-text">
                        Empresa:
                    </span>
                </label>
                <input
                    type="text"
                    name="enterprise"
                    id="enterprise"
                    required
                    maxlength="64"
                    placeholder="Escribe su empresa"
                    value="<?= esc($prospect['enterprise']) ?>"
                    class="input input-bordered input-primary"
                >
                <label class="label">
                    <span class="label-text-alt text-error">
                        <?= validation_show_error('enterprise') ?>
                    </span>
                </label>
            </div>
            <!-- Fin del campo de la empresa -->

            <!-- Campo del mensaje -->
            <div class="form-control">
                <label for="message" class="label">
                    <span class="label-text">
                        Mensaje (opcional):
                    </span>
                </label>
                <textarea
                    name="message"
                    id="message"
                    maxlength="4096"
                    rows="4"
                    cols="50"
                    placeholder="Escribe el mensaje del prospecto..."
                    class="textarea textarea-bordered textarea-secondary resize-none h-32"
                ><?= esc($prospect['message']) ?></textarea>
                <label class="label">
                    <span class="label-text-alt text-error">
                        <?= validation_show_error('message') ?>
                    </span>
                </label>
            </div>
            <!-- Fin del campo del mensaje -->

            <!-- Campo de observaciones -->
            <div class="form-control">
                <label for="observations" class="label">
                    <span class="label-text">
                        Observaciones (opcional):
                    </span>
                </label>
                <textarea
                    name="observations"
                    id="observations"
                    maxlength="4096"
                    rows="4"
                    cols="50"
                    placeholder="Escribe una nota para el prospecto..."
                    class="textarea textarea-bordered textarea-secondary resize-none h-32"
                ><?= esc($prospect['observations']) ?></textarea>
                <label class="label">
                    <span class="label-text-alt text-error">
                        <?= validation_show_error('observations') ?>
                    </span>
                </label>
            </div>
            <!-- Fin del campo de observaciones -->

            <div class="flex flex-col lg:flex-row lg:justify-end gap-4">
                <label for="modal-action-submit" class="btn btn-primary">
                    Guardar
                </label>

                <!-- Botón que abre el modal de acción -->
                <label for="modal-action" class="btn btn-secondary">
                    Cancelar
                </label>
            </div>

            <!-- Modal de submit -->
            <?= $this->setData([
                'id'      => 'modal-action-submit',
                'message' => '¿Deseas guardar los cambios?',
            ])->include('backend/layouts/modal-action-submit') ?>
        </div>
    <?= form_close() ?>
    <!-- Fin del formulario de modificación del prospecto -->

    <?= $this->setData([
        'id'      => 'modal-action',
        'method'  => 'backend.modules.prospects.index',
        'message' => '¿Deseas cancelar las modificaciones del prospecto?',
    ])->include('backend/layouts/modal-action') ?>
<?= $this->endSection() ?>
