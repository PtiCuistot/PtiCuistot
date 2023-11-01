let addIngredientButton = this.document.getElementById("addIngredientButton");
let recipeIngredients = this.document.getElementById("recipeIngredients");
let recipeForm = this.document.getElementById("recipeForm");    
let ingredientName = this.document.getElementById("ingredientName");
let weightArray = [];
let IngredientNumber = 1;
let IngredientNameDisplay = false;

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
    tempForm.action = 'php/treatment/treatment_recipe.php';
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
    let addedTag = TagsArray;

    let postData = {
        recipeTitle: recipeTitle,
        recipeContent: recipeContent,
        recipeImage: recipeImage,
        recipeCategory: recipeCategory,
        ingredientData: createIngredientData(addedDatas), 
        tagData:  JSON.stringify(addedTag)
    };

    submitForm(postData);
});

recipeIngredients.addEventListener('change', function() 
{
    if(this.value == 'Créer un ingrédient')
    {
        document.getElementById("ingredientNameCol").style.display = "block";
        IngredientNameDisplay = true;
    }
    else
    {
        document.getElementById("ingredientNameCol").style.display = "none";
        IngredientNameDisplay = false;
    }
})

addIngredientButton.addEventListener("click", ()=>
{
    event.preventDefault();

    let ingredientId;
    let ingredientText;

    if(IngredientNameDisplay == true)
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

    var ingredientName2 = "";
    if(document.getElementById("ingredientNameCol").style.display != "none"){
        ingredientName2 = document.getElementById("ingredientName").value;
    }else{
        ingredientName2 = document.getElementById("recipeIngredients").value;
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
    document.getElementById("ingredientName").value = "";
    document.getElementById("recipeIngredients").value = "";
    document.getElementById("ingredientWeight").value = "";
    document.getElementById("ingredientWeightUnity").value = "";
    document.getElementById("ingredientArrayGlobal").style.display = "inline-table";
    document.getElementById("addIngredientButton").disabled = true;
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
        } else {
            document.getElementById("submitButton").disabled = true;
        }
    } else {
        AuMoinsUnIngredients = 0;
        document.getElementById("submitButton").disabled = true;
    }
}
checkTableChildren();

recipeForm.addEventListener("input", function () {
    if (recipeForm.checkValidity() && AuMoinsUnIngredients == 1) {
        document.getElementById("submitButton").disabled = false;
    } else {
        document.getElementById("submitButton").disabled = true;
    }
});

recipeForm.addEventListener("submit", function (event) {
    if (document.getElementById("submitButton").disabled) {
        event.preventDefault();
    }
});

const recipeIngredientsSelect = document.getElementById("recipeIngredients");
const ingredientNameInput = document.getElementById("ingredientName");
const ingredientWeightInput = document.getElementById("ingredientWeight");
const ingredientWeightUnityInput = document.getElementById("ingredientWeightUnity");

recipeIngredientsSelect.addEventListener("input", checkFormValidity);
ingredientNameInput.addEventListener("input", checkFormValidity);
ingredientWeightInput.addEventListener("input", checkFormValidity);
ingredientWeightUnityInput.addEventListener("input", checkFormValidity);

function checkFormValidity() {
    const ingredientSelected = recipeIngredientsSelect.value !== "";
    const ingredientName = ingredientNameInput.value.trim();
    const ingredientWeight = parseFloat(ingredientWeightInput.value);
    const ingredientWeightUnity = ingredientWeightUnityInput.value.trim();

    if(document.getElementById("ingredientNameCol").style.display != "none"){
        if (ingredientName && !isNaN(ingredientWeight) && ingredientWeight > 0 && ingredientWeightUnity) {
            addIngredientButton.disabled = false;
        } else {
            addIngredientButton.disabled = true;
        }
    }else{
        if (ingredientSelected && !isNaN(ingredientWeight) && ingredientWeight > 0 && ingredientWeightUnity) {
            addIngredientButton.disabled = false;
        } else {
            addIngredientButton.disabled = true;
        }
    }
}

const specialSelect = document.querySelector('.SpecialSelect');

/* OnClick display children */
specialSelect.addEventListener('click', function() {
  let cmpt = 0;
  specialSelect.children[1].style.display = 'block';
  let childrenOpen = specialSelect.children[1].children;
  for (let i = 0; i < childrenOpen.length; i++) {
    cmpt++;
    childrenOpen[i].style.animation = "slide-in-top " + (cmpt+1)/15 + "s cubic-bezier(.25,.46,.45,.94) both"
    let childrenOpen2 = childrenOpen[i].children;
    for (let j = 0; j < childrenOpen2.length; j++) {
      cmpt++;
      childrenOpen2[j].style.animation = "slide-in-top " + (cmpt+1)/15 + "s cubic-bezier(.25,.46,.45,.94) both"
    }
  }
});

const TagsArray = [];

/* On exterior Click animate display none of children for smooth exit*/
document.addEventListener('click', function(event) {
  if (!document.getElementById("SpecialSelectGlobalDiv").contains(event.target)) {
    for(let i = 0; i < document.getElementById("Tags").children.length; i++){
      TagsArray.push([document.getElementById("Tags").children[i].id, document.getElementById("Tags").children[i].innerText]);
      console.log(TagsArray[i])
      console.log(document.getElementById("Tags").children[i])
    }

    let cmpt = 0;
    let childrenExit = specialSelect.children[1].children;
    for (let i = 0; i < childrenExit.length; i++) {
      cmpt++;
      childrenExit[i].style.animation = "slide-out-top " + (cmpt+1)/15 + "s cubic-bezier(.55,.085,.68,.53) both"
      let childrenExit2 = childrenExit[i].children;
      for (let j = 0; j < childrenExit2.length; j++) {
        cmpt++;
        childrenExit2[j].style.animation = "slide-out-top " + (cmpt+1)/15 + "s cubic-bezier(.55,.085,.68,.53) both"
      }
    }
    setTimeout(() => {
      specialSelect.children[1].style.display = 'none';
    }, ((cmpt+1)/15) * 1000);
  }
});

/* SearchInput Scripts*/
const searchInput = document.getElementById("searchInput");
searchInput.addEventListener("input", function () {
  const textElements = document.querySelectorAll(".Elements .textSpecialSelect");
  const searchText = searchInput.value.toLowerCase();

  textElements.forEach((element) => {
    const text = element.textContent.toLowerCase();
    if (text.includes(searchText)) {
      element.style.display = "block";
    } else {
      element.style.display = "none";
    }
  });
});

/* Add of Tags in the top*/
const childrenElements = document.getElementById("Elements").children;
for (let i = 0; i < childrenElements.length; i++) {
  childrenElements[i].addEventListener('click', function() {
    let alreadyHere = 0;
    for(let j = 0; j < document.getElementById('Tags').children.length; j++){
      if(document.getElementById('Tags').children[j].id == this.id){
        alreadyHere = 1; 
      }
    }

    if(alreadyHere == 0){
      document.getElementById("CheckListTags" + this.id).style.visibility = "visible";

      let contenu = document.createElement('button');
      contenu.classList.add("btn");
      contenu.classList.add("btn-info");
      contenu.innerText = this.innerText;
      contenu.id = this.id;
      document.getElementById('Tags').appendChild(contenu);

      contenu.addEventListener('click', function(event) {
        document.getElementById("CheckListTags" + this.id).style.visibility = "hidden";
        event.stopPropagation();
        this.remove();
      });
    }
  });
}

/* Disable or Enable button Add Tags if input is void or not*/
document.getElementById("CreateTag").addEventListener('input', function() {
  if(this.value != ""){
    document.getElementById("addTagsButton").disabled = false;
  }else{
    document.getElementById("addTagsButton").disabled = true;
  }
});

/* Create a new Tags in the list with the button CreateTags*/
document.getElementById("addTagsButton").addEventListener('click', function() {
  var newParagraph = document.createElement('p');
  newParagraph.id = document.getElementById("CreateTag").value;
  newParagraph.classList.add("textSpecialSelect");
  newParagraph.textContent = document.getElementById("CreateTag").value;
  const icon = document.createElement('i');
  icon.className = 'fa-regular fa-circle-check CheckListTags';
  icon.id = "CheckListTags" + document.getElementById("CreateTag").value;
  newParagraph.insertBefore(icon, newParagraph.firstChild);

  newParagraph.addEventListener('click', function(event) {
    let alreadyHere = 0;
    for(let i = 0; i < document.getElementById('Tags').children.length; i++){
      if(document.getElementById('Tags').children[i].id == newParagraph.innerText){
        alreadyHere = 1; 
      }
    }
    if(alreadyHere == 0){
      console.log("CheckListTags" + this.id);
      document.getElementById("CheckListTags" + this.id).style.visibility = "visible";

      let contenu = document.createElement('button');
      contenu.classList.add("btn");
      contenu.classList.add("btn-info");
      contenu.innerText = newParagraph.innerText;
      contenu.id = newParagraph.innerText;
      document.getElementById('Tags').appendChild(contenu);

      contenu.addEventListener('click', function(event) {
        document.getElementById("CheckListTags" + this.id).style.visibility = "hidden";
        event.stopPropagation();
        this.remove();
      });
    }
  });
  document.getElementById('Elements').appendChild(newParagraph);
  trierElementsAlphabetiquement();
});

/* Sort List*/
function trierElementsAlphabetiquement() {
  const elementsDiv = document.getElementById("Elements");
  const elements = Array.from(elementsDiv.querySelectorAll(".textSpecialSelect"));
  elements.sort((a, b) => a.textContent.localeCompare(b.textContent));
  while (elementsDiv.firstChild) {
    elementsDiv.removeChild(elementsDiv.firstChild);
  }
  elements.forEach((element) => {
    elementsDiv.appendChild(element);
  });
}

/* Start do not display children */
let children = specialSelect.children;
for (let i = 1; i < children.length; i++) {
  children[i].style.display = 'none';
}
trierElementsAlphabetiquement();


document.getElementById("ingredientNameCol").style.display = "none";
document.getElementById("ingredientArrayGlobal").style.display = "none";


const rateLabels = document.querySelectorAll('.rate');

rateLabels.forEach(function(label, index) {
  label.addEventListener('mouseover', function() {
    for (let i = 0; i < index + 1; i++) {
      const prevLabel = rateLabels[i];
      const starIcon = prevLabel.querySelector('i');
      if (!starIcon.classList.contains("fa-solid")) {
        starIcon.classList.add('star-over');
      }
    }
  });

  label.addEventListener('mouseout', function() {
    for (let i = 0; i < index + 1; i++) {
      const prevLabel = rateLabels[i];
      const starIcon = prevLabel.querySelector('i');
      if (starIcon) {
        starIcon.classList.remove('star-over');
      }
    }
  });

  label.addEventListener('click', function() {
    const starElements = document.querySelectorAll('.star');
    starElements.forEach(function(starElement) {
      starElement.classList.remove('fa-solid');
    });

    for (let i = 0; i < index + 1; i++) {
      const prevLabel = rateLabels[i];
      const starIcon = prevLabel.querySelector('i');
      if (starIcon) {
        starIcon.classList.add('fa-solid');
      }
    }
  });
});

