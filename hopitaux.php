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
print_r($rows);
print json_encode($rows);
echo("Error description: " . mysqli_error($con));
mysqli_close($con);
?>
