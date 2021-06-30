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
        <li class='nav-item'>
            <a href="<?=base_url("customer/profile")?>" class='nav-link'>
                <i class="fas fa-user fa-3x"></i></a>
          </li>
    </div>
    <div class='text-right mt-2'>
        <li class='nav-item active'>
            <a href="<?=base_url("customer/password")?>" class='nav-link'>
                <i class="fas fa-lock fa-3x"></i></a>
          </li>

</ul>
</div>
    <div class="col-10">
        <div class="card">
        <div class="card-header">
            Ubah Pasword
        </div>
        <div class="card-body">
        <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('pesan'); ?>
            <form action="<?= base_url('customer/changepassword') ?>" method="POST">
                <div class="form-group">
                    <label for="currentpassword">Curren Password</label>
                    <input type="password" class="form-control" id="currentpassword" name="currentpassword">
                    <?= form_error('currentpassword', ' <small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="newpassword1">New Password</label>
                    <input type="password" class="form-control" id="newpassword1" name="newpassword1">
                    <?= form_error('newpassword1', ' <small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="newpassword2">Repeat Password</label>
                    <input type="password" class="form-control" id="newpassword2" name="newpassword2">
                    <?= form_error('newpassword2', ' <small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </form>
        </div>
    </div>
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