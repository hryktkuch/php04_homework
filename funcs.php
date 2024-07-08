<?php

function db_conn($table_name){
    $host='mysql57.hryktkuch.sakura.ne.jp';
    $db_name='hryktkuch_todoapp';
    // $table_name='todo';
    $db_id='hryktkuch';


    $dsn = "mysql:host={$host};dbname={$db_name};charser=utf8";
    try {
        $pdo = new PDO($dsn, $db_id , $db_pass );
        return $pdo;
    } catch (PDOException $e) {
        exit('DBConnectError:'.$e->getMessage());
    }
}

function loginCheck() {
    if ( !isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid']!== session_id() ) {
        header('Location: login.php?err=1');
        exit('login error');
    }
    session_regenerate_id(true);
    $_SESSION['chk_ssid']=session_id();
};

?>