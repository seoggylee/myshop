<?php

    function is_admin($connect, $session, $user_id, $passwd){  
        $admin = false;
        if(empty($session['admin'])){
            $admin = false;
        }
        else {
            if($session['admin'] == 'Y'){
                return true;
            }
            else {
                $admin = false;
            }
        }
        if(empty($user_id)){
            $admin = false;
        }
        if(empty($passwd)){
            $admin = false;
        }        
        $sql = 'select user_id from tbl_admin where user_id = ? and passwd = ?';
        $stmt = mysqli_prepare($connect, $sql);
        $stmt->bind_param('ss', $user_id, $passwd);
        // $stmt->bind_result($ias);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $admin = true;
        }
        return $admin;
    }

    function get_order_count($connect){
        $sql = "SELECT count(1) as comment_counter 
                FROM   tbl_order a,
                        tbl_user b
                WHERE a.user_idx = b.idx ";

        $row = mysqli_fetch_assoc($connect->query($sql));

        return $row['comment_counter'];
    }

    function get_order_list($connect, $page, $page_size){
        $sql = "SELECT a.idx,
                        a.total_price,
                        a.order_date,
                        b.name,
                        a.addr,
                        b.tel
                FROM   tbl_order a,
                        tbl_user b
                WHERE a.user_idx = b.idx 
                ORDER BY ORDER_date DESC      
                LIMIT ?, ?";

        $page = $page - 1;
        $page = $page * $page_size;
        $stmt = mysqli_prepare($connect, $sql);
        $stmt->bind_param('ss', $page, $page_size);
        // $stmt->bind_result($ias);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    function get_order_info($connect, $idx){
        $sql = 'SELECT a.idx, 
                        a.order_date,
                        a.total_price,
                        b.name,
                        a.addr                        
                FROM   tbl_order a,
                        tbl_user b
                WHERE  a.user_idx = b.idx
                AND    a.idx = ?';

        $stmt = mysqli_prepare($connect, $sql);
        $stmt->bind_param('s', $idx);
        // $stmt->bind_result($ias);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_assoc();

        return $result;
    }

    function get_order_goods_list($connect, $idx){
        $sql = "SELECT c.NAME, 
                        c.THUMBNAIL,
                        b.amount,
                        b.order_price
                FROM   tbl_order a, 
                        tbl_order_goods b,
                        tbl_goods c
                WHERE  a.idx = b.order_idx
                AND    b.goods_idx = c.idx
                AND    a.idx = ?";

        $stmt = mysqli_prepare($connect, $sql);
        $stmt->bind_param('s', $idx);
        // $stmt->bind_result($ias);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    function get_goods_count($connect){
        $sql = "SELECT count(1) as comment_counter 
                FROM   tbl_goods a,
                        tbl_company b
                WHERE a.company_idx = b.idx";

        $row = mysqli_fetch_assoc($connect->query($sql));

        return $row['comment_counter'];
    }

    function get_goods_list($connect, $page, $page_size){
        $sql = "SELECT a.idx, 
                        a.name,
                        a.thumbnail,
                        a.quantity,
                        a.price,
                        b.company_name
                FROM   tbl_goods a,
                        tbl_company b
                WHERE a.company_idx = b.idx   
                order by a.idx desc   
                LIMIT ?, ?";

        $page = $page - 1;
        $page = $page * $page_size;
        $stmt = mysqli_prepare($connect, $sql);
        $stmt->bind_param('ss', $page, $page_size);
        // $stmt->bind_result($ias);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    function get_goods_info($connect, $idx){
        $sql = "SELECT a.idx, 
                        a.name,
                        a.thumbnail,
                        a.quantity,
                        a.price,
                        b.company_name,
                        b.idx as company_idx
                FROM   tbl_goods a,
                        tbl_company b
                WHERE a.company_idx = b.idx
                AND   a.idx = ?";

        $stmt = mysqli_prepare($connect, $sql);
        $stmt->bind_param('s', $idx);
        // $stmt->bind_result($ias);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_assoc();

        return $result;
    }

    

    function get_user_list($connect, $page, $page_size){
        if($page_size == 0){
            $sql = " SELECT idx,
                            user_id,
                            passwd,
                            name,
                            birth,
                            addr,
                            tel,
                            grade,
                            point
                    FROM tbl_user
                    ORDER BY name asc";
        }
        else {
            $sql = "SELECT idx,
                            user_id,
                            passwd,
                            name,
                            birth,
                            addr,
                            tel,
                            grade,
                            point
                    FROM tbl_user
                    ORDER BY name asc
                    LIMIT ?, ?";
        }

        $page = $page - 1;
        $page = $page * $page_size;
        $stmt = mysqli_prepare($connect, $sql);
        if($page_size > 0){
            $stmt->bind_param('ss', $page, $page_size);
        }
        
        // $stmt->bind_result($ias);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    function get_user_count($connect){
        $sql = "SELECT count(1) as user_count 
                FROM   tbl_user a";

        $row = mysqli_fetch_assoc($connect->query($sql));

        return $row['user_count'];
    }

    function get_user_info($connect, $idx){
        $sql = "SELECT idx,
                        user_id,
                        passwd,
                        name,
                        birth,
                        addr,
                        tel,
                        grade,
                        point
                FROM tbl_user
                WHERE 1 = 1
                AND   idx = ?";

        $stmt = mysqli_prepare($connect, $sql);
        $stmt->bind_param('s', $idx);
        // $stmt->bind_result($ias);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_assoc();

        return $result;
    }

    function get_company_list($connect, $page, $page_size){
        if($page_size == 0){
            $sql = " SELECT idx,
                            company_name,
                            tel,
                            addr,
                            damdang
                    FROM tbl_company
                    ORDER BY company_name ASC";
        }
        else {
            $sql = "SELECT idx,
                            company_name,
                            tel,
                            addr,
                            damdang
                    FROM tbl_company
                    ORDER BY company_name ASC
                    LIMIT ?, ?";
        }

        $page = $page - 1;
        $page = $page * $page_size;
        $stmt = mysqli_prepare($connect, $sql);
        if($page_size > 0){
            $stmt->bind_param('ss', $page, $page_size);
        }
        
        // $stmt->bind_result($ias);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    function get_company_count($connect){
        $sql = "SELECT count(1) as company_count 
                FROM   tbl_company a";

        $row = mysqli_fetch_assoc($connect->query($sql));

        return $row['company_count'];
    }

    function get_company_info($connect, $idx){
        $sql = "SELECT idx,
                        company_name,
                        tel,
                        addr,
                        damdang
                FROM tbl_company
                WHERE 1 = 1
                AND   idx = ?";

        $stmt = mysqli_prepare($connect, $sql);
        $stmt->bind_param('s', $idx);
        // $stmt->bind_result($ias);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_assoc();

        return $result;
    }

    function get_board_list($connect, $page, $page_size){
        if($page_size == 0){
            $sql = " SELECT a.idx,
                            board_title,
                            board_contents,
                            b.name
                    FROM tbl_board a,
                         tbl_admin b
                    WHERE a.admin_idx = b.idx
                    ORDER BY a.idx DESC";
        }
        else {
            $sql = "SELECT a.idx,
                            board_title,
                            board_contents,
                            b.name
                    FROM tbl_board a,
                        tbl_admin b
                    WHERE a.admin_idx = b.idx
                    ORDER BY a.idx DESC
                    LIMIT ?, ?";
        }

        $page = $page - 1;
        $page = $page * $page_size;
        $stmt = mysqli_prepare($connect, $sql);
        if($page_size > 0){
            $stmt->bind_param('ss', $page, $page_size);
        }
        
        // $stmt->bind_result($ias);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    function get_board_count($connect){
        $sql = "SELECT count(1) as board_count 
                FROM   tbl_board a";

        $row = mysqli_fetch_assoc($connect->query($sql));

        return $row['board_count'];
    }

    function get_board_info($connect, $idx){
        $sql = "SELECT a.idx,
                        board_title,
                        board_contents,
                        b.name
                FROM tbl_board a,
                    tbl_admin b
                WHERE a.admin_idx = b.idx
                AND   a.idx = ?";

        $stmt = mysqli_prepare($connect, $sql);
        $stmt->bind_param('s', $idx);
        // $stmt->bind_result($ias);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_assoc();

        return $result;
    }

    function get_admin_idx($connect, $user_id){
        $sql = "SELECT idx FROM tbl_admin WHERE user_id = ?";
        $stmt = mysqli_prepare($connect, $sql);
        $stmt->bind_param('s', $user_id);

        return get_select_one($connect, $stmt);
        
    }

    function get_select_one($connect, $stmt){
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_assoc();

        return $result['idx'];
    }

    function get_last_insert_id($connect){
        $sql = "select LAST_INSERT_ID() as last_idx";
        $board_idx = mysqli_fetch_assoc($connect->query($sql));
        $idx = $board_idx['last_idx'];

        return $idx;
    }


?>