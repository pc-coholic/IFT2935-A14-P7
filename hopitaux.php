<?php
require("auth.php");
check_auth();

$pdo = new PDO(getenv('CLEARDB_DATABASE_URL'));

$array = $pdo->query("SELECT * FROM hopital")->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($array);

$pdo = null;
?>
