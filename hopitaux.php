<?php
$pdo = new PDO(getenv('DB_DSN'), getenv('DB_USER'), getenv('DB_PASS'));

$array = $pdo->query("SELECT * FROM hopital")->fetchAll(PDO::FETCH_ASSOC);
print json_encode($array);
print "foobar";
$pdo = null;
?>
