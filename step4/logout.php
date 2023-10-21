
<?php
    include '../db_config.php';
?>

<?php 
    unset( $_SESSION['user_info'] );
    header( 'Location: ./index.php');
?>