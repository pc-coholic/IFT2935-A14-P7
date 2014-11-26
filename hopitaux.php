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

$json = json_encode(utf8_encode_deep($rows));

print json_last_error();
print $json;

mysqli_close($con);

function utf8_encode_deep(&$input) {
    if (is_string($input)) {
        $input = utf8_encode($input);
    } else if (is_array($input)) {
        foreach ($input as &$value) {
            utf8_encode_deep($value);
        }

        unset($value);
    } else if (is_object($input)) {
        $vars = array_keys(get_object_vars($input));

        foreach ($vars as $var) {
            utf8_encode_deep($input->$var);
        }
    }
}
?>
