<?php

include_once 'DatabaseClass.php';
include_once 'dbConfig.php';


$post = $_POST;

//print_r ($post);


$fieldKeys = '';
$fieldValues = '';

foreach ($post as $key => $value)
{

    if ($key  == 'id'  or  $key == 'tableName')
    {
    
    }
    else
    {

        if ($fieldKeys == '')
        {

            $fieldKeys = $key;
            $fieldValues = "'" . $value . "'";    

        }
        else
        {
            $fieldKeys = $fieldKeys . " , " . $key;
            $fieldValues = $fieldValues . " , " . "'" . $value . "'";
        }
    }    

}
//echo 'after foreach';
//print ($fieldKeys);
//print ($fieldValues);

$tableName = $post['tableName'];

$db1 = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname);
//$dba = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname); 



$insert = "insert into $tableName ($fieldKeys) values ($fieldValues)";
//$insert = "insert into $tableName (fkUsers, dateTime) values (2, 2023/23/03)";
//print ($insert);

//$db1->insert($insert);
$db1->Insert($insert);

print ("<form action='list.php' method='POST'>");
print ("<input type='hidden' name='tableName' value= $tableName>");
print ("<input type= 'submit' value= 'back'>");
print ('</form>');



//header("location: list.php");


?>
