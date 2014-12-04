<?php
require("db.php");

$attente = query_json("SELECT Description As Severite_des_patients, COUNT(*) AS Attente, Label FROM SEVERITE S, EVALUER E, PATIENT_DANS_DEPT P, DEPT_HOPITAL D 
                 WHERE S.ID=E.ID_S AND E.NUMEROPATIENT=P.NUMEROPATIENT AND P.ID_DEPT_HOP = D.ID AND D.ID = " . $_GET['ID'] . " AND P.DATESERVICE IS NULL GROUP BY Severite_des_patients");

$moyenne = query_json("SELECT Description As Severite_des_patients, SEC_TO_TIME(AVG(TIME_TO_SEC(TIMEDIFF(DateService,DATEARRIVEE)))) AS MOYENNE FROM SEVERITE S, EVALUER E, PATIENT_DANS_DEPT P , DEPT_HOPITAL D WHERE S.ID=E.ID_S AND E.NUMEROPATIENT=P.NUMEROPATIENT AND P.ID_DEPT_HOP = D.ID AND D.ID = " . $_GET['ID'] . " AND P.DateService IS NOT NULL GROUP BY Severite_des_patients");

$attente = json_decode($attente, true);
$moyenne = json_decode($moyenne, true);

for ($i = 0; $i < sizeof($attente); $i++) {
  $temps = rand(60, 10800);
  for ($j = 0; $j < sizeof($moyenne); $j++) {
    if ($moyenne[$j]['Severite_des_patients'] == $attente[$i]['Severite_des_patients']) {
      $temps = round($moyenne[$j]['MOYENNE']);
      break;
    }
  }
  $attente[$i]['MOYENNE'] = $temps;
}

print json_encode($attente);
?>
