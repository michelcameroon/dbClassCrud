<?php
echo 'begin ';
include_once 'dbConfig.php';

include_once 'PhpPdoCrud.php';
echo 'before new1';


//$db1 = new Db($host, $user, $password, $dbName);
$db1 = new Db('localhost', 'qrcode1', 'qrcode1', 'qrcode1');

echo 'before read';
$result = $db1->read();
print_r ($result);
