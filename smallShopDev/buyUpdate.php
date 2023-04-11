<?php
echo '<br>begin buyUpdate<br>';

$post = $_POST;
$price = $post['price'];
$howMany = $post['howMany'];

$id = $post['id'];

$fkProduct = $post['fkProduct'];

$fkCommand = $post['fkCommand'];

print_r ($post);

//echo '<br>begin buy<br>';
include_once 'menu.php';
include_once 'databaseClass/DatabaseClass.php';
//include_once 'databaseClass/ArrTb.php';

print ('<h1>buyUpdate</h1>');

//$GLOBALS['newCommand'] = True;

$pwd = '';
$pwd = getcwd();
//print ($pwd);
chdir('databaseClass');
$pwd = getcwd();
//print ($pwd);
//$commandId = $post['commandId];
//$commandLineId = 228;

$db1 = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname);

$sql = 'select * from commandLine where id = ' . $id ;

print ($sql);

$commandLines = $db1->Select($sql);
print ('<br>');
print_r ($commandLines);
print ('<br>');


 
$sql = 'select commandLine.id, product.name, product.price, commandLine.howMany , subTotal, fkCommand, fkProduct from product, commandLine where fkCommand = ' . $fkCommand . ' and fkProduct = product.id and commandLine.id = ' . $id;




print ($sql);


$commandLines = $db1->Select($sql);

 
print ('<br>');
print_r ($commandLines);
print ('<br>');



print ('<br>list commandLines<br>');

print ('<table border=1');
print ( '<tr>');

print ('<td>'); 

print ('</td>');
print ('<td>');
print ('</td>');
print ('<td>');
print ('</td>');
print ( '</tr>');


print ( '<tr>');
print ('<th>');
print ('name');
print ('</th>');
print ('<th>');
print ('price');
print ('</th>');
print ('<th>');
print ('howMany');
print ('</th>');
print ('<th>');
print ('subTotal');
print ('</th>');

print ( '/<tr>');



print ('<tr>');


print ('<td>'); 



foreach ($commandLines as $row)
{
  
    print ('<tr>');




    print ("<form action= 'buyUpdate1.php' method= 'POST' >");            
            
    $th = 0;
    foreach ($row as $key => $value)
    {


        if ($key== 'id')
        {
            $id = $value;
            //print ('<br>$id<br>');
            print ($value);
        }
        else
        {
            print ('<td>'); 
            //print ($value);
            if ($key == 'fkCommand')
            {
                $fkCommand = $value;
                print ($fkCommand);
            }
           if ($key == 'fkProduct')
            {
                $fkProduct = $value;
                print ($fkProduct);
            }

            if ($key == 'subTotal')
            {
                 //$commandTotal = $commandTotal + $value;
                 //print ($commandTotal);

            }

            if ($key == 'howMany')
            {
                 //$commandTotal = $commandTotal + $value;
                 //print ($commandTotal);
                 print ("<input type='text' name= 'howMany' value=$value />");


            }
            print ($value);
            print ('</td>');
        }
  

    }

    print ('<td>'); 
    print ('</td>'); 
    print ("<input type='hidden' name='id' value=$id />");
//    print ("<input type='hidden' name='commandId' value=$commandId />");
    print ("<input type='hidden' name='fkCommand' value=$fkCommand />");
    print ("<input type='hidden' name='fkProduct' value=$fkProduct />");
    print ('</td>'); 

    print ('<td>'); 

    print ("<input type='submit' value='update' />");
    print ("</form>");
    print ('</td>'); 

}

/* 
print ('</tr>');
print ('<tr>');
print ('<td>');
print ('total');
print ('</td>');
print ('<td>');
print ('</td>');
print ('<td>');
print ('</td>');
print ('<td>');
print ($commandTotal);

print ('</td>'); 
print ('<td>');
print ("<form action= 'commandEnd.php' method= 'POST' >");   

print ("<input type='hidden' name='commandTotal' value=$commandTotal />");
print ("<input type='submit' value='finish command' />");
print ("</form>");
print ('</td>'); 
*/

print ('</tr>');


print ('</table>');



?>
