<?php
require("db.php");

print query_json("SELECT * FROM departement WHERE ID = " . $_GET['ID']);
?>
