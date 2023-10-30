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
                <li><a class="Logo"><img src="assets/images/Logo.png" alt="Logo"></a></li>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="recipe.php">Nos Recettes</a></li>
                <li class="NavBarLiHasChildren">
                    <a href="creationRecette.php">Filtes<span>▼</span></a>
                    <ul class="SubMenu">
                        <li><a href="#">Catégories</a></li>
                        <li><a href="#">Titre</a></li>
                        <li><a href="#">Ingrédients</a></li>
                    </ul>
                </li>
                <?php

                    $_SESSION['admin'] = true; //TODO : Changer ce paramètre en attendant la connexion 

                    if(isset($_SESSION['userId']))
                    {
                        $um = new UserManager();
                        echo '<li><a href="registration.php">'.$um->getUserById(intval($_SESSION['userId']))->getUsername().'</a></li>';
                    }
                    else 
                    {
                        echo '<li><a href="registration.php">Login</a></li>';
                    }

                    if(isset($_SESSION['admin']) && $_SESSION['admin'] == true)
                    {
                        echo '<li><a href="admin.php">Admin</a></li>';
                    }
                ?>
          
            </ul>
        </nav>
    </header>