
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

<h1 class ="navNaslov">Administratorski panel</h1>
<div class = "slika">
<img src ="Stranica/logo.png" alt="">
</div>

    <div id = "unosSifre">
    <form method="POST"  action = "NurssalAdmin.php">
            <label for="KorisnickoIme">Korisničko ime: </label> <input type="text" id = "usernameAdmin" class="login" name = "usernameAdmin"> <br><br>
                        <label for="Lozinka">Lozinka: </label> <input type="password" id = "passwordAdmin" class="login" name = "passwordAdmin"> <br><br>
            <input type="submit" value="Prijavi se!" id="dugmeP" >
    </form>
</div>


    <div id = "izmjenaSifre">
        <form method="POST"  action = "NurssalAdmin.php">
            <label>Ukoliko ste zaboravili lozinku unesite e-mail adresu i dobićete novu u inbox.</label><br><br>
            <label for="EmailAdmin">E-mail: </label> <input type="text" id = "emailAdmina" class="login"> <br><br>
            <input type="submit" value="Pošalji lozinku!" id="dugmeP" >
        </form>
    </div>

<?php

if(isset($_POST['usernameAdmin']) && isset($_POST['passwordAdmin'])) {
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

    $sql = "SELECT Username, Password FROM Administrator";

    $result = $conn->query($sql);

    $brojac = 0;
    $admini = array();
    $sviClanci = "";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $admini[$brojac++] = $row;
        }
    }
    $postoji = false;
    for ($i = 0; $i < $brojac; $i++)
        if ($admini[$i]["Username"] == $_POST['usernameAdmin'] && $admini[$i]["Password"] == $_POST['passwordAdmin'])
            $postoji = true;

    if ($postoji == true)
        echo "<script>alert('Uspješan login !')</script>";
    else {
        echo "<script>alert('Neuspješan login !')</script>";

    }
    $conn->close();
}
?>


</div>
</div>
</body>
</html>
