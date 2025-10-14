<?= $this->extend('backend/templates/dashboard') ?>

<?= $this->section('head') ?>
    <title>Actualizar Landing: <?= esc($landing['name']) ?> | Dashboard</title>
    <meta name="description" content="Actualizar la Landing <?= esc($landing['name']) ?>.">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/trix.css') ?>">

    <meta name="ATTACHMENT-HOST" content="<?= url_to('backend.modules.posts.updloaded') ?>">

    <?= csrf_meta() ?>

    <script src="<?= base_url('js/attachments.js') ?>"></script> <?php // Si lo usas ?>
    <script src="<?= base_url('js/trix.js') ?>"></script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="grid lg:items-center gap-2 sm:mx-10 p-4">
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-y-4">
        <div>
            <h1 class="text-2xl font-bold mb-2">
                Actualizar Landing: <?= esc($landing['name']) ?>
            </h1>
            <h2 class="text-sm">
                Modifica los campos, revisa y guarda los cambios.
            </h2>
        </div>
        <div class="flex gap-x-2">
             <a href="<?= url_to('backend.modules.landing.index') ?>" class="btn btn-outline gap-2">
                <i class="bi bi-arrow-left-circle text-xl"></i>
                Volver
            </a>
        </div>
    </div>

    <div class="divider my-0"></div>

    <div class="overflow-x-auto">
        <div class="flex justify-center items-center pt-5 pb-10">
            <div class="card w-full sm:w-11/12 md:w-10/12 border-spacing-1 shadow-md">
                <?= form_open_multipart(url_to('backend.modules.landing.update', $landing['id'])) ?>
                    <div class="card-body">
                        <small class="text-red-600 text-center"><?= esc(session()->getFlashData('error')) ?></small>
                        <?php if (session()->getFlashdata('errors')) : ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                        <li><?= esc($error) ?></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        <?php endif ?>

                        <!-- Campos Principales de la Landing (igual que en create.php, pero con valores de $landing) -->
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Nombre<small class="text-error">*</small></label>
                                <input oninput="convertUrl()" name="name" id="name"
                                    value="<?= old('name', esc($landing['name'])) ?>" <?php // Usa old() para repoblar en error de validación ?>
                                    type="text" placeholder="Nombre Landing" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"/>
                                <label class="label text-sm"><span class="label-text-alt text-error"><?= validation_show_error('name') ?></span></label>
                            </div>
                            <div>
                                <label for="slug" class="block mb-2 text-sm font-medium text-gray-900">Url<small class="text-error">*</small></label>
                                <input type="text" name="slug" id="slug" value="<?= old('slug', esc($landing['slug'])) ?>"
                                    placeholder="<?= esc(base_url()) ?>" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"/>
                                <label class="label text-sm"><span class="label-text-alt text-error"><?= validation_show_error('slug') ?></span></label>
                            </div>
                            <div>
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Título<small class="text-error">*</small></label>
                                <input type="text" name="title" id="title" value="<?= old('title', esc($landing['title'])) ?>"
                                    placeholder="Escribe un titulo (H1)" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"/>
                                <label class="label text-sm"><span class="label-text-alt text-error"><?= validation_show_error('title') ?></span></label>
                            </div>
                            <div>
                                <label for="subtitle" class="block mb-2 text-sm font-medium text-gray-900">SubTitulo<small class="text-error">*</small></label>
                                <input type="text" name="subtitle" id="subtitle" value="<?= old('subtitle', esc($landing['subtitle'] ?? '')) ?>" <?php // Añade ?? '' por si es null ?>
                                    placeholder="Escribe un subtitulo (H2)" <?php // 'required' puede variar ?>
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"/>
                                <label class="label text-sm"><span class="label-text-alt text-error"><?= validation_show_error('subtitle') ?></span></label>
                            </div>
                        </div>

                        <!-- Campo de imagen Cover -->
                        <div class="col-span-full mb-6">
                            <label for="cover" class="block text-sm font-medium leading-6 text-gray-900">Foto de Portada</label>
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-4">
                                <div class="text-center" data-preview="cover">
                                    <?php $coverImageExists = !empty($landing['cover']); ?>
                                    <img id="image-preview-cover" 
                                        src="<?= $coverImageExists ? base_url($landing['cover']) : '' ?>" 
                                        alt="Image Preview" 
                                        class="<?= $coverImageExists ? '' : 'hidden' ?> !w-64 !h-auto rounded-md mt-4">
                                    
                                    <svg class="mx-auto h-12 w-12 text-gray-300 <?= $coverImageExists ? 'hidden' : '' ?>" 
                                        viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon" id="default-icon-cover">
                                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                                    </svg>
                                    
                                    <button id="remove-image-cover" type="button" 
                                            class="<?= $coverImageExists ? '' : 'hidden' ?> mt-2 bg-red-500 text-white rounded-md btn-sm px-2 py-1">Quitar imagen actual</button>
                                    
                                    <div class="mt-4 flex flex-col text-sm leading-6 text-gray-600 <?= $coverImageExists ? 'hidden' : '' ?>" id="text-alternate-cover">
                                        <label for="cover" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span><?= $coverImageExists ? 'Cambiar imagen' : 'Subir un archivo' ?></span>
                                            <input id="cover" name="cover" type="file" accept="image/*" class="sr-only" onchange="previewImage(event, 'cover');">
                                        </label>
                                        <p class="pl-1">o arrastra y suelta</p>
                                        <p class="text-xs leading-5 text-gray-600">PNG, JPG, hasta 4MB</p>
                                    </div>
                                </div>
                            </div>
                            <label class="label text-sm"><span class="label-text-alt text-error"><?= validation_show_error('cover') ?></span></label>
                        </div>

                        <div class="col-span-full mb-6">
                            <label for="other" class="block mb-2 text-sm font-medium text-gray-900">Título Cintillo</label>
                            <input type="text" name="other" id="other" value="<?= old('other', esc($landing['other'] ?? '')) ?>"
                                placeholder="Escribe un titulo Cintillo"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"/>
                            <label class="label text-sm"><span class="label-text-alt text-error"><?= validation_show_error('other') ?></span></label>
                        </div>
                        <!-- Fin Campos Principales -->

                        <hr class="my-6">
                        <h3 class="text-xl font-semibold mb-4">Secciones de la Landing</h3>

                        <div id="sections-container">
                            <?php $section_idx = 0; ?>
                            <?php if (!empty($sections)): ?>
                                <?php foreach ($sections as $section_item): ?>
                                    <?php
                                    $contentData = json_decode($section_item['content'], true) ?? [];
                                    $current_section_type = $section_item['section_type'];
                                    $current_section_id = $section_item['id'];

                                    // Construir el nombre del archivo de la VISTA PARCIAL de renderizado
                                    $render_view_name = 'render_' . str_replace('-', '_', $current_section_type);
                                    $render_view_path = 'backend/components/landing/' . $render_view_name;
                                    ?>
                                    <div class="section-item grid grid-cols-1" data-index="<?= $section_idx ?>">
                                        <input type="hidden" name="sections[<?= $section_idx ?>][id]" value="<?= esc($current_section_id) ?>">
                                        <input type="hidden" name="sections[<?= $section_idx ?>][type]" value="<?= esc($current_section_type) ?>">
                                        <input type="hidden" name="sections[<?= $section_idx ?>][sort_order]" value="<?= esc($section_item['sort_order'] ?? $section_idx) ?>" class="sort-order-input">

                                        <?php
                                            // Verifica si la vista de renderizado existe antes de incluirla
                                            if (is_file(APPPATH . 'Views/' . $render_view_path . '.php')):
                                                echo $this->setData([
                                                    'section_idx' => $section_idx,
                                                    'contentData' => $contentData,
                                                    // Pasa cualquier otra variable específica que necesite la vista parcial
                                                ])->include($render_view_path);
                                            else:
                                                echo "<p class='text-red-500 p-4'>Error: Vista de renderizado no encontrada para el tipo de sección '{$current_section_type}' ({$render_view_path}.php)</p>";
                                            endif;
                                        ?>
                                    </div>
                                    <?php $section_idx++; ?>
                                <?php endforeach; ?>

                            <?php endif; ?>
                            <!-- Nuevas secciones se añadirán aquí por JS -->
                        </div>

                        <!-- Selector para añadir nuevas secciones -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6 mb-6 p-4 border border-dashed border-gray-300 rounded-lg">
                            <div>
                                <label for="add_section_type" class="block mb-2 text-sm font-medium text-gray-900">Añadir nuevo tipo de sección:</label>
                                <select id="add_section_type" class="select select-bordered select-sm select-primary w-full">
                                    <option value="">-- Seleccionar Tipo --</option>
                                    <option value="parrafo-imagen">Párrafo con Imagen</option>
                                    <option value="bullets-imagen">Lista con Imagen</option>
                                    <option value="carrusel-texto">Carrusel con Texto</option>
                                </select>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-transparent">.</label> <!-- Para alinear -->
                                <button type="button" id="add-section-btn" class="btn btn-secondary btn-outline btn-sm w-full">Añadir Sección</button>
                            </div>
                        </div>
                    
                        <div class="card-actions justify-end p-4 z-20">
                            <button id="btn_submit" type="submit" class="btn btn-primary">
                                <svg id="loading_icon" class="hidden animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Guardar Cambios
                            </button>
                        </div>
                    </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>

    <!-- Plantillas HTML ocultas para JavaScript (igual que en create.php) -->
    <div style="display: none;">
        <?= $this->include('backend/components/landing/template_carrusel_texto') ?>
        <?= $this->include('backend/components/landing/template_bullets_imagen') ?>
        <?= $this->include('backend/components/landing/template_parrafo_imagen') ?>
    </div>
</div>

<script>
    // - Lógica del botón de submit con loading
    // - Lógica de añadir/eliminar/reordenar secciones (addSectionBtn, sectionsContainer listeners, etc.)
    //   IMPORTANTE: El `sectionIndex` inicial en el JS debe ser `<?= $section_idx ?>;`

    function convertUrl() {
        const nameInput = document.getElementById('name').value;
        const urlInput = document.getElementById('slug')
        const clearText = cleanText(nameInput);
        const slug = clearText.trim().toLowerCase().replace(/[^\w\s-]/g, '').replace(/\s+/g, '-');
        urlInput.value = slug;
    }

    function cleanText(texto) {
        return texto.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    }

    // accion submit
    document.addEventListener('DOMContentLoaded', function() {
        const submitButton = document.querySelector('#btn_submit');
        if (submitButton) { // Verificar si el botón existe
            const loadingIcon = document.querySelector('#loading_icon');
            const form = submitButton.closest('form');

            submitButton.addEventListener('click', function(event) {
                event.preventDefault();
                submitButton.disabled = true;
                submitButton.classList.add('cursor-wait');
                if (loadingIcon) loadingIcon.classList.remove('hidden');

                setTimeout(function() {
                    if (form) form.submit();
                }, 1000);
            });
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        const sectionsContainer = document.getElementById('sections-container');
        const addSectionBtn = document.getElementById('add-section-btn');
        const sectionTypeSelect = document.getElementById('add_section_type');
        
        // INICIALIZAR sectionIndex CON EL NÚMERO DE SECCIONES YA RENDERIZADAS POR PHP
        let sectionIndex = <?= $section_idx ?>; 

        function updateSortOrderInputs() { /* ... (igual que en create.php) ... */ 
            const items = sectionsContainer.querySelectorAll('.section-item');
            items.forEach((item, idx) => {
                const sortInput = item.querySelector('.sort-order-input');
                if (sortInput) {
                    sortInput.value = idx;
                }
                item.dataset.index = idx; // Actualizar data-index
                // Re-indexar los names de los inputs (MÁS COMPLEJO, omitido por brevedad, pero importante para consistencia si se reordena mucho)
                // La forma más simple es que el backend procese el orden tal como llega
            });
        }
        
        // Lógica para añadir/eliminar bullets (createBulletListItem, addBulletToSection)
        // Y el event listener para .btn-add-bullet-to-section y .remove-bullet-item-btn
        // ... (igual que en el script combinado anterior) ...
        // ----- INICIO LÓGICA PARA BULLETS DENTRO DE SECCIONES (copiado de la respuesta anterior) -----
        function createBulletListItem(currentSectionIndex, bulletIndex) { // Cambiado nombre de parámetro
            const newLi = document.createElement('li');
            newLi.classList.add('bullet-item');
            newLi.id = `section-${currentSectionIndex}-bullet-${bulletIndex}`;

            newLi.innerHTML = `
                <article class="flex items-center gap-x-3 w-full">
                    <label for="section-${currentSectionIndex}-bullet_description-${bulletIndex}" class="w-full">
                        <input type="text" 
                            id="section-${currentSectionIndex}-bullet_description-${bulletIndex}" 
                            name="sections[${currentSectionIndex}][content][bullets][]" 
                            maxlength="4194304" 
                            placeholder="Descripción del bullet" 
                            class="input input-primary input-sm input-bordered w-full">
                    </label>
                    <button type="button" 
                            aria-label="Botón para eliminar el bullet ${bulletIndex}" 
                            data-bullet-id="${newLi.id}" 
                            class="remove-bullet-item-btn hover:brightness-90 pt-2 transition">
                        <i class="ri-delete-bin-5-fill text-error text-2xl"></i>
                    </button>
                </article>
            `;
            return newLi;
        }

        function addBulletToSection(currentSectionIndex) { // Cambiado nombre de parámetro
            const bulletListElement = sectionsContainer.querySelector(`.bullets-list[data-section-index="${currentSectionIndex}"]`);
            if (!bulletListElement) {
                return;
            }
            const existingBulletItems = bulletListElement.querySelectorAll('.bullet-item');
            let nextBulletIdNum = 1;
            if (existingBulletItems.length > 0) {
                const lastBullet = existingBulletItems[existingBulletItems.length - 1];
                const parts = lastBullet.id.split('-');
                if (parts.length > 2) {
                    nextBulletIdNum = parseInt(parts[parts.length - 1]) + 1;
                } else { // Si el ID no tiene el formato esperado, solo cuenta
                    nextBulletIdNum = existingBulletItems.length + 1;
                }
            }
            const newBulletElement = createBulletListItem(currentSectionIndex, nextBulletIdNum);
            bulletListElement.appendChild(newBulletElement);
        }
        // ----- FIN LÓGICA PARA BULLETS DENTRO DE SECCIONES -----

        if (addSectionBtn) { // Verificar si el botón existe
            addSectionBtn.addEventListener('click', function () {
                const type = sectionTypeSelect.value;
                if (!type) {
                    alert('Por favor, selecciona un tipo de sección.');
                    return;
                }
                const templateName = 'template-' + type.replace(/_/g, '-'); // ej. template-parrafo-imagen
                const template = document.getElementById(templateName);
                
                if (!template) {
                    alert(`Plantilla '${templateName}' para '${type}' no encontrada.`);
                    return;
                }

                const clone = template.content.cloneNode(true);
                
                // Asegurarse de que el clonado sea el .section-item
                let newSectionDiv;
                if (clone.firstElementChild && clone.firstElementChild.classList.contains('section-item')) {
                    newSectionDiv = clone.firstElementChild;
                } else {
                    // Si el template no tiene un único .section-item como hijo directo de <template>
                    // busca el primer .section-item dentro del contenido clonado.
                    newSectionDiv = clone.querySelector('.section-item');
                }

                if (!newSectionDiv) {
                    alert('La plantilla clonada no contiene un .section-item.');
                    return;
                }
                
                // Actualizar __INDEX__ y ___INDEX___ en el HTML clonado
                let newHtml = newSectionDiv.outerHTML
                                .replace(/__INDEX__/g, sectionIndex)
                                .replace(/___INDEX___/g, sectionIndex); // Para IDs de inputs/labels
                
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = newHtml;
                const finalSectionElement = tempDiv.firstChild;

                sectionsContainer.appendChild(finalSectionElement);
                
                // Aquí podrías necesitar inicializar Trix para los nuevos editores si es necesario
                // Ejemplo: if (type === 'parrafo-imagen') { /* Código para inicializar Trix en finalSectionElement */ }

                // Si la sección es 'bullets_imagen', añadir funcionalidad para sus bullets
                // Asegúrate que el type en el select y en el template sean consistentes (ej. 'bullets-imagen' vs 'bullets_imagen')
                if (type === 'bullets-imagen') { // Usar el value del select
                    const addBulletButtonSpecific = finalSectionElement.querySelector(`.btn-add-bullet-to-section[data-section-index="${sectionIndex}"]`);
                    if (addBulletButtonSpecific) {
                         // No añadir un bullet inicial aquí para las nuevas secciones en "update", 
                         // el usuario lo hará si lo necesita. O sí, depende del UX deseado.
                    }
                }
                
                sectionIndex++;
                updateSortOrderInputs();
            });
        }

        if (sectionsContainer) { // Verificar si el contenedor existe
            sectionsContainer.addEventListener('click', function (e) {
                const target = e.target;

                const removeSectionButton = target.closest('.remove-section');
                if (removeSectionButton) {
                    const sectionItemToRemove = removeSectionButton.closest('.section-item');
                    if (sectionItemToRemove) {
                        sectionItemToRemove.remove();
                        updateSortOrderInputs();
                    }
                    return;
                }

                const removeBulletButton = target.closest('.remove-bullet-item-btn');
                if (removeBulletButton) {
                    const bulletItemToRemove = removeBulletButton.closest('.bullet-item');
                    if (bulletItemToRemove) {
                        bulletItemToRemove.remove();
                    }
                    return;
                }
                
                const addBulletButton = target.closest('.btn-add-bullet-to-section');
                if (addBulletButton) {
                    const currentSectionIndex = addBulletButton.dataset.sectionIndex;
                    if (currentSectionIndex !== undefined) {
                        addBulletToSection(currentSectionIndex);
                    }
                    return;
                }
            });
        }


        // --- 1) REMOVER cualquier imagen existente (cover y secciones) ---
        document.body.addEventListener('click', (e) => {
            // Botones con clase remove-single-image-btn (secciones) y con id remove-image-cover (cover)
            const btn = e.target.closest('.remove-single-image-btn, #remove-image-cover');
            if (!btn) return;

            // Determinamos el contenedor: si es cover, va a buscar data-preview="cover"; si es sección, .section-item
            const coverWrapper = btn.closest('[data-preview="cover"]');
            const sectionItem  = btn.closest('.section-item');
            if (coverWrapper) {
                // --- COVER ---
                const previewImg    = coverWrapper.querySelector('img');
                const defaultIcon   = coverWrapper.querySelector('svg');
                const textAlternate = coverWrapper.querySelector('#text-alternate-cover');
                const inputFile     = coverWrapper.querySelector('input[type="file"]');
                // Ocultar preview
                if (previewImg)    previewImg.classList.add('hidden');
                if (defaultIcon)   defaultIcon.classList.remove('hidden');
                if (textAlternate) textAlternate.classList.remove('hidden');
                // Reset file
                if (inputFile)     inputFile.value = '';
                // Ocultar botón
                btn.classList.add('hidden');
                // Flag para backend
                let flag = coverWrapper.querySelector('input[name="cover_remove"]');
                if (!flag) {
                    flag = document.createElement('input');
                    flag.type = 'hidden';
                    flag.name = 'cover_remove';
                    coverWrapper.appendChild(flag);
                }
                flag.value = '1';
            }else if (sectionItem) {
                // --- SECCIÓN ---
                const previewContainer = sectionItem.querySelector(btn.dataset.previewContainer);
                const defaultTextEl    = sectionItem.querySelector(btn.dataset.defaultTextSelector);
                const inputFile        = sectionItem.querySelector('.single-image-upload');
                const hiddenExisting   = sectionItem.querySelector('input[name$="[existing_image_url]"]');

                // Oculta preview
                if (previewContainer) {
                    previewContainer.style.opacity = '0';
                    setTimeout(() => {
                    previewContainer.style.display = 'none';
                    previewContainer.innerHTML = '';
                    }, 200);
                }
                // Muestra texto por defecto
                if (defaultTextEl) defaultTextEl.style.display = 'block';
                // Reset file
                if (inputFile)     inputFile.value = '';
                // Oculta botón
                btn.classList.add('hidden');
                // Flag para backend
                if (hiddenExisting) {
                    let flag = sectionItem.querySelector(`input[name="${inputFile.name}_remove"]`);
                    if (!flag) {
                    flag = document.createElement('input');
                    flag.type = 'hidden';
                    flag.name = `${inputFile.name}_remove`;
                    sectionItem.appendChild(flag);
                    }
                    flag.value = '1';
                }
            }
        });


        // --- 2) PREVISUALIZAR en cuanto cambie cualquier input[type=file].single-image-upload ---
        document.body.addEventListener('change', (e) => {
            const input = e.target;
            if (!input.matches('input.single-image-upload, input#cover')) return;

            // Si es cover:
            if (input.id === 'cover') {
                const wrapper       = document.querySelector('[data-preview="cover"]');
                const previewImg    = wrapper.querySelector('img');
                const defaultIcon   = wrapper.querySelector('svg');
                const textAlternate = wrapper.querySelector('#text-alternate-cover');
                const removeBtn     = wrapper.querySelector('#remove-image-cover');

                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = (ev) => {
                    previewImg.src = ev.target.result;
                    previewImg.classList.remove('hidden');
                    defaultIcon.classList.add('hidden');
                    textAlternate.classList.add('hidden');
                    removeBtn.classList.remove('hidden');
                    };
                    reader.readAsDataURL(input.files[0]);

                    // Si habían flags de eliminación, los quitamos
                    const oldFlag = wrapper.querySelector('input[name="cover_remove"]');
                    if (oldFlag) oldFlag.remove();
                }
                return;
            }

            // Si es sección:
            const sectionItem = input.closest('.section-item');
            if (!sectionItem) return;

            const previewContainer = sectionItem.querySelector(input.dataset.previewContainer);
            const defaultTextEl    = sectionItem.querySelector(input.dataset.defaultTextSelector);
            let removeBtn          = previewContainer.querySelector('.remove-single-image-btn');

            // Limpiar cualquier preview anterior
            previewContainer.innerHTML = '';
            previewContainer.style.display = 'block';
            previewContainer.style.opacity = '0';

            // Leer y mostrar nueva imagen
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (ev) => {
                    const img = document.createElement('img');
                    img.src = ev.target.result;
                    img.style.maxWidth = '200px';
                    img.style.maxHeight = '200px';
                    img.classList.add('!w-64', '!h-auto', 'rounded-md', 'mt-4', 'mx-auto');
                    previewContainer.appendChild(img);

                    // Volver visible con transición
                    setTimeout(() => { previewContainer.style.opacity = '1'; }, 50);

                    // Mostrar botón de quitar (si no existe, crearlo)
                    if (!removeBtn) {
                    removeBtn = document.createElement('button');
                    removeBtn.type = 'button';
                    removeBtn.className = 'remove-single-image-btn mt-2 bg-red-500 text-white rounded-md btn-sm px-2 py-1';
                    removeBtn.dataset.previewContainer    = input.dataset.previewContainer;
                    removeBtn.dataset.defaultTextSelector = input.dataset.defaultTextSelector;
                    removeBtn.textContent = 'Quitar imagen actual';
                    previewContainer.appendChild(removeBtn);
                    } else {
                    removeBtn.style.display = 'inline-block';
                    }

                    // Ocultar texto por defecto
                    if (defaultTextEl) defaultTextEl.style.display = 'none';
                };
                reader.readAsDataURL(file);

                // Quitar flag de eliminación si existe
                const existingFlag = sectionItem.querySelector(`input[name="${input.name}_remove"]`);
                if (existingFlag) existingFlag.remove();
            }
        });

        // Inicializar para secciones existentes (ej. botones de eliminar bullet)
        // Esto es importante porque los listeners de arriba se añaden por delegación,
        // pero si tienes algún comportamiento específico que se añade directamente a los elementos
        // al crear bullets, necesitarías ejecutarlo para los bullets ya cargados.
        // La delegación ya debería cubrir los botones de eliminar.

        updateSortOrderInputs(); 
    });

</script>

<?= $this->endSection() ?>