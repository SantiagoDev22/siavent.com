<!-- Menú de navegación del sidebar -->
<ul class="menu font-semibold text-lg min-h-screen pb-8 gap-1">
    <li class="menu-title font-medium">
        <span class=" menuContent hidden">
            Dashboard
        </span>
    </li>
    <?php $permissionsModel = model('PermissionModel'); ?>
    <?php $modules_module   = $permissionsModel->select('permissions.id, modules.id, modules.name, modules.icon, modules.route')
        ->where('permissions.user_email', session('user.email'))
        ->where('permissions.active', true)
        ->where('modules.category', 'modules')
        ->orderBy('name', 'acs')
        ->join('modules', 'modules.id = permissions.module_id', 'left')->findAll();

    ?>
    <li id="menuTrn" class="px-4 w-auto menuTrn transition-all duration-300 ease-in">
        <a href="<?= url_to('backend.dashboard.index') ?>"
            class="gap-4 <?= url_is_child('backend.dashboard.index') ? 'active' : '' ?> rounded-lg tooltip tooltip-right"
            data-tip="Inicio">
            <i class="ri-dashboard-fill"></i>
            <span id="menuContent" class="menuContent hidden">Inicio</span>
        </a>
    </li>

    <li class="menu-title font-medium">
        <span class="menuContent hidden">
            Módulos
        </span>
    </li>
    <?php foreach($modules_module as $key => $module): ?>
    <li class="px-4 w-auto menuTrn transition-all duration-300 ease-in">
        <a href="<?= url_to($module['route']) ?>" class="gap-4
            <?= url_is_child($module['route']) ? 'active' : '' ?> rounded-lg tooltip tooltip-right"
            data-tip="<?= esc($module['name']) ?>">
            <?= $module['icon'] ?>
            <span class="menuContent hidden"><?= esc($module['name']) ?></span>
        </a>
    </li>
    <?php endforeach; ?>
    <div class="divider w-auto"></div>
    <?php if (esc(session('user.role')) === 'admin' || esc(session('user.role')) === 'editor') :  ?>
        <!-- Consulta modulos de configuracion -->
        <?php
            $modules_config = $permissionsModel->select('permissions.id, modules.id, modules.name, modules.icon, modules.route')
                ->where('permissions.user_email', session('user.email'))
                ->where('permissions.active', true)
                ->where('modules.category', 'config')
                ->orderBy('name', 'acs')
                ->join('modules', 'modules.id = permissions.module_id', 'left')->findAll();
        ?>
        <?php if(! empty($modules_config)): ?>
            <li class="menu-title font-medium">
                <span class="menuContent hidden">
                    Configuraciones
                </span>
            </li>
            <?php foreach($modules_config as $key => $module): ?>
            <li class="px-4 w-auto menuTrn transition-all duration-300 ease-in">
                <a href="<?= url_to($module['route']) ?>"
                    class="gap-4 <?= url_is_child($module['route']) ? 'active' : '' ?> rounded-lg tooltip tooltip-right"
                    data-tip="<?= esc($module['name']) ?>">
                    <?= $module['icon'] ?>
                    <span class=" menuContent hidden"><?= esc($module['name']) ?></span>
                </a>
            </li>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endif ?>
</ul>
<!-- Fin del menú de navegación del sidebar -->