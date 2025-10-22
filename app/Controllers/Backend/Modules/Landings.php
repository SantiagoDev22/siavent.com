<?php

/**
 * This file is part of CodeIgniter 4 Framework.
 *
 * (c) 2023 Powered by Develogy™ <soporte@develogy.mx>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Controllers\Backend\Modules;

use App\Controllers\BaseController;
use App\Libraries\ImageCompressor;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\I18n\Time;

class Landings extends BaseController
{

    // protected $helpers = ['form', 'url', 'text', 'filesystem']; // 'text' para mb_url_title, 'filesystem' para FCPATH si lo usas directamente

    // Método helper para procesar subida de imágenes
    private function _processImageUpload(\CodeIgniter\HTTP\Files\UploadedFile $file, string $subfolder = 'landings'): ?string
    {
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $path = FCPATH . 'images/' . $subfolder . '/'; // Puedes organizar en subcarpetas
            
            // Asegurarse de que el directorio existe
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            $imageName = $file->getRandomName();
            $file->move($path, $imageName);

            // Compresión de imagen (si la usas)
            $compress = ImageCompressor::getInstance();
            $compress->run($path . $imageName);

            return 'images/' . $subfolder . '/' . $imageName; // Guarda la ruta relativa
        }
        return null;
    }


    /**
     * Renderiza la vista de todos los prospectos registrados
     * y realiza búsquedas y consultas de todos los prospectos registrados.
     */
    public function index()
    {
        // Define los campos de filtrado de resultados.
        $filterFields = [
            'title' => 'Nombre',
        ];

        $filterList = implode(',', array_keys($filterFields));

        // Define los campos de ordenamiento de resultados.
        $sortByFields = [
            'created_at' => 'Fecha',
            'title'      => 'Nombre',
        ];

        $sortByList = implode(',', array_keys($sortByFields));

        // Define los modos de ordenamiento de resultados.
        $sortOrderFields = [
            'asc'  => 'Ascendente',
            'desc' => 'Descendente',
        ];

        $sortOrderList = implode(',', array_keys($sortOrderFields));

        // Valida los parámetros de búsqueda y filtrado de resultados.
        if (! $this->validate([
            'q'         => 'if_exist|max_length[256]',
            'filter'    => "permit_empty|string|in_list[{$filterList}]",
            'sortBy'    => "permit_empty|string|in_list[{$sortByList}]",
            'sortOrder' => "permit_empty|string|in_list[{$sortOrderList}]",
            'dateFrom'  => 'permit_empty|valid_date[Y-m-d]',
            'dateTo'    => 'permit_empty|valid_date[Y-m-d]',
        ])) {
            return redirect()
                ->route('backend.modules.landing.index')
                ->withInput();
        }

        // Obtiene el patrón de búsqueda (por defecto: '').
        $queryParam = trimAll($this->request->getGet('q'));

        // Obtiene el campo de filtrado de resultados (por defecto: 'title').
        $filterParam = strtrim($this->request->getGet('filter') ?: 'title');

        // Obtiene el campo de ordenamiento (por defecto: 'created_at').
        $sortByParam = strtrim($this->request->getGet('sortBy') ?: 'created_at');

        // Obtiene el campo del modo de ordenamiento (por defecto: 'desc');
        $sortOrderParam = strtrim($this->request->getGet('sortOrder') ?: 'desc');

        // Obtiene el campo de filtrado de fecha desde (por defecto: '').
        $dateFromParam = strtrim($this->request->getGet('dateFrom'));

        // Obtiene el campo de filtrado de fecha hasta (por defecto: '').
        $dateToParam = strtrim($this->request->getGet('dateTo'));

        $LandingsModel = model('LandingsModel');

        // Selecciona los campos a consultar.
        $builder = $LandingsModel->select('id, slug, name, title, active, created_at');

        // Filtra los resultados por fecha desde.
        if ($dateFromParam) {
            $builder->where('created_at >=', Time::parse($dateFromParam)->toDateTimeString());
        }

        // Filtra los resultados por fecha hasta.
        if ($dateToParam) {
            $builder->where('created_at <', Time::parse('+1 day' . $dateToParam)->toDateTimeString());
        }

        /**
         * Consulta los datos de todas las landing
         * que coinciden con el patrón de búsqueda
         * se agrega paginación.
         */
        $landing = $builder
            ->like($filterParam, $queryParam)
            ->orderBy($sortByParam, $sortOrderParam)
            ->paginate(10, 'landing');

        $path = ['module' => 'Módulo', 'view' => 'Landing', 'action' => ''];

        return view('backend/modules/landings/index', [
            'queryParam'      => $queryParam,
            'filterFields'    => $filterFields,
            'filterParam'     => $filterParam,
            'sortByFields'    => $sortByFields,
            'sortByParam'     => $sortByParam,
            'sortOrderFields' => $sortOrderFields,
            'sortOrderParam'  => $sortOrderParam,
            'dateFromParam'   => $dateFromParam,
            'dateToParam'     => $dateToParam,
            'sessionUser'     => session('user'),
            'landings'        => $landing,
            'path'            => $path,
            'pager'           => $LandingsModel->pager,
        ]);
    }

    /**
     * Renderiza la vista de detalles de una landing
     *
     * @param id|number $id
     */
    public function show($id = null)
    {
        // Validar que exista el id
        if (! $this->validateData(
            ['id' => $id],
            ['id' => 'required|is_not_unique[landings.id]'],
        )) {
            throw PageNotFoundException::forPageNotFound();
        }

        $LandingsModel = model('LandingsModel');
        $landing       = $LandingsModel->find($id);

        $path = ['module' => 'Módulo', 'view' => 'Landing', 'action' => '> Detalle'];

        return view('backend/modules/landings/show', [
            'path'        => $path,
            'landing'     => $landing,
            'sessionUser' => session('user'),
        ]);
    }

    /**
     * Renderiza la vista de crear una nueva landing
     *
     * @method | POST
     */
    public function create()
    {

        $path = ['module' => 'Módulo', 'view' => 'Landing', 'action' => '> Crear'];

        return view('backend/modules/landings/create', [
            'path' => $path,
        ]);
    }

    /**
     * Metodo para guardar la informacion de una landing
     *
     * @method | POST
     *
     * @param id|null
     * @param mixed|null $id
     */
    public function store()
    {
        // 1. Validación de datos principales de la landing
        $landingRules = [
            'slug'     => 'required|min_length[3]|max_length[250]|string|is_unique[landings.slug]',
            'name'     => 'required|min_length[3]|max_length[250]|string',
            'title'    => 'required|max_length[250]|string',
            'subtitle' => 'required|max_length[250]|string',
            'cover'    => 'uploaded[cover]|max_size[cover,5120]|is_image[cover]',
            'other'    => 'permit_empty|string|max_length[256]',
            'phone'    => 'permit_empty|min_length[10]|max_length[10]',
        ];

        // Validación de las secciones (más compleja, se hará en el bucle)
        // Por ahora, validamos que 'sections' sea un array si se envía
        $rules = $landingRules;
        $rules['sections'] = 'permit_empty';


        if (strtolower($this->request->getMethod()) == 'post' && !$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $landingModel = model('LandingsModel');
        $sectionsModel = model('SectionsModel');

        // Preparar datos para la tabla 'landings'
        $slug = mb_url_title(trimAll($this->request->getPost('slug') ?: $this->request->getPost('name')), '-', true);
        
        // Re-validar slug por si se generó automáticamente
        if (!$this->validateData(
            ['slug' => $slug], 
            ['slug' => 'is_unique[landings.slug]']
        )){
            return redirect()->back()->withInput()->with('error', 'La URL generada ya existe. Por favor, elige una diferente.');
        }
        
        $landingData = [
            'slug'     => $slug,
            'name'     => trimAll($this->request->getPost('name')),
            'title'    => trimAll($this->request->getPost('title')),
            'subtitle' => trimAll($this->request->getPost('subtitle')),
            'other'    => trimAll($this->request->getPost('other')),
            'phone'    => trimAll($this->request->getPost('phone')),
            'active'   => true, // O $this->request->getPost('active') si tienes un checkbox
        ];

        // Procesar imagen de portada (cover)
        $coverFile = $this->request->getFile('cover');

        if ($coverFile && $coverFile->isValid()) {
            $landingData['cover'] = $this->_processImageUpload($coverFile, 'landing/covers');
            if ($landingData['cover'] === null) {
                // Manejar error de subida de imagen de portada si es necesario
                return redirect()->back()->withInput()->with('error', 'Hubo un problema al subir la imagen de portada.');
            }
        }

        $landingId = $landingModel->insertAndReturnUUID($landingData);

        // 2. Procesar Secciones
        // El formulario enviará las secciones como un array:
        // sections[0][type] = 'hero'
        // sections[0][content][title] = 'Título del Hero'
        // sections[0][content][image_hero] = (archivo subido)
        // sections[1][type] = 'text_block'
        // sections[1][content][text_content] = 'Este es un bloque de texto.'

        $postedSections = $this->request->getPost('sections'); // Array de secciones del formulario
        $uploadedSectionFiles = $this->request->getFiles(); // Todos los archivos subidos

        $batchSectionsData = [];
        if (!empty($postedSections) && is_array($postedSections)) {
            foreach ($postedSections as $index => $sectionData) {
                $sectionType = $sectionData['type'] ?? 'undefined';
                $content = $sectionData['content'] ?? []; // Contenido textual
                
                // Buscar archivos para esta sección específica
                if (isset($uploadedSectionFiles['sections'][$index]['files'])) {
                    foreach ($uploadedSectionFiles['sections'][$index]['files'] as $fieldName => $fileOrFiles) {
                        
                        if(is_array($fileOrFiles)){

                            $uploadedPaths = [];
                            foreach ($fileOrFiles as $individualFile) {
                                if ($individualFile instanceof \CodeIgniter\HTTP\Files\UploadedFile && $individualFile->isValid() && !$individualFile->hasMoved()) {
                                    $filePath = $this->_processImageUpload($individualFile, 'landing/carousel_assets'); // o 'landing/sections_assets'
                                    if ($filePath) {
                                        $uploadedPaths[] = $filePath;
                                    }
                                }
                            }
                            if (!empty($uploadedPaths)) {
                                // Guardar el array de rutas en el JSON de contenido.
                                // $fieldName aquí sería 'carousel_images'
                                $content[$fieldName] = $uploadedPaths;
                            }
                            
                        }elseif ($fileOrFiles instanceof \CodeIgniter\HTTP\Files\UploadedFile && $fileOrFiles->isValid()) {
                            $filePath = $this->_processImageUpload($fileOrFiles, 'landing/sections_assets');
                            if ($filePath) {
                                $content[$fieldName] = $filePath; // Agrega la ruta del archivo al JSON de contenido
                            }
                        }
                    }
                }
                
                // Para listas de bullets que vienen como arrays
                foreach ($content as $key => $value) {
                    if (is_array($value) && $key === 'bullets') {
                        // Aquí asumo que ya llegan como un array de strings desde el form (usando name="sections[0][content][bullets][]")
                        $content[$key] = array_values(array_filter($value, 'strlen')); // Limpia vacíos y reindexa
                    }
                }


                $batchSectionsData[] = [
                    'landing_id'   => $landingId,
                    'section_type' => $sectionType,
                    'content'      => json_encode($content), // Guardar como JSON
                    'sort_order'   => $sectionData['sort_order'] ?? $index, // Obtener el orden del form
                ];
            }

            
        }
        
        if (!empty($batchSectionsData)) {
            $sectionsModel->insertBatch($batchSectionsData);
        }
        
        return redirect()->route('backend.modules.landing.index')->with('toast-success', 'Se guardó correctamente la Landing');
    }


    /**
     * Renderiza la vista de actualizar informacion de una landing registrada
     *
     * @method | POST
     *
     * @param id|null
     * @param mixed|null $id
     */
    public function update($id = null)
    {
        $landingModel = model('LandingsModel');
        $sectionsModel = model('SectionsModel');

        // 0. Validar que la landing exista
        $landing = $landingModel->find($id);
        if (!$landing) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Lógica para mostrar el formulario (GET request)
        if (strtolower($this->request->getMethod()) !== 'post') {
            $sections = $sectionsModel->where('landing_id', $id)->orderBy('sort_order', 'ASC')->findAll();
            $path = ['module' => 'Módulo', 'view' => 'Landing', 'action' => '> Actualizar'];
            return view('backend/modules/landings/update', [
                'path'     => $path,
                'landing'  => $landing,
                'sections' => $sections,
            ]);
        }

        // Lógica para procesar el formulario (POST request)
        // 1. Validación de datos principales de la landing
        $landingRules = [
            'name'     => 'required|min_length[3]|max_length[250]|string',
            'slug'     => "required|min_length[3]|max_length[250]|string|is_unique[landings.slug,id,{$id}]", // Permite el slug actual
            'title'    => 'required|max_length[250]|string',
            'subtitle' => 'permit_empty|max_length[250]|string', // Permitir vacío si es opcional
            'cover'    => 'permit_empty|uploaded[cover]|max_size[cover,4096]|is_image[cover]',
            'other'    => 'permit_empty|string|max_length[256]',
            'phone'    => 'permit_empty|max_length[20]',
        ];
        // Podrías añadir reglas más específicas para los campos de las secciones si es necesario
        // $rules['sections.*.content.title'] = 'permit_empty|string|max_length[255]';
        // pero se vuelve complejo. A menudo se valida la estructura general y se confía en la sanitización.

        if (!$this->validate($landingRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 2. Preparar datos para actualizar la tabla 'landings'
        $slug = mb_url_title(trimAll($this->request->getPost('slug') ?: $this->request->getPost('name')), '-', true);
        
        // Pequeña re-validación del slug por si se cambió el 'name' y el 'slug' estaba vacío
        if ($slug !== $landing['slug'] && !$this->validateData(['slug' => $slug], ['slug' => "is_unique[landings.slug,id,{$id}]"])) {
             return redirect()->back()->withInput()->with('errors', ['slug' => 'El slug generado ya existe. Por favor, elige uno diferente.']);
        }

        $landingUpdateData = [
            'name'     => trimAll($this->request->getPost('name')),
            'slug'     => $slug,
            'title'    => trimAll($this->request->getPost('title')),
            'subtitle' => trimAll($this->request->getPost('subtitle')),
            'other'    => trimAll($this->request->getPost('other')),
            'phone'    => trimAll($this->request->getPost('phone')),
            // 'active'   => $this->request->getPost('active') ? 1 : 0, // Si tienes un checkbox
        ];

        // Procesar imagen de portada (cover)
        $coverFile = $this->request->getFile('cover');
        $coverRemoveFlag = $this->request->getPost('cover_remove'); // Para el botón "Quitar imagen actual"

        if ($coverRemoveFlag === '1') {
            if ($landing['cover'] && file_exists(FCPATH . $landing['cover'])) {
                unlink(FCPATH . $landing['cover']);
            }
            $landingUpdateData['cover'] = null;
        } elseif ($coverFile && $coverFile->isValid()) {
            $newCoverPath = $this->_processImageUpload($coverFile, 'landing/covers', $landing['cover']);
            if ($newCoverPath === null && $coverFile->getError() !== 4) { // Error 4 es UPLOAD_ERR_NO_FILE
                return redirect()->back()->withInput()->with('error', 'Hubo un problema al subir la nueva imagen de portada.');
            }
            if ($newCoverPath) {
                $landingUpdateData['cover'] = $newCoverPath;
            }
            // Si no se subió un nuevo archivo y no se marcó para quitar, se mantiene la imagen actual (no se añade a $landingUpdateData)
        }

        if (!$landingModel->update($id, $landingUpdateData)) {
             return redirect()->back()->withInput()->with('errors', $landingModel->errors());
        }

        // 3. Procesar Secciones
        $postedSections = $this->request->getPost('sections') ?? [];
        $uploadedSectionFiles = $this->request->getFiles();
        $processedSectionIds = []; // Para rastrear qué secciones se procesaron (y luego eliminar las huérfanas)

        foreach ($postedSections as $index => $sectionData) {
            $sectionId = $sectionData['id'] ?? null; // ID de la sección si existe
            $sectionType = $sectionData['type'] ?? 'undefined';
            $content = $sectionData['content'] ?? [];
            $sortOrder = $sectionData['sort_order'] ?? $index;

            // Obtener la sección existente de la BD si estamos actualizando
            $existingSectionContent = [];
            if ($sectionId) {
                $existingDbSection = $sectionsModel->find($sectionId);
                if ($existingDbSection) {
                    $existingSectionContent = json_decode($existingDbSection['content'], true) ?? [];
                }
            }

            // ---- Procesamiento de Archivos para la sección ----
            if (isset($uploadedSectionFiles['sections'][$index]['files'])) {
                
                foreach ($uploadedSectionFiles['sections'][$index]['files'] as $fieldName => $fileOrFiles) {
                    // `fieldName` aquí es la clave que usaste en el `name` del input, ej: `section_image` o `carousel_images`
                    
                    log_message('debug', 'SectionType: '. print_r($sectionType, true));
                    log_message('info', 'FielName: '. print_r($fieldName, true));
                    log_message('info', 'OLDFile: '. print_r($existingSectionContent['section_image'] ?? 'no existe', true));
                    // Caso 1: Múltiples archivos (ej. carrusel con name="...[carousel_images_new][]")
                    if (is_array($fileOrFiles) && $fieldName === 'carousel_images_new') {
                        $newImagePaths = [];
                        foreach ($fileOrFiles as $individualFile) {
                            if ($individualFile instanceof \CodeIgniter\HTTP\Files\UploadedFile && $individualFile->isValid()) {
                                $filePath = $this->_processImageUpload($individualFile, 'landing/carousel_assets');
                                if ($filePath) {
                                    $newImagePaths[] = $filePath;
                                }
                            }
                        }
                        if (!empty($newImagePaths)) {
                            // Si se subieron nuevas imágenes para el carrusel, reemplazamos las antiguas.
                            // Borrar imágenes antiguas del carrusel:
                            $oldCarouselImages = $existingSectionContent['carousel_images'] ?? [];
                            if (is_string($oldCarouselImages)) $oldCarouselImages = explode('|', $oldCarouselImages); // Compatibilidad con formato antiguo
                            foreach ($oldCarouselImages as $oldImg) {
                                if ($oldImg && file_exists(FCPATH . $oldImg)) {
                                    unlink(FCPATH . $oldImg);
                                }
                            }
                            $content['carousel_images'] = $newImagePaths; // Guardar array de nuevas rutas
                        } else {
                            // No se subieron nuevas, mantener las existentes (si se enviaron por hidden input)
                            $content['carousel_images'] = $sectionData['content']['existing_carousel_images'] ?? ($existingSectionContent['carousel_images'] ?? []);
                        }
                    }elseif ($fieldName === 'section_image') { // Enfocarse en el campo de imagen única
                        
                        $fileForThisField = null;
                        if (isset($uploadedSectionFiles['sections'][$index]['files'][$fieldName])) {
                             $fileForThisField = $uploadedSectionFiles['sections'][$index]['files'][$fieldName];
                        }

                        if ($fileForThisField instanceof \CodeIgniter\HTTP\Files\UploadedFile && $fileForThisField->isValid() && !$fileForThisField->hasMoved()) {
                            // Se subió una nueva imagen válida
                            $newFilePath = $this->_processImageUpload($fileForThisField, 'landing/sections_assets');
                            if (!empty($newFilePath)) {
                                // Eliminar la antigua si existe
                                if (!empty($existingSectionContent['section_image']) && file_exists(FCPATH . $existingSectionContent['section_image'])) {
                                    unlink(FCPATH . $existingSectionContent['section_image']);
                                }
                                $content['section_image'] = $newFilePath;
                            } else {
                                // Falló la subida, mantener la antigua
                                if (isset($existingSectionContent['section_image'])) {
                                    $content['section_image'] = $existingSectionContent['section_image'];
                                } else {
                                    $content['section_image'] = null; // O ''
                                }
                            }
                        } else {
                            if (isset($existingSectionContent['section_image'])) {
                                $content['section_image'] = $existingSectionContent['section_image'];
                            } else {
                                if (isset($content['existing_image_url']) && $content['existing_image_url'] === null && isset($existingSectionContent['section_image'])) {
                                    $content['section_image'] = $existingSectionContent['section_image'];
                                } elseif (!isset($existingSectionContent['section_image'])) {
                                    $content['section_image'] = null; // o ''
                                }
                            }
                        }
                    }
                    // Asegurarse de que 'existing_image_url' no se guarde si ya se procesó la imagen
                    if (isset($content['existing_image_url']) && $fieldName === 'section_image') {
                        unset($content['existing_image_url']);
                    }
                    if (isset($content['existing_carousel_images']) && $fieldName === 'carousel_images_new'){
                        unset($content['existing_carousel_images']);
                    }

                }
            }
            // ---- Limpiar y preparar contenido ----
            if (isset($content['bullets']) && is_array($content['bullets'])) {
                $content['bullets'] = array_values(array_filter($content['bullets'], 'strlen'));
            }

            log_message('info', 'Content: '. print_r($content, true));

            $sectionPayload = [
                'landing_id'   => $id,
                'section_type' => $sectionType,
                'content'      => json_encode($content),
                'sort_order'   => $sortOrder,
            ];

            if ($sectionId) { // Actualizar sección existente
                if ($sectionsModel->update($sectionId, $sectionPayload)) {
                    $processedSectionIds[] = $sectionId;
                }
            } else { // Insertar nueva sección
                $newInsertedId = $sectionsModel->insert($sectionPayload, true); // true para retornar ID
                if ($newInsertedId) {
                    $processedSectionIds[] = $newInsertedId;
                }
            }
        }
        
        return redirect()->route('backend.modules.landing.index')->with('toast-success', 'Landing actualizada correctamente.');
    
    }

    /**
     * Renderiza la vista de duplicar informacion de una landing.
     *
     * @method | POST
     *
     * @param id|null
     * @param mixed|null $id
     */
    public function copy($id = null)
    {
        if ($this->validateData(
            ['id' => $id],
            ['id' => 'required|is_not_unique[landings.id]'],
        )) {
            $copy = trimAll($this->request->getPost('copy-landing'));
            
            /**
             * Retorno de la vista metodo get
             * consulta los datos de la landing a duplicar
             */
            $landingModel = model('LandingsModel');
            $sectionsModel = model('SectionsModel');


            $landing = $landingModel->find($id);
            if(strtolower($this->request->getMethod()) !== 'post'){
                
                $sectionsModel = model('SectionsModel');
                $sections = $sectionsModel->where('landing_id', $id)->orderBy('sort_order', 'ASC')->findAll();
                
                return view('backend/modules/landings/copy', [
                    'landing'     => $landing,
                    'sections'    => $sections,
                    'is_copy'     => true,
                ]);
            }

            log_message('debug', 'Copy:: ' . print_r($copy, true));

            // Lógica para procesar el formulario (POST request)
            // 1. Validación de datos principales de la landing
            $landingRules = [
                'slug'     => 'required|min_length[3]|max_length[250]|string|is_unique[landings.slug]',
                'name'     => 'required|min_length[3]|max_length[250]|string',
                'title'    => 'required|max_length[250]|string',
                'subtitle' => 'permit_empty|max_length[250]|string', // Permitir vacío si es opcional
                'cover'    => 'uploaded[cover]|max_size[cover,4096]|is_image[cover]',
                'other'    => 'permit_empty|string|max_length[256]',
                'phone'    => 'permit_empty|max_length[20]',
            ];
            // Podrías añadir reglas más específicas para los campos de las secciones si es necesario
            if (!$this->validate($landingRules)) {
                log_message('debug', 'Rules:: ' . print_r($landingRules, true));

                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // 2. Preparar datos para insertar en la tabla 'landings'
            $slug = mb_url_title(trimAll($this->request->getPost('slug') ?: $this->request->getPost('name')), '-', true);
            
            // Pequeña re-validación del slug por si se cambió el 'name' y el 'slug' estaba vacío
            if ($slug !== $landing['slug'] && !$this->validateData(['slug' => $slug], ['slug' => "is_unique[landings.slug,id,{$id}]"])) {
                return redirect()->back()->withInput()->with('errors', ['slug' => 'El slug generado ya existe. Por favor, elige uno diferente.']);
            }

            $landingCopyData = [
                'name'     => trimAll($this->request->getPost('name')),
                'slug'     => $slug,
                'title'    => trimAll($this->request->getPost('title')),
                'subtitle' => trimAll($this->request->getPost('subtitle')),
                'other'    => trimAll($this->request->getPost('other')),
                'phone'    => trimAll($this->request->getPost('phone')),
            ];

            // Procesar imagen de portada (cover)
            $coverFile = $this->request->getFile('cover');
            $coverRemoveFlag = $this->request->getPost('cover_remove'); // Para el botón "Quitar imagen actual"

            if ($coverRemoveFlag === '1') {
                if ($landing['cover'] && file_exists(FCPATH . $landing['cover'])) {
                    unlink(FCPATH . $landing['cover']);
                }
                $landingCopyData['cover'] = null;
            } elseif ($coverFile && $coverFile->isValid()) {
                
                $newCoverPath = $this->_processImageUpload($coverFile, 'landing/covers', $landing['cover']);
                
                if ($newCoverPath === null && $coverFile->getError() !== 4) { // Error 4 es UPLOAD_ERR_NO_FILE
                    return redirect()->back()->withInput()->with('error', 'Hubo un problema al subir la nueva imagen de portada.');
                }
                if ($newCoverPath) {
                    $landingCopyData['cover'] = $newCoverPath;
                }
                // Si no se subió un nuevo archivo y no se marcó para quitar, se mantiene la imagen actual (no se añade a $landingCopyData)
            }
            
            $landingId = $landingModel->insertAndReturnUUID($landingCopyData);
            if (!$landingId) {
                return redirect()->back()->withInput()->with('errors', $landingModel->errors());
            }

            // 3. Procesar Secciones
            $postedSections = $this->request->getPost('sections') ?? [];
            $uploadedSectionFiles = $this->request->getFiles();
            $processedSectionIds = []; // Para rastrear qué secciones se procesaron (y luego eliminar las huérfanas)
            $batchSectionsData = [];
            foreach ($postedSections as $index => $sectionData) {
                $sectionId = $sectionData['id'] ?? null; // ID de la sección si existe
                $sectionType = $sectionData['type'] ?? 'undefined';
                $content = $sectionData['content'] ?? [];
                $sortOrder = $sectionData['sort_order'] ?? $index;

                // Obtener la sección existente de la BD si estamos actualizando
                $existingSectionContent = [];
                if ($sectionId) {
                    $existingDbSection = $sectionsModel->find($sectionId);
                    if ($existingDbSection) {
                        $existingSectionContent = json_decode($existingDbSection['content'], true) ?? [];
                    }
                }

                // ---- Procesamiento de Archivos para la sección ----
                if (isset($uploadedSectionFiles['sections'][$index]['files'])) {
                    
                    foreach ($uploadedSectionFiles['sections'][$index]['files'] as $fieldName => $fileOrFiles) {
                        // `fieldName` aquí es la clave que usaste en el `name` del input, ej: `section_image` o `carousel_images`
                        // Caso 1: Múltiples archivos (ej. carrusel con name="...[carousel_images_new][]")
                        if (is_array($fileOrFiles) && $fieldName === 'carousel_images_new') {
                            $newImagePaths = [];
                            foreach ($fileOrFiles as $individualFile) {
                                if ($individualFile instanceof \CodeIgniter\HTTP\Files\UploadedFile && $individualFile->isValid()) {
                                    $filePath = $this->_processImageUpload($individualFile, 'landing/carousel_assets');
                                    if ($filePath) {
                                        $newImagePaths[] = $filePath;
                                    }
                                }
                            }
                            if (!empty($newImagePaths)) {
                                // Si se subieron nuevas imágenes para el carrusel, reemplazamos las antiguas.
                                // Borrar imágenes antiguas del carrusel:
                                $oldCarouselImages = $existingSectionContent['carousel_images'] ?? [];
                                if (is_string($oldCarouselImages)) $oldCarouselImages = explode('|', $oldCarouselImages); // Compatibilidad con formato antiguo
                                foreach ($oldCarouselImages as $oldImg) {
                                    if ($oldImg && file_exists(FCPATH . $oldImg)) {
                                        unlink(FCPATH . $oldImg);
                                    }
                                }
                                $content['carousel_images'] = $newImagePaths; // Guardar array de nuevas rutas
                            } else {
                                // No se subieron nuevas, mantener las existentes (si se enviaron por hidden input)
                                $content['carousel_images'] = $sectionData['content']['existing_carousel_images'] ?? ($existingSectionContent['carousel_images'] ?? []);
                            }
                        }elseif ($fieldName === 'section_image') { // Enfocarse en el campo de imagen única
                            
                            $fileForThisField = null;
                            if (isset($uploadedSectionFiles['sections'][$index]['files'][$fieldName])) {
                                $fileForThisField = $uploadedSectionFiles['sections'][$index]['files'][$fieldName];
                            }

                            if ($fileForThisField instanceof \CodeIgniter\HTTP\Files\UploadedFile && $fileForThisField->isValid() && !$fileForThisField->hasMoved()) {
                                // Se subió una nueva imagen válida
                                $newFilePath = $this->_processImageUpload($fileForThisField, 'landing/sections_assets');
                                if (!empty($newFilePath)) {
                                    // Eliminar la antigua si existe
                                    if (!empty($existingSectionContent['section_image']) && file_exists(FCPATH . $existingSectionContent['section_image'])) {
                                        unlink(FCPATH . $existingSectionContent['section_image']);
                                    }
                                    $content['section_image'] = $newFilePath;
                                } else {
                                    // Falló la subida, mantener la antigua
                                    if (isset($existingSectionContent['section_image'])) {
                                        $content['section_image'] = $existingSectionContent['section_image'];
                                    } else {
                                        $content['section_image'] = null; // O ''
                                    }
                                }
                            } else {
                                if (isset($existingSectionContent['section_image'])) {
                                    $content['section_image'] = $existingSectionContent['section_image'];
                                } else {
                                    if (isset($content['existing_image_url']) && $content['existing_image_url'] === null && isset($existingSectionContent['section_image'])) {
                                        $content['section_image'] = $existingSectionContent['section_image'];
                                    } elseif (!isset($existingSectionContent['section_image'])) {
                                        $content['section_image'] = null; // o ''
                                    }
                                }
                            }
                        }
                        // Asegurarse de que 'existing_image_url' no se guarde si ya se procesó la imagen
                        if (isset($content['existing_image_url']) && $fieldName === 'section_image') {
                            unset($content['existing_image_url']);
                        }
                        if (isset($content['existing_carousel_images']) && $fieldName === 'carousel_images_new'){
                            unset($content['existing_carousel_images']);
                        }

                    }
                }
                // ---- Limpiar y preparar contenido ----
                if (isset($content['bullets']) && is_array($content['bullets'])) {
                    $content['bullets'] = array_values(array_filter($content['bullets'], 'strlen'));
                }

                $batchSectionsData[] = [
                    'landing_id'    => $landingId,
                    'section_type'  => $sectionType,
                    'content'       => json_encode($content),
                    'sort_order'    => $sortOrder,
                ];

                // Insertar nueva sección
            }
            if (!empty($batchSectionsData)) {
                $sectionsModel->insertBatch($batchSectionsData);
            }
            return redirect()->route('backend.modules.landing.index')->with('toast-success', 'Landing Creada correctamente.');

        }

        throw PageNotFoundException::forPageNotFound();
    }

    /**
     * Elimina el Registro de una landing
     *
     * @param mixed|null $id
     */
    public function delete($id = null)
    {
        if ($this->validateData(
            ['id' => $id],
            ['id' => 'required|is_not_unique[landings.id]'],
        )) {
            $LandingsModel = model('LandingsModel');
            $landing       = $LandingsModel->select('id, slug')->find($id);

            $LandingsModel->update($landing['id'], [
                'slug'   => null,
                'active' => false,
            ]);

            $LandingsModel->delete($landing['id']);

            return redirect()->route('backend.modules.landing.index')->with('toast-success', 'Se ha eliminado correctamente');
        }

        throw PageNotFoundException::forPageNotFound();
    }
}
