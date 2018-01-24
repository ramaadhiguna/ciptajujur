<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" type="text/css" href="css/css_produksi/style.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b> Sonny </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
      <form action="login.php" method="POST">
      <button class="sidebar-toggle"> LOGOUT </button>
      </form>

      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Barang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="informasibarang.php"><i class="fa fa-circle-o"></i> Informasi Barang</a></li>
            <li><a href="tambahbarang.php"><i class="fa fa-circle-o"></i> Tambah Barang</a></li>
          </ul>
        </li>
        
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Bahan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="informasibahan.php"><i class="fa fa-circle-o"></i> Informasi Bahan</a></li>
            <li><a href="tambahbahan.php"><i class="fa fa-circle-o"></i> Tambah Bahan</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Gudang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="informasigudang.php"><i class="fa fa-circle-o"></i> Informasi Gudang</a></li>
            <li><a href="tambahgudang.php"><i class="fa fa-circle-o"></i> Tambah Gudang</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Karyawan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="informasikaryawan.php"><i class="fa fa-circle-o"></i> Informasi karyawan</a></li>
            <li> <a href="tambahkaryawan.php"><i class="fa fa-table"></i> Tambah Karyawan</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li> <a href="#"><i class="fa fa-circle-o"></i> Laporan Arus Kas</a></li>
            <li><a href="informasibarang.html"><i class="fa fa-circle-o"></i> Laporan Laba Rugi</a></li>
            <li><a href="editbarang.html"><i class="fa fa-circle-o"></i> Laporan C</a></li>
          </ul>
        </li>
      
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Menambahkan Produksi Bahan
        <small>Control panel</small>
      </h1>
    </section>
    <?php
        require 'db.php';
        $sqlBahan = "SELECT b.id,b.nama,b.keterangan FROM barang b,kategori k WHERE b.Kategori_id = k.id and k.jenis = 'Bahan Produksi'";
        $sqlBarang = "SELECT b.id,b.nama,b.keterangan FROM barang b,kategori k WHERE b.Kategori_id = k.id and k.jenis = 'Barang Jadi'";
        $sqlKaryawan = "SELECT * FROM `karyawan`b where jabatan ='Penjahit'";
        $resultBahan = mysqli_query($link,$sqlBahan);
        $resultBarang = mysqli_query($link,$sqlBarang);
        $resultKaryawan = mysqli_query($link,$sqlKaryawan);
        $sqlKategori = "select * from Kategori where jenis='Bahan Produksi';";
        $resultKategori = mysqli_query($link,$sqlKategori);
        if(!$resultBahan){
          die("SQL Error :".$sql);
        }
        if(!$resultBarang){
          die("SQL Error :".$sql);
        }
        if(!$resultKaryawan){
          die("SQL Error :".$sql);
        }
    ?>
    <!-- Main content -->
    <div id="form_block_bahan" > <!-- added an outside wrapper -->
      <div id="form_bahan">
        <fieldset>
          <legend> Masukkan Jumlah Bahan Terpakai</legend>
          <table>
            <tr>
              <td>Nama: &nbsp; &nbsp;</td>
              <td> <select name="nama[]" style="width: 100%">
                        <?php while($rowBahan=mysqli_fetch_object($resultBahan)){
                            echo "<option value='".$rowBahan->id."'>".$rowBahan->nama."</option>";

                            }?>
                    </select> 
              </td>
            </tr>
            <tr>
              <td> Kuantitas: &nbsp; &nbsp;</td>
              <td> <input type="number" name="kuantitas[]" style="width: 100%"> </td>
            </tr>
            <tr>
              <td colspan="2"> 
                <input type="hidden" name="hidden[]" value="bahan">
                <input type="button" name="remove" value="Remove" style="width: 50%">
              </td>
            </tr>
            <tr>
            <input type="button" value="Tambah Bahan" id="addBahan" style="width: 50%">
            </tr>
          </table>
       <br>
        </fieldset>
        
        
      </div>
    </div> <!-- close #form_block_wrapper -->

    <div id="form_block_barang"> <!-- added an outside wrapper -->
      <div id="form_barang" class="barang">
        <fieldset>
          <legend> Masukkan Jumlah Barang yang diproduksi</legend>
          <table>
            <tr>
              <td>Nama: &nbsp; &nbsp;</td>
              <td> <select name="nama[]">
                    <?php while($rowBarang=mysqli_fetch_object($resultBarang)){
                        echo "<option value='".$rowBarang->id."'>".$rowBarang->nama." (".$rowBarang->keterangan.")</option>";

                        }?>
                    </select>
              </td>
            </tr>
            <tr>
              <td> Kuantitas: &nbsp; &nbsp;</td>
              <td> <input type="number" name="kuantitas[]" style="width: 100%;">  </td>
            </tr>
            <tr>
              <td colspan="2">
                <input type="hidden" name="hidden[]" value="bahan">
                <input type="button" name="remove" value="Remove" style="width: 50%">
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <input type="button" value="Tambah Barang" id="addBarang" style="width: 50%">
              </td>
            </tr>
          </table>
        </fieldset>
      </div>
    </div>

    <div id="form_block_karyawan">
      <div id="form_karyawan" class="karyawan">
        <fieldset>
          <legend>
            Masukkan Petugas Produksi Barang</legend>
            <table>
              <tr>
                <td>Nama: &nbsp; &nbsp;</td>
                <td>
                  <select name="namaKaryawan[]">
                    <?php while($rowKaryawan=mysqli_fetch_object($resultKaryawan)){
                        echo "<option value='".$rowKaryawan->id."'>".$rowKaryawan->nama."</option>";

                        }?>
                    </select> 
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <input type="hidden" name="hidden[]" value="bahan">
                  <input type="button" name="remove" value="Remove">
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <input type="button" value="Tambah Penjahit" id="addKaryawan">
                </td>
              </tr>
            </table>
        </fieldset>
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Jquery rama -->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>

<script>
(function($){
  $(document).ready(function() {
      //get and cache HTML for this block
      
      var selectHtml = $('.form_bahan:eq(0)')[0].outerHTML
      var selectHtml1 = $('.form_barang:eq(0)')[0].outerHTML
      var selectHtml2 = $('.form_karyawan:eq(0)')[0].outerHTML

      $("#addBahan").click(function() {
          alert("ngentot");
          $('#form_block_bahan').append(selectHtml);

      });
      $("#addBarang").click(function() {
          $('#form_block_barang').append(selectHtml1);
      });
      $("#addKaryawan").click(function() {
          $('#form_block_karyawan').append(selectHtml2);
      });
      //use .on for events on dynamic content ( event delegation )
     $("#form_block_bahan").on('click', 'input[name="remove"]', function() {
         $(this).closest(".form_bahan").remove();
     });
     $("#form_block_barang").on('click', 'input[name="remove"]', function() {
         $(this).closest(".form_barang").remove();
     });
     $("#form_block_karyawan").on('click', 'input[name="remove"]', function() {
         $(this).closest(".form_karyawan").remove();
     });


      $("#insert").click(function() {
        var nama = [];
        var kuantitas = [];
        var karyawan = [];
        $('select[name="nama[]"]').each( function(){
              nama.push($(this).val());
        });
        $('input[name="kuantitas[]"]').each( function(){
              kuantitas.push($(this).val());
        });
        $('select[name="namaKaryawan[]"]').each( function(){
              karyawan.push($(this).val());
        });
        $.ajax({
              type: "POST",
              url: "queryproduksi.php",
              data: 'tanggal=' + Date.now(),
              success: function(result) {
                  $.ajax({ 
                        type: "POST",
                        url: "queryambiltanggal.php",
                        cache: false, 
                        dataType :"JSON",                         
                        success: function(data){
                            //alert(data.id);
                            //a=data.id;
                            //alert(a);
                            var raw_result=JSON.stringify(data.id);
                            produksi_barang(data.id);
                        }});
                  window.location = "gudangbahan.php";
              }});
      function produksi_barang(smth) {        
         alert(smth);
         for( i = 0 ;i < nama.length ; i++){
            //alert(nama[i]+" "+kuantitas[i]+" "+smth);
            $.ajax({
                type: "POST",
                url: "queryproduksibarang.php",
                data: 'produksi_id=' + smth+ '&barang_id=' + nama[i]+ '&qty=' + kuantitas[i],
                success: function(result) {

                }
            });
         }
         for( i = 0 ;i < karyawan.length ; i++){
            $.ajax({
                type: "POST",
                url: "queryproduksikaryawan.php",
                data: 'produksi_id=' + smth+ '&karyawan_id=' + karyawan[i],
                success: function(result) {
                   window.location = "gudangbahan.php";
                }
            });
         }
    }
      });

  });
})(jQuery);
</script>
