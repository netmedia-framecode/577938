<?php

require_once("../../config/Base.php");
require_once("../../config/Auth.php");
require_once("../../config/Alert.php");
require_once("../../views/akademik/redirect.php");

$info_kurikulum = "SELECT * FROM info_kurikulum ORDER BY id DESC";
$views_info_kurikulum = mysqli_query($conn, $info_kurikulum);
if (isset($_POST["add_info_kurikulum"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (info_kurikulum($conn, $validated_post, $action = 'insert', $deskripsi_umum = $_POST['deskripsi_umum'], $id_user) > 0) {
    $message = "Data kurikulum baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: kurikulum");
    exit();
  }
}
if (isset($_POST["edit_info_kurikulum"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (info_kurikulum($conn, $validated_post, $action = 'update', $deskripsi_umum = $_POST['deskripsi_umum'], $id_user) > 0) {
    $message = "Data kurikulum " . $_POST['judul'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: kurikulum");
    exit();
  }
}
if (isset($_POST["delete_info_kurikulum"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (info_kurikulum($conn, $validated_post, $action = 'delete', $deskripsi_umum = null, $id_user) > 0) {
    $message = "Data kurikulum " . $_POST['judul'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: kurikulum");
    exit();
  }
}

$jurusan = "SELECT * FROM jurusan ORDER BY id DESC";
$views_jurusan = mysqli_query($conn, $jurusan);
if (isset($_POST["add_jurusan"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (jurusan($conn, $validated_post, $action = 'insert', $deskripsi = $_POST['deskripsi'], $id_user) > 0) {
    $message = "Data jurusan baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: jurusan");
    exit();
  }
}
if (isset($_POST["edit_jurusan"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (jurusan($conn, $validated_post, $action = 'update', $deskripsi = $_POST['deskripsi'], $id_user) > 0) {
    $message = "Data jurusan " . $_POST['nama_jurusan'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: jurusan");
    exit();
  }
}
if (isset($_POST["delete_jurusan"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (jurusan($conn, $validated_post, $action = 'delete', $deskripsi = null, $id_user) > 0) {
    $message = "Data jurusan " . $_POST['nama_jurusan'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: jurusan");
    exit();
  }
}

$kalender_akademik = "SELECT * FROM kalender_akademik ORDER BY id DESC";
$views_kalender_akademik = mysqli_query($conn, $kalender_akademik);
if (isset($_POST["add_kalender_akademik"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (kalender_akademik($conn, $validated_post, $action = 'insert', $id_user) > 0) {
    $message = "Data kalender akademik baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: kalender-akademik");
    exit();
  }
}
if (isset($_POST["edit_kalender_akademik"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (kalender_akademik($conn, $validated_post, $action = 'update', $id_user) > 0) {
    $message = "Data kalender akademik " . $_POST['nama_kegiatan'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: kalender-akademik");
    exit();
  }
}
if (isset($_POST["delete_kalender_akademik"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (kalender_akademik($conn, $validated_post, $action = 'delete', $id_user) > 0) {
    $message = "Data kalender akademik " . $_POST['nama_kegiatan'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: kalender-akademik");
    exit();
  }
}
