<template id="template-parrafo-imagen">
    <div class="section-item grid grid-cols-1" data-index="__INDEX__">
        <div class="divider">Sección Párrafo con Imagen</div>
        <div class="flex justify-end items-end flex-col">
            <input type="hidden" name="sections[__INDEX__][type]" value="parrafo_imagen">
            <input type="hidden" name="sections[__INDEX__][sort_order]" value="__INDEX__" class="sort-order-input">
            <button type="button" class="btn-square btn-error btn-outline rounded-md">
                <i class="remove-section ri-delete-bin-line text-lg p-3"></i>
            </button>
        </div>
        <div class="w-auto mb-4">
            <label for="sections___INDEX___content_title" class="block mb-2 text-sm font-medium text-gray-900">Título de la Sección<small class="text-error">*</small></label>
            <input type="text" name="sections[__INDEX__][content][title]" id="sections___INDEX___content_title"
                placeholder="Escribe un título para esta sección" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            <label class="label text-sm"><span class="label-text-alt text-error"><!-- Error para sections[__INDEX__][content][title] --></span></label>
        </div>
        <!-- Columna Izquierda: Título y Párrafo (Trix Editor) -->
        <div class="w-auto">
            <label for="sections___INDEX___content_paragraph_editor" class="label">
                <span class="label-text">
                    Párrafo del Contenido:
                </span>
            </label>
            <!-- El input hidden es donde Trix guardará el contenido HTML -->
            <input type="hidden" name="sections[__INDEX__][content][paragraph_content]" id="sections___INDEX___content_paragraph_hidden_input" required maxlength="4194304">
            <!-- El editor Trix se vincula al input hidden por el atributo 'input' -->
            <trix-editor input="sections___INDEX___content_paragraph_hidden_input" 
                            id="sections___INDEX___content_paragraph_editor"
                            placeholder="Escribe el contenido del párrafo aquí..." 
                            class="trix-content bg-white border border-gray-300 rounded-lg p-2.5 min-h-[150px]"></trix-editor>
            <label class="label">
                <span class="label-text-alt text-error"><!-- Error para sections[__INDEX__][content][paragraph_content] --></span>
            </label>
        </div>
        <!-- Columna Derecha: Imagen -->
        <div class="mb-6">
            <label for="sections___INDEX___files_section_image" class="label">
                <span>Imagen de la Sección: </span>
                <br>
                <span class="text-xs text-red-600">*Selecciona 1 Imagen (.jpg, .png, .webp)</span>
            </label>
            <div class="flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-4" id="drop-area-parrafo-img-__INDEX__">
                <div class="image-preview-container-single" id="preview-container-parrafo-img-__INDEX__" style="display: none; opacity: 0;">
                    <!-- Vista previa de la imagen única -->
                </div>
                <p class="text-center text-gray-400 py-6 font-bold text-sm default-text-parrafo-img-__INDEX__">Arrastra una imagen aquí o
                    <label for="sections___INDEX___files_section_image_parrafo" class="text-blue-500 underline cursor-pointer">haz clic para seleccionarla</label>.
                </p>
                <input type="file" name="sections[__INDEX__][files][section_image]" id="sections___INDEX___files_section_image_parrafo" accept="image/*"
                    class="file-input file-input-bordered file-input-secondary w-full absolute bottom-0 left-0 opacity-0 cursor-pointer single-image-upload"
                    data-preview-container="#preview-container-parrafo-img-__INDEX__"
                    data-default-text-selector=".default-text-parrafo-img-__INDEX__"
                    style="padding: 57px 0px;">
                <label class="label hidden">
                    <span class="label-text-alt text-error"><!-- Error para sections[__INDEX__][files][section_image] --></span>
                </label>
            </div>
        </div>
        <hr class="my-4">
    </div>
</template>