<?php
echo '<h1>begin listInTb.php</h1>';

include_once 'DatabaseClass.php';
//include_once 'dbConfig.php';

include_once 'ArrInTbClass.php';
include_once 'ArrTb.php';





$post = $_POST;

//print_r ($post);

//$tableName = $post['tableName'];
$tableName = 'users';

$db1 = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname);
//$dba = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname); 

//print ($db1->connection);
$rows = $db1->select('SELECT * FROM ' . $tableName);
//print_r ($rows);


$tArrTb = new ArrTb($rows);

$rows3 = $tArrTb->getArrs(); 	// ok


//print_r ($rows3);

print ('before list');
$page =  $tArrTb->list();
print ('after list');

print ($page);




print ('before function');

function arrTb($rows)
{

    $str ='<table border=1';
    foreach ($rows as $row)
    {
        $str .= '<tr>';
        foreach ($row as $key => $value)
        {
            $str .='<td>';
                          
            $str .= $value;
            $str .='</td>';



        }
        
        $str .= '<tr>';
        

    }
    
   $str .='<table border=1';

    
   return $str;
}


$str = arrTb($rows);
///print ($str);
//print_r ($str);



print ('<br>before new<br>');


$arrInTb1 = new ArrInTb($rows);

$arrOut = $arrInTb1->getArrs();
print ('<br>after new<br>');




/*
$rows1 = $arrInTb1->returnRows();
print_r ($rows1);
//$arrInTb1->updateDelete($rows);
//$str = $arrInTb1->updateDelete1($rows);
$str = '';
print (' str=' . $str . '<br>');
$str = $arrInTb1->updateDelete1();
//$arrInTb1->updateDelete();
//print_r ($rows);
print ($str);
print ('end  str=' . $str . '<br>');
*/
/*


//print_r ($rows);

print ('<h1> list </h1>');
print ('<h2>' .  $tableName . '</h2>');

print ('new record');

print ("<form action='insert.php' method='POST'>");
print ("<input type='hidden' name='tableName' value=$tableName>");
print ("<input type='submit' value='insert'>");
print ("</form>");

print ('<table border=1>');

foreach ($rows as $row)
{
   //print ($row);
   print ('<tr>');  
   foreach ($row as $key => $value)
   {
       //print ($key);
       print ('<td>');
       if ($key== 'id')
       {
           $id = $value;
           //print ('<br>$id<br>');
       }
       print ($value);
       print ('</td>');
   }
   print ('<td>');
   print ("<form action='update.php' method='POST' >");
   print ("<input type='hidden' name= 'id' value= $id / >");
   print ("<input type='hidden' name='tableName' value=$tableName>");
   print ("<input type='submit' value= 'update' / >");
   print ('</form>');
   //print ('update');
   print ('</td>');
   print ('<td>');
   print ("<form action='delete.php' method='POST' >");
   print ("<input type='hidden' name= 'id' value= $id / >");
   print ("<input type='hidden' name='tableName' value=$tableName>");
   print ("<input type='submit' value= 'delete' / >");
   print ('</form>');

   //print ('delete');


   print ('</td>');
   print ('</tr>');  

}

print ('</table>');

*/


echo '<br>end listInTb.php';
?>
