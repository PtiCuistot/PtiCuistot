document.addEventListener("DOMContentLoaded", function () {
    const divRecipes = document.querySelectorAll(".show");
    divRecipes.forEach((divRecipe, index) => {
        setTimeout(function () {
            divRecipe.classList.remove("hidden");
            divRecipe.classList.add("animate-slide-up");
        }, index * 100);
    });
    
    var urlParams = new URLSearchParams(window.location.search);
    var limit = parseInt(urlParams.get('limit')) || 0;

    if (limit > 30) {
        var row = document.getElementById('row');
        var childNumber = Math.min(limit - 20, row.childElementCount);
        var elementToScrollTo = row.children[childNumber - 1];
        const divRecipes2 = document.querySelectorAll(".show");
        setTimeout(function () {
            elementToScrollTo.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }, divRecipes2.length * 100);
    }
});