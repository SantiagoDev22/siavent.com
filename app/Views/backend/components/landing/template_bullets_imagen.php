<template id="template-bullets-imagen">
    <div class="section-item grid grid-cols-1" data-index="__INDEX__">
        <div class="divider">Sección Bullets con Imagen</div>
        <div class="flex justify-end items-end flex-col">
            <input type="hidden" name="sections[__INDEX__][type]" value="bullets_imagen">
            <input type="hidden" name="sections[__INDEX__][sort_order]" value="__INDEX__" class="sort-order-input">
            <button type="button" class="btn-square btn-error btn-outline rounded-md">
                <i class="remove-section ri-delete-bin-line text-lg p-3"></i>
            </button>
        </div>

        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <!-- Columna Izquierda: Título y Bullets -->
            <div>
                <div class="mb-4">
                    <label for="sections___INDEX___content_title" class="block mb-2 text-sm font-medium text-gray-900">Título de la Sección<small class="text-error">*</small></label>
                    <input type="text" name="sections[__INDEX__][content][title]" id="sections___INDEX___content_title"
                        placeholder="Escribe un título para esta sección" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    <label class="label text-sm"><span class="label-text-alt text-error"><!-- Placeholder para error de validación --></span></label>
                </div>

                <section class="bullets-section-container">
                    <p class="text-sm mb-2">Bullets: </p>
                    <ul class="bullets-list grid gap-y-2" data-section-index="__INDEX__">
                        <!-- Los items de bullet se añadirán aquí por JS o al repoblar -->
                        <!-- Ejemplo de un item (para referencia, JS lo generará) -->
                    </ul>

                    <button class="btn-add-bullet-to-section mt-4" type="button" data-section-index="__INDEX__">
                        <p class="flex items-center gap-x-1">
                            <i class="ri-add-circle-fill text-success text-2xl hover:brightness-90 transition"></i>
                            <span class="text-sm">
                                Agregar bullet
                            </span>
                        </p>
                    </button>
                </section>
            </div>

            <!-- Columna Derecha: Imagen -->
            <div class="col-span-full md:col-span-1"> <?php // Ajusta col-span si es necesario ?>
                <label for="sections___INDEX___files_section_image_input" class="block text-sm font-medium leading-6 text-gray-900">Imagen de la Sección</label>
                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-4" id="drop-area-bullets-img-___INDEX___">
                    <!-- Contenedor para la previsualización y el botón de eliminar -->
                    <div class="image-preview-container-single text-center" id="preview-container-bullets-img-___INDEX___" style="display: none; opacity: 0;">
                        <img id="image-preview-img-bullets-___INDEX___" src="" alt="Image Preview" class="!w-64 !h-auto rounded-md mt-4 mx-auto">
                        <button type="button" 
                                class="remove-single-image-btn mt-2 bg-red-500 text-white rounded-md btn-sm px-2 py-1"
                                data-input-id="#sections___INDEX___files_section_image_input"
                                data-preview-container="#preview-container-bullets-img-___INDEX___"
                                data-default-text-selector="#default-text-bullets-img-___INDEX___">
                            Remove
                        </button>
                    </div>
                    <!-- Texto y SVG por defecto -->
                    <div class="text-center default-text-bullets-img" id="default-text-bullets-img-___INDEX___">
                        <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                        </svg>
                        <div class="mt-4 flex flex-col text-sm leading-6 text-gray-600">
                            <label for="sections___INDEX___files_section_image_input" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                <span>Upload a file</span>
                            </label>
                            <p class="pl-1">or drag and drop</p>
                            <p class="text-xs leading-5 text-gray-600">PNG, JPG, up to 1MB</p>
                        </div>
                    </div>
                    <input id="sections___INDEX___files_section_image_input" 
                           name="sections[__INDEX__][files][section_image]" 
                           type="file" 
                           accept="image/*" 
                           class="file-input file-input-bordered file-input-secondary w-full absolute bottom-0 left-0 opacity-0 cursor-pointer single-image-upload"
                           data-preview-container="#preview-container-bullets-img-___INDEX___"
                           data-default-text-selector="#default-text-bullets-img-___INDEX___"
                           style="padding: 57px 0px;">
                </div>
                <label class="label hidden">
                    <span class="label-text-alt text-error"></span>
                </label>
            </div>
        </div>
        <hr class="my-4">
    </div>
</template>