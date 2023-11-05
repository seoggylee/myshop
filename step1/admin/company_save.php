 <?php
include '../../db_config.php';
header('Content-Type: application/json; charset=utf-8');
$response = array();
try {
  $idx = $_POST['idx'];
  $sql = "";
  if ( $idx == ""){    
    $company_name = $_POST['company_name'];
    $addr = $_POST['addr'];
    $tel = $_POST['tel'];
    $damdang = $_POST['damdang'];
    $sql = "INSERT INTO tbl_company (company_name, addr, tel, damdang) 
            VALUES (?, ?, ?, ?);";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'ssss', $company_name, $addr, $tel, $damdang);
    $stmt->execute();
	
	$sql = "select LAST_INSERT_ID() as last_idx";
	$board_idx = mysqli_fetch_assoc($connect->query($sql));
	$idx = $board_idx['last_idx'];
  } else {
    $idx = $_POST['idx'];
    $company_name = $_POST['company_name'];
    $addr = $_POST['addr'];
    $tel = $_POST['tel'];
    $damdang = $_POST['damdang'];
    $sql = "UPDATE tbl_company 
            SET company_name = ?,
            addr = ?,
            tel = ?,
            damdang = ?
            WHERE idx = ?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'sssss', $company_name, $addr, $tel, $damdang, $idx);
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