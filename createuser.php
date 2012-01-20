<?PHP
include ('connection.php');



$gebruikersnaam = ($_POST['Gebruikersnaam']);
$voornaam = ($_POST['Voornaam']);
$achternaam = ($_POST['Achternaam']);
$ww = ($_POST['ww']);
$ww2 = ($_POST['ww2']);
$mail = ($_POST['Mail']);
$straat = ($_POST['Straat']);
$nrtoev = ($_POST['Nrtoev']);
$plaats = ($_POST['Woonplaats']);
$postcode = ($_POST['Postcode']);
$rekeningnummer = ($_POST['Rekeningnummer']);
$telefoonnummer = ($_POST['Telefoonnummer']);
$sekse = ($_POST['Sekse']);

if($ww!=$ww2)
{
echo("De wachtwoorden komen niet overeen, klik om terug te gaan");

}
else
{
$sql="select count(*) from Accounts where gebruikersnaam='" . $gebruikersnaam . "'";
$result=mysql_query($sql);
$query_data=mysql_fetch_row($result);
if($query_data[0]>0) {
echo ("Username already exists");
}
else
{

mysql_query("INSERT INTO Klanten (vr_naam, acht_naam, email, straatnaam, huisnummer, postcode, woonplaats, bank_nr, tel, sekse) VALUES ('$voornaam', '$achternaam', '$mail', '$straat', '$nrtoev', '$postcode', '$plaats', '$rekeningnummer', '$telefoonnummer', '$sekse')") or die(mysql_error());

$test = mysql_query("SELECT klant_id FROM Klanten where email ='$mail'");
$klantid =  mysql_fetch_row($test);
echo $klantid[0];

mysql_query("INSERT INTO Accounts (gebruikersnaam, ww, klant_id) VALUES ('$gebruikersnaam', '$ww', '$klantid[0]')") or die(mysql_error());
echo("Het is gelukt");





}}






?>