
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
          <i class="fas fa-university"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ADMINISTRATOR</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link pb-0" href="<?=base_url("admin")?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link pb-0 collapsed" data-toggle="collapse" data-target="#collapsePages" href="#">
          <i class="far fa-file"></i>
          <span>Order</span>
          <?php if($menunggu || $kirim):?>
          <span class="badge badge-danger badge-counter"><?=$menunggu+$kirim?></span>  
        <?php endif;?>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?=base_url('admin/listkonfirmasipemesanan')?>">Pesanan Masuk
              <?php if($menunggu):?>
              <span class="badge badge-danger badge-counter"><?=$menunggu?></span>
              <?php endif;?>
            </a>
            <a class="collapse-item" href="<?=base_url('admin/orderKirim')?>">Kirim Pesanan
              <?php if($kirim):?>
              <span class="badge badge-danger badge-counter"><?=$kirim?></span>
              <?php endif;?>
            </a>
            <a class="collapse-item" href="<?=base_url('admin/orderTetrkirim')?>">Pesanan Dikirim</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link pb-0 collapsed" href="<?=base_url("produk/listproduk")?>">
          <i class="fas fa-shopping-cart"></i>
          <span>Produk</span>
        </a>  
      </li>

      <li class="nav-item">
        <a class="nav-link  collapsed" href="<?=base_url('admin/userlist')?>">
          <i class="fas fa-users"></i>
          <span>Users</span>
        </a>  
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('auth/logout')?>">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
