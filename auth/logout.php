<?php if (!isset($_SESSION)) {
  session_start();
}
require_once("../controller/auth.php");
if (isset($_SESSION["project_sman_5_kota_komba"])) {
  unset($_SESSION["project_sman_5_kota_komba"]);
  header("Location: ./");
  exit();
}
