<?php
function query_json($query) {
  $con=mysqli_connect(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB_DB'));

  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  // Perform queries 
  $sth = mysqli_query($con, $query);


  $rows = array();
  while($r = mysqli_fetch_assoc($sth)) {
      $rows[] = $r;
  }

  utf8_encode_deep($rows);
  $json = json_encode($rows);

  mysqli_close($con);

  return $json;
}

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

function merge_json($a, $b) {
  $r = [];
  foreach(json_decode($a, true) as $key => $array){
   $r[$key] = array_merge(json_decode($b, true)[$key],$array);
  }
  return json_encode($r);
} 
?>
