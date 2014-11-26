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
print json_encode($rows);
switch(json_last_error())
 {
  case JSON_ERROR_DEPTH:
   echo ' - Maximale Stacktiefe überschritten';
  break;
  case JSON_ERROR_CTRL_CHAR:
   echo ' - Unerwartetes Steuerzeichen gefunden';
  break;
  case JSON_ERROR_SYNTAX:
   echo ' - Syntaxfehler, ungültiges JSON';
  break;
  case JSON_ERROR_NONE:
   echo ' - Keine Fehler';
  break;
 }


mysqli_close($con);
?>
