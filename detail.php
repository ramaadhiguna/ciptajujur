<?php
require 'db.php';
		if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        $sql = "SELECT * FROM karyawan WHERE idKaryawan = $id";
        $result = mysqli_query($link,$sql);
        if ($row = mysqli_fetch_object($result)) { ?>
            <form action="manage.php?act=ubahkaryawan" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label>Nama Karyawan</label>
                <input type="text" class="form-control" name="nama_karyawan" value="<?php echo $row->nama; ?>">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat_karyawan" value="<?php echo $row->alamat; ?>">
            </div>
            <div class="form-group">
                <label>Kontak</label>
                <input type="text" class="form-control" name="kontak_karyawan" value="<?php echo $row->kontak; ?>">
            </div>
            
            <div class="form-group">
	            <label>Jabatan</label>
	            <select name="jabatan_karyawan" class="form-control">
		        	<option value="Penjualan">Penjualan</option>
		            <option value="Pembelian">Pembelian</option>
		            <option value="Gudang">Gudang</option>
	        	</select>
            </div>
            <div class="form-group">
                <label>Status</label>
                
                <select name="status_karyawan" class="form-control">
                    <?php if ($row->status == 0) { ?>
                    <option value='"<?php echo $row->status ?>"'> Aktif </option>
                    <option value="1"> Tidak Aktif </option>
                    <?php }
                    elseif ($row->status == 1) {
                    ?>
                    <option value='"<?php echo $row->status ?>"'> Tidak Aktif </option>
                    <option value="1">  Aktif </option>
                    <?php } ?>
                </select>
            </div>
              <button class="btn btn-primary" type="submit">Update</button>
        </form>
        <?php 
 
        }
    }
?>