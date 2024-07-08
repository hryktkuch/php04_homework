<?php
require_once('funcs.php');
session_start();
loginCheck();

$pdo=db_conn('todo');

$stmt = $pdo->prepare('SELECT * FROM todo');
$status = $stmt->execute();

$view='';
if ($status==false) {
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
        if ($result['creator']===$_SESSION['user_id']) {
            $view .= '<div style="display:table; width:100%; border:solid 1px transparent; border-bottom-color:black;">';
            $view .= '<span style="display:table-cell; width:100%; text-align:left;"><a href="select.php?id=' . $result['id'] . '">' . $result['todo'] . '</a></span>';
            $view .= '<span style="display:table-cell; text-align:right;" class="material-symbols-outlined"><a href="delete.php?id=' . $result['id'] . '">delete</a></span>';
            $view .= '</div>';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todo app</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <div style="text-align:center">
        <h1>todo</h1>
        <form method="POST" action="create.php">
            <input type="text" name="todo" />
            <input type="submit" />
        </form>
        <h2>todo list</h2>
        <center>
            <div style="width:40%; text-align:left">
                <?= $view ?>
            </div>
            <div style="height:3vh"></div>
            <a href="logout.php">logout</a>
        </center>
    </div>
</body>
</html>