<?php
    require 'db.php';

		if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        $sql = "SELECT * FROM barang WHERE idBarang='". $id ."';";
        $result = mysqli_query($link,$sql);
        if ($row = mysqli_fetch_object($result)) { ?>
            <form action="manage.php?act=ubahbarang" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" value="<?php echo $row->namaBarang; ?>">
            </div>
            <div class="form-group">
                <label>Kuantitas</label>
                <input type="text" class="form-control" name="kuantitas_barang" value="<?php echo $row->kuantitas; ?>">
            </div>
            <div class="form-group">
                <label>Minimum</label>
                <input type="text" class="form-control" name="minimum_barang" value="<?php echo $row->minimum; ?>">
            </div>
            <div class="form-group">
                <label>Kuantitas</label>
                <input type="text" class="form-control" name="satuan_barang" value="<?php echo $row->satuan; ?>">
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control" name="keterangan_barang" value="<?php echo $row->keterangan; ?>">
            </div>
              <button class="btn btn-primary" type="submit">Update</button>
        </form>
        <?php 
 
        }
    }
?>