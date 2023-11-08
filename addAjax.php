<?php
$cnn = new PDO("mysql:host=localhost;dbname=test", "root", "");
if(isset($_POST)){
    $query='insert into book (namebook,codebook) values (:namebook ,:codebook)';
    $r=$cnn->prepare($query);
    $r->execute([
        "namebook"=>$_POST['namebook'],
        "codebook"=>intval($_POST['codebook'])
    ]);
    if($r->rowCount()){
        echo "true";
    }
    else{
        echo "false";
    }
}
else{
    echo "false";
}
