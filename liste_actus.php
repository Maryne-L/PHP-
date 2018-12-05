<!doctype html> 
	<html>
		<head> 
			<meta charset="utf-8">
			
		<title> actus </title>
		</head> 
		
		<body>
		
		<form  method="post">
	
			<select name="tri">
			<option value="">Tri</option>
				<option value="asc"> croissant </option>
				<option value="desc"> decroissant </option>
			</select>
			
			<input type="submit" id="submit" name="envoyer"> 

		</form>
		
		<?php
		
 $lien=mysqli_connect("localhost", "root", "root", "blog");
 if(isset ( $_REQUEST ['tri']))
	 $tri=$_REQUEST ['tri'];
 else 
	 $tri="desc";
 
 $req="SELECT* FROM actus ORDER BY date $tri";
 $res=mysqli_query($lien,$req);
 if(!$res)
 {echo "Erreur SQL : $req <br>".mysqli_error($lien);
 }
 else { 
 echo "<table>";
 while ($tableau=mysqli_fetch_array($res))
 {
	 echo"<tr>";
	 echo"<td><a href='detail_actus.php?id=".$tableau['id']."'>".$tableau['titre']."</a></td>";
	 echo"<td>".$tableau['date']."</td>";
	 
	 echo"<td>";
	 echo"<a href='suppr_actus.php?id=".$tableau['id']."'>Supprimer</a>";
	 echo"</td>";
	 echo"<td>";
	 echo"<a href='modif_actus.php?id=".$tableau['id']."'>Modifer</a>";
	 echo"</td>";
	 echo"</tr>";
 }
 echo"</table>";
 }
 $req="SELECT COUNT(*) as nb FROM actus";
 $res=mysqli_query($lien,$req);
 if(!$res)
 {
	 echo"Erreur SQL:$req<br>".mysqli-error($lien);
 }
 else{
	 $liste= mysqli_fetch_array($res);
	$$nbpages=ceil($liste['nb']/$actusparpage);
	echo"Pages: ";
	echo"<a href='liste_actus.php?page=1'> << </a>";
	if($page!=1)
	{
	echo"<a href='liste_actus.php?page=$page-1'> < </a>";
	}
	for ($i=1;$i<=$nbpages;$i++)
  {
	  if($i>=$page-3)&&($i<=$page+3)
	  {
		  if ($i!=$page)
		  {
		  echo"<a href='liste_actus.php?page=$i'> $i </a>;
		  }
		  else{
			  echo"<b> $i </b>";
		  }
	  }
  }
  if($page!=$nbpages)
  {
   echo "<a href='liste_actus.php?page=$page+1'> > </a>";
  }
   echo "<a href='liste_actus.php?page=$nbpages'> >> </a>;
 }
 mysqli_close($lien);

 ?>
 
 	<a href='ajout_actus.php'>Ajoutez une actu </a>