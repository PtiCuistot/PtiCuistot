<body>
    <header class="site-header">
        <button class="menu-btn" type="button" id="ShowNav">
            <span class="menu-btn__line"></span>
            <span class="menu-btn__line"></span>
            <span class="menu-btn__line"></span>
            <span class="menu-btn__line"></span>
            <span class="menu-btn__close"></span>
        </button>
        <nav class="NavBar" id="NavBar" style="border-bottom: 1px solid white;">
            <ul id="UlMenu">
                <li><a class="Logo"><img src="assets/images/Logo.png" alt="Logo"></a></li>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="recipe.php">Nos Recettes</a></li>
                <?php if(strpos($_SERVER['SCRIPT_NAME'], 'index.php') !== false) : ?>
                <li class="NavBarLiHasChildren">
                    <a>Filtres<span>▼</span></a>
                    <ul class="SubMenu">
                        <li><a class="triggerCategory" href="#">Catégories</a></li>
                        <li><a class="triggerTitle" href="#">Titre</a></li>
                        <li><a class="triggerIngredient" href="#">Ingrédients</a></li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php

                    if(isset($_SESSION['userId']))
                    {
                        $um = new UserManager();
                        echo '<li><a href="account.php">'.$um->getUserById(intval($_SESSION['userId']))->getUsername().'</a></li>';
                    }
                    else 
                    {
                        echo '<li><a href="login.php">Se connecter</a></li>';
                    }

                    if(isset($_SESSION['admin']) && $_SESSION['admin'] == true)
                    {
                        echo '<li><a href="admin.php">Page administration</a></li>';
                    }
                    
                ?>
          
            </ul>
        </nav>
    </header>