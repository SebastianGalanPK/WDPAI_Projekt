const form = document.querySelector("form");
const loginValue = form.querySelector('input[name="login"]');
const emailValue = form.querySelector('input[name="email"]');
const passwordValue = form.querySelector('input[name="password"]');

function isEmail(email){
    return /\S+@\S+\.\S+/.test(email);
}

function checkLogin(login){
    return login.length >=5 && login.length<=16 ? true : false;
}

function checkPassword(password){
    return password.length >= 8 ? true : false;
}

function markValidation(element, condition){
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

emailValue.addEventListener('keyup', function(){
   setTimeout(function (){
       markValidation(emailValue, isEmail(emailValue.value));
   }, 1000);
});

loginValue.addEventListener('keyup', function (){
    setTimeout(function (){
        markValidation(loginValue, checkLogin(loginValue.value));
    }, 1000);
})

passwordValue.addEventListener('keyup', function(){
   setTimeout(function(){
     markValidation(passwordValue, checkPassword(passwordValue.value));
   }, 1000);
});