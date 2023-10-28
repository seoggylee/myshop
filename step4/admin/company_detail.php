<!doctype html>
<html lang="ko" data-bs-theme="auto">
<?php
    include '../../db_config.php';
    include './admin.php';

    $admin = is_admin($connect, $_SESSION, null, null);
    if($admin == false){
        header( 'Location: ./login.php' );
    }
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
      <form method="POST" action="upload.php" id="profileData" enctype="multipart/form-data">
      <?php 
  $company_list = get_company_list($connect, 0, 0);
  $idx = "";
  if ( $_GET['mode'] == 'add'){
?>
<h2>상품정보</h2>
      <div class="row">
        <div class="col-lg-3">업체번호</div>
        <div class="col-lg-9"></div>

        <div class="col-lg-3">업체명</div>
        <div class="col-lg-9"><input type="text" class="form-control" name="company_name" value="" /></div>

        <div class="col-lg-3">주소</div>
        <div class="col-lg-9"><input type="text" class="form-control" name="addr" value = "" /></div>

        <div class="col-lg-3">전화번호</div>
        <div class="col-lg-9"><input type="text" class="form-control" name="tel" value = "" /></div>

        <div class="col-lg-3">담당자명</div>
        <div class="col-lg-9"><input type="text" class="form-control" name="damdang" value = "" /></div>
      </div>      
<?php     
  }
  else {
    $idx = $_GET['idx'];
    $row = get_company_info($connect, $_GET['idx']);
?>
  <h2>업체정보</h2>
      <div class="row">

        <div class="col-lg-3">업체번호</div>
        <div class="col-lg-9"><?php echo $row["idx"] ?></div>

        <div class="col-lg-3">업체명</div>
        <div class="col-lg-9"><input type="text" class="form-control" name="company_name" value="<?php echo $row['company_name'] ?>" /></div>

        <div class="col-lg-3">주소</div>
        <div class="col-lg-9"><input type="text" class="form-control" name="addr" value = "<?php echo $row['addr'] ?>" /></div>

        <div class="col-lg-3">전화번호</div>
        <div class="col-lg-9"><input type="text" class="form-control" name="tel" value = "<?php echo $row['tel'] ?>" /></div>

        <div class="col-lg-3">담당자명</div>
        <div class="col-lg-9"><input type="text" class="form-control" name="damdang" value = "<?php echo $row['damdang'] ?>" /></div>
      </div>      
<?php
  }
?>



        <input type="hidden" name="idx" value="<?php echo $idx ?>" />
  <div class="form-group">
    <button type="button" id="submit" class="btn btn-outline-primary">Save</button>
  </div>
</form>
    </main>
  </div>
</div>
<script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  
    <script type="text/javascript">
      const button = document.querySelector('#submit');

      button.addEventListener('click', () => {
        const form = new FormData(document.querySelector('#profileData'));
        for (let key of form.keys()) {
          console.log(key);
        }
        for (let value of form.values()) {
          console.log(value);
        }
        const url = './company_save.php'
        const request = new Request(url, {
          method: 'POST',
          body: form
        });

        fetch(request)
          .then(response => response.json())
          .then(data => {
            console.log(data.status);
            console.log(data.query);
            alert("저장되었습니다.");
          })
      });
    </script>
    
  </body>
</html>
