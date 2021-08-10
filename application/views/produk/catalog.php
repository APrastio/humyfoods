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
  
  
</div>
  <form class="form-inline" action="<?=base_url('Customer/loadRecord')?>" method="post">
    <input class="form-control mr-sm-2" type="search" name='search' value='<?= $search ?>' placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name='submit' value='Submit'>Search</button>
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
              <img src="<?=base_url('assets/img/produk/').$p['poto']?>" class="figure-img img-fluid" loading=”lazy”>
              <a href="<?=base_url('produk/produkdetail/'. $p['produkid'])?>" class="d-flex justify-content-center">
                <img src="<?=base_url('assets/img/')?>detail.png" class="align-self-center">
              </a>
            </div>
            <figcaption class="figure-caption text-center">
              <h5><?=$p['nama']?></h5>
              <p>Rp. <?=number_format($p["harga"], 2, ",", ".");?></p>
            </figcaption>
          </figure>
        </div>
        <?php endforeach;?>
        
      </div>
      <?php if(count($produk) == 0):?>
      <div class='text-center'>
      Produk yang and cari tidak ditemukan
      </div>
      <?php endif;?>
      <div style='margin-top: 10px;'>
   <?= $pagination; ?>
   </div>
    </div>
    
  </section>
  <!-- Akhir Features -->