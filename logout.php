<?php
session_start();
if(isset($_SESSION['id_user'])){
    session_destroy();
    echo "<script> location.href ='/'; </script>";
}
?>