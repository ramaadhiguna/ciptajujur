<?php
require_once __DIR__ . '/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

ob_start();
include 'cetaknotajual.php';
$output = ob_get_clean();
$dompdf->loadHtml($output);

$dompdf->setPaper([0, 0, $tinggiNota, 680.315], 'landscape');

$dompdf->render();

//$dompdf->stream('cetak.pdf');
$dompdf->stream( 'file.pdf' , array( 'Attachment'=>0 ) );
?>