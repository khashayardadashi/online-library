<?php
session_start();
if($_POST['username']=='khashayar' && $_POST['password']=='khashayar1234'){
    echo "true";
    $_SESSION['state']='login_in';
}
else{
    echo "false";
    $_SESSION['state']='login_out';
}