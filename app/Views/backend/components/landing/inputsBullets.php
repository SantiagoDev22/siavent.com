<section class="">
    <p class="text-sm mb-2">Bullets: </p>
    <ul class="icons__list grid gap-y-2">
        <?php

        $icons = isset($landing['sec_bullets']) ? explode('|', $landing['sec_bullets']) : [];

        ?>
        <?php if (empty($icons)) : ?>
            <!-- Icon item -->
            <li class="icon__item" id="icon-1">
                <!-- Render this dynamic in edit render -->
                <article class="flex items-center gap-x-3 w-full">
                    <label for="icon__description-1" class="w-full">
                        <input type="text" id="icon__description-1" name="icon_description[]" maxlength="4194304" placeholder="Descripción" class="input input-primary input-sm input-bordered w-full">
                    </label>
                    <!-- Btn to remove -->
                    <button type="button" aria-label="Botón para eliminar el ícono 1" data-icon="icon-1" class="hover:brightness-90 pt-2 transition">
                        <i class="ri-delete-bin-5-fill text-error text-2xl"></i>
                    </button>
                </article>
                <!-- End Render this dynamic in edit render -->
            </li>

        <?php else : ?>
            <?php foreach ($icons as $itr => $icon) : ?>
                <!-- Icon item -->
                <li class="icon__item" id="icon-<?= esc($itr) ?>">
                    <!-- Render this dynamic in edit render -->
                    <article class="flex items-center gap-x-3">
                        <label for="icon__description-<?= esc($itr) ?>" class="w-full">
                            <input type="text" id="icon__description-<?= esc($itr) ?>" name="icon_description[]" maxlength="4194304" value="<?= isset($icons[$itr]) ? esc($icons[$itr]) : '' ?>" placeholder="Descripción" class="input input-primary input-sm input-bordered w-full">
                        </label>
                        <!-- Btn to remove -->
                        <button type="button" aria-label="Botón para eliminar el ícono <?= esc($itr) ?>" data-icon="icon-<?= esc($itr) ?>" class="hover:brightness-90 transition">
                            <i class="ri-delete-bin-5-fill text-error text-2xl"></i>
                        </button>
                    </article>
                    <!-- End Render this dynamic in edit render -->
                </li>
            <?php endforeach ?>
        <?php endif ?>
    </ul>

    <!-- BTN to add -->
    <button class="mt-4" type="button" id="btn-add-icon">
        <p class="flex items-center gap-x-1">
            <i class="ri-add-circle-fill text-success text-2xl hover:brightness-90 transition"></i>
            <span class="text-sm">
                Agregar bullet
            </span>
        </p>
    </button>
</section>

<script type="module">
    const iconsList = document.querySelector('.icons__list')
    const btnAddIcon = document.getElementById('btn-add-icon')
    const btnsIconDelete = iconsList.querySelectorAll('button[data-icon]')

    btnsIconDelete.forEach(btn => btn.addEventListener('click', () => {
        const idIcon = btn.dataset.icon;
        deleteIconInput(idIcon)
    }))

    const createIcon = () => {
        const newIcon = document.createElement('li')
        newIcon.classList.add('icon__item')
        const iconsItems = iconsList.querySelectorAll('.icon__item')

        let lastIdIcon = 0;
        if (iconsItems.length)
            lastIdIcon = Number(iconsItems[iconsItems.length - 1].id.split('-')[1])

        newIcon.id = `icon-${lastIdIcon + 1}`

        newIcon.innerHTML = `
            <article class="flex gap-x-3 w-full">
                <label for="icon__description-${lastIdIcon + 1}" class="w-full">
                    <input
                        type="text"
                        id="icon__description-${lastIdIcon + 1}"
                        name="icon_description[]"
                        maxlength="4194304"
                        placeholder="Descripción"
                        class="input input-primary input-sm input-bordered w-full">
                </label>
                <!-- Btn to remove -->
                <button
                    type="button"
                    aria-label="Botón para eliminar el ícono ${lastIdIcon + 1}"
                    data-icon="icon-${lastIdIcon + 1}"
                    class="hover:brightness-90 transition">
                    <i class="ri-delete-bin-5-fill text-error text-2xl"></i>
                </button>
            </article>
        `;

        const btnToDelete = newIcon.querySelector('button[data-icon]')

        btnToDelete.addEventListener('click', () => {
            const idIcon = btnToDelete.dataset.icon;
            deleteIconInput(idIcon)
        })

        return newIcon;
    }

    function deleteIconInput(idIcon) {
        const iconItemElementToDelete = iconsList.querySelector(`#${idIcon}`)
        iconItemElementToDelete.remove()
    }

    btnAddIcon.addEventListener('click', () => {
        const newIcon = createIcon()
        iconsList.append(newIcon)
    })
</script>