<?php
require("auth.php");

print query_json("SELECT * FROM hopital");
?>
