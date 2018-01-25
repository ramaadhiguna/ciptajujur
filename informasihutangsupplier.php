<html>
<link rel="stylesheet" href="css/stylepiutang.css">
<title>Informasi Piutang Usaha</title>
 <body>
  <div id="wrapper">
  <?php
    require 'db.php';
    require 'sql.php';
  session_start();
  if (isset($_SESSION["logkaryawan"])) {
    if ($_SESSION["jabatan"] == "Pemilik") {
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
      $sql = "SELECT * FROM pembelian";
      $result = mysqli_query($link,$sql);
      while($row = mysqli_fetch_object($result)) {
        $totalHutang = 0;
        $totalHutangBarang = 0;
        $totalHutangBahan = 0;
        $grandTotalHutang = 0;
        $sqlCekTotalBarang = "SELECT p.id, sum(pb.kuantitas*pb.harga) as total FROM pembelian p, pembelian_has_barang pb WHERE p.id = pb.Pembelian_id and p.id = ".$row->id." group by p.id";
        $resultTotalBarang = mysqli_query($link,$sqlCekTotalBarang);
        while ($rowCekTotalBarang = mysqli_fetch_object($resultTotalBarang)) {
          $totalHutang+=$rowCekTotalBarang->total;
          $totalHutangBarang+=$totalHutang;
          # code...
        }
        $sqlCekTotalBahan = "SELECT p.id, sum(pb.kuantitas*pb.harga) as total FROM pembelian p, pembelian_has_bahan pb WHERE p.id = pb.Pembelian_id and p.id = ".$row->id." group by p.id";
        $resultTotalBahan = mysqli_query($link,$sqlCekTotalBahan);
        while ($rowCekTotalBahan = mysqli_fetch_object($resultTotalBahan)) {
          $totalHutang+=$rowCekTotalBahan->total;
          $totalHutangBahan+=$totalHutang;
          # code...
        }
        if ($row->saldo < $totalHutang) {
          echo "<tr>";
          echo "<td>" . $row->Supplier_idSupplier . "</td>";
          echo "<td>" . $row->tanggal ."</td>";
          echo "<Td> Rp ". number_format($totalHutang,0,".",".") . " </td>";
          echo "<td>" . $row->tanggal_jatuh_tempo ."</td>";
          echo "</tr>";
        }
      }
        echo "<tr>";
        echo "<td colspan=2> Total </td>";
        echo "<td> ini bagian Grandtotal </td>";
        echo "</tr>";         
      ?> 
  </table>
  </div>
  </div>
 </body>
 <?php
    }
    else {
      header('Location: index.php');
    }

    ?>

<?php 
  }
  else {
    header('Location: login.php');
  }

  ?>
</html>