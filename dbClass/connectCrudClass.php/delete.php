<?php
echo "begin delete";
// first read record with the id

$post = $_POST;

$id = $post['id'];

print ("id = ");
print ($id);

print ("post = ");
print_r ($post);

include_once 'connection.php';

$conec = new Connection();


$con = $conec->Open();

$rec1 = $conec->queryListOne($id);

print ("rec1 = ");
print_r ($rec1);


$del1 = $conec->delete($id);




echo " until here";



//include_once 'connection.php';
//$conec = new Connection();

//$db1 = $conec->db;

//$con = $conec->Open();
//$con = $db1->Open();
//echo $con;
//list = $conec->queryList();



//        $con = $this->conn;
//        echo $con;
//        $stmt = $con->prepare('select * from users');


//        $stmt = $this->db->prepare('select * from users where id = 10');
//        $stmt = $conec->db->prepare('select * from users where id = 10');
//        $stmt = $conec->prepare('select * from users where id = 10');
//        $stmt = $db1->prepare('select * from users where id = 10');

//        $stmt->execute();

//        $arrs = $stmt->fetchAll(PDO::FETCH_ASSOC);


//        print_r($arrs);



?>
