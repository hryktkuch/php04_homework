<?php
$view='';
if(isset($_GET['err'])){
    $view = '<h2 style="color:red">login error</h2>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <center>
    <h1>login</h1>
    <?= $view ?>
        <div style="width:30%; text-align:left">
            <form method="POST" action="validate.php">
                <div>Account:<input type="text" name="account" /></div>
                <div>Password:<input type="password" name="password" /></div>
                <input type="submit" />
            </form>
        </div>
        <!-- <a href="signup.php">アカウントがない場合は作って</a> -->
    </center>
</body>
</html>