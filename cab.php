<?php
require_once 'database.php';
require 'functions.php';

$post_id = $_GET['login'];
$post = get_id($post_id);
header('Content-Type: text/html; charset=utf-8');
mb_internal_encoding('utf-8');
//var_dump($post_id);
$mylogo = $_COOKIE['userlog'];
?>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moodle doodle</title>
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body class="cabbg">

   <pre style="position:absolute;"> <?php
    $posts = get_posts();
    $post = get_id($post_id);
   // var_dump($post);
   $logo = get_logo($post_id);
    $poster = get_post($post_id);
    
    ?></pre>
    <pre style="margin-left:200px;">
    <?php
    //var_dump($poster);
    ?>
    </pre>

    <?php
    foreach($posts as $posts ):
    
    ?>
    <?php
    if($post['Login'] == ""):
    ?>


<section class="nouser">
    <div class="nouser-container">
        <div class="nouser-wrapper">
            <div class="nouser-content">
                <p class="Eror">Схоже , що нікого не знайдено</p>
                <p class="Eror-subtitle">Спробуйте знайти його тут</p>
                <form action="search.php" method="POST">
                    <input type="text" placeholder="Введіть нікнейм" id="username">
                </form>
            </div>
        </div>
    </div>
</section>

<?php
    exit();
    
?>

<?php
    else:
    ?>


<?php
endif;
?>
<?php
endforeach;
?>
<section class="user-menu-panel-cab">
    <div class="user-menu-panel-container">
        <div class="user-menu-panel-wrapper">
            <div class="user-menu-panel-content">
                <div class="user-menu-panel-list">
                    <ul>
                    <li><a href="/cab.php?login=<?=$_COOKIE['userlog']?>">Профіль</a></li>
                        <li>Друзі</li>
                        <li>Чати</li>
                        <li>Нові користувачі</li>
                        <li><a href="setings.php">Налаштування</a></li>
                        <li><a href="exit.php">Вихід</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="left-text">
    <div class="left-text-container">
        <div class="left-text-wrapper">
            <div class="left-text-content">
              <a href="index.php">  <div class="left-text-title">Moodle</div>
                <div class="left-text-subtitle">Doodle</div></a>
                
            </div>
        </div>
    </div>
</section>
<section class="user"">
   
<div class="user-container">
    <div class="user-wrapper">
        <div class="user-contentІ">
            <div class="user-info">
                
                 
                
                    
                    <?php
                    
                        if($logo['path'] == "NULL"):
                    ?>
                    <?php
                    foreach($post as $post):
                        ?>
                <div class="user-logo"><img src="<?=$post['image'];?>" width="250px" height="250px" style="border-radius:50%"/></div>
                <div class="user-name">
                    <?php 
                    endforeach;
                    ?>
                    <?php
                    else:
                    ?>
                    
                    <?php
                     foreach($logo as $logo):
                        ?>
                <div class="user-logo"><img src="data:image/png;base64,<?=base64_encode($logo["path"]);?>" width="250px" height="250px" style="border-radius:50%"/></div>
                <div class="user-name">
                    
                    <?php
                    endforeach;
                    ?>
                    <?php
                    endif;
                    ?>
                <?=$post['firstname']?>
                
                    
            </div>
            <div class="user-surname">
            <a href="">  </a>
            </div>
            <div class="user-status">
          Cтатус:  <?=$post['stat']?>
        </div>
        <div class="user-bio">
        <?=$post['biography']?>
        </div> 
            </div>
            
           
<div class="user-posts" >
<?php
            foreach($poster as $item):
            
                ?>
            <div class="post-cab">
                <div class="post-cab-image"><img src="<?=$item['image'];?>" class="cab-img"></div>
                <div class="post-cab-title"></div>
            </div>
          
            
                        

<?php
endforeach;
?>
</div>
<?php 
if($_COOKIE['userlog'] == $post['Login']):
?>
<div class="user-setting">
   <a href="setings.php"> <img src="settings.png" width="20px" height="20px"></a>
</div>
<?php 
else:
?>

<?php 
endif;
?>

</section>


</body>
</html>
<?php


function get_posts(){

    global $link;

    $sql = "SELECT * FROM `user`";

    $result = mysqli_query( $link, $sql);

    

    $posts = mysqli_fetch_all($result, MYSQL_ASSOC);
    
    return $posts;
};

function get_id($post_id){

    $mysql = new mysqli('localhost', 'root', '', 'moodle');
/*
    $sql = "SELECT * FROM `user` WHERE `Login` =".$post_id;

    $rat = mysqli_query( $mysql, $sql);*/

    global $link;

    $sql = "SELECT * FROM `user` WHERE `Login` =  '$post_id' ";

    $result = mysqli_query($mysql, $sql);


    $post = mysqli_fetch_assoc($result);

    json_encode($post);
    
    return $post;
    

}
function get_post($post_id){

    $mysql = new mysqli('localhost', 'root', '', 'moodle');

    $sql = "SELECT * FROM `posts` WHERE `userlogin` = '$post_id' 
    ORDER BY `DATE` DESC";

    

    $result = mysqli_query($mysql, $sql);


   $poster = mysqli_fetch_all($result, MYSQL_ASSOC);

//    var_dump($poster);
    
    return $poster;

}

function get_logo($post_id){

    $mysql = new mysqli('localhost', 'root', '', 'moodle');

    $sql = "SELECT * FROM `logo` WHERE `userlogin` = '$post_id'";

    

    $result = mysqli_query($mysql, $sql);


   $logo = mysqli_fetch_all($result, MYSQL_ASSOC);
    
    
    
    return $logo;

}

?>