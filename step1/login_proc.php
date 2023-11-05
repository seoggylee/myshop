<?php
    include '../db_config.php';
?>

<?php
    $user_id = $_POST['user_id'];
    $passwd = $_POST['passwd'];
	$loc = $_POST['loc'];
	$referer = $_POST['referer'];

    $sql = "select * 
	        from   tbl_user 
			where  user_id = '".$user_id."' 
			and    passwd = '".$passwd."'";
    // echo $sql;

    $row = mysqli_fetch_assoc($connect->query($sql));

    if(empty($row)){
        header( 'Location: ./login_error.php' );
    } else {
        // echo $row['idx'];
        $_SESSION["user_info"] = array(
            "idx" => $row['idx'],
            "user_id" => $row['user_id'],
			"addr" => $row['addr'],
            'name' => $row['name'],
            'grade' => $row['grade'],
            'point' => $row['point']
        );

		if ($loc == 'cart'){
			header( 'Location: ./cart.php' );
		} else {
			if( $referer != "") {
				header( 'Location: '.$referer );
			} else {
				header( 'Location: ./index.php' );
			}
			
			
		}
        

    }
?>