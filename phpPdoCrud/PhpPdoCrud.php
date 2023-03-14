<?php

class Db 
{
  private $conn;

  public function __construct($host, $user, $password, $dbName) {
//    $dsn = "mysql:host=$host;dbname=$dbName";
    $dsn = "mysql:host=localhost;dbname=qrcode1";
    print ('before nnnnnnnnnnnnnnnnnnn  dsn');
    print ($dsn);
//    $this->conn = new PDO($dsn, $user, $password);
    $this->conn = new PDO($dsn, 'qrcode1', 'qrcode1');
    return $this->conn;
  }

  public function create($firstName, $lastName) {
    $stmt = $this->conn->prepare("INSERT INTO users (firstName, lastName) VALUES (:firstName, :lastName)");
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':lastName', $lastName);
    return $stmt->execute();
  }

  public function read() {
    $stmt = $this->conn->prepare("SELECT * FROM users");
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function update($id, $firstName, $lastName) {
    $stmt = $this->conn->prepare("UPDATE users SET firstName = :firstName, lastName = :lastName WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':lastName', $lastName);
    return $stmt->execute();
  }

  public function delete($id) {
    $stmt = $this->conn->prepare("DELETE FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
  }
}


?>
