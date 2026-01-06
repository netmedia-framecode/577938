<?php

require_once("../../config/Base.php");
require_once("../../config/Auth.php");
require_once("../../config/Alert.php");
require_once("../../views/berita/redirect.php");

$kategori_berita = "SELECT * FROM kategori_berita ORDER BY id DESC";
$views_kategori_berita = mysqli_query($conn, $kategori_berita);
if (isset($_POST["add_kategori_berita"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (kategori_berita($conn, $validated_post, $action = 'insert', $id_user) > 0) {
    $message = "Data rubrik baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: rubrik");
    exit();
  }
}
if (isset($_POST["edit_kategori_berita"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (kategori_berita($conn, $validated_post, $action = 'update', $id_user) > 0) {
    $message = "Data rubrik " . $_POST['nama_kategori'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: rubrik");
    exit();
  }
}
if (isset($_POST["delete_kategori_berita"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (kategori_berita($conn, $validated_post, $action = 'delete', $id_user) > 0) {
    $message = "Data rubrik " . $_POST['nama_kategori'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: rubrik");
    exit();
  }
}

$berita = "SELECT berita.*, kategori_berita.nama_kategori, users.name FROM berita JOIN kategori_berita ON berita.id_kategori = kategori_berita.id JOIN users ON berita.id_user = users.id_user ORDER BY berita.id DESC";
$views_berita = mysqli_query($conn, $berita);
if (isset($_POST["add_berita"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (berita($conn, $validated_post, $action = 'insert', $_POST['isi_berita'], $id_user) > 0) {
    $message = "Data berita baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: list-berita");
    exit();
  }
}
if (isset($_POST["edit_berita"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (berita($conn, $validated_post, $action = 'update', $_POST['isi_berita'], $id_user) > 0) {
    $message = "Data berita " . $_POST['judul'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: list-berita");
    exit();
  }
}
if (isset($_POST["delete_berita"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (berita($conn, $validated_post, $action = 'delete', null, $id_user) > 0) {
    $message = "Data berita " . $_POST['judul'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: list-berita");
    exit();
  }
}
