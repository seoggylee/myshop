<?php 
  $company_list = get_company_list($connect, 0, 0);
  if ( $_GET['mode'] == 'add'){
?>
<h2>상품정보</h2>
      <div class="row">
      <div class="col-lg-3">썸네일</div>
        <div class="col-lg-9"><img id="thumbname_img" src='../../img/no_image.jpg' style='width:300px;height:300px;'></div>

        <div class="col-lg-3">상품번호</div>
        <div class="col-lg-9"></div>

        <div class="col-lg-3">상품명</div>
        <div class="col-lg-9"><input type="text" class="form-control" name="name" value="" /></div>

        <div class="col-lg-3">재고수량</div>
        <div class="col-lg-9"><input type="text" class="form-control" name="quantity" value = "" /></div>

        <div class="col-lg-3">상품가격</div>
        <div class="col-lg-9"><input type="text" class="form-control" name="price" value = "" /></div>

        <div class="col-lg-3">공급업체명</div>
        <div class="col-lg-9">
        <select class="form-select" name="company_idx" id="company_idx">
            <?php 
            foreach( $company_list as $row ){
              echo "<option value='".$row["idx"]."'>".$row["company_name"]."</option>";
            }
            ?>
  </select>
        </div>
      </div>      
<?php     
  }
  else {
?>
  <h2>상품정보</h2>
      <div class="row">
      <div class="col-lg-3">썸네일</div>
        <div class="col-lg-9"><img id="thumbname_img" src='../../img/no_image.jpg' style='width:300px;height:300px;'></div>

        <div class="col-lg-3">상품번호</div>
        <div class="col-lg-9"></div>

        <div class="col-lg-3">상품명</div>
        <div class="col-lg-9"><input type="text" name="name" value="<?php echo $row['name'] ?>" /></div>

        <div class="col-lg-3">재고수량</div>
        <div class="col-lg-9"><input type="text" name="quantity" value = "<?php echo $row['quantity'] ?>" /></div>

        <div class="col-lg-3">상품가격</div>
        <div class="col-lg-9"><input type="text" name="price" value = "<?php echo $row['price'] ?>" /></div>

        <div class="col-lg-3">공급업체명</div>
        <div class="col-lg-9"><?php echo $row['company_name'] ?></div>
      </div>      
<?php
  }
?>

