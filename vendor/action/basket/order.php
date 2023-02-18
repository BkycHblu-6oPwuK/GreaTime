<?php
session_start();
include '../../components/connect.php';
if(isset($_POST['zakas'])){
    header("Location: ../../../making_order.php");
}
?>