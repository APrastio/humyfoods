         <!-- Begin Page Content -->
         <div class="container">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
               <h1 class="h3 mb-0 text-gray-800">Detail Pesanan</h1>
            </div>
            <!-- Content Row -->
            <div class="row mt-4">
               <div class="col">
                  <div class="table-responsive">
                     <table class="table table-bordered">
                        <tr>
                            <th>Nama Customer</th>
                            <td colspan="2"><?=$pesanan[0]['namacustomer']?></td>
                        </tr>
                        <?php foreach($pesanan as $p):?>
                        <tr>
                            <th>Nama Produk</th>
                            <td colspan="2"><?=$p['nama']?></td>
                        </tr>
                        <tr>
                           <th>Jumlah Pesanan</th>
                           <td colspan="2"><?=$p['qty']?></td>
                        </tr>
                        <?php endforeach;?>
                        <tr>
                           <th>Kurir</th>
                           <td colspan="2"><?=$pesanan[0]['kurir']?></td>
                        </tr>
                        <tr>
                           <th>Alamat</th>
                           <td colspan="2"><?=$pesanan[0]['alamat'].','.$pesanan[0]['namakota'].','.$pesanan[0]['kodepos']?></td>
                        </tr>
                        <tr>
                           <th>Jenis Paket</th>
                           <td colspan="2"><?=$pesanan[0]['jenis']?></td>
                        </tr>
                        <tr>
                           <th>Total</th>
                           <td colspan="2"><?=$pesanan[0]['total']?></td>
                        </tr>
                        <tr>
                           <th>Tanggal Pemesanan</th>
                           <td colspan="2"><?= date('d/m/Y', $pesanan[0]['tglorder']) ?></td>
                        </tr>
                        <tr>
                           <th>Nomor telepon</th>
                           <td colspan="2"><?=$pesanan[0]['tlp']?></td>
                        </tr>
                     </table>
                  </div>
               </div>
            </div>
            <label class='d-block mt-4'>Bukti Pembayaran</label>
<img src="<?=base_url('assets/img/buktibayar/'.$pesanan[0]['buktipembayaran'])?>" class='border' alt="gagal">
         </div>
         <!-- /.container-fluid -->

         </div>
         <!-- End of Main Content -->