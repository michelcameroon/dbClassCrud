<?php
echo "begin update";

print ('<h1>update</h1>');

// first read record with the id

$post = $_POST;


$id = $post['id'];



include_once 'connection.php';

$conec = new Connection();

$con = $conec->Open();
$rec1 = $conec->queryListOne($id);

//print_r ($rec1);

print ($post['firstName']);

//if ($post[firstName] == '/')

//if (empty($post)) {
//    echo '$post is either 0, empty, or not set at all';


if ($post[firstName] == '/')
{

    //$conec = new Connectiform action= 'update.php' method = 'POST';


    print ('<table border=1>'); 

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
    print ("</td></tr>");

    print ("</table>");


    print ("</form>");
}
else
{


        print ("after else ");


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




//echo " until here";





    $newURL = 'tConnection.php';
    header('Location: '.$newURL);
}

?>
