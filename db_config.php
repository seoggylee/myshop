<?php
    session_start();

    $servername = "localhost";
    $user = "root";
    $password = "whdal@1790";
    $connect = mysqli_connect($servername, $user, $password);

    if (!$connect) {
        die("서버와의 연결 실패! : ".mysqli_connect_error());
    }

    mysqli_query($connect, "set session character_set_connection=utf8;");
    mysqli_query($connect, "set session character_set_results=utf8;");
    mysqli_query($connect, "set session character_set_client=utf8;");

    $query = "USE webdev";
    $connect->query($query);

    // include './function.php';
?>