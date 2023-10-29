<?php
	 // POST방식 전송 redirect 함수
     function redir_post($redir_url, $redir_values_array){
        echo("<form name='redir_form' action='$redir_url' method='post'>");
        foreach ($redir_values_array as $key => $value) {
            echo("<input type='hidden' name='$key' value='$value'>");
        }
        echo("</form> ");
        echo "<script language='javascript'> document.redir_form.submit(); </script>";
    }

    function get_goods($connect, $idx){
        $sql = "SELECT a.idx, 
                       a.NAME, 
                       a.THUMBNAIL, 
                       a.quantity, 
                       a.price, 
                       b.company_name
                FROM   tbl_goods a, 
                    tbl_company b
                WHERE  a.company_idx = b.idx
                AND    a.idx = ".$idx;

        $row = mysqli_fetch_assoc($connect->query($sql));

        return $row;
    }

    function get_order($connect, $idx){
        $sql = "SELECT * 
                FROM tbl_order a,
                    tbl_order_goods b,
                    tbl_goods c
                WHERE a.idx = b.order_idx
                AND   b.goods_idx = c.idx
                AND   a.idx = ".$idx;
      
        $result = $connect->query($sql);

        return $result;
    }

    function insert_user($connect, $tbl_user){

        $sql = "INSERT INTO tbl_user 
                            (user_id, name, birth, passwd, addr, tel) 
                values ('".$tbl_user['user_id']."', '".$tbl_user['name']."', '".$tbl_user['birth']."', '".$tbl_user['passwd']."', '".$tbl_user['addr']."', '".$tbl_user['tel']."')";

        try{
            if ($connect->query($sql) === TRUE) {
                echo "New record created successfully";
                return 'success';
            } else {
                return "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        catch(Exception $e)
        {
            $s = $e->getMessage() . ' (오류코드:' . $e->getCode() . ')';
            return $s;
        }

    }

    function check_email($connect, $email){
        // http://localhost/myshop/step3/join_dup_check.php?email=ccc@gmail.com
        $sql = "SELECT user_id 
                FROM tbl_user 
                WHERE user_id = '".$email."'";

        // echo $sql;

        $result = $connect->query($sql);
        return mysqli_num_rows($result);
    }

    function insert_jjim($connect, $goods_idx, $user_idx){
        $sql = 'INSERT INTO tbl_jjim (user_idx, goods_idx) 
                values (?, ?) ON DUPLICATE KEY UPDATE jjim_date = now()';
        $stmt = mysqli_prepare($connect, $sql);
        mysqli_stmt_bind_param($stmt, 'ss', $user_idx, $goods_idx);
        $stmt->execute();

        return true;
    }

    function get_jjim_list($connect, $user_idx){
        // echo $user_idx;
        $sql = 'SELECT b.idx, 
                b.NAME,
                b.THUMBNAIL,
                b.quantity,
                b.price
        FROM   tbl_jjim a, 
                tbl_goods b
        WHERE a.goods_idx = b.IDX
        AND   a.user_idx = ?';
        $stmt = mysqli_prepare($connect, $sql);
        $stmt->bind_param('s', $user_idx);
        // $stmt->bind_result($ias);
        $stmt->execute();
        $result = $stmt->get_result();

        // print_r($result);
        return $result;
    }
?>