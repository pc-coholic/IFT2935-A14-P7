<?php
require("db.php");

print query_json("SELECT d.ID, Nom, AVG(TIME_TO_SEC(TIMEDIFF(DateService,DATEARRIVEE))) AS Moyenne  from departement de, PATIENT_DANS_DEPT P , DEPT_HOPITAL D  where de.id=d.id_d and d.id=p.id_dept_hop and d.id_h=" . $_GET['ID'] . " and p.DateService is not null group by NOM");

// SEC TO TIME a mettre pour avoir le format en hh:mm:ss

?>
