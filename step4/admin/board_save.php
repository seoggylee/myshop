<?php
include '../../db_config.php';
include './admin.php';
header('Content-Type: application/json; charset=utf-8');
$response = array();
try {
  $idx = $_POST['idx'];
  $sql = "";
  if ( $idx == ""){    
    $board_title = $_POST['board_title'];
    $board_contents = $_POST['board_contents'];
    $admin_idx = get_admin_idx($connect, $_SESSION['user_id']);
    $sql = "INSERT INTO tbl_board (board_title, board_contents, admin_idx) 
            VALUES (?, ?, ?);";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'sss', $board_title, $board_contents, $admin_idx);
    $stmt->execute();

    $idx = get_last_insert_id($connect);
  } else {
    $idx = $_POST['idx'];
    $board_title = $_POST['board_title'];
    $board_contents = $_POST['board_contents'];
    $admin_idx = get_admin_idx($connect, $_SESSION['user_id']);
    $sql = "UPDATE tbl_board 
            SET board_title = ?,
            board_contents = ?,
            admin_idx = ?
            WHERE idx = ?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'ssss', $board_title, $board_contents, $admin_idx, $idx);
    $stmt->execute();
  }
  

  $response = array(
    "status" => "success",
    "error" => false,
    "message" => "Save successfully",
    "query" => $sql,
    "idx" => $idx
  );
  echo json_encode($response);

} catch (RuntimeException $e) {
  $response = array(
    "status" => "error",
    "error" => true,
    "message" => $e->getMessage(),
    "query" => $sql,
    "idx" => $idx
  );
  echo json_encode($response);
}