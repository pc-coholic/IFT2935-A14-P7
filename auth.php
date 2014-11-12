<?php
$baseurl = 'https://ift2935-a14-p7.herokuapp.com/';

function check_auth() {
  if (!isset($_GET['ticket'])) {
    do_udem_auth();
  } else {
    check_udem_auth();
  }
}

function do_udem_auth() {
  header("Location: https://identification.umontreal.ca/cas/login.ashx?service=" . $baseurl);
  exit();
}

function check_udem_auth() {
  $authresponse = simplexml_load_file("https://identification.umontreal.ca/cas/serviceValidate.ashx?ticket=" . $_GET['ticket'] . "&service=" . $baseurl);
  print_r($authresponse);
}

?>
