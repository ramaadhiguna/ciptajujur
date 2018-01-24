<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pembelian | Purchase Order</title>
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
    if ($_SESSION["jabatan"] == "Pemilik" || $_SESSION["jabatan"] == "Pembelian") {
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
            $id;
            $jabatan;
            if ($row = mysqli_fetch_object($result)) {
              $usernameKaryawan = $row->nama;
              $id = $row->idKaryawan;
              $jabatan = $row->jabatan;
            }
            ?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"> <?php echo $usernameKaryawan ?> </span>
            </a>
            <ul class="dropdown-menu">    
              <!-- Menu Sign Out-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="proses.php?act=logout" class="btn btn-default btn-flat">Sign out</a>
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
        $tampung = array();
        $tampungb = array();
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
        Tambah Pembelian
      </h1>
    </section>  
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <fieldset>
              <legend>Purchase Order</legend>
              <div class="form-horizontal">
              <div class="panel-body">
                <div class="col-sm-6 col-md-6">
                  <div id="formAwal">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Nomor PO</label>
                      <div class="col-sm-9">
                      <?php 
                        $nomorBaru;
                        $date = date("ymd");
                        while($rowNomorNota=mysqli_fetch_object($resultCekNomorNotaPembelianPO))
                          $nomorNota = $rowNomorNota->jumlah+1;
                        if($nomorNota<100){
                          $nomorBaru = "0".$nomorNota;
                          if($nomorNota<10){
                            $nomorBaru = "00".$nomorNota;
                          }
                        }
                        ?>
                      <input type="number" name="noNota" value=<?php echo $date.$nomorBaru ?> class="form-control" disabled>
                    </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Tanggal</label>
                      <div class="col-sm-9">                      
                        <input type="date" name="tanggalNota" class="form-control" value="<?php echo date("Y-m-d");?>" disabled required/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Supplier</label>
                      <div class="col-sm-9">
                        <select name="supplier" class="selectpicker form-control" data-live-search="true">
                          <option value="" disabled selected style="display: none;">[Pilih Supplier]</option>
                          <?php 
                            while($rowSupplier = mysqli_fetch_object($resultSupplier)){
                              echo "<option value='".$rowSupplier->idSupplier."'>".$rowSupplier->nama."</option>";
                            }

                          ?>
                          
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Keterangan</label>
                      <div class="col-sm-9">                      
                        <textarea class="textarea form-control" name="keterangan"
                          style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                      </div>
                    </div>              
                  </div>
                </div>
              </div>              
            </div>
            </fieldset>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- input bahan -->
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <fieldset>
              <legend>Masukan Data Barang Pembelian</legend>
              <div class="form-horizontal">
              <div class="panel-body">
                <div class="col-sm-6 col-md-6">
                  <div id="form_block">
                  <div id="formBarang"> 
                    <div class="form-group" id="divBarang">
                      <label class="col-sm-3 control-label">Barang</label>
                      <div class="col-sm-9">
                        <select name="nama-barang[]" class="selectpicker form-control" data-live-search="true">
                          <option value="" disabled selected style="display: none;">[Pilih Barang]</option>
                          <?php 
                            while($rowBarang = mysqli_fetch_object($resultB)){
                              array_push($tampung, $rowBarang->idBarang);
                              echo "<option value='".$rowBarang->idBarang."'>".$rowBarang->idBarang ."&nbsp;-&nbsp;". $rowBarang->namaBarang."</option>";
                            }
                          ?>                   
                        </select>
                      </div>
                    </div>
                    <div class="form-group" id="divJumlah">
                      <label class="col-sm-3 control-label">Jumlah Barang</label>
                      <div class="col-sm-9">
                        <input type="number" min="0" name="jumlah-barang[]" class="form-control" placeholder="Jumlah Barang"/>
                      </div>
                    </div>
                    <div class="form-group" id="divHarga">
                      <label class="col-sm-3 control-label">Harga Barang</label>
                      <div class="col-sm-9">
                        <input type="number" min="0" name="harga-barang[]" class="form-control" placeholder="Harga Barang"><br>
                        <button style="float: right;" id="remove" name="remove" class="btn btn-primary">Hapus Barang</button>
                      </div>
                    </div>
                  </div>
                </div>

                  <div id="divButton">
                    <div class="col-sm-12" style="margin-bottom: 5%">
                      <button style="float: right;" id="next" class="btn btn-primary">Tambah Barang</button>
                    </div>
                  </div>
                </div> <!-- sampai di sini -->
              </div>              
            </div>
            </fieldset>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <fieldset>
              <legend>Masukan Data Barang Baru Pembelian</legend>
              <div class="form-horizontal">
              <div class="panel-body">
                <div class="col-sm-6 col-md-6">
                  <div id="form_block_baru">
                  <div id="formBarangBaru"> 
                    <div class="form-group" id="divIdBarang">
                      <label class="col-sm-3 control-label">Id Barang</label>
                      <div class="col-sm-9">
                        <input type="text" min="0" name="id-barangBaru[]" id="idBarangBaru" class="selectpicker form-control" data-live-search="true" placeholder="Id Barang"/>
                      </div>
                    </div>
                    <div class="form-group" id="divNamaBarang">
                      <label class="col-sm-3 control-label">Nama Barang</label>
                      <div class="col-sm-9">
                        <input type="text" min="0" name="nama-barangBaru[]" class="form-control" placeholder="Nama Barang"/>
                      </div>
                    </div>
                    <div class="form-group" id="divJumlahBarang">
                      <label class="col-sm-3 control-label">Jumlah Barang</label>
                      <div class="col-sm-9">
                        <input type="number" min="0" name="jumlah-barangBaru[]" class="form-control" placeholder="Jumlah Barang"/>
                      </div>
                    </div>
                    <div class="form-group" id="divSatuanBarang">
                      <label class="col-sm-3 control-label">Satuan</label>
                      <div class="col-sm-9">
                        <input type="text" name="satuan-barangBaru[]" class="form-control" placeholder="Satuan"/>
                      </div>
                    </div>
                    <div class="form-group" id="divPanjangBarang">
                      <label class="col-sm-3 control-label">Keterangan</label>
                      <div class="col-sm-9">
                        <input type="text" value=" " name="panjang-barangBaru[]" class="form-control" placeholder="Kategori"/>
                      </div>
                    </div>
                    <div class="form-group" id="divHargaBaru">
                      <label class="col-sm-3 control-label">Harga Barang Baru</label>
                      <div class="col-sm-9">
                        <input type="number" min="0" name="harga-barangBaru[]" class="form-control" placeholder="Harga Barang Baru"><br>
                        <button style="float: right;" id="removeBaru" name="removeBaru" class="btn btn-primary">Hapus Barang Baru</button>
                      </div>
                    </div>
                  </div>
                </div>

                  <div id="divButton">
                    <div class="col-sm-12">
                      <button style="float: right;" id="nextBaru" class="btn btn-primary">Tambah Barang Baru</button>
                    </div>
                  </div>
                </div>
              </div>              
            </div>
            </fieldset>
            </div>

            <!-- /.box-body -->
          </div>
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <fieldset>
              <legend>Masukan Data Bahan Pembelian</legend>
              <div class="form-horizontal">
              <div class="panel-body">
                <div class="col-sm-6 col-md-6">
                  <div id="form_bahan">
                  <div id="formBahan"> 
                    <div class="form-group" id="divBarang">
                      <label class="col-sm-3 control-label">Bahan</label>
                      <div class="col-sm-9">
                        <select name="nama-bahan[]" class="selectpicker form-control" data-live-search="true">
                          <option value="" disabled selected style="display: none;">[Pilih Bahan]</option>
                          <?php 
                            while($rowBarang = mysqli_fetch_object($resultBahan)){
                              array_push($tampungb, $rowBarang->id);
                              echo "<option value='".$rowBarang->id."'>".$rowBarang->id." - ".$rowBarang->nama."</option>";
                            }
                          ?>                   
                        </select>
                      </div>
                    </div>
                    <div class="form-group" id="divJumlah">
                      <label class="col-sm-3 control-label">Panjang Bahan</label>
                      <div class="col-sm-9">
                        <input type="number" min="0" name="jumlah-bahan[]" class="form-control" placeholder="Jumlah Barang"/>
                      </div>
                    </div>
                    <div class="form-group" id="divHarga">
                      <label class="col-sm-3 control-label">Harga Bahan</label>
                      <div class="col-sm-9">
                        <input type="number" min="0" name="harga-bahan[]" class="form-control" placeholder="Harga Barang"><br>
                        <button style="float: right;" id="removeBahan" name="removeBahan" class="btn btn-primary">Hapus Barang</button>
                      </div>
                    </div>
                  </div>
                </div>

                  <div id="divButton">
                    <div class="col-sm-12" style="margin-bottom: 5%">
                      <button style="float: right;" id="nextBahan" class="btn btn-primary">Tambah Bahan</button>
                    </div>
                  </div>
                </div> <!-- sampai di sini -->
              </div>              
            </div>
            </fieldset>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <fieldset>
              <legend>Masukan Data Barang Baru Pembelian</legend>
              <div class="form-horizontal">
              <div class="panel-body">
                <div class="col-sm-6 col-md-6">
                  <div id="form_bahan_baru">
                  <div id="formBahanBaru"> 
                    <div class="form-group" id="divIdBarang">
                      <label class="col-sm-3 control-label">Kode Bahan</label>
                      <div class="col-sm-9">
                        <input type="text" min="0" name="id-bahanBaru[]" id="idBahanBaru" class="form-control" placeholder="Id Barang"/>
                      </div>
                    </div>
                    <div class="form-group" id="divNamaBarang">
                      <label class="col-sm-3 control-label">Nama Bahan</label>
                      <div class="col-sm-9">
                        <input type="text" min="0" name="nama-bahanBaru[]" class="form-control" placeholder="Nama Barang"/>
                      </div>
                    </div>
                    <div class="form-group" id="divJumlahBarang">
                      <label class="col-sm-3 control-label">Panjang Bahan</label>
                      <div class="col-sm-9">
                        <input type="number" min="0" name="jumlah-bahanBaru[]" class="form-control" placeholder="Jumlah Barang"/>
                      </div>
                    </div>
                    <div class="form-group" id="divPanjangBarang">
                      <label class="col-sm-3 control-label">Keterangan</label>
                      <div class="col-sm-9">
                        <input type="text" value=" " name="panjang-bahanBaru[]" class="form-control" placeholder="Kategori"/>
                      </div>
                    </div>
                    <div class="form-group" id="divHargaBaru">
                      <label class="col-sm-3 control-label">Harga Bahan Baru</label>
                      <div class="col-sm-9">
                        <input type="number" min="0" name="harga-bahanBaru[]" class="form-control" placeholder="Harga Barang Baru"><br>
                        <button style="float: right;" id="removeBarub" name="removeBarub" class="btn btn-primary">Hapus Barang Baru</button>
                      </div>
                    </div>
                  </div>
                </div>

                  <div id="divButton">
                    <div class="col-sm-12">
                      <button style="float: right;" id="nextBarub" class="btn btn-primary">Tambah Barang Baru</button>
                    </div>
                  </div>
                </div>
              </div>              
            </div>
            </fieldset>
            </div>

            <!-- /.box-body -->
          </div>
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <button id="submit" class="btn btn-info pull-right" style="width: 100%">Insert</button>
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
<!-- script untuk search -->
<script>
$(document).ready(function() {  
  var htmlBarang = $('#formBarang:eq(0)')[0].outerHTML;
  var htmlBahan = $('#formBahan:eq(0)')[0].outerHTML;
  var htmlBarangBaru = $('#formBarangBaru:eq(0)')[0].outerHTML;
  var htmlBahanBaru = $('#formBahanBaru:eq(0)')[0].outerHTML;
  $("#next").click(function() {
    $('#form_block').append(htmlBarang);
  });
  $("#nextBaru").click(function() {
    $('#form_block_baru').append(htmlBarangBaru);
  });
  $("#nextBahan").click(function() {
    $('#form_bahan').append(htmlBahan);
  });
  $("#nextBarub").click(function() {
    $('#form_bahan_baru').append(htmlBahanBaru);
  });
  $("#form_block").on('click', '#remove', function(){
        $(this).closest('#formBarang').remove();
  })
  $("#form_bahan").on('click', '#removeBahan', function(){
        $(this).closest('#formBahan').remove();
  })
  $("#form_block_baru").on('click', '#removeBaru', function(){
        $(this).closest('#formBarangBaru').remove();
  })
  $("#form_bahan_baru").on('click', '#removeBarub', function(){
        $(this).closest('#formBahanBaru').remove();
  })
  $("#idBarangBaru").on('input',function(e){
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
  $("#idBahanBaru").on('input',function(e){
        var ada =0;
        var id = $(this).val();
        var cekid = <?php echo json_encode($tampungb); ?>;     
        for(i=0;i<cekid.length;i++){
          if(cekid[i]==id){
            ada++;
          }
        }
        if(ada>0){
          alert("Terdapat duplikasi Kode pada kode baru barang produksi");
        }
      });
  $("#submit").click(function(){
    
    var noNota;
    var tanggal;
    var idSupplier;
    var karyawan = <?php echo $id?>; 
    var nama = [];
    var jumlah = [];
    var harga= [];
    var namab = [];
    var jumlahb = [];
    var hargab= [];
    var satuan = [];
    var idBaru= [];
    var namaBaru= [];
    var jumlahBaru = [];
    var panjangBaru = [];
    var hargaBaru = [];
    var idBarub= [];
    var namaBarub= [];
    var jumlahBarub = [];
    var panjangBarub = [];
    var hargaBarub = [];
    var total = 0;
    var cek=0;
    var cekBaru = 0;
    var cekada=0;
    var keterangan;
    var selesai=0;

    $('input[name="noNota"]').each( function(){ noNota = $(this).val(); });
    $('input[name="tanggalNota"]').each( function(){ tanggal = $(this).val(); });
    $('input[name="keterangan"]').each( function(){ keterangan = $(this).val(); });
    $('select[name="supplier"]').each( function(){ idSupplier = $(this).val(); });
    $('select[name="nama-barang[]"]').each( function(){ nama.push($(this).val()); });
    $('input[name="jumlah-barang[]"]').each( function(){ jumlah.push($(this).val()); });
    $('input[name="satuan-barangBaru[]"]').each( function(){ satuan.push($(this).val()); });
    $('input[name="harga-barang[]"]').each( function(){ harga.push($(this).val()); });
    $('input[name="id-barangBaru[]"]').each( function(){ idBaru.push($(this).val()); });
    $('input[name="nama-barangBaru[]"]').each( function(){ namaBaru.push($(this).val()); });
    $('input[name="jumlah-barangBaru[]"]').each( function(){ jumlahBaru.push($(this).val()); });
    $('input[name="panjang-barangBaru[]"]').each( function(){ panjangBaru.push($(this).val()); });
    $('input[name="harga-barangBaru[]"]').each( function(){ hargaBaru.push($(this).val()); });
    $('select[name="nama-bahan[]"]').each( function(){ namab.push($(this).val()); });
    $('input[name="jumlah-bahan[]"]').each( function(){ jumlahb.push($(this).val()); });
    $('input[name="harga-bahan[]"]').each( function(){ hargab.push($(this).val()); });
    $('input[name="id-bahanBaru[]"]').each( function(){ idBarub.push($(this).val()); });
    $('input[name="nama-bahanBaru[]"]').each( function(){ namaBarub.push($(this).val()); });
    $('input[name="jumlah-bahanBaru[]"]').each( function(){ jumlahBarub.push($(this).val()); });
    $('input[name="panjang-bahanBaru[]"]').each( function(){ panjangBarub.push($(this).val()); });
    $('input[name="harga-bahanBaru[]"]').each( function(){ hargaBarub.push($(this).val()); });

    for(i = 0; i < jumlah.length ; i++){
      if(nama[i] && jumlah[i] && harga[i]){
        total += harga[i] * jumlah[i];
        cekada++;
      }
      else{
        cekada = cekada;
      }
    }
    for(i = 0; i < jumlahb.length ; i++){
      if(namab[i] && jumlahb[i] && hargab[i]){
        total += hargab[i] * jumlahb[i];
        cekada++;
      }
      else{
        cekada = cekada;
      }
    }
    for(i = 0; i< idBaru.length ; i++){
      if(idBaru[i] && namaBaru[i] && jumlahBaru[i] && satuan[i] && panjangBaru[i] && hargaBaru[i]){
        total += jumlahBaru[i] * hargaBaru[i];
        cekada++;
      }
      else{
        cekada = cekada;
      }
    }
    for(i = 0; i< idBarub.length ; i++){
      if(idBarub[i] && namaBarub[i] && jumlahBarub[i] && panjangBarub[i] && hargaBarub[i]){
        total += jumlahBarub[i] * hargaBarub[i];
        cekada++;
      }
      else{
        cekada = cekada;
      }
    }

    if(idSupplier){
      if(cekada > 0){
        $("#submit").prop('disabled', true);
        $.ajax({
        type: "POST",
        url: "manage.php?act=insertpembelianpo",
        data: 'noNota=' + noNota+ '&tanggal=' + tanggal+ '&idSupplier=' + idSupplier+'&karyawan=' + karyawan + '&keterangan='+keterangan,
        success: function(result) {
          for( i = 0 ;i < nama.length ; i++){
            $.ajax({
              type: "POST",
              url: "manage.php?act=insertpembelianpobarang",
              data: 'noNota=' + noNota+ '&barang_id=' + nama[i]+ '&qty=' + jumlah[i]+ '&harga=' + harga[i],
              success: function(result) {
                selesai++;
                if(selesai == nama.length+namaBaru.length+namab.length+idBarub.length){
                  window.location = "statuspembelian.php";  
                }
              }
            });
          }
          for( i = 0 ;i < idBaru.length ; i++){
            
            $.ajax({
              type: "POST",
              url: "manage.php?act=insertpembelianpobarangBaru",
              data: 'nama=' + namaBaru[i]+ '&kuantitas=' + jumlahBaru[i]+ '&satuan='+satuan[i] + '&pjg=' + panjangBaru[i]+ '&noNota='+noNota +'&idBarang='+idBaru[i]+ '&harga='+hargaBaru[i],
              success: function(result) {
                selesai++;
                if(selesai == nama.length+namaBaru.length+namab.length+idBarub.length){
                  window.location = "statuspembelian.php";  
                }
              }
            });
          }
           for( i = 0 ;i < namab.length ; i++){
            $.ajax({
              type: "POST",
              url: "manage.php?act=insertpembelianpobahan",
              data: 'noNota=' + noNota+ '&barang_id=' + namab[i]+ '&qty=' + jumlahb[i]+ '&harga=' + hargab[i],
              success: function(result) {
                selesai++;
                if(selesai == nama.length+namaBaru.length+namab.length+idBarub.length){
                  window.location = "statuspembelian.php";  
                }
              }
            });
          }
          for( i = 0 ;i < idBarub.length ; i++){
            $.ajax({
              type: "POST",
              url: "manage.php?act=insertpembelianpobahanBaru",
              data: 'nama=' + namaBarub[i]+ '&kuantitas=' + jumlahBarub[i]+ '&pjg=' + panjangBarub[i]+ '&noNota='+noNota +'&idBarang='+idBarub[i]+ '&harga='+hargaBarub[i],
              success: function(result) {
                selesai++;
                if(selesai == nama.length+namaBaru.length+namab.length+idBarub.length){
                  window.location = "statuspembelian.php";  
                }
              }
            });
          }
        }});
      }
      else{
        alert("Tolong cek isi semua data Barang diatas");
      }
    }
    else{
      alert("Cek kembali data nota");
    }

    
  });

  function copyjenisBayar() {
    if(document.getElementById('jenisBayar').value=='T'){
      document.getElementById("caraBayar").innerHTML=''
    }
    else if(document.getElementById('jenisBayar').value=='TR'){
      document.getElementById("caraBayar").innerHTML=
      '<div class="form-group">'+
      '<label class="col-sm-3 control-label ">Nama Pemilik Rekening <span class="asterisk">*</span></label>'+
      '<div class="col-sm-9">'+
      '<input type="text" name="namaPemilikRekening" class="form-control" placeholder="Nama Pemilik Rekening" required/>'+
      '</div>'+
      '</div>'+
      '<div class="form-group">'+
      '<label class="col-sm-3 control-label ">Data Rekening <span class="asterisk">*</span></label>'+
      '<div class="col-sm-5">'+
      '<input type="number" min="0" name="nomorRekening" class="form-control" placeholder="Nomor Rekening" required/>'+
      '</div>'+
      '<div class="col-sm-4">'+
      '<select name="getBankId" class="form-control" data-placeholder="Nama Bank" required>'+
      '<option value="" style="display:none">Pilih Bank</option>'+
      '<option value="1">Bank Baca Baca</option>'+
      '<option value="2">Bank Suka Sendiri</option>'+
      '</select>'+
      '</div>'+
      '</div>'
    }
    else if(document.getElementById('jenisBayar').value=='K'){
      document.getElementById("caraBayar").innerHTML=
      '<div class="form-group" style="margin-bottom:15px;">'+
      '<label class="col-sm-3 control-label">Tanggal Jatuh Tempo <span class="asterisk">*</span></label>'+
      '<div class="col-sm-9">'+
      '<input type="date" name="tanggalJatuhTempo" class="form-control" value="<?php echo date("Y-m-d") ?>" required/>'+
      '</div>'+
      '</div>'
    }
    else if(document.getElementById('jenisBayar').value=='C'){
      document.getElementById("caraBayar").innerHTML=
      '<div class="form-group" style="margin-bottom:15px;">'+
      '<label class="col-sm-3 control-label">Nomor Cek <span class="asterisk">*</span></label>'+
      '<div class="col-sm-9">'+
      '<input type="number" min="0" name="nomorCek" class="form-control" placeholder="Nomor Cek" required/>'+
      '</div>'+
      '</div>'
    }
  }
})(jQuery);
</script>
</body>
</html>
