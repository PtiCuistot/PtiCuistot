// modal category
const modalContainerCategory = document.querySelector(".modalContainerCategory");
const modalTriggerCategory = document.querySelectorAll(".triggerCategory");

modalTriggerCategory.forEach( triggerCategory => triggerCategory.addEventListener("click", toggleModalCategory));

function toggleModalCategory(){
    modalContainerCategory.classList.toggle("active");

    modalContainerTitle.classList.remove("active");
    modalContainerIngredient.classList.remove("active");
}

// modal title
const modalContainerTitle = document.querySelector(".modalContainerTitle");
const modalTriggerTtile = document.querySelectorAll(".triggerTitle");

modalTriggerTtile.forEach( triggerTitle => triggerTitle.addEventListener("click", toggleModalTitle));

function toggleModalTitle(){
    modalContainerTitle.classList.toggle("active");

    modalContainerCategory.classList.remove("active");
    modalContainerIngredient.classList.remove("active");
}

// modal ingredient
const modalContainerIngredient = document.querySelector(".modalContainerIngredient");
const modalTriggerIngredient = document.querySelectorAll(".triggerIngredient");

modalTriggerIngredient.forEach( triggerIngredient => triggerIngredient.addEventListener("click", toggleModalIngredient));

function toggleModalIngredient(){
    modalContainerIngredient.classList.toggle("active");

    modalContainerTitle.classList.remove("active");
    modalContainerCategory.classList.remove("active");
}
