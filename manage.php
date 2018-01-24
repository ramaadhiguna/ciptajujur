<?php
date_default_timezone_set('Asia/Jakarta');
$act = $_GET["act"];

/* Region Karyawan*/
switch ($act) {
	case "login":
	require 'db.php';
	$user = $_POST["Username"];
	$pass = MD5($_POST["Password"]);
	$sql = "select * from user where username='".$user."'";
	$result = mysqli_query($link,$sql);
	if(mysqli_num_rows($result)>0){
		$row = mysqli_fetch_object($result);
		if($pass == $row->password){
			$_SESSION["login"]=1;
			header("location: informasiuser.php");
		}
		else{
			header("location: login.php");
		}
	}
	else{
		header("location: login.php");	
	}
	break;

	case 'deleteuser':
	require 'db.php';
	$idusername = $_GET["name"];
	$sql = "UPDATE user SET isDelete = 1 WHERE Karyawan_idKaryawan = " . $idusername;
	$result = mysqli_query($link, $sql);
        if(!$result) {
            die("SQL Error");
        }
        else {
            echo "Data Terhapus";
            header("Location: informasiuser.php");
        }
		# code...
		break;
	case 'resetuser':
	require 'db.php';
	$idusername = $_GET["name"];
	$sql = "UPDATE user SET isDelete = 0 WHERE Karyawan_idKaryawan = " . $idusername;
	$result = mysqli_query($link, $sql);
        if(!$result) {
            die("SQL Error");
        }
        else {
            echo "Data Terhapus";
            header("Location: informasiuser.php");
        }
		# code...
		break;

	case "insertkaryawan":
	require 'db.php';
	$nama = $_POST["nama"];
	$alamat = $_POST["alamat"];
	$telepon =$_POST["telepon"];
	$jabatan = $_POST["jabatan"];
	$sql = "INSERT INTO `karyawan` (`nama`, `alamat`, `telp`, `jabatan` , `status`) VALUES ('".$nama."', '".$alamat."', '".$telepon."', '".$jabatan."','1')";
	$result = mysqli_query($link,$sql);
	if($result){
		header("location: karyawan.php");
	}
	else{
		echo "gagal";
	}
	break;

	case "ubahkaryawan":
	require 'db.php';
	$id=$_POST["id"];
	$nama = $_POST["nama_karyawan"];
	$alamat = $_POST["alamat_karyawan"];
	$telepon =$_POST["kontak_karyawan"];
	$jabatan = $_POST["jabatan_karyawan"];
	$status = $_POST["status_karyawan"];
	$sql = "UPDATE `karyawan` SET `nama` = '".$nama."', `alamat` = '".$alamat."', `kontak` = '".$telepon."',`jabatan` = '".$jabatan."',`status` = '".$status."' WHERE `karyawan`.`idKaryawan` ='".$id."';";
	//$sql = "UPDATE `karyawan` SET `nama` = 'Sonny Haryadii', `alamat` = 'Kusuma Bangsai', `kontak` = '08224388364', `status` = '1', `jabatan` = 'Pembelian' WHERE `karyawan`.`idKaryawan` = 1;"
	$result = mysqli_query($link,$sql);
	if($result){
		header("location: informasikaryawan.php");
	}
	else{
		echo "gagal";
	}
	break;

	case "ubahsupplier":
	require 'db.php';
	$id=$_POST["id"];
	$nama = $_POST["nama_supplier"];
	$telepon =$_POST["kontak_supplier"];
	$alamat = $_POST["alamat_supplier"];
	$sql = "UPDATE `supplier` SET `nama` = '".$nama."', `kontak` = '".$telepon."', `alamat` = '".$alamat."' WHERE `supplier`.`idSupplier`= '".$id."';";
	$result = mysqli_query($link,$sql);
	if($result){
		header("location: informasisuplier.php");
	}
	else{
		echo "gagal";
		//echo $jabatan;
	}
	break;

	case "ubahcustomer":
	require 'db.php';
	$id=$_POST["id"];
	$nama = $_POST["nama_customer"];
	$telepon =$_POST["kontak_customer"];
	$alamat = $_POST["alamat_customer"];
	//$sql = "UPDATE `customer` SET `nama` = '".$nama."', `kontak` = '".$telepon."', `alamat` = '".$alamat."' WHERE `id` =".$id;
	$sql = "UPDATE `customer` SET `nama` = '".$nama."', `kontak` = '".$telepon."', `alamat` = '".$alamat."' WHERE `customer`.`idCustomer`= '".$id."';";
	$result = mysqli_query($link,$sql);
	if($result){
		header("location: informasicustomer.php");
	}
	else{
		echo "gagal";
		//echo $jabatan;
	}
	break;
	/////////////////////////////
	/* Region User */
	case "insertuser":
	require 'db.php';
	$username = $_POST["user"];
	$password = MD5($_POST["password"]);
	$konfirmasi =MD5($_POST["konfirmasi"]);
	$idKaryawan = $_POST["idKaryawan"];
	if($password==$konfirmasi){
		$sql = "INSERT INTO `user` (`Karyawan_id`, `username`, `password`) VALUES ('".$idKaryawan."', '".$username."', '".$password."');";
		$result = mysqli_query($link,$sql);
		if($result){
			header("location: user.php");
		}
		else{
		echo "gagal";
		echo $idKaryawan;
		}
	}
	else{
		echo "Password Tidak Sama";
	}
	break;

	///////////////////////////
	/* Region Gudang */
	case "insertkategori";
	require 'db.php';
	$nama = $_POST["namakategori"];
	$jenis = $_POST["jenis"];
	$sql = "INSERT INTO `kategori`(`nama`,`jenis`) VALUES('".$nama."','".$jenis."');";
	$result=mysqli_query($link,$sql);
	if($result){
		if($jenis == "Bahan Produksi"){
			header("location: tambahbahan.php");
		}
		else{
			header("location: tambahbarang.php");
		}
		
	}
	else{
		echo "gagal";
	}
	break;

	case "insertbarang";
	require 'db.php';
	$kode = $_POST["kode"];
	$nama = $_POST["nama"];
	$kuantitas = $_POST["kuantitas"];
	$keterangan = $_POST["keterangan"];
	$satuan = $_POST["satuan"];
	$sql = "INSERT INTO `barang`(`idBarang`,`namaBarang`,`kuantitas`,`satuan`,`keterangan`) VALUES('".$kode."','".$nama."','".$kuantitas."','".$satuan."','".$keterangan."')";
	$result = mysqli_query($link,$sql);
	if($result){
		header("location: informasibarang.php");
	}
	else{
		echo "gagal";
	}
	break;

	case "insertbahan";
	require 'db.php';
	$kode = $_POST["kode"];
	$nama = $_POST["nama"];
	$panjang = $_POST["panjang"];
	$lebar = $_POST["lebar"];
	$keterangan = $_POST["keterangan"];
	$sql = "INSERT INTO `bahan` (`id`, `nama`, `panjang`, `lebar`, `keterangan`) VALUES ('".$kode."', '".$nama."', '".$panjang."', '".$lebar."', '".$keterangan."');";
	$result = mysqli_query($link,$sql);
	if($result){
		header("location: informasibahan.php");
	}
	else{
		echo "gagal";
	}
	break;

	case "insertsupplier";
	require 'db.php';
	$nama = $_POST["nama"];
	$alamat = $_POST["alamat"];
	$kontak = $_POST["kontak"];
	$sql = "INSERT INTO `supplier` (`nama`, `kontak`, `alamat`) VALUES ('".$nama."', '".$kontak."', '".$alamat."');";
	$result = mysqli_query($link,$sql);
	if($result){
		header("location: informasisuplier.php");
	}
	else{
		echo "gagal";
	}
	break;

	case "insertcustomer";
	require 'db.php';
	$nama = $_POST["nama"];
	$alamat = $_POST["alamat"];
	$kontak = $_POST["kontak"];
	$sql = "INSERT INTO `customer` (`nama`, `kontak`, `alamat`) VALUES ('".$nama."', '".$kontak."', '".$alamat."');";
	$result = mysqli_query($link,$sql);
	if($result){
		header("location: informasicustomer.php");
	}
	else{
		echo "gagal";
	}
	break;

	case "insertpembayaranpenjualan";
	require 'db.php';
	$id = $_POST["id"];
	$jumlah = $_POST["jumlah"];
	$keterangan = $_POST["keterangan"];
	$karyawan = $_POST["karyawan"];
	$dateTime = date_create('now')->format('Y-m-d');
	$sql = "INSERT INTO `penjualan_pembayaran` (`id`, `Penjualan_idNota`, `jumlah`, `keterangan`,`tanggal_bayar`) VALUES (NULL, '".$id."', '".$jumlah."', '".$keterangan."','".$dateTime."');";
	$result = mysqli_query($link,$sql);
	if($result){
		$sqlUpdate = "UPDATE `penjualan` SET saldo = saldo + ".$jumlah." WHERE `penjualan`.`idNota` = ".$id.";";
		$resultUpdate = mysqli_query($link,$sqlUpdate);
		if($resultUpdate){
			header("location: statuspenjualan.php");
		}
	}
	else{
		echo "gagal";
	}
	break;

	case "insertpembayaranpembelian";
	require 'db.php';
	$id = $_POST["id"];
	$jumlah = $_POST["jumlah"];
	$keterangan = $_POST["keterangan"];
	$karyawan = $_POST["karyawan"];
	$dateTime = date_create('now')->format('Y-m-d');
	$sql = "INSERT INTO `pembelian_pembayaran` (`id`, `Pembelian_id`, `jumlah`, `keterangan`,`tanggal_bayar`) VALUES (NULL, '".$id."', '".$jumlah."', '".$keterangan."','".$dateTime."');";
	$result = mysqli_query($link,$sql);
	if($result){
		$sqlUpdate = "UPDATE `pembelian` SET saldo = saldo + ".$jumlah." WHERE `pembelian`.`id` = ".$id.";";
		$resultUpdate = mysqli_query($link,$sqlUpdate);
		if($resultUpdate){
			header("location: invoicepembelian.php");
		}
	}
	else{
		echo "gagal";
	}
	break;

	case "insertrefundpembelian";
	require 'db.php';
	$id = $_POST["id"];
	$jumlah = $_POST["jumlah"];
	$keterangan = $_POST["keterangan"];
	$karyawan = $_POST["karyawan"];
	$dateTime = date_create('now')->format('Y-m-d');
	$sql = "INSERT INTO `pembelian_pembayaran` (`id`, `Pembelian_id`, `jumlah`, `keterangan`,`Karyawan_id`,`tanggal_bayar`) VALUES (NULL, '".$id."', '".$jumlah."', '".$keterangan."','".$karyawan."','".$dateTime."');";
	$result = mysqli_query($link,$sql);
	if($result){
		$sqlUpdate = "UPDATE `pembelian` SET saldo = saldo - ".$jumlah." WHERE `pembelian`.`id` = ".$id.";";
		$resultUpdate = mysqli_query($link,$sqlUpdate);
		if($resultUpdate){
			header("location: statuspembelian.php");
		}
	}
	else{
		echo "gagal";
	}
	break;

	case "insertrefundpenjualan";
	require 'db.php';
	$id = $_POST["id"];
	$jumlah = $_POST["jumlah"];
	$keterangan = $_POST["keterangan"];
	$karyawan = $_POST["karyawan"];
	$dateTime = date_create('now')->format('Y-m-d');
	$sql = "INSERT INTO `penjualan_pembayaran` (`id`, `Penjualan_id`, `jumlah`, `keterangan`,`Karyawan_id`,`tanggal_bayar`) VALUES (NULL, '".$id."', '".$jumlah."', '".$keterangan."','".$karyawan."','".$dateTime."');";
	$result = mysqli_query($link,$sql);
	if($result){
		$sqlUpdate = "UPDATE `penjualan` SET saldo = saldo - ".$jumlah." WHERE `penjualan`.`id` = ".$id.";";
		$resultUpdate = mysqli_query($link,$sqlUpdate);
		if($resultUpdate){
			header("location: statuspenjualan.php");
		}
	}
	else{
		echo "gagal";
	}
	break;

	case "ubahbarang":
	require 'db.php';
	
	$id=$_POST["id"];
	$nama = $_POST["nama_barang"];
	$kuantitas = $_POST["kuantitas_barang"];
	$satuan = $_POST["satuan_barang"];
	$minimum = $_POST["minimum_barang"];
	$keterangan= $_POST["keterangan_barang"];
	$sql = "UPDATE `barang` SET `namaBarang` = '".$nama."', `kuantitas` = '".$kuantitas."', `satuan` = '".$satuan."', `keterangan` = '".$keterangan."' WHERE `id` ='".$id."';";
	$sql = "UPDATE `barang` SET `namaBarang` = '".$nama."', `kuantitas` = '".$kuantitas."', `minimum` = '".$minimum."', `keterangan` = ' ".$keterangan."' WHERE `barang`.`idBarang` = '".$id."';";
	$result = mysqli_query($link,$sql);
	if($result){
		header("location: informasibarang.php");
	}
	else{
		echo "gagal";
	}
	break;

	case "ubahbahan":
	require 'db.php';
	$id=$_POST["id"];
	$nama = $_POST["nama_bahan"];
	$panjang = $_POST["panjang_bahan"];
	$lebar = $_POST["lebar_bahan"];
	$keterangan = $_POST["keterangan_bahan"];
	//$sql = "UPDATE `bahan` SET `nama` = '".$nama."', `panjang` = '".$panjang."', `lebar` = '".$lebar."', `keterangan` = '".$keterangan."' WHERE `id` =".$id;
	$sql = "UPDATE `bahan` SET `nama` = '".$nama."', `panjang` = '".$panjang."', `lebar` = '".$lebar."', `keterangan` = '".$keterangan."' WHERE `bahan`.`id` = '".$id."';";
	$result = mysqli_query($link,$sql);
	if($result){
		header("location: informasibahan.php");
	}
	else{
		echo "gagal";
	}
	break;

	case "inserttanggalproduksi":
	require 'db.php';
	$tanggal = date_create('now')->format('Y-m-d');
	$sql = "INSERT INTO `produksi`(`tanggal`) VALUES('".$tanggal."')";
	$result = mysqli_query($link,$sql);
	if($result){}
	else{
		echo "gagal";
	}
	break;

	case "inserttanggalproses":
	require 'db.php';
	$tanggal = date_create('now')->format('Y-m-d');
	$sql = "INSERT INTO `prosesbahan`(`tanggal`) VALUES('".$tanggal."')";
	$result = mysqli_query($link,$sql);
	if($result){}
	else{
		echo "gagal";
	}
	break;

	case "insertpembelian":
	require 'db.php';
	
	$noNota = $_POST["noNota"];
	$tanggal = $_POST["tanggal"];
	$jatuhTempo = date('Y-m-d', strtotime($tanggal. ' + 30 days'));
	$supplier= $_POST["idSupplier"];
	$sql = "INSERT INTO `pembelian` (`id`, `Supplier_idSupplier`, `Karyawan_idKaryawan`, `tanggal`, `tanggal_jatuh_tempo`, `saldo`) VALUES ('".$noNota."', '".$supplier."', '1', '".$tanggal."', '".$jatuhTempo."', '0');";		
	$result = mysqli_query($link,$sql);
	if($result){

	}
	else{
		echo "gagal";
	}
	break;

	case "insertpembelianpo":
	require 'db.php';
	$sql;
	$noNota = $_POST["noNota"];
	$tanggal = $_POST["tanggal"];
	$supplier= $_POST["idSupplier"];
	$karyawan = $_POST["karyawan"];
	$keterangan = $_POST["keterangan"];
	$sql = "INSERT INTO `pembelianpo` (`id`,`tanggal`,`Supplier_idSupplier`, `Karyawan_idKaryawan`,`keterangan`) VALUES ('".$noNota."', '".$tanggal."','".$supplier."', '".$karyawan."','".$keterangan."');";		
	$result = mysqli_query($link,$sql);
	if($result){
	}
	else{
		echo "gagal";
	}
	break;

	case "insertpembelianbarang":
	require 'db.php';
	$sql;
	$noPO = $_POST["noPO"];
	$noNota = $_POST["noNota"];
	$barang_id = $_POST["barang_id"];
	$qty= $_POST["qty"];
	$harga = $_POST["harga"];
	$sql = "INSERT INTO `pembelian_has_barang` (`Pembelian_id`, `Barang_idBarang`, `kuantitas`, `harga`) VALUES ('".$noNota."', '".$barang_id."', '".$qty."', '".$harga."');";
	//$sql ="INSERT INTO `pembelian_has_barang` (`id`, `Pembelian_id`, `Barang_idBarang`, `kuantitas`, `harga`) VALUES ('1', '180121003', 'asdas', '1', '10000');";
	$result = mysqli_query($link,$sql);
	if($result){
		$sqlKurang = "UPDATE `barang` SET kuantitas = kuantitas + ".$qty." WHERE idBarang = '".$barang_id."'";
		$resultKurang = mysqli_query($link,$sqlKurang);
		if($resultKurang){
			$sqla = "UPDATE `pembelianpo_has_barang` SET `saldo` = saldo + '".$qty."' WHERE `pembelianPO_id` = '".$noPO."' AND `Barang_idBarang` = '".$barang_id."';";
			$resultu = mysqli_query($link,$sqla);
		}
		else{
			echo "gagal";
		}
		
	}
	else{
		echo "gagal";
	}
	break;

	case "returpembelianbahan":
	require 'db.php';
	$sql;
	$noNota = $_POST["noNota"];
	$barang_id = $_POST["barang_id"];
	$qty= $_POST["qty"];
	$sql = "UPDATE `pembelian_has_bahan` SET `kuantitas` = kuantitas - ".$qty." WHERE `Pembelian_id` = ".$noNota." and `Bahan_id`= '".$barang_id."'";
	//$sql ="INSERT INTO `pembelian_has_barang` (`id`, `Pembelian_id`, `Barang_idBarang`, `kuantitas`, `harga`) VALUES ('1', '180121003', 'asdas', '1', '10000');";
	$result = mysqli_query($link,$sql);
	if($result){
		$sqlKurang = "UPDATE `bahan` SET panjang = panjang - ".$qty." WHERE id = '".$barang_id."'";
		$resultKurang = mysqli_query($link,$sqlKurang);
		if($resultKurang){
		}
		else{
			echo "gagal";
		}		
	}
	else{
		echo "gagal";
	}
	break;

	case "returpembelianbarang":
	require 'db.php';
	$sql;
	$noNota = $_POST["noNota"];
	$barang_id = $_POST["barang_id"];
	$qty= $_POST["qty"];
	$sql = "UPDATE `pembelian_has_barang` SET `kuantitas` = kuantitas - ".$qty." WHERE `Pembelian_id` = ".$noNota." and `Barang_idBarang`= '".$barang_id."'";
	//$sql ="INSERT INTO `pembelian_has_barang` (`id`, `Pembelian_id`, `Barang_idBarang`, `kuantitas`, `harga`) VALUES ('1', '180121003', 'asdas', '1', '10000');";
	$result = mysqli_query($link,$sql);
	if($result){
		$sqlKurang = "UPDATE `barang` SET kuantitas = kuantitas - ".$qty." WHERE idBarang = '".$barang_id."'";
		$resultKurang = mysqli_query($link,$sqlKurang);
		if($resultKurang){
		}
		else{
			echo "gagal";
		}		
	}
	else{
		echo "gagal";
	}
	break;

	case "insertpembelianbahan":
	require 'db.php';
	$sql;
	$noPO = $_POST["noPO"];
	$noNota = $_POST["noNota"];
	$barang_id = $_POST["barang_id"];
	$qty= $_POST["qty"];
	$harga = $_POST["harga"];
	$sql = "INSERT INTO `pembelian_has_bahan` (`Pembelian_id`, `bahan_id`, `kuantitas`, `harga`) VALUES ('".$noNota."', '".$barang_id."', '".$qty."', '".$harga."');";
	//$sql ="INSERT INTO `pembelian_has_barang` (`id`, `Pembelian_id`, `Barang_idBarang`, `kuantitas`, `harga`) VALUES ('1', '180121003', 'asdas', '1', '10000');";
	$result = mysqli_query($link,$sql);
	if($result){
		$sqlKurang = "UPDATE `bahan` SET panjang = panjang + ".$qty." WHERE id = '".$barang_id."'";
		$resultKurang = mysqli_query($link,$sqlKurang);
		if($resultKurang){
			$sqla = "UPDATE `pembelianpo_has_bahan` SET `saldo` = saldo + '".$qty."' WHERE `pembelianPO_id` = '".$noPO."' AND `bahan_id` = '".$barang_id."';";
			
			$resultu = mysqli_query($link,$sqla);
		}
		else{
			echo "gagal";
		}
		
	}
	else{
		echo "gagal";
	}
	break;

	case "insertpembelianpobahan":
	require 'db.php';
	$sql;
	$noNota = $_POST["noNota"];
	$barang_id = $_POST["barang_id"];
	$qty= $_POST["qty"];
	$harga = $_POST["harga"];
	$sql = "INSERT INTO `pembelianpo_has_bahan` (`id`,`pembelianPO_id`, `bahan_id`, `panjang`, `harga`,`saldo`) VALUES ('NULL','".$noNota."', '".$barang_id."', '".$qty."', '".$harga."',0);";
	$result = mysqli_query($link,$sql);
	if($result){
		
	}
	else{
		echo "gagal";
	}
	break;

	case "insertpembelianpobarang":
	require 'db.php';
	$sql;
	$noNota = $_POST["noNota"];
	$barang_id = $_POST["barang_id"];
	$qty= $_POST["qty"];
	$harga = $_POST["harga"];
	$sql = "INSERT INTO `pembelianpo_has_barang` (`id`,`pembelianPO_id`, `Barang_idBarang`, `qty`, `harga`,`saldo`) VALUES ('NULL','".$noNota."', '".$barang_id."', '".$qty."', '".$harga."',0);";
	$result = mysqli_query($link,$sql);
	if($result){
		
	}
	else{
		echo "gagal";
	}
	break;

	case "insertpembelianpobarangBaru";
	require 'db.php';
	$sql;
	$id = $_POST["idBarang"];
	$nama = $_POST["nama"];
	$kuantitas = $_POST["kuantitas"];
	$pjg = $_POST["pjg"];
	$satuan = $_POST["satuan"];
	$noNota = $_POST["noNota"];
	$harga=$_POST["harga"];
	$sql = "INSERT INTO `barang`(`idBarang`,`namaBarang`,`kuantitas`,`satuan`,`keterangan`) VALUES('".$id."','".$nama."','0','".$satuan."','".$pjg."')";
	$result = mysqli_query($link,$sql);
	if($result){
		$sql1 = "INSERT INTO `pembelianpo_has_barang` (`id`,`pembelianPO_id`, `Barang_idBarang`, `qty`, `harga`,`saldo`) VALUES ('NULL','".$noNota."', '".$id."', '".$kuantitas."', '".$harga."',0);";
		$result = mysqli_query($link,$sql1);
	}
	break;

	case "insertpembelianpobahanBaru";
	require 'db.php';
	$sql;
	$id = $_POST["idBarang"];
	$nama = $_POST["nama"];
	$kuantitas = $_POST["kuantitas"];
	$pjg = $_POST["pjg"];
	$noNota = $_POST["noNota"];
	$harga=$_POST["harga"];
	$sql = "INSERT INTO `bahan`(`id`,`nama`,`panjang`,`keterangan`) VALUES('".$id."','".$nama."','0','".$pjg."')";
	$result = mysqli_query($link,$sql);
	if($result){
		$sql1 = "INSERT INTO `pembelianpo_has_bahan` (`id`,`pembelianPO_id`, `Bahan_id`, `panjang`, `harga`,`saldo`) VALUES ('NULL','".$noNota."', '".$id."', '".$kuantitas."', '".$harga."',0);";
		$result = mysqli_query($link,$sql1);
	}
	
	break;

	case "insertpenjualan":
	require 'db.php';
	$sql;
	$noNota = $_POST["noNota"];
	$tanggal = $_POST["tanggal"];
	$customer= $_POST["idCustomer"];
	$karyawan = $_POST["karyawan"];
	$jenisBayar = $_POST["jenisBayar"];
	$jatuhTempo = $_POST["jatuhTempo"];
	$statusKirim = $_POST["statusKirim"];
	$total = $_POST["total"];
	$sql="INSERT INTO `penjualan` (`idNota`, `Karyawan_idKaryawan`, `Customer_idCustomer`, `tanggal`, `tanggal_jatuh_tempo`, `saldo`, `status_kirim`) VALUES ('".$noNota."', '".$karyawan."', '".$customer."', '".$tanggal."', '".$jatuhTempo."', '0', '".$statusKirim."');";
	$result = mysqli_query($link,$sql);
	if($result){
		if($jenisBayar == "T"){
			$sqlBayar = "INSERT INTO `penjualan_pembayaran` (`id`, `Penjualan_id`, `jumlah`, `keterangan`,`Karyawan_id`,`tanggal_bayar`) VALUES (NULL, '".$noNota."', '".$total."', 'Pelunasan Nota Penjualan ".$noNota."','".$karyawan."','".$tanggal."');";
			$resultBayar = mysqli_query($link,$sqlBayar);
			if($resultBayar){

			}
		}
	}
	else{
		echo "gagal";
	}
	break;

	case "insertpenjualanbarang":
	require 'db.php';
	$sql;
	$noNota = $_POST["noNota"];
	$barang_id = $_POST["barang_id"];
	$qty= $_POST["qty"];
	$harga = $_POST["harga"];
	$statusKirim = $_POST["statusKirim"];
	$sql = "INSERT INTO `penjualan_has_barang` (`id`, `Penjualan_idNota`, `Barang_idBarang`, `kuantitas`, `harga`) VALUES (NULL, '".$noNota."', '".$barang_id."', '".$qty."', '".$harga."');";
	$result = mysqli_query($link,$sql);
	if($result){
		if($statusKirim == "T"){
			$sqlKurang = "UPDATE `barang` SET kuantitas = kuantitas - ".$kuantitas." WHERE idBarang = '".$barang_id."'";
			$resultKurang = mysqli_query($link,$sqlKurang);
			if($resultKurang){
			}
			else{
				echo "gagal";
			}
		}
	}
	else{
		echo "gagal";
	}
	break;

	case "updatepenjualan":
	require 'db.php';
	$id = $_POST["noNota"];
	$kirim = $_POST["kirim"];
	$sql = "UPDATE penjualan set status_kirim = '".$kirim."' where idNota = '".$id."'";
	$result = mysqli_query($link,$sql);
	if($result){
	}
	else{
		echo "gagal";
	}
	break;

	case "updatepenjualanbarangfinal":
	require 'db.php';
	$id = $_POST["noNota"];
	$barang = $_POST["barang_id"];
	$qty = $_POST["qty"];
	$sql = "UPDATE penjualan_has_barang set kuantitas = '".$qty."' where Penjualan_id = '".$id."' and Barang_id = '".$barang."'";
	$result = mysqli_query($link,$sql);
	if($result){
	}
	else{
		echo "gagal";
	}
	break;

	case "updatepenjualanbarang":
	require 'db.php';
	$id = $_POST["noNota"];
	$barang = $_POST["barang_id"];
	$qty = $_POST["qty"];
	$sql = "UPDATE penjualan_has_barang set kuantitas = '".$qty."' where Penjualan_idNota = '".$id."' and Barang_idBarang= '".$barang."'";
	$result = mysqli_query($link,$sql);
	if($result){
		$sqlBarang = "UPDATE `barang` set kuantitas = (kuantitas - ".$qty.") WHERE idBarang = '".$barang."'";
		$resultBarang = mysqli_query($link,$sqlBarang);
		if($resultBarang){
		} 
		else{
			echo "gagal";
		}
	}
	else{
		echo "gagal";
	}
	break;

	case "updatepembelianbarang":
	require 'db.php';
	$id = $_POST["noNota"];
	$barang = $_POST["barang_id"];
	$qty = $_POST["qty"];
	$sql = "UPDATE pembelian_barang set qty = '".$qty."' where Pembelian_id = '".$id."' and Barang_id = '".$barang."'";
	$result = mysqli_query($link,$sql);
	if($result){
		$sqlBarang = "UPDATE `barang` set quantity = (quantity + ".$qty.") WHERE id = '".$barang."'";
		$resultBarang = mysqli_query($link,$sqlBarang);
		if($resultBarang){
		} 
		else{
			echo "gagal";
		}
	}
	else{
		echo "gagal";
	}
	break;

	case "updatepembelian":
	require 'db.php';
	$id = $_POST["noNota"];
	$kirim = $_POST["kirim"];
	$sql = "UPDATE pembelian set status_kirim = '".$kirim."' where id = '".$id."'";
	$result = mysqli_query($link,$sql);
	if($result){
	}
	else{
		echo "gagal";
	}
	break;

	case "ambiltanggalpb":
	require 'db.php';
	$sql = "SELECT max(idprosesbahan) as id FROM `prosesbahan`";
	$result = mysqli_query($link,$sql);
	while($row = mysqli_fetch_object($result)){
		$data["id"] = $row->id;
	}
	echo json_encode($data);
	break;

	case "ambiltanggalproduksi":
	require 'db.php';
	$sql = "SELECT max(id) as id FROM `produksi`";
	$result = mysqli_query($link,$sql);
	while($row = mysqli_fetch_object($result)){
		$data["id"] = $row->id;
	}
	echo json_encode($data);
	break;

	case "insertproduksibahan":
	require 'db.php';
	$produksi_id = $_POST["produksi_id"];
	$barang_id = $_POST["barang_id"];
	$qty = $_POST["qty"];
	$jumlah = $_POST["jumlah"];
	$total = $jumlah - $qty;
	$sql = "INSERT INTO `produksi_has_barang`(`id`,`kuantitas`,`Produksi_id`,`Barang_idBarang`,`jenis`) VALUES('NULL','".$qty."','".$produksi_id."','".$barang_id."','bahan')";
	$result = mysqli_query($link,$sql);
	if($result){
		$sqlUbah = "UPDATE `barang` SET `kuantitas` = '".$total."' WHERE `barang`.`idBarang` = '".$barang_id."';";
		$resultUbah = mysqli_query($link,$sqlUbah);
		if(!$resultUbah){
			echo "gagal";
		}
	}
	break;

	case "insertbahanprosesbahan":
	require 'db.php';
	$prosesbahan_id = $_POST["prosesbahan_id"];
	$bahan_id = $_POST["bahan_id"];
	$qty = $_POST["qty"];
	$jumlah = $_POST["jumlah"];
	$sql = "INSERT INTO `prosesbahan_has_bahan`(`id`,`Prosesbahan_id`,`Bahan_id`,`kuantitas`) VALUES('NULL','".$prosesbahan_id."','".$bahan_id."','".$qty."')";
	$result = mysqli_query($link,$sql);
	if($result){
		$sqlUbah = "UPDATE `bahan` SET `panjang` = panjang -'".$qty."' WHERE `bahan`.`id` = '".$bahan_id."';";
		$resultUbah = mysqli_query($link,$sqlUbah);
		if(!$resultUbah){
			echo "gagal";
		}
	}
	break;

	case "insertproduksibarang":
	require 'db.php';
	$produksi_id = $_POST["produksi_id"];
	$barang_id = $_POST["barang_id"];
	$qty = $_POST["qty"];
	$jumlah = $_POST["jumlah"];
	$total = $jumlah + $qty;
	$sql = "INSERT INTO `produksi_has_barang`(`id`,`kuantitas`,`Produksi_id`,`Barang_idBarang`,`jenis`) VALUES('NULL','".$qty."','".$produksi_id."','".$barang_id."','barang')";
	$result = mysqli_query($link,$sql);
	if($result){
		$sqlUbah = "UPDATE `barang` SET `kuantitas` = '".$total."' WHERE `barang`.`idBarang` = '".$barang_id."';";
		$resultUbah = mysqli_query($link,$sqlUbah);
		if(!$resultUbah){
			echo "gagal";
		}
	}
	break;

	case "insertbarangprosesbahan":
	require 'db.php';
	$prosesbahan_id = $_POST["prosesbahan_id"];
	$barang_id = $_POST["barang_id"];
	$qty = $_POST["qty"];
	$jumlah = $_POST["jumlah"];
	$sql = "INSERT INTO `prosesbahan_has_barang`(`id`,`Prosesbahan_id`,`Barang_idBarang`,`kuantitas`) VALUES('NULL','".$prosesbahan_id."','".$barang_id."','".$qty."')";
	$result = mysqli_query($link,$sql);
	if($result){
		$sqlUbah = "UPDATE `barang` SET `kuantitas` = '".$total."' WHERE `barang`.`idBarang` = '".$barang_id."';";
		$resultUbah = mysqli_query($link,$sqlUbah);
		if(!$resultUbah){
			echo "gagal";
		}
	}
	break;

	case "insertproduksibarangbaru":
	require 'db.php';
	$produksi_id = $_POST["produksi_id"];
	$barang_id = $_POST["barang_id"];
	$nama = $_POST["nama"];
	$qty = $_POST["qty"];
	$pjg = $_POST["pjg"];
	$kategori_id = $_POST["kategori_id"];
	$sql = "INSERT INTO `barang`(`idBarang`,`namaBarang`,`kuantitas`,`satuan`,`keterangan`) VALUES('".$barang_id."','".$nama."','".$qty."','pcs','".$pjg."')";
	//$sql = "INSERT INTO `produksi_barang`(`Produksi_id`,`Barang_id`,`qty`) VALUES('".$produksi_id."','".$barang_id."','".$qty."')";
	$result = mysqli_query($link,$sql);
	if($result){
		$sqlProduksi = "INSERT INTO `produksi_has_barang`(`id`,`kuantitas`,`Produksi_id`,`Barang_idBarang`,`jenis`) VALUES('NULL','".$qty."','".$produksi_id."','".$barang_id."','barang')";
		$resultProduksi = mysqli_query($link,$sqlProduksi);
		if(!$resultProduksi){
			echo "gagal";
		}
	}
	break;

	case "insertprosesbarangbaru":
	require 'db.php';
	$prosesbahan_id = $_POST["prosesbahan_id"];
	$barang_id = $_POST["barang_id"];
	$nama = $_POST["nama"];
	$qty = $_POST["qty"];
	$pjg = $_POST["pjg"];
	$kategori_id = $_POST["kategori_id"];
	$sql = "INSERT INTO `barang`(`idBarang`,`namaBarang`,`kuantitas`,`satuan`,`keterangan`) VALUES('".$barang_id."','".$nama."','".$qty."','pcs','".$pjg."')";
	//$sql = "INSERT INTO `produksi_barang`(`Produksi_id`,`Barang_id`,`qty`) VALUES('".$produksi_id."','".$barang_id."','".$qty."')";
	$result = mysqli_query($link,$sql);
	if($result){
		$sqlProduksi = "INSERT INTO `prosesbahan_has_barang`(`id`,`Prosesbahan_id`,`Barang_idBarang`,`kuantitas`) VALUES('NULL','".$prosesbahan_id."','".$barang_id."','".$qty."')";
		$resultProduksi = mysqli_query($link,$sqlProduksi);
		if(!$resultProduksi){
			echo "gagal";
		}
	}
	break;
}
