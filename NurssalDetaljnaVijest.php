<!DOCTYPE HTML>
<html>
<head>
    <link href="NurssalCSS.css" rel="stylesheet">
    <script src = "SinglePage.js"></script>
    <script type="text/javascript" src="NurssalJS.js"></script>
    <script>
        function PrikaziKomentare()
        {
            var unos = document.getElementById("UnosKomentara");
            unos.style.display = "block";
            var komentari = document.getElementsByClassName("Komentar");
            for (var i = 0; i < komentari.length; i++)
                komentari[i].style.display = "block";
        }

    </script>
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

        <?php
        if(isset($_POST['Komentar']) && ($_POST['Komentar'] != null))
        {
        $conn = new mysqli("localhost", "root", "", "nurssalbaza");
            $conn->set_charset("utf8");
        if ($conn->connect_error) {
        die("Nije moguće povezati se sa bazom!" . $conn->connect_error);
        }
        $sql = $conn->prepare("INSERT INTO komentar (VijestID, Autor, eMail, TekstKomentara) VALUES (?, ?, ?, ?)");
        $sql->bind_param("isss", $vijest, $autor, $email, $komentar);
            $vijest = $_POST['idVijesti'];
            $autor = $_POST['AutorKom'];
            $email = $_POST['EmailKom'];
            $komentar= $_POST['Komentar'];
        $sql->execute();
        $sql->close();
        $conn->close();
        echo "<script>alert('Hvala na komentaru!');</script>";
        }
        ?>

        <?php
        $id = $_POST['idVijesti'];

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
        $sql = "SELECT Autor as AutorKomentara, Datum as DatumKomentara, eMail as eMail, TekstKomentara as TekstKomentara FROM komentar where vijestID =". $id;
        $result = $conn->query($sql);
        $brojac = 0;
        $komentari = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $komentari[$brojac++] = $row;
            }
        }
        $conn->close();

        function sortByDate($a, $b) {
            return $b['DatumKomentara'] - $a['DatumKomentara'];
        }
        usort($komentari, 'sortByDate');

        echo "
        <div id = 'divKomentariKlik'>
        <span id ='brojKomentara' onclick='PrikaziKomentare()'><br>Broj komentara na članak: $brojac</span></div>";
        ?>

            <div id='UnosKomentara'>
            <form method='POST' action='NurssalDetaljnaVijest.php'>

                <input type='hidden' name='idVijesti' value='<?php echo $_POST['idVijesti'] ?>' >
                <input type='hidden' name='autor' value='<?php echo $_POST['autor'] ?>' >
                <input type='hidden' name='naslov' value='<?php echo $_POST['naslov'] ?>' >
                <input type='hidden' name='slika' value='<?php echo $_POST['slika']?>'>
                <input type='hidden' name='sadržaj' value= '<?php echo $_POST['sadržaj']?>'>
                <input type='hidden' name='datum' value='<?php echo $_POST['datum']?>'>
                <input type='hidden' name='detaljno' value='<?php echo $_POST['detaljno']?>'>
                <br>
                <h3>Unos komentara: </h3><br>
                 Autor: <input type='text' name='AutorKom' class = 'inputKomentar'><br><br>
                 E-mail: <input type='text' name='EmailKom' class = 'inputKomentar'><br><br>
                 Komentar: <textarea cols='30' rows='4' name='Komentar' class = 'inputKomentar'></textarea><br><br>
               <br>
               <input type='submit' value='Posalji!' id='dugmeP' >
               </form>
               </div>

<?php
        for ($i = $brojac-1; $i>=0; $i--) {
            if ($komentari[$i]["eMail"] != "")
            {
            echo "<div class='Komentar'><br>

                <label class='lblKomentar'>Autor: </label><span>" . "<a href='mailto: " . $komentari[$i]["eMail"] . " '>" . $komentari[$i]["AutorKomentara"] . "</a><br>"
                . "</span><br>" .
                "<label class='lblKomentar'>Mail: </label><span>" . $komentari[$i]["eMail"] . "</span><br>" .
                "<label class='lblKomentar'>Datum objave: </label><span>" . $komentari[$i]["DatumKomentara"] . "</span><br><br>" .
                "<label class='lblKomentar'>Poruka: </label><ps>" . " \" " . $komentari[$i]["TekstKomentara"] . " \" " . "</p>" .
                "<br></div><br>";
            }
            else
            {
                echo "<div class='Komentar'><br>
                 <label class='lblKomentar'>Autor: </label><span>" . $komentari[$i]["AutorKomentara"] . "</span><br>" .
                    "<label class='lblKomentar'>Mail: </label><span>" . $komentari[$i]["eMail"] . "</span><br>" .
                    "<label class='lblKomentar'>Datum objave: </label><span>" . $komentari[$i]["DatumKomentara"] . "</span><br><br>" .
                    "<label class='lblKomentar'>Poruka: </label><ps>" . " \" " . $komentari[$i]["TekstKomentara"] . " \" " . "</p>" .
                    "<br></div><br>";

            }
        }

        ?>
            </div>
    </div>
</div>
</body>
</html>
