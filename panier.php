<?php  session_start(); ?>
<?php include'en-tete.php'; ?>
<?php include'bandeau.php'; ?>
<div id="content">
<?php
   switch($_GET["action"])
	{
		case "Vider le Panier":
			$_SESSION["reference"]=array();
			$_SESSION["quantite"]=array();
			break;
		case "Ajout au panier":
			$trouve = false;
			$i=count($_SESSION["reference"]);
			for ($k = 0; $k < $i ; $k++) { // Est ce que le produit à déja été commandé ?
 				if ( $_GET["refPdt"] == $_SESSION["reference"][$k] )  { // Cas produit déja commandé
					$_SESSION["quantite"][$k] +=$_GET["quantite"];
					$trouve = true;
				}			   
			} 
			if (! $trouve) {  	// Cas produit pas déja commandé		
				$_SESSION["reference"][$i]=$_GET["refPdt"];
				$_SESSION["quantite"][$i]=$_GET["quantite"];
			}
			break;
		case "Suppression du panier":
		    $indice = -1;
			$i=count($_SESSION["reference"]);
			$nb= $i -1;
			for ($k = 0; $k < $i; $k++) { // Est ce que le produit existe  ?
 				if ( $_GET["refPdt"] == $_SESSION["reference"][$k] )  { // Cas produit à supprimé trouvé
					$indice = $k;
				}			   
			} 

			if ($indice != -1) {  	// Cas produit à supprimer trouvé
				for($m = $indice; $m < $nb  ; $m++)
				{		
					$_SESSION["reference"][$m ]=$_SESSION["reference"][$m +1];
					$_SESSION["quantite"][$m]=$_SESSION["quantite"][$m +1];
				}
				unset($_SESSION["reference"][$nb]);
				unset($_SESSION["quantite"][$nb]);
			}
			break;
	}
    header("Location: commande.php");
?>
</div>
<?php include'pied.php';?>