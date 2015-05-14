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

    <h1 class ="navNaslov">Vijest</h1>
    <div class = "slika">
        <img src ="Stranica/logo.png" alt="">
    </div>

    <div class="news">
        <div class="naslov"><?php echo $_POST['naslov'] ?></div>
        <hr/>
        <div class="clanak">
            <div id="vijest">
                <p>Autor: <?php echo $_POST['autor'] ?></p><br>
                <p>Datum: <?php echo $_POST['datum'] ?></p><br>
                <p><?php echo $_POST['detaljno'] ?></p><br>
                <img src=<?php echo $_POST['slika'] ?>><br>
            </div>
        </div>
    </div>
</div>
</body>
</html>
