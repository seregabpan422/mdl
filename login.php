<?php
header('Content-Type: text/html; charset=utf-8');
mb_internal_encoding('utf-8');
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moodle doodle</title>
    <link rel="stylesheet" href="css/style.css">
    
</head>
<script src="script.js">
    
</script>
<body class="loginbg">
   
    <section class="regform">
        <div class="regform-container">
            <div class="regform-wrapper">
                <div class="regform-content">
                    <div class="registration">
                        <div class="regform-registrat">
                    <form action="check.php" method="post" class="reg-form" >
                        <div class="regform-login">
                            <p class="reg-text">Бажаний логін</p>
                        </div>
                            <input type="text" class="form-input" placeholder="Введіть бажаний логін" id="login" name="login">
                        
                        <div class="regform-login">
                            <p class="reg-text">Бажаний пароль</p>
                        </div>
                            <input type="password" class="form-input" placeholder="Введіть бажаний пароль" id="pass" name="pass">
                        
                        <div class="registration-btn" >
                            <button class="regbtn">
                            Зареєструватися
                        </button>
                        </div>
                    </form>
                    </div>
                <div class="login">
                    <div class="login-form">
                <form action="auth.php" method="post" class="reg-form" >
                        <div class="regform-login">
                            <p class="login-text">Ваш логін</p>
                        </div>
                            <input type="text" class="form-input" placeholder="Введіть ваш логін" id="alogin" name="alogin">
                        
                        <div class="regform-login">
                            <p class="login-text">Ваш пароль</p>
                        </div>
                            <input type="password" class="form-input" placeholder="Введіть ваш пароль" id="apass" name="apass">
                        
                        <div class="registration-btn" >
                            <button class="regbtn">
                            Увійти
                        </button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <section class="author">
        <div class="author-title">
            Sheptalov@2022
        </div>
    </section>
</body>
</html>