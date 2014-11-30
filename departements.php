<?php
require("db.php");

print query_json("SELECT dept_hopital.ID, Nom FROM dept_hopital LEFT JOIN departement ON ID_D = departement.ID WHERE ID_H = " . $_GET['ID']);
?>
