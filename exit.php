<?php 
 setcookie('userlog', $user['Login'], time() - 3600*24, "/");
 setcookie('username', $user['firstname'], time() - 3600*24, "/");
 setcookie('userlast', $user['lastname'], time() - 3600*24, "/");
 setcookie('usermail', $user['email'], time() - 3600*24, "/");
 setcookie('userstat', $user['Stat'], time() - 3600*24, "/");
 setcookie('userbio', $user['biography'], time() - 3600*24, "/");
header('Location: /')
?>