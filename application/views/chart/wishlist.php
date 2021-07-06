<div class="card text-center mt-5 ">  
  <div class="card-body mt-4" style="height:120px;
  background-image: url(http://localhost/humyfoods/assets/img/head.jpg); 
  background-size: cover;
  background-position: 0 -280px;">
  </div>
</div>

<section class="features bg-light p-5">
    <div class="container">
<!-- card begin -->
<div class="card">
  <div class="card-header">
    Wishlist Anda
  </div>
  <div class="card-body ml-5 mt-4 mr-5">
    <?php if($order!=null):?>
    <?php //var_dump($order);die?>
    <?php foreach($order as $o):?>
      
<a href="<?=base_url('produk/produkdetail/'. $o['produkid'])?>" class="list-group-item list-group-item-action mb-2">
    <div class="row mb-2 mr-5">
        <div class="col-2 my-3">
          <img src="<?=base_url('assets/img/produk/').$o['poto']?>" width="100" alt="asasas">
         </div>
        <div class="col-8 my-3">
          <span><?=$o['nama']?></span>
          <div class="row ml-1">
          <span><?=$o['harga']?></span>
            
          </div>
        </div>
        

    </div>
    </a>  
    <?php endforeach;?>
    <?php else:?>
      <div class="text-center">
        <h5 class="card-title">Belum Ada Wishlist</h5>
        <a href="<?=base_url('customer/catalog')?>" class="btn btn-primary">Belanja Sekarang</a>
      </div>
    <?php endif;?>
  </div>
</div>


<!-- card end -->
      <div class="row">

      </div>
    </div>
  </section>
  <!-- Akhir Features -->