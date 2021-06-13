<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Produk</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="btn btn-primary m-0 font-weight-bold text-light"><a>Tambah Produk</a></h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
            <?php $a = array(["nama"=>"bakso","harga"=>"100000","stok"=>"12"],
            ["nama"=>"kadal","harga"=>"100000","stok"=>"12"]);?>
            <?php foreach($a as $c):?>
                <tr>
                    <td><?=$c["nama"]?></td>
                    <td><?=$c["harga"]?></td>
                    <td><?=$c["stok"]?></td>
                    <td><a class="badge badge-success" href="">Edit</a> <a class="badge badge-success" href="">Ha</a> </td>
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
