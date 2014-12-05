<?php
require("db.php");

$allSeverite= query_json("SELECT s.id as severite, Label , count(*) As NbPatient from severite s, evaluer e, patient_dans_dept p where s.id=e.id_s and e.numeropatient=p.numeropatient and dateservice is null group by s.id");

$allSeverite= json_decode($allSeverite, true);

print json_encode($allSeverite);

?>
