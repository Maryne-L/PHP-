<?php
if(isset($_REQUEST['id']))
{ $id=$_REQUEST['id'];
$lien=mysqli_connect("localhost","root","root","blog");
$req="SELECT* FROM actus WHERE id='$id'";
$res=mysqli_query($lien,$req);
if(!$res)
{echo "Erreur SQL:$req<br>".mysqli_error($lien);}
else
{ $tableau=mysqli_fetch_array ($res); unlink($tableau['image']);
}
$req="DELETE FROM actus WHERE id='$id'";
$res=mysqli_query($lien,$req);
if(!$res)
{ echo "Erreur SQL:$req<br>".mysqli_error($lien);}
else { header("location:liste_actus.php");}
mysqli_close($lien);
}
