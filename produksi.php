<html>
<head>
</head>
<body>
<div>
<p style="text-align:center; font-size: 300%">Selamat Datang, Admin</p>
            <table>
                <tr>
                    <a href="adminhome.php">  
                    <p>Home</p>
                    </a>
                    <a href="gudangbarang.php">  
                    <p>Gudang Barang</p>
                    </a>
                    <a href="gudangbahan.php">  
                    <p>Gudang bahan</p>
                    </a>
                    <a href="kategorigudang.php">  
                    <p>Kategori</p>
                    </a>
                    <a href="produksi.php">  
                    <p>Produksi</p>
                    </a>
                </tr>
            </table>
      </div></br>
<?php
        require 'db.php';
        $sqlBahan = "SELECT b.id,b.nama,b.keterangan FROM barang b,kategori k WHERE b.Kategori_id = k.id and k.jenis = 'Bahan Produksi'";
        $sqlBarang = "SELECT b.id,b.nama,b.keterangan FROM barang b,kategori k WHERE b.Kategori_id = k.id and k.jenis = 'Barang Jadi'";
        $sqlKaryawan = "SELECT * FROM `karyawan`b where jabatan ='Penjahit'";
        $resultBahan = mysqli_query($link,$sqlBahan);
        $resultBarang = mysqli_query($link,$sqlBarang);
        $resultKaryawan = mysqli_query($link,$sqlKaryawan);
        $sqlKategori = "select * from Kategori where jenis='Bahan Produksi';";
        $resultKategori = mysqli_query($link,$sqlKategori);
        if(!$resultBahan){
          die("SQL Error :".$sql);
        }
        if(!$resultBarang){
          die("SQL Error :".$sql);
        }
        if(!$resultKaryawan){
          die("SQL Error :".$sql);
        }
?> 
<div id="form_block_bahan" > <!-- added an outside wrapper -->
  <div class="form_bahan" >
    Nama : <select name="nama[]">
                    <?php while($rowBahan=mysqli_fetch_object($resultBahan)){
                        echo "<option value='".$rowBahan->id."'>".$rowBahan->nama."</option>";

                        }?>
                    </select>
    Qty : <input type="number" name="kuantitas[]" style="width: 2%;">  
    
  <input type="hidden" name="hidden[]" value="bahan">
  <input type="button" name="remove" value="Remove">
  </div>
</div> <!-- close #form_block_wrapper -->

<input type="button" value="Tambah Bahan" id="addBahan">
</br>
</br>
</br>
</br>

<div id="form_block_barang" class="hidden"> <!-- added an outside wrapper -->
  <div class="form_barang" class="hidden">
    Nama : <select name="nama[]">
                    <?php while($rowBarang=mysqli_fetch_object($resultBarang)){
                        echo "<option value='".$rowBarang->id."'>".$rowBarang->nama." (".$rowBarang->keterangan.")</option>";

                        }?>
                    </select>
    Qty : <input type="number" name="kuantitas[]" style="width: 2%;">  
    
  <input type="hidden" name="hidden[]" value="bahan">
  <input type="button" name="remove" value="Remove">
  </div>
  </div>
<input type="button" value="Tambah Barang" id="addBarang">
</br>
</br>
</br>
</br>

<div id="form_block_karyawan" class="hidden"> <!-- added an outside wrapper -->
  <div class="form_karyawan" class="hidden">
    Nama : <select name="namaKaryawan[]">
                    <?php while($rowKaryawan=mysqli_fetch_object($resultKaryawan)){
                        echo "<option value='".$rowKaryawan->id."'>".$rowKaryawan->nama."</option>";

                        }?>
                    </select> 
  <input type="hidden" name="hidden[]" value="bahan">
  <input type="button" name="remove" value="Remove">
  </div>
  </div>
<input type="button" value="Tambah Penjahit" id="addKaryawan">
<input type="button" id="insert" value="Insert" style="margin-left: 50%;">

</body>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
</html>
</html>
<script>
(function($){
  $(document).ready(function() {
      //get and cache HTML for this block
      
      var selectHtml = $('.form_bahan:eq(0)')[0].outerHTML
      var selectHtml1 = $('.form_barang:eq(0)')[0].outerHTML
      var selectHtml2 = $('.form_karyawan:eq(0)')[0].outerHTML

      $("#addBahan").click(function() {
          $('#form_block_bahan').append(selectHtml);

      });
      $("#addBarang").click(function() {
          $('#form_block_barang').append(selectHtml1);
      });
      $("#addKaryawan").click(function() {
          $('#form_block_karyawan').append(selectHtml2);
      });
      //use .on for events on dynamic content ( event delegation )
     $("#form_block_bahan").on('click', 'input[name="remove"]', function() {
         $(this).closest(".form_bahan").remove();
     });
     $("#form_block_barang").on('click', 'input[name="remove"]', function() {
         $(this).closest(".form_barang").remove();
     });
     $("#form_block_karyawan").on('click', 'input[name="remove"]', function() {
         $(this).closest(".form_karyawan").remove();
     });


      $("#insert").click(function() {
        var nama = [];
        var kuantitas = [];
        var karyawan = [];
        $('select[name="nama[]"]').each( function(){
              nama.push($(this).val());
        });
        $('input[name="kuantitas[]"]').each( function(){
              kuantitas.push($(this).val());
        });
        $('select[name="namaKaryawan[]"]').each( function(){
              karyawan.push($(this).val());
        });
        $.ajax({
              type: "POST",
              url: "queryproduksi.php",
              data: 'tanggal=' + Date.now(),
              success: function(result) {
                  $.ajax({ 
                        type: "POST",
                        url: "queryambiltanggal.php",
                        cache: false, 
                        dataType :"JSON",                         
                        success: function(data){
                            //alert(data.id);
                            //a=data.id;
                            //alert(a);
                            var raw_result=JSON.stringify(data.id);
                            produksi_barang(data.id);
                        }});
                  window.location = "gudangbahan.php";
              }});
      function produksi_barang(smth) {        
         alert(smth);
         for( i = 0 ;i < nama.length ; i++){
            //alert(nama[i]+" "+kuantitas[i]+" "+smth);
            $.ajax({
                type: "POST",
                url: "queryproduksibarang.php",
                data: 'produksi_id=' + smth+ '&barang_id=' + nama[i]+ '&qty=' + kuantitas[i],
                success: function(result) {

                }
            });
         }
         for( i = 0 ;i < karyawan.length ; i++){
            $.ajax({
                type: "POST",
                url: "queryproduksikaryawan.php",
                data: 'produksi_id=' + smth+ '&karyawan_id=' + karyawan[i],
                success: function(result) {
                   window.location = "gudangbahan.php";
                }
            });
         }
    }
      });

  });
})(jQuery);
</script>