<?= $this->extend('backend/templates/page') ?>

<?= $this->section('head') ?>
<!-- Plantilla para todas las páginas del dashboard -->

<!-- Sección de etiquetas del head -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const toggleMenuBtn = document.getElementById('toggleMenuBtn');
    const menuContainer = document.getElementById('menuContainer');
    const menuContent = document.getElementsByClassName('menuContent');
    const otherContent = document.getElementById('otherContent');
    const menuTrn = document.getElementById('menuTrn');


    toggleMenuBtn.addEventListener('click', function() {
      menuContainer.classList.toggle('w-64');
      menuContainer.classList.toggle('w-20');

      for (let i = 0; i < menuContent.length; i++) {
        menuContent[i].classList.toggle('hidden');
      }
      const menuItems = document.querySelectorAll('.menuTrn a');
      menuItems.forEach(item => {
          item.classList.toggle('tooltip');
          item.classList.toggle('tooltip-right');
      });

    });
    if (window.innerWidth < 768) {
      menuContainer.classList.remove('w-20');
      menuContainer.classList.add('hidden');
      toggleMenuBtn.addEventListener('click', function() {
        menuContainer.classList.toggle('hidden');
        menuContainer.classList.remove('w-20');
        menuContainer.classList.add('w-full');
        menuContainer.classList.add('h-screen');
        menuContainer.classList.toggle('z-50');
        menuContainer.classList.toggle('bg-gray-300');
        menuTrn.classList.toggle('w-20');
        menuTrn.classList.toggle('w-10');
        menuContainer.classList.add('absolute');
        menuContent.classList.remove('hidden');
      });
    }
  });
</script>

<?= $this->renderSection('head') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>


<div id="otherContent" class=" flex flex-col min-h-screen bg-gray-200 gap-2">
  <!-- content header -->
  <?= $this->include('backend/layouts/header') ?>
  <!-- content mail -->
  <div class="flex gap-3 px-3 ">
    <div id="menuContainer" class="bg-white w-20 transition-all duration-300  rounded-lg">
      <?= $this->include('backend/layouts/menu') ?>
    </div>
    <main id="otherContent" class="grow  py-4 transition-all bg-white ease-in duration-300 rounded-lg min-h-screen">
      <?= $this->renderSection('content') ?>
    </main>
  </div>
  <!-- content footer -->
  <?= $this->include('backend/layouts/footer') ?>

</div>

<?= $this->setData([
    'id'      => 'modal-action-logout',
    'method'  => 'backend.auth.logout',
    'message' => '¿Deseas cerrar sesión?',
])->include('backend/components/modal-action') ?>


<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<!-- Sección de scripts de javascript -->
<?= $this->renderSection('javascript') ?>
<?= $this->endSection() ?>