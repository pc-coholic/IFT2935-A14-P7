<?php
require("db.php");

print query_json("SELECT AVG(TIME_TO_SEC(TIMEDIFF(DateService,DATEARRIVEE))) AS MOYENNE FROM PATIENT_DANS_DEPT WHERE DateService IS NOT NULL");
?>
