<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
        <link rel="stylesheet" href="../../assets/styles/style.css">
        <link rel="stylesheet" href="../../assets/styles/NavBar.css">
    </head>
    <body>
        <header class="site-header">
            <button class="menu-btn" type="button" id="ShowNav">
                <span class="menu-btn__line"></span>
                <span class="menu-btn__line"></span>
                <span class="menu-btn__line"></span>
                <span class="menu-btn__line"></span>
                <span class="menu-btn__close"></span>
            </button>
            <nav class="NavBar" id="NavBar">
                <ul id="UlMenu">
                    <li><a href="index.html">Logo</a></li>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Nos Recettes</a></li>
                    <li class="NavBarLiHasChildren">
                        <a href="#">Filtes<span>▼</span></a>
                        <ul class="SubMenu">
                            <li><a href="#">Inscription</a></li>
                            <li><a href="#">Subpage 2</a></li>
                            <li><a href="#">Connexion</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Connexion</a></li>
                </ul>
            </nav>
        </header>

        <form action="../treatment/treatment_login.php" method="post">
            <label for="email_input">Email</label>
            <input type="email" name="email_input" id="email_input" required></input>
            <label for="password_input">Mot de passe</label>
            <input type="password" name="password_input" id="password_input" required></input>
            <button type="submit">Se connecter</button>
        </form>

        <footer>
            <div class="centerFooter">
                <div class="footerTeam">
                    <p>Created by</p>
                    <div class="Team">
                        <p>Andgel Brissaud & Gabrielle Harang</p>
                    </div>
                </div>
                <div class="ContactUs" id="ContactUs">
                    <p>Media</p>
                    <div class="Media">
                        <img src="img/githubPumpkin.png" alt="Link to Github" id="FooterGithub">
                        <img src="img/linkedinPumpkin.png" alt="Link to Linkedin" id="FooterLinkedin">
                        <img src="img/mailPumpkin.png" alt="Link to Mail" id="FooterMail" href="mailto:cyprien.delapoeze-dharambure@etu.unicaen.fr?subject=Hello%20World&body=I%20hope%20you%20are%20doing%20well.">
                    </div>
                </div>
            </div>
        </footer>

        <script src="../../assets/scripts/script.js"></script>
        <script src="../../assets/scripts/NavBar.js"></script>
    </body>
</html>