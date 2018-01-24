<?php
require_once __DIR__ . '/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

ob_start();
include 'informasihutangsupplier.php';
$output = ob_get_clean();
$dompdf->loadHtml($output);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

//$dompdf->stream('cetak.pdf');
$dompdf->stream( 'piutangusaha.pdf' , array( 'Attachment'=>0 ) );
?>