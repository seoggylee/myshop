<?php
$user_info = null;
$login = false;

if(!empty($_SESSION['user_info'])){
  // echo 'exists user_info';
  $login = true;
  $user_info = $_SESSION['user_info'];
}
?>
<header data-bs-theme="dark">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MyShop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./jjim.php">찜</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                    <?php
            if($login == true){
              echo '<button class="btn btn-outline-success" type="button" id="btnLogout">Logout</button>';
            } else {
              echo '<button class="btn btn-outline-success" type="button" id="btnLogin">Login</button>';
            }
          ?>

                </form>
            </div>
        </div>
    </nav>
</header>
<script type="text/javascript">
if (document.getElementById("btnLogin")) {
    document.getElementById("btnLogin").addEventListener("click", function() {
        console.log("click");
        location.href = './login.php';
    });
}


if (document.getElementById("btnLogout")) {
    document.getElementById("btnLogout").addEventListener("click", function() {
        console.log('click logout button')
        location.href = './logout.php';
    });
}
</script>