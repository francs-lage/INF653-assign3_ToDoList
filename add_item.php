<?php
    require ('database.php');
 
    $newtitle = filter_input(INPUT_POST, 'newtitle', FILTER_SANITIZE_STRING);
    $newdescription = filter_input(INPUT_POST, 'newdescription', FILTER_SANITIZE_STRING);   

    if ($newtitle) {
        $query = "INSERT INTO todoitems
                            (Title,Description)
                  VALUES
                            (:newtitle, :newdescription)";
        $statement = $database->prepare($query);
        $statement->bindValue(':newtitle', $newtitle);
        $statement->bindValue(':newdescription', $newdescription);
        $statement->execute();
        $statement->closeCursor();
        $newtitle = null;
    }
include('index.php');
header("Location: index.php");
exit;