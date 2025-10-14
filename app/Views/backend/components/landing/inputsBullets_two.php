<section class="icon-section">
    <p class="text-sm mb-2">Amenidades: </p>
    <ul class="icons__list grid gap-y-2">
        <?php

        $icons = isset($landing['sec_bullets_two']) ? explode('|', $landing['sec_bullets_two']) : [];
        ?>
        <?php if (empty($icons)) : ?>
            <!-- Icon item -->
            <li class="icon__item" id="icon-1">
                <article class="flex items-center gap-x-3 w-full">
                    <label for="bullet__description-1" class="w-full">
                        <input type="text" id="bullet__description-1" name="bullets[]" maxlength="4194304" placeholder="Descripción" class="input input-sm input-secondary input-bordered w-full">
                    </label>
                    <button type="button" aria-label="Botón para eliminar el ícono 1" data-icon="icon-1" class="hover:brightness-90 pt-2 transition">
                        <i class="ri-delete-bin-5-fill text-error text-2xl"></i>
                    </button>
                </article>
            </li>
        <?php else : ?>
            <?php foreach ($icons as $itr => $icon) : ?>
                <li class="icon__item" id="icon-<?= esc($itr) ?>">
                    <article class="flex items-center gap-x-3">
                        <label for="bullet__description-<?= esc($itr) ?>" class="w-full">
                            <input type="text" id="bullet__description-<?= esc($itr) ?>" name="bullets[]" maxlength="4194304" value="<?= isset($icons[$itr]) ? esc($icons[$itr]) : '' ?>" placeholder="Descripción" class="input input-sm input-secondary input-bordered w-full">
                        </label>
                        <button type="button" aria-label="Botón para eliminar el ícono <?= esc($itr) ?>" data-icon="icon-<?= esc($itr) ?>" class="hover:brightness-90 transition">
                            <i class="ri-delete-bin-5-fill text-error text-2xl"></i>
                        </button>
                    </article>
                </li>
            <?php endforeach ?>
        <?php endif ?>
    </ul>

    <button class="mt-4" type="button" id="btn-add-icon-section">
        <p class="flex items-center gap-x-1">
            <i class="ri-add-circle-fill text-success text-2xl hover:brightness-90 transition"></i>
            <span class="text-sm">Agregar Amenidad</span>
        </p>
    </button>
</section>

<script type="module">
    document.addEventListener('DOMContentLoaded', () => {
        const iconSection = document.querySelector('.icon-section');
        const iconsList = iconSection.querySelector('.icons__list');
        const btnAddIcon = iconSection.querySelector('#btn-add-icon-section');

        // Función para eliminar un icono
        const deleteIconInput = (idIcon) => {
            const iconItemElementToDelete = iconsList.querySelector(`#${idIcon}`);
            iconItemElementToDelete.remove();
        };

        // Función para crear un nuevo icono
        const createIcon = () => {
            const newIcon = document.createElement('li');
            newIcon.classList.add('icon__item');
            const iconsItems = iconsList.querySelectorAll('.icon__item');
            let lastIdIcon = 0;

            if (iconsItems.length) {
                lastIdIcon = Number(iconsItems[iconsItems.length - 1].id.split('-')[1]);
            }

            newIcon.id = `icon-${lastIdIcon + 1}`;

            newIcon.innerHTML = `
                <article class="flex gap-x-3 w-full">
                    <label for="bullet__description-${lastIdIcon + 1}" class="w-full">
                        <input
                            type="text"
                            id="bullet__description-${lastIdIcon + 1}"
                            name="bullets[]"
                            maxlength="4194304"
                            placeholder="Descripción"
                            class="input input-sm input-secondary input-bordered w-full">
                    </label>
                    <button
                        type="button"
                        aria-label="Botón para eliminar el ícono ${lastIdIcon + 1}"
                        data-icon="icon-${lastIdIcon + 1}"
                        class="hover:brightness-90 transition">
                        <i class="ri-delete-bin-5-fill text-error text-2xl"></i>
                    </button>
                </article>
            `;

            const btnToDelete = newIcon.querySelector('button[data-icon]');
            btnToDelete.addEventListener('click', () => {
                const idIcon = btnToDelete.dataset.icon;
                deleteIconInput(idIcon);
            });

            return newIcon;
        };

        // Evento para agregar un nuevo icono
        btnAddIcon.addEventListener('click', () => {
            const newIcon = createIcon();
            iconsList.append(newIcon);
        });

        // Evento para eliminar los iconos existentes
        const btnsIconDelete = iconsList.querySelectorAll('button[data-icon]');
        btnsIconDelete.forEach(btn => btn.addEventListener('click', () => {
            const idIcon = btn.dataset.icon;
            deleteIconInput(idIcon);
        }));
    });
</script>