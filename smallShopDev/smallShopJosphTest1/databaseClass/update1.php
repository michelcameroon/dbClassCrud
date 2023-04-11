<?php
//echo '<br>begin update.php<br>';

include_once 'DatabaseClass.php';
include_once 'dbConfig.php';


$post = $_POST;
$id = $post['id'];
//print_r ($post);

$tableName = $post['tableName'];

$db1 = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname);
//$dba = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname); 


//print ($db1->connection);

$update = '';

foreach ($post as $key => $value)
{
    if ($key == 'id' or $key == 'tableName') 
    {
        $id = $value;

    }  
    else
    {
        if ($update == '')
        {
            $update = $key . " = '" . $value . " ' ";
 
        } 
        else
        {
            $update = $update . ' , ' . $key  . " = '" . $value . " ' ";

        }

    }

}

//print ($update);

$sql = "UPDATE $tableName SET $update where id = $id";
//print ($sql);
//$rows = $db1->select('SELECT * FROM ' . $tableName . ' where id = ' . $id);
$rows = $db1->Update($sql);

print ("<form action='list.php' method='POST'>");
print ("<input type='hidden' name='tableName' value= $tableName>");
print ("<input type= 'submit' value= 'back to list'>");
print ('</form>');




?>
