let NavButtonClicked = 0;
document.getElementById('ShowNav').addEventListener('click', function() {
    let Div = document.getElementById('NavBar');
    if (NavButtonClicked == 0) {
        Div.style.display = 'block';
        NavButtonClicked = 1;
    } else {
        NavButtonClicked = 0;
        Div.style.display = 'none';
    }
});


let btn = document.querySelector('.menu-btn')

btn.addEventListener('click', function () {
  this.classList.toggle('is-active')
})