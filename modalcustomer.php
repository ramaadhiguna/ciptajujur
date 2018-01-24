<?php
    require 'db.php';

        if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        $sql = "SELECT * FROM customer WHERE idCustomer='". $id ."';";
        $result = mysqli_query($link,$sql);
        if ($row = mysqli_fetch_object($result)) { ?>
            <form action="manage.php?act=ubahcustomer" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label>Nama Customer</label>
                <input type="text" class="form-control" name="nama_customer" value="<?php echo $row->nama; ?>">
            </div>
            <div class="form-group">
                <label>Kontak</label>
                <input type="text" class="form-control" name="kontak_customer" value="<?php echo $row->kontak; ?>">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat_customer" value="<?php echo $row->alamat; ?>">
            </div>
              <button class="btn btn-primary" type="submit">Update</button>
        </form>
        <?php 
 
        }
    }
?>