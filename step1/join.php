<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Checkout example · Bootstrap v5.3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/checkout/">

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="checkout.css" rel="stylesheet">
  </head>
  <body class="bg-body-tertiary">
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
      <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
              id="bd-theme"
              type="button"
              aria-expanded="false"
              data-bs-toggle="dropdown"
              aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#circle-half"></use></svg>
            Auto
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
      </ul>
    </div>

    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
      <h2>회원가입</h2>
      <p class="lead">회원가입을 위해 아래 항목을 적어주세요.</p>
    </div>

    <div class="row">
      <div class="col-md-12 col-lg-12">
        <h4 class="mb-3">회원정보</h4>
        <form class="needs-validation" novalidate action='./join_proc.php' method='post' id="frmJoin">
          <input type="hidden" name="checkEmail" id="checkEmail" value="1">
          <div class="row g-3">
          <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-body-secondary"></span></label>
              <div class="input-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" required>
              <button class="btn btn-outline-secondary" type="button" id='btnDup'>중복확인</button>
    </div>
              <div class="invalid-feedback">
                이메일주소는 필수입력 항목입니다.
              </div>
            </div>
            <!-- <div class="col-4">
            <button class="w-100 btn btn-primary btn-lg" type="submit" id='btnJoin'>중복확인</button> -->
    <!-- </div> -->

            <div class="col-12">
              <label for="passwd" class="form-label">비밀번호 <span class="text-body-secondary"></span></label>
              <input type="password" class="form-control" name="passwd" id="passwd" required>
              <div class="invalid-feedback">
                비밀번호는 필수입력 항목입니다.
              </div>
            </div>

            <div class="col-12">
              <label for="passwd" class="form-label">비밀번호 확인 <span class="text-body-secondary"></span></label>
              <input type="password" class="form-control" id="passwd2" required>
              <div class="invalid-feedback">
                비밀번호 확인 필드를 입력해주세요. 
              </div>
            </div>


            <div class="col-12">
              <label for="username" class="form-label">회원명</label>
              <div class="input-group has-validation">
                <!-- <span class="input-group-text">@</span> -->
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
              <div class="invalid-feedback">
                  회원명은 필수입력 항목입니다.
                </div>
              </div>
            </div>

            <div class="col-12">생년월일</div>
            <div class="col-md-5">
              <select class="form-select" name="yyyy" id="yyyy" required>
                <option value="">년</option>
                <?php 
                for($i = 2023 - 20 ; $i > 1900 ; $i-- ){
                    echo "<option value='".$i."'>".$i."</option>";
                }
                ?>                
              </select>
              <div class="invalid-feedback">
              년도를 입력하세요. 
              </div>
            </div>

            <div class="col-md-4">
              <select class="form-select" name="mm" id="mm" required>
                <option value="">월</option>
                <?php 
                for($i = 1 ; $i < 13 ; $i++ ){
                    echo "<option value='".$i."'>".$i."</option>";
                }
                ?>  
              </select>
              <div class="invalid-feedback">
              월을 입력하세요.
              </div>
            </div>

            <div class="col-md-3">
              <select class="form-select" name="dd" id="dd" required>
                <option value="">일</option>
                <?php 
                for($i = 1 ; $i < 32 ; $i++ ){
                    echo "<option value='".$i."'>".$i."</option>";
                }
                ?>  
              </select>
              <div class="invalid-feedback">
                일자를 입력하세요.
              </div>
            </div>
          </div>

          <div class="col-12">
              <label for="addr" class="form-label">주소</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" name="addr" id="addr" placeholder="주소를 입력해주세요." required>
              <div class="invalid-feedback">
                  주소는 필수입력 항목입니다.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="tel" class="form-label">전화번호</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" name="tel" id="tel" placeholder="010-0000-0000" required>
              <div class="invalid-feedback">
                  전화번호는 필수입력 항목입니다.
                </div>
              </div>
            </div>

            

            <!-- <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">Address 2 <span class="text-body-secondary">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div> -->

            

          <hr class="my-4">

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="same-address" required>
            <label class="form-check-label" for="same-address">약관에동의</label>
            <div class="invalid-feedback">
                  약관에 동의해주세요.
                </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit" id='btnJoin'>회원가입</button>
        </form>
      </div>
    </div>
  </main>

  <footer class="my-5 pt-5 text-body-secondary text-center text-small">
    <p class="mb-1">&copy; 2017–2023 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="checkout.js"></script></body>
	
	<script type="text/javascript">
    // document.getElementById("btnJoin").addEventListener("click", function(){
    //   if (document.getElementById("passwd").value != document.getElementById("passwd2").value){
    //     alert("비밀번호와 비밀번호 확인이 같지 않습니다.");
    //     return;
    //   }

    //   document.getElementById("frmJoin").submit();
    // });
    // document.getElementById("frmJoin").addEventListener("submit", fucntion(){
    //   alert('aaa');
    // });

    document.getElementById("btnDup").addEventListener("click", function(){
      url = './join_dup_check.php?email='+document.getElementById("email").value;
      fetch(url)
      .then((res) => res.text())
      .then((data) => {
          switch(data) {
              case '0': {      // 사용 가능한 아이디
                  break;
              }
              case '1': {     // 사용 불가능한 아이디
                alert("이메일이 중복되었습니다.");
                  document.getElementById("email").value = "";
                  break;
              }
          }
      });
    });

    document.getElementById("email").addEventListener("blur", function(){
      let regex = new RegExp('[a-z0-9]+@[a-z]+\.[a-z]{2,3}');

      console.log(regex.test(document.getElementById("email").value));
      if(!regex.test(document.getElementById("email").value)){
        alert("이메일 형식으로 입력하세요.");
        document.getElementById("email").value = "";
        return;
      }
      url = './join_dup_check.php?email='+document.getElementById("email").value;
      fetch(url)
      .then((res) => res.text())
      .then((data) => {
          switch(data) {
              case '0': {      // 사용 가능한 아이디
                alert("사용가능한 이메일입니다.");
                  break;
              }
              case '1': {     // 사용 불가능한 아이디
                alert("이메일이 중복되었습니다.");
                  document.getElementById("email").value = "";
                  break;
              }
          }
      });
    });
  </script>
</html>
