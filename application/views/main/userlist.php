<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Customer</h1>
<?= $this->session->flashdata('pesan'); ?>
<!-- DataTales Example -->
<div class="card shadow mb-4"><!-- 
  <div class="card-header py-3">
    <a class="btn btn-primary m-0 font-weight-bold text-light" href="<?=base_url("produk/addproduk")?>">Ubah Password Admin</a>
  </div> -->
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" >
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Customer</th>
            <th>Alamat</th>
            <th>No Telepon</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Nama Customer</th>
            <th>Alamat</th>
            <th>No Telepon</th>
          </tr>
        </tfoot>
        <tbody>
            <?php $i=1;foreach($listuser as $lu):?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?=$lu["nama"]?></td>
                    <td><?=$lu["alamat"].','.$lu['namakota'].','.$lu['kodepos'];?></td>
                    <td><?=$lu["tlp"];?></td>
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
