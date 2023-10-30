let avaibleKeyWords = ["tarte aux pommes", "farine au beurre", "tarte a la mirabelle", "clement au baratin"];

const resultBox = document.querySelector(".resultBox");
const inputBox = document.getElementById("inputBox");

inputBox.onkeyup = function(){
    let result = [];
    let input = inputBox.value;
    if(input.length){
        result = avaibleKeyWords.filter((keyword)=>{
            return keyword.toLowerCase().includes(input.toLowerCase());
        });
    }
    display(result);

    if(!result.length){
        resultBox.innerHTML = '';
    }
}

function display(result){
    const content = result.map((list)=>{
        return "<li onclick=selectInput(this)>"+list+"</li>";
    });

    resultBox.innerHTML = "<ul>"+content.join('')+"<ul/>";
}

function selectInput(list){
    inputBox.value = list.innerHTML;
    resultBox.innerHTML = '';
}