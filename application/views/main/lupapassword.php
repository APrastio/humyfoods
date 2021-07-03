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
                <h1 class="h4 text-gray-900 mb-4">Lupa Password </h1>
              </div>
              <h5 class="text-center">Lupa Password anda? tenang masukan saja alamat e-mail anda dibawah kami akan mengirimkan e-mail untuk reset password anda</h3>
              <form class="user" action="<?=base_url("auth")?>" method="post">
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" value="<?= set_value('email'); ?>" placeholder="Enter Email Address...">
                  <?= form_error('email', ' <small class="text-danger pl-3">', '</small>') ?>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Reset
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?=base_url("auth/regis")?>">Create an Account!</a>
              </div>
               <div class="text-center">
                <a class="small" href="<?=base_url("auth")?>">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>
</div>
