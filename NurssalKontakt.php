<?php

$naslovna = "
<div class='body'>
<div class='header'>
<h1> Nurssal d.o.o. </h1>
<p>Vas pogled u svijet</p>
</div>


<div class='meni'>
<ul>
<li><a onclick = 'AjaxNavigacija(\"NurssalNaslovna.php\")'>Naslovna</a></li>
<li><a onclick = 'AjaxNavigacija(\"NurssalONama.html\")'>O Nama</a></li>
<li><a onclick = 'AjaxNavigacija(\"NurssalKontakt.php\")'>Kontakt</a></li>
<li><a onclick = 'AjaxNavigacija(\"NurssalFotografije.html\")'>Fotografija</a></li>
<li><a onclick = 'AjaxNavigacija(\"NurssalCjenovnik.html\")'>Cjenovnik</a></li>
<li><a onclick = 'AjaxNavigacija(\"NurssalProizvodi.html\")'>Proizvodi</a></li>
<li><a onclick = 'AjaxNavigacija(\"NurssalAdmin.php\")'>Administrator</a></li>
</ul>
</div>


<h1 class ='navNaslov'>Kontakt</h1>
<div class = 'slika'>
<img src ='Stranica/logo.png' alt=''>
</div>


";

$ime = $prezime = $grad = $postanski = $mail = $telefon = $poruka = "";
$imeGreska = $prezimeGreska = $gradGreska = $mailGreska = $telefonGreska = "";
$imeSlika = $prezimeSlika = $gradSlika = $mailSlika = $telefonSlika = "display:none";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $sveValidno = true;
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $mail = $_POST['mail'];
    $grad = $_POST['grad'];
    $postanski = $_POST['postanski'];
    $telefon = $_POST['telefon'];
    $poruka = $_POST['komentar'];

    if (!validnostImena($ime) || empty($ime))
    {
        $sveValidno = false;
        $imeGreska = "Neispravan unos!";
        $imeSlika = "display:block";
    }
    else
    {
        $imeGreska = "";
        $imeSlika = "display:none";
        testirajPodatak($ime);
    }

    if (!validnostImena($prezime) || empty($prezime))
    {
        $sveValidno = false;
        $prezimeGreska = "Neispravan unos!";
        $prezimeSlika = "display:block";
    }
    else
    {
        $prezimeGreska = "";
        $prezimeSlika = "display:none";
        testirajPodatak($ime);
    }

    if (!mailValidacija($mail) || empty($mail))
    {
        $sveValidno = false;
        $mailGreska = "Neispravan unos!";
        $mailSlika = "display:block";
    }
    else
    {
        $mailGreska = "";
        $mailSlika = "display:none";
        testirajPodatak($mail);
    }

    if (!telefonValidacija($telefon) || empty($telefon))
    {
        $sveValidno = false;
        $telefonGreska = "Neispravan unos!";
        $telefonSlika = "display:block";
    }

    else
    {
        $telefonGreska = "";
        $telefonSlika = "display:none";
        testirajPodatak($telefon);
    }

    if (!validnostImena($grad) || empty($grad) || empty($postanski))
    {
        $sveValidno = false;
        $gradGreska = "Neispravan unos!";
        $gradSlika = "display:block";
    }
    else
    {
        $gradGreska = "";
        $gradSlika = "display:none";
        testirajPodatak($grad);
        testirajPodatak($postanski);
    }
    testirajPodatak($poruka);
    if ($sveValidno)
    {
        $naslovna="";
        include("NurssalProvjera.php");
    }
}

function testirajPodatak(&$podatak)
{
    $podatak = trim($podatak);
    $podatak = stripcslashes($podatak);
    $podatak = htmlspecialchars($podatak);
}

function validnostImena($podatak)
{
    $validno = true;
    if (!preg_match("/^[a-zA-Z\\s]*$/",$podatak)) {
        $validno = false;
    }
    return $validno;
}

function mailValidacija($podatak)
{
    $validno = true;
    if (!preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\\.[a-zA-Z0-9-.]+$/",$podatak))
    {
        $validno = false;
    }
    return $validno;
}

function telefonValidacija($telefon)
{
    $validno = true;
    if (!preg_match("/^\\(?(\\d{3})\\)?[-]?(\\d{3})[-]?(\\d{3})$/", $telefon))
    {
        $validno = false;
    }
    return $validno;
}

echo<<<_HTML_

<!DOCTYPE HTML>
<html>
<head>
<link href="NurssalCSS.css" rel="stylesheet">
<title> Nurssal d.o.o. - Vas pogled u svijet </title>
<script src = "SinglePage.js"></script>
<script type="text/javascript" src="NurssalJS.js"></script>
<meta charset="UTF-8">
</head>
<body>

$naslovna

<div id = "kontaktPor">
<p >U slucaju bilo kakvih nedoumica obratite nam se direktno sa pitanjima. Obratiti nam se mozete putem poruke, telefonskog poziva ili licno u prostorijama firme. Na poslane poruke cemo odgovoriti u najkracem roku. Zvati nas mozete svaki radni od 8 do 16h. Brojevi su dostupni na stranici.</p>
</div>

<div id = "kontakti">
	<p>Kontakt telefoni: <br/>+382 69 634 957 <br/><br/>Adresa: <br/>Ibarska bb <br/>84310 Rozaje<br/>Crna Gora</p> 
</div>
<form method="POST" action="NurssalKontakt.php" onsubmit="return validacijaForme()">

        <fieldset id = "fieldset">
            <label for="Ime">Ime *: </label> <input name="ime" id="ime" type="text" class="unosPodataka" value=$ime> <br><br>
            <img style=$imeSlika class = "slika-upozorenja" id="slika-upozorenjeIme" src ="Stranica/error.png" alt ="">
            <p class="porukaGreske" id = "porukaGreske-Ime" style=$imeSlika>$imeGreska</p>
         
            <label for="Prezime">Prezime *: </label> <input name="prezime" id="prezime" type="text" class="unosPodataka" value=$prezime> <br><br>
           <img style=$prezimeSlika class = "slika-upozorenja" id="slika-upozorenjePrezime" src ="Stranica/error.png" alt ="">
         	<p class = "porukaGreske" id = "porukaGreske-Prezime" style=$prezimeSlika>$prezimeGreska</p>
          
            <label for="Grad">Grad *: </label> <input name="grad" id="grad" type="text" class="unosPodataka" value=$grad> <br><br>
            <img style=$gradSlika class = "slika-upozorenja" id="slika-upozorenjeGrad" src ="Stranica/error.png" alt ="">
            <p class = "porukaGreske" id = "porukaGreske-Grad" style=$gradSlika>$gradGreska</p>
          
            <label for="PostanskiBroj">Postanski broj *: </label> <input name="postanski" id="postanskiBroj" type="text" class="unosPodataka" value=$postanski> <br><br>
             <img class = "slika-upozorenja" id="slika-upozorenjePostanskiBroj" src ="Stranica/error.png" alt ="">
            <p class = "porukaGreske" id = "porukaGreske-PostanskiBroj">Neispravan unos!</p>
          


            <label for="E-mail">E-mail *: </label> <input name="mail" id="email" type="text" class="unosPodataka" value=$mail> <br><br>
            <img style=$mailSlika class = "slika-upozorenja" id="slika-upozorenjeEmail" src ="Stranica/error.png" alt ="">
            <p class = "porukaGreske" id = "porukaGreske-email" style=$mailSlika>$mailGreska</p>
         
            <label for="Telefon">Kontakt telefon *: </label> <input name="telefon" id="telefon" type="text" class="unosPodataka" value=$telefon> <br><br>
            <img style=$telefonSlika class = "slika-upozorenja" id="slika-upozorenjeTelefon" src ="Stranica/error.png" alt ="">
            <p class = "porukaGreske" id = "porukaGreske-telefon" style=$telefonSlika>$telefonGreska</p>
         

            <label>Poruka: </label> <textarea name="komentar" id="poruka" class="unosPodataka">$poruka</textarea> <br><br>

            
            <input type="submit" value="Posalji!" id="dugmeP" >
        </fieldset>


</form>
</div>


</body>
</html>

_HTML_

?>

