function validate(){
    var name = document.getElementById('full-name').value;
    var telNum = document.getElementById('telephone').value;
    var email = document.getElementById('email').value;
    var textMsg = document.getElementById('message').value;

    const nameRegex = /[a-zA-Z]/;
    const telNumRegex = /\+383[0-9]{8,9}/;
    const emailRegex = /[a-zA-Z0-9-_.]{4,24}\@[a-zA-Z]{3,16}[_-]?[a-zA-Z]?\.[a-zA-Z]{3}/;
    
    if(!nameRegex.test(name)){
        alert("Name can only contain letters");
        return false;
    }
    if(!telNumRegex.test(telNum.toString())){
        alert("Phone Number is not valid make sure it is of the format: (+383xxxxxxxx)");
        return false;
    }
    if(!emailRegex.test(email)){
        alert("Email is not valid");
        return false;
    }
    return true;
}