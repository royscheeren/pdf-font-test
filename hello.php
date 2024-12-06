<?php
use Dompdf\Dompdf;

require './vendor/autoload.php';

$html = <<<HTML
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Tangerine&display=swap" rel="stylesheet" />
<style>

.m {
    font-family: 'Montserrat';
}

.t {
    font-family: 'Tangerine';
}

</style>
</head>
<body>
    <p class="m">
        Montserrat
    </p>
    <p class="t">
        Tangerine
    </p>
</body>
</html>
HTML
;

//$_dompdf_show_warnings = true;
//$_dompdf_debug = true;

$tmp = sys_get_temp_dir();

$dompdf = new Dompdf([
    'logOutputFile' => '',
    // authorize DomPdf to download fonts and other Internet assets
    'isRemoteEnabled' => true,
    // all directories must exist and not end with /
    'fontDir' => $tmp,
    'fontCache' => $tmp,
    'tempDir' => $tmp,
    'chroot' => $tmp,
]);

$dompdf->loadHtml($html); //load an html

$dompdf->render();

$pdf = $dompdf->output([
    'compress' => true,
    'Attachment' => false,
]);

file_put_contents('hello.pdf', $pdf);

?>
