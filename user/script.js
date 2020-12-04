 
let pass1 =document.querySelector('#pass');
let pass2 =document.querySelector('#cpass');
let result=document.querySelector('h4');

function checkPassword () {
    result.innerText = pass1.value == pass2.value ? ' ':'password dont match';
}
pass1.addEventListener('keyup',() => {
    if(pass2.value.length!=0) checkPassword();
})
pass2.addEventListener('keyup',checkPassword);