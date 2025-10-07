<?php

$messageTypes = ["success", "info", "warning", "danger", "dark"];

if (!isset($_SESSION["project_sman_5_kota_komba"]["users"])) {
  if (isset($_SESSION["project_sman_5_kota_komba"]["time_message"]) && (time() - $_SESSION["project_sman_5_kota_komba"]["time_message"]) > 2) {
    foreach ($messageTypes as $type) {
      if (isset($_SESSION["project_sman_5_kota_komba"]["message_$type"])) {
        unset($_SESSION["project_sman_5_kota_komba"]["message_$type"]);
      }
    }
    unset($_SESSION["project_sman_5_kota_komba"]["time_message"]);
  }
} else if (isset($_SESSION["project_sman_5_kota_komba"]["users"])) {
  if (isset($_SESSION["project_sman_5_kota_komba"]["users"]["time_message"]) && (time() - $_SESSION["project_sman_5_kota_komba"]["users"]["time_message"]) > 2) {
    foreach ($messageTypes as $type) {
      if (isset($_SESSION["project_sman_5_kota_komba"]["users"]["message_$type"])) {
        unset($_SESSION["project_sman_5_kota_komba"]["users"]["message_$type"]);
      }
    }
    unset($_SESSION["project_sman_5_kota_komba"]["users"]["time_message"]);
  }
}
