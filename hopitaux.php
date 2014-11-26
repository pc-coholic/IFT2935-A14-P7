<?php
$pdo = new PDO(getenv('DB_DSN'), getenv('DB_USER'), getenv('DB_PASS'));

$statement=$pdo->prepare("SELECT * FROM hopital");
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);

print $json;

$pdo = null;
?>
aaaa
 <?= $json ?>
bbbb
