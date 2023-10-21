<?php
    include '../db_config.php';
    include '../function.php'
?>

<?php

// echo 'start';
// print_r(array_keys($_POST)) ;
// foreach($_POST as $key=>$value)
// {
//   echo "$key=$value";
// }
// echo 'end';

$tbl_user = array(
    'user_id' => $_POST['email'],
    'name' => $_POST['username'],
    'birth' => $_POST['yyyy'].$_POST['mm'].$_POST['dd'],
    'passwd' => $_POST['passwd'],
    'addr' => $_POST['addr'],
    'tel' => $_POST['tel']
);

$result = insert_user($connect, $tbl_user);

if ($result == 'success'){
?>
    <script type='text/javascript'>
        alert('회원가입이 완료되었습니다.');
        location.href = './login.php';
        </script>
    <?php
}
else {
    echo $result;
}
?>
