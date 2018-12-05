<!doctype html> 
	<html>
		<head> 
			<meta charset="utf-8">
			
		<title> actus </title>
		</head> 
		
		<body>
		
		<form  method="post" enctype="multipart/form-data">
	
			<label for="titre"> Titre </label>
			<input type="text" id="titre" name="titre"> </input>			
			<br>
			
			<label for="contenu"> Contenu : </label>
			<input type="text" id="contenu" name="contenu"> </input>
			
			<br>
			
			<label for="auteur"> Auteur : </label>
			<input type="text" id="auteur" name="auteur"> </input>
			<br>
			
			<label for="date"> Date : </label>
			<input type="datetime-local" id="date" name="date"> </input>
			<br>
			
			<label for="image"> Image: </label> 
			<input type="file" id="image" name="image">
			<br>
			
			<input type="submit" id="submit" name="envoyer"> </input>
			
		</form>
		
		<?php
if(isset($_REQUEST['envoyer']))
{$titre= $_REQUEST['titre'];
 $contenu= $_REQUEST['contenu'];
 $auteur= $_REQUEST ['auteur'];
 $date= $_REQUEST ['date'];
 $extensionsvalides=array('gif','jpg','png');
 $extension=strtolower(substr(strrchr($_FILES['image']['name'],"."),1));
 if(in_array($extension,$extensionsvalides))
 {$destination="images/".uniqid().".".$extension;
$envoi=move_uploaded_file($_FILES['image']['tmp_name'],$destination);
if($envoi)
{echo "transfert réussi";}
else
 {echo "Echec transfert";}}
 $lien=mysqli_connect("localhost", "root", "root", "blog");
 $req="INSERT INTO actus VALUES (NULL, '$titre', '$contenu', '$auteur', '$date', '$destination')";
 $res=mysqli_query($lien,$req);
 if(!$res)
 {echo "Erreur SQL : $req <br>".mysqli_error($lien);
 }
 else { echo"Ajout réussi";}
 mysqli_close($lien);
}
 ?>
 
<a href='liste_actus.php'>Retour à la liste </a>













