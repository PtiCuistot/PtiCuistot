const modalContainer = document.querySelector(".modalContainer");
const modalTrigger = document.querySelectorAll(".modalTrigger");

modalTrigger.forEach( trigger => trigger.addEventListener("click", toggleModal));

function toggleModal(){
    modalContainer.classList.toggle("active");
}