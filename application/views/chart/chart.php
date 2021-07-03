  
  <div class="container cart-header pt-5">
    <div class="row mt-5 text-center">
      <div class="col">
        <h3>Your Cart</h3>
        <p>Pastikan barang anda terbayar lunas</p>
      </div>
    </div>
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <nav>
      <ol class="breadcrumb bg-transparent pl-0 cart-breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cart Checkout</li>
      </ol>
    </nav>
  </div>

<?php if($chartitem):?>
  <!-- Checkout -->
  <section class="checkout">
    <div class="container">
      <div class="row justify-content-between" style="margin-bottom: 100px;">
        <div class="col-lg-6">
          <h4 class="mb-4">Your Items</h4>
          <form action="<?=base_url('shoppingchart/editchart')?>" method="post">
          <?php foreach($chartitem as $ci):?>
          <div class="row mb-4">
            <div class="col-2">
              <img src="<?=base_url('assets/img/produk/'.$ci['poto'])?>" width="70px" height="70px">
            </div>
            <div class="col-4">
              <h5 class="m-0"><?=$ci['nama']?></h5>
              <p class="m-0" style="color:#B7B7B7;">Rp. <?=number_format($ci['harga'], 2, ",", ".");?></p>
            </div>
            <div class="col-4">
              <a href="<?=base_url('ShopingChart/editchart/'.$ci['chartid'].'?id=2')?>" type="button" class="btn btn-sm" style="background-color: #EAEAEF; color: white;"><i
                  class="fas fa-minus-circle"></i></a>
              <span class="mx-2"><?=$ci['qty']?></span>
              <a href="<?=base_url('ShopingChart/editchart/'.$ci['chartid'].'?id=1')?>" type="button" class="btn btn-sm btn-success" style="color: white;"><i
                  class="fas fa-plus-circle"></i></a>
            </div>
            <div class="col-2 text-right">
              <a href="<?=base_url('ShopingChart/deletechart/'.$ci['chartid'])?>"  class="btn btn-sm btn-danger" style="color: white;"><i
                  class="fas fa-times-circle"></i></a>
            </div>
          </div>
          <?php endforeach;?>
          
        </form>

        </div>

        <div class="col-lg-5">
          <div class="card rounded-0 checkout-detail">
            <div class="card-body">
              <h5 class="card-title">Informasi Biaya</h5>
              <?php foreach($chartitem as $ci):?>
              <div class="row mb-3">
                <div class="col">
                  <h6 class="m-0"><?=$ci['nama']?></h6>
                  <small style="color: #B7B7B7;"><?=$ci['qty']?> Items</small>
                </div>
                <div class="col d-flex justify-content-end">
                  <h6 class="m-0 align-self-center text-success">Rp. <?=number_format($ci['total'], 2, ",", ".");?></h6>
                </div>
              </div>
              <?php endforeach;?>
              <hr>
              <div class="row mb-3">
              </div>

              <div class="row mb-3">
                <div class="col">
                  <h6 class="m-0">Total Harga</h6>
                </div>
                <div class="col d-flex justify-content-end">
                  <h6 id='total' class="m-0 align-self-center text-primary">Rp. <?=number_format($total["SUM(`total`)"], 2, ",", ".");?></h6>
                </div>
              </div>

            </div>
          </div>
          <?php if($user['alamat']!=null):?>
          <form action="<?=base_url('order')?>" method="post">
          <div class="row mt-3">            
            <div class="col">
              <button type="submit" class="btn btn-warning btn-block text-white">Checkout</button>
            </div>
          </div>
          </form>
          <?php else:?>
          <div class="row mt-3">            
            <div class="col">
              <button type="submit" class="btn btn-warning btn-block text-white" data-toggle="modal"
                data-target="#checkoutModal">Checkout</button>
            </div>
          </div>
          <?php endif;?>
        </div>
      </div>
    </div>
  </section>
  <!-- Akhir Checkout -->
<?php else:?>
  <!-- chart 0 -->
  <div class="card text-center">
  <div class="card-body">
    <h5 class="card-title">Keranjang Anda Kosong</h5>
    <a href="<?=base_url('customer/catalog')?>" class="btn btn-primary">Belanja Sekarang</a>
  </div>
</div>
  <!--  -->
<?php endif;?>

  <!-- Modal -->
  <div class="modal fade checkout-modal-success" id="checkoutModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <form action="<?=base_url('customer/profileedit')?>" method="post">
            <div class="form-group">
              <input type="hidden" name="nama" value="<?=$user['nama']?>">
              <input type="hidden" name="chart" value="chart">
              <label for="inputAddress">Alamat</label>
              <input type="text" name="alamat" class="form-control" id="inputAddress">
            </div>
            <div class="form-group">
              <label for="inputAddress">Nomor telephone</label>
              <input type="text" name="tlp" class="form-control" id="inputAddress">
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputState" class="d-block">Kota</label>
               <!--  -->
               <select name="idkota" id='selUser' class="form-control" required>
                  <option value='0'>-Pilih kota-</option> 
                  <?php foreach($kota2 as $k):?>
                  <?php if($k['idkota'] == $kota['idkota']):?>
                  <option selected value='<?=$k['idkota']?>'><?=$k['namakota']?></option>          
                  <?php else:?>
                  <option value='<?=$k['idkota']?>'><?=$k['namakota']?></option> 
                  <?php endif;?>
                  <?php endforeach;?>
               </select>  
               <!--  -->
              </div>
              <div class="form-group col-md-4">
                <label for="inputZip">Kode Pos</label>
                <input type="text" name="kodepos" class="form-control" id="inputZip"  style="height: 30px;">
                </div>
            </div>
            <div class="form-group">
              
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
      </div>
    </div>
  </div>



