window.addEventListener("load",init,false);

    

function init()
{
	document.getElementById("monForm").addEventListener("submit",valider,false);
}

function valider(e) {

	var erreur = false;
	document.getElementById("zoneErreur").innerHTML = "Vous avez les erreurs suivantes:<ul>";
   
	viderChampsErreur();
	var nom = document.getElementById("txtNom").value;
	var prenom = document.getElementById("txtPrenom").value;
    var date = document.getElementById("dateAge").value;
    var tel = document.getElementById("txtTelephone").value;
    var quantite = document.getElementById("numQuantite").value;
    var prix = document.getElementById("numPrix").value;
    var email=document.getElementById("txtEmail").value;
	var nomTrime = nom.trim();
	document.getElementById("txtNom").value = nomTrime;
    
	if (nomTrime.length == 0) {
		document.getElementById("errNom").textContent = "*";
        document.getElementById("zoneErreur").innerHTML += "<li>Veuillez entrer un nom</li>";
		erreur = true;
	}
   
	prenom = prenom.trim();
	document.getElementById("txtPrenom").value = prenom;
   
	if (prenom.length == 0) {
		document.getElementById("errPrenom").textContent = "*";
		document.getElementById("zoneErreur").innerHTML += "<li>Veuillez entrer un prénom</li>";
		erreur = true;
	}
    email = email.trim();
	document.getElementById("txtEmail").value = email;
   
	if (email.length == 0) {
		document.getElementById("errEmail").textContent = "*";
		document.getElementById("zoneErreur").innerHTML += "<li>Veuillez entrer un courriel</li>";
		erreur = true;
	}
    var modeleTelephone = /^(\([0-9]{3}\)[ ]?)?[0-9]{3}-[0-9]{4}$/;
	if (!modeleTelephone.test(tel)) {
		document.getElementById("errTelephone").textContent = "*";
		document.getElementById("zoneErreur").innerHTML += "<li>Veuillez entrer un téléphone ayant le format 999-9999 ou (999) 999-9999</li>";
		erreur = true;
	}
   
    var compteur=0;
	
    for(var i=0;i<5;i++)
    {
		var valide=document.getElementsByName("cbx"); /* http://stackoverflow.com/questions/11787665/making-sure-at-least-one-checkbox-is-checked */
        if(valide[i].checked==true)
        {
            compteur++
        }
    }
    if(compteur == 0)
    {
        document.getElementById("errCbx").textContent = "*";
		document.getElementById("zoneErreur").innerHTML += "<li>Veuillez faire au moins un choix</li>";
		erreur = true;
    }
    
    prix = prix.trim();
	document.getElementById("numPrix").value = prix;
   
	if (prix.length == 0 ) {
		document.getElementById("errPrix").textContent = "*";
		document.getElementById("zoneErreur").innerHTML += "<li>Veuillez entrer un prix positif</li>";
		erreur = true;
   
    }
    quantite = quantite.trim();
	document.getElementById("numQuantite").value = quantite;
   
	if (quantite.length == 0 ) {
		document.getElementById("errQuantite").textContent = "*";
		document.getElementById("zoneErreur").innerHTML += "<li>Veuillez entrer un une quantitée positive</li>";
		erreur = true;
   
    }
    
    var dateAjourd=new Date();
	var dateChoix = new Date(date);
	
   
	if (dateChoix.length==0||dateChoix>dateAjourd) {
		document.getElementById("errAge").textContent = "*";
		document.getElementById("zoneErreur").innerHTML += "<li>Veuillez entrer une date valide</li>";
		erreur = true;
    }

    document.getElementById("zoneErreur").innerHTML += "</ul>";
	
	if(erreur)
		e.preventDefault();
}



function viderChampsErreur()
{
	document.getElementById("errNom").textContent = "";
	document.getElementById("errPrenom").textContent = "";
	document.getElementById("errTelephone").textContent = "";
	document.getElementById("errEmail").textContent = "";
	document.getElementById("errPrix").textContent="";
    document.getElementById("errQuantite").textContent="";
    document.getElementById("errAge").textContent="";
    document.getElementById("zoneErreur").innerHTML = "";
}  
