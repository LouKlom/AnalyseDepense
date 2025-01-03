<?php

$dsn = 'mysql:host=localhost:3306;dbname=Finance';
$username = 'USERNAME';
$password = 'PASSWORD';

try {
    $link = new PDO($dsn, $username, $password);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();  

}



?>