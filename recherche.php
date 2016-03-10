
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
   <head>
		<meta charset="utf-8" />
		<title>Gamer Joes: Marchandises </title>
		<link rel="stylesheet" type="text/css" href="css/styles.css" />
		<link rel="icon" href="favicon.ico"/>
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
	$nom = $resultat['prenom'];
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

   
   
   <div id = "sessionconnecter">
   </div>
   
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
   
   
	   <div id = "bannerUne">
			<a href = "critiques\Broforce\critique_broforce.html">
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
				<h2><span>Produits</span></h2>
			</div>
			<div id = "stuff2">
				<h2><span>Rechercher un article</span></h2>
			</div>
		
		</div>
   <div id="contenu">   
   
	   <div id = "textMainLeft">
	   
	   <?php
	   
	   
	   ?>
	   
	   <?php
	   
	   try
	{
		
			$req = $conn->prepare('CALL chercher_produits_par_nom(:vnom)');
			$req->execute(array('vnom' => $_GET['recherche']));
			while ($ligne = $req->fetch())
			{
				$url = "details.php";
				$urlImage = $ligne['image'];
				$descript = $ligne['description'];
				$nomItem = $ligne['nom'];
				$prix  = $ligne['prix'];
			   
				echo "<a href = ".$url."?no=".$ligne['no'].">";
				echo "<div class = \"Actualite\">";
				echo "<div class = \"smallMainPic\">" ;
				echo "<img src=".$urlImage." alt=\"Image Item\" />";
				echo "</div>";
				echo "<div class = \"FeatArticle\">";
				echo "<h3>".$nomItem."</h3>";
				echo "<p>".$descript."</p>";
				echo "<p name = \"Prix\" >".$prix."$</p>";
				echo "</div>	</div>	</a> ";
			}
			
	}
	   
	   catch (PDOException $e) 
	{      
		exit( "Erreur" .  $e -> getMessage()); 
	}
	
	$req->closeCursor();
	
	$conn = null;
	   
	   
	   
	   
	   
	   ?>
	   
					
			
			
			
		   
	   
	   </div>
	   
	   <div id = "rightPopulaire">
			<div id = "CasePop">
			<form id="form" method="get" action="recherche.php" >
			<div>
			
            <input type="text" name="recherche" id="recherche"  />
            <span class="erreur" id="errRecherche"></span>
			</div>
			  <input type="submit" value="Rechercher"/>
			</div>
			<div id="zoneErreur" class="erreur">
        
		
		
			</div>	
			</form>
		
	   </div>
   </div>
   
   
	<footer id ="about">
	<p>Site créé par François Savard et Fred Lamirande, Janvier 2015</p>
	 <p><a href="plan_du_Site.html">Plan du site</a></p>
	 <p><a href = "mailto:info@gamerjoes.com">Contactez Nous!</a></p>
	 
	</footer>	
   
   
   
</div>
	<script type="text/javascript" src="js/jsFormRecherche.js"></script>
   </body>
</html>