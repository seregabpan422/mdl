<?php
header('Content-Type: text/html; charset=utf-8');
mb_internal_encoding('utf-8');

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
$img = 'https://assets.nationbuilder.com/themes/5d1ad55ac2948011ce17704b/attachments/original/1553643295/login.png?1553643295';
$name = $login;
$bio = 'Моя біографія';
$status = 'Невідомий';

$mysql = new mysqli('localhost', 'root', '', 'moodle');

$result = $mysql->query("SELECT *  FROM `user` WHERE `Login` = '$login'");
$user = $result->fetch_assoc();
 if(count($user) == 0) {

  $pass = md5($pass);

  $mysql->query("INSERT INTO `user` (`login`, `password`, `firstname`, `image`, `biography`, `stat`)
   VALUES('$login', '$pass', '$name', '$img', '$bio', '$status')");

 }  

else {
  echo('This user already registered');
  
}
/*$sql = "CREATE TABLE $login (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  biography VARCHAR(250),
  Stat VARCHAR(50)
  )";
  
  if ($mysql->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
  } else {
    echo "Error creating table: " . $mysql->error;
  }
  */

$mysql->close();
header('Location: login.php');
?>