<?php
    include '../db_config.php';
    include '../function.php';
?>

<?php
    if(empty($_SESSION['user_info'])){
?>
<script type="text/javascript">
alert('로그인후 주문이 가능합니다. 로그인 창으로 이동하겠습니다. ');
location.href = './login.php?loc=cart';
</script>
<?php
	  // header( 'Location: ./login.php' );
	}
    // echo count($_POST['idx']);

    $total_price = 0;
    $addr = $_SESSION["user_info"]['addr'];
    for($i = 0 ; $i < count($_POST['idx']) ; $i++){
        // echo $_POST['idx'][$i];
        // echo $_POST['amount'][$i];
        $total_price = $total_price + $_POST['price'][$i] * $_POST['amount'][$i];
    }

    // echo $total_price;

    $sql = "INSERT INTO tbl_order (user_idx, addr, total_price) values (".$_SESSION["user_info"]['idx'].", '".$addr."', ".$total_price.")";

    $connect->query($sql);

    $sql = "select LAST_INSERT_ID() as order_idx";

    $order_idx = mysqli_fetch_assoc($connect->query($sql));
    // echo($order_idx['order_idx']) ;


    for($i = 0 ; $i < count($_POST['idx']) ; $i++){
        $sql = "INSERT INTO tbl_order_goods (goods_idx, order_idx, amount, order_price) values (".$_POST['idx'][$i].", ".$order_idx['order_idx'].", ".$_POST['amount'][$i].", ".$_POST['price'][$i].")";

        echo $sql;

        $connect->query($sql);
        echo $_POST['idx'][$i];
        echo $_POST['amount'][$i];
        $total_price = $total_price + $_POST['price'][$i] * $_POST['amount'][$i];

        $sql = "UPDATE tbl_goods SET quantity = quantity - ".$_POST['amount'][$i]." WHERE idx = ".$_POST['idx'][$i];
        echo $sql;

        $connect->query($sql);
    }

    // 장바구니 삭제
    unset($_SESSION["shopping_cart"]);

    // header( 'Location: ./order.php' );

    // 같은 클래스 내에서 호출 사용 예
    $url = './order.php';
    $values_array = array(
        'order_idx'	=> $order_idx['order_idx']
     );
     redir_post($url, $values_array);
?>