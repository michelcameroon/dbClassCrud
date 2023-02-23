<?php

$post = $_POST;

print_r ($post);

// Connect to database
$db = new PDO('mysql:host=localhost;dbname=qrcode1', 'qrcode1', 'qrcode1');

// Get values from form
$firstName = $_POST['firstName'];
//$firstName = 'firstName';
//$lastName = 'lastName';
$lastName = $_POST['lastName'];
print ($lastName);
//$email = $_POST['email'];

// Prepare and execute statement
//$stmt = $db->prepare('INSERT INTO users(firstName, lastName, email)
//$stmt = $db->prepare('INSERT INTO users(firstName, lastName) VALUES(:firstName, :lastName ' );
$stmt = $db->prepare("INSERT INTO users(firstName, lastName) VALUES(?, ?)");
//$stmt->execute(['glory', 'gloooorry']);
//$stmt->execute(['glory', 'gloooorry']);
//$stmt->execute($post);
$stmt->execute([$firstName, $lastName]);
//$stmt->execute(array($firstname, $lastname));
//$stmt->execute(array(
//    ':firstName' => $firstName,
//    ':lastName' => $lastName));
//    //':email' => $email


$newURL = 'tConnection.php';
header('Location: '.$newURL);


?>

