
  <div class="container cart-header pt-5">
    <div class="row mt-5 text-center">
      <div class="col">
        <h3>Your Order</h3>
        <p>Pastikan barang anda terbayar lunas</p>
      </div>
    </div>
  </div>

  <!--  -->
  <div class="col mb-4">
          <div class="">
            <div class="card-body">
              <h5 class="card-title">Alamat Anda</h5>
              <hr class="border border-5">
              <div class='container'>
                <div class="row">
                  <div class='col-lg-2'>
                  <h6 class="card-title"><?=$user['nama']?> (<?=$user['tlp']?>)</h6>
                  </div>
                  <div class='col-lg-7'>
                  <h6 class="card-title"><?=$user['alamat']?>,<?=$user['namakota']?>,<?=$user['kodepos']?></h6>
                  </div>
                </div>
              </div>
              <hr class='border border-1'>
            </div>
          </div>
        </div>
  <!--  -->

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
              <p class="m-0" style="color:#B7B7B7;">IDR <?=number_format($ci['harga'], 0, ",", ".");?></p>
            </div>
            <div class="col-4">
              <span class="mx-2"><?=$ci['qty']?></span>
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
                  <h6 class="m-0 align-self-center text-success">IDR <?=number_format($ci['total'], 0, ",", ".");?></h6>
                </div>
              </div>
              <?php endforeach;?>
              <hr>
              <form action="<?=base_url('order/addorder')?>" method="post">
              <div class="row mb-3">
              <?php if($user['alamat']!=null):?>
                <div class="col">
                  <h6 class="m-0">Courier</h6>
                  <!-- <small style="color: #B7B7B7;">JNT Express</small> -->                  
                  <select onchange="val()" id='ok' class="custom-select-sm" required>
                    <option value="" >Pilih kurir</option>
                    <?php foreach($kurir as $k):?>
                      <option value="<?=$k['harga']?>|<?=$k['biayaid']?>"><?=strtoupper($k['kurir'])?></option>
                      <?php endforeach;?>
                    <!-- <option value="35000">JNE</option> -->
                    <!-- <option value="35000">Paxel</option> -->
                  </select>
                  
                      <input type="hidden" name="userid" value="<?=$user['userid']?>">
                      <input type="hidden" name="chartid" value="<?=$chartitem[0]['chartid']?>">
                      <input type="hidden" name="biayaid" id='idbiaya' value="">
                      <input type="hidden" name="totalharga" id="totalharga" value="">
                </div>
                <div class="col d-flex justify-content-end">
                  <h6 id='hasil' class="m-0 align-self-center text-success">IDR 0</h6>
                </div>
                <?php endif;?>
              </div>

              <div class="row mb-3">
                <div class="col">
                  <h6 class="m-0">Total Harga</h6>
                </div>
                <div class="col d-flex justify-content-end">
                  <h6 id='total' class="m-0 align-self-center text-primary">IDR <?=number_format($total["SUM(`total`)"], 0, ",", ".");?></h6>
                </div>
              </div>

            </div>
          </div>
          <?php if($cek==null):?>
          <div class="row mt-3">      
            <div class="col">
              <button type="submit" class="btn btn-warning btn-block text-white">Order</button>
            </div>
          </div>
          </form>
          <?php else:?>
          <div class="row mt-3">    
            <div class="col">
              <button type="submit" class="btn btn-warning btn-block text-white"data-toggle="modal" data-target="#checkoutModal">Order</button>
            </div>
          </div>
<?php endif;?>
        </div>
      </div>
    </div>
  </section>
  <!-- Akhir Checkout -->

  <!-- Modal -->
  <div class="modal fade checkout-modal-success" id="checkoutModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog text-center" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <h5>Harap Selesaikan Pembayaran Anda terlebih dahulu</h5>
          <a href="<?=base_url()?>" class='btn btn-warning'>Pesanan</a>
        </div>
      </div>
    </div>
  </div>



