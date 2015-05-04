function validirajCijenu(cijena)
{
    var bool = true;

    var regex = new RegExp("^[0-9]*$");
    
    if (regex.test(cijena))
        bool = true;
    else bool = false;
    if (cijena < 0)
        bool = false;
    return bool;
}


function validacijaProizvoda()
{
    var naziv = document.getElementById("naziv");
    var kolicina = document.getElementById("kolicina");
    var cijena = document.getElementById("cijena");
    var ispravno = true;

    if (naziv.value === "")
    {
        document.getElementById("slika-upozorenjeNaziv").style.display = "block";
        document.getElementById("porukaGreske-Naziv").style.display = "block";
        ispravno = false;
    }
    else
    {
        document.getElementById("slika-upozorenjeNaziv").style.display = "none";
        document.getElementById("porukaGreske-Naziv").style.display = "none";
    }

    if (!ValidirajCijenu(kolicina.value))
    {
        document.getElementById("slika-upozorenjeKolicina").style.display = "block";
        document.getElementById("porukaGreske-Kolicina").style.display = "block";
        ispravno = false;
    }
    else
    {
        document.getElementById("slika-upozorenjeKolicina").style.display = "none";
        document.getElementById("porukaGreske-Kolicina").style.display = "none";
    }

    if (!ValidirajCijenu(cijena.value))
    {
        document.getElementById("slika-upozorenjeCijena").style.display = "block";
        document.getElementById("porukaGreske-Cijena").style.display = "block";
        ispravno = false;
    }
    else
    {
        document.getElementById("slika-upozorenjeCijena").style.display = "none";
        document.getElementById("porukaGreske-Cijena").style.display = "none";
    }

    return ispravno;
}




function dodajProizvod() {
    var url = "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16278";
    var bool = validacijaProizvoda();
    
    var naziv = document.getElementById("naziv");
    var opis = document.getElementById("opis");
    var kolicina = document.getElementById("kolicina");
    var cijena = document.getElementById("cijena");
    var slika = document.getElementById("slika");


    if (bool) {

        var proizvod = {
            naziv: naziv,
            opis: opis,
            slika: slika
            cijena: cijena,
            kolicina: kolicina
        };
        var xmlhttp;

        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        }
        else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.status == 200 && xmlhttp.readyState == 4) {
                alert("Uspjesno ste dodali novi proizvod!");
                ucitajProizvode();
            }
        };

        xmlhttp.open("POST", url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("akcija=dodavanje" + "&brindexa=16278&proizvod=" + JSON.stringify(proizvod));
    }
}



function validacijaID(ID){
    var bool = true;
    if (ID == null || ID == '')
        bool = false;
    
    if (bool)
    {
        var regex = new RegExp("^[0-9]*$");
        if (!regex.test(ID) || ID < 0)
            bool = false;
    }
    return bool;
}



function izbrisiProizvod() {
    if (!validacijaID(ID_vrijednost))
    {
        alert('Neispravan ID!');
    }
    else
    {
        var proizvod = {
            id: ID_vrijednost
        };

        var xmlhttp;

        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        }
        else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.status == 200 && xmlhttp.readyState == 4) {

                alert("Uspjesno obrisan proizvod!");
            }
            else
            {
        alert('ID ne postoji u bazi!');
            }

        };

        xmlhttp.open("POST", "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16278", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("akcija=brisanje" + "&brindexa=16278&proizvod=" + JSON.stringify(proizvod));
    }
}


function izmjeniProizvod(){
    var ID = document.getElementById("ID").value;
    var naziv = document.getElementById("naziv").value;
    var opis = document.getElementById("opis").value;
    var cijena = document.getElementById("cijena").value;
    var slika = document.getElementById("slika").value;
    var kolicina = document.getElementById("kolicina").value;

    var bool = validacijaProizvoda();

    if (bool) {
        var proizvod = {
            id: ID,
            naziv: naziv,
            opis: opis,
            slika: slika,
            kolicina: kolicina
            cijena: cijena
        };
        var xmlhttp;
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        }
        else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.status == 200 && xmlhttp.readyState == 4) {
                alert("Uspjesno ste izmjenili proizvod!");
                ucitajProizvode();
            }
            else
            {
               alert('ID ne postoji u bazi!');
            }
            xmlhttp.open("POST", "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16358", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("akcija=promjena" + "&brindexa=16278&proizvod=" + JSON.stringify(proizvod));
        }
    }
}

function ucitajProizvode() {

    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function(event){
        if(xmlhttp.status == 200 && xmlhttp.readyState == 4) {
            var proizvodi = JSON.parse(xmlhttp.responseText);
            popuniTabelu(proizvodi);
            event.preventDefault();
        }
    };

    xmlhttp.open("GET","http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16278", true);
    xmlhttp.send();
}

function popuniTabelu(proizvodi){
}