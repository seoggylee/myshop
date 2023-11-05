<?php
    include '../db_config.php';
    include '../function.php'
?><?php
    $count = check_email($connect, $_GET['email']);
    echo $count;
?>