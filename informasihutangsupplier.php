<html>
<link rel="stylesheet" href="css/stylepiutang.css">
<title>Informasi Piutang Usaha</title>
 <body>
  <div id="wrapper">
  <?php 
  require 'db.php';
  require 'sql.php';
  ?>
  <h1>Informasi Piutang Usaha</h1>
  <div id="header">
  </div>
  <div id="body_kertas">
   <table id="tablehutang">
      <tr>
          <th> Supplier </th>
          <th> Tanggal Faktur </th>
          <th> Nominal (Per tanggal) </th>
          <th> Per bulan </th>
          <th> Total </th>
          <th> Jatuh Tempo </th>
      </tr>
      <?php 
      $sql = "SELECT * FROM pembelian WHERE saldo = 0";
      $result = mysqli_query($link,$sql);
      $resultTotalUtang = PembayaranPembelian();
      while ($row = mysqli_fetch_object($result)) {
        echo "<tr>";
        echo "<td>" . $row->Supplier_idSupplier . "</td>";
        echo "<td>" . $row->tanggal . "</td>";
        echo "<td>" . $row->saldo . "</td>";
        echo "</tr>";
        # code...
      }
      ?> 
  </table>
  </div>
  </div>
 </body>
</html>