<?php
$cnn = new PDO("mysql:host=localhost;dbname=test", "root", "");
if(isset($_POST)){
    $query='delete from book where codebook=:codebookdel';
    $r=$cnn->prepare($query);
    $r->execute([
        "codebookdel"=>intval($_POST['codebookdel'])
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