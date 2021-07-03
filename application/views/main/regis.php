<div style='background:#ffff00;'>
<div class="container pt-5 mt-5">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-10 col-lg-12 col-md-9">

    <div class="card o-hidden border-0 my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-6 d-none d-lg-block bg-login-image" style='background:#ffff00;' >
              <img src="<?=base_url("assets/img/")?>logo 4x4 cm.png" class='w-100'  alt="">
          </div>
          <div class="col-lg-6">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Daftar </h1>
              </div>
              <form class="user" action="<?=base_url("auth/regis")?>" method="post">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="name" placeholder="Full Name">
                  <?= form_error('name', ' <small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" placeholder="Email Address">
                  <?= form_error('email', ' <small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="password1" placeholder="Password">
                    <?= form_error('password1', ' <small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="password2" placeholder="Repeat Password">
                    <?= form_error('password2', ' <small class="text-danger pl-3">', '</small>') ?>
                  </div>
                </div>
                <button href="login.html" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
              </form>
              <hr>
              <div class="text-center mt-5">
                <a class="small" href="<?=base_url("auth/lupapasswordview")?>">Forgot Password?</a>
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
