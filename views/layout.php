<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=APP_URL?>/public/assets/style.css">
    <title>Projekti - e-Commerce</title>
</head>
    <body>
        <nav>
            <ul>
                <li>
                    <a href="index.php"><img src="<?=APP_URL?>/public/assets/img/R&M-favicon-min.png" alt="logo"></a>
                </li>
                <li><input type="text" id="searchbar" placeholder="Search"></li>
                <li>
                    <a href="?controller=products&action=cart"><img src="<?=APP_URL?>/public/assets/img/bag.png" alt="bag"></a>
                    <button class="nav-bttn" id="login-button" onclick="toggle()"><img src="<?=APP_URL?>/public/assets/img/user.png"></button>
                </li>
            </ul>
            <script src="<?=APP_URL?>/public/assets/login-validation.js"></script>
        </nav>
        <div id="login-menu" style="display: none;">
            <div class="login-signup">
                <button class="close-login" onclick="toggle()"><img src="<?=APP_URL?>/public/assets/img/close.png" alt=""></button>
                <div class="switch-form">
                    <button id="switch-login" onclick="switchform()">Login</button>
                </div>
            </div>
            <form action="index.php" method="POST" id="LoginForm" >
                <input type="email" name="login-email" id="login-email" placeholder="Email*">
                <input type="password" name="login-password" id="login-password" placeholder="Password*">
                <button type="submit">Login</button>
            </form>
            <form action="index.php" method="POST" id="SignupForm" style="display: none;">
                <input type="text" name="signup-name" id="signup-name" placeholder="Name*">
                <input type="email" name="signup-email" id="signup-email" placeholder="Email*">
                <input type="password" name="signup-password" id="signup-password" placeholder="Password*">
                <button type="submit">Login</button>
            </form>
        </div>
        <div class="tricolumn">
            
            <div class="middle-column">
                <div id="boxes">
                <?php require_once('routes.php'); ?>
                </div>
            </div>
        
        </div>
        <footer>
            <ul>
                <li><a href="License.php">Copyright</a></li>
                <li><a href="?controller=pages&action=about">About Us</a></li>
                <li><a href="?controller=pages&action=contact">Contact</a></li>
            </ul>
        </footer>
    </body>
</html>