<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Produk</h1>
<?= $this->session->flashdata('pesan'); ?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <a class="btn btn-primary m-0 font-weight-bold text-light" href="<?=base_url("produk/addproduk")?>">Tambah Produk</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" >
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
            <?php $i=1;foreach($listproduk as $lp):?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?=$lp["nama"]?></td>
                    <td>Rp.<?=number_format($lp["harga"], 2, ",", ".");?></td>
                    <td><?=$lp["stok"]?></td>
                    <td >
                    <a class="btn btn-warning" href="<?= base_url('produk/editprodukview/' . $lp['produkid']) ?>">
                    <i class='fas fa-fw fa-edit'></i>
                    </a>
                    <a class="btn btn-danger" href="<?= base_url('produk/deleteproduk/' . $lp['produkid']."/".$lp['poto']) ?>">
                    <i class="fas fa-fw fa-trash"></i>
                    </a>
                    </td>
                </tr>
            <?php endforeach;?>
          
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
