<?php

require_once("../../config/Base.php");
require_once("../../config/Auth.php");
require_once("../../config/Alert.php");
require_once("../../views/kontak/redirect.php");

$pesan_kontak = "SELECT * FROM pesan_kontak JOIN users ON pesan_kontak.id_user=users.id_user ORDER BY pesan_kontak.id DESC";
$views_pesan_kontak = mysqli_query($conn, $pesan_kontak);
if (isset($_POST["delete_pesan_kontak"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (pesan_kontak($conn, $validated_post, $action = 'delete') > 0) {
    $message = "Data pesan kontak berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: pesan-masuk");
    exit();
  }
}
