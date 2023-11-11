function Form() { 
    'use strict' 
    var forms = document.querySelectorAll('.needs-validation') 
    Array.prototype.slice.call(forms) 
        .forEach(function (form) { 
            form.addEventListener('submit', function (event) { 
                if (!form.checkValidity()) { 
                    event.preventDefault() 
                    event.stopPropagation() 
                } 

                form.classList.add('was-validated') 
            }, false) 
        }) 
} 
Form();

if(document.getElementById("recipeComment")){
    var textarea = document.getElementById("recipeComment");
    textarea.addEventListener('input', function () {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });
}