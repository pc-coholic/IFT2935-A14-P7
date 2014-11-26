<?php
$pdo = new PDO(getenv('DB_DSN'), getenv('DB_USER'), getenv('DB_PASS'));

$array = $pdo->query("SELECT * FROM hopital")->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($array);

$pdo = null;
?>
