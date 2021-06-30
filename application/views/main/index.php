


  <!-- Carousel -->
  <div id="carouselExampleControls" class="carousel slide mt-5" data-ride="carousel">
    <div class="carousel-inner">
      <div class="container">
        <div class="carousel-item active">

          <div class="row pt-5 justify-content-center">
            <div class="col-9 col-sm-4 col-md-6 col-lg-5">
              <h1 class="mb-4">Spesial Eid Lebaran</h1>
              <p class="mb-4">Jadikan hari pertama lebaranmu meriah dan memorable</p>
              <a href="" class="btn btn-warning text-white">Get It Now</a>
            </div>
            <div class="col-3 col-sm-6 col-md-4 col-lg-4 d-none d-sm-block offset-1">
              <img src="<?=base_url('assets/')?>img/adimsum.png" class="img-fluid">
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row pt-5 justify-content-center">
            <div class="col-9 col-sm-4 col-md-6 col-lg-5">
              <h1 class="mb-4">Dimsum Enak</h1>
              <p class="mb-4">Jadikan hari pertama lebaranmu meriah dan memorable dengan dimsum yang enak dan halal tanpa pengawet</p>
              <a href="" class="btn btn-warning text-white">Get It Now</a>
            </div>
            <div class="col-3 col-sm-6 col-md-4 col-lg-4 d-none d-sm-block offset-1">
              <img src="<?=base_url('assets/')?>img/adimsum.png" class="img-fluid">
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row pt-5 justify-content-center">
            <div class="col-9 col-sm-4 col-md-6 col-lg-5">
              <h1 class="mb-4">Spesial Eid Lebaran</h1>
              <p class="mb-4">Jadikan hari pertama lebaranmu meriah dan memorable</p>
              <a href="" class="btn btn-warning text-white">Get It Now</a>
            </div>
            <div class="col-3 col-sm-6 col-md-4 col-lg-4 d-none d-sm-block offset-1">
              <img src="img/slideshow/1.png" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- Akhir Carousel -->

  


  <!-- Features -->
  <section class="features bg-light p-5">
    <div class="container">
      <div class="row mb-3">
        <div class="col">
          <h3>Produk Terpopuler</h3>
        </div>
        <div class="col-sm-2">
        <a href="<?=base_url('customer/catalog')?>" class="badge "><h5> Lihat Catalog <i class="fas fa-chevron-right"></i></h5></a>
        </div>
      </div>

      <div class="row">
      <?php  foreach($produk as $p):?>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
          <figure class="figure">
            <div class="figure-img">
              <img src="<?=base_url('assets/img/produk/').$p['poto']?>" class="figure-img img-fluid">
              <a href="<?=base_url('produk/produkdetail/'. $p['produkid'])?>" class="d-flex justify-content-center">
                <img src="<?=base_url('assets/')?>img/detail.png" class="align-self-center">
              </a>
            </div>
            <figcaption class="figure text-center">
              <h5><?=$p['nama']?></h5>
              <p>IDR <?=number_format($p['harga'], 2, ",", ".");?></p>
            </figcaption>
          </figure>
        </div>
        <?php endforeach;?>
        
      </div>
    </div>
  </section>
  <!-- Akhir Features -->

  
