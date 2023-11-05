<?php

	function get_order_total_count($connect){
		$sql = "SELECT count(1) as comment_counter 
				FROM   tbl_order a,
						tbl_user b
				WHERE a.user_idx = b.idx ";

		$row = mysqli_fetch_assoc($connect->query($sql));

		$total_count = $row['comment_counter'];
		
		return $total_count;
	}
	
	function get_order_list($connect, $page, $page_size){		
		$sql = "SELECT tord.idx,
					   tord.order_date,
					   tu.name,
					   tord.addr,
					   tu.tel
				FROM   tbl_order tord,
					   tbl_user tu
				WHERE  tord.user_idx = tu.idx
				ORDER BY tord.order_date desc
				LIMIT  ?, ?";
				
		$stmt = mysqli_prepare($connect, $sql);
		$stmt->bind_param('ss', $page, $page_size);
		// $stmt->bind_result($ias);
		$stmt->execute();
		$list = $stmt->get_result();
		
		return $list;
	}
	
	function get_user_total_count($connect){
		$sql = "SELECT count(1) as comment_counter 
				FROM   tbl_user b ";

		$row = mysqli_fetch_assoc($connect->query($sql));

		$total_count = $row['comment_counter'];
		
		return $total_count;
	}
	
	function get_user_list($connect, $page, $page_size){		
		$sql = "SELECT idx,
		               name,
					   addr,
					   tel,
					   user_id,
					   grade,
					   point
				FROM   tbl_user tu
				LIMIT  ?, ?";
				
		$stmt = mysqli_prepare($connect, $sql);
		$stmt->bind_param('ss', $page, $page_size);
		// $stmt->bind_result($ias);
		$stmt->execute();
		$list = $stmt->get_result();
		
		return $list;
	}
	
	function get_company_total_count($connect){
		$sql = "SELECT count(1) as comment_counter 
				FROM   tbl_company b ";

		$row = mysqli_fetch_assoc($connect->query($sql));

		$total_count = $row['comment_counter'];
		
		return $total_count;
	}
	
	function get_company_list($connect, $page, $page_size){		
		$sql = "SELECT idx,
		               company_name,
					   tel,
					   damdang
				FROM   tbl_company tu
				LIMIT  ?, ?";
				
		$stmt = mysqli_prepare($connect, $sql);
		$stmt->bind_param('ss', $page, $page_size);
		// $stmt->bind_result($ias);
		$stmt->execute();
		$list = $stmt->get_result();
		
		return $list;
	}
	
	function get_goods_total_count($connect){
		$sql = "SELECT count(1) as comment_counter 
				FROM   tbl_goods b ";

		$row = mysqli_fetch_assoc($connect->query($sql));

		$total_count = $row['comment_counter'];
		
		return $total_count;
	}
	
	function get_goods_list($connect, $page, $page_size){		
		$sql = "SELECT tu.idx,
					   tu.name,
						tu.quantity,
						tu.price,
						tc.company_name
				FROM   tbl_goods tu,
					   tbl_company tc 
				WHERE tu.company_idx = tc.idx
				LIMIT  ?, ?";
				
		$stmt = mysqli_prepare($connect, $sql);
		$stmt->bind_param('ss', $page, $page_size);
		// $stmt->bind_result($ias);
		$stmt->execute();
		$list = $stmt->get_result();
		
		return $list;
	}
	
	
	function get_board_total_count($connect){
		$sql = "SELECT count(1) as comment_counter 
				FROM   tbl_board b ";

		$row = mysqli_fetch_assoc($connect->query($sql));

		$total_count = $row['comment_counter'];
		
		return $total_count;
	}
	
	function get_board_list($connect, $page, $page_size){		
		$sql = "SELECT tb.idx, 
		               tb.board_title,
					   ta.name
				FROM   tbl_board tb, 
					   tbl_admin ta
				WHERE tb.admin_idx = ta.idx
				LIMIT  ?, ?";
				
		$stmt = mysqli_prepare($connect, $sql);
		$stmt->bind_param('ss', $page, $page_size);
		// $stmt->bind_result($ias);
		$stmt->execute();
		$list = $stmt->get_result();
		
		return $list;
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