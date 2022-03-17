function toggle(){
    var login = document.getElementById("login-menu");
    if(login.style.display === 'none'){
        login.style.display = 'block'
    } else {
        login.style.display = 'none';
    }
}
function switchform() {
    var loginForm = document.getElementById('LoginForm');
    var loginBttn = document.getElementById('switch-login');
    var signupForm = document.getElementById('SignupForm');

    if(loginForm.style.display === 'none'){
        loginForm.style.display = 'flex';
        signupForm.style.display = 'none';
        loginBttn.innerText = 'Login';
    } else {
        loginForm.style.display = 'none';
        signupForm.style.display = 'flex';
        loginBttn.innerText = 'Sign Up';
    }
}
function validateLogin(){
    var email = document.getElementById('login-email').value;
    var pwd = document.getElementById('login-password').value;

    const emailRestrict = /[a-zA-Z0-9-_.]{4,24}\@[a-zA-Z]{3,16}[_-]?[a-zA-Z]?\.[a-zA-Z]{3}/;
    const pwdRestrict = /\w{8,16}/
    if(!emailRestrict.test(email)){
        alert("Email is not valid");
        return false;
    }
    if(!pwdRestrict.test(pwd)){
        alert("Password must be 8 to 16 characters long and contain numbers");
        return false;
    }
    return true;
}
function validateSignup(){
    var name = document.getElementById('signup-name').value;
    var email = document.getElementById('signup-email').value;
    var pwd = document.getElementById('signup-password').value;
    const nameRestrict = /[a-zA-Z]{4,}/
    const emailRestrict = /[a-zA-Z0-9-_.]{4,24}\@[a-zA-Z]{3,16}[_-]?[a-zA-Z]?\.[a-zA-Z]{3}/;
    const pwdRestrict = /\w{8,16}/

    if(!nameRestrict.test(name)){
        alert("Name too short");
        return false;
    }
    if(!emailRestrict.test(email)){
        alert("Email is not valid");
        return false;
    }
    if(!pwdRestrict.test(pwd)){
        alert("Password must be 8 to 16 characters long and contain numbers");
        return false;
    }
    return true;
}