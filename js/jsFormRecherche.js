window.addEventListener("load",init,false);

    

function init()
{
	document.getElementById("form").addEventListener("submit",valider,false);
}

function valider(e) {

	var erreur = false;
	document.getElementById("zoneErreur").innerHTML = "Vous avez les erreurs suivantes:<ul>";
   

	var nom = document.getElementById("recherche").value;
	
	
	nom = nom.trim();
	document.getElementById("recherche").value = nom;
    
	if (nom.length == 0) {
		document.getElementById("errRecherche").textContent = "*";
        document.getElementById("zoneErreur").innerHTML += "<li>Veuillez entrez un élément à chercher</li>";
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
