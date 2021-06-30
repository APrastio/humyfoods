<div class="card text-center mt-5 ">  
  <div class="card-body mt-4" style="height:120px;
  background-image: url(http://localhost/humyfoods/assets/img/head.jpg); 
  background-size: cover;
  background-position: 0 -280px;">
  </div>
</div>

<section class="features bg-light p-5">
    <div class="container-fluid">

    <!-- card begin -->
<div class="row">
<div class="col-2 ">
<ul class="navbar-nav">
    <div class='text-right mt-1'>
        <li class='nav-item active'>
            <a href="<?=base_url("customer/profile")?>" class='nav-link'>
                <i class="fas fa-user fa-3x"></i></a>
          </li>
    </div>
    <div class='text-right mt-2'>
        <li class='nav-item'>
            <a href="<?=base_url("customer/password")?>" class='nav-link'>
                <i class="fas fa-lock fa-3x"></i></a>
          </li>
    </div>
</ul>
</div>
    <div class="col-10">
        <div class="card ">
        <div class="card-header">
            Profile saya
        </div>
        <div class="card-body">
        <!-- awal form -->
        <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"></h1>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('pesan'); ?>
        </div>
    </div>
    <div class="card mb-3" >
        <div class="row">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/customer/') . $user['photo'] ?>" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['nama'] ?></h5>
                    <p class="card-text"><?= $user['email'] ?></p>
                    <p class="card-text"><?=$user['alamat'].' '.$kota['namakota'].' '.$user['kodepos']?></p>
                    <p class="card-text"><small class="text-muted"><?=$user['tlp']?></small></p>
                    <a href="<?=base_url('customer/profileeditview')?>">Ubah</a>
                </div>
            </div>
            
        </div>
    </div>

</div>
        <!--  -->
        </div>
        
        </div>
    </div>
</div>
<!-- card end -->
      <div class="row">

      </div>
    </div>
  </section>
  <!-- Akhir Features -->