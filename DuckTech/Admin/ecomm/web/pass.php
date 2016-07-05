<?php 
session_start();
$_SESSION['ProductoID'] = $_POST['idproducto'];
 echo "<script language='javascript'>  window.location.href='preview.html';</script>";
?>