     <div class="container">
      <div class="py-5 ">
        <h2>Tambah Produk</h2>
      </div>

        <div class="col-md-8 order-md-1">
        <?= form_open_multipart('produk/addproduk'); ?>
            <div class="row">
              <div class="col mb-3">
                <label for="namaproduk">Nama Produk</label>
                <input type="text" class="form-control" name="namaproduk" id="namaproduk">
                <?= form_error('namaproduk', ' <small class="text-danger pl-3">', '</small>') ?>
              </div>
            </div>

            <div class="mb-3">
              <label for="harga">Harga</label>
              <input type="text" class="form-control" name="harga" id="harga" placeholder="" >
            </div>

            <div class="mb-3">
              <label for="stok">Stok barang</label>
              <input type="text" class="form-control" name="stok" id="stok" placeholder="" >
            </div>
            
            <div class="form-group">
              <label for="deskripsi">Deskripsi Produk</label>
              <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"></textarea>
            </div>
            
            <div class="form-group">
              <label for="gambar">Poto Produk</label>
              <input type="file" name="gambar" class="form-control-file" id="gambar">
            </div>

            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-3">
     </footer>
    </div>