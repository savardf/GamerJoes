
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
   <head>
		<meta charset="utf-8" />
		<title>Gamer Joes: La référence Jeux Vidéo et Nouvelles Technologies au Québec - Confirmation de commande</title>
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
	session_start();
	include('connexion.php');
	if (isset($_SESSION['user'])&&isset($_SESSION['panier'])&&isset($_POST['carteCredit']))
	{
		$date=date("Y-m-d H:i:s");
		try
		{
			$req = $conn->prepare('CALL chercher_client_par_login(:vlogin)');
			$req->execute(array('vlogin' => $_SESSION['user']));
			$resultat = $req->fetch();	
			$req->closeCursor();
		}
		catch (PDOException $e) 
		{
			exit( "Erreur" .  $e -> getMessage()); 
		}
		
		try
		{
			$req = $conn->prepare('CALL ajouter_commande(:vdate,:vstatus,:vtypePaiement,:vnoClient)');
			$req->execute(array('vdate' => $date,'vstatus'=>'En traitement','vtypePaiement'=>$_POST['carteCredit'],'vnoClient'=>$resultat['no']));
			
		}  
		catch (PDOException $e) 
		{      
			exit( "Erreur" .  $e -> getMessage()); 
		}	
	}
	else
	{
		echo "La commande n'a pas été fait";
	}
	unset($_SESSION['panier']);
		
	
	if(isset($_SESSION['panier']))
	{
		$panier = $_SESSION['panier'];
		if (array_key_exists($_GET['panier'], $panier))
		{			
			$panier[$_GET['panier']] +=1;
			$_SESSION['panier'] = $panier;
		}
		else
		{
			$panier[$_GET['panier']] = 1;
			$_SESSION['panier'] = $panier;
		}
	}
	else
	{
		$_SESSION['panier'] = array();
	}
	
	

 
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
				
				if($_SESSION['panier']!=null)
				{
					echo "<div>";
					echo "<a href = \"Panier.php\".><span>Panier d'achats</span></a>";
					echo  "<img src=\"Images/loot.png\" alt = \"panier d'achats\"/>";
					echo "</div>";
				}
				
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
	echo "<div>";
	echo "<a href = \"Panier.php\".><span>Panier d'achats</span></a>";
	echo  "<img src=\"Images/loot.png\" alt = \"panier d'achats\"/>";
	echo "</div>";
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
			Merci pour votre commande. Vous allez bientôt recevoir un courriel de confirmation.
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