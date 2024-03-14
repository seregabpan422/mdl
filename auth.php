<?php
$login = filter_var(trim($_POST['alogin']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['apass']), FILTER_SANITIZE_STRING);


//$pass = md5($pass);

$mysql = new mysqli('localhost', 'root', '', 'moodle');

$result = $mysql->query("SELECT *  FROM `user` WHERE `Login` = '$login' 
AND `password` = '$pass'");
$user = $result->fetch_assoc();
 if(count($user) == 0) {
    echo 'No user where founded';
    exit();
 }
 $result = $mysql->query("SELECT *  FROM `$login` ");
 setcookie('userlog', $user['Login'], time() + 3600*24, "/");
 setcookie('username', $user['firstname'], time() + 3600*24, "/");
 setcookie('userlast', $user['lastname'], time() + 3600*24, "/");
 setcookie('usermail', $user['email'], time() + 3600*24, "/");
 setcookie('userstat', $user['Stat'], time() + 3600*24, "/");
 setcookie('userbio', $user['biography'], time() + 3600*24, "/");
 setcookie('userid', $user['id'], time() + 3600*24, "/");
 setcookie('userimage', $user['image'], time() +3600*24, "/");

$mysql->close();
header('Location: Index.php')


?>