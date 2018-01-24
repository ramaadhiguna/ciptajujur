<?php
    require 'db.php';
    //SQL
    $sqlB = "SELECT * FROM `barang`";
    $resultA = mysqli_query($link,$sqlB);
    $resultB = mysqli_query($link,$sqlB);
    if(!$resultB){
       die("SQL Error :".$sqlB);
    }

    $sqlBahan = "select * from bahan";     
    $resultBahan = mysqli_query($link, $sqlBahan);
    if(!$resultBahan) {
        die("SQL Error: ".$sqlBahan);
    }

    $sqlKaryawan = "select * from karyawan";     
    $resultKaryawan = mysqli_query($link, $sqlKaryawan);
    if(!$resultKaryawan) {
        die("SQL Error: ".$sqlKaryawan);
    }

    $sqlSupplier = "select * from supplier";     
    $resultSupplier = mysqli_query($link, $sqlSupplier);
    if(!$resultSupplier) {
        die("SQL Error: ".$sqlSupplier);
    }

    $sqlCustomer = "select * from customer";     
    $resultCustomer = mysqli_query($link, $sqlCustomer);
    if(!$resultCustomer) {
        die("SQL Error: ".$sqlCustomer);
    }

    $sqlInformasiProduksi = "SELECT *,date(tanggal) as date FROM `produksi` order by tanggal DESC";
    $resultInformasiProduksi = mysqli_query($link,$sqlInformasiProduksi);
    if(!$resultInformasiProduksi){
       die("SQL Error :".$sqlInformasiProduksi);
    }

    $sqlInformasiProsesBahan = "SELECT *,date(tanggal) as date FROM `prosesbahan` order by tanggal DESC";
    $resultInformasiProsesBahan = mysqli_query($link,$sqlInformasiProsesBahan);
    if(!$resultInformasiProsesBahan){
       die("SQL Error :".$sqlInformasiProsesBahan);
    }

    /*$sqlUser = "select * from karyawan where jabatan = 'Penjualan' or jabatan = 'Pembelian' or jabatan ='Gudang' having id not in(select Karyawan_id from user)";  
    $resultUser = mysqli_query($link,$sqlUser);
    if(!$resultUser){
       die("SQL Error :".$sqlUser);
    }*/             

    $sqlPembelian = "SELECT p.id, p.tanggal, p.saldo,s.nama FROM pembelian p, supplier s WHERE p.Supplier_idSupplier = s.idSupplier";
    $resultPembelian = mysqli_query($link,$sqlPembelian);
    if(!$resultPembelian){
       die("SQL Error :".$sqlPembelian);
    }

    $sqlPembelianPO = "SELECT p.id, p.tanggal,s.nama from pembelianpo p, supplier s where s.idSupplier = p.Supplier_idSupplier";
    $resultPembelianPO = mysqli_query($link,$sqlPembelianPO);
    if(!$resultPembelianPO){
       die("SQL Error :".$sqlPembelianPO);
    }
    
    $sqlPenjualan = "SELECT p.idNota, p.tanggal,c.nama, p.saldo,SUM(pb.harga*pb.kuantitas) as total,p.status_kirim FROM penjualan p, penjualan_has_barang pb,customer c WHERE p.idNota = pb.Penjualan_idNota and p.Customer_idCustomer = c.idCustomer GROUP BY p.idNota";
    $resultPenjualan = mysqli_query($link,$sqlPenjualan);
    if(!$resultPenjualan){
       die("SQL Error :".$sqlPenjualan);
    }

    $cekNomorNota = "SELECT COUNT(*) as jumlah FROM penjualan WHERE tanggal = '".date("Y-m-d")."'";
    $resultCekNomorNota = mysqli_query($link, $cekNomorNota);

    $cekNomorNotaPembelianPO = "SELECT COUNT(*) as jumlah FROM pembelianpo WHERE tanggal = '".date("Y-m-d")."'";
    $resultCekNomorNotaPembelianPO = mysqli_query($link, $cekNomorNotaPembelianPO);

    $cekNomorNotaBeli = "SELECT COUNT(*) as jumlah FROM pembelian WHERE tanggal = '".date("Y-m-d")."'";
    $resultCekNomorNotaBeli = mysqli_query($link, $cekNomorNotaBeli);
    

    //Function
    function CekTotalBarang($kid){
        require 'db.php';
        $sqlCariKategori = "SELECT p.id, sum(pb.kuantitas*pb.harga) as total FROM pembelian p, pembelian_has_barang pb WHERE p.id = pb.Pembelian_id and p.id = 180124001 group by p.id";
        $resultCariKategori = mysqli_query($link,$sqlCariKategori);
        $rowCariKategori = mysqli_fetch_object($resultCariKategori);
        return $rowCariKategori->nama;
    }
    function CekTotalBahan($kid){
        require 'db.php';
        $sqlCariKategori = "SELECT p.id, sum(pb.kuantitas*pb.harga) as total FROM pembelian p, pembelian_has_bahan pb WHERE p.id = pb.Pembelian_id and p.id = ".$pid." group by p.id";
        $resultCariKategori = mysqli_query($link,$sqlCariKategori);
        $rowCariKategori = mysqli_fetch_object($resultCariKategori);
        return $rowCariKategori->nama;
    }
    function Kategori($kid){
        require 'db.php';
        $sqlCariKategori = "SELECT * FROM `kategori` WHERE id ='".$kid."';";
        $resultCariKategori = mysqli_query($link,$sqlCariKategori);
        $rowCariKategori = mysqli_fetch_object($resultCariKategori);
        return $rowCariKategori->nama;
    }
    function Retur($pid){
        require 'db.php';
        $sqlBahan = "SELECT p.id, p.tanggal, p.saldo,s.nama FROM pembelian p, supplier s WHERE p.Supplier_idSupplier = s.idSupplier and p.id ='".$pid."'";
        $resultBahan = mysqli_query($link,$sqlBahan);
        return $resultBahan;
    }
    function ReturPenjualan($pid){
        require 'db.php';
        $sqlBahan = "SELECT p.idNota, p.tanggal, p.saldo,s.nama FROM penjualan p, customer s WHERE p.Customer_idCustomer = s.idCustomer and p.idNota ='".$pid."'";
        $resultBahan = mysqli_query($link,$sqlBahan);
        return $resultBahan;
    }
    function ProduksiBahan($pid){
        require 'db.php';
        $sqlBahan = "SELECT pb.Produksi_id, b.namaBarang, pb.kuantitas, b.satuan FROM barang b, produksi_has_barang pb WHERE pb.Produksi_id = '".$pid."' and pb.Barang_idBarang = b.idBarang and pb.jenis = 'bahan'";
        $resultBahan = mysqli_query($link,$sqlBahan);
        return $resultBahan;
    }
    function ProsesBahanBahan($pid){
        require 'db.php';
        $sqlBahan = "SELECT pb.Prosesbahan_id, b.nama, pb.kuantitas FROM bahan b, prosesbahan_has_bahan pb WHERE pb.Prosesbahan_id = '".$pid."' and pb.Bahan_id = b.id";
        $resultBahan = mysqli_query($link,$sqlBahan);
        return $resultBahan;
    }
    function ProduksiBarang($pid){
        require 'db.php';
        $sqlBarang = "SELECT pb.Produksi_id, b.namaBarang, pb.kuantitas, b.satuan FROM barang b, produksi_has_barang pb WHERE pb.Produksi_id = '".$pid."' and pb.Barang_idBarang = b.idBarang and pb.jenis = 'barang'";
        $resultBarang = mysqli_query($link,$sqlBarang);
        return $resultBarang;
    }
    function ProsesBahanBarang($pid){
        require 'db.php';
        $sqlBarang = "SELECT pb.Prosesbahan_id, b.namaBarang, pb.kuantitas FROM barang b, prosesbahan_has_barang pb WHERE pb.Prosesbahan_id = '".$pid."' and pb.Barang_idBarang = b.idBarang";
        $resultBarang = mysqli_query($link,$sqlBarang);
        return $resultBarang;
    }
    function PembelianBarang($pid){
        require 'db.php';
        $sqlPembelianBarang = "SELECT b.idBarang,b.namaBarang, pb.kuantitas,pb.harga,(pb.kuantitas*pb.harga) as total FROM pembelian_has_barang pb, barang b WHERE pb.pembelian_id = ".$pid." and pb.Barang_idBarang = b.idBarang";
        $resultPembelianBarang = mysqli_query($link,$sqlPembelianBarang);
        return $resultPembelianBarang;
    }
    function PembelianBahan($pid){
        require 'db.php';
        $sqlPembelianBahan = "SELECT b.id,b.nama, pb.kuantitas,pb.harga,(pb.kuantitas*pb.harga) as total FROM pembelian_has_bahan pb, bahan b WHERE pb.pembelian_id = ".$pid." and pb.bahan_id = b.id";
        $resultPembelianBahan = mysqli_query($link,$sqlPembelianBahan);
        return $resultPembelianBahan;
    }
    function PembelianBarangPO($pid){
        require 'db.php';
        $sqlPembelianPOBarang = "SELECT b.idBarang,b.namaBarang, pb.qty,pb.harga,pb.saldo FROM pembelianpo_has_barang pb, barang b WHERE pb.pembelianPO_id = ".$pid." and pb.Barang_idBarang = b.idBarang";
        $resultPembelianPOBarang = mysqli_query($link,$sqlPembelianPOBarang);
        return $resultPembelianPOBarang;
    }
    function PembelianBahanPO($pid){
        require 'db.php';
        $sqlPembelianPOBahan = "SELECT b.id,b.nama, pb.panjang,pb.harga,pb.saldo FROM pembelianpo_has_bahan pb, bahan b WHERE pb.pembelianPO_id = ".$pid." and pb.bahan_id = b.id";
        $resultPembelianPOBahan = mysqli_query($link,$sqlPembelianPOBahan);
        return $resultPembelianPOBahan;
    }
    function PenjualanBarang($pid){
        require 'db.php';
        $sqlPenjualanBarang = "SELECT b.idBarang,b.namaBarang, pb.kuantitas,pb.harga FROM penjualan_has_barang pb, barang b WHERE pb.Penjualan_idNota = ".$pid." and pb.Barang_idBarang = b.idBarang";
        $resultPenjualanBarang = mysqli_query($link,$sqlPenjualanBarang);
        return $resultPenjualanBarang;
    }
    Function KofirmasiPengirimanPenjualan($pid){
        require 'db.php';
        $sqlKirimPenjualan = "SELECT pb.Barang_idBarang,b.namaBarang,b.keterangan,b.satuan,pb.kuantitas,pb.harga FROM penjualan_has_barang pb , barang b where pb.Penjualan_idNota = '".$pid."' and pb.Barang_idBarang = b.idBarang";
        $resultKirimPenjualan = mysqli_query($link, $sqlKirimPenjualan);
        return $resultKirimPenjualan;
    }

    Function KofirmasiPengirimanPembelian($pid){
        require 'db.php';
        $sqlKirimPembelian = "SELECT pb.Barang_id,b.nama,pb.qty,pb.harga FROM pembelian_barang pb , barang b where pb.Pembelian_id = '".$pid."' and pb.Barang_id = b.id";
        $resultKirimPembelian = mysqli_query($link, $sqlKirimPembelian);
        return $resultKirimPembelian;
    }
    Function LPBPOPembelian($pid){
        require 'db.php';
        $sqlKirimPembelian = "SELECT pb.Barang_idBarang,b.namaBarang,pb.qty,pb.harga,pb.saldo FROM pembelianPO_has_barang pb , barang b where pb.PembelianPO_id = '".$pid."' and pb.Barang_idBarang = b.idBarang";
        $resultKirimPembelian = mysqli_query($link, $sqlKirimPembelian);
        return $resultKirimPembelian;
    }
    Function ReturPenjualanBarang($pid){
        require 'db.php';
        $sqlKirimPembelian = "SELECT pb.Barang_idBarang,b.namaBarang,b.satuan,pb.kuantitas,pb.harga FROM penjualan_has_barang pb , barang b where pb.Penjualan_idNota = '".$pid."' and pb.Barang_idBarang = b.idBarang";
        $resultKirimPembelian = mysqli_query($link, $sqlKirimPembelian);
        return $resultKirimPembelian;
    }
    Function ReturBarang($pid){
        require 'db.php';
        $sqlKirimPembelian = "SELECT pb.Barang_idBarang,b.namaBarang,pb.kuantitas,pb.harga FROM pembelian_has_barang pb , barang b where pb.Pembelian_id = '".$pid."' and pb.Barang_idBarang = b.idBarang";
        $resultKirimPembelian = mysqli_query($link, $sqlKirimPembelian);
        return $resultKirimPembelian;
    }
    Function LPBPOPembelianBahan($pid){
        require 'db.php';
        $sqlKirimPembelian = "SELECT pb.bahan_id,b.nama,pb.panjang,pb.harga,pb.saldo FROM pembelianPO_has_bahan pb , bahan b where pb.PembelianPO_id = '".$pid."' and pb.bahan_id = b.id";
        $resultKirimPembelian = mysqli_query($link, $sqlKirimPembelian);
        return $resultKirimPembelian;
    }
    Function ReturBahan($pid){
        require 'db.php';
        $sqlKirimPembelian = "SELECT pb.bahan_id,b.nama,pb.kuantitas,pb.harga FROM pembelian_has_bahan pb , bahan b where pb.Pembelian_id = '".$pid."' and pb.bahan_id = b.id";
        $resultKirimPembelian = mysqli_query($link, $sqlKirimPembelian);
        return $resultKirimPembelian;
    }
    function NotaPembelian($pid){
        require 'db.php';
        $sqlPembelian = "SELECT p.id, p.tanggal, c.nama, c.telepon, c.alamat FROM penjualan p, customer c WHERE p.Customer_id = c.id and p.id = '".$pid."'";
        $resultPembelian = mysqli_query($link,$sqlPembelian);
        return $resultPembelian;
    }
    function POPembelian($pid){
        require 'db.php';
        $sqlPembelian = "SELECT p.id, p.tanggal, s.nama , s.idSupplier FROM pembelianpo p, supplier s WHERE p.Supplier_idSupplier = s.idSupplier and p.id = '".$pid."'";
        $resultPembelian = mysqli_query($link,$sqlPembelian);
        return $resultPembelian;
    }
    function NotaPenjualan($pid){
        require 'db.php';
        $sqlPembelian = "SELECT p.idNota, p.tanggal, c.nama, c.kontak, c.alamat FROM penjualan p, customer c WHERE p.Customer_idCustomer = c.idCustomer and p.idNota = '".$pid."'";
        $resultPembelian = mysqli_query($link,$sqlPembelian);
        return $resultPembelian;
    }
    Function PembayaranPenjualan($pid){
        require 'db.php';
        $sqlBayarPembelian = "SELECT pb.Penjualan_idNota,p.saldo,SUM(pb.kuantitas*pb.harga) as total FROM penjualan_has_barang pb,penjualan p WHERE pb.Penjualan_idNota = '".$pid."' and pb.Penjualan_idNota = p.idNota";
        $resultBayarPembelian = mysqli_query($link, $sqlBayarPembelian);
        return $resultBayarPembelian;
    }
    Function PembayaranPembelian($pid){
        require 'db.php';
        $sqlBayarPenjualan = "SELECT pb.Pembelian_id,p.saldo,(SUM(pb.kuantitas*pb.harga)+SUM(pbh.kuantitas*pbh.harga)) as total FROM pembelian_has_bahan pbh,pembelian_has_barang pb,pembelian p WHERE pb.Pembelian_id = '".$pid."' and pbh.Pembelian_id = pb.Pembelian_id and pb.Pembelian_id = p.id";
        $resultBayarPenjualan = mysqli_query($link, $sqlBayarPenjualan);
        return $resultBayarPenjualan;
    }
    Function Karyawan($pid){
        require 'db.php';
        $sqlKaryawan = "SELECT k.nama, k.jabatan, k.idKaryawan FROM user u, karyawan k WHERE u.Karyawan_idKaryawan = k.idKaryawan and u.username = '".$pid."'";
        $resultKaryawan = mysqli_query($link, $sqlKaryawan);
        return $resultKaryawan;
    }

    function Tunjukan($jabatan){ 
        if($jabatan == "Gudang" || $jabatan == "Pemilik" ||$jabatan == "Pembelian" || $jabatan == "Penjualan")
        {
          echo "<li class=active treeview>
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
          echo "<li><a href=penerimaanreturpenjualan.php><i class='fa fa-circle-o'></i> Penerimaan Retur Penjualan</a></li>";
        }
        if($jabatan == "Gudang" || $jabatan == "Pemilik" ||$jabatan == "Pembelian" || $jabatan == "Penjualan"){
          echo  "</ul>
          </li>";
        }
        ?>  
        <?php
        if($jabatan == "Gudang" || $jabatan == "Pemilik"){
          echo "<li class=active treeview>
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
          echo "<li class=active treeview>
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
              <li> <a href=informasiuser.php><i class='fa fa-circle-o'></i> Informasi User </a></li>
            </ul>
          </li>";
        }
        if($jabatan == "Pembelian" || $jabatan == "Pemilik"){
          echo "<li class=active treeview>
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
          echo "<li class=active treeview>
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
?>