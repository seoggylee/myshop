<?php
  header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>HTML !DOCTYPE declaration</title>
</head>
<body>
    
<?php
    include 'db_config.php';
?>

<?php
    $sql = 'select idx, NAME, quantity, price from tbl_goods';
    foreach ($connect->query($sql) as $row) {
        print $row['idx'] . "<br>";
        print $row['NAME'] . "<br>";
        print $row['quantity'] . "<br>";
        print $row['price'] . "<br>";
    }
?>
</body>
</html>