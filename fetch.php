<?php
$link = mysqli_connect("127.0.0.1", "root", "root", "kerjapraktek");
$output = '';
$sql = "SELECT * FROM barang WHERE namaBarang LIKE %".$_POST["search"]."%'";

$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
	$output .= '<h4 align="center">Search Result</h4>';
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Nama Barang</th><th>Jenis</th><th>Kuantitas</th><th>Ukuran</th><th>Edit</th>
						</tr>';
	while($row = mysqli_fetch_array(result)) {
		$output .= '
		<tr>
			<td>'.$row["namaBarang"].'</td>
			<td>'.$row["quantity"].'</td>
			<td>'.$row["keterangan"].'</td>
		</tr>
		';
	}
	echo $output;
}
else {
	echo 'Data not Found';
}
?>