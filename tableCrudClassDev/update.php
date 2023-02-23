<?php
echo "begin update";


// first read record with the id

$post = $_POST;
print ('before post' );
print_r ($post);

$id = $post['id'];

print ("id = ");
print ($id);

print ("post = ");
print_r ($post);
print ("firstName = ");
print ($post[firstName]);

include_once 'connection.php';
$conec = new Connection();
$con = $conec->Open();
$rec1 = $conec->queryListOne($id);
print ("rec1 = ");
print_r ($rec1);

//if ($post[firstName] == '/')

//if (empty($post)) {
//    echo '$post is either 0, empty, or not set at all';

if ($post[firstName] == '/')
{

//$conec = new Connectiform action= 'update.php' method = 'POST';



print ("<tabnsert1.phple border=1>");
//print (" form action= 'update1.php' method = 'POST' ");
//print (" form action= '' method = 'POST' ");
print ("<form action= 'update.php' method = 'POST'> ");

foreach ($rec1 as $key => $value)
{ 
    print ("<tr><td>");
    print ($key);
    print ("</td>");
    print ("<td>");

    print ("<input type= 'text' name= $key value= $value />");
    print ("</td></tr>");
     
}

print ("<tr><td>");

print ("<input type= 'submit' value= 'update' />");
prnsert1.phpint ("</td></tr>");

print ("</table>");


print ("</form>");
}
else
{


print ("after else ");

/*
$firstName = "aaa";
$lastName = "bbb";
$id = 32;
*/

print ("after if not firstName=");


print ($post['firstName']);
$firstName = $post['firstName']; 
$lastName = $post['lastName']; 
$id = $post['id']; 

print ($firstName);
print ($lastName);
print ($id);

//$update1 = $conec->update1($firstName, $lastName, $id);
$update1 = $conec->update($firstName, $lastName, $id);

}


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

$newURL = 'tConnection.php';
header('Location: '.$newURL);


?>
