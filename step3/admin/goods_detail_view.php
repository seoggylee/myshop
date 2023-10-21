  <?php $row = get_goods_info($connect, $_GET['idx']); ?>
      <h2>상품정보</h2>
      <div class="row">
      <div class="col-lg-3">썸네일</div>
        <div class="col-lg-9"><img id="thumbname_img" src='../../img/<?php echo $row['thumbnail'] ?>' style='width:300px;height:300px;'></div>

        <div class="col-lg-3">상품번호</div>
        <div class="col-lg-9"><?php echo $row['idx'] ?></div>

        <div class="col-lg-3">상품명</div>
        <div class="col-lg-9"><?php echo $row['name'] ?></div>

        <div class="col-lg-3">재고수량</div>
        <div class="col-lg-9"><?php echo $row['quantity'] ?></div>

        <div class="col-lg-3">상품가격</div>
        <div class="col-lg-9"><?php echo $row['price'] ?></div>

        <div class="col-lg-3">공급업체명</div>
        <div class="col-lg-9"><?php echo $row['company_name'] ?></div>
      </div>      