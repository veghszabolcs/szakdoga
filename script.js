function showPassword(){
    var pw = document.getElementById("loginPassword");
    if(pw.type === "password"){
        pw.type = "text";
    }else{
        pw.type = "password";
    }
}