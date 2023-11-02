<!-- modal category -->
<div class="modalContainerCategory">
    <div class="ov triggerCategory"></div>
    <div class="popup" role="dialog" aria-describedby="dialogDesc" aria-labelledby="modalTitle" >
        <button aria-label="close modal" class="close-modal triggerCategory">X</button>
        <h1 id="modalTitle">Filtrer par categorie</h1>
        <p id="dialogDesc">Selectionnez votre filtre</p>

        <label for="categorySelect">Categorie:</label>
        <select name="category" id="categorySelect">
            <option value="">--Selectionnez une categorie--</option>
            <option value="starter">Entrée</option>
            <option value="dish">Plat</option>
            <option value="dessert">Dessert</option>
        </select>
    </div>
</div>

<!-- modal title -->
<div class="modalContainerTitle">
    <div class="ov triggerTitle"></div>
    <div class="popup" role="dialog" aria-describedby="dialogDesc" aria-labelledby="modalTitle" >
        <button aria-label="close modal" class="close-modal triggerTitle">X</button>
        <h1 id="modalTitle">Filtrer par titre</h1>
        <p id="dialogDesc">Selectionnez votre filtre</p>

        <div class="searchBox">
            <div class="row">
                <input class="autocomplete" type="text" id="inputBox" placeholder="cherchez un titre" autocomplete="off">
                <button class="searchButton"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="resultBox">
            </div>
        </div>
    </div>
</div>

<!-- modal ingredient -->
<div class="modalContainerIngredient">
    <div class="ov triggerIngredient"></div>
    <div class="popup" role="dialog" aria-describedby="dialogDesc" aria-labelledby="modalTitle" >
        <button aria-label="close modal" class="close-modal triggerIngredient">X</button>
        <h1 id="modalTitle">Filtrer par ingrédient</h1>
        <p id="dialogDesc">Selectionnez votre filtre</p>
    </div>
</div>