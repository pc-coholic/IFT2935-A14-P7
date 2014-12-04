<?php
require("db.php");

$attente = query_json("SELECT Description As Severite_des_patients, COUNT(*) AS Attente, Label FROM SEVERITE S, EVALUER E, PATIENT_DANS_DEPT P, DEPT_HOPITAL D 
                 WHERE S.ID=E.ID_S AND E.NUMEROPATIENT=P.NUMEROPATIENT AND P.ID_DEPT_HOP = D.ID AND D.ID = " . $_GET['ID'] . " AND P.DATESERVICE IS NULL GROUP BY Severite_des_patients");

$moyenne = query_json("SELECT Description As Severite_des_patients,AVG(DateService - DATEARRIVEE) AS MOYENNE FROM SEVERITE S, EVALUER E, PATIENT_DANS_DEPT P , DEPT_HOPITAL D , INFIRMIERE I WHERE S.ID=E.ID_S AND E.NUMEROPATIENT=P.NUMEROPATIENT AND P.ID_DEPT_HOP = D.ID AND D.ID = " . $_GET['ID'] . " AND P.DateService IS NOT NULL GROUP BY Severite_des_patients;");

$attente = json_decode($attente, true);
$moyenne = json_decode($moyenne, true);

for ($i = 0; $i < sizeof($attente); $i++) {
  $temps = 1;
  for ($j = 0; $j < sizeof($moyenne); $j++) {
    if ($moyenne[$j]['Severite_des_patients'] == $attente[$i]['Severite_des_patients']) {
      $temps = substr($moyenne[$j]['MOYENNE'], 0, -2);
      $temps = strrev(wordwrap(strrev($temps), 2, ':', true));
      if (strlen($temps) == 2) {
        $temps = "0:" . $temps;
      } elseif (strlen($temps) == 1) {
        $temps = "0:0" . $temps;
      }
      break;
    }
  }
  $attente[$i]['moyenne'] = $temps;
}

print json_encode($attente);
?>
