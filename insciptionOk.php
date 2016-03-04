<?php
		
			
			if(isset ($_POST['password']))
			{	   $conn = new PDO('mysql:host=localhost;dbname=tp2-fredlamirande-francoissavard','prof','qwerty123', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );

				
				try
				{
					$insert = $conn->prepare('CALL ajouter_client(:prenom, :nom,:adresse,:ville,:province,:codePostal,:login,:motPasse,:email)');
					$insert->execute(array('prenom' => $_POST['prenom'],'nom' => $_POST['nom'],'adresse' => $_POST['adresse'],'ville' => $_POST['ville'], 'province' => $_POST['province'],'codePostal' => $_POST['code'], 'login' => $_POST['username'], 'motPasse' => sha1($_POST['password']), 'email' => $_POST['email']));
				
					
				}
				catch (PDOException $e) 
				{
					exit( "Erreur" . $e -> getMessage());
				}

				$insert->closeCursor();
				$conn = null;
			}
		?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
   <head>
		<meta charset="utf-8" />
		<title>Gamer Joes: La référence Jeux Vidéo et Nouvelles Technologies au Québec - Connexion</title>
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
		<a href="connect.html">Se connecter</a> <span> / </span>
		<a href="inscription.html">S'inscrire</a>

   
   
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
				<h2><span>Confirmation d'inscription</span></h2>
			</div>
			<div id = "stuff2">
				<h2><span>Notre top 10</span></h2>
			</div>
		
		</div>
   <div id="contenu">   
   
	   <div id = "textMainLeft">
	   
			<p>
			Merci pour votre inscription. S.V.P. veuillez vous connecter.
			</p>
	   
	   </div>
	   
	   <div id = "rightPopulaire">
			<div id = "CasePop">
			
			   <a href ="critiques/Witcher3/Critique_Witcher3.html"><div class = "Pops"> <h3>Witcher 3: The Wild Hunt</h3> <div class = "Gamethumbnail"> </div>  </div></a>
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