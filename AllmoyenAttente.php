<?php
require("db.php");
$AllmoyenAttente= query_json("SELECT s.id as severite, Label, AVG(TIME_TO_SEC(TIMEDIFF(DateService,DATEARRIVEE))) AS MOYENNE from severite s, evaluer e, patient_dans_dept p where s.id=e.id_s and e.numeropatient=p.numeropatient and dateservice is not null group by s.id ");
$AllmoyenAttente= json_decode($AllmoyenAttente, true);
print json_encode($AllmoyenAttente);
?>
