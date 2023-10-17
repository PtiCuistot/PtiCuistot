<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Accueil</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../assets/styles/style.css">
        <link rel="stylesheet" href="../../assets/styles/NavBar.css">
        <link rel="stylesheet" href="../../assets/styles/Footer.css">
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
                    <li><a><img src="../../assets/images/Logo.png" alt="Logo"></a></li>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Nos Recettes</a></li>
                    <li class="NavBarLiHasChildren">
                        <a href="#">Filtes<span>▼</span></a>
                        <ul class="SubMenu">
                            <li><a href="#">Catégories</a></li>
                            <li><a href="#">Titre</a></li>
                            <li><a href="#">Ingrédients</a></li>
                        </ul>
                    </li>
                    <li><a href="Connexion.php">Connexion</a></li>
                </ul>
            </nav>
        </header>

        <div class="Content">
            <div>
                
            </div>
            <div class="TwoRow">
                <div class="DernieresRecettes">
                    <h1>LES DERNIÈRES RECETTES</h1>
                    <div>
                        <img src="" alt="Image Recette">
                        <p>AAA</p>
                    </div>
                    <div>
                        <img src="" alt="Image Recette">
                        <p>AAA</p>
                    </div>
                    <div>
                        <img src="" alt="Image Recette">
                        <p>AAA</p>
                    </div>
                </div>
                <div class="Edito">
                    <div class="center">
                        <img src="../../assets/images/Pticuisto.png" alt="PtiCuisto img">
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer imperdiet congue neque non vulputate. Duis ultricies iaculis tincidunt. Vivamus a pellentesque sem. Nam tempus et metus in tempor. Nunc venenatis, risus fermentum sagittis vestibulum, eros nibh vehicula quam, in mattis augue lorem in magna. Nullam id nibh interdum, accumsan tellus sit amet, imperdiet turpis. Morbi ullamcorper dui ut ligula dignissim porttitor. Pellentesque quam libero, vehicula vitae fermentum eget, volutpat sit amet magna. Sed aliquet, purus non mattis semper, velit tortor dapibus mi, in tempor urna lacus sagittis ligula.
                    </p>
                </div>
            </div>
        </div>

        <footer>
            <div class="centerFooter">
                <div class="footerTeam">
                    <p>Created by</p>
                    <div class="Team">
                        <p>Andgel Brissaud</p>
                        <p>Clément Baratin </p>
                        <p>Cyprien De La Poëze D'harambure</p>
                        <p>Gabriel Hareng</p>
                    </div>
                </div>
                <div class="ContactUs" id="ContactUs">
                    <p>Media</p>
                    <div class="Media">
                        <img src="../../assets/images/facebook.png" alt="Link to Facebook" id="FooterFacebook">
                        <img src="../../assets/images/linkedin.png" alt="Link to Linkedin" id="FooterLinkedin">
                        <img src="../../assets/images/twitter.png" alt="Link to Twitter" id="FooterTwitter">
                    </div>
                </div>
            </div>
        </footer>

        <script src="../../assets/scripts/script.js"></script>
        <script src="../../assets/scripts/NavBar.js"></script>
    </body>
</html>