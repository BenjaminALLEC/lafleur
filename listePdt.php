<?php include'en-tete.php'; ?>
<?php include'menu.php'; ?>
<?php include'param.inc'; ?>
  <div id="content">
    <?php
    $idConnexion=mysql_connect($host,$user,$pass);
    if ($idConnexion) {
        mysql_select_db($base,$idConnexion);
        echo '<table  id="produits">';
        $requete="select * from produit where idcategorie='".$_GET["categ"]."';";
   	    $jeuResultat=mysql_query($requete,$idConnexion);
        $ligne=mysql_fetch_assoc($jeuResultat);
        while($ligne)  {
           	$id = $ligne['id'];
			$description  = $ligne['description'];
			$prix = $ligne['prix'];
			$image = $ligne['image'];
			echo "<tr>";
			
			echo "<td>  $id </td>";
            echo "<td> $description</td>";
            echo "<td> $prix Euros</td>";
		    echo "<td><img src='$image' alt='Lafleur - $description'</td>";
			echo "<td>";
			echo "
			<form method='get'  action='panier.php'>
				<input type='hidden' id='refPdt' name='refPdt' value='$id' />
				<label for='quantite' >Quantité</label>
				<input type='text' id='quantite' name='quantite' value='1' />
				<input type='hidden' name='action' value='Ajout au panier' />
				<input type='image' src='./images/mettrepanier.png' name='Ajouter au panier'  width='40' height='40'>		
			</form>";
			echo '</td>';
            echo '</tr>';
            $ligne=mysql_fetch_assoc($jeuResultat);
		}
		echo '</table>';
	} else {
		echo 'Le site est temporairement indisponible';
	}
	mysql_close($idConnexion);
    ?>
  </div>
<?php include'pied.php'; ?>