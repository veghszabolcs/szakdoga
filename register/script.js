function showPassword(){
    var pw = document.getElementById("loginPassword");
    if(pw.type === "password"){
        pw.type = "text";
    }else{
        pw.type = "password";
    }
}
function showPasswordSecond(){
    var pw = document.getElementById("loginPasswordSecond");
    if(pw.type === "password"){
        pw.type = "text";
    }else{
        pw.type = "password";
    }
}
function validation(){
    if(!emailCheck()){
        document.getElementById("emailError").style.display = "block";
        return false;
    }else{
        document.getElementById("emailError").style.display = "none";
    }
    if(!passwordCheckLength()){
        document.getElementById("passwordLengthError").style.display = "block";
        return false;
    }else{
        document.getElementById("passwordLengthError").style.display = "none";
    }
    if(!passwordCheckCharacters()){
        document.getElementById("passwordCharacterError").style.display = "block";
        return false;
    }else{
        document.getElementById("passwordCharacterError").style.display = "none";
    }
    return true;
}
function emailCheck(){
    var email = document.getElementById("loginEmail").value;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(!emailRegex.test(email)){
        return false;
    }
    
    return true;
}
function passwordCheckLength(){
    var firstPw = document.getElementById("loginPassword").value;
    var secondPw = document.getElementById("loginPasswordSecond").value;

    if(firstPw.length<7 || secondPw.length<7){
        return false;
    }
    
    return true;
}
function passwordCheckCharacters(){
    var firstPw = document.getElementById("loginPassword").value;
    var secondPw = document.getElementById("loginPasswordSecond").value;

    if(!containsUpperCase(firstPw) || !containsUpperCase(secondPw)){
        return false;
    }
    if(!containsNumber(firstPw) || !containsNumber(secondPw)){
        return false;
    }

    return true;
}
function containsUpperCase(str){
    return /[A-Z]/.test(str);
}
function containsNumber(str){
    return /[0-9]/.test(str);
}