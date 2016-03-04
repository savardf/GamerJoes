<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
   <head>
		<meta charset="utf-8" />
		<title>Gamer Joes: La référence Jeux Vidéo et Nouvelles Technologies au Québec - Modifier</title>
		<link rel="stylesheet" type="text/css" href="css/styles.css" />
   </head>
   <body>
   <div id = "page">
   <header>
   <div id = "welcomebanner"> 
   <div id = "titlebanner">
   <img src = "Images/GamerJoeslogo.png" alt = "Logo Gamer Joes" />
   <h1>Gamer Joes</h1>
   <h2>La référence Jeux Vidéo et Nouvelles Technologies au Québec</h2>
   </div>
   <div id = "sessioninfo">
     <?php 
	if (isset($_POST['login']) && $_POST['login'] == "admin" && $_POST['passe'] == "12345" )
	{
	$_SESSION['login'] = $_POST['login'];
	
	echo 'Bienvenue'.' '.$_POST['login'] .' ';
	echo '<a href="logout.php">Se déconnecter</a> ';
	echo '<a href="modifier.php">Modifier son compte</a>';
	}
	
	?>
   <div id = "sessionconnecter">
   </div>
   
   </div>
   
   </div>
   <div id = "pageTop">
	   <nav>
		 <ul id="menu">
			<li>
				<a href="index.html">Nom du site - Acceuil</a>
			</li>
			<li>
				<a href="index.html">Critiques</a>
				<ul>
					<li><a href="critiques\Broforce\critique_broforce.html">Broforce</a></li>
					<li><a href="critiques\Witcher3\Critique_Witcher3.html">The Witcher 3</a></li>
					<li><a href="critiques\Broforce\critique_broforce.html">Assassin's creed: Syndicate</a></li>
					<li><a href="critiques\Broforce\critique_broforce.html">Ori and the blind forest</a></li>
					<li><a href="critiques\Broforce\critique_broforce.html">Her Story</a></li>
				</ul>
			</li>
			<li>
             <a href="source.html">Sources</a>
             
			</li>
			<li>
				<a href="marchandises.php">Marchandise</a>
				
			</li>
			
        </ul>
		</nav>
   </div>
   </header>
   
   
	   <div id = "bannerUne">
			<a href = "index.html">
				<div id = "Vedette1" class = "Vedette">
					<img src="Images/Broforce_Medium.jpg" alt="Image Jeu" /> 
					<h1 > <span> BroForce: Style retro et Expendabros!!!</span></h1>
				</div> 
			</a>
			<div id = "VedetteSecon">
				<a href = "articles/witcher3GotY/Witcher3GotY.html">
					<div id = "Vedette2" class = "Vedette">
						<img src="Images/Halo5_Small.jpg" alt="Image Jeu" />
						<h2><span>Halo 5: Guardian, Retour timide d'un classique.</span></h2>
					</div> 
				</a>
				<a href = "articles/witcher3GotY/Witcher3GotY.html">
					<div id = "Vedette3" class = "Vedette">
					<img src="Images/witcher3_Small.jpg" alt="Image Jeu" />
						<h2><span>The Witcher 3: Wild Hunt, Jeu de l'année!</span></h2>
					</div>
				</a>
			</div>
	   </div>
 
   <div id = "bande">
			<div id = "stuff1">
				<h2><span>Modifier les infos du compte</span></h2>
			</div>
			<div id = "stuff2">
				<h2><span>Notre top 10</span></h2>
			</div>
		
		</div>
   <div id="contenu">   
   
	   <div id = "textMainLeft">
	   
		<form id="formConnect" method="post" action="modifierOk.php" >
		
        <div>  
            <label for="txtPrenom">Prénom: </label>
            <input type="text" name="prenom" id="prenom" />
            <span class="erreur" id="errPrenom"></span>
        </div>
		<div>
			<label for="txtNom">Nom: </label>
            <input type="text" name="nom" id="nom" />
            <span class="erreur" id="errNom"></span>
		</div>
        <div> 
            <label for="txtAdresse">Adresse: </label>
            <input type="text" name="adresse" id="adresse" size="40" />
            <span class="erreur" id="errAdresse"></span>
        </div>
		<div> 
            <label for="txtVille">Ville: </label>
            <input type="text" name="ville" id="ville" size="40" />
            <span class="erreur" id="errVille"></span>
        </div>
		<div> 
            <label for="txtProvince">Province: </label>
            <input type="text" name="province" id="province" size="40" />
            <span class="erreur" id="errProvince"></span>
        </div>
		<div> 
            <label for="txtPostal">Code Postal: </label>
            <input type="text" name="code" id="code" size="40" />
            <span class="erreur" id="errPostal"></span>
        </div>
		<div>   
			<label for="txtUser">Nom d'utilisteur: </label>
			<input type="text" name="username" id="username" disabled="disabled"/>			
		</div>
		<div>  
			<label for="txtPass">Mot de passe: </label>
			<input type="password" name="password" id="password" />
		</div>
		<div>  
			<label for="txtPass">Confirmer le mot de passe: </label>
			<input type="password" name="txtPassConf" id="txtPass" />
			<span class="erreur" id="errPassConf"></span>
		</div>
		<div> 
            <label for="txtEmail">Email: </label>
            <input type="email" name="email" id="email" size="40" />
            <span class="erreur" id="errEmail"></span>
        </div>
		
        <div id="zoneErreur" class="erreur">
        
				<div>
				<input type="submit" value="S'inscrire"/>
				<input type="reset" value="Recommencer"/>
				</div>
		</form>
		</div>	
		</div>
	   
	   <div id = "rightPopulaire">
			<div id = "CasePop">
			
			    <a href = "critiques/Witcher3/Critique_Witcher3.html"><div class = "Pops"> <h3>Witcher 3: The Wild Hunt</h3> <div class = "Gamethumbnail"> </div>  </div></a>
			   <a href = "critiques/Witcher3/Critique_Witcher3.html"><div class = "Pops"> <h3>Assassin's Creed: Syndicate</h3> <div class = "Gamethumbnail"> </div>  </div></a>
			   <a href = "critiques/Witcher3/Critique_Witcher3.html"><div class = "Pops"> <h3>Ori and the blind forest</h3> <div class = "Gamethumbnail"> </div>  </div></a>
			   <a href = "critiques/Witcher3/Critique_Witcher3.html"><div class = "Pops"> <h3>Her story</h3> <div class = "Gamethumbnail"> </div>  </div></a>
			   <a href = "critiques/Witcher3/Critique_Witcher3.html"><div class = "Pops"> <h3>Rainbow Six: Siege</h3> <div class = "Gamethumbnail"> </div>  </div></a>
			   <a href = "critiques/Witcher3/Critique_Witcher3.html"><div class = "Pops"> <h3>MineCraft Story Mode</h3> <div class = "Gamethumbnail"> </div>  </div></a>
			   <a href = "critiques/Witcher3/Critique_Witcher3.html"><div class = "Pops"> <h3>Heroes of the storm</h3> <div class = "Gamethumbnail"> </div>  </div></a>
			   <a href = "critiques/Witcher3/Critique_Witcher3.html"><div class = "Pops"> <h3>Metal Gear Solid 5</h3> <div class = "Gamethumbnail"> </div>  </div></a>
			   <a href = "critiques/Witcher3/Critique_Witcher3.html"><div class = "Pops"> <h3>Fallout 4</h3> <div class = "Gamethumbnail"> </div>  </div></a>
			   <a href = "critiques/Witcher3/Critique_Witcher3.html"><div class = "Pops"> <h3>The Witness</h3> <div class = "Gamethumbnail"> </div>  </div></a>
			</div>
		
		
	   </div>
   </div>
   
   
	<footer id ="about">
	<p>Site créé par François Savard et Fred Lamirande, Janvier 2015</p>
	<p><a href="plan_du_Site.html">Plan du site</a></p>
	</footer>	
   
   
   
</div>
	
   </body>
</html>