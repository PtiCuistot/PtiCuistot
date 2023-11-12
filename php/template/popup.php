<!-- modal category -->
<div class="modalContainerCategory">
    <div class="ov triggerCategory"></div>
    <div class="popup" role="dialog" aria-describedby="dialogDesc" aria-labelledby="modalTitle" >
        <button aria-label="close modal" class="close-modal triggerCategory">X</button>
        <h1 id="modalTitle">Filtrer par catégorie</h1>

        <form method="POST" action="result.php?type=c">
        <label id="dialogDesc" for="categorySelect">Sélectionner une catégorie</label>
        <div class="selectDiv">
            <select name="category" id="categorySelect" class="select-box">
                <option value="">Catégorie</option>
                <?php
                    $cm = new CategoryManager();
                    foreach ($cm->getCategories() as $category) {
                        echo "<option name=\"category\" value=".$category[0]->getId().">".$category[0]->getTitle()."</option>";
                    }
                ?> 
            </select>
            <button type="submit" value="" class="searchButton"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <!--<input type="submit" value="Rechercher">-->
        </form>
    </div>
</div>

<!-- modal title -->
<div class="modalContainerTitle">
    <div class="ov triggerTitle"></div>
    <div class="popup" role="dialog" aria-describedby="dialogDesc" aria-labelledby="modalTitle" >
        <button aria-label="close modal" class="close-modal triggerTitle">X</button>
        <h1 id="modalTitle">Filtrer par titre</h1>

        <form method="POST" action="result.php?type=t">
            <div class="searchBox">
            <div class="flexDiv">
                    <div class="row">
                        <input name="title" class="autocomplete" type="text" id="inputBox" placeholder="Chercher un titre" autocomplete="off" onkeyup="showHint(this.value)">
                    </div>
                    <div class="resultBox">
                    </div>
                    <button type="submit" value="" class="searchButton"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- modal ingredient -->
<div class="modalContainerIngredient">
    <div class="ov triggerIngredient"></div>
    <div class="popup" role="dialog" aria-describedby="dialogDesc" aria-labelledby="modalTitle" >
        <button aria-label="close modal" class="close-modal triggerIngredient">X</button>
        <h1 id="modalTitle">Filtrer par ingrédient</h1>

        <form method="POST" action="result.php?type=i" onsubmit="return selectAll()" checked>
        <label id="dialogDesc" for="ingredientSelect">Sélectionner un/des ingrédient.s </label>
        <div class="flexDiv">
            <div class="selectDiv">
                <ul>
                    <?php
                        $im = new IngredientManager();
                        foreach ($im->getIngredients() as $ingredient) {
                            echo "<li class=\"checkbox-wrap\">
                                    <input type=\"checkbox\" name=\"ingredient[]\" id=\"".$ingredient->getId()."_ID\" value=".$ingredient->getId().">
                                    <label for=\"".$ingredient->getId()."_ID\">". $ingredient->getName() ."</label>
                                  </li>";
                        }
                    ?> 
                </ul>
            </div>
            <button type="submit" value="submit" class="searchButton"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        </form>
    </div>
</div>