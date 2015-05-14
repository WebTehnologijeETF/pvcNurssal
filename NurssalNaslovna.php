<?php

$counter = 0;
$novosti = array();
$sviClanci = "";
foreach(glob("novosti/*.txt") as $imeFajla)
{
    $novosti[$counter] = file($imeFajla);
    $counter++;
}

$kolicinaNovosti=count($novosti);
for ($i=0; $i<$kolicinaNovosti; $i++)
{
    for ($j=0; $j<$kolicinaNovosti-1-$i; $j++) {
        $time1 = strtotime($novosti[$j][0]); $newformat1 = date('d-m-Y h:i:s',$time1);
        $time2 = strtotime($novosti[$j+1][0]); $newformat2 = date('d-m-Y h:i:s',$time2);
        if ($time2 < $time1) {
            $tmp=$novosti[$j];
            $novosti[$j]=$novosti[$j+1];
            $novosti[$j+1]=$tmp;
        }
    }
}

for ($i=0; $i<$kolicinaNovosti; $i++)
{
    $novostLength=count($novosti[$i]);
    $sadrzajNovosti=$detaljnijeNovosti="";
    $j=4;
    while ($j<$novostLength){
        if (trim($novosti[$i][$j])=="--"){
            for ($k=$j+1; $k<$novostLength; $k++){
                $detaljnijeNovosti.=$novosti[$i][$k];
            }
            break;
        }
        $sadrzajNovosti.=$novosti[$i][$j];
        $j++;
    }
    $datum=$novosti[$i][0]; $autor=$novosti[$i][1]; $naslov=$novosti[$i][2]; $slika=$novosti[$i][3];
    if (empty($detaljnijeNovosti))
    {
        $omoguciDetaljno = 'display: none';
    }
    else
    {
        $omoguciDetaljno = 'display: block';
    }
    $normalanNaslov = ucfirst(strtolower($naslov));
    $sviClanci .= "<form method='post' action='NurssalDetaljnaVijest.php'>
    <div class='clanak1'>
        <input type='hidden' name='autor' value='$autor'>
        <input type='hidden' name='naslov' value='$normalanNaslov'>
        <input type='hidden' name='slika' value='$slika'>
        <input type='hidden' name='sadržaj' value= '$sadrzajNovosti'>
        <input type='hidden' name='datum' value='$datum'>
        <input type='hidden' name='detaljno' value='$detaljnijeNovosti'>
        <div class='datum'>$datum</div>
        <h2>$normalanNaslov</h2>
        <p>
            $sadrzajNovosti
        </p>
        <input type='submit' value='Nastavak teksta' style='$omoguciDetaljno' class='link'>
        <div class='autor'> $autor </div>
    </div>
</form>";

}

echo <<<_HTML_

<!DOCTYPE HTML>
<html>
<head>
<link href="NurssalCSS.css" rel="stylesheet">
<script src = "SinglePage.js"></script>
  <script type="text/javascript" src="NurssalJS.js"></script>
<meta charset="UTF-8">

<title> Nurssal d.o.o. - Vas pogled u svijet </title>
</head>
<body>
<div class="body">
<div class="header">
<h1> Nurssal d.o.o. </h1>
<p>Vas pogled u svijet</p>
</div>

<div class="meni">
<ul>

<li><a onclick = "AjaxNavigacija('NurssalNaslovna.php')">Naslovna</a></li>
<li><a onclick = "AjaxNavigacija('NurssalONama.html')">O Nama</a></li>
<li><a onclick = "AjaxNavigacija('NurssalKontakt.php')">Kontakt</a></li>
<li><a onclick = "AjaxNavigacija('NurssalFotografije.html')">Fotografija</a></li>
<li><a onclick = "AjaxNavigacija('NurssalCjenovnik.html')">Cjenovnik</a></li>
<li><a onclick = "AjaxNavigacija('NurssalProizvodi.html')">Proizvodi</a></li>

</ul>
</div>

<h1 class ="navNaslov">Naslovna</h1>
<div class = "slika">
<img src ="Stranica/logo.png" alt="">
</div>

<div class="news">
<div class="naslov">Novosti</div>
<hr/>
<div class="clanak">
$sviClanci
</div>

</div>
</div>
</body>
</html>

_HTML_;

?>