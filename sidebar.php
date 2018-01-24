<?php
	function Tunjukan($jabatan){ 
        if($jabatan == "Gudang" || $jabatan == "Pemilik" ||$jabatan == "Pembelian" || $jabatan == "Penjualan")
        {
          echo "<li class=treeview>
            <a href=#>
              <i class='fa fa-dashboard'></i> <span>Gudang</span>
              <span class=pull-right-container>
                <i class='fa fa-angle-left pull-right'></i>
              </span>
            </a>
            <ul class=treeview-menu>
              <li><a href=informasibarang.php><i class='fa fa-circle-o'></i> Informasi Barang</a></li>";
        }
        if($jabatan == "Gudang" || $jabatan == "Pemilik"){
          echo "<li><a href=tambahbarang.php><i class='fa fa-circle-o'></i> Tambah Barang</a></li>";
        }
        if($jabatan == "Gudang" || $jabatan == "Pemilik" ||$jabatan == "Pembelian" || $jabatan == "Penjualan"){
          echo "<li><a href=informasibahan.php><i class='fa fa-circle-o'></i> Informasi Bahan</a></li>";
        }
        if($jabatan == "Gudang" || $jabatan == "Pemilik"){
          echo "<li><a href=tambahbahan.php><i class='fa fa-circle-o'></i> Tambah Bahan</a></li>";
          echo "<li><a href=returbarang.php><i class='fa fa-circle-o'></i> Retur Barang</a></li>";
        }
        if($jabatan == "Gudang" || $jabatan == "Pemilik" ||$jabatan == "Pembelian" || $jabatan == "Penjualan"){
          echo  "</ul>
          </li>";
        }
        ?>  
        <?php
        if($jabatan == "Gudang" || $jabatan == "Pemilik"){
          echo "<li class=treeview>
          <a href=#>
            <i class='fa fa-table'></i> <span>Produksi</span>
            <span class=pull-right-container>
              <i class='fa fa-angle-left pull-right'></i>
            </span>
          </a>
          <ul class=treeview-menu>
            <li><a href=informasiproduksi.php><i class='fa fa-circle-o'></i> Informasi Produksi</a></li>
            <li><a href=tambahproduksi.php><i class='fa fa-circle-o'></i> Tambah Produksi</a></li>
            <li><a href=informasiprosesbahan.php><i class='fa fa-circle-o'></i> Informasi Proses Bahan</a></li>
            <li><a href=tambahprosesbahan.php><i class='fa fa-circle-o'></i> Tambah Proses Bahan</a></li>
          </ul>
        </li>";
        }
        ?>
        <?php
        if($jabatan == "Pemilik"){
          echo "<li class=treeview>
            <a href=#>
              <i class='glyphicon glyphicon-user'></i> <span>Karyawan</span>
              <span class='pull-right-container'>
                <i class='fa fa-angle-left pull-right'></i>
              </span>
            </a>
            <ul class=treeview-menu>
              <li><a href=informasikaryawan.php><i class='fa fa-circle-o'></i> Informasi karyawan</a></li>
              <li> <a href=tambahkaryawan.php><i class='fa fa-circle-o'></i> Tambah Karyawan</a></li>
              <li> <a href=tambahakun.php><i class='fa fa-circle-o'></i> Tambah Akun </a></li>
            </ul>
          </li>";
        }
        if($jabatan == "Pembelian" || $jabatan == "Pemilik"){
          echo "<li class=treeview>
          <a href=#>
            <i class='fa fa-dashboard'></i> <span>Pembelian</span>
            <span class=pull-right-container>
              <i class='fa fa-angle-left pull-right'></i>
            </span>
          </a>
          <ul class=treeview-menu>
            <li><a href=informasisuplier.php><i class='fa fa-circle-o'></i> Informasi Supplier</a></li>
            <li><a href=tambahsupplier.php><i class='fa fa-circle-o'></i> Tambah Supplier</a></li>
            <li><a href=tambahpembelian.php><i class='fa fa-circle-o'></i> Tambah Pembelian</a></li>
            <li><a href=statuspembelian.php><i class='fa fa-circle-o'></i> Status Pembelian</a></li>";
          }
        if($jabatan == "Pemilik"){
          echo "<li><a href=invoicepembelian.php><i class='fa fa-circle-o'></i> Invoice Pembelian</a></li>";
        }
        if($jabatan == "Pembelian" || $jabatan == "Pemilik"){
          echo "</ul>
          </li>";
        }
        if($jabatan == "Penjualan" || $jabatan == "Pemilik" || $jabatan == "Gudang"){
          echo "<li class=treeview>
          <a href=#>
            <i class='fa fa-dashboard'></i> <span>Penjualan</span>
            <span class='pull-right-container'>
              <i class='fa fa-angle-left pull-right'></i>
            </span>
          </a>
          <ul class=treeview-menu>";}
        if($jabatan == "Penjualan" || $jabatan == "Pemilik")
        {
          echo "<li><a href=informasicustomer.php><i class='fa fa-circle-o'></i> Informasi Customer</a></li>
            <li><a href=tambahcustomer.php><i class='fa fa-circle-o'></i> Tambah Customer</a></li>
            <li><a href=tambahpenjualan.php><i class='fa fa-circle-o'></i> Tambah Penjualan</a></li>";
        }
        if($jabatan == "Penjualan" || $jabatan == "Pemilik" || $jabatan == "Gudang"){
          echo "<li><a href=statuspenjualan.php><i class='fa fa-circle-o'></i> Status Penjualan</a></li>";
        }
        if($jabatan == "Penjualan" || $jabatan == "Pemilik" || $jabatan == "Gudang"){
          echo "</ul>
        </li>";
        }
    }
}
        ?>