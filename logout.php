<?php
session_start();
session_destroy();
header('Location:marchandises.php');
exit();
?>