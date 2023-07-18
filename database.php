<?php
session_start();
try {
    $db = new PDO("mysql:host=localhost;dbname=zuzu",
        "root", "");
    $query = $db->prepare("SELECT * FROM sushi");
    $query->execute();
} catch (PDOException $exception) {
    die("Error!: " . $exception->getMessage());
}

try {
    $db = new PDO("mysql:host=localhost;dbname=zuzu",
        "root", "");
    $query2 = $db->prepare("SELECT * FROM `customer`");
    $query2->execute();
} catch (PDOException $exception) {
    die("Error!: " . $exception->getMessage());
}

try {
    $db = new PDO("mysql:host=localhost;dbname=zuzu",
        "root", "");
    $query3 = $db->prepare("SELECT * FROM adress");
    $query3->execute();
} catch (PDOException $exception) {
    die("Error!: " . $exception->getMessage());
}
?>