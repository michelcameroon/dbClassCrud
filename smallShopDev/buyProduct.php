

<?php
//echo '<br>begin buy1<br>';

$post = $_POST;
$price = $post['price'];
$howMany = $post['howMany'];

//print_r ($post);




//echo '<br>begin buy<br>';
include_once 'menu.php';
include_once 'databaseClass/DatabaseClass.php';
//include_once 'databaseClass/ArrTb.php';

print ('<h1>buy</h1>');

//$GLOBALS['newCommand'] = True;

$pwd = '';
$pwd = getcwd();
//print ($pwd);
chdir('databaseClass');
$pwd = getcwd();
//print ($pwd);


$db1 = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname);


// insert command



$now1 = date('Y-m-d H:i:s');
//print ($now1);


$sql = "insert into command (now, total) values ('$now1', 0)";

//print ($sql);       

//$commandId = $db1->Insert($sql);
$fkCommand = $db1->Insert($sql);

$db1->dbCommandId = $commandId;


//print ($commandId);



$sql = 'select * from product';

$products = $db1->Select($sql);

print ('<table border=1');


$price = 0;
foreach ($products as $row)
{
  
    print ('<tr>');
    print ("<form action= 'buyProduct1.php' method= 'POST' >");            


    foreach ($row as $key => $value)
    {


        print ('<td>'); 
        if ($key== 'id')
        {
            $id = $value;
            //print ('<br>$id<br>');
        }
        else
        {
            if ($key == 'price')
            {

                $price = $value;
            }
            //print ($value);
            print ($value);
            print ('</td>');
        }




}
    print ('<td>'); 
    print ("<input type='hidden' name= 'price' value=$price />" );
    print ("<input type='text' name= 'howMany' value=1 />" );
    print ('</td>'); 
    print ("<input type='hidden' name='fkProduct' value=$id />");
    print ("<input type='hidden' name='fkCommand' value=$fkCommand />");

    print ('<td>'); 

    print ("<input type='submit' value='buy' />");
    print ("</form>");
    print ('</td>'); 




//        $str .= '</form>';

}
print ('</tr>');
print ('</table>');

?>
