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
        if (this.parentNode.parentNode.parentNode.childElementCount === 1) {
            this.parentNode.parentNode.parentNode.parentNode.style.display = "none";
        }
        weightArray.splice(currentIngredientNumber - 1, 1);
        document.getElementById(`LineIngredient${currentIngredientNumber}`).remove();
    });

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


let AuMoinsUnIngredients = 0;
const ingredientArray = document.getElementById("ingredientArray");
const submitButton = document.getElementById("submitButton");
const observer = new MutationObserver(function (mutationsList) {
    checkTableChildren();
});
const config = { childList: true, subtree: true };
observer.observe(ingredientArray, config);

function checkTableChildren() {
    if (ingredientArray.children.length > 0) {
        AuMoinsUnIngredients = 1;
        if(recipeForm.checkValidity()){
            document.getElementById("submitButton").disabled = false;
            console.log("1")
        } else {
            document.getElementById("submitButton").disabled = true;
            console.log("2")
        }
    } else {
        AuMoinsUnIngredients = 0;
        document.getElementById("submitButton").disabled = true;
        console.log("3")
    }
}
checkTableChildren();



recipeForm.addEventListener("input", function () {
    if (recipeForm.checkValidity() && AuMoinsUnIngredients == 1) {
        document.getElementById("submitButton").disabled = false;
        console.log("4")
    } else {
        document.getElementById("submitButton").disabled = true;
        console.log("5")
    }
});

recipeForm.addEventListener("submit", function (event) {
    if (document.getElementById("submitButton").disabled) {
        event.preventDefault();
    }
});

document.getElementById("ingredientNameCol").style.display = "none";
document.getElementById("ingredientArrayGlobal").style.display = "none";