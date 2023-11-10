<!-- modal category -->
<div class="modalContainerCategory">
    <div class="ov triggerCategory"></div>
    <div class="popup" role="dialog" aria-describedby="dialogDesc" aria-labelledby="modalTitle" >
        <button aria-label="close modal" class="close-modal triggerCategory">X</button>
        <h1 id="modalTitle">Filtrer par catégorie</h1>

        <form method="POST" action="php/template/filterCategoryDisplay.php">
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

        <form method="POST" action="php/template/filterTitleDisplay.php">
            <div class="searchBox">
                <div class="row">
                    <input name="title" class="autocomplete" type="text" id="inputBox" placeholder="Chercher un titre" autocomplete="off" onkeyup="showHint(this.value)">
                </div>
                <div class="resultBox">
                </div>
                <button type="submit" value="" class="searchButton"><i class="fa-solid fa-magnifying-glass"></i></button>
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

        <form method="POST" action="php/template/filterIngredientDisplay.php">
        <label id="dialogDesc" for="ingredientSelect">Sélectionner un ingrédient (maintenir touche MAJ pour en sélectionner plusieurs)</label>
        <div class="selectDiv">
            <select name="ingredient" id="myMulti" class="select-box" multiple>
                <?php
                    $im = new IngredientManager();
                    foreach ($im->getIngredients() as $ingredient) {
                        echo "<option name=\"ingredient\" value=".$ingredient->getId().">".$ingredient->getName()."</option>";
                    }
                ?> 
            </select>
            <button type="submit" value="" class="searchButton"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <!--<input type="submit" value="Rechercher">-->
        </form>
    </div>
</div>