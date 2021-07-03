<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Pesanan</h1>
<?= $this->session->flashdata('pesan'); ?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" >
        <thead>
          <tr>
            <th>Nama Customer</th>
            <th>Jumlah Pesanan</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Nama Customer</th>
            <th>Jumlah Pesanan</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
            <?php foreach($listpesanan as $lp):?>
                <tr>
                    <td><?=$lp["nama"]?></td>
                    <td><?=$lp["qty"];?></td>
                    <td><?=$lp["status"];?></td>
                    <td >
                    <a class="btn btn-success" href="<?= base_url('admin/editkirimview/' . $lp['orderid']) ?>">
                    Detail
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
