<?php
require("db.php");

print query_json("SELECT h.ID, NOM, adresse, latitude, longitude, AVG(DateService - DATEARRIVEE) AS MOYENNE from hopital h, PATIENT_DANS_DEPT P , DEPT_HOPITAL D where h.id=d.id_h and d.id=p.id_dept_hop and p.DateService is not null group by nom");
?>
