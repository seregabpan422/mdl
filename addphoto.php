<?php

$img_type = substr($_FILES['fileimg']['type'], 0, 5);
if(!empty($_FILES['fileimg']['tmp_name']) and $img_type === 'image'){
    
    $username = $_COOKIE['userlog'];
    var_dump($username);
    $img = addslashes(file_get_contents($_FILES['fileimg']['tmp_name']));

    $mysql = new mysqli('localhost', 'root', '', 'moodle');

    $result = $mysql->query("INSERT INTO `logo` (`path` , `userlogin`) VALUES 
    ('$img', '$username') ");

    $newimage = mysqli_fetch_all($result, MYSQL_ASSOC);

   
}

header('Location: setings.php');
?>