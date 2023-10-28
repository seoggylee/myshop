<!doctype html>
<html lang="en" data-bs-theme="auto">
<?php
    include '../../db_config.php';
    include './admin.php';

    $admin = is_admin($connect, $_SESSION, null, null);
    if($admin == false){
        header( 'Location: ./login.php' );
    }

    $page = 1;
    if(!empty($_GET['page'])){
        $page = $_GET['page'];
    }

    $page_size = 3;
    if(!empty($_GET['page_size'])){
        $page = $_GET['page_size'];
    }    

    $count = get_board_count($connect);
    $list = get_board_list($connect, $page, $page_size);
?>
  <head><script src="../../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Dashboard Template · Bootstrap v5.3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../../assets/dist/css/admin.css" rel="stylesheet">

    
    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    <?php include './header.php' ?>

<div class="container-fluid">
  <div class="row">
    <?php include 'nav.php'; ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
            <svg class="bi"><use xlink:href="#calendar3"/></svg>
            This week
          </button>
        </div>
      </div>

      <h2>게시판 목록</h2>
      <div class="row">
        <div class="col-lg-10">
    </div>
    <div class="col-lg-2 text-end">
    <button type="button" class="btn btn-primary" id="btnAdd">추가</button>
    </div>
    </div>
      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">게시물번호</th>
              <th scope="col">타이틀</th>
              <th scope="col">작성자</th>
            </tr>
          </thead>
          <tbody>
            <?php             
            foreach($list as $row){
                $link = './board_detail.php?mode=view&page='.$page.'&idx='.$row['idx'];
                ?>
            <tr>
              <td><a href="<?php echo $link ?>"><?php echo $row['idx']; ?></a></td>
              <td><?php echo $row['board_title']; ?></td>
              <td><?php echo $row['name']; ?></td>
            </tr>
                <?php                
            }
            ?>

          </tbody>
        </table>
      </div>
      <div class="row">
      <div class="col-lg-12">
      <nav aria-label="Page navigation example">
  <ul class="pagination">
    <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li>     -->
        <?php

        $total_count = $count;
        $max_page = ceil($total_count / $page_size);

        for($i = 1 ; $i < $max_page + 1 ; $i++){
            if( $i == $page ){
                echo '<li class="page-item"><a class="page-link" href="#">'.$i.'</a></li>';
            } 
            else {
                echo '<li class="page-item"><a class="page-link" href="./board.php?page='.$i.'">'.$i.'</a></li>';
            }
            
        }

        ?>
        <!-- <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
  </ul>
</nav>
      </div>
        </div>
    </main>
  </div>
</div>
<script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script>

<script type="text/javascript">
    document.getElementById("btnAdd").addEventListener("click", function(){
        location.href = './board_detail.php?mode=add';
    });
</script>
</body>
</html>
