!doctype html> 
	<html>
		<head> 
			<meta charset="utf-8">
			
		<title> modif </title>
		</head> 
		
		<body>



<?php 
if(isset($_REQUEST['envoyer']))
{$lien=mysqli_connect("localhost","root","root","blog");
$titre=trim(htmlentities(mysqli_real_escape_string($lien, $_REQUEST['titre'])));$id=$_REQUEST['id'];
$auteur=trim(htmlentities(mysqli_real_escape_string($lien, $_REQUEST['auteur'])));$id=$_REQUEST['id'];
$contenu=trim(htmlentities(mysqli_real_escape_string($lien, $_REQUEST['contenu'])));$id=$_REQUEST['id'];
$date=trim(htmlentities(mysqli_real_escape_string($lien, $_REQUEST['date'])));$id=$_REQUEST['id'];
$req="UPDATE actus SET titre='$titre', auteur='$auteur', contenu='$contenu', date='$date' WHERE id='$id'";
$res=mysqli_query($lien,$req);
if(!$res)
{echo "Erreur SQL; $req<br>".mysqli_error($lien);}
else 
{echo "Mise à jour réussie";
}
mysqli_close($lien);
} ?>


<?php
if(isset($_REQUEST['id']))
{$lien=mysqli_connect("localhost","root","root","blog");
$id=$_REQUEST['id'];
$req="SELECT*FROM actus WHERE id='$id'";
$res=mysqli_query($lien,$req);
if(!$res)
{echo "Erreur SQL; $req<br>".mysqli_error($lien);}
else { $tableau=mysqli_fetch_array($res);
?>
<form method="POST">
<label for="titre">Titre:</label><input type="text" name="titre"
value="<?php echo $tableau['titre'];?>"><br>
<label for="contenu">Contenu:</label> <textarea name="contenu"><?php echo $tableau['contenu'];?></textarea><br>
<label for="auteur">Auteur:</label> <input type="text" name="auteur" value="<?php echo $tableau['auteur'];?>"><br>
<label for="date">Date :</label> <input type="datetime-local" name="date" value="<?php echo date("Y-m-d\TH:i:s", strtotime($tableau['date']));?>"> <br>
<input type="hidden" name="id" value="<?php echo $tableau['id'];?>">
<input type="submit" name="envoyer"></form>
<?php
}
mysqli_close($lien);
}
?>

	 <a href='liste_actus.php'>Retour à la liste</a>
	 
	 </body>
	 </html>
	
