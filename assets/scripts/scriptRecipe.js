document.addEventListener("DOMContentLoaded", function () {
    const divRecipes = document.querySelectorAll(".show");
    var urlParams = new URLSearchParams(window.location.search);
    var limit = parseInt(urlParams.get('limit')) || 0;

    divRecipes.forEach((divRecipe, index) => {
            
        if(index >= (limit - 20)){
            setTimeout(function () {
                divRecipe.classList.remove("hidden");
                divRecipe.classList.add("animate-slide-up");
            }, index * 50);
        }
        else{
            divRecipe.classList.remove("hidden");
            divRecipe.style.display = "block";
        }
    });

    if (limit >= 30) {
        var row = document.getElementById('row');
        var childNumber = Math.min(limit - 20, row.childElementCount);
        var elementToScrollTo = row.children[childNumber - 1];
        const divRecipes2 = document.querySelectorAll(".show");
        setTimeout(function () {
            elementToScrollTo.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }, 0);
    }
});