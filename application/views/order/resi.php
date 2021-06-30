<div class="container my-5">
<h1 class="h3 mb-0 text-gray-800">Masukan nomor resi</h1>
<form action="<?=base_url('admin/editkirim')?>" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">No Resis</label>
    <input type="text" class="form-control" name="resi">
    <input type="hidden" class="form-control" name="orderid" value="<?=$id?>">
    <input type="hidden" class="form-control" name="status" value="Dikirim">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>