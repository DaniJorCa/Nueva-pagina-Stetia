<?php
if (!isset($_SESSION)) {
    session_start();
}

if(!$_SESSION['check_log']){
    header('Location: index.php');
    exit();
}    
?>