<?php
require_once('funcs.php');
session_start();
loginCheck();

$id=$_GET['id'];

$pdo=db_conn('todo');

$stmt = $pdo->prepare('SELECT * FROM todo WHERE id=' . $id);
$status = $stmt->execute();

$view='';
if ($status==false) {
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .= '<form method="POST" action="update.php">';
        $view .= '<input type="text" name="id" value="' . $result['id'] . '" hidden />';
        $view .= '<input type="text" name="todo" value="' . $result['todo'] . '" />';
        $view .= '<input type="submit" />';
        $view .= '</form>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todo app - update</title>
</head>
<body>
    <center>
        <h1>update</h1>
        <?= $view ?>
    </center>
</body>
</html>