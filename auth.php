<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
   <head>
		<meta charset="utf-8" />
		<title>Gamer Joes: Connection / inscription</title>
		<link rel="stylesheet" type="text/css" href="css/styles.css" />
		<link rel="icon" href="favicon.ico" />
		<link rel="stylesheet" media ="print" type ="text/css" href ="css/cssprint.css"/>
   </head>
   <body>
	 <div id = "page">
	<header> 
	
	<div id = "welcomebanner"> 
   <div id = "titlebanner">
   <img src = "Images/GamerJoeslogo.png" atl = "Logo Gamer Joes" />
   <h1>Gamer Joes</h1>
   <h2>La référence Jeux Vidéo et Nouvelles Technologies au Québec</h2>
   </div>
   
   
   </div>
	
	</header>
	
	<div>
	<form id="formConnect" method="post" action="connectok.php" >
		<div>
			<label for="txtNom">Nom: </label>
            <input type="text" name="txtNom" id="txtNom" />
            <span class="erreur" id="errNom"></span>
		</div>
        <div>  
            <label for="txtPrenom">Prénom: </label>
            <input type="text" name="txtPrenom" id="txtPrenom" />
            <span class="erreur" id="errPrenom"></span>
        </div>
        <div> 
            <label for="txtAdresse">Adresse: </label>
            <input type="text" name="txtAdresse" id="txtAdresse" size="40" />
            <span class="erreur" id="errAdresse"></span>
        </div>
		<div> 
            <label for="txtVille">Ville: </label>
            <input type="text" name="txtVille" id="txtVille" size="40" />
            <span class="erreur" id="errVille"></span>
        </div>
		<div> 
            <label for="txtProvince">Province: </label>
            <input type="text" name="txtProvince" id="txtProvince" size="40" />
            <span class="erreur" id="errProvince"></span>
        </div>
		<div> 
            <label for="txtPostal">Code Postal: </label>
            <input type="text" name="txtPostal" id="txtPostal" size="40" />
            <span class="erreur" id="errPostal"></span>
        </div>
		<div>   
			<label for="txtUser">Nom d'utilisteur: </label>
			<input type="text" name="txtUser" id="txtUser" />			
		</div>
		<div>  
			<label for="txtPass">Mot de passe: </label>
			<input type="password" name="txtPass" id="txtPass" />
		</div>
		<div>  
			<label for="txtPass">Confirmer le mot de passe: </label>
			<input type="password" name="txtPassConf" id="txtPass" />
			<span class="erreur" id="errPassConf"></span>
		</div>
		<div> 
            <label for="txtEmail">Email: </label>
            <input type="email" name="txtEmail" id="txtEmail" size="40" />
            <span class="erreur" id="errEmail"></span>
        </div>
		
        <div id="zoneErreur" class="erreur">
        
				<div>
				<input type="submit" value="Se Connecter"/>
				<input type="reset" value="Recommencer"/>
				</div>
		</form>
	
	
	</div>
	
	
	</div>
   </body>
   <footer id ="about">
	<p>Site créé par François Savard et Fred Lamirande, Janvier 2015</p>
	 <p><a href="plan_du_Site.html">Plan du site</a></p>
	 <p><a href = "mailto:info@gamerjoes.com">Contactez Nous!</a></p>
	 
	</footer>	
</html>