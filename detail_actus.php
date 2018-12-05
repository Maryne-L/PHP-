<!doctype html> 
	<html>
		<head> 
			<meta charset="utf-8">
			
		<title> actus </title>
		</head> 
		
		<body>







<?php
if(isset($_REQUEST['id']))
{ $id=$_REQUEST['id'];
$lien=mysqli_connect("localhost","root","root","blog");
$req="SELECT * FROM actus WHERE id='$id'";
$res=mysqli_query($lien,$req);
if(!$res)
{ echo "Erreur SQL:$req<br>".mysqli_error($lien);}
else { $tableau=mysqli_fetch_array($res);
echo"<h1>".$tableau['titre']."</h1>";
echo"<img src='".$tableau['image']."'>";
echo"<p>".$tableau['contenu']."</p>";
echo"<b>".$tableau['auteur']."</b><br>";
echo"<i>".$tableau['date']."</i><br>";
echo"<a href='liste_actus.php'>Retour à la liste</a>";
}
mysqli_close($lien);
}
 ?>

 </body>
 </html>