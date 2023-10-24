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
        <div class="bg-white rounded shadow-sm" style="border: 1px solid black;">
            <img src="https://bootstrapious.com/i/snippets/sn-gallery/img-1.jpg" alt="" class="img-fluid card-img-top">
            <div class="p-4">
                <h5><a href="#" class="text-dark">Titre de la recette</a></h5>
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

    var rowDiv = document.getElementById("row");
    rowDiv.appendChild(newDiv);

    setTimeout(function () {
        newDiv.classList.add("show");
    }, 10);

    RecipeId++;
}