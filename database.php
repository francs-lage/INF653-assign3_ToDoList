<?php
    $dataSourceName = 'mysql:host=localhost;dbname=todolist';
    $user = 'root';

    try {
        $database = new PDO($dataSourceName, $user);
    }
    catch (PDOException $e) {
        $error_message = 'Database Error: ';
        $error_message .= $e->getMessage();
        echo $error_message;
        exit();
    }
?>