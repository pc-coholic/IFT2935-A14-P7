<?php
require("db.php");

print query_json("SELECT h.ID, Nom, Adresse, Latitude, Longitude, AVG(TIME_TO_SEC(TIMEDIFF(DateService,DATEARRIVEE))) AS Moyenne from hopital h, PATIENT_DANS_DEPT P , DEPT_HOPITAL D where h.id=d.id_h and d.id=p.id_dept_hop and p.DateService is not null group by nom");
?>

