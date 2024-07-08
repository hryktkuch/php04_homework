<?php
require_once('funcs.php');
session_start();
loginCheck();

$id=$_POST['id'];
$todo=$_POST['todo'];

$pdo=db_conn('todo');

$stmt = $pdo->prepare('UPDATE todo SET todo=:todo, date=now() WHERE id=:id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    header('Location: ' . 'todo.php');
    exit();
};

?>