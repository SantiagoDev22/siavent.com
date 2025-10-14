<div class="divider">Sección Párrafo con Imagen</div>
<div class="flex justify-end items-end flex-col">
    <button type="button" class="remove-section btn-square btn-error btn-outline rounded-md">
        <i class="ri-delete-bin-line text-lg p-3"></i>
    </button>
</div>

<div class="w-auto mb-4">
    <label for="sections_<?= esc($section_idx) ?>_content_title_parrafo"
        class="block mb-2 text-sm font-medium text-gray-900">Título de la Sección<small class="text-error">*</small></label>
    <input type="text" name="sections[<?= esc($section_idx) ?>][content][title]"
        id="sections_<?= esc($section_idx) ?>_content_title_parrafo"
        value="<?= old("sections.{$section_idx}.content.title", esc($contentData['title'] ?? '')) ?>"
        placeholder="Escribe un título para esta sección" required
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
    <label class="label text-sm"><span class="label-text-alt text-error"><?= validation_show_error("sections.{$section_idx}.content.title") ?></span></label>
</div>

<div class="w-auto">
    <label for="sections_<?= esc($section_idx) ?>_content_paragraph_editor" class="label">
        <span class="label-text">Párrafo del Contenido:</span>
    </label>
    <input type="hidden" name="sections[<?= esc($section_idx) ?>][content][paragraph_content]"
        id="sections_<?= esc($section_idx) ?>_content_paragraph_hidden_input"
        value="<?= old("sections.{$section_idx}.content.paragraph_content", esc($contentData['paragraph_content'] ?? '')) ?>"
        required maxlength="4194304">
    <trix-editor input="sections_<?= esc($section_idx) ?>_content_paragraph_hidden_input"
        id="sections_<?= esc($section_idx) ?>_content_paragraph_editor"
        placeholder="Escribe el contenido del párrafo aquí..."
        class="trix-content bg-white border border-gray-300 rounded-lg p-2.5 min-h-[150px]"></trix-editor>
    <label class="label">
        <span
            class="label-text-alt text-error"><?= validation_show_error("sections.{$section_idx}.content.paragraph_content") ?></span>
    </label>
</div>

<div class="mb-6 mt-6"> <?php // Añadí un mt-6 para separar del Trix editor ?>
    <label for="sections_<?= esc($section_idx) ?>_files_section_image_parrafo_input" class="label">
        <span>Imagen de la Sección: </span>
    </label>
    <?php $imageUrl_parrafo = $contentData['image_url'] ?? ($contentData['section_image'] ?? null); ?>
    <input type="hidden" name="sections[<?= esc($section_idx) ?>][content][existing_image_url]"
        value="<?= esc($imageUrl_parrafo) ?>">

    <div class="flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-4"
        id="drop-area-parrafo-img-<?= esc($section_idx) ?>">
        <div class="image-preview-container-single text-center"
            id="preview-container-parrafo-img-<?= esc($section_idx) ?>"
            style="<?= $imageUrl_parrafo ? 'display: block; opacity: 1;' : 'display: none; opacity: 0;' ?>">
            <?php if ($imageUrl_parrafo): ?>
            <img id="image-preview-img-parrafo-<?= esc($section_idx) ?>" src="<?= base_url(esc($imageUrl_parrafo)) ?>"
                alt="Imagen Actual" class="!w-64 !h-auto rounded-md mt-4 mx-auto">
            <button type="button" class="remove-single-image-btn mt-2 bg-red-500 text-white rounded-md btn-sm px-2 py-1"
                data-input-id="#sections_<?= esc($section_idx) ?>_files_section_image_parrafo_input"
                data-preview-container="#preview-container-parrafo-img-<?= esc($section_idx) ?>"
                data-default-text-selector="#default-text-parrafo-img-<?= esc($section_idx) ?>">
                Quitar imagen actual
            </button>
            <?php endif; ?>
        </div>
        <div class="text-center default-text-parrafo-img" id="default-text-parrafo-img-<?= esc($section_idx) ?>"
            style="<?= $imageUrl_parrafo ? 'display: none;' : '' ?>">
            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                    clip-rule="evenodd" />
            </svg>
            <div class="mt-4 flex flex-col text-sm leading-6 text-gray-600">
                <label for="sections_<?= esc($section_idx) ?>_files_section_image_parrafo_input"
                    class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                    <span><?= $imageUrl_parrafo ? 'Cambiar imagen' : 'Subir un archivo' ?></span>
                </label>
                <p class="pl-1">o arrastra y suelta</p>
                <p class="text-xs leading-5 text-gray-600">PNG, JPG, hasta 1MB</p>
            </div>
        </div>
        <input type="file" name="sections[<?= esc($section_idx) ?>][files][section_image]"
            id="sections_<?= esc($section_idx) ?>_files_section_image_parrafo_input" accept="image/*"
            class="file-input file-input-bordered file-input-secondary w-full absolute bottom-0 left-0 opacity-0 cursor-pointer single-image-upload"
            data-preview-container="#preview-container-parrafo-img-<?= esc($section_idx) ?>"
            data-default-text-selector="#default-text-parrafo-img-<?= esc($section_idx) ?>" style="padding: 57px 0px;">
    </div>
    <label class="label text-sm"><span
            class="label-text-alt text-error"><?= validation_show_error("sections.{$section_idx}.files.section_image") ?></span></label>
</div>
<hr class="my-4">