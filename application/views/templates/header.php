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
  <nav class="navbar navbar-expand-lg navbar-light fixed-top " style="background-color: #FF0090;">
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
          <li class="nav-item active">
            <a class="nav-link font-weight-bold" href="<?=base_url()?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link font-weight-bold" href="#">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link font-weight-bold" href="#">Designer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link font-weight-bold" href="#">About</a>
          </li>
        </ul>
        <a href="<?=base_url("ShopingChart/viewchart")?>" class="nav-link text-white"><i class="fas fa-shopping-cart"></i> My Cart (<span>12</span>)</a>
      </div>
    </div>
  </nav>
  <!-- Akhir Navbar -->