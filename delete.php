<?php
require_once('funcs.php');
session_start();
loginCheck();

$id=$_GET['id'];

$pdo=db_conn('todo');

$stmt = $pdo->prepare('DELETE FROM todo WHERE id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    header('Location: ' . 'todo.php');
    exit();
};

?>