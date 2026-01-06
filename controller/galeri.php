<?php

require_once("../../config/Base.php");
require_once("../../config/Auth.php");
require_once("../../config/Alert.php");
require_once("../../views/galeri/redirect.php");

$album = "SELECT * FROM album ORDER BY id DESC";
$views_album = mysqli_query($conn, $album);
if (isset($_POST["add_album"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (album($conn, $validated_post, $action = 'insert', $id_user) > 0) {
    $message = "Data album baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: kegiatan-sekolah");
    exit();
  }
}
if (isset($_POST["edit_album"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (album($conn, $validated_post, $action = 'update', $id_user) > 0) {
    $message = "Data album " . $_POST['nama_album'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: kegiatan-sekolah");
    exit();
  }
}
if (isset($_POST["delete_album"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (album($conn, $validated_post, $action = 'delete', $id_user) > 0) {
    $message = "Data album " . $_POST['nama_album'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: kegiatan-sekolah");
    exit();
  }
}
if (isset($_POST["add_foto"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (foto($conn, $validated_post, 'insert') > 0) {
    $message = "Foto berhasil ditambahkan ke album.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: detail-album?p=" . $_POST['id_album']);
    exit();
  }
}
if (isset($_POST["delete_foto"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (foto($conn, $validated_post, 'delete') > 0) {
    $message = "Foto berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: detail-album?p=" . $_POST['id_redirect']);
    exit();
  }
}
