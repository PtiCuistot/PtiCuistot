let addIngredientButton = this.document.getElementById("addIngredientButton");
let recipeIngredients = this.document.getElementById("recipeIngredients");
let ingredientList = this.document.getElementById("ingredientList");
let recipeForm = this.document.getElementById("recipeForm");    
let ingredientName = this.document.getElementById("ingredientName");
let weightArray = [];
let IngredientNumber = 1;

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
        document.getElementById("ingredientNameCol").style.display = "block";
    }
    else
    {
        document.getElementById("ingredientNameCol").style.display = "none";
    }
})

addIngredientButton.addEventListener("click", ()=>
{
    event.preventDefault();

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


    var ingredientDiv = document.createElement("tr");
    ingredientDiv.id = `LineIngredient${IngredientNumber}`;
    ingredientDiv.innerHTML = `
    <tr id="LineIngredient${IngredientNumber}">
        <th scope="row">${IngredientNumber}</th>
        <td>${ingredientText}</td>
        <td>${ingredientWeight}</td>
        <td>${ingredientWeightUnity}</td>
        <td>
            <button type="button" class="btn btn-danger" id="buttonDelete${IngredientNumber}">Supprimer</button>
        </td>
    </tr>
    `;
    document.getElementById("ingredientArray").appendChild(ingredientDiv);

    let currentIngredientNumber = IngredientNumber;

    document.getElementById(`buttonDelete${currentIngredientNumber}`).addEventListener('click', function () {
        console.log(document.getElementById(`LineIngredient${currentIngredientNumber}`).parentNode.childElementCount)
        console.log(this.parentNode.parentNode.parentNode)
        console.log(this.parentNode.parentNode.parentNode.parentNode)
        if (this.parentNode.parentNode.parentNode.childElementCount === 1) {
            this.parentNode.parentNode.parentNode.parentNode.style.display = "none";
        }
        document.getElementById(`LineIngredient${currentIngredientNumber}`).remove();
    });

    document.getElementById("ingredientListDiv").style.display = "block";
    document.getElementById("ingredientNameCol").style.display = "none";
    document.getElementById("ingredientArrayGlobal").style.display = "inline-table";
    recipeIngredients.value = '1';
    IngredientNumber++;
});

var textarea = document.getElementById("recipeContent");
textarea.addEventListener('input', function () {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
});

document.getElementById("ingredientNameCol").style.display = "none";
document.getElementById("ingredientListDiv").style.display = "none";
document.getElementById("ingredientArrayGlobal").style.display = "none";
