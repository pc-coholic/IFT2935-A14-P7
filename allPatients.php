<?php
require("db.php");

print query_json("SELECT COUNT(*) AS Attente FROM patient_dans_dept WHERE DATESERVICE IS NULL");
?>
