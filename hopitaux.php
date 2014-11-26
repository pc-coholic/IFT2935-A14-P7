<?php
$pdo = new PDO(getenv('DB_DSN'), getenv('DB_USER'), getenv('DB_PASS'));

$array = $pdo->query("SELECT * FROM hopital", $link) or die(mysql_error($link));
$array->fetchAll(PDO::FETCH_ASSOC);
print json_encode($array);
$pdo = null;
?>
