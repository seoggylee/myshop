<?php

    include '../../db_config.php';
    include './admin.php';

    $user_id = $_POST['user_id'];
    $passwd = $_POST['passwd'];

    echo $user_id;
    echo $passwd;

    $admin = is_admin($connect, $_SESSION, $user_id, $passwd);

    if ($admin == true){
        $_SESSION['admin'] = "Y";
        $_SESSION['user_id'] = $user_id;
?>
<script type="text/javascript">
    location.href = './index.php';
    </script>
<?php
    }
    else {
?>
<script type="text/javascript">
    location.href = './login.php';
    </script>
<?php
    }
?>