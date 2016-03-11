
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
				echo "<div>";
				echo "<a href = \"Panier.php\".><span>Panier d'achats</span></a>";
				echo  "<img src=\"Images/loot.png\" alt = \"panier d'achats\"/>";
				echo "</div>";
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
				<h2><span>Confirmation de commande</span></h2>
			</div>
			<div id = "stuff2">
				<h2><span>Rechercher un article</span></h2>
			</div>
		
		</div>
   <div id="contenu">   
   
	   <div id = "textMainLeft">
	   
		   <div id="notreAdresse">
		   <li>Les production GamerJoes</li>
		   <li>1233 rue des manettes</li>
		   <li>Quebec (QC)</li>
		   <li>G3X 5F3</li>
		   <li>418-989-9939</li>
		   </div>
		   <div id='adresseClient'>
		   <?php
			if (isset($_SESSION['user']))
			{
			try
			{
				$req = $conn->prepare('CALL chercher_client_par_login(:vlogin)');
				$req->execute(array('vlogin' => $_SESSION['user']));
				
				$resultat = $req->fetch();	
					
				echo '<li>'.$resultat['prenom'].' '.$resultat['nom'].'</li> ';
				echo '<li>'.$resultat['adresse'].'</li> ';
				echo '<li>'.$resultat['ville'].', ('.$resultat['province'].')</li> ';
				echo '<li>'.$resultat['codePostal'].'</li> ';
				echo '<li>'.$resultat['email'].'</li> ';
				?>
				<form name="formCommande" method="post" action="commandeOk.php">
				<label for="carteCredit">Mode de payement : </label>
				<SELECT name="carteCredit" id="carteCredit"size="1">
				<OPTION>Visa</option>
				<OPTION>MasterCard</option>
				<OPTION>American Express</option>
				<OPTION>Paypal</option>
				<OPTION>Caps</option>
				</SELECT>
				


				<?php
				$req->closeCursor();
				
			}  
			catch (PDOException $e) 
			{      
				exit( "Erreur" .  $e -> getMessage()); 
			}	
			
			}?>
		   </div>
		   <div id="itemsAchat">
			<?php
	   
			if(isset($_SESSION['panier']))
			{
			   try
			   {
				   
					
				foreach ($panier as $item => $key)
				{
					$req = $conn->prepare('CALL chercher_produit(:no)');
					$req->execute(array('no' => $item));
					$ligne = $req->fetch();
					$url = "details.php";
					$urlImage = $ligne['image'];
					$nomItem = $ligne['nom'];
					$prix  = $ligne['prix'];
					$quantite = $panier[$item];
					$total=0;
						
					echo "<div class = \"Actualite\">";
					echo "<div class = \"smallMainPic\">" ;
					echo "<img src=".$urlImage." alt=\"Image Item\" />";
					echo "</div>";
					echo "<div class = \"FeatArticle\">";
					echo "<h3>".$nomItem."</h3>";
					echo "<span>Quantité: </span><input type = \"number\" value=\"".$quantite."\" min = \"0\"/>";
					echo "<p>".$prix."$</p>";
					echo "</div>	</div>	";
					$total=+($prix*$quantite);
					$req->closeCursor();
				}
					
					
					
			   }
			   
			   
				  catch (PDOException $e) 
			{      
				exit( "Erreur" .  $e -> getMessage()); 
			}
			}
			else
			{
				echo "Le panier est vide";
			}
	 
		   
		$conn = null;
	   
	   ?>
			</div>
			<div id="totaux">
				<?php 
					echo "<li>Total de la facture :".$total."$</li>";
					$taxes = $total*0.1498;
					echo "<li>Taxes :".$taxes."$</li>";
					echo "<li>Grand total :".($total+$taxes)."$</li>";
					if(isset($_SESSION['user'])){?>
						
					
					<form method="post" action="commandeOk.php">
					<button type="submit">Finaliser la commande</button>
					</form><?php
					}
					else{
						echo '<li> Veuillez vous <a href = "connect.html"> connecter </a>pour finaliser la commande</li>';
					}?>
			</div>
			
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