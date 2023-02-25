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


    print ('<table border=1>'); 

    print ("<form action= 'delete1.php' method = 'POST'> ");

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

    print ("<input type= 'submit' value= 'delete' />");
    print ("</td></tr>");

    print ("</table>");


    print ("</form>");





//$del1 = $conec->delete($id);






$newURL = 'tConnection.php';
//header('Location: '.$newURL);

?>
