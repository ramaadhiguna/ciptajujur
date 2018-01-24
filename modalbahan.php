<?php
    require 'db.php';

        if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        $sql = "SELECT * FROM bahan WHERE id='". $id ."';";
        $result = mysqli_query($link,$sql);
        if ($row = mysqli_fetch_object($result)) { ?>
            <form action="manage.php?act=ubahbahan" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" class="form-control" name="nama_bahan" value="<?php echo $row->nama; ?>">
            </div>
            <div class="form-group">
                <label>Panjang</label>
                <input type="text" class="form-control" name="panjang_bahan" value="<?php echo $row->panjang; ?>">
            </div>
            <div class="form-group">
                <label>Lebar</label>
                <input type="text" class="form-control" name="lebar_bahan" value="<?php echo $row->lebar; ?>">
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control" name="keterangan_bahan" value="<?php echo $row->keterangan; ?>">
            </div>
              <button class="btn btn-primary" type="submit">Update</button>
        </form>
        <?php 
 
        }
    }
?>