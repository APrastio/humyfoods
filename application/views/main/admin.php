
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pengguna</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$user?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pesanan masuk</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=count($menunggu)?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-truck-loading fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


<!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Penjualan Bulan Ini</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$bulan?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Produk Terjual</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$penjualan["SUM(`qty`)"]?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-archive fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>  

            
          </div>

   


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
