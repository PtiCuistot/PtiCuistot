let addIngredientButton = this.document.getElementById("addIngredient");
let recipeIngredients = this.document.getElementById("recipeIngredients");

console.log(addIngredientButton); 

addIngredientButton.addEventListener("click", ()=>
{
    let ingredientId = recipeIngredients.value;
    let ingredientText = recipeIngredients.options[recipeIngredients.selectedIndex].text;

    console.log(ingredientId, ingredientText);
});