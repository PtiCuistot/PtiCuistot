let addIngredientButton = this.document.getElementById("addIngredientButton");
let recipeIngredients = this.document.getElementById("recipeIngredients");
let ingredientList = this.document.getElementById("ingredientList");
let recipeForm = this.document.getElementById("recipeForm");    
let ingredientName = this.document.getElementById("ingredientName");
let weightArray = [];

function createHiddenInput(name, value) {
    let input = document.createElement('input');
    input.type = 'hidden';
    input.name = name;
    input.value = value;
    return input;
}

function createIngredientData(addedDatas) {
    let ingredientData = {};

    addedDatas.forEach(function(ingredient) {
        let id = ingredient.id;
        ingredientData[id] = {
            quantity: ingredient.weight,
            unity: ingredient.weightUnity
        };
    });

    return JSON.stringify(ingredientData);
}

function submitForm(postData) {
    let tempForm = document.createElement('form');
    tempForm.action = '../treatment/treatment_recipe.php';
    tempForm.method = 'POST';

    for (let key in postData) {
        tempForm.appendChild(createHiddenInput(key, postData[key]));
    }

    document.body.appendChild(tempForm);
    tempForm.submit();
}

recipeForm.addEventListener('submit', function(e) {
    e.preventDefault();

    let recipeTitle = document.querySelector('input[name="recipeTitle"]').value;
    let recipeContent = document.getElementById("recipeContent").value;
    let recipeImage = document.querySelector('input[name="recipeImage"]').value;
    let recipeCategory = document.getElementById('recipeCategory').value;

    let addedDatas = weightArray;

    let postData = {
        recipeTitle: recipeTitle,
        recipeContent: recipeContent,
        recipeImage: recipeImage,
        recipeCategory: recipeCategory,
        ingredientData: createIngredientData(addedDatas)
    };

    submitForm(postData);
});

recipeIngredients.addEventListener('change', function() 
{
    if(this.value == 'Créer un ingrédient')
    {
        ingredientName.hidden = false;
    }
    else
    {
        ingredientName.hidden = true; 
    }
})

addIngredientButton.addEventListener("click", ()=>
{

    let ingredientId; 
    let ingredientText;

    if(ingredientName.hidden  == false)
    {
        ingredientId = ingredientName.value;
        ingredientText = ingredientName.value;
    }
    else
    {
        ingredientId = recipeIngredients.value;
        ingredientText = recipeIngredients.options[recipeIngredients.selectedIndex].text;
    }

    let ingredientWeight = this.document.getElementById("ingredientWeight").value; 
    let ingredientWeightUnity = this.document.getElementById("ingredientWeightUnity").value;

    if(isNaN(parseInt(ingredientId)))
    {
        weightArray.push(
            {id :ingredientId , weight : parseFloat(ingredientWeight), weightUnity : ingredientWeightUnity}
        );
    }
    else
    {
        weightArray.push(
            {id : parseInt(ingredientId), weight : parseFloat(ingredientWeight), weightUnity : ingredientWeightUnity}
        );
    }


    let ingredientDiv = document.createElement('p'); 
    ingredientDiv.innerText = `${ingredientText} : ${ingredientWeight}${ingredientWeightUnity}`;

    ingredientList.appendChild(ingredientDiv);
    ingredientName.hidden = true;
    recipeIngredients.value = '1';
});