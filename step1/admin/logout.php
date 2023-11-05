
<?php
    include '../../db_config.php';
?>

<?php 
    unset( $_SESSION['admin'] );
    unset( $_SESSION['user_id'] );
    header( 'Location: ./index.php');
?>