<div class="divider">Sección Carrusel con Texto</div>
<div class="flex justify-end flex-row">
    <button type="button" class="remove-section btn-square btn-error btn-outline rounded-md">
        <i class="ri-delete-bin-line text-lg p-3"></i>
    </button>
</div>

<div class="carousel-images-container">
    <div class="carousel-images-section-container">
        <div class="">
            <label for="sections_<?= esc($section_idx) ?>_carousel_files_input" class="label">
                <span>Imágenes del Carrusel: </span><br>
                <span class="text-xs text-red-400">*Selecciona hasta 10 imágenes (.jpg, .png, .webp)</span>
            </label>

            <?php
            // 'carousel_images' es donde guardamos el array de rutas en el JSON
            // o podrías tener otra clave como 'files' si así lo decidiste en el backend
            $existingCarouselImages = $contentData['carousel_images'] ?? ($contentData['files'] ?? []);
            if (!is_array($existingCarouselImages)) { // Asegurar que sea un array
                $existingCarouselImages = ($existingCarouselImages) ? explode('|', $existingCarouselImages) : [];
            }
            // Guardar las imágenes existentes en un campo hidden para que el backend sepa cuáles son
            // si no se suben nuevas. Esto es una estrategia; otra es solo enviar las nuevas.
            foreach ($existingCarouselImages as $img_path_carousel) {
                echo '<input type="hidden" name="sections['.esc($section_idx).'][content][existing_carousel_images][]" value="'.esc($img_path_carousel).'">';
            }
            ?>

            <div class="mt-2 flex flex-col items-center rounded-lg border border-dashed border-gray-700/25 px-6 py-4"
                id="drop-area-carousel-<?= esc($section_idx) ?>">
                <div class="carousel-previews-container flex gap-4 justify-center flex-wrap mb-4 w-full"
                    id="carousel-preview-container-<?= esc($section_idx) ?>"
                    style="<?= !empty($existingCarouselImages) ? 'display: flex; opacity: 1;' : 'display: none; opacity: 0;' ?>">
                    <?php if (!empty($existingCarouselImages)): ?>
                    <?php foreach ($existingCarouselImages as $imgPath): ?>
                    <div class='relative group w-24 h-24 border border-gray-300 rounded-md overflow-hidden'>
                        <img src="<?= base_url(esc($imgPath)) ?>" alt="Imagen Carrusel"
                            class='object-cover w-full h-full'>
                        <?php /* Botón para eliminar individualmente (requiere más JS y lógica backend) */ ?>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <p class="default-text-carousel text-center text-gray-400 py-6 font-bold text-sm"
                    id="default-text-carousel-<?= esc($section_idx) ?>"
                    style="<?= !empty($existingCarouselImages) ? 'display: none;' : 'display: block;' ?>">
                    Arrastra imágenes aquí o
                    <label for="sections_<?= esc($section_idx) ?>_carousel_files_input"
                        class="text-blue-500 underline cursor-pointer">haz clic para seleccionarlas</label>.
                </p>
                <input type="file" name="sections[<?= esc($section_idx) ?>][files][carousel_images_new][]"
                    <?php // 'carousel_images_new' para distinguir de las existentes ?>
                    id="sections_<?= esc($section_idx) ?>_carousel_files_input" accept="image/*" multiple
                    class="carousel-image-upload file-input file-input-bordered file-input-secondary w-full absolute bottom-0 left-0 opacity-0 cursor-pointer"
                    data-preview-container="#carousel-preview-container-<?= esc($section_idx) ?>"
                    data-default-text-selector="#default-text-carousel-<?= esc($section_idx) ?>"
                    style="padding: 57px 0px;" onchange="handleCarouselImages(event)">
            </div>
            <label class="label text-sm"><span
                    class="label-text-alt text-error"><?= validation_show_error("sections.{$section_idx}.files.carousel_images_new") // Validar las nuevas ?></span></label>
        </div>
    </div>
</div>

<div class="grid gap-6 mb-6 md:grid-cols-2 py-4">
    <div>
        <label for="sections_<?= esc($section_idx) ?>_content_main_title_carousel"
            class="block mb-2 text-sm font-medium text-gray-700">Título<small class="text-error">*</small></label>
        <input type="text" name="sections[<?= esc($section_idx) ?>][content][main_title]"
            id="sections_<?= esc($section_idx) ?>_content_main_title_carousel"
            value="<?= old("sections.{$section_idx}.content.main_title", esc($contentData['main_title'] ?? '')) ?>"
            placeholder="Escribe un titulo" required
            class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
        <label class="label text-sm"><span
                class="label-text-alt text-error"><?= validation_show_error("sections.{$section_idx}.content.main_title") ?></span></label>
    </div>
    <div>
        <label for="sections_<?= esc($section_idx) ?>_content_subtitle_carousel"
            class="block mb-2 text-sm font-medium text-gray-700">Subtítulo<small class="text-error">*</small></label>
        <input type="text" name="sections[<?= esc($section_idx) ?>][content][subtitle]"
            id="sections_<?= esc($section_idx) ?>_content_subtitle_carousel"
            value="<?= old("sections.{$section_idx}.content.subtitle", esc($contentData['subtitle'] ?? '')) ?>"
            placeholder="Escribe un subtitulo (H2)" required
            class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
        <label class="label text-sm"><span
                class="label-text-alt text-error"><?= validation_show_error("sections.{$section_idx}.content.subtitle") ?></span></label>
    </div>
</div>
<hr class="my-4">
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
        setTimeout(() => {
            previewContainer.style.opacity = '1';
        }, 50);
        defaultTextElement.style.display = 'none';

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Crear contenedor para cada imagen y su botón de eliminar (opcional)
                    const singlePreviewWrapper = document.createElement('div');
                    singlePreviewWrapper.className =
                        'relative group w-24 h-24 border border-gray-300 rounded-md overflow-hidden'; // Ajusta tamaño y estilo

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