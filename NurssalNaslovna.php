<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "nurssalbaza";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
$conn->set_charset("utf8");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT v.ID as vijestID, v.Naslov as Naslov, v.Uvod as Uvod, v.Tekst as Tekst, v.UrlSlike as Url, v.DatumObjave as Datum, a.Ime as Ime, a.Prezime as Prezime FROM vijest v, autor a where a.ID = v.AutorID";

$result = $conn->query($sql);

$brojac = 0;
$vijesti = array();
$sviClanci = "";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
     $vijesti[$brojac++] = $row;
    }
}
$conn->close();

function sortByDate($a, $b) {
    return $a['Datum'] - $b['Datum'];
}

usort($vijesti, 'sortByDate');

for ($i = 0;$i<$brojac;$i++)
{
    $autor = $vijesti[$i]["Ime"] . " ". $vijesti[$i]["Prezime"];
    $naslov = $vijesti[$i]["Naslov"];
    $slika = $vijesti[$i]["Url"];
    $sadrzaj = $vijesti[$i]["Uvod"];
    $datum = $vijesti[$i]["Datum"];
    $id = $vijesti[$i]["vijestID"];

    $sadrzajVijesti = $vijesti[$i]["Tekst"];
    if (empty($sadrzajVijesti) || $sadrzajVijesti == null)
        $omoguciDetaljno = 'display:none';
    else $omoguciDetaljno = 'display:block';

    $sviClanci .= "<form method='post' action='NurssalDetaljnaVijest.php'>
    <div class='clanak1'>
        <input type='hidden' name='idVijesti' value='$id'>
        <input type='hidden' name='autor' value='$autor'>
        <input type='hidden' name='naslov' value='$naslov'>
        <input type='hidden' name='slika' value='$slika'>
        <input type='hidden' name='sadržaj' value= '$sadrzaj'>
        <input type='hidden' name='datum' value='$datum'>
        <input type='hidden' name='detaljno' value='$sadrzajVijesti'>
        <div class='datum'>$datum</div>
        <h2>$naslov</h2>
        <p>
            $sadrzaj
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
<li><a onclick = "AjaxNavigacija('NurssalAdmin.php')">Administrator</a></li>


</ul>
</div>

<h1 class ="navNaslov">Naslovna</h1>
<div class = "slika">
<img src ="Stranica/logo.png" alt="">
</div>


<div class="news">
<div class="naslov">vijesti</div>
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