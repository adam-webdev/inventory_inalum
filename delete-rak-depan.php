<?php

session_start();
require_once('./config/database.php');

$id = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM rak_depan where id='$id'");

if ($query) {
  $_SESSION['hapus_sukses'] = true;
  echo "<script>
    $(document).ready(function(){
      window.location.href = 'index.php?page=rak-depan';
    </script>";
} else {
  $_SESSION['hapus_gagal'] = true;
  echo "<script>
    $(document).ready(function(){
      window.location.href = 'index.php?page=rak-depan';
    </script>";
}

header('location:index.php?page=rak-depan');
