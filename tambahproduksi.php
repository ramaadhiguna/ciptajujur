<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Produksi | Tambah Produksi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Bootstrap select -->
  <link rel="stylesheet" href="dist/css/bootstrap-select.css">  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
   <?php
    require 'db.php';
    require 'sql.php';
  session_start();
  if (isset($_SESSION["logkaryawan"])) {
    if ($_SESSION["jabatan"] == "Pemilik" || $_SESSION["jabatan"] == "Gudang") {
      ?>
          <!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Panel</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <?php
            $idkaryawan = $_SESSION["logkaryawan"];
            $result = Karyawan($idkaryawan);
            $usernameKaryawan;
            $idKarywan;
            $jabatan;
            if ($row = mysqli_fetch_object($result)) {
              $usernameKaryawan = $row->nama;
              $idkaryawan = $row->idKaryawan;
              $jabatan = $row->jabatan;
            }
            ?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"> <?php echo $usernameKaryawan ?> </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <p style="margin-top: 20%">
                  <?php echo $usernameKaryawan ?> - <?php echo $jabatan ?>
                  <small>CV Cipta Jujur Kreasi</small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="proses.php?act=logout"><i class="glyphicon glyphicon-log-out"></i>Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <?php 
        Tunjukan($jabatan);
        ?>
      
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Produksi Barang
      </h1>
    </section>
    <?php
  require "db.php";
  $tampung = array();
  $arrayBahan = array();
  $arrayBarang = array();
  $arrayBarangBaru = array();
  if(isset($_POST['Bahan'])){
    $arrayBahan=unserialize($_POST['Bahan']);
  }
  if(isset($_POST['Barang'])){
    $arrayBarang=unserialize($_POST['Barang']);
  }
  if(isset($_POST['BarangBaru'])){
    $arrayBarangBaru=unserialize($_POST['BarangBaru']);
  }
  if(isset($_POST['nBahan'])&&isset($_POST['jBahan'])&&$_POST['jBahan']!=""){
    array_push($arrayBahan, $_POST['nBahan']."|".$_POST['jBahan']);
  } 
  if(isset($_POST['nBarang'])&&isset($_POST['jBarang'])&&$_POST['jBarang']!=""){
    array_push($arrayBarang, $_POST['nBarang']."|".$_POST['jBarang']);
  }
  if(isset($_POST['idBarangBaru'])&&isset($_POST['nBarangBaru'])&&isset($_POST['jBarangBaru'])&&isset($_POST['pBarangBaru'])&&$_POST['jBarangBaru']!=""){
    $barangBaru = $_POST['idBarangBaru']."|".$_POST['nBarangBaru']."|".$_POST['jBarangBaru']."|".$_POST['pBarangBaru'];
    array_push($arrayBarangBaru,$barangBaru);
  }
  if(isset($_POST['hapusBahan'])){
    foreach($arrayBahan as $key =>$value){
      $lol = explode('|',$value);
      if($lol[0]==$_POST['hapusBahan']){
        unset($arrayBahan[$key]);
      }
    }
  }
  if(isset($_POST['hapusBarang'])){
    foreach($arrayBarang as $key =>$value){
      $lol = explode('|',$value);
      if($lol[0]==$_POST['hapusBarang']){
        unset($arrayBarang[$key]);
      }
    }
  }
  if(isset($_POST['hapusBarangBaru'])){
    foreach($arrayBarangBaru as $key =>$value){
      $lol = explode('|',$value);
      if($lol[0]==$_POST['hapusBarangBaru']){
        unset($arrayBarangBaru[$key]);
      }
    }
  }
?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- BOX INPUT BAHAN -->
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <fieldset>
                <legend> Input Bahan Digunakan</legend>
                <form action='#' method='POST'>
                  <div class="form-group">
                  <label for="inputNamaBahan" class="col-sm-2 control-label">Nama Bahan</label>
                  <div class="col-sm-10">
                    <select name='nBahan' id="nBahan" class="selectpicker form-control" data-live-search="true">
                      <?php 
                        $tampungBahan = array();
                        foreach($arrayBahan as $value){
                              $lol = explode('|',$value);
                              array_push($tampungBahan, $lol[0]);
                          }
                        while($rowProduksiBahan=mysqli_fetch_object($resultA)){
                          if(!in_array($rowProduksiBahan->idBarang, $tampungBahan)){
                            array_push($tampung, $rowProduksiBahan->idBarang);
                          echo "<option value='".$rowProduksiBahan->idBarang."|".$rowProduksiBahan->namaBarang."|".$rowProduksiBahan->kuantitas."'>".$rowProduksiBahan->idBarang." - ".$rowProduksiBahan->namaBarang."
                              </option>";}
                              }?>
                    </select>
                  </div>
                  <br>
                </div>
                <div class="form-group">
                  <label for="inputNamaBahan" class="col-sm-2 control-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input type='number' name="jBahan" id="jBahan" min=1 class="form-control" style="width: 50%">
                  </div>
                  <br>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <input type='submit'>
                    <input type='hidden' value='<?php echo serialize($arrayBahan)?>' name='Bahan'>
                    <input type='hidden' value='<?php echo serialize($arrayBarang)?>' name='Barang'>
                    <input type='hidden' value='<?php echo serialize($arrayBarangBaru)?>' name='BarangBaru'>
                  </div>
                  <br>
                </div>
                
              </form>
              </fieldset>
              
              <table id="example2" class="table table-bordered table-hover">
                <tr>
                  <th>Nama</th>
                  <th>Jumlah</th>
                  <th>Hapus</th>
                </tr>
                <?php
                  foreach($arrayBahan as $value){
                    $bahan = explode('|', $value);
                    echo "<tr>";
                    echo "<th>(".$bahan[0].") ".$bahan[1]."</th><th>".$bahan[3]."</th>";
                    echo "<th><form action='#' method='POST'>
                          <input type='hidden' value='".$bahan[0]."' name='hapusBahan'>
                          <input type='hidden' value='".serialize($arrayBahan)."' name='Bahan'>
                          <input type='hidden' value='".serialize($arrayBarang)."' name='Barang'>
                          <input type='hidden' value='".serialize($arrayBarangBaru)."' name='BarangBaru'>
                          <input type='submit' value='Hapus'>
                          </form></th>";
                    echo "</tr>";
                  }
                ?>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- BOX INPUT BARANG -->
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <fieldset>
                <legend> Input Barang Hasil Produksi</legend>
                <form action='#' method='POST'>
                <div class="form-group">
                  <label for="inputNamaBahan" class="col-sm-2 control-label">Nama Bahan</label>
                  <div class="col-sm-10">
                    <select name='nBarang' id="nBarang" class="selectpicker form-control" data-live-search="true">
                      <?php  
                        $tampungBarang = array();
                        foreach($arrayProduksiBarang as $value){
                              $lol = explode('|',$value);
                              array_push($tampungBarang, $lol[0]);
                          }
                        while($rowProduksiBarang=mysqli_fetch_object($resultB)){
                        if(!in_array($rowProduksiBarang->idBarang, $tampungBarang))
                        echo "<option value='".$rowProduksiBarang->idBarang."|".$rowProduksiBarang->namaBarang."|".$rowProduksiBarang->kuantitas."'>".$rowProduksiBarang->idBarang." - ".$rowProduksiBarang->namaBarang."</option>";
                        }?>
                    </select>
                  </div>
                  <br>
                </div>
                <div class="form-group">
                  <label for="inputNamaBarang" class="col-sm-2 control-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input type='number' name='jBarang' id="jBarang" min=1 class="form-control" style="width: 50%">
                  </div>
                  <br>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <input type='submit'>
                    <input type='hidden' value='<?php echo serialize($arrayBahan)?>' name='Bahan'>
                    <input type='hidden' value='<?php echo serialize($arrayBarang)?>' name='Barang'>
                    <input type='hidden' value='<?php echo serialize($arrayBarangBaru)?>' name='BarangBaru'>
                  </div>
                  <br>
                </div>
                    
              </form>
                
              </fieldset>
              
              <table id="example2" class="table table-bordered table-hover">
                <tr>
                  <th>Nama</th>
                  <th>Jumlah</th>
                  <th>Hapus</th>
                </tr>
                <?php
                  foreach($arrayBarang as $value){
                    $barang = explode('|', $value);
                    echo "<tr>";
                    echo "<th>(".$barang[0].") ".$barang[1]."</th><th>".$barang[3]."</th>";
                    echo "<th><form action='#' method='POST'>
                          <input type='hidden' value='".$barang[0]."' name='hapusBarang'>
                          <input type='hidden' value='".serialize($arrayBahan)."' name='Bahan'>
                          <input type='hidden' value='".serialize($arrayBarang)."' name='Barang'>
                          <input type='hidden' value='".serialize($arrayBarangBaru)."' name='BarangBaru'>
                          <input type='submit' value='Hapus'>
                          </form></th>";
                    echo "</tr>";
                  }
                ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <fieldset>
                <legend> Input Barang Produksi Baru</legend>
                <form action='#' method='POST'>
                <div class="form-group">
                  <label for="inputNamaBarangBaru" class="col-sm-2 control-label">Kode Barang</label>
                  <div class="col-sm-10">
                  <input type="text" name="idBarangBaru" id="idBarangBaru" class="form-control" style="width:50%">
                  </div>
                  <br>
                </div>
                <div class="form-group">
                  <label for="inputNamaBarangBaru" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                  <input type="text" name="nBarangBaru" id="nBarangBaru" class="form-control" style="width:50%">
                  </div>
                  <br>
                </div>
                <div class="form-group">
                  <label for="inputNamaBarangBaru" class="col-sm-2 control-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input type='number' name='jBarangBaru' id="jBarangBaru" min=1 class="form-control" style="width: 50%">
                  </div>
                  <br>
                </div>
                <div class="form-group">
                  <label for="inputNamaBarangBaru" class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-10">
                    <input type='text' name='pBarangBaru' id="pBarangBaru" min=1 class="form-control" style="width: 50%">
                  </div>
                  <tr>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <input type='submit'>
                    <input type='hidden' value='<?php echo serialize($arrayBahan)?>' name='Bahan'>
                    <input type='hidden' value='<?php echo serialize($arrayBarang)?>' name='Barang'>
                    <input type='hidden' value='<?php echo serialize($arrayBarangBaru)?>' name='BarangBaru'>
                  </div>
                  <br>
                </div>
                    
              </form>
                
              </fieldset>
              
              <table id="example2" class="table table-bordered table-hover">
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Jumlah</th>
                  <th>Keterangan</th>
                  <th>Hapus</th>
                </tr>
                <?php
                  foreach($arrayBarangBaru as $value){
                    $barang = explode('|', $value);
                    echo "<tr>";
                    echo "<th>".$barang[0]."</th><th>".$barang[1]."</th><th>".$barang[2]."</th><th>".$barang[3]."</th>";
                    echo "<th><form action='#' method='POST'>
                          <input type='hidden' value='".$barang[0]."' name='hapusBarangBaru'>
                          <input type='hidden' value='".serialize($arrayBahan)."' name='Bahan'>
                          <input type='hidden' value='".serialize($arrayBarang)."' name='Barang'>
                          <input type='hidden' value='".serialize($arrayBarangBaru)."' name='BarangBaru'>
                          <input type='submit' value='Hapus'>
                          </form></th>";
                    echo "</tr>";
                  }
                ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- BOX INSERT BUTTON -->
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <input type="button" id="insert" value="Insert" style="width: 100%">
            </div>
            <!-- /.box-body -->
          </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="#">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->
<?php
    }
    else {
      header('Location: index.php');
    }

    ?>

<?php 
  }
  else {
    header('Location: login.php');
  }

  ?>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Bootstrap select -->
<script src="dist/js/bootstrap-select.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<!-- script untuk produksi -->
<script>
  (function($){
  $(document).ready(function() {
      $("#idBarangBaru").keyup(function(){
        var ada =0;
        var id = $(this).val();
        var cekid = <?php echo json_encode($tampung); ?>;     
        for(i=0;i<cekid.length;i++){
          if(cekid[i]==id){
            ada++;
          }
        }
        if(ada>0){
          alert("Terdapat duplikasi Kode pada kode baru barang produksi");
        }
      });
      $('#nBahan').change(function(){
          var tampung = $(this).val().split("|");
          var angka = 1 * tampung[2];
          document.getElementById("jBahan").max = angka;
      });
      $('#jBahan').ready(function(){
          var tampung = $('#nBahan').val().split("|");
          var angka = 1 * tampung[2];
          document.getElementById("jBahan").max = angka;
      });
      $("#insert").click(function() {
        var bahan = <?php echo json_encode($arrayBahan); ?>;
        var barang = <?php echo json_encode($arrayBarang); ?>;
        var barangBaru = <?php echo json_encode($arrayBarangBaru); ?>;
        if(bahan.length == 0){
          alert("Isi data bahan terlebih dahulu");
        }
        else if(barang.length == 0 && barangBaru.length==0){
          alert("Isi data barang atau barang baru terlebih dahulu");
        }
        else{
        $.ajax({
              type: "POST",
              url: "manage.php?act=inserttanggalproduksi",
              data: 'tanggal=' + Date.now(),
              success: function(result) {
                $.ajax({ 
                    type: "POST",
                    url: "manage.php?act=ambiltanggalproduksi",
                    cache: false, 
                    dataType :"JSON",                         
                    success: function(data){
                      var raw_result=JSON.stringify(data.id);
                        produksi_barang(data.id);
                    }});
            
        }});}
        function produksi_barang(smth) { 
          var selesai =0;       
          for( i = 0 ;i < bahan.length ; i++){
              var tBahan = bahan[i].split("|");
              $.ajax({
                  type: "POST",
                  url: "manage.php?act=insertproduksibahan",
                  data: 'produksi_id=' + smth+ '&barang_id=' + tBahan[0]+ '&qty=' + tBahan[3]+ '&jumlah=' + tBahan[2],
                  success: function(result) {
                    selesai++;
                    if(selesai == bahan.length+barang.length+barangBaru.length){
                      window.location = "informasiproduksi.php";  
                    }
                  }
              });
          }
          for( i = 0 ;i < barang.length ; i++){
              var tBarang = barang[i].split("|");
              $.ajax({
                  type: "POST",
                  url: "manage.php?act=insertproduksibarang",
                  data: 'produksi_id=' + smth+ '&barang_id=' + tBarang[0]+ '&qty=' + tBarang[3]+ '&jumlah=' + tBarang[2],
                  success: function(result) {
                    selesai++;
                    if(selesai == bahan.length+barang.length+barangBaru.length){
                      window.location = "informasiproduksi.php";  
                    }
                  }
              });
          }
          //$barangBaru = $_POST['idBarangBaru']."|".$_POST['nBarangBaru']."|".$_POST['jBarangBaru']."|".$_POST['pBarangBaru']."|".$_POST['lBarangBaru']."|".$_POST['kBarangBaru'];
          for( i = 0 ;i < barangBaru.length ; i++){
              var tBarang = barangBaru[i].split("|");
              $.ajax({
                  type: "POST",
                  url: "manage.php?act=insertproduksibarangbaru",
                  data: 'produksi_id=' + smth+ '&barang_id=' + tBarang[0]+ '&nama=' + tBarang[1]+ '&qty=' + tBarang[2]+ '&pjg=' + tBarang[3],
                  success: function(result) {
                    selesai++;
                    if(selesai == bahan.length+barang.length+barangBaru.length){
                      window.location = "informasiproduksi.php";  
                    }
                  }
              });
          }
      }
      });
    });
})(jQuery);
</script>
<script>
jQuery(".selectpicker").selectpicker({
  width: '50%'
});
  </script>
</body>
</html>