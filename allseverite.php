<?php
require("db.php");
print query_json("select description, count(*) from severite s, evaluer e, patient_dans_dept p where s.id=e.id_s and e.numeropatient=p.numeropatient and dateservice is null group by description");
// SEC TO TIME a mettre pour avoir le format en hh:mm:ss
?>
