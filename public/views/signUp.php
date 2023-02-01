<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEEME - Sign Up</title>

    <link rel="stylesheet" type = "text/css" href="/public/css/signInUp.css">
    <script type="text/javascript" src="./public/js/signUpValidation.js" defer></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;400;800&family=Koulen&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="panel-left">
            <div class="header">
                <span id="welcome-to"><b>Welcome to</span> <br>
                <span id="meeme">MEEME</b></span>
            </div>
            <div class="form-container">
                <form action="register" method="POST">
                    <span class="form-title">Sign up...</span>
                    <span class="form-info">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message){
                            echo $message;
                        }
                    }
                    ?>
                    </span>
                    <input name="login" type="text" placeholder="Login">
                    <input name="password" type="password" placeholder="Password">
                    <input name="email" type="text" placeholder="Email">
                    <div class="button-container">
                        <button class="sign-in link" type="submit">Sign Up</button>
                        <a href="signIn"><button class="sign-up link" type="button">Already have?<br> Sign In</button></a>
                    </div>
                </form>
            </div>
        </div>
        <div class="panel-right">
            <span id="daily-dose-of">DAILY DOSE OF</span><br>
            <span class="meemes">MEEMES</span>
        </div>
    </div>
</body>
</html>