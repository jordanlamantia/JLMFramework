<?php

try {
    $dns = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ".DB_CHARSET,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $pdo = @new PDO($dns, DB_LOGIN, DB_PASSWORD, $options); //L'arobase devant une fonction cache les warning
} catch (Exception $e) {
    include("views/vue_error.php");
    exit;
}
