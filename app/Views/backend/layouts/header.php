<?php

use CodeIgniter\Files\File;

$favicon = 'uploads/settings/' . setting()->get('App.general', 'favicon');
?>
<div class="navbar bg-base-100 px-4 rounded-b-lg gap-4">
  <button id="toggleMenuBtn" class="btn btn-sm btn-outline btn-primary">
    <i class="ri-menu-4-fill"></i>
  </button>
  <div class="flex-1">
    <a class="btn btn-ghost text-xl">
      <img src="<?= base_url(['uploads/settings/', setting()->get('App.general', 'logo')]) ?>" alt="Logo <?= esc(setting()->get('App.general', 'company')) ?>" class="h-6 sm:h-8 max-w-48" style="filter: invert(1);">
    </a>
  </div>
  <div class="flex-none">
    <!-- notifications -->
    <div class="dropdown dropdown-end hidden">
      <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
        <div class="indicator">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          <span class="badge badge-sm indicator-item">8</span>
        </div>
      </div>
      <div tabindex="0" class="mt-3 z-[1] card card-compact dropdown-content w-52 bg-base-100 shadow">
        <div class="card-body">
          <span class="font-bold text-lg">8 Items</span>
          <span class="text-info">Subtotal: $999</span>
          <div class="card-actions">
            <button class="btn btn-primary btn-block">View cart</button>
          </div>
        </div>
      </div>
    </div>
    <!-- profile, logout -->
    <div class="dropdown dropdown-end">
      <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
        <div class="w-10 btn-primary rounded-full p-1">
          <img alt="Tailwind CSS Navbar component" src="<?= base_url($favicon) ?>" />
        </div>
      </div>
      <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
        <li>
          <a class="justify-between" href="<?= url_to('backend.account.update', esc(session('user.id'))) ?>">
            Profile
            <span class="hidden badge">New</span>
          </a>
        </li>
        <li>
          <label for="modal-action-logout">
            <a class="justify-between">
              Logout
            </a>
          </label>
        </li>
      </ul>
    </div>
  </div>
</div>