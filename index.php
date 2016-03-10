<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
   <head>
		<meta charset="utf-8" />
		<title>Gamer Joes: La référence Jeux Vidéo et Nouvelles Technologies au Québec</title>
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
   <div id = "sessioninfo">
   
   <?php 
	session_start();
	include('connexion.php');
	if (isset($_SESSION['user']))
	{
		try
		{
			$req = $conn->prepare('CALL chercher_client_par_login(:vlogin)');
			$req->execute(array('vlogin' => $_SESSION['user']));
			if($req->rowCount()==0)
			{
				
				echo "L'utilisateur n'existe pas";
				$req->closeCursor();
			}
			else
			{
				$resultat = $req->fetch();	
				
				echo '<li>Bienvenue'.' '.$resultat['prenom'] .'</li> ';
				echo '<li><a href="logout.php">Se déconnecter</a></li> ';
				echo '<li><a href="modifier.php">Modifier son compte</a></li>';			
				$req->closeCursor();
			}
		}  
		catch (PDOException $e) 
		{      
			exit( "Erreur" .  $e -> getMessage()); 
		}	
		
	}
	elseif (isset($_POST['login']))
	{
	try
	{
		$req = $conn->prepare('CALL chercher_client_par_login_passe(:vlogin,:vmotPasse)');
		$req->execute(array('vlogin' => $_POST['login'],'vmotPasse' => sha1($_POST['passe'])));
		
	}  
	 catch (PDOException $e) 
	{      
		exit( "Erreur" .  $e -> getMessage()); 
	}	
	$resultat = $req->fetch();
	$nom = $resultat['nom'];
	$user = $resultat['login'];
	$_SESSION['user'] = $user;
	
	
	
	$req->closeCursor();
	echo '<li>Bienvenue'.' '.$nom .'</li> ';
	echo '<li><a href="logout.php">Se déconnecter</a></li> ';
	echo '<li><a href="modifier.php">Modifier son compte</a></li>';
	}
	
	else
	{
		?> <a href="connect.html">Se connecter</a> <span> / </span>
			<a href="inscription.html">Inscription</a><?php
	}?>

   
   </div>
   
   </div>
   
   
   <div id = "pageTop">
	   <nav>
		 <ul id="menu">
			<li>
				<a href="index.php">Nom du site - Acceuil</a>
			</li>
			<li>
				<a href="index.php">Critiques</a>
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
		<div id = "print">
			<h1>Gamer Joes: La référence Jeux Vidéo et Nouvelles Technologies au Québec</h1>
			</div>
   
	   <div id = "bannerUne">
			<a href = "critiques\Broforce\critique_broforce.html">
				<div id = "Vedette1" class = "Vedette">
					<img src="Images/Broforce_Medium.jpg" alt="Image Jeu" /> 
					<h1 > <span> BroForce: Style retro et Expendabros!!!</span></h1>
				</div> 
			</a>
			<div id = "VedetteSecon">
				<a href = "index.html">
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
				<h2><span>Articles en vedette</span></h2>
			</div>
			<div id = "stuff2">
				<h2><span>Notre top 10</span></h2>
			</div>
		
		</div>
   <div id="contenu">   
   
	   <div id = "textMainLeft">
	   
			<a href = "articles/witcher3GotY/Witcher3GotY.html">
		   <div class = "Actualite"> 
				
					<div class = "smallMainPic"> 
						<img src="Images/witcher3_Small.jpg" alt="Image Jeu" /> 							
					 </div>
					 <div class = "FeatArticle">
							<h3>Contenu Téléchargable ce printemps pour Witcher 3: Wild Hunt?</h3> 
							<p>Bien qu'il est été annoncé par Cd Projekt Red que la sortie de The Witcher 3: Blood and Wine sera retardée, il ne faut pas perdre espoir de voir sa sortie au Printemps. </p> 
						</div>			 
			</div>
			</a> 
			<a href = "articles/witcher3GotY/Witcher3GotY.html">
		   <div class = "Actualite">
				
					<div class = "smallMainPic"> 
						<img src="Images/Occulus_Small.jpg" alt="Image Jeu" />
							
					</div>  
					<div class = "FeatArticle">
							<h3>Oculus Rift: Prix beaucoup plus élevé que promis.</h3> 
							<p>Il semble que les Canadiens désireux d'adopter le produit tôt devront vider leur bas de laine...</p> 
							</div>
				
				 
			</div>
			</a> 
			<a href = "articles/witcher3GotY/Witcher3GotY.html">
		   <div class = "Actualite">
				
					<div class = "smallMainPic"> 
						<img src="Images/StarCitizen_Small.jpg" alt="Image Jeu" />
							
					</div>  
					<div class = "FeatArticle">
							<h3>Star Citizen: Record inégalé de financement participatif.</h3> 
							<p> Au moment de la rédaction de cet article, le simulateur spatial avait amassé 106,6 millions de dollars Américains. </p> 
							</div>
				
				 
			</div>
			</a> 
			
			<a href = "articles/witcher3GotY/Witcher3GotY.html">
		   <div class = "Actualite">
				
					<div class = "smallMainPic"> 
						<img src="Images/Vaultboy_Small.jpg" alt="Image Jeu" />
							
					</div>  
					<div class = "FeatArticle">
							<h3>Fallout 4: Le SDK bientôt disponible.</h3> 
							<p> Moddeur, réjouissez-vous! Pete Hines annonce la publication du SDK de Fallout 4 pour très bientôt! </p> 
							</div>
				
				 
			</div>
			</a> 
			<a href = "articles/witcher3GotY/Witcher3GotY.html">
		   <div class = "Actualite">
				
					<div class = "smallMainPic"> 
						<img src="Images/HOTS_Small.jpg" alt="Image Jeu" />
							
					</div>  
					<div class = "FeatArticle">
							<h3>Heroes of the Storm: Deux héros de l'univers de Diablo 2 rejoignent la liste.</h3> 
							<p> La magicienne et le nécromancien seront disponibles lors de la prochaine mise à jours de HotS. </p> 
							</div>
				
				 
			</div>
			</a> 
		   
	   
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
	 <p><a href = "mailto:info@gamerjoes.com">Contactez Nous!</a></p>
	 <p><a href="#top">Retour en haut</a></p>
	</footer>	
   
   
   
</div>
	
   </body>
</html>