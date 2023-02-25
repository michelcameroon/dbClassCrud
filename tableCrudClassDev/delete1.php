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

$id = $post['id']; 


$del1 = $conec->delete($id);






$newURL = 'tConnection.php';
header('Location: '.$newURL);

?>

