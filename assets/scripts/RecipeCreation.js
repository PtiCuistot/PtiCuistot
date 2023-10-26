let addIngredientButton = this.document.getElementById("addIngredient");
let recipeIngredients = this.document.getElementById("recipeIngredients");
let ingredientList = this.document.getElementById("ingredientList");
let recipeForm = this.document.getElementById("recipeForm");    

let weightArray = []

console.log(addIngredientButton); 

addIngredientButton.addEventListener("click", ()=>
{
    let ingredientId = recipeIngredients.value;
    let ingredientText = recipeIngredients.options[recipeIngredients.selectedIndex].text;
    let ingredientWeight = this.document.getElementById("ingredientWeight").value; 
    let ingredientWeightUnity = this.document.getElementById("ingredientWeightUnity").value;

    weightArray.push(
        {id : parseInt(ingredientId), weight : parseFloat(ingredientWeight), weightUnity : ingredientWeightUnity}
    );

    let ingredientDiv = document.createElement('p'); 
    ingredientDiv.innerText = `${ingredientText} : ${ingredientWeight}${ingredientWeightUnity}`;

    ingredientList.appendChild(ingredientDiv);
});

recipeForm.addEventListener('submit', function(e)
{
    e.preventDefault();

    let recipeTitle = document.querySelector('input[name="recipeTitle"]').value;
    let recipeContent = document.getElementById("recipeContent").value;
    let recipeImage =  document.querySelector('input[name="recipeImage"]').value;
    let recipeCategory = document.getElementById('recipeCategory').value;

    let addedDatas = weightArray; 

    let postData = {};
    postData.recipeTitle = recipeTitle; 
    postData.recipeContent = recipeContent;
    postData.recipeImage = recipeImage;
    postData.recipeCategory = recipeCategory;

    addedDatas.forEach(function(ingredient)
    {
        postData['ingredient_' + ingredient.id] = ingredient.weight;
        postData['ingredient_' + ingredient.id + '_unity'] = ingredient.weightUnity;
    })

    let tempForm = document.createElement('form');
    tempForm.action = '../treatment/treatment_recipe.php'; 
    tempForm.method = 'POST';


    for (let key in postData) {
        let input = document.createElement('input');
        input.type = 'hidden';
        input.name = key;
        input.value = postData[key];
        tempForm.appendChild(input);
    }

    document.body.appendChild(tempForm);
    tempForm.submit();
})