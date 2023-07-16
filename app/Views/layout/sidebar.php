     <!-- Main Sidebar Container -->
     <aside class="main-sidebar sidebar-dark-primary elevation-4">
         <!-- Brand Logo -->
         <a href="<?= base_url('/') ?>" class="brand-link">
             <img src="<?= base_url('asset') ?>/logo.jpeg" alt="Perumda Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
             <span class="brand-text font-weight-light">Perumda 3</span>
         </a>

         <!-- Sidebar -->
         <div class="sidebar">
             <!-- Sidebar user panel (optional) -->
             <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                 <div class="image">
                     <img src="<?= base_url('asset') ?>/avatar.avif" class="img-circle elevation-2" alt="User Image">
                 </div>
                 <div class="info">
                     <a href="#" class="d-block"><?= strtoupper(session()->get('username')); ?></a>
                 </div>
             </div>

             <!-- SidebarSearch Form -->
             <!-- <div class="form-inline">
                 <div class="input-group" data-widget="sidebar-search">
                     <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                     <div class="input-group-append">
                         <button class="btn btn-sidebar">
                             <i class="fas fa-search fa-fw"></i>
                         </button>
                     </div>
                 </div>
             </div> -->

             <!-- Sidebar Menu -->
             <nav class="mt-2">
                 <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                     <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                     <li class="nav-item menu-open">
                         <a href="<?= base_url('/dashboard') ?>" class="nav-link <?= ($menu == 'dashboard') ? 'active' : ''; ?>">
                             <i class="nav-icon fas fa-tachometer-alt"></i>
                             <p>
                                 Dashboard
                             </p>
                         </a>

                     </li>
                     <li class="nav-item">
                         <a href="<?= base_url('/pasar') ?>" class="nav-link <?= ($menu == 'pasar') ? 'active' : ''; ?>">
                             <i class="nav-icon fas fa-th"></i>
                             <p>
                                 Pasar
                                 <!-- <span class="right badge badge-danger">New</span> -->
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="<?= base_url('/pedagang') ?>" class="nav-link <?= ($menu == 'pedagang') ? 'active' : ''; ?>">
                             <i class="nav-icon fas fa-th"></i>
                             <p>
                                 Pedagang
                                 <!-- <span class="right badge badge-danger">New</span> -->
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="<?= base_url('/blok') ?>" class="nav-link <?= ($menu == 'blok') ? 'active' : ''; ?>">
                             <i class="nav-icon fas fa-th"></i>
                             <p>
                                 Blok
                                 <!-- <span class="right badge badge-danger">New</span> -->
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="<?= base_url('/klasifikasi') ?>" class="nav-link <?= ($menu == 'klasifikasi') ? 'active' : ''; ?>">
                             <i class="nav-icon fas fa-th"></i>
                             <p>
                                 Klasifikasi
                                 <!-- <span class="right badge badge-danger">New</span> -->
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="<?= base_url('/sertifikat') ?>" class="nav-link <?= ($menu == 'sertifikat') ? 'active' : ''; ?>">
                             <i class="nav-icon fas fa-th"></i>
                             <p>
                                 Sertifikat
                                 <!-- <span class="right badge badge-danger">New</span> -->
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="<?= base_url('/laporan') ?>" class="nav-link <?= ($menu == 'laporan') ? 'active' : ''; ?>">
                             <i class="nav-icon fas fa-th"></i>
                             <p>
                                 Laporan
                                 <!-- <span class="right badge badge-danger">New</span> -->
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="<?= base_url('/logout') ?>" class="nav-link ">
                             <i class="nav-icon fas fa-out"></i>
                             <p>
                                 Logout
                                 <!-- <span class="right badge badge-danger">New</span> -->
                             </p>
                         </a>
                     </li>
                 </ul>
             </nav>
             <!-- /.sidebar-menu -->
         </div>
         <!-- /.sidebar -->
     </aside>