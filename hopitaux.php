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

$rows = iconv('UTF-8', 'UTF-8//IGNORE', utf8_encode($rows));
$json = json_encode($rows);

print json_last_error();
print $json;

mysqli_close($con);
?>
