<div style='background:#ffff00;'>
<div class="container pt-5 mt-5">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-10 col-lg-12 col-md-9">

    <div class="card o-hidden border-0 my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-6 d-none d-lg-block bg-login-image" style='background:#ffff00;'>
              <img src="<?=base_url("assets/img/")?>logo 4x4 cm.png" width="100%" alt="">
          </div>
          <div class="col-lg-6">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900">Reset Password</h1>
                <h6 class="text-gray-900 mb-4"><?=$this->session->userdata('resetemail');?></h6>
                 <?= $this->session->flashdata('pesan'); ?>
              </div>
              <form class="user" action="<?=base_url("auth/resetpasswordview")?>" method="post">
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" name="password1" value="<?= set_value('email'); ?>" placeholder="Password">
                  <?= form_error('password1', ' <small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" name="password2" placeholder="repeat Password" >
                  <?= form_error('password2', ' <small class="text-danger pl-3">', '</small>') ?>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Reset
                </button>
              </form>
              <hr>
              
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>
</div>
