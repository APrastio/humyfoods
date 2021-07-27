<div class="card text-center mt-5 ">  
  <div class="card-body mt-4" style="height:120px;
  background-image: url(http://localhost/humyfoods/assets/img/head.jpg); 
  background-size: cover;
  background-position: 0 -280px;">
  </div>
</div>

<section class="features bg-light p-md-5">
    <div class="container">
<!-- card begin -->
<div class="card">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" href="<?=base_url('order/orderpayment')?>">Belum Dibayar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('order/statuspengiriman')?>">Status Pengiriman</a>
      </li>
    </ul>
  </div>
  <div class="card-body ml-1 ml-md-5 mt-4">
    <?php if($order!=null):?>
      <div class="row mb-2">
        <span>Harap bayar ke salah satu nomor rekening berikut : </span>
      </div>
      <div class="row mb-2">
        <span> Bank Mandiri : 15600098615778</span>
      </div>
      <div class="row mb-2">
        <span> OVO : 085711800082</span>
      </div>
      <div class="row mb-5">
        <span>Shoope Pay : 085711800082</span>
      </div>
      <span>Pesanan nomor OPH<?=date('dmY', $order[0]['tglorder']).$order[0]['orderid']?></span>
      <div class="row mb-2 mr-md-5 border border-1">
    <?php //var_dump($order)?>
    <?php foreach($order as $o):?>
      
        <div class="col-3 col-sm-2 col-lg-1 my-3">
          <img src="<?=base_url('assets/img/produk/').$o['poto']?>" width="50" alt="asasas">
         </div>
        <div class="col-7 col-sm-10 col-lg-11 my-3">
          <span><?=$o['namaproduk']?></span>
        </div>
      
    <?php endforeach;?>
    </div>
    <div class="row">
      <div class="col-1-lg">Total : </div>
      <div class="col-2-lg">Rp. <?=$order[0]['total']?></div>
    </div>
    <div class='row mt-4'>
      <div class="col">
        <!-- <form action="<?=base_url('order/pesan')?>" method="POST"> -->
        <?= form_open_multipart('order/pesan'); ?>
          <span class='d-block'>Masukan Bukti Pemabayaran</span>
          <input type="file" name="gambar" required>
          <input type="hidden" name="orderid" value="<?=$order[0]['orderid']?>">
          <button type="submit" class='btn btn-success d-block mt-2'>Submit Pembayaran</button>
        </form>
      </div>
      <div class="col-3">
        <form action="<?=base_url('order/batal')?>" method="post">
          <input type="hidden" name="orderid" value="<?=$order[0]['orderid']?>">
          <button type="submit" class='btn btn-danger'>Batalkan Pesanan</button>
        </form>
      </div>
    </div>
    
    <?php else:?>
      <div class="text-center">
        <h5 class="card-title">Belum Ada Pesanan</h5>
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