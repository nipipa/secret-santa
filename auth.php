<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Secret Santa</title>
</head>
<body>
<?php
require('mysql.php');
if (isset($_REQUEST['username'])){
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con,$username);
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$password);
        $query = "INSERT into `users` (username, email)
VALUES ('$username', '".md5($email)."')";
        $result = mysqli_query($con,$query);
        if($result){
            include ('secret-santa.php');
        }
    }else{
?>
<div class="form">
<h1>Введите ваше имя и email</h1>
<form name="registration" method="post">
<input type="text" name="username" placeholder="Введите ваше имя" required /> <br>
<input type="text" name="email" placeholder="email" required /> <br>
<input type="submit" name="submit" value="Начать игру!" />
</form>
</div>
<?php } ?>
</body>
</html>