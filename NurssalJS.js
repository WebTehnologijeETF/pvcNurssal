function validnostImena(s){
	var up=s.toUpperCase();
	for(i=0; i<up.length;i++){
		if(up.charCodeAt(i)<65 || up.charCodeAt(i)>90){
				return false;
		}	
	}
	return true;
}

function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}


function pokaziPonudu()
{
	if (document.getElementById("trenutnaPonuda").innerHTML == "+ Trenutna ponuda")
	{
		document.getElementById("prozori").style.display = "block";
		document.getElementById("aluProzori").style.display = "none";
		document.getElementById("pvcProzori").style.display = "none";
		document.getElementById("drveniProzori").style.display = "none";

		document.getElementById("vrata").style.display = "block";
		document.getElementById("kliznaVrata").style.display = "none";
		document.getElementById("balkonskaVrata").style.display = "none";
		document.getElementById("garaznaVrata").style.display = "none";

		document.getElementById("pregradniZidovi").style.display = "block";
		document.getElementById("pokretniZidovi").style.display = "none";
		document.getElementById("fiksniZidovi").style.display = "none";

		document.getElementById("trenutnaPonuda").innerHTML = "- Trenutna ponuda";

	}
	else
	{
		document.getElementById("prozori").style.display = "none";
		document.getElementById("vrata").style.display = "none";
		document.getElementById("pregradniZidovi").style.display = "none";
		document.getElementById("trenutnaPonuda").innerHTML = "+ Trenutna ponuda";

	}
}

function pokaziProzore()
{
	if (document.getElementById("prozori").innerHTML == "+ Prozori")
	{
		document.getElementById("aluProzori").style.display = "block";
		document.getElementById("pvcProzori").style.display = "block";
		document.getElementById("drveniProzori").style.display = "block";
		document.getElementById("prozori").innerHTML = "- Prozori";
	}
	else
	{

		document.getElementById("aluProzori").style.display = "none";
		document.getElementById("pvcProzori").style.display = "none";
		document.getElementById("drveniProzori").style.display = "none";
		document.getElementById("prozori").innerHTML = "+ Prozori";
	}
}



function pokaziVrata()
{
	if (document.getElementById("vrata").innerHTML == "+ Vrata")
	{
		document.getElementById("kliznaVrata").style.display = "block";
		document.getElementById("garaznaVrata").style.display = "block";
		document.getElementById("balkonskaVrata").style.display = "block";
		document.getElementById("vrata").innerHTML = "- Vrata";

	}
	else
	{

		document.getElementById("kliznaVrata").style.display = "none";
		document.getElementById("garaznaVrata").style.display = "none";
		document.getElementById("balkonskaVrata").style.display = "none";
		document.getElementById("vrata").innerHTML = "+ Vrata";
	}

}

function pokaziPregradneZidove()
{
	if (document.getElementById("pregradniZidovi").innerHTML == "+ Pregradni zidovi")
	{
		document.getElementById("pokretniZidovi").style.display = "block";
		document.getElementById("fiksniZidovi").style.display = "block";

		document.getElementById("pregradniZidovi").innerHTML = "- Pregradni zidovi";
	}
	else
	{
		document.getElementById("pokretniZidovi").style.display = "none";
		document.getElementById("fiksniZidovi").style.display = "none";

		document.getElementById("pregradniZidovi").innerHTML = "+ Pregradni zidovi";
	}

}

function pokaziDrveniProzor()
{
	if (document.getElementById("drveniProzori").innerHTML == "+ Drveni prozori")
	{
		document.getElementById("izradaDrvenihProzora").style.display ="block";
		document.getElementById("drveniProzori").innerHTML = "- Drveni prozori";
	}
	else
	{
		document.getElementById("izradaDrvenihProzora").style.display ="none";
		document.getElementById("drveniProzori").innerHTML = "+ Drveni prozori";


	}


}

function validatePhonNum(phone) {
    var re = /^\(?(\d{3})\)?[-]?(\d{3})[-]?(\d{3})$/;
    return re.test(phone);
}


function validacijaForme() {
	var boolIme, boolPrezime, boolTelefon, boolMail, boolPoruka;
	boolPoruka=true;
	boolMail=true;
	boolTelefon = true;
	boolIme = true;
	boolPrezime=true;
	var ime = document.getElementById("ime");
	var prezime = document.getElementById("prezime");
	var email=document.getElementById("email");
	var telefon = document.getElementById("telefon")
	var poruka=document.getElementById("poruka");

	if (ime.value === "" || !validnostImena(ime.value))
	{
		document.getElementById("slika-upozorenjeIme").style.display = "block";
		document.getElementById("porukaGreske-Ime").style.display = "block";
    	boolIme = false;
    }
        else
	{
		document.getElementById("slika-upozorenjeIme").style.display = "none";
		document.getElementById("porukaGreske-Ime").style.display = "none";
		boolIme=true;
	}


	if (prezime.value === "" || !validnostImena(prezime.value))
	{
		document.getElementById("slika-upozorenjePrezime").style.display = "block";
		document.getElementById("porukaGreske-Prezime").style.display = "block";
		boolPrezime = false;
	}
	else
	{
		document.getElementById("slika-upozorenjePrezime").style.display = "none";
		document.getElementById("porukaGreske-Prezime").style.display = "none";
		boolPrezime = true;
	}


	if (email.value==="" || !validateEmail(email.value))
	{
		document.getElementById("slika-upozorenjeEmail").style.display = "block";
    	document.getElementById("porukaGreske-email").style.display = "block";
		boolMail = false;
    }
        else
	{
		document.getElementById("slika-upozorenjeEmail").style.display = "none";
	document.getElementById("porukaGreske-email").style.display = "none";
boolMail=true;
	}


	if (telefon.value === "" || !validatePhonNum(telefon.value))
		{
			document.getElementById("slika-upozorenjeTelefon").style.display = "block";
			document.getElementById("porukaGreske-telefon").style.display = "block";
		boolTelefon = false;
		}
	else
	{
			document.getElementById("slika-upozorenjeTelefon").style.display = "none";
			document.getElementById("porukaGreske-telefon").style.display = "none";
		boolTelefon=true;
	}
	
	
	if (boolTelefon===true && boolPrezime===true && boolIme===true && boolMail===true)
	{
		alert("Uspjesno ste poslali poruku ! Hvala sto ste nas kontaktirali.");
		document.getElementById("ime").value = "";
		document.getElementById("prezime").value ="";
		document.getElementById("email").value = "";
		document.getElementById("telefon").value="";
		document.getElementById("poruka").value = "";

		
	}
}