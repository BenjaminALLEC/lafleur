<?php session_start(); ?>
<?php include'en-tete.php'; ?>
<?php include'bandeau.php'; ?>
<?php include'param.inc'; ?>
  	<div id="content">
	<?php
    $idConnexion=mysql_connect($host,$user,$pass);
    mysql_select_db($base,$idConnexion);
    $total=0;
	if (empty ($_SESSION["reference"]))	{
		echo "Votre panier est vide !";
	} else {
		?>
		<table  width="75%" border="1" cellspacing="0" cellpadding="4">
   			<tr>
        		<td align="center">R&eacute;f&eacute;rence</td>
        		<td align="center">D&eacute;signation</td>
        		<td align="center">Prix Unitaire</td>
        		<td align="center">Quantit&eacute;</td>
        		<td align="center">Montant</td>
				<td align="center">Action</td>
    		</tr>	
			<?php
    		for ($i=0;$i<count($_SESSION["reference"]);$i++)  {
        		$ref=$_SESSION["reference"][$i];
        		$qte=$_SESSION["quantite"][$i];
        		$requete="select description,prix from produit where id='".$ref."';";
        		$produit=mysql_query($requete,$idConnexion);
        		$ligne=mysql_fetch_assoc($produit);
        		$des=$ligne["description"];
		        $prix=$ligne["prix"];
        		$montant=$qte*$prix;
        		$total=$total+$montant;
        		echo '<tr>';
					echo '<td >'.$ref.'</td>';
					echo '<td >'.$des.'</td>';
					echo '<td align="right">'.$prix.' &euro;</td>';
					echo '<td align="right">'.$qte.'</td>';
					echo '<td align="right">'.$montant.' &euro;</td>';
					echo '<td align="center">';
					?>
					<form action="panier.php" method="get" onsubmit="return confirm('Etes vous sur de vouloir supprimer cet article ?')" /> 
					<?php
					echo "
						<input type='hidden' id='refPdt' name='refPdt' value='$ref' />
						<input type='hidden' name='action' value='Suppression du panier' />
						<input type='image' src='./images/retirerpanier.png' name='Suppression du panier'  width='40' height='40'>		
					</form>
					</td>
				    </tr>";
    		}
    		mysql_close($idConnexion);
    		echo '<tr>';
    		echo '<td align="right" colspan="4">Total</td>';
    		echo '<td align="right">'.$total.' &euro;</td>';
    		echo '</tr>';
   			?>
 		</table>
		<br>
		<form name="clientPasse" action="#" method="get">
			<input type="submit" name="choix" value="Envoyer la commande" />
		</form>
	
<?php } ?>


</div>
<?php  include'pied.php'; ?>