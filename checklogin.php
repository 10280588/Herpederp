<?php

$gebruikersnaam = ($_POST['Gebruikersnaam']);
$ww = ($_POST['ww']);



$sql="select count(*) from Accounts where gebruikersnaam='" . $gebruikersnaam . "'";
$result=mysql_query($sql);
$query_data=mysql_fetch_row($result);
if($query_data[0]>0) {



$test = mysql_query("SELECT ww FROM Accounts where gebruikersnaam ='$gebruikersnaam'");
$klantid =  mysql_fetch_row($test);
if($ww =  $test)
{
 echo("coockie maken");
}
else {
echo("er is een fout(2)");
}
}
else {
echo("er is een fout(1)");
}

?>