<?php

function check_auth() {
  if (!isset($_GET['ticket'])) {
    do_udem_auth();
  } else {
    check_udem_auth();
  }
}

function do_udem_auth() {
  print "do_udem_auth()";
}

function check_udem_auth() {
  print "check_udem_auth()";
}

?>
