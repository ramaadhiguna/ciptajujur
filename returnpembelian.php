<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Karyawan | Tambah Akun</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<?php
$cmd = $_GET["cmd"];
?>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
  <?php
  session_start();
  if (isset($_SESSION["logkaryawan"])) {
    require 'db.php';
    require 'sql.php';
  }
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
        Laporan Penerimaan Barang
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box" style="width: 70%; margin: auto; margin-top: 5%">
            
            <!-- /.box-header -->
            <fieldset>
              <legend style="text-align: center;">Data Laporan Penerimaan Barang</legend>
              <form class="form-horizontal">
              <?php 
              $resultPembelian = POPembelian($cmd);
              if($row = mysqli_fetch_object($resultPembelian)){
                echo "<div class=box-body>
                  <div class=form-group>
                  <label for=inputNamaKaryawan class=col-sm-2 control-label>Nomor LPB</label>
                    <div class=col-sm-10>
                      <input type=text name=noNota value='".$cmd."' disabled autofocus class=form-control>
                    </div>
                  </div>
                  <div class=form-group>
                  <label for=inputNamaKaryawan class=col-sm-2 control-label>Tanggal</label>
                    <div class=col-sm-10>
                      <input type=date name=tanggal value='".date("Y-m-d")."' autofocus class=form-control>
                    </div>
                  </div>
                  <div class=form-group>
                  <label for=inputNamaKaryawan class=col-sm-2 control-label>Nama Perusahaan</label>
                    <div class=col-sm-10>
                      <input type=text value='".$row->nama."'' disabled autofocus class=form-control>
                      <input type=hidden name=supplier value='".$row->idSupplier."'>
                    </div>
                  </div>
                </div>";
              }
              ?>
              <?php
              $resultKirim = LPBPOPembelian($cmd);
              while($rowKirim = mysqli_fetch_object($resultKirim)){
              echo "<div class=box-body>
                      <div class=form-group>
                      <label for=inputNamaKaryawan class=col-sm-2 control-label>Nama Barang</label>
                        <div class=col-sm-10>
                          <select name=idBarang[] disabled class=form-control>
                            <option value='".$rowKirim->Barang_idBarang."'>(".$rowKirim->Barang_idBarang.") ".$rowKirim->namaBarang."</option>                                        
                          </select>
                        </div>
                      </div>
                      <div class=form-group>
                        <label for=inputUserKaryawan class=col-sm-2 control-label>Jumlah</label>
                          <div class=col-sm-10>
                            <input type=number name=jumlah[] placeholder='Jumlah terima menurut LPB = ".$rowKirim->qty."' required autofocus class=form-control>
                          </div>
                      </div>              
                    </div>";
                  }
              ?>
              <?php
              $resultKirim = LPBPOPembelianBahan($cmd);
              while($rowKirimb = mysqli_fetch_object($resultKirim)){
              echo "<div class=box-body>
                      <div class=form-group>
                      <label for=inputNamaKaryawan class=col-sm-2 control-label>Nama Bahan</label>
                        <div class=col-sm-10>
                          <select name=idBahan[] disabled class=form-control>
                            <option value='".$rowKirimb->bahan_id."'>(".$rowKirimb->bahan_id.") ".$rowKirimb->nama."</option>                                        
                          </select>
                        </div>
                      </div>
                      <div class=form-group>
                        <label for=inputUserKaryawan class=col-sm-2 control-label>Jumlah</label>
                          <div class=col-sm-10>
                            <input type=number name=jumlahb[] placeholder='".$rowKirimb->panjang."'required autofocus class=form-control>
                            <input type=hidden name=hargab[] value=".$rowKirimb->harga.">
                          </div>
                      </div>              
                    </div>";
                  }
              ?>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" id="Kirim" name="Kirim" class="btn btn-info pull-right">Insert</button>
              </div>
              <!-- /.box-footer -->
            </form>

            </fieldset>
            
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
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
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
<script>
  $("#Kirim").click(function(){
    alert("lol");
    var id ="";
    var cekqty=0;
    var barang = [];
    var qty = [];
    var bahan = [];
    var qtyb = [];
    var selesai = 0;
    $('input[name="noNota"]').each( function(){ id = $(this).val(); });
    $('select[name="idBarang[]"]').each( function(){ barang.push($(this).val()); });
    $('input[name="jumlah[]"]').each( function(){ qty.push($(this).val()); });
    $('select[name="idBahan[]"]').each( function(){ bahan.push($(this).val()); });
    $('input[name="jumlahb[]"]').each( function(){ qtyb.push($(this).val()); });
    for( i = 0 ;i < barang.length ; i++){
      $.ajax({
        type: "POST",
        url: "manage.php?act=returpembelianbarang",
        data: 'noNota=' + id+ '&barang_id=' + barang[i]+ '&qty=' + qty[i],
        success: function(result) {
          selesai++;
          if(selesai == bahan.length+barang.length){
            window.location ="returbarang.php";
          }
      }});
    } 
    /*for( i = 0 ;i < bahan.length ; i++){
      $.ajax({
        type: "POST",
        url: "manage.php?act=returpembelianbahan",
        data: 'noNota=' + noNota+ '&barang_id=' + bahan[i]+ '&qty=' + qtyb[i],
        success: function(result) {
          selesai++;
          if(selesai == bahan.length+barang.length){
            window.location = "statuspembelian.php";  
          }
      }});
    }*/
  });
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<!-- script untuk search -->
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("example2");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<!-- script untuk edit -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'modalbarang.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>
</body>
</html>