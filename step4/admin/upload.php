<?php
include '../../db_config.php';
header('Content-Type: application/json; charset=utf-8');
$response = array();
try {
  
  // Undefined | Multiple Files | $_FILES Corruption Attack
  // If this request falls under any of them, treat it invalid.
  if (
    !isset($_FILES['upfile']['error']) ||
    is_array($_FILES['upfile']['error'])
  ) {
    throw new RuntimeException('Invalid parameters.');
  }

  // Check $_FILES['upfile']['error'] value.
  switch ($_FILES['upfile']['error']) {
    case UPLOAD_ERR_OK:
      break;
    case UPLOAD_ERR_NO_FILE:
      throw new RuntimeException('No file sent.');
    case UPLOAD_ERR_INI_SIZE:
    case UPLOAD_ERR_FORM_SIZE:
      throw new RuntimeException('Exceeded filesize limit.');
    default:
      throw new RuntimeException('Unknown errors.');
  }

  // You should also check filesize here. 
  if ($_FILES['upfile']['size'] > 1000000) {
    throw new RuntimeException('Exceeded filesize limit.');
  }

  // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
  // Check MIME Type by yourself.
  $finfo = new finfo(FILEINFO_MIME_TYPE);
  if (false === $ext = array_search(
    $finfo->file($_FILES['upfile']['tmp_name']),
    array(
      'jpg' => 'image/jpeg',
      'png' => 'image/png',
      'gif' => 'image/gif',
    ),
    true
  )) {
    throw new RuntimeException('Invalid file format.');
  }

  // You should name it uniquely.
  // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
  // On this example, obtain safe unique name from its binary data.
  $thumbnail = sprintf('thumb_%s.%s',  time(),  $ext);
  if (!move_uploaded_file(
    $_FILES['upfile']['tmp_name'],
    sprintf('../../img/%s',  $thumbnail)
  )) {
    throw new RuntimeException('Failed to move uploaded file.');
  }

  $idx = $_POST['idx'];
  $sql = "";
  if ( $idx == ""){    
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $company_idx = $_POST['company_idx'];
    $sql = "INSERT INTO tbl_goods (NAME, THUMBNAIL, quantity, price, company_idx) 
            VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'sssss', $name, $thumbnail, $quantity, $price, $company_idx);
    $stmt->execute();
  } else {
    $idx = $_POST['idx'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $company_idx = $_POST['company_idx'];
    $sql = "UPDATE tbl_goods 
            SET thumbnail = ?,
                name = ?,
                quantity = ?,
                price = ?,
                company_idx = ?
            WHERE idx = ?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'ssssss', $thumbnail, $name, $quantity, $price, $company_idx, $idx);
    $stmt->execute();
  }
  

  $response = array(
    "status" => "success",
    "error" => false,
    "message" => "File uploaded successfully",
    "query" => $sql,
    "thumbnail" => $thumbnail,
    "idx" => $idx
  );
  echo json_encode($response);

} catch (RuntimeException $e) {
  $response = array(
    "status" => "error",
    "error" => true,
    "message" => $e->getMessage(),
    "query" => $sql,
    "thumbnail" => $thumbnail,
    "idx" => $idx
  );
  echo json_encode($response);
}