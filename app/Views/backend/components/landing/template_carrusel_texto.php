<template id="template-carrusel-texto">
    <div class="section-item grid" data-index="__INDEX__">
        <div class="divider">Sección Carrusel con Texto</div>
        <!-- Campos para el carrusel (ejemplo: múltiples imágenes) -->
        <div class="flex justify-end flex-row">
            <input type="hidden" name="sections[__INDEX__][type]" value="carrusel_texto"> <!-- CAMBIA EL VALUE AL TIPO CORRECTO -->
            <input type="hidden" name="sections[__INDEX__][sort_order]" value="__INDEX__" class="sort-order-input">
            <button type="button" class="btn-square btn-error btn-outline rounded-md">
                <i class="remove-section ri-delete-bin-line text-lg p-3"></i>
            </button>
        </div>
        <div class="carousel-images-container">
            <div class="carousel-images-section-container">
                <div class="">
                    <label for="sections___INDEX___carousel_files_input" class="label">
                        <span>Imágenes del Carrusel: </span>
                        <br>
                        <span class="text-xs text-red-400">*Selecciona hasta 10 imágenes (.jpg, .png, .webp)</span>
                    </label>
                    <div class="mt-2 flex flex-col items-center rounded-lg border border-dashed border-gray-700/25 px-6 py-4" id="drop-area-carousel-___INDEX___">
                        <div class="carousel-previews-container flex gap-4 justify-center flex-wrap mb-4 w-full" 
                            id="carousel-preview-container-___INDEX___" 
                            style="display: none; opacity: 0;">
                        </div>
                        <p class="default-text-carousel text-center text-gray-400 py-6 font-bold text-sm" id="default-text-carousel-___INDEX___">
                            Arrastra imágenes aquí o 
                            <label for="sections___INDEX___carousel_files_input" class="text-blue-500 underline cursor-pointer">haz clic para seleccionarlas</label>.
                        </p>
                        <input type="file" 
                            name="sections[__INDEX__][files][carousel_images][]"  <?php // Nota el [] extra para el array de archivos ?>
                            id="sections___INDEX___carousel_files_input" 
                            accept="image/*" 
                            multiple
                            class="carousel-image-upload file-input file-input-bordered file-input-secondary w-full absolute bottom-0 left-0 opacity-0 cursor-pointer"
                            data-preview-container="#carousel-preview-container-___INDEX___"
                            data-default-text-selector="#default-text-carousel-___INDEX___"
                            style="padding: 57px 0px;"
                            onchange="handleCarouselImages(event)"> <?php // Cambiamos a una función más específica ?>
                    </div>
                    <label class="label hidden">
                        <span class="label-text-alt text-error"><?= validation_show_error('sections[__INDEX__][files][carousel_images][]') // Ajustar para errores de array ?></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="grid gap-6 mb-6 md:grid-cols-2 py-4">
            <div>
                <label for="sections___INDEX___content_main_title" class="block mb-2 text-sm font-medium text-gray-700">Título<small class="text-error">*</small></label>
                <input type="text" name="sections[__INDEX__][content][main_title]" id="sections___INDEX___content_main_title" value=""
                    placeholder="Escribe un titulo" required
                    class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <label class="label text-sm"><span class="label-text-alt text-error"><?= validation_show_error('title') ?></span></label>
            </div>
            <div>
                <label for="sections___INDEX___content_second_title" class="block mb-2 text-sm font-medium text-gray-700">SubTitulo<small class="text-error">*</small></label>
                <input type="text" name="sections[__INDEX__][content][subtitle]" id="sections___INDEX___content_subtitle" value="<?= set_value('sections[$index][content][subtitle]') ?>"
                    placeholder="Escribe un subtitulo (H2)" required
                    class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <label class="label text-sm"><span class="label-text-alt text-error"><?= validation_show_error('subtitle') ?></span></label>
            </div>
        </div>
        <hr class="my-4">
    </div>
</template>

<script>
    function handleCarouselImages(event) {
        const inputElement = event.target;
        const files = inputElement.files;

        const previewContainerSelector = inputElement.dataset.previewContainer;
        const defaultTextSelector = inputElement.dataset.defaultTextSelector;

        // Encontrar el contexto (el .section-item padre)
        const sectionItem = inputElement.closest('.section-item');
        if (!sectionItem) {
            console.error("Error: No se encontró el '.section-item' padre para el input del carrusel.");
            return;
        }

        const previewContainer = sectionItem.querySelector(previewContainerSelector);
        const defaultTextElement = sectionItem.querySelector(defaultTextSelector);

        if (!previewContainer || !defaultTextElement) {
            console.error("Error: No se encontraron los contenedores de previsualización o texto por defecto.");
            return;
        }

        // Limpiar previsualizaciones anteriores CADA VEZ que cambie la selección
        previewContainer.innerHTML = '';

        if (files.length > 0) {
            previewContainer.style.display = 'flex'; // O el display que uses (flex, grid)
            // Animación de opacidad
            setTimeout(() => { previewContainer.style.opacity = '1'; }, 50);
            defaultTextElement.style.display = 'none';

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        // Crear contenedor para cada imagen y su botón de eliminar (opcional)
                        const singlePreviewWrapper = document.createElement('div');
                        singlePreviewWrapper.className = 'relative group w-24 h-24 border border-gray-300 rounded-md overflow-hidden'; // Ajusta tamaño y estilo

                        const imgElement = document.createElement('img');
                        imgElement.src = e.target.result;
                        imgElement.alt = file.name;
                        imgElement.className = 'object-cover w-full h-full';

                        singlePreviewWrapper.appendChild(imgElement);

                        // OPCIONAL: Añadir un botón para "eliminar" esta previsualización específica
                        // Esto es más complejo porque necesitarías re-sincronizar el input 'files'
                        // o manejar la eliminación solo en el frontend y que el backend reciba todos
                        // los archivos seleccionados originalmente.
                        // Por simplicidad, este ejemplo no implementa la eliminación individual de previews
                        // de un campo 'multiple'. Si el usuario quiere cambiar, vuelve a seleccionar todos los deseados.

                        /*
                        const removeBtn = document.createElement('button');
                        removeBtn.type = 'button';
                        removeBtn.innerHTML = '×'; // O un ícono
                        removeBtn.className = 'absolute top-1 right-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition-opacity';
                        removeBtn.onclick = function() {
                            // Lógica para eliminar esta imagen del FileList del input (complejo)
                            // O simplemente quitar la preview del DOM.
                            singlePreviewWrapper.remove();
                            // Si quitas del DOM, debes considerar si el input todavía envía este archivo.
                            // La forma más simple es que el usuario vuelva a seleccionar si quiere quitar uno.
                        };
                        singlePreviewWrapper.appendChild(removeBtn);
                        */

                        previewContainer.appendChild(singlePreviewWrapper);
                    }
                    reader.readAsDataURL(file);
                }
            }
        } else {
            // No hay archivos seleccionados
            previewContainer.style.display = 'none';
            previewContainer.style.opacity = '0';
            defaultTextElement.style.display = 'block'; // O el display original
        }
    }

</script>