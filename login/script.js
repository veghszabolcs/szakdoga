function showPassword(){
    var pw = document.getElementById("loginPassword");
    if(pw.type === "password"){
        pw.type = "text";
    }else{
        pw.type = "password";
    }
}

function credentialsCheck() {
    inputCredentialsExist(function(exists) {
        if (!exists) {
            document.getElementById("loginError").style.display = "block";
        } else {
            window.location.replace("../homepage/homepage.php");
        }
    });
}

function inputCredentialsExist(callback) {
    var email = document.getElementById("loginEmail").value;
    var password = document.getElementById("loginPassword").value;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'checkCredentials.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.responseText === "exist") {
                alert("Sikeres bejelentkezés!");
                callback(true);
            } else {
                callback(false);
            }
        }
    };
    xhr.send('email=' + encodeURIComponent(email) + '&password=' + encodeURIComponent(password));
}