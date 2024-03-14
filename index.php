<?php
header('Content-Type: text/html; charset=utf-8');
mb_internal_encoding('utf-8');

$post_id = $_GET['login'];
$name = $_COOKIE['userlog'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moodle Doodle</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    

    <?php 
if($_COOKIE['userlog'] == ""):
?>

<section class="unregistered">
<div class="unregistered-container">
    <div class="unregistered-wrapper">
        <div class="unregistered-content">
            
        </div>
    </div>
</div>
</section>

<section class="features">
    <div class="features-container">
        <div class="features-wrapper">
            <div class="features-content">
                <div class="phone-item">
                    <div class="phone-item-container">
                        <div class="phone-item-top"> 
                            <div class="phone-item-camera">
                                <div class="phone-item-cameras">
                                    <div class="phone-item-loop"></div>
                                </div>
                        </div>
                    </div>
                    <div class="phone-item-bottom">
                        <div class="phone-item-button">
                            <div class="phone-item-button2"></div>
                    </div>
                    </div>
                        <div class="phone-item-register">
                            <form action="auth.php" method="post" class="phone-item-form" >
                                <div class="phone-item-log">
                                    <p class="phone-login-text">Ваш логін</p>
                                </div>
                                    <input type="text" class="phone-form" placeholder="Введіть ваш логін" id="alogin" name="alogin">
                                
                                <div class="phone-item-login">
                                    <p class="phone-login-text">Ваш пароль</p>
                                </div>
                                    <input type="password" class="phone-form" placeholder="Введіть ваш пароль" id="apass" name="apass">
                                
                                <div class="phone-registration-btn" >
                                    <button class="phone-regbtn">
                                    Увійти
                                </button>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
                <div class="phone-item-second">
                    <img src="../phone-item.png" class="phone-item-logo">
                </div>
            </div>
        </div>
    </div>
</section>
<?php
else:
?>
<section class="friend-list">
    <div class="friend-list-content" >
        <?php
        $friend = get_friend($name);

        

        ?>
        <?php
        foreach($friend as $friend):
         ?>
         <?php 
                                 $postfriend = $friend['friendlogin'];
                                 //var_dump($postfriend);
        ?>
        
    
        <div class="friend-list-friends-item">
            <div class="friend-list-friends-logo">
                <a href="cab.php?login=<?=$friend['friendlogin']?>">
                <img src="<?=$friend['friendimage'];?>" style="width:100px; height:100px; border-radius: 50%;">
                </a>
            </div>
            
        </div>
      
        <?php
        endforeach;
        ?>
    </div>
</section>
    <section class="main-index">
        <div class="main-index-container">
            <div class="main-index-wrapper">
                <div class="main-index-content">
                    
                
                    <div class="main-index-news">
                        <?php
                        $poster = get_post();
                        $post = get_posts($name);
                        
                        //var_dump($friend);
                        ?>
        <?php
            foreach($poster as $item):
        ?>
            <div class="post">
                <div class="post-image-index"><img src="<?=$item['image'];?>" style="height:100%; width:100%;"></div>
                <div ><img src="<?=$item['userimage'];?>" class="userlogo"></div>
                <div class="post-title"><p style="margin-top:30px; margin-left:50px; font-family: LutskCity; font-size: 15px;"><?=$item['userlogin'];?></p></div>
                <div class="post-text" style="margin-left:160px; margin-top:-20px; font-size:20px; font-family: LutskCity ;"><?=$item['text'];?></div>
            </div>
            
                        

        <?php
            endforeach;
        ?>
        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <section class="user-menu-panel">
    <div class="user-menu-panel-container">
        <div class="user-menu-panel-wrapper">
            <div class="user-menu-panel-content">
                <div class="user-menu-panel-list">
                    <ul>
                        <li><a href="/cab.php?login=<?=$_COOKIE['userlog']?>">Профіль</a></li>
                        <li>Друзі</li>
                        <li>Чати</li>
                        <li>Нові користувачі</li>
                        <li>Налаштування</li>
                        <li><a href="exit.php">Вихід</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
    <?php
    foreach($post as $panel):
        ?>
   
    <?php
    endforeach;
    ?>
    <?php
    endif;
    ?>


</body>
</html>

<?php
function get_post(){

    $mysql = new mysqli('localhost', 'root', '', 'moodle');

    $sql = "SELECT * FROM `posts` 
    ORDER BY `DATE` DESC";

    $result = mysqli_query($mysql, $sql);


   $poster = mysqli_fetch_all($result, MYSQL_ASSOC);


    
    return $poster;

}

function get_posts($name){

    $mysql = new mysqli('localhost', 'root', '', 'moodle');

    $sql = "SELECT * FROM `user` WHERE `login` = '$name' ";

    $result = mysqli_query($mysql, $sql);

    


   $post = mysqli_fetch_all($result, MYSQL_ASSOC);


    json_encode($post);
    return $post;

}

function get_friend($name){

    $mysql = new mysqli('localhost', 'root', '', 'moodle');

    $sql = "SELECT * FROM `friendlist` WHERE `userlogin` = '$name' ";

    $result = mysqli_query($mysql, $sql);



   $friend = mysqli_fetch_all($result, MYSQL_ASSOC);

    return $friend;

}
?>