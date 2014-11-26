<?php
$con=mysqli_connect(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB_BASE'));

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Perform queries 
$sth = mysqli_query($con, "SELECT * FROM hopital");

echo("Error description: " . mysqli_error($con));

$rows = array();
while($r = mysqli_fetch_assoc($sth)) {
    $rows[] = $r;
}
print json_encode($rows);

mysqli_close($con);
?>
