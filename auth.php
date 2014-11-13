<?php
session_start();
define("BASEURL", "https://ift2935-a14-p7.herokuapp.com/");

function check_auth() {
  if (!isset($_GET['ticket'])) {
    do_udem_auth();
  } else {
    check_udem_auth();
  }
}

function do_udem_auth() {
  header("Location: https://identification.umontreal.ca/cas/login.ashx?service=" . BASEURL);
  exit();
}

function check_udem_auth() {
  $authurl = "https://identification.umontreal.ca/cas/serviceValidate.ashx?ticket=" . $_GET['ticket'] . "&service=" . BASEURL;
  $authresponse = file_get_contents($authurl);
  if (strpos($authresponse, 'authenticationSuccess')) {
    $regex = '#<cas:user>(.*?)</cas:user>#';
    preg_match($regex, $authresponse, $_SESSION['user']);
  } else {
    do_udem_auth();
  }
}

?>
