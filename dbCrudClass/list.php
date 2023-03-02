<?php
echo "beginnnnnnnnn list";

include_once 'DbCrudClass.php';

$post = $_POST;

print_r ($post);


//$tableName = $post['tableName'];

$tableName = $post['tableName'];

print ($tableName);

$db1 = new DbClass('qrcode1', 'localhost', 'qrcode1', 'qrcode1');

$query = "select * from $tableName";

$recs = $db1->queryListAll($query);

print_r ($recs);






echo "end list.php";
?>
