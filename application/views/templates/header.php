<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?=base_url('assets/')?>css/bootstrap.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets/')?>css/all.css">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:200,400,600&display=swap"
    rel="stylesheet">

  <!-- My CSS -->
  <link rel="stylesheet" href="<?=base_url('assets/')?>css/style.css">

  <link rel="icon" href="<?=base_url('assets/')?>img/logo.png" type="image/icon type">
  <title>Humyfoods</title>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top " style="background-color: #FF0090;"> <?php //FF0090?>
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="<?=base_url('assets/')?>img/logo.png" alt="Humyfoods" width="60">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav text-uppercase mx-auto ">
          <li class="nav-item ">
            <a class="nav-link font-weight-bold" href="<?=base_url()?>">Home</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link font-weight-bold" href="#">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link font-weight-bold" href="#">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link font-weight-bold" href="#">About</a>
          </li>
        </ul>
        <a href="<?=base_url("ShopingChart/viewchart")?>" class="nav-link text-white font-weight-bold"><i class="fas fa-shopping-cart "></i> My Cart (<span>12</span>)</a>
            
    <?php if($this->session->userdata('email')):?>
      <!-- Nav Item - User Information -->
      
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 text-white d-lg-inline small  font-weight-bold"><?=$nama?></span>
                  <img class="img-profile rounded-circle" src="<?=base_url('assets/')?>img/logo.png" width='60' alt='profile'>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?=base_url("auth/logout")?>">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>  
      <?else:?>
        <a href="<?=base_url("auth")?>" class="nav-link text-white font-weight-bold"><i class="fas fa-sign-in-alt"></i> Login </a>
            <?php endif;?>

      </div>
    </div>
  </nav>
  <!-- Akhir Navbar -->
