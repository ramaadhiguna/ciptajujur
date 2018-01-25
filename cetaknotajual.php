<html>
<link rel="stylesheet" href="css/stylenota.css">
 <body>
  <div id="wrapper">
  <?php 
  require 'db.php';
  require 'sql.php';
  $noNota = $_GET['cmd'];
  $resultTampilBarang = KofirmasiPengirimanPenjualan($noNota);
  $resultTampilCustomer = NotaPenjualan($noNota);
  $tinggiNota = 311.811;
  $jumlahBarang = 0;
  $tinggiBarang = 14.1732;

  if($rowNota = mysqli_fetch_object($resultTampilCustomer)) {
    $nama_perusahaan = $rowNota->nama;
    $tanggal = $rowNota->tanggal;
    $alamat = $rowNota->alamat;
    $kontak = $rowNota->kontak;
  }

  ?>
  
  <div id="header">
    <div id="labelsuratjalan">
      Surat Jalan
    </div>
  <div id="tuan_toko">
    <table>
      <tr>
        <td id="labelheadernota"> NOTA No. </td>
        <td> <?php echo $noNota ?> </td>
      </tr>
      <tr>
        <td id="labelheadernota"> tanggal: </td>
        <td> <?php echo $tanggal;?> </td>
      </tr>
    </table>

  </div>
  <div id="nomor_nota">
  KEPADA <br>
  <?php echo $nama_perusahaan ?> <br>
  <?php echo $alamat ?> <br>
  <?php echo $kontak ?> <br>
  </div>
  </div>
  <div id="body_nota">
   <table border="1" id="tabelbarang">
      <tr>
          <th> Kode Barang </th>
          <th> Nama Produk </th>
          <th> Kuantitas </th>
          <th> Satuan </th>
          <th> Keterangan </th>
      </tr>
        <?php 
          while ($rowTampilBarang = mysqli_fetch_object($resultTampilBarang)) {
            echo "<tr>";
                    echo "<td class=fonttable>". $rowTampilBarang->Barang_idBarang . "</td>";
                    echo "<td class=fonttable>". $rowTampilBarang->namaBarang . " </td>";
                    echo "<td class=fonttable>". $rowTampilBarang->kuantitas. " </td>";
                    echo "<td class=fonttable>". $rowTampilBarang->satuan. " </td>";
                    echo "<td class=fonttable>". $rowTampilBarang->keterangan . "</td>";
            echo "</tr>";
            $jumlahBarang+=1.0;
          }
          $tinggiNota+=$jumlahBarang*$tinggiBarang;
        ?>
  </table>
  <br>
  <br>
   </div>
  <div id="tanda_terima">
  Tanda Terima
  <br>
  <br>
  <br>
  (...............)
  </div>
  <div id="pengirim_barang">
  Pengirim Barang
  <br>
  <br>
  <br>
  (...............)
  </div>
  <div id="hormat_kami">
  Hormat Kami
  <br>
  <br>
  <br>
  (...............)
  </div>
 
  </div>
 </body>
</html>