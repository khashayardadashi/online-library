<?php
session_start();
if(isset($_SESSION['username'])){
    if($_SESSION['state']=='login'){
        header("Location: http://localhost/bookonline/library.php/");
    }
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" integrity="sha384-PJsj/BTMqILvmcej7ulplguok8ag4xFTPryRq8xevL7eBYSmpXKcbNVuy+P0RMgq" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <script src="js/jq.js"></script>
    <script src="js/notify.min.js"></script>

    <title>ورود</title>
</head>
<body>
    <section class="vh-100 bg-light">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card shadow-2-strong bg-white " style="border-radius: 1rem;">
                <div class="card-body p-4 text-center">
                    <h4 class="my-2">
                        booklibrary
                    </h4>
                    <hr>
                 <form method="post" id="form">
                     <input class="form-control my-3" type="text" name="username" placeholder=" نام کاربری خود را وارد کنید" aria-label="username" id="username" required>
                     <input class="form-control" type="password" name="password" placeholder="رمز عبور خود را وارد کنید" aria-label="password" id="password" required>
                  <hr>
                  <button class="btn btn-primary w-100" type="button" id="btn">ورود</button>
                 </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
<script>
    let input = document.getElementById("password");
    let btn = document.getElementById("btn");
    let input1=document.getElementById("username");
    btn.addEventListener("click" , ()=>{
        let xhl = new XMLHttpRequest();
        xhl.open("post" , './loginAjax.php' , true);
        xhl.onreadystatechange=()=>{
            if(xhl.readyState==xhl.DONE && xhl.status==200){
                let result = xhl.response;
                if(result=="false"){
                    document.getElementById("password").className="form-control is-invalid";
                    document.getElementById("username").className="form-control  my-3 is-invalid";
                    $.notify("نام کاربری یا رمز عبور اشتباه است", "error");
                }
                else if(result=="true"){
                    document.getElementById("username").className="form-control my-3 is-valid";
                    document.getElementById("password").className="form-control is-valid";
                    $.notify("ورود با موفقیت انجام شد", "success");
                    btn.innerHTML="در حال انتقال...";
                    setTimeout(()=>{
                        window.location="http://localhost/bookonline/library.php";
                    },2000)
                }
            }
        };
        let form = document.getElementById("form");
        let data = new FormData(form);
        xhl.send(data);

    })
</script>
</html>