<?php

function connectDB()
{
    $database = 'ifraguad_db';
    $user = 'ifraguad';
    $pass = 'broccoli';
    $host = 'localhost';

    $db = new PDO("mysql:host=$host;dbname=$database", $user, $pass);

    return $db;
}
?>