<!-- Modal de confirmación de formularios -->
<input type="checkbox" id="<?= esc($id) ?>" class="modal-toggle">

<label for="<?= esc($id) ?>" class="modal cursor-pointer modal-bottom lg:modal-middle">
    <label class="modal-box relative">
        <!-- Botón que cierra el modal -->
        <label for="<?= esc($id) ?>" class="btn btn-sm btn-circle absolute right-2 top-2">
            x
        </label>

        <h3 class="font-bold text-lg">
            ¡Confirma tu acción!
        </h3>

        <p class="py-4 text-center">
            <?= $message ?>
        </p>

        <!-- Botones de acción -->
        <div class="modal-action">
            <!-- Boton de cancelar -->
            <label for="<?= esc($id) ?>" class="btn btn-secondary">
                Cancelar
            </label>

            <!-- Botón de submit -->
            <input type="submit" value="Confirmar" class="btn btn-primary">
        </div>
        <!-- Fin de los botones de acción -->
    </label>
</label>
<!-- Fin del modal de confirmación de formularios -->
