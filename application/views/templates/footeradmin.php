
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
        <div class="row justify-content-between">
        <div class="col-1">
          <a href="">
            <img src="<?=base_url('assets/')?>img/logo.png" width="60">
          </a>
        </div>
        <div class="col-4 text-right">
          <a href="">
            <img src="<?=base_url('assets/')?>img/social/fb.png">
          </a>
          <a href="">
            <img src="<?=base_url('assets/')?>img/social/twitter.png">
          </a>
          <a href="">
            <img src="<?=base_url('assets/')?>img/social/ig.png">
          </a>
        </div>
      </div>
      <div class="row mt-3 justify-content-between">
        <div class="col-5">
          <p>All Rights Reserved by Humyfoods Copyright 2021.</p>
        </div>
        <div class="col-6">
          <nav class="nav justify-content-end text-uppercase">
            <a class="nav-link active" href="#">Jobs</a>
            <a class="nav-link" href="#">Developer</a>
            <a class="nav-link" href="#">Terms</a>
            <a class="nav-link pr-0" href="#">Privacy Policy</a>
          </nav>
        </div>
      </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?=base_url('auth/logout')?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url("assets/")?>jquery/jquery.min.js"></script>
  <script src="<?= base_url("assets/")?>js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url("assets/")?>jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url("assets/")?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url("assets/")?>chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url("assets/")?>js/demo/chart-area-demo.js"></script>
  <script src="<?= base_url("assets/")?>js/demo/chart-pie-demo.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url("assets/")?>datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url("assets/")?>datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url("assets/")?>js/demo/datatables-demo.js"></script>

</body>

</html>