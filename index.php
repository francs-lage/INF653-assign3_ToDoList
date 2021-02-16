<?php
require ('database.php');
$query = 'SELECT ItemNum, Title, Description
            FROM todoitems
            ORDER BY ItemNum ASC';

$statement = $database->prepare($query);
$statement->execute();
$items = $statement->fetchAll();
$statement->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List </title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
    <main>
        <header><h1>To Do List</h1></header>
        <section id="ListItemsSection"> 
            <?php if ($items) { 
                foreach ($items as $item) { 
                    $itemnum = $item['ItemNum'];
                    $title = $item['Title'];
                    $description = $item['Description']; ?>
                  
                    <div class="itemDiv">
                        <div class="title"> <?php echo $title; ?> </div>
                        <div class="description"> <?php echo $description; ?> </div>
                        <div class="button">
                        <form class="deleteForm" action="delete_item.php" method="POST">
                            <input type="hidden" name="itemnum" value="<?php echo $itemnum ?>">
                            <button class="deleteButton"><i class="fa fa-times" aria-hidden="true"></i></button>
                        </form> </div>
                    </div>
                    
                 <?php }
            } else { ?>
                <div class="itemDiv">The list is empty!</div>
            <?php } ?> 
        </section>

        <section id="addItemSection"> 
            <h1 id="h1AddItem"> Add Item </h1>
            <form class="addItem" action="add_item.php" method="POST">
                <label id="labelNT" for="newtitle">Title:</label>
                <input type="text" id="newtitle" name="newtitle" maxlength="20" required>
                <label id="labelND" for="newdescription">Description:</label>
                <input type="text" id="newdescription" name="newdescription" maxlength="50">
               <div class="addButton"> <button>Add Item</button> </div>
            </form>
        </section>

    </main>
</body>
</html>