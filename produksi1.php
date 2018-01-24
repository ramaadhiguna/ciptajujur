<html>
<head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js" type="text/javascript"></script>
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
                </tr>
            </table>
      </div></br>
<?php
        require 'db.php';
        $sql = "SELECT * FROM `barang` where Kategori_id IN(select id from `kategori` where jenis = 'Bahan Produksi')";
        $result = mysqli_query($link,$sql);
        $sqlKategori = "select * from Kategori where jenis='Bahan Produksi';";
        $resultKategori = mysqli_query($link,$sqlKategori);
        if(!$result){
          die("SQL Error :".$sql);
        }
        ?> 
<div id="form_block_wrapper" class="hidden"> <!-- added an outside wrapper -->
  <div class="form_block" class="hidden">
    Nama : <input type="text" name="nama[]"><br/>
    Kuantitas : <input type="text" name="kuantitas[]"><br/>
    Kategori : <select name="idKategori[]">
                    <?php while($rowKategori=mysqli_fetch_object($resultKategori)){
                        echo "<option value='".$rowKategori->id."'>".$rowKategori->nama."</option>";

                        }?>
                    </select>
  <input type="hidden" name="hidden[]" value="bahan">
  <input type="button" name="remove" value="Remove">
  </div>
</div> <!-- close #form_block_wrapper -->

<input type="button" value="Tambah Bahan" id="addBahan">
<input type="button" id="insert" value="Insert" style="margin-left: 50%;">

</body>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
</html>
</html>
<script>
(function($){
  $(document).ready(function() {
      //get and cache HTML for this block
      var selectHtml = $('.form_block:eq(0)')[0].outerHTML
      $("#addBahan").click(function() {
          $('#form_block_wrapper').append(selectHtml);
      });
      
      //use .on for events on dynamic content ( event delegation )
     $("#form_block_wrapper").on('click', 'input[name="remove"]', function() {
         $(this).closest(".form_block").remove();
     });

      $("#insert").click(function() {
         //no I idea what you want to do here, you can serialze all the data
         //$('#form_block_wrapper').serialize(); //https://api.jquery.com/serialize/
         
         //you can get the selected options and get their value
         var nama = [];
         var kuantitas = [];
         var kategori = [];
         $('input[name="nama[]"]').each( function(){
              nama.push($(this).val());
         });
         $('input[name="kuantitas[]"]').each( function(){
              kuantitas.push($(this).val());
         });
         $('select[name="idKategori[]"]').each( function(){
              kategori.push($(this).val());
         });
         for( i = 0 ;i < nama.length ; i++){
            alert(nama[i]+" "+kuantitas[i]+" "+kategori[i]);
            $.ajax({
                type: "POST",
                url: "queryproduksi.php",
                data: 'nama=' + nama[i]+ '&kuantitas=' + kuantitas[i]+ '&idKategori=' + kategori[i],
                success: function(result) {
                   window.location = "gudangbahan.php";
                }
            });
         }
      });
  });
})(jQuery);
</script>