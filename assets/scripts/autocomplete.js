const resultBox = document.querySelector(".resultBox");

function showHint(str) {
    if (str.length == 0) {
        resultBox.innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            resultBox.innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "php/treatment/gethint.php?q=" + str, true);
      xmlhttp.send();
    }
}

function selectInput(list){
    inputBox.value = list.innerHTML;
    resultBox.innerHTML = '';
    
}