<?php
    include '../db_config.php';
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
    'tel' => $_POST['tel']
);


$sql = "INSERT INTO tbl_user (user_id, name, birth, passwd, tel) values ('".$tbl_user['user_id']."', '".$tbl_user['name']."', '".$tbl_user['birth']."', '".$tbl_user['passwd']."', '".$tbl_user['tel']."')";

try{
    if ($connect->query($sql) === TRUE) {
        echo "New record created successfully";
?>
<script type='text/javascript'>
    alert('회원가입이 완료되었습니다.');
    location.href = './login.php';
    </script>
<?php
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
}
catch(Exception $e)
{
    $s = $e->getMessage() . ' (오류코드:' . $e->getCode() . ')';
    echo $s;
}

?>
