let ButtonClicked = 0;
document.getElementById('ShowNav').addEventListener('click', function() {
    let Div = document.getElementById('NavBar');
    if (ButtonClicked == 0) {
        Div.style.display = 'block';
        ButtonClicked = 1;
    } else {
        ButtonClicked = 0;
        Div.style.display = 'none';
    }
});


let btn = document.querySelector('.menu-btn')

btn.addEventListener('click', function () {
  this.classList.toggle('is-active')
})