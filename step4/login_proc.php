<?php
    include '../db_config.php';
?>

<?php

    $user_id = $_POST['user_id'];
    $passwd = $_POST['passwd'];

    $sql = "select * from tbl_user where user_id = '".$user_id."' and passwd = '".$passwd."'";
    echo $sql;


    $row = mysqli_fetch_assoc($connect->query($sql));

    if(empty($row)){
        header( 'Location: ./login_error.php' );
    } else {
        // echo $row['idx'];
        $_SESSION["user_info"] = array(
            "idx" => $row['idx'],
            "user_id" => $row['user_id'],
            'name' => $row['name'],
            'grade' => $row['grade'],
            'point' => $row['point']
        );

        header( 'Location: ./index.php' );

    }

    
?>