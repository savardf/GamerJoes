window.addEventListener("load",init,false);

    

function init()
{
	document.getElementById("form").addEventListener("submit",valider,false);
}

function valider(e) {

	var erreur = false;
	document.getElementById("zoneErreur").innerHTML = "Vous avez les erreurs suivantes:<ul>";
   

	var nom = document.getElementById("nom").value;
	var prenom = document.getElementById("prenom").value;
	var adresse = document.getElementById("adresse").value;
	var ville = document.getElementById("ville").value;
	var province = document.getElementById("province").value;
    var code = document.getElementById("code").value;
    var user = document.getElementById("user").value;
    var pass = document.getElementById("password").value;
    var txtPass = document.getElementById("txtPass").value;
    var email=document.getElementById("email").value;
	
	nom = nom.trim();
	document.getElementById("nom").value = nom;
    
	if (nom.length == 0) {
		document.getElementById("errNom").textContent = "*";
        document.getElementById("zoneErreur").innerHTML += "<li>Veuillez entrer un nom</li>";
		erreur = true;
	}
   
	prenom = prenom.trim();
	document.getElementById("prenom").value = prenom;
   
	if (prenom.length == 0) {
		document.getElementById("errPrenom").textContent = "*";
		document.getElementById("zoneErreur").innerHTML += "<li>Veuillez entrer un prénom</li>";
		erreur = true;
	}
	adresse = adresse.trim();
	document.getElementById("adresse").value = adresse;
   
	if (adresse.length == 0) {
		document.getElementById("errAdresse").textContent = "*";
		document.getElementById("zoneErreur").innerHTML += "<li>Veuillez entrer une Adresse</li>";
		erreur = true;
	}
	ville = ville.trim();
	document.getElementById("ville").value = ville;
   
	if (ville.length == 0) {
		document.getElementById("errVille").textContent = "*";
		document.getElementById("zoneErreur").innerHTML += "<li>Veuillez entrer une ville</li>";
		erreur = true;
	}
	province = province.trim();
	document.getElementById("province").value = province;
   
	if (province.length == 0) {
		document.getElementById("errProvince").textContent = "*";
		document.getElementById("zoneErreur").innerHTML += "<li>Veuillez entrer une province</li>";
		erreur = true;
	}
	code = code.trim();
	document.getElementById("code").value = code;
   
	if (code.length == 0) {
		document.getElementById("errPostal").textContent = "*";
		document.getElementById("zoneErreur").innerHTML += "<li>Veuillez entrer un code postal</li>";
		erreur = true;
	}
	user = user.trim();
	document.getElementById("user").value = user;
   
	if (user.length == 0) {
		document.getElementById("errUser").textContent = "*";
		document.getElementById("zoneErreur").innerHTML += "<li>Veuillez entrer un nom d'utilisateur</li>";
		erreur = true;
	}
	pass = pass.trim();
	document.getElementById("password").value = pass;
   
	if (pass.length == 0) {
		document.getElementById("errPass").textContent = "*";
		document.getElementById("zoneErreur").innerHTML += "<li>Veuillez entrer un mot de passe</li>";
		erreur = true;
	}
	txtPass = txtPass.trim();
	document.getElementById("txtPass").value = txtPass;
   
	if (txtPass.length == 0) {
		document.getElementById("errPassConf").textContent = "*";
		document.getElementById("zoneErreur").innerHTML += "<li>Veuillez confrmer le mot de passe</li>";
		erreur = true;
	}
	if (txtPass!=pass){
		document.getElementById("errPassConf").textContent = "*";
		document.getElementById("zoneErreur").innerHTML += "<li>Les deux mots de passe ne sont pas pareil</li>";
	}
    email = email.trim();
	document.getElementById("email").value = email;
   
	if (email.length == 0) {
		document.getElementById("errEmail").textContent = "*";
		document.getElementById("zoneErreur").innerHTML += "<li>Veuillez entrer un courriel</li>";
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
