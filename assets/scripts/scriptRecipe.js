let RecipeId = 0;
if(document.getElementById("row")){
    for(let i = 0; i < 10; i++){
        AddRecipe();
    }
}

if(document.getElementById("ButtonShowMoreRecipe")){
    document.getElementById("ButtonShowMoreRecipe").addEventListener("click", function(){

        for(let i = 1; i < 11; i++){
            AddRecipe(i);
        }
        document.getElementById("DivRecipe" + (RecipeId - 10)).scrollIntoView({ behavior: "smooth" });
        event.preventDefault();
    });
}


function AddRecipe(i){
    i = i/6;
    var newDiv = document.createElement("div");
    newDiv.id = "DivRecipe" + RecipeId;
    newDiv.className = "col-xl-3 col-lg-4 col-md-6 mb-4 fade-in";
    newDiv.style = "/*! background-color: blue; */";
    newDiv.style.transition = "opacity " + i + "s ease-in, transform " + i + "s ease-in";
    newDiv.innerHTML = `
        <div class="RecipFirstChild bg-white rounded shadow-sm" style="border: 1px solid black;">
            <img src="https://bootstrapious.com/i/snippets/sn-gallery/img-1.jpg" alt="" class="RecipeImg img-fluid card-img-top">
            <div class="RecipeDiv p-4">
                <h5><a href="#" class="RecipeTitle text-dark">Titre de la recette</a></h5>
                <p class="small text-muted mb-0">Description</p>
                <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                    <p class="small mb-0">
                        <i class="fa-solid fa-star" style="var(--blue);"></i>
                        <i class="fa-solid fa-star" style="var(--blue);"></i>
                        <i class="fa-solid fa-star" style="var(--blue);"></i>
                        <i class="fa-regular fa-star" style="var(--blue);"></i>
                        <i class="fa-regular fa-star" style="var(--blue);"></i>
                        <span class="font-weight-bold">Hard</span>
                    </p>
                    <div class="badge badge-danger px-3 rounded-pill font-weight-normal text-dark" style="color: red !important;">New</div>
                </div>
            </div>
        </div>
    `;

    newDiv.addEventListener("click", function(){
        newDiv.style.width = "95vw";
        newDiv.style.textAlign = "center";

        var recipeFirstChild = document.querySelectorAll(".RecipFirstChild");
        recipeFirstChild.forEach(function(recipeFirstChild) {
            recipeFirstChild.style.display = "flex";
            recipeFirstChild.style.flexDirection = "column";
        });

        var recipeImg = document.querySelectorAll(".RecipeImg");
        recipeImg.forEach(function(recipeImg) {
            recipeImg.style.order = 2;
            recipeImg.style.width = "30%";
            recipeImg.style.marginLeft = "2%";
            recipeImg.style.marginBottom = "2%";
        });

        var recipeDiv = document.querySelectorAll(".RecipeDiv");
        recipeDiv.forEach(function(recipeDiv) {
            recipeDiv.style.order = 1;
            recipeDiv.style.textAlign = "center";
        });

        var recipeTitle = document.querySelectorAll(".RecipeTitle");
        recipeTitle.forEach(function(recipeTitle) {
            recipeTitle.style.fontSize = "5.25rem";
        });

        var row = document.getElementById("row");
        var children = row.children;
        for (var i = 0; i < children.length; i++) {
            var child = children[i];
            
            if (child.id === newDiv.id) {
                // L'élément a l'ID "aa", ne le masquez pas
            } else {
                child.style.display = "none"; // Masquez les autres enfants
            }
        }
        document.getElementById("ButtonShowMoreRecipe").style.display = "none";

        var ButtonReturn = document.createElement("div");
        ButtonReturn.innerHTML = `<div class="py-5 text-right"><a href="nosRecettes.php" class="ButtonReturnRecipeList btn btn-dark px-5 py-3 text-uppercase">Return to recipe list</a></div>`

        newDiv.appendChild(ButtonReturn);
    });

    var rowDiv = document.getElementById("row");
    rowDiv.appendChild(newDiv);

    setTimeout(function () {
        newDiv.classList.add("show");
    }, 10);

    RecipeId++;
}