<?php
require_once('funcs.php');
session_start();

$account=$_POST['account'];
$password=$_POST['password'];

$pdo=db_conn('user');

$stmt = $pdo->prepare('SELECT * FROM user WHERE account=:account AND password=:password');
$stmt->bindValue(':account', $account, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status==false) {
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}

$val=$stmt->fetch();

if ($val['id'] !=''){
    $_SESSION['chk_ssid']=session_id();
    $_SESSION['user_id']=$val['id'];
    header('Location: todo.php');
} else {
    header('Location: login.php?err=1');
}

?>