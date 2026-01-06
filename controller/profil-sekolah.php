<?php

require_once("../../config/Base.php");
require_once("../../config/Auth.php");
require_once("../../config/Alert.php");
require_once("../../views/profil-sekolah/redirect.php");

$sejarah = "SELECT * FROM sejarah ORDER BY id DESC";
$views_sejarah = mysqli_query($conn, $sejarah);
if (isset($_POST["add_sejarah"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (sejarah($conn, $validated_post, $action = 'insert', $konten = $_POST['konten'], $id_user) > 0) {
    $message = "Data sejarah baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: sejarah");
    exit();
  }
}
if (isset($_POST["edit_sejarah"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (sejarah($conn, $validated_post, $action = 'update', $konten = $_POST['konten'], $id_user) > 0) {
    $message = "Data sejarah berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: sejarah");
    exit();
  }
}
if (isset($_POST["delete_sejarah"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (sejarah($conn, $validated_post, $action = 'delete', $konten = null, $id_user) > 0) {
    $message = "Data sejarah berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: sejarah");
    exit();
  }
}

$visi_misi = "SELECT * FROM visi_misi ORDER BY id DESC";
$views_visi_misi = mysqli_query($conn, $visi_misi);
if (isset($_POST["add_visi_misi"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (visi_misi($conn, $validated_post, $action = 'insert', $visi = $_POST['visi'], $misi = $_POST['misi'], $tujuan_sekolah = $_POST['tujuan_sekolah'], $id_user) > 0) {
    $message = "Data visi misi baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: visi-&-misi");
    exit();
  }
}
if (isset($_POST["edit_visi_misi"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (visi_misi($conn, $validated_post, $action = 'update', $visi = $_POST['visi'], $misi = $_POST['misi'], $tujuan_sekolah = $_POST['tujuan_sekolah'], $id_user) > 0) {
    $message = "Data visi misi berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: visi-&-misi");
    exit();
  }
}
if (isset($_POST["delete_visi_misi"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (visi_misi($conn, $validated_post, $action = 'delete', $visi = null, $misi = null, $tujuan_sekolah = null, $id_user) > 0) {
    $message = "Data visi misi berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: visi-&-misi");
    exit();
  }
}

$query_kepsek = mysqli_query($conn, "SELECT * FROM guru_staff WHERE urutan = 1 LIMIT 1");
$kepsek = mysqli_fetch_assoc($query_kepsek);
$query_wakil = mysqli_query($conn, "SELECT * FROM guru_staff WHERE urutan = 2 OR urutan = 3 ORDER BY urutan ASC");
$query_guru = mysqli_query($conn, "SELECT * FROM guru_staff WHERE urutan = 4 ORDER BY urutan ASC");
if (isset($_POST["add_guru_staff"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (guru_staff($conn, $validated_post, $action = 'insert', $id_user) > 0) {
    $message = "Data struktur organisasi baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: struktur-organisasi");
    exit();
  }
}
if (isset($_POST["edit_guru_staff"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (guru_staff($conn, $validated_post, $action = 'update', $id_user) > 0) {
    $message = "Data struktur organisasi berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: struktur-organisasi");
    exit();
  }
}
if (isset($_POST["delete_guru_staff"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (guru_staff($conn, $validated_post, $action = 'delete', $id_user) > 0) {
    $message = "Data struktur organisasi berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: struktur-organisasi");
    exit();
  }
}

$fasilitas = "SELECT * FROM fasilitas ORDER BY id DESC";
$views_fasilitas = mysqli_query($conn, $fasilitas);
if (isset($_POST["add_fasilitas"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (fasilitas($conn, $validated_post, $action = 'insert', $deskripsi = $_POST['deskripsi'], $id_user) > 0) {
    $message = "Data fasilitas baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: fasilitas");
    exit();
  }
}
if (isset($_POST["edit_fasilitas"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (fasilitas($conn, $validated_post, $action = 'update', $deskripsi = $_POST['deskripsi'], $id_user) > 0) {
    $message = "Data fasilitas " . $_POST['nama_fasilitas'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: fasilitas");
    exit();
  }
}
if (isset($_POST["delete_fasilitas"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (fasilitas($conn, $validated_post, $action = 'delete', $deskripsi = null, $id_user) > 0) {
    $message = "Data fasilitas " . $_POST['nama_fasilitas'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: fasilitas");
    exit();
  }
}
