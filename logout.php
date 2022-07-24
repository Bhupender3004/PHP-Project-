<?php
session_start();
session_destroy();
header("location:index.php");
$con -> conn_close();
?>