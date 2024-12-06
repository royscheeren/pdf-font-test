<?php
use Dompdf\Dompdf;

require './vendor/autoload.php';

$html = <<<HTML
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
@font-face {
  font-family: "Manrope";
  src:
    url("./fonts/Manrope-Medium.ttf") format("truetype"),
}

@font-face {
  font-family: "Scribble";
  src:
    url("./fonts/scribble-font.ttf") format("truetype"),
}
.m {
    font-family: 'Manrope';
}

.s {
    font-family: 'Scribble';
}

</style>
</head>
<body>
    <p class="m">
        Manrope
    </p>
    <p class="s">
        Scribble
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

$h = $dompdf->loadHtml($html); //load an html

$dompdf->render();

$pdf = $dompdf->output([
    'compress' => true,
    'Attachment' => false,
]);

file_put_contents('hello-remote.pdf', $pdf);

$f = $dompdf->outputHtml();
file_put_contents('hello-remote.html', $f);

?>
