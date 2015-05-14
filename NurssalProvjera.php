<!DOCTYPE html>
<html>
<head>
    <link href="NurssalCSS.css" rel="stylesheet">
    <title> Nurssal d.o.o. - Vas pogled u svijet </title>
    <script src = "SinglePage.js"></script>
    <meta charset="UTF-8">
</head>
<body>
<div class='body'>
    <div class='header'>
<h1> Nurssal d.o.o. </h1>
<p>Vas pogled u svijet</p>
</div>


<div class='meni'>
    <ul>
        <li><a onclick = 'AjaxNavigacija('NurssalNaslovna.php')'>Naslovna</a></li>
        <li><a onclick = 'AjaxNavigacija('NurssalONama.html')'>O Nama</a></li>
        <li><a onclick = 'AjaxNavigacija('NurssalKontakt.php')'>Kontakt</a></li>
        <li><a onclick = 'AjaxNavigacija('NurssalFotografije.html')''>Fotografija</a></li>
        <li><a onclick = 'AjaxNavigacija('NurssalCjenovnik.html')'>Cjenovnik</a></li>
        <li><a onclick = 'AjaxNavigacija('NurssalProizvodi.html')'>Proizvodi</a></li>

    </ul>
</div>

<h1 class ='navNaslov'>Kontakt</h1>
<div class = 'slika'>
    <img src ='Stranica/logo.png' alt=''>
</div>

    <h2 class="provjera">Provjerite da li ste ispravno popunili kontakt formu:</h2>
    <form action="SlanjeMaila.php" method="post">
        <div>
            <fieldset>
                <br>
                <label class="poredajLijevo">Ime:</label><input class="pregled" name="imeVrijednost" readonly value="<?php echo $ime ?>"><br>
                <label class="poredajLijevo">Prezime:</label><input class="pregled" name="prezimeVrijednost" readonly value="<?php echo $prezime ?>"><br>
                <label class="poredajLijevo">Mail adresa:</label><input class="pregled" name="mailVrijednost" readonly value="<?php echo $mail ?>"><br>
                <label class="poredajLijevo">Grad:</label><input class="pregled" name="gradVrijednost" readonly value="<?php echo $grad ?>"><br>
                <label class="poredajLijevo">Postanski broj:</label><input class="pregled" name="postanskiVrijednost" readonly value="<?php echo $postanski ?>"><br>
                <label class="poredajLijevo">Telefon:</label><input class="pregled" name="telefonVrijednost" readonly value="<?php echo $telefon ?>"><br>
                <label class="poredajLijevo">Poruka:</label><input class="pregled" name="porukaVrijednost" readonly value="<?php echo $poruka ?>"><br><br><br>
            </fieldset>
            <br>
            <h2 class="provjera">Da li ste sigurni da želite poslati ove podatke?</h2> <br>
            <input type="submit" id="submitIt" value="Siguran sam"><br><br>
        </div>
    </form>
    <h2 class="provjera">Ako ste pogrešno popunili formu, možete ispod prepraviti unesene podatke:</h2>
    <br><br><br>

</body>
</html>