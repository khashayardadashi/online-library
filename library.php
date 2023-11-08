<?php
    $cnn = new PDO("mysql:host=localhost;dbname=test", "root", "");
    $query='select * from book';
    $r=$cnn->query($query);
    $result=$r->fetchAll(PDO::FETCH_ASSOC);
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

    <title>کتابخانه</title>
</head>
<body>
<div class="container h-100">
    <ul class="nav justify-content-center mt-5 mx-auto">
        <li class="nav-item">
           <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#btn-add">افزودن کتاب</button>
        </li>
        <li class="nav-item ms-2">
           <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#btn-del">حذف کتاب</button>
        </li>
        <li class="nav-item ms-2">
            <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#btn-edit">قرض کتاب</button>
        </li>
    </ul>
    <div class="row d-flex justify-content-center h-100">
        <table class="table w-50  table-striped mt-5">
            <thead>
            <tr>
                <th scope="col" class="text-center">کد کتاب</th>
                <th scope="col" class="text-center">نام کتاب</th>
                <th scope="col" class="text-center">امانت دار</th>
            </tr>
            </thead>
            <tbody>
            <?php for($i=0;$i<count($result);$i++){?>
            <tr>
                <th  class="text-center"><?php echo ($result[$i]['codebook']);?></th>
                <td class="text-center"><?php echo($result[$i]['namebook']); ?></td>
                <td class="text-center"><?php echo($result[$i]['personbook']);?></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!--addbook-->
<div class="modal fade" id="btn-add" tabindex="-1" aria-labelledby="btn-add" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="btn-add">افزودن کتاب</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="formadd">
                    <input class="form-control mb-3" type="text" name="codebook" placeholder=" کد کتاب را وارد کنید" aria-label="codebook" id="codebook" required>
                    <input class="form-control" type="text" name="namebook" placeholder="نام کتاب را وارد کنید" aria-label="namebook" id="namebook" required>
                    <hr>
                    <button class="btn btn-primary w-100" type="button" id="btnAdd" name="btnAdd">ثبت کتاب</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--deletebook-->
<div class="modal fade" id="btn-del" tabindex="-1" aria-labelledby="btn-del" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="btn-del">حذف کتاب</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="formdelete">
                    <input class="form-control mb-3" type="text" name="codebookdel" placeholder=" کد کتاب را وارد کنید" aria-label="codebookdel" id="codebook" required>
                    <hr>
                    <button class="btn btn-danger w-100" type="button" id="btnDel" name="btnDel">حذف کتاب</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--editbook-->
<div class="modal fade" id="btn-edit" tabindex="-1" aria-labelledby="btn-edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="btn-del">قرض کتاب</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="formedit">
                    <input class="form-control mb-3" type="text" name="codebookedit" placeholder=" کد کتاب را وارد کنید" aria-label="codebookedit" id="codebook" required>
                    <input class="form-control mb-3" type="text" name="personbookedit" placeholder=" اسم امانت دار را وارد کنید" aria-label="codebookedit" id="codebook" required>
                    <hr>
                    <button class="btn btn-success w-100" type="button" id="btnedit" name="btnedit">ثبت تغییرات</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    //Add
    let btnAdd=document.getElementById('btnAdd');
    btnAdd.addEventListener("click" , ()=>{
        let xhl = new XMLHttpRequest();
        xhl.open("post" , './addAjax.php' , true);
        xhl.onreadystatechange=()=>{
            if(xhl.readyState==xhl.DONE && xhl.status==200){
                let result = xhl.response;
               if(result=="true"){
                    $.notify("کتاب با موفقیت اضافه شد", "success");
                    setTimeout(()=>{window.location="http://localhost/bookonline/library.php";} ,3000);
                }
               else if(result=="false"){
                   $.notify( "عملیات با خطا مواجه شد" , "error");
               }
            }
        };
        let form = document.getElementById("formadd");
        let data = new FormData(form);
        xhl.send(data);
    })
    //delete
    let btndel=document.getElementById('btnDel');
    btndel.addEventListener("click" , ()=>{
        let xhl = new XMLHttpRequest();
        xhl.open("post" , './delAjax.php' , true);
        xhl.onreadystatechange=()=>{
            if(xhl.readyState==xhl.DONE && xhl.status==200){
                let result = xhl.response;
                if(result=="true"){
                    $.notify("کتاب با موفقیت حذف شد", "success");
                    setTimeout(()=>(window.location="http://localhost/bookonline/library.php") ,3000);
                }
                else if(result=="false"){
                    $.notify( "عملیات با خطا مواجه شد" , "error");
                }
            }
        };
        let form = document.getElementById("formdelete");
        let data = new FormData(form);
        xhl.send(data);
    })
    //edit
    let btnedit=document.getElementById('btnedit');
    btnedit.addEventListener("click" , ()=>{
        let xhl = new XMLHttpRequest();
        xhl.open("post" , './editAjax.php' , true);
        xhl.onreadystatechange=()=>{
            if(xhl.readyState==xhl.DONE && xhl.status==200){
                let result = xhl.response;
                if(result=="true"){
                    $.notify("کتاب با موفقیت تغییر کرد", "success");
                    setTimeout(()=>(window.location="http://localhost/bookonline/library.php") ,3000);
                }
                else if(result=="false"){
                    $.notify( "عملیات با خطا مواجه شد" , "error");
                }
            }
        };
        let form = document.getElementById("formedit");
        let data = new FormData(form);
        xhl.send(data);
    })
</script>
</html>