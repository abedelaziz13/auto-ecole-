<?php 
require 'connect.php';
include 'nav.php'; 


$id = $_GET['id'];

  $stmt_delete = $connect->prepare("UPDATE `malade` SET `ACTIF`=0 WHERE `id_malade` =". $id);
  $stmt_delete->execute();

  if (isset($stmt_delete)) {
    header("Location: operation.php");
  }
  



 ?>