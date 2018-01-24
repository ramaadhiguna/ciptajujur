<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pembelian | Status Pembelian</title>
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
      <!-- datatables -->
  <link href="plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
  <link href="plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
  <link href="plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
</head>
<?php
  session_start();
  if (isset($_SESSION["logkaryawan"])) {
    require 'db.php';
    require 'sql.php';
  }
    ?>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
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
        Status Pembelian
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nomor Nota</th>
                  <th>Tanggal</th>
                  <th>Supplier</th>
                  <th>Daftar Barang</th> 
                  <th>Status Pembayaran</th>       
                </tr>
                </thead>
                <tbody>
                <?php
                
                while($rowPembelian = mysqli_fetch_object($resultPembelian)) {
                    $total = 0;
                    echo "<tr>";
                    echo "<td>".$rowPembelian->id."</td>";
                    echo "<td>".$rowPembelian->tanggal."</td>";
                    echo "<td>".$rowPembelian->nama."</td>";
                    echo "<td>";
                    $resultBarang = PembelianBarang($rowPembelian->id);
                    while($rowBarang = mysqli_fetch_object($resultBarang)){
                      $total += $rowBarang->kuantitas*$rowBarang->harga;
                      echo $rowBarang->idBarang."-".$rowBarang->namaBarang." = ".$rowBarang->kuantitas." x Rp".$rowBarang->harga.",00 = Rp".$rowBarang->kuantitas*$rowBarang->harga.",00";
                      echo "</br>";
                    }
                    $resultBahan = PembelianBahan($rowPembelian->id);
                    while($rowBahan = mysqli_fetch_object($resultBahan)){
                      $total += $rowBahan->kuantitas*$rowBahan->harga;
                      echo $rowBahan->id."-".$rowBahan->nama." = ".$rowBahan->kuantitas." x Rp".$rowBahan->harga.",00 = Rp".$rowBahan->kuantitas*$rowBahan->harga.",00";
                      echo "</br>";
                    }
                    echo "</td>";
                    if($rowPembelian->saldo < $total){
                      echo "<td><a href='#myModal' class='btn btn-default btn-small' id='custId' data-toggle='modal' data-id=".$rowPembelian->id.">Belum Lunas</a></td>";
                    }
                    else if($rowPembelian->saldo > $total){
                      echo "<td><a href='#myModal' class='btn btn-default btn-small' id='custId' data-toggle='modal' data-id=".$rowPembelian->id.">Refund</a></td>";
                    }
                    else{
                      echo "<td>Lunas</td>";
                    }
                    
                    echo "</tr>";
                } ?>
                </tbody>
                
              </table>
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Konfirmasi Pengiriman</h4>
                        </div>
                        <div class="modal-body">
                            <div class="fetched-data"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        </div>
                    </div>
                </div>
             </div>
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
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'pageLength'  : 10,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<!-- script untuk edit -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'modalkonfirmasibayarpembelian.php',
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