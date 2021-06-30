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
  <div class="card-body ml-5 mt-4">
    <?php $i=1;?>
    <?php foreach($order as $o):?>
      <h5 class="card-title">Pesanan nomor OH<?=$i++?></h5>
      <p>Telah dikirim harap Tunggu dalam beberapa hari,<br>anda dapat melacaknya dengan nomor resi : <?=$o['resi']?></p>
      <?php endforeach;?>
    
  </div>
</div>
<!-- card end -->
      <div class="row">

      </div>
    </div>
  </section>
  <!-- Akhir Features -->