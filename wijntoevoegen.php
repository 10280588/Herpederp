<?php

$con = mysql_connect("localhost:3306");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("test", $con);

$naam = $_POST['naam'];
$categorie = $_POST['categorie'];
$land = $_POST['land'];
$streek = $_POST['streek'];
$prijs = $_POST['prijs'];
$inhoud = $_POST['inhoud'];
$smaak = $_POST['smaak'];
$subcategorie = $_POST['subcategorie'];
$jaar = $_POST['jaar'];
$voorraad = $_POST['voorraad'];
$beschrijving = $_POST['beschrijving'];

//schrijf categorie om naar getal
if($_POST['categorie'] == "Rood"){
	$categorie = 1;}
elseif($_POST['categorie'] == "Wit"){
	$categorie = 2;}
elseif($_POST['categorie'] == "Mousserend"){
	$categorie = 3;}

//haal tabel op met alleen de rij met de hoogste art_id, 
$art_id = mysql_query("SELECT art_id FROM artikelen WHERE hoofd_cat=" . $categorie . " ORDER BY art_id DESC LIMIT 1");
//haal de art_id uit de tabel
$row = mysql_fetch_array($art_id);
//maak een art_id voor het product dat toegevoegd wordt.
$artid = $row['art_id'] + 1;

echo "artid: " . $artid . "<br />";

echo "filetype: " . $_FILES["file"]["type"] . "<br />";


if (($_FILES["file"]["type"] == "image/png") && ($_FILES["file"]["size"] < 20000))
  {
  if ($_FILES["file"]["error"] > 0)
	{
	echo "Error: " . $_FILES["file"]["error"] . "<br />";
	}
  else
	{
	move_uploaded_file($_FILES["file"]["tmp_name"], "images/" . $_FILES["file"]["name"]);
	echo "Stored in: " . "images/" . $_FILES["file"]["name"] . "<br />";
	}	
  }
  
$_FILES["file"]["name"] = $artid . ".png";


echo "filename: " . $_FILES["file"]["name"] . "<br />";
  
  
$sql = "INSERT INTO Artikelen (art_id, naam, hoofd_cat, land, streek, prijs, inhoud, beschrijving, smaak, plaatje, sub_cat, jaar, voorraad) 
		VALUES (" . $artid . ", " . $naam . ", " . $categorie . ", " . $land . ", " . $streek . 
		", " . $prijs . ", " . $inhoud . ", " . $beschrijving . ", " . $smaak . ", " . $_FILES["file"]["name"] . ", " . $subcategorie . ", " . $jaar . ", " . $voorraad . ")";
  
//mysql_query($sql,$con);

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

mysql_close($con);
?>