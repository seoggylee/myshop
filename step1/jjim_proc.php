<?php
    include '../db_config.php';
    include '../function.php';

    // http://localhost/myshop_test/step1/jjim_proc.php?goods_idx=10000001

    

    $result = insert_jjim($connect, $_GET['goods_idx'], $_SESSION["user_info"]['idx']);

    if($result == true){
        echo 'true';
    }
    else {
        echo 'false';
    }
?>