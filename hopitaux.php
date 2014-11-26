<?php
$con=mysqli_connect(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB_DB'));

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Perform queries 
$sth = mysqli_query($con, "SELECT * FROM hopital");


$rows = array();
while($r = mysqli_fetch_assoc($sth)) {
    $rows[] = $r;
}

$json = json_encode($rows);

switch(json_last_error())
 {
  case JSON_ERROR_DEPTH:
   print ' - Maximale Stacktiefe überschritten';
  break;
  case JSON_ERROR_CTRL_CHAR:
   print ' - Unerwartetes Steuerzeichen gefunden';
  break;
  case JSON_ERROR_SYNTAX:
   print ' - Syntaxfehler, ungültiges JSON';
  break;
  case JSON_ERROR_NONE:
   print ' - Keine Fehler';
  break;
 }

print $json;
var_dump($json);

mysqli_close($con);
?>
