<!-- Número de páginas a mostrar antes y después de la página actual -->
<?php $pager->setSurroundCount(2) ?>

<!-- Paginación del backend -->
<div class="btn-group">
    <?php if ($pager->hasPrevious()) : ?>
        <!-- Enlace a la primera página -->
        <a href="<?= $pager->getFirst() ?>" class="btn btn-sm lg:btn-md">
            <i class="ri-skip-left-line lg:text-xl"></i>
        </a>

        <!-- Enlace a la página anterior -->
        <a href="<?= $pager->getPreviousPage() ?>" class="btn btn-sm lg:btn-md">
            <i class="ri-arrow-left-s-line lg:text-xl"></i>
        </a>
    <?php endif ?>

    <!-- Páginas -->
    <?php foreach ($pager->links() as $link) : ?>
        <a href="<?= $link['uri'] ?>" class="btn btn-sm lg:btn-md <?= $link['active'] ? 'btn-active' : '' ?>">
            <?= $link['title'] ?>
        </a>
    <?php endforeach ?>
    <!-- Fin de las páginas -->

    <?php if ($pager->hasNext()) : ?>
        <!-- Enlace a la siguiente página -->
        <a href="<?= $pager->getNextPage() ?>" class="btn btn-sm lg:btn-md">
            <i class="ri-arrow-right-s-line lg:text-xl"></i>
        </a>

        <!-- Enlace a la última página  -->
        <a href="<?= $pager->getLast() ?>" class="btn btn-sm lg:btn-md">
            <i class="ri-skip-right-line lg:text-xl"></i>
        </a>
    <?php endif ?>
</div>
<!-- Fin de la paginación del backend -->