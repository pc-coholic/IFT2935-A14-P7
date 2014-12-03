<?php
require("db.php");

print query_json("UPDATE patient SET TypeEnvoi = '" . $_POST['selectModeEnvoie3'] . "', min_patient = '" . $_POST['selectNoPatients3'] . "' WHERE numeroPatient = " . $_POST['inputNoPatient3']);
?>
