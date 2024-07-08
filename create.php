<?php
require_once('funcs.php');
session_start();
loginCheck();

$todo=$_POST['todo'];
$user_id=$_SESSION['user_id'];


$pdo=db_conn('todo');

$stmt = $pdo->prepare('INSERT INTO todo(todo,date,creator) VALUES (:todo, now(), :user_id);');
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    header('Location: ' . 'todo.php');
    exit();
};

?>