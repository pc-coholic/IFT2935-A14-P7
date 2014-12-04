<?php
require("db.php");

print query_json("SELECT Description As Severite_des_patients, COUNT(*) AS Attente, Label FROM SEVERITE S, EVALUER E, PATIENT_DANS_DEPT P, DEPT_HOPITAL D 
                  WHERE S.ID=E.ID_S AND E.NUMEROPATIENT=P.NUMEROPATIENT AND P.ID_DEPT_HOP = D.ID AND D.ID = " . $_GET['ID'] . " AND P.DATESERVICE IS NULL GROUP BY Severite_des_patients");
?>
