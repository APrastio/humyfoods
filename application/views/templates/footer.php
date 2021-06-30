

  <!-- Footer -->
  <footer class="border-top p-5">
    <div class="container">
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
  <!-- Akhir Footer -->


  <!-- Optional JavaScript -->
  
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="<?=base_url('assets/')?>js/jquery-3.4.1.min.js"></script>
  <script src="<?=base_url('assets/')?>js/popper.min.js"></script>
  <script src="<?=base_url('assets/')?>js/bootstrap.js"></script>
  <script src="<?=base_url('assets/')?>js/all.js"></script>
  <!--  -->
  <script src='<?=base_url('assets/')?>jquery-3.2.1.min.js' type='text/javascript'></script>
  <script src='<?=base_url('assets/')?>js/select2/dist/js/select2.min.js' type='text/javascript'></script>
  <!-- custome js -->
  <script>
  var button = document.getElementById("clickme"),
      count = 1;
  var span= document.getElementById("value");
  button.onclick = function() {
    count += 1;
    span.innerHTML =  count;
    document.getElementById("hasil").value = count;
  };
  var button = document.getElementById("clickme-");
  button.onclick = function() {
    count -= 1;
    if(count>=1){
    span.innerHTML = count;
    document.getElementById("hasil").value = count;
    }else{
      count = 1;
    }
    return count;
  };
  </script>
  <script>
function val() {
  x = document.getElementById("ok").value;
  var res = x.split("|"); 
  // id = document.getElementById("ok")
  var h6= document.getElementById("hasil");
  var h62= document.getElementById("total");
  // h6.innerHTML='IDR '+parseInt(x);
  document.getElementById("idbiaya").value = res[1];
  h6.innerHTML='IDR '+Intl.NumberFormat('id-ID', { maximumSignificantDigits: 3 }).format(parseInt(x));
  h62.innerHTML='IDR '+Intl.NumberFormat('id-ID', { maximumSignificantDigits: 3 }).format(parseInt(x)+<?=$total["SUM(`total`)"]?>);
  document.getElementById("totalharga").value=parseInt(x)+<?=$total["SUM(`total`)"]?>;
}
  </script>
  <script>
        $(document).ready(function(){
            
            // Initialize select2
            $("#selUser").select2();

            // Read selected option
            $('#but_read').click(function(){
                var username = $('#selUser option:selected').text();
                var userid = $('#selUser').val();
           
                $('#result').html("id : " + userid + ", name : " + username);
            });
        });
        </script>
</body>

</html>