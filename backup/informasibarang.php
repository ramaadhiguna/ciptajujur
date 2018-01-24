<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Informasi Karyawan</title>
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
  <link href="css/styleinformasibarang.css" rel="stylesheet" type="text/css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
      <button class="sidebar-toggle"> LOGOUT </button>

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
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Barang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Informasi Barang</a></li>
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
            <li><a href="informasigudang.php""><i class="fa fa-circle-o"></i> Informasi Gudang</a></li>
            <li><a href="tambahgudang.php""><i class="fa fa-circle-o"></i> Tambah Gudang</a></li>
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
            <li> <a href="tambahkaryawan.php"><i class="fa fa-circle-o"></i> Tambah Karyawan</a></li>
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
            <li><a href="#"><i class="fa fa-circle-o"></i> Laporan Laba Rugi</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Laporan C</a></li>
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
        Informasi Karyawan
        <small>Control panel</small>
      </h1>
    </section>
    <!-- Main content -->
    <?php
        require 'db.php';
        $sql = "SELECT * FROM `barang` where Kategori_id IN(select id from `kategori` where jenis = 'Barang Jadi')";
        $result = mysqli_query($link,$sql);
        $sqlKategori = "select * from Kategori where jenis='Barang Jadi';";
        $resultKategori = mysqli_query($link,$sqlKategori);
        if(!$result){
          die("SQL Error :".$sql);
        }
    ?>

    <script src="js/jquery-2.1.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    
        <table class="table-informasi" id="myTable">
        <thead>
        <tr> 
          <th>Nama Barang</th><th>Jenis</th><th>Kuantitas</th><th>Ukuran</th><th>Edit</th>
        </tr>
        </thead>
        <tbody>
        <?php
                while($row = mysqli_fetch_object($result)) {
                    $sqlLol = "SELECT * FROM `kategori` WHERE id ='".$row->Kategori_id."';";
                    $resultLol = mysqli_query($link,$sqlLol);
                    $rowLol = mysqli_fetch_object($resultLol);
                    echo "<tr>";
                    echo "<td>".$row->nama."</td><td>".$rowLol->nama."</td><td>".$row->quantity."</td><td>".$row->keterangan."</td><td>"."<button type='button' class='selected' value='".$row->id."' id='btnOuch'> edit </button>";


                    //echo "<button type='button' value='1'> edit </button>"
                    
                    //echo "<td>".$row->nama."</td><td>".$rowLol->nama."</td><td>".$row->quantity."</td><td>".$row->keterangan."</td><td>"."<a href='#' id='myBtn'>edit</a>";
                    //echo "<td>".$row->nama."</td><td>".$rowLol->nama."</td><td>".$row->quantity."</td><td>".$row->keterangan."</td><td>"."<button class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal' >Open Modal</button>";
                      //"<a id='btnOuch' data-toggle='modal' data-target='#myModal'>edit</a>";

                    //echo "<input type='hidden' id='idbarang' value='".$row->id."'/>";
                    echo "</tr>";
                     } ?>
                     <script>
                          $( ".selected" ).each(function(index) {
                              $(this).on("click", function(){

                              alert($(this).attr('value')); 
                                });
                            });
                     </script>
                     <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                      <div class="modal-dialog">
                      
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modal Header</h4>
                          </div>
                          <div class="modal-body">
                            
                           <?php
                              require 'db.php';

                              $var = 2;
                              $sql = "select * from barang where id=".$var;
                              
                              $sqlKategori = "select * from kategori where jenis='Barang Jadi';";
                              $resultKategori = mysqli_query($link,$sqlKategori);
                              $result = mysqli_query($link, $sql);
                              if(!$result) {
                                  die("SQL Error: ".$sql);
                              }
                              else{
                                $row = mysqli_fetch_object($result);
                              }
                          ?>
                          <form action="manage.php?act=ubahbarang" method="POST">
                                      Nama : <input type="text" name="nama" value="<?php echo $row->nama;?>"><br/>
                                      Kuantitas : <input type="number" name="kuantitas" value="<?php echo $row->quantity;?>"><br/>
                                      Kategori : <select name="kategori" >
                                                <?php while($rowLol = mysqli_fetch_object($resultKategori)){
                                                echo "<option value='".$rowLol->id."'>".$rowLol->nama."</option>";
                                              
                                          }
                                          ?>
                                             </select></br>
                                      Ukuran : <input type="text" name="keterangan" value="<?php echo $row->keterangan;?>">
                                              <input type="hidden" name="id" value="<?php echo $var?>">
                                      <input type="submit" value="Update" style="margin-left: 50%;">
                          </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
        </tbody>
    </table>
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
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
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
