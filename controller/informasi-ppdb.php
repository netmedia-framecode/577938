<?php

require_once("../../config/Base.php");
require_once("../../config/Auth.php");
require_once("../../config/Alert.php");
require_once("../../views/informasi-ppdb/redirect.php");

$info_ppdb = "SELECT * FROM info_ppdb ORDER BY id DESC";
$views_info_ppdb = mysqli_query($conn, $info_ppdb);
if (isset($_POST["add_info_ppdb"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (info_ppdb($conn, $validated_post, $action = 'insert', $_POST['deskripsi']) > 0) {
    $message = "Data informasi PPDB baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: info-ppdb");
    exit();
  }
}
if (isset($_POST["edit_info_ppdb"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (info_ppdb($conn, $validated_post, $action = 'update', $_POST['deskripsi']) > 0) {
    $message = "Data informasi PPDB " . $_POST['judul'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: info-ppdb");
    exit();
  }
}
if (isset($_POST["delete_info_ppdb"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (info_ppdb($conn, $validated_post, $action = 'delete', null) > 0) {
    $message = "Data informasi PPDB " . $_POST['judul'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: info-ppdb");
    exit();
  }
}

$alur_ppdb = "SELECT * FROM alur_ppdb ORDER BY id DESC";
$views_alur_ppdb = mysqli_query($conn, $alur_ppdb);
if (isset($_POST["add_alur_ppdb"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (alur_ppdb($conn, $validated_post, $action = 'insert', $_POST['deskripsi']) > 0) {
    $message = "Data alur pendaftaran baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: alur-pendaftaran");
    exit();
  }
}
if (isset($_POST["edit_alur_ppdb"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (alur_ppdb($conn, $validated_post, $action = 'update', $_POST['deskripsi']) > 0) {
    $message = "Data alur pendaftaran " . $_POST['judul_langkah'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: alur-pendaftaran");
    exit();
  }
}
if (isset($_POST["delete_alur_ppdb"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (alur_ppdb($conn, $validated_post, $action = 'delete', null) > 0) {
    $message = "Data alur pendaftaran " . $_POST['judul_langkah'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: alur-pendaftaran");
    exit();
  }
}

$brosur_ppdb = "SELECT * FROM brosur_ppdb ORDER BY id DESC";
$views_brosur_ppdb = mysqli_query($conn, $brosur_ppdb);
if (isset($_POST["add_brosur_ppdb"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (brosur_ppdb($conn, $validated_post, $action = 'insert') > 0) {
    $message = "Data brosur PPDB baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: download-brosur");
    exit();
  }
}
if (isset($_POST["delete_brosur_ppdb"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (brosur_ppdb($conn, $validated_post, $action = 'delete') > 0) {
    $message = "Data brosur PPDB " . $_POST['judul_file'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: download-brosur");
    exit();
  }
}
