

<?php
echo '<br>begin buy1<br>';
$post = $_POST;


print_r ($post);
$id = $post['idProduct'];
$quantity = $post['quantity'];


include_once 'menu.php';
include_once 'databaseClass/DatabaseClass.php';
//include_once 'databaseClass/ArrTb.php';

print ('<h1>buy3</h1>');

$pwd = '';
$pwd = getcwd();
//print ($pwd);
chdir('databaseClass');
$pwd = getcwd();

$db1 = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname);
//$db1 = new DatabaseClass('localhost', 'smallShop', 'smallShop', 'smallShop');
// list commandLine
$sql = 'select * from commandLine where fkCommand = ' . $db1->dbCommandId;

print ($sql);


//$db1->list
$commandLines = $db1->Select($sql);
print ('<br>commandLine<br>');
print_r ($commandLines);
if (empty($commandLines)) {
    echo 'le basket est encore vide $var is either 0, empty, or not set at all';

    // create a new command
    $now1 = date('Y-m-d H:i:s');
    print ($now1);

    print ('now = ');
    print ($now1);
    //    $sql = 'insert into command (now, total) values (now(), 0)';
    //    $sql = "insert into command (now, total) values ('2022/05/05', 0)";
    $sql = "insert into command (now, total) values ('$now1', 0)";
    //    $sql = "insert into command (now, total) values ('2023-03-30 15:02:03>
    print ($sql);       
    $dbCommandId = $db1->Insert($sql);
    $db1->dbCommandId = $db1->Insert($sql);
    print ($dbCommandId);


}
else
{
    echo ' not empty';

}


foreach ($this->arrs as $row)
{
  
    print ("<form action= 'buy3.php' method= 'POST' >");            
    print ('<table border=1');
    print ('<tr>');


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
               //print ($value);
            print ($value);
            print ('</td>');
        }


    }

    print ('<td>'); 
    //             $str .= "<input type='text' name= 'quantity' value=1 />";
    //             $str .= '</td>'; 
    //             $str .= "<input type='hidden' name='idProduct' value=$id />";
    print ("<input type='hidden' name='dbCommandId' value=$dbCommandId />");

    print ('</td>'); 



    print ('<td>'); 

    print ("<input type='submit' value='buy' />");
    print ('</form>');
    print ('</td>'); 
    print ('</table');
}



// list product

//$sql = 'select * from  product where id = ' . $id;
$sql = 'select * from product';
$products = $db1->Select($sql);


print ($id);
print ($sql);

$arrs = $db1->Select($sql);

print_r ($arrs);  





?>
