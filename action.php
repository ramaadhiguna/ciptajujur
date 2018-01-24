<?php 
$link = mysqli_connect("127.0.0.1", "root", "root", "kerjapraktek");

$input = filter_input_array(INPUT_POST);

$nama = mysqli_real_escape_string($link, $input["nama"]);
$quantity = mysqli_real_escape_string($link, $input["quantity"]);
$keterangan = mysqli_real_escape_string($link, $input["keterangan"]);
$kategori = mysqli_real_escape_string($link, $input["Kategori_id"]);

if ($input["action"] === 'edit') {
	$query = "
		UPDATE barang SET nama = '".$nama."',
		quantity = '".$quantity."',
		keterangan = '".$keterangan."',
		Kategori_id = '".$kategori."'
		WHERE id = '".$input["id"]."'
	";

	mysqli_query($link, $query);
}

?>