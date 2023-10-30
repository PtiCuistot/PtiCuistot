document.addEventListener("DOMContentLoaded", function () {
    const divRecipes = document.querySelectorAll(".show");
    divRecipes.forEach((divRecipe, index) => {
        setTimeout(function () {
            divRecipe.classList.remove("hidden");
            divRecipe.classList.add("animate-slide-up"); // Ajoutez une classe d'animation CSS
        }, index * 200); // Décalage de 200 ms entre chaque élément
    });
});