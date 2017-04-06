<?php   @session_start();?>
<?php include'en-tete.php'; ?>
<?php include'bandeau.php'; ?>
<?php include'param.inc'; ?>

<div id="content">
  <ul id="categories">
  <?php
      if (!isset($_SESSION["reference"]))
    {
        @session_register("reference");
        @session_register("quantite");
        $_SESSION["reference"]=array();
        $_SESSION["quantite"]=array();
    }
  
    $idConnexion=mysql_connect($host,$user,$pass);
    if ($idConnexion)  {
        mysql_select_db($base,$idConnexion);
        $requete='select * from categorie;';
        $jeuResultat=mysql_query($requete,$idConnexion);
        $ligne=mysql_fetch_assoc($jeuResultat);
        while ($ligne) {
	        echo '<li><a href="listePdt.php?categ='.$ligne["id"].'" >'.$ligne["libelle"]."</a></li>";
            $ligne=mysql_fetch_assoc($jeuResultat);
        }
    }
	
    mysql_close($idConnexion);
	echo "<br>";
    echo "<li><a href='panier.php?action=Vider le Panier'>Vider le panier</a></li>";
	echo "<li><a href='commande.php'>Commander</a></li>";
  ?>
  </ul>
</div>
</div>
<?php include'pied.php'; ?>