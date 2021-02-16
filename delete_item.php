<?php
require('database.php');

$itemnum = filter_input(INPUT_POST, 'itemnum', FILTER_VALIDATE_INT);

if ($itemnum) {
    $query = 'DELETE FROM todoitems 
                WHERE ItemNum = :itemnum';
    $statement = $database->prepare($query);
    $statement->bindValue(':itemnum',$itemnum);
    $success = $statement->execute();
    $statement->closeCursor();
}
include('index.php');
header("Location: index.php");
exit();