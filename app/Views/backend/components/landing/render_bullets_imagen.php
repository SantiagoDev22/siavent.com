<div class="divider">Sección Bullets con Imagen</div>
<div class="flex justify-end items-end flex-col">
    <?php /* Los inputs hidden de id, type, sort_order ya se renderizan en update.php ANTES de este include */ ?>
    <button type="button" class="remove-section btn-square btn-error btn-outline rounded-md">
        <i class="ri-delete-bin-line text-lg p-3"></i> <?php // La clase remove-section debe estar en el <button> ?>
    </button>
</div>

<div class="grid gap-6 mb-6 md:grid-cols-2">
    <!-- Columna Izquierda: Título y Bullets -->
    <div>
        <div class="mb-4">
            <label for="sections_<?= esc($section_idx) ?>_content_title_bullets"
                class="block mb-2 text-sm font-medium text-gray-900">Título de la Sección<small
                    class="text-error">*</small></label>
            <input type="text" name="sections[<?= esc($section_idx) ?>][content][title]"
                id="sections_<?= esc($section_idx) ?>_content_title_bullets"
                value="<?= old("sections.{$section_idx}.content.title", esc($contentData['title'] ?? '')) ?>"
                placeholder="Escribe un título para esta sección" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
            <label class="label text-sm"><span
                    class="label-text-alt text-error"><?= validation_show_error("sections.{$section_idx}.content.title") ?></span></label>
        </div>

        <section class="bullets-section-container">
            <p class="text-sm mb-2">Bullets: </p>
            <ul class="bullets-list grid gap-y-2" data-section-index="<?= esc($section_idx) ?>">
                <?php $bullet_item_render_idx = 0; ?>
                <?php if (!empty($contentData['bullets']) && is_array($contentData['bullets'])): ?>
                <?php foreach($contentData['bullets'] as $bullet_text): ?>
                <li class="bullet-item" id="section-<?= esc($section_idx) ?>-bullet-<?= $bullet_item_render_idx ?>">
                    <article class="flex items-center gap-x-3 w-full">
                        <label for="section-<?= esc($section_idx) ?>-bullet_description-<?= $bullet_item_render_idx ?>"
                            class="w-full">
                            <input type="text"
                                id="section-<?= esc($section_idx) ?>-bullet_description-<?= $bullet_item_render_idx ?>"
                                name="sections[<?= esc($section_idx) ?>][content][bullets][]"
                                value="<?= esc($bullet_text) ?>" placeholder="Descripción del bullet"
                                class="input input-primary input-sm input-bordered w-full">
                        </label>
                        <button type="button"
                            aria-label="Botón para eliminar el bullet <?= $bullet_item_render_idx + 1 ?>"
                            data-bullet-id="section-<?= esc($section_idx) ?>-bullet-<?= $bullet_item_render_idx ?>"
                            class="remove-bullet-item-btn hover:brightness-90 pt-2 transition">
                            <i class="ri-delete-bin-5-fill text-error text-2xl"></i>
                        </button>
                    </article>
                </li>
                <?php $bullet_item_render_idx++; ?>
                <?php endforeach; ?>
                <?php endif; ?>
            </ul>
            <button class="btn-add-bullet-to-section mt-4" type="button" data-section-index="<?= esc($section_idx) ?>">
                <p class="flex items-center gap-x-1">
                    <i class="ri-add-circle-fill text-success text-2xl hover:brightness-90 transition"></i>
                    <span class="text-sm">Agregar bullet</span>
                </p>
            </button>
        </section>
    </div>

    <!-- Columna Derecha: Imagen -->
    <div class="col-span-full md:col-span-1">
        <label for="sections_<?= esc($section_idx) ?>_files_section_image_input_bullets"
            class="block text-sm font-medium leading-6 text-gray-900">Imagen de la Sección</label>
        <?php $imageUrl_bullets = $contentData['image_url'] ?? ($contentData['section_image'] ?? null); ?>
        <input type="hidden" name="sections[<?= esc($section_idx) ?>][content][existing_image_url]"
            value="<?= esc($imageUrl_bullets) ?>">

        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-4"
            id="drop-area-bullets-img-<?= esc($section_idx) ?>">
            <div class="image-preview-container-single text-center"
                id="preview-container-bullets-img-<?= esc($section_idx) ?>"
                style="<?= $imageUrl_bullets ? 'display: block; opacity: 1;' : 'display: none; opacity: 0;' ?>">
                <?php if ($imageUrl_bullets): ?>
                <img id="image-preview-img-bullets-<?= esc($section_idx) ?>"
                    src="<?= base_url(esc($imageUrl_bullets)) ?>" alt="Imagen Actual"
                    class="!w-64 !h-auto rounded-md mt-4 mx-auto">
                <button type="button"
                    class="remove-single-image-btn mt-2 bg-red-500 text-white rounded-md btn-sm px-2 py-1"
                    data-input-id="#sections_<?= esc($section_idx) ?>_files_section_image_input_bullets"
                    data-preview-container="#preview-container-bullets-img-<?= esc($section_idx) ?>"
                    data-default-text-selector="#default-text-bullets-img-<?= esc($section_idx) ?>">
                    Quitar imagen actual
                </button>
                <?php endif; ?>
            </div>
            <div class="text-center default-text-bullets-img" id="default-text-bullets-img-<?= esc($section_idx) ?>"
                style="<?= $imageUrl_bullets ? 'display: none;' : '' ?>">
                <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                        clip-rule="evenodd" />
                </svg>
                <div class="mt-4 flex flex-col text-sm leading-6 text-gray-600">
                    <label for="sections_<?= esc($section_idx) ?>_files_section_image_input_bullets"
                        class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                        <span><?= $imageUrl_bullets ? 'Cambiar imagen' : 'Subir un archivo' ?></span>
                    </label>
                    <p class="pl-1">o arrastra y suelta</p>
                    <p class="text-xs leading-5 text-gray-600">PNG, JPG, hasta 1MB</p>
                </div>
            </div>
            <input id="sections_<?= esc($section_idx) ?>_files_section_image_input_bullets"
                name="sections[<?= esc($section_idx) ?>][files][section_image]" type="file" accept="image/*"
                class="file-input file-input-bordered file-input-secondary w-full absolute bottom-0 left-0 opacity-0 cursor-pointer single-image-upload"
                data-preview-container="#preview-container-bullets-img-<?= esc($section_idx) ?>"
                data-default-text-selector="#default-text-bullets-img-<?= esc($section_idx) ?>"
                style="padding: 57px 0px;">
        </div>
        <label class="label text-sm"><span class="label-text-alt text-error"><?= validation_show_error("sections.{$section_idx}.files.section_image") ?></span></label>
    </div>
</div>
<hr class="my-4">