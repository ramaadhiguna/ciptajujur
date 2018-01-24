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
          <th> Jatuh Tempo </th>
      </tr>
      <?php 
      $sql = "SELECT * FROM pembelian WHERE saldo = 0";
      $result = mysqli_query($link,$sql);

      while ($row = mysqli_fetch_object($result)) {
        $totalHutang = 0;
        echo "<tr>";
        echo "<td>" . $row->Supplier_idSupplier . "</td>";
        echo "<td>" . $row->tanggal . "</td>";
        $sqlCekTotalBarang = "SELECT p.id, sum(pb.kuantitas*pb.harga) as total FROM pembelian p, pembelian_has_barang pb WHERE p.id = pb.Pembelian_id and p.id = ".$row->id." group by p.id";
        $resultTotalBarang = mysqli_query($link,$sqlCekTotalBarang);
        while ($rowTotalBarang = mysqli_fetch_object($resultTotalBarang)) {
          $totalHutang+= $rowTotalBarang->total;
          # code...
        }
        $sqlCekTotalBahan = "SELECT p.id, sum(pb.kuantitas*pb.harga) as total FROM pembelian p, pembelian_has_bahan pb WHERE p.id = pb.Pembelian_id and p.id = ".$row->id." group by p.id";
        $resultTotalBahan = mysqli_query($link,$sqlCekTotalBahan);
        while ( $rowTotalBahan = mysqli_fetch_object($resultTotalBahan)) {
          $totalHutang+= $rowTotalBahan->total;
          # code...
        }

        echo "<td> Rp " . number_format($totalHutang,0,".",".") . "</td>";
        echo "<td>" . $row->tanggal_jatuh_tempo . "</td>";
          # code...
        }
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan=2> Total </td>";
        echo "<td> Rp " . number_format($totalHutang,0,".",".") . "</td>";
        echo "</tr>";
      ?> 
  </table>
  </div>
  </div>
 </body>
</html>