<?= $this->extend('backend/templates/dashboard') ?>

<?= $this->section('head') ?>
    <title>Crear Landing | Dashboard</title>
    <meta name="description" content="Crear una nueva Landing.">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/trix.css') ?>">

    <meta name="ATTACHMENT-HOST" content="<?= url_to('backend.modules.posts.updloaded') ?>">

    <?= csrf_meta() ?>

    <script src="<?= base_url('js/attachments.js') ?>"></script>
    <script src="<?= base_url('js/trix.js') ?>"></script>

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="grid lg:items-center gap-2 sm:mx-10 p-4">
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-y-4">
        <div>
            <h1 class="text-2xl font-bold  mb-2">
                Crear una Landing
            </h1>

            <h2 class="text-sm">
                Completa campos requeridos, revisa y guarda cambios. ¡Listo!
            </h2>
        </div>
        <a href="<?= url_to('backend.modules.landing.index') ?>" class="btn gap-2">
            <i class="bi bi-arrow-left-circle text-xl"></i>
            Volver
        </a>
    </div>

    <div class="divider my-0"></div>

    <!-- contenedor de landing  -->
    <div class="overflow-x-auto">
        <div class="flex justify-center items-center pt-5 pb-10">
            <div class="card w-full sm:w-11/12 md:w-10/12 border-spacing-1 shadow-md">
                <?= form_open_multipart(url_to('backend.modules.landing.create')) ?>
                <div class="card-body">
                    <!-- Primera Seccion -->
                    <small class="text-red-600 text-center"><?= esc(session()->getFlashData('error')) ?></small>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Nombre<small class="text-error">*</small></label>
                            <input oninput="convertUrl()" name="name" id="name"
                                value="<?= set_value('name') ?>"
                                type="text" placeholder="Nombre Landing" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            <label class="label text-sm"><span class="label-text-alt text-error"><?= validation_show_error('name') ?></span></label>
                        </div>
                        <div>
                            <label for="slug" class="block mb-2 text-sm font-medium text-gray-900">Url<small class="text-error">*</small></label>
                            <input type="text" name="slug" id="slug" value="<?= set_value('slug') ?>"
                                placeholder="<?= esc(base_url()) ?>" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            <label class="label text-sm"><span class="label-text-alt text-error"><?= validation_show_error('slug') ?></span></label>
                        </div>
                        <div>
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Título<small class="text-error">*</small></label>
                            <input type="text" name="title" id="title" value="<?= set_value('title') ?>"
                                placeholder="Escribe un titulo (H1)" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            <label class="label text-sm"><span class="label-text-alt text-error"><?= validation_show_error('title') ?></span></label>
                        </div>
                        <div>
                            <label for="subtitle" class="block mb-2 text-sm font-medium text-gray-900">SubTitulo<small class="text-error">*</small></label>
                            <input type="text" name="subtitle" id="subtitle" value="<?= set_value('subtitle') ?>"
                                placeholder="Escribe un subtitulo (H2)" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            <label class="label text-sm"><span class="label-text-alt text-error"><?= validation_show_error('subtitle') ?></span></label>
                        </div>
                    </div>
                    <!-- Campo de imagen Cover -->
                    <div class="col-span-full">
                        <label for="cover" class="block text-sm font-medium leading-6 text-gray-900">Foto de Portada</label>
                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-4">
                            <div class="text-center" data-preview="cover">
                                <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true"
                                    data-slot="icon" id="default-icon-cover">
                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                                </svg>
                                <img id="image-preview-cover" src="" alt="Image Preview" class="hidden !w-64 !h-auto rounded-md mt-4">
                                <button id="remove-image-cover" type="button" class="hidden mt-2 bg-red-500 text-white rounded-md btn-sm px-2 py-1">Remove</button>
                                <div class="mt-4 flex flex-col text-sm leading-6 text-gray-600" id="text-alternate-cover">
                                    <label for="cover" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="cover" name="cover" required type="file" accept="image/*" class="sr-only" onchange="previewImage(event, 'cover');">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                    <p class="text-xs leading-5 text-gray-600">PNG, JPG, up to 1MB</p>
                                </div>
                            </div>
                        </div>
                        <label class="label text-sm"><span class="label-text-alt text-error"><?= validation_show_error('cover') ?></span></label>
                    </div>
                    
                    <div class="divider">Sección Dos</div>
                    <div class="col-span-full">
                        <label for="other" class="block mb-2 text-sm font-medium text-gray-900">Título Cintillo<small class="text-error">*</small></label>
                        <input type="text" name="other" id="other" value="<?= set_value('other') ?>"
                            placeholder="Escribe un titulo Cintillo" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        <label class="label text-sm"><span class="label-text-alt text-error"><?= validation_show_error('other') ?></span></label>
                    </div>
                        <!-- Fin Campo de imagen cover -->
                    <!-- Fin Primera Seccion -->
                    <div id="sections-container">
                        <!-- contenido dinamico -->
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
                        <!-- <input type="submit" value="ENVIAR"> -->
                        <button id="btn_submit" type="submit" class="btn btn-primary">
                            <svg id="loading_icon" class="hidden animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Guardar
                        </button>
                    </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <!-- Fin de contenedor landing -->
    <div>
        <?= $this->include('backend/components/landing/template_carrusel_texto') ?>
        <?= $this->include('backend/components/landing/template_bullets_imagen') ?>
        <?= $this->include('backend/components/landing/template_parrafo_imagen') ?>
    </div>
</div>

<script>
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

    function previewImage(event, inputId) {
        const file = event.target.files[0];
        const container = document.querySelector(`[data-preview="${inputId}"]`);
        const imagePreview = container.querySelector('img');
        const defaultIcon = container.querySelector('svg');
        const removeButton = container.querySelector('button');
        const textPreview = container.querySelector('div[id^="text-alternate"]');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.classList.remove('hidden');
                defaultIcon.classList.add('hidden');
                textPreview.classList.add('hidden');
                removeButton.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    }

    document.querySelectorAll('button[id^="remove-image"]').forEach(button => {
        button.addEventListener('click', function() {
            const container = button.closest('[data-preview]');
            const imagePreview = container.querySelector('img');
            const defaultIcon = container.querySelector('svg');
            const textPreview = container.querySelector('div[id^="text-alternate"]');
            const inputFile = container.querySelector('input[type="file"]');

            imagePreview.classList.add('hidden');
            defaultIcon.classList.remove('hidden');
            textPreview.classList.remove('hidden');
            button.classList.add('hidden');
            inputFile.value = ''; // Clear the input value
        });
    });


    // btn submit
    document.addEventListener('DOMContentLoaded', function() {
        const submitButton = document.querySelector('#btn_submit');
        const loadingIcon = document.querySelector('#loading_icon');

        // Realiza las funciones cuando el usuario presiona al botón
        submitButton.addEventListener('click', function(event) {
            event.preventDefault();
            submitButton.disabled = true;
            submitButton.classList.add('cursor-wait'); //Agrega un cursor de espera al presionar el boton
            loadingIcon.classList.remove('hidden');

            // Simula un retraso antes de enviar el formulario
            setTimeout(function() {
                document.querySelector('form').submit();
            }, 1000);

        });
    });

    // add seccions
    document.addEventListener('DOMContentLoaded', function () {
        const sectionsContainer = document.getElementById('sections-container');
        const addSectionBtn = document.getElementById('add-section-btn');
        const sectionTypeSelect = document.getElementById('add_section_type');
        let sectionIndex = sectionsContainer.querySelectorAll('.section-item').length; // Contar secciones existentes (útil para repoblar)

        function updateSortOrderInputs() {
            const items = sectionsContainer.querySelectorAll('.section-item');
            items.forEach((item, idx) => {
                const sortInput = item.querySelector('.sort-order-input');
                if (sortInput) {
                    sortInput.value = idx;
                }
                // También podrías querer actualizar el data-index si lo usas para algo más
                item.dataset.index = idx; 
                // Y los name attributes de los inputs dentro de esta sección si los cambiaste de __INDEX__
                // Esto es más complejo y requiere recorrer todos los inputs
            });
        }

        addSectionBtn.addEventListener('click', function () {
            const type = sectionTypeSelect.value;
            if (!type) {
                alert('Por favor, selecciona un tipo de sección.');
                return;
            }

            const template = document.getElementById(`template-${type}`);
            if (!template) {
                alert(`Plantilla para '${type}' no encontrada.`);
                return;
            }

            const clone = template.content.cloneNode(true);
            const newSectionDiv = clone.querySelector('.section-item'); // Asumiendo que el template tiene un div principal
            
            // Actualizar __INDEX__ en el HTML clonado
            let newHtml = newSectionDiv.outerHTML.replace(/__INDEX__/g, sectionIndex);
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = newHtml;
            const finalSectionElement = tempDiv.firstChild;

            sectionsContainer.appendChild(finalSectionElement);
            
            sectionIndex++;
            updateSortOrderInputs(); // Actualizar orden después de añadir
        });

        sectionsContainer.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-section')) {
                e.target.closest('.section-item').remove();
                updateSortOrderInputs(); // Actualizar orden después de eliminar
            }
        });
        
        // Para inicializar si hay 'old' data:
        // (El repoblado inicial lo hace PHP, esto es para que los botones de las secciones repobladas funcionen)
        updateSortOrderInputs(); 
    });

    // add bullets
    document.addEventListener('DOMContentLoaded', function () {

        const sectionsContainer = document.getElementById('sections-container');

        function createBulletListItem(sectionIndex, bulletIndex) {
            const newLi = document.createElement('li');
            newLi.classList.add('bullet-item');
            // ID único para el LI, combinando el índice de la sección y el del bullet
            newLi.id = `section-${sectionIndex}-bullet-${bulletIndex}`;

            newLi.innerHTML = `
                <article class="flex items-center gap-x-3 w-full">
                    <label for="section-${sectionIndex}-bullet_description-${bulletIndex}" class="w-full">
                        <input type="text" 
                            id="section-${sectionIndex}-bullet_description-${bulletIndex}" 
                            name="sections[${sectionIndex}][content][bullets][]" 
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

        function addBulletToSection(sectionIndex) {
            const bulletListElement = sectionsContainer.querySelector(`.bullets-list[data-section-index="${sectionIndex}"]`);
            if (!bulletListElement) {
                console.error(`No se encontró la lista de bullets para la sección ${sectionIndex}`);
                return;
            }

            const existingBulletItems = bulletListElement.querySelectorAll('.bullet-item');
            let nextBulletIdNum = 1;
            if (existingBulletItems.length > 0) {
                // Obtener el ID numérico más alto de los bullets existentes en ESTA sección
                const lastBullet = existingBulletItems[existingBulletItems.length - 1];
                const parts = lastBullet.id.split('-');
                if (parts.length > 2) { // Esperamos algo como section-INDEX-bullet-NUMBER
                    nextBulletIdNum = parseInt(parts[parts.length - 1]) + 1;
                }
            }
            
            const newBulletElement = createBulletListItem(sectionIndex, nextBulletIdNum);
            bulletListElement.appendChild(newBulletElement);
        }

        // Event listener para añadir bullets (usando delegación de eventos)
        sectionsContainer.addEventListener('click', function(event) {
            const target = event.target;

            // Botón para añadir un nuevo bullet a una sección específica
            if (target.closest('.btn-add-bullet-to-section')) {
                event.preventDefault();
                const button = target.closest('.btn-add-bullet-to-section');
                const sectionIndex = button.dataset.sectionIndex;
                if (sectionIndex !== undefined) {
                    addBulletToSection(sectionIndex);
                }
            }

            // Botón para eliminar un bullet específico
            if (target.closest('.remove-bullet-item-btn')) {
                event.preventDefault();
                const button = target.closest('.remove-bullet-item-btn');
                const bulletIdToRemove = button.dataset.bulletId;
                if (bulletIdToRemove) {
                    const bulletElementToRemove = document.getElementById(bulletIdToRemove);
                    if (bulletElementToRemove) {
                        bulletElementToRemove.remove();
                    }
                }
            }
        });

        sectionsContainer.addEventListener('change', function(event) {
            const inputElement = event.target;
            if (inputElement.matches('.single-image-upload') && inputElement.files && inputElement.files[0]) {
                const previewContainerSelector = inputElement.dataset.previewContainer;
                const defaultTextSelector = inputElement.dataset.defaultTextSelector;
                
                const sectionItem = inputElement.closest('.section-item'); // Encuentra el section-item padre
                if (!sectionItem) return;

                const previewContainer = sectionItem.querySelector(previewContainerSelector);
                const defaultTextElement = sectionItem.querySelector(defaultTextSelector);

                if (previewContainer) {
                    previewContainer.innerHTML = ''; // Limpiar previsualización anterior
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.maxWidth = '200px'; // O el tamaño que desees
                        img.style.maxHeight = '200px';
                        previewContainer.appendChild(img);
                        previewContainer.style.display = 'block';
                        previewContainer.style.opacity = '1';
                        const removeButton = previewContainer.querySelector('.remove-single-image-btn');
                        if (removeButton) removeButton.style.display = 'inline-block';
                    }
                    reader.readAsDataURL(inputElement.files[0]);
                }
                if (defaultTextElement) {
                    defaultTextElement.style.display = 'none';
                }
            } else if (inputElement.matches('.single-image-upload')) { // Si se deselecciona el archivo
                const previewContainerSelector = inputElement.dataset.previewContainer;
                const defaultTextSelector = inputElement.dataset.defaultTextSelector;

                const sectionItem = inputElement.closest('.section-item');
                if (!sectionItem) return;

                const previewContainer = sectionItem.querySelector(previewContainerSelector);
                const defaultTextElement = sectionItem.querySelector(defaultTextSelector);

                if (previewContainer) {
                    previewContainer.innerHTML = '';
                    previewContainer.style.display = 'none';
                    previewContainer.style.opacity = '0';
                }
                if (defaultTextElement) {
                    defaultTextElement.style.display = 'block'; // O 'flex' o lo que sea el original
                }
            }
        });

        });
</script>

<?= $this->endSection() ?>