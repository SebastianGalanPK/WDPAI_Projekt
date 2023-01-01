<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;800&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/2282473dfd.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
        <div id="post-a-new-meme-container">
            <div class="container">
                <span id="PANM-header">Post a new meme!</span>

                <form>
                    <input id="PANM-text" type="text" placeholder="Text (optional)">
                    <div id="PANM-wrapper">
                        <input id="upload" type="file">
                        <label for="upload">Upload</label>
                    </div>
                    
                    <div id="PANM-buttons">
                        <button id="BCancel">CANCEL</button>
                        <button id="BPost">POST</button>
                    </div>
                </form>

            </div>
        </div>
        <div id="bg-button">

        </div>

        <div id="panel-left">
            <div class="panel-left-left">
                <img src="public/img/logo150x29.png">
            </div>
            <div class="panel-left-right">
                <form>
                    <input type="text" placeholder="Search">
                </form>

                <div class="nav-main">
                    <div class="button">
                        <div class="icon"><i class="fa-solid fa-circle-user"></i></div>
                        <div class="name">Favourite</div>
                    </div>
                    <div class="button">
                        <div class="icon"><i class="fa-solid fa-circle-user"></i></div>
                        <div class="name">Favourite</div>
                    </div>
                    <div class="button">
                        <div class="icon"><i class="fa-solid fa-circle-user"></i></div>
                        <div class="name">Favourite</div>
                    </div>
                    <div class="button">
                        <div class="icon"><i class="fa-solid fa-circle-user"></i></div>
                        <div class="name">Favourite</div>
                    </div>
                </div>

                <div class="nav-user">
                    <div class="header">
                        Your community
                    </div>

                    <div class="community-list">
                        <div class="button">
                            <div class="icon"><i class="fa-solid fa-circle-user"></i></div>
                            <div class="name">Favourite</div>
                        </div>
                        <div class="button">
                            <div class="icon"><i class="fa-solid fa-circle-user"></i></div>
                            <div class="name">Favourite</div>
                        </div>
                        <div class="button">
                            <div class="icon"><i class="fa-solid fa-circle-user"></i></div>
                            <div class="name">Favourite</div>
                        </div>
                        <div class="button">
                            <div class="icon"><i class="fa-solid fa-circle-user"></i></div>
                            <div class="name">Favourite</div>
                        </div>

                        <div class="button">
                            <div class="icon"><i class="fa-solid fa-circle-user"></i></div>
                            <div class="name">Favourite</div>
                        </div>

                        <div class="button">
                            <div class="icon"><i class="fa-solid fa-circle-user"></i></div>
                            <div class="name">Favourite</div>
                        </div>

                        <div class="button">
                            <div class="icon"><i class="fa-solid fa-circle-user"></i></div>
                            <div class="name">Favourite</div>
                        </div>

                        <div class="button">
                            <div class="icon"><i class="fa-solid fa-circle-user"></i></div>
                            <div class="name">Favourite</div>
                        </div>

                        <div class="button">
                            <div class="icon"><i class="fa-solid fa-circle-user"></i></div>
                            <div class="name">Favourite</div>
                        </div>

                        <div class="button">
                            <div class="icon"><i class="fa-solid fa-circle-user"></i></div>
                            <div class="name">Favourite</div>
                        </div>

                        <div class="button">
                            <div class="icon"><i class="fa-solid fa-circle-user"></i></div>
                            <div class="name">Favourite</div>
                        </div>

                        <div class="button">
                            <div class="icon"><i class="fa-solid fa-circle-user"></i></div>
                            <div class="name">Favourite</div>
                        </div>

                        <div class="button">
                            <div class="icon"><i class="fa-solid fa-circle-user"></i></div>
                            <div class="name">Favourite</div>
                        </div>

                        <div class="button">
                            <div class="icon"><i class="fa-solid fa-circle-user"></i></div>
                            <div class="name">Favourite</div>
                        </div>
                    </div>

                </div>

                <div class="post-new-meme">
                        Post a new meme
                </div>

                <div class="button-down">
                    <a href="signIn.php">
                        <div class="button sign-in">
                            Sign In
                        </div>
                    </a>

                    <a href="signUp.php">
                        <div class="button sign-up">
                            Sign Up
                        </div>
                    </a>
                </div>
            </div>


        </div>
        <div class="panel-center">
            <div class="header">
                <button id="menu-button" onclick="toggleMenu()">
                    <i class="fa-solid fa-bars"></i>
                </button>
                
                <span id="community-name">Home</span>
            </div>

            <div class="meme-container">
                <div class="meme-header">
                    <div class="user">
                        <div class="user-icon"><i class="fa-solid fa-circle-user"></i></div>
                        <div class="user-name">UserName24142</div>
                    </div>
                    <div class="community-name">@Poland</div>
                </div>
                <div class="meme-text">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </div>
                <div class="meme-content">
                    <img src="public/img/m1.jpg">
                </div>
                <div class="meme-footer">
                    <div class="meme-footer-panel-left">
                        <button><i class="fa-solid fa-square-caret-up"></i></button>
                        <button><i class="fa-solid fa-square-caret-down"></i></i></button>
                        <span class="vote-number">2981</span>
                    </div>

                    <div class="meme-footer-panel-right">
                        <button><i class="fa-solid fa-star"></i></button>
                        <button><i class="fa-solid fa-trash-can"></i></i></button>
                    </div>
                </div>
            </div>

            <div class="meme-container">
                <div class="meme-header">
                    <div class="user">
                        <div class="user-icon"><i class="fa-solid fa-circle-user"></i></div>
                        <div class="user-name">UserName24142</div>
                    </div>
                    <div class="community-name">@Poland</div>
                </div>
                <div class="meme-text">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </div>
                <div class="meme-content">
                    <img src="public/img/m2.jpg">
                </div>
                <div class="meme-footer">
                    <div class="meme-footer-panel-left">
                        <button><i class="fa-solid fa-square-caret-up"></i></button>
                        <button><i class="fa-solid fa-square-caret-down"></i></i></button>
                        <span class="vote-number">2981</span>
                    </div>

                    <div class="meme-footer-panel-right">
                        <button><i class="fa-solid fa-star"></i></button>
                        <button><i class="fa-solid fa-trash-can"></i></i></button>
                    </div>
                </div>
            </div>

            <div class="meme-container">
                <div class="meme-header">
                    <div class="user">
                        <div class="user-icon"><i class="fa-solid fa-circle-user"></i></div>
                        <div class="user-name">UserName24142</div>
                    </div>
                    <div class="community-name">@Poland</div>
                </div>
                <div class="meme-text">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </div>
                <div class="meme-content">
                    <img src="public/img/m3.jpg">
                </div>
                <div class="meme-footer">
                    <div class="meme-footer-panel-left">
                        <button><i class="fa-solid fa-square-caret-up"></i></button>
                        <button><i class="fa-solid fa-square-caret-down"></i></i></button>
                        <span class="vote-number">2981</span>
                    </div>

                    <div class="meme-footer-panel-right">
                        <button><i class="fa-solid fa-star"></i></button>
                        <button><i class="fa-solid fa-trash-can"></i></i></button>
                    </div>
                </div>
            </div>


        </div>
        <div class="panel-right">
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
</body>

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