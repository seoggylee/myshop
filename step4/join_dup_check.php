<?php
    include '../db_config.php';
    include '../function.php'
?><?php
    $count = check_email($connect, $_GET['email']);
    $result['success'] = true;
    $result['count'] = $count;
    // echo json_encode($result, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    echo $count;
?>