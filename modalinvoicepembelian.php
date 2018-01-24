<?php
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kerjapraktek";

    $koneksi = new mysqli($servername, $username, $password, $dbname);
    require 'db.php';
    require 'sql.php';
		if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
       if ($row= mysqli_fetch_object($resultPembelian)) {
        echo "<div class=box-body>
                      <div class=form-group>
                      <label for=inputBayarn class=col-sm-2 control-label>Nomor Nota</label>
                        <div class=col-sm-10>
                          <input type=text class=form-control disabled name=idnota value='".$id."'>
                        </div>
                      </div>
                      <div class=form-group>
                        <label for=inputUserKaryawan class=col-sm-2 control-label>Tanggal</label>
                          <div class=col-sm-10>
                            <input type=text disabled class=form-control name=idnota value='".$row->tanggal."'>
                          </div>
                      </div>
                      <div class=form-group>
                        <label for=inputUserKaryawan class=col-sm-2 control-label>Nama Supplier</label>
                          <div class=col-sm-10>
                            <input type=text disabled class=form-control name=idnota value='".$row->nama."'>
                          </div>
                      </div>";
                      $resultBarang = PembelianBarang($row->id);
                      while ($rowBarang = mysqli_fetch_object($resultBarang)) {
        echo "<div class=box-body>
                      <div class=form-group>
                      <label for=inputBayarn class=col-sm-2 control-label class=form-control>Kode Barang</label>
                        <div class=col-sm-10>
                          <input type=text class=form-control disabled name=idnota value='".$rowBarang->idBarang."'>
                        </div>
                      </div>
                      <div class=form-group>
                        <label for=inputUserKaryawan class=col-sm-2 control-label class=form-control>Nama Barang</label>
                          <div class=col-sm-10>
                            <input type=text disabled class=form-control name=idnota value='".$rowBarang->namaBarang."'>
                          </div>
                      </div>
                      <div class=form-group>
                        <label for=inputUserKaryawan class=col-sm-2 control-label>Kuantitas</label>
                          <div class=col-sm-10>
                            <input type=text disabled class=form-control name=idnota value='".$rowBarang->kuantitas."'>
                          </div>
                      </div>
                      <div class=form-group>
                        <label for=inputUserKaryawan class=col-sm-2 control-label>Harga</label>
                          <div class=col-sm-10>
                            <input type=text disabled class=form-control name=idnota value='".$rowBarang->harga."'>
                          </div>
                      </div>
                      <div class=form-group>
                        <label for=inputUserKaryawan class=col-sm-2 control-label>Total</label>
                          <div class=col-sm-10>
                            <input type=text disabled class=form-control name=idnota value='".$rowBarang->harga*$rowBarang->kuantitas."'>
                          </div>
                      </div>";
                        };  
        echo "</div>";

       }
        
    }
    $koneksi->close();
?>