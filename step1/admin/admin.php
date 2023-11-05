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

?>