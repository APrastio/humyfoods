
  <!-- Breadcrumbs -->
  <div class="container mt-5">
    <nav>
      <ol class="breadcrumb bg-transparent pl-0">
        <!-- <li class="breadcrumb-item"><a href="#"></a></li>
        <li class="breadcrumb-item active" aria-current="page">Single Product</li> -->
      </ol>
    </nav>
  </div>



  <!-- Single Product -->
  <section class="single-product">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <figure class="figure">
            <img src="<?=base_url('assets/img/produk/').$produkdetail['poto']?>" class="figure-img img-fluid">
          </figure>
        </div>

        <div class="col-lg-4">
          <h3><?=$produkdetail['nama']?></h3>
          <p class="text-muted">IDR <?=number_format($produkdetail['harga'], 2, ",", ".")?></p>
          <button type="button" id="clickme-" class="btn btn-sm" style="background-color: #EAEAEF; color: white;"><i
              class="fas fa-minus-circle"></i></button>
          <span class="mx-2" id="value">1</span>
          <button type="button"id="clickme" class="btn btn-sm btn-success" style="color: white;"><i
              class="fas fa-plus-circle"></i></button>
              <form action="<?=base_url('ShopingChart/addchart')?>" method="post">
          <div class="btn-product">
          <input id="hasil" name="qty" type="hidden" value="1">
          <?php if($this->session->userdata('email')):?>
          <input id="hasil" name="userid" type="hidden" value="<?=$user['userid']?>">
          <?php endif;?>
          <input id="hasil" name="produkid" type="hidden" value="<?=$produkdetail['produkid']?>">
            <button  class="btn btn-warning text-white w-50" type="submit">Add to Cart</button>
            <button class="btn w-50" style="background-color: #EAEAEF; color: #ADADAD;">Add to Wishlist</button>
          </div>
          </form>

          <!-- <div class="designed-by">
            <h5>Designed by</h5>
            <div class="row">
              <div class="col-2">
                <img src="<?= base_url("assets/")?>img/single/2.png">
              </div>
              <div class="col">
                <h4>Anne Mortgery</h4>
                <p>14.2K <span>Followers</span></p>
              </div>
            </div>
          </div>
           -->
        </div>
      </div>
    </div>
  </section>


  <!-- Product Description & Review -->
  <section class="product-description p-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab"
                aria-controls="description" aria-selected="true">Product Description</a>
            </li>
          </ul>
          <div class="tab-content p-3" id="myTabContent">
            <div class="tab-pane fade show active product-review" id="description" role="tabpanel"
              aria-labelledby="description-tab">
              <p><?=$produkdetail['deskripsi']?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Akhir Product Description & Review -->


  <!-- Similar Product -->
  <section class="similar-product">
    <div class="container">
      <div class="row mb-3">
        <div class="col">
          <h3>Similar Products</h3>
          <p>Pakaian pelengkap produk di atas</p>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-4">
          <figure class="figure">
            <img src="<?= base_url("assets/")?>img/single/similar/1.png" class="figure-img img-fluid">
            <figcaption class="figure-caption">
              <div class="row">
                <div class="col">
                  <h4>Hatty Bomb</h4>
                  <p>Match 20%</p>
                </div>
                <div class="col align-items-center d-flex justify-content-end">
                  <p style="font-size: 18px;">IDR. 209.000</p>
                </div>
              </div>
            </figcaption>
          </figure>
        </div>
        <div class="col-sm-4">
          <figure class="figure">
            <img src="<?= base_url("assets/")?>img/single/similar/2.png" class="figure-img img-fluid">
            <figcaption class="figure-caption">
              <div class="row">
                <div class="col">
                  <h4>White Pure</h4>
                  <p>Match 20%</p>
                </div>
                <div class="col align-items-center d-flex justify-content-end">
                  <p style="font-size: 18px;">IDR. 209.000</p>
                </div>
              </div>
            </figcaption>
          </figure>
        </div>
        <div class="col-sm-4">
          <figure class="figure">
            <img src="<?= base_url("assets/")?>img/single/similar/3.png" class="figure-img img-fluid">
            <figcaption class="figure-caption">
              <div class="row">
                <div class="col">
                  <h4>Hatty Bomb</h4>
                  <p>Match 20%</p>
                </div>
                <div class="col align-items-center d-flex justify-content-end">
                  <p style="font-size: 18px;">IDR. 209.000</p>
                </div>
              </div>
            </figcaption>
          </figure>
        </div>
      </div>
    </div>
  </section>
  <!-- Akhir Similar Product -->
