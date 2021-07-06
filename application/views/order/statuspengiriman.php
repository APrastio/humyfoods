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
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('order/orderpayment')?>">Belum Dibayar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="<?=base_url('order/statuspengiriman')?>">Status Pengiriman</a>
      </li>
    </ul>
  </div>
  <?php if($order):?>
  <?php $i=1;?>
    <?php foreach($order as $o):?>
  <div class="card-body ml-5 mt-4 mb-4  mr-5 border border-1">
      <h5 class="card-title">Pesanan nomor OPH<?=date('dmY', $o['tglorder']).$o['orderid']?></h5>
      <?php if($o['status']=='Dikirim'):?>
      <p>Telah dikirim harap Tunggu dalam beberapa hari,<br>anda dapat melacaknya dengan nomor resi : <?=$o['resi']?></p>
      <?php elseif($o['status']=='Menungu Konfirmasi'):?>
      <p>Sedang Diproses</p>

      <?php endif;?>
    
  </div>
<?php endforeach;?> 
<?php else:?>
  <div class="text-center my-5">
        <h5 class="card-title">Belum Ada Pesanan</h5>
        <a href="<?=base_url('customer/catalog')?>" class="btn btn-primary">Belanja Sekarang</a>
      </div>
<?php endif;?>
</div>
<!-- card end -->
      <div class="row">

      </div>
    </div>
  </section>
  <!-- Akhir Features -->