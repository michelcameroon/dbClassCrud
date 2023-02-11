<?php

include 'connection.php';
 
try{
 
    $conec = new Connection();
    $con = $conec->Open();
    if($con){
        echo 'connected';
    }
    else{
        echo $con;
    }
}
catch(PDOException $ex){
    echo $ex->getMessage();
}

?>
