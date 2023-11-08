<?php
$cnn = new PDO("mysql:host=localhost;dbname=test", "root", "");
if(isset($_POST)){
    $query='update book set personbook=:personbook where codebook=:codebook';
    $r=$cnn->prepare($query);
    $r->execute([
        "personbook"=>$_POST['personbookedit'],
        "codebook"=>intval($_POST['codebookedit'])
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