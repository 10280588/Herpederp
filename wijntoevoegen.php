<?php

//include ('connection.php');

$con = mysql_connect("localhost");
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

//stel een default in voor jaar
if ($jaar == ''){$jaar = '0000';}

//haal tabel op met alleen de rij met de hoogste art_id, 
$art_id = mysql_query("SELECT art_id FROM artikelen WHERE hoofd_cat=" . $categorie . " ORDER BY art_id DESC LIMIT 1");
//haal de art_id uit de tabel
$row = mysql_fetch_array($art_id);
//maak een art_id voor het product dat toegevoegd wordt.
$artid = $row['art_id'] + 1;

//controleer het type en de grootte van het plaatje
if (($_FILES["file"]["type"] == "image/png") && ($_FILES["file"]["size"] < 20000))
  {
  if ($_FILES["file"]["error"] > 0)
	{
	echo "Error: " . $_FILES["file"]["error"] . "<br />"; //als het plaatje niet voldoet, toon de error
	}
  else
	{
	move_uploaded_file($_FILES["file"]["tmp_name"], "prod_image/small/" . $artid . ".png"); //verplaats het plaatje naar de goede folder en hernoem het.
	}	
  }

if (($_FILES["file2"]["type"] == "image/png") && ($_FILES["file2"]["size"] < 20000))
  {
  if ($_FILES["file2"]["error"] > 0)
	{
	echo "Error: " . $_FILES["file2"]["error"] . "<br />"; //als het plaatje niet voldoet, toon de error
	}
  else
	{
	move_uploaded_file($_FILES["file"]["tmp_name"], "prod_image/normal/" . $artid . ".png"); //verplaats het plaatje naar de goede folder en hernoem het.
	}	
  }

$bestandslocatieSmall = "images/small/" . $artid . ".png";  
$bestandslocatieNormal = "images/normal/" . $artid . ".png";  

//maak queries voor verschillende tabellen
$sql_artikelen = "INSERT INTO Artikelen (art_id, naam, hoofd_cat, land, streek, prijs, inhoud, beschrijving, smaak, plaatje, sub_cat, jaar, voorraad) VALUES (
		'$artid', '$naam', '$categorie', '$land', '$streek', '$prijs', '$inhoud', '$beschrijving', '$smaak', '$bestandslocatieSmall', '$subcategorie', '$jaar', '$voorraad')";
		
$sql_quickfilt = "INSERT INTO art_quickfilt_hoofd (art_id, hoofd_cat) VALUES ('$artid', '$categorie')";
$sql_short = "INSERT INTO art_short (art_id, naam, prijs, plaatje) VALUES ('$artid', '$naam', '$prijs', '$bestandslocatie')";

if (!mysql_query($sql_artikelen,$con))
  {
  die('Error: ' . mysql_error());
  }

if (!mysql_query($sql_quickfilt, $con))
  {
  die('Error: ' . mysql_error());
  }

if (!mysql_query($sql_short, $con))
  {
  die('Error: ' . mysql_error());
  }

echo "Wijn is toegevoegd met artikelnummer: '$artid'";

?>