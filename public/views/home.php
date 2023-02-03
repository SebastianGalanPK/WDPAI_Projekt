<?php
    session_start();
    require_once __DIR__.'/../../src/models/User.php';
    require_once __DIR__.'/../../src/models/Meme.php';
    require_once __DIR__.'/../../src/repository/MemeRepository.php';
    require_once __DIR__.'/../../src/controllers/MemeController.php';

    if(isset($_SESSION['user_session'])){
        $user = unserialize($_SESSION['user_session']);
    }

    $mr = new MemeRepository();
    $mc = new MemeController();

    if(!isset($memes) || $memes == null){
        $memes = $mr->getMeme();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;800&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/2282473dfd.js" crossorigin="anonymous"></script>

    <script type="text/javascript" src="/public/js/search.js" defer></script>
    <script type="text/javascript" src="/public/js/memeManager.js" defer></script>
    <script type="text/javascript" src="/public/js/communityManager.js" defer></script>
</head>
<body>
    <div class="container">
        <div id="post-a-new-meme-container">
            <div class="container">
                <span id="PANM-header">Post a new meme!</span>
                <span class="form-info">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message){
                            echo $message;
                        }
                    }
                    ?>
                </span>
                <form action="addNewMeme" method="POST" ENCTYPE="multipart/form-data">
                    <label for="PANM-community">Select community:  </label>
                    <select name="id_community" id="PANM-community" style="width:200px;">
                        <option value="0">Home</option>
                        <?php
                        if(isset($_SESSION['user_session'])){
                            foreach ($user->getCommunity() as $c):?>
                                <option value="<?= $c->getID(); ?>"><?= $c->getName(); ?></option>
                        <?php endforeach; }?>
                    </select>

                    <input name="text" id="PANM-text" type="text" placeholder="Text (optional)">
                    <div id="PANM-wrapper">
                        <input id="upload" type="file" name="file">
                        <label for="upload">Upload</label>
                    </div>
                    
                    <div id="PANM-buttons">
                        <button id="BCancel" type="button" onclick="togglePostANewMeme()">CANCEL</button>
                        <button id="BPost">POST</button>
                    </div>
                </form>

            </div>
        </div>

        <div id="create-a-new-community-container">
            <div class="container">
                <div class="header">Create a new community</div>

                <form action="addNewCommunity" method="POST" ENCTYPE="multipart/form-data">
                    <label for="Comm-name">Name:  </label><br>
                    <input name="comm-name" id="comm-name" type="text" placeholder="Name"><br><br>
                    <label for="Comm-shortname">Shortname:  </label><br>
                    <input name="comm-shortname" id="comm-shortname" type="text" placeholder="Short name">
                    
                    <div class="comm-buttons">
                        <button id="BCancel" type="button" onclick="toggleCreateANewCommunity()">CANCEL</button>
                        <button id="BPost">CREATE</button>
                    </div>
                </form>

            </div>
        </div>                        

        <div id="bg-button" onmouseenter="toggleSearchResult()">

        </div>

        <div id="panel-left">
            <div class="panel-left-left">
                <a href="/index.php"><img src="/public/img/logo150x29.png"></a>
            </div>
            <div class="panel-left-right">

                <input id="community-search" type="text" placeholder="Search" onclick="toggleSearchResult()">

                <div id="search-result">
                    <div id="search-result-content">
                        
                    </div>
                    <div id="create-a-new-community" onclick="toggleCreateANewCommunity()">
                        Create a new community
                    </div>
                </div>        


                <div class="nav-main">
                    <a href="/index.php"><div class="button">
                        <div class="icon"><i class="fa-solid fa-circle-user"></i></div>
                        <div class="name">Home</div>
                        </div></a>
                    <a href="/favourite/"><div class="button">
                        <div class="icon"><i class="fa-solid fa-circle-user"></i></div>
                        <div class="name">Top</div>
                        </div></a>
                    <div class="button">
                        <div class="icon"><i class="fa-solid fa-circle-user"></i></div>
                        <div class="name">Last</div>
                    </div>
                    <a href="/favourite/"><div class="button">
                        <div class="icon"><i class="fa-solid fa-circle-user"></i></div>
                        <div class="name">Favourite</div>
                    </div></a>
                </div>

                <div class="nav-user"
                    <?php if(isset($_SESSION['user_session'])){ ?>
                        style="display: block" 
                        <?php } else { ?>
                            style="display: none"
                        <?php } ?>  
                >
                    <div class="header">
                        Your community
                    </div>

                    <div class="community-list">
                        <?php
                            if(isset($_SESSION['user_session'])){
                                if($user->getCommunity()!=null){
                                    foreach ($user->getCommunity() as $l): ?>
                                        <div class="community" id="<?=$l->getNickname()?>">
                                            <div class="cm-button">
                                                <div class="cm-icon"><i class="fa-solid fa-circle-user"></i></div>
                                                <div class="cm-name"><?=$l->getName()?></div>
                                            </div>
                                            <div class="cm-star-button" style="color: yellow">
                                                <div class="icon"><i class="fa-solid fa-star"></i></div>
                                            </div>

                                        </div>
                                    <?php endforeach;
                                }
                             }?>
                    </div>

                </div>

                <button class="post-new-meme" id="post-a-new-meme-button" onclick="togglePostANewMeme()">
                    Post a new meme
                </button>

                <div id="button-down-wrapper" <?php if(isset($_SESSION['user_session'])){
                    ?>style="display: none"<?php } 
                    else{ ?>
                        style="display: block" <?php
                    }
                    ?>>
                    <div class="button-down">
                        <a href="signIn">
                            <div class="button sign-in">
                                Sign In
                            </div>
                        </a>

                        <a href="signUp">
                            <div class="button sign-up">
                                Sign Up
                            </div>
                        </a>
                    </div>
                </div>

                <div id="user-info-wrapper" <?php if(isset($_SESSION['user_session'])){
                    ?>style="display: flex"<?php } 
                    else{ ?>
                        style="display: none" <?php
                    }
                    ?>>
                    <div id="user-info-menu" class="user-info">
                        <div class="user-logo">
                            <i class="fa-solid fa-circle-user"></i>
                        </div>
                        <div class="user-nick">
                            <?php
                                if(isset($_SESSION['user_session'])){
                                    echo $user->getLogin();
                                }
                            ?>
                        </div>
                        <form action="logout" method="POST">
                            <button type="submit" formaction="logout" formmethod="POST">
                                <div class="user-button">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                </div>
                            </button>
                        </form>
                    </div>
                </div>

            </div>


        </div>
        <div class="panel-center">
            <div class="header">
                <button id="menu-button" onclick="toggleMenu()">
                    <i class="fa-solid fa-bars"></i>
                </button>
                
                <span id="community-name">
                    <?php
                    $path = trim($_SERVER['REQUEST_URI'], '/');
                    $path = parse_url($path, PHP_URL_PATH);
                    $urlParts = explode("/", $path);

                    $action = $urlParts[0];

                    if($action=="community"){
                        $action = 'home';
                        $id = $urlParts[1] ?? '';
                        $cr = new CommunityRepository();
                        $id = $cr->convertNicknameToName($id);
                    }
                    else if($action=="favourite"){
                        $id = 'Favourite';
                    }
                    else if($action=="top"){
                        $id = 'Top';
                    }
                    else{
                        $id = "Home";
                    }
                    echo $id;

                    ?>

                </span>
            </div>

            <?php
                foreach ($memes as $meme){
                    ?>
            <div class="meme-container" id="<?php echo $meme->getID() ?>">
                <div class="meme-header">
                    <div class="user">
                        <div class="user-icon"><i class="fa-solid fa-circle-user"></i></div>
                        <div class="user-name"> <?php echo $meme->getUserName(); ?></div>
                    </div>
                    <div class="community-name" <?php if($meme->getCommunityName() == ""){
                        ?> style="display: none" <?php
                    } ?> >@<?php echo $meme->getCommunityName(); ?></div>
                </div>

                <?php $text = $meme->getText(); ?>
                <div class="meme-text" <?php if($text=="") {
                    ?>style="display: none"<?php
                } ?> >
                    <?php echo $text ?>
                </div>

                <div class="meme-content">
                    <img src="<?=$meme->getPath();?>">
                </div>

                <div class="meme-footer">
                    <div class="meme-footer-panel-left">
                        <button class="like-button"
                        <?php if(isset($_SESSION['user_session']) && $mr->checkUserRate($meme->getID(), $user->getID()) > 0){
                            ?>style="color: green"<?php
                        }?>
                        > <i class="fa-solid fa-square-caret-up"></i></button>

                        <button class="dislike-button"
                                <?php if(isset($_SESSION['user_session']) && $mr->checkUserRate($meme->getID()."", $user->getID()) < 0){
                                ?>style="color: red"<?php
                        }?>
                        ><i class="fa-solid fa-square-caret-down"></i></i></button>



                        <span class="vote-number">
                            <?php
                                echo $meme->getRate();
                            ?>
                        </span>
                    </div>

                    <div class="meme-footer-panel-right">
                        <button class="favourite-meme-button" <?php if(isset($_SESSION['user_session']) && $user->checkIfPlayerLikesMeme($meme->getID())){
                            ?>style="color: yellow"<?php } else {
                                ?>style="color: white"<?php
                            }
                        ?>><i class="fa-solid fa-star"></i></button>

                        <?php if(isset($_SESSION['user_session']) && $user->getRank()==1){
                            echo "<button class=\"remove-button\"><i class=\"fa-solid fa-trash-can\"></i></i></button>";
                        }?>

                    </div>
                </div>
            </div>

                <?php
                }
            ?>
        </div>
        <div class="panel-right">
            <div id="user-info-right" class="user-info" <?php if(isset($_SESSION['user_session'])){
                ?>style="display: flex"<?php } ?>>
                <div class="user-logo">
                    <i class="fa-solid fa-circle-user"></i>
                </div>
                <div class="user-nick">
                    <?php
                        if(isset($_SESSION['user_session'])){
                            echo $user->getLogin();
                        }
                    ?>
                </div>
                <form action="logout" method="POST">
                    <button type="submit" formaction="logout" formmethod="POST">
                        <div class="user-button">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </div>
                    </button>
                </form>
            </div>

            <div id="signInUpButton" <?php if(isset($_SESSION['user_session'])){
                ?>style="display: none"<?php } ?>>
                <a href="signIn">
                    <div class="button sign-in">
                        Sign In
                    </div>
                </a>

                <a href="signUp">
                    <div class="button sign-up">
                        Sign Up
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>

<template id="community-template">
    <div class="community">
        <div class="cm-button">
            <div class="cm-icon"><i class="fa-solid fa-circle-user"></i></div>
            <div class="cm-name">community-name</div>
        </div>
        <div class="cm-star-button">
            <div class="icon"><i class="fa-solid fa-star"></i></div>
        </div>
    </div>
</template>

<script type="text/javascript">
    function toggleMenu(){
        var panel = document.getElementById("panel-left");
        var bg_button = document.getElementById("bg-button");
        if(panel.style.display=='' || panel.style.display=='none' || panel.style.display=='flex'){
            panel.setAttribute('style', 'display: initial !important');
            bg_button.setAttribute('style', 'display: initial');
        }
        else{
            panel.setAttribute('style', 'display: none !important');
            bg_button.setAttribute('style', 'display: none');
        }
    }

    var bg_button = document.getElementById("bg-button");
    if(bg_button!=null){
        bg_button.addEventListener('click', function handleClick() {
            toggleMenu();
        });
    }
</script>

<script type="text/javascript">
    function togglePostANewMeme(){
        var panel = document.getElementById("post-a-new-meme-container");

        if(panel.style.display=='flex'){
            panel.setAttribute('style','display: none !important');
        }
        else{
            panel.setAttribute('style','display: flex !important');
        }
    }

    function toggleSearchResult(){
        var search_result = document.getElementById("search-result");
        var bg_button = document.getElementById("bg-button");

        if(search_result.style.display=='block'){
            search_result.setAttribute('style','display: none !important');
            bg_button.setAttribute('style','display: none !important');
        }
        else{
            search_result.setAttribute('style','display: block !important');
            bg_button.setAttribute('style','display: block !important');
        }
    }

    function toggleCreateANewCommunity(){
        var panel = document.getElementById("create-a-new-community-container");

        if(panel.style.display=='flex'){
            panel.setAttribute('style','display: none !important');
        }
        else{
            panel.setAttribute('style','display: flex !important');
        }
    }
</script>

<script type="text/javascript">
        //Walka z responsywnością
        function checkSize() {
            var panel = document.getElementById("panel-left");
            var bg_button = document.getElementById("bg-button");
            if (window.innerWidth >= 900 && panel.style.display=='none') {
                panel.setAttribute('style', 'display: initial');
            }
            if (window.innerWidth >= 1100 && panel.style.display=='initial') {
                panel.setAttribute('style', 'display: flex');
            }

            if(window.innerWidth>=900){
                bg_button.setAttribute('style', 'display: none;');
            }

            if(window.innerWidth<900 && panel.style.display=='initial'){
                bg_button.setAttribute('style', 'display: initial');
            }
        }
        function firstLoad(){
            var panel = document.getElementById("panel-left");
            panel.setAttribute('style', 'display: flex');
        }
        window.onresize = checkSize;
        window.onload = firstLoad;
</script>

</html>