<?php

require_once("../../config/Base.php");
require_once("../../config/Auth.php");
require_once("../../config/Alert.php");
require_once("../../views/kesiswaan/redirect.php");

$ekstrakurikuler = "SELECT * FROM ekstrakurikuler ORDER BY id DESC";
$views_ekstrakurikuler = mysqli_query($conn, $ekstrakurikuler);
if (isset($_POST["add_ekstrakurikuler"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (ekstrakurikuler($conn, $validated_post, $action = 'insert', $deskripsi_kegiatan = $_POST['deskripsi_kegiatan'], $id_user) > 0) {
    $message = "Data ekstrakurikuler baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: ekstrakurikuler");
    exit();
  }
}
if (isset($_POST["edit_ekstrakurikuler"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (ekstrakurikuler($conn, $validated_post, $action = 'update', $deskripsi_kegiatan = $_POST['deskripsi_kegiatan'], $id_user) > 0) {
    $message = "Data ekstrakurikuler " . $_POST['nama_ekskul'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: ekstrakurikuler");
    exit();
  }
}
if (isset($_POST["delete_ekstrakurikuler"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (ekstrakurikuler($conn, $validated_post, $action = 'delete', $deskripsi_kegiatan = null, $id_user) > 0) {
    $message = "Data ekstrakurikuler " . $_POST['nama_ekskul'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: ekstrakurikuler");
    exit();
  }
}

$osis = "SELECT * FROM osis ORDER BY id DESC";
$views_osis = mysqli_query($conn, $osis);
if (isset($_POST["add_osis"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (osis($conn, $validated_post, $action = 'insert', $id_user) > 0) {
    $message = "Data OSIS atau MPK baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: osis-atau-mpk");
    exit();
  }
}
if (isset($_POST["edit_osis"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (osis($conn, $validated_post, $action = 'update', $id_user) > 0) {
    $message = "Data OSIS atau MPK " . $_POST['nama_siswa'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: osis-atau-mpk");
    exit();
  }
}
if (isset($_POST["delete_osis"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (osis($conn, $validated_post, $action = 'delete', $id_user) > 0) {
    $message = "Data OSIS atau MPK " . $_POST['nama_siswa'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: osis-atau-mpk");
    exit();
  }
}

$prestasi = "SELECT * FROM prestasi ORDER BY id DESC";
$views_prestasi = mysqli_query($conn, $prestasi);
if (isset($_POST["add_prestasi"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (prestasi($conn, $validated_post, $action = 'insert', $id_user) > 0) {
    $message = "Data prestasi baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: prestasi");
    exit();
  }
}
if (isset($_POST["edit_prestasi"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (prestasi($conn, $validated_post, $action = 'update', $id_user) > 0) {
    $message = "Data prestasi " . $_POST['nama_lomba'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: prestasi");
    exit();
  }
}
if (isset($_POST["delete_prestasi"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (prestasi($conn, $validated_post, $action = 'delete', $id_user) > 0) {
    $message = "Data prestasi " . $_POST['nama_lomba'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: prestasi");
    exit();
  }
}
