<div class="card text-center mt-5 ">  
  <div class="card-body mt-4" style="height:170px;
  background-image: url(http://localhost/humyfoods/assets/img/head.jpg); 
  background-size: cover;
  background-position: 0 -280px;">
  </div>
</div>


<!-- Features -->
<nav class="navbar navbar-light bg-light">
    <div class="container">
    <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fas fa-filter"></i>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
  </div>
</nav>

<section class="features bg-light p-5">
    <div class="container">
      <div class="row">
      <?php  foreach($produk as $p):?>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
          <figure class="figure">
            <div class="figure-img">
              <img src="<?=base_url('assets/img/produk/').$p['poto']?>" class="figure-img img-fluid">
              <a href="<?=base_url('produk/produkdetail/'. $p['produkid'])?>" class="d-flex justify-content-center">
                <img src="<?=base_url('assets/img/')?>detail.png" class="align-self-center">
              </a>
            </div>
            <figcaption class="figure-caption text-center">
              <h5><?=$p['nama']?></h5>
              <p>IDR <?=number_format($p["harga"], 2, ",", ".");?></p>
            </figcaption>
          </figure>
        </div>
        <?php endforeach;?>
        
      </div>
    </div>
  </section>
  <!-- Akhir Features -->