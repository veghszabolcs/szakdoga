function showPassword() {
    var pw = document.getElementById("loginPassword");
    if (pw.type === "password") {
        pw.type = "text";
    } else {
        pw.type = "password";
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const togglePassword = document.querySelector('#togglePassword');
    const passwordInput = document.querySelector('#loginPassword');

    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Toggle eye icons
        if (type === 'password') {
            togglePassword.innerHTML = '<i class="fas fa-eye"></i>';
        } else {
            togglePassword.innerHTML = '<i class="fas fa-eye-slash"></i>';
        }

        // Apply animation class
        togglePassword.classList.add('blink');
        setTimeout(function () {
            togglePassword.classList.remove('blink'); // Remove animation class after 0.3s
        }, 300);
    });
});

/*
function credentialsCheck() {
    inputCredentialsExist(function(exists) {
        if (!exists) {
            document.getElementById("loginError").style.display = "block";
        } else {
            var redirectSite = "../homepage/homepage.php?loginEmail="+encodeURIComponent(document.getElementById('loginEmail').value);
            console.log(redirectSite);
            window.location.replace(redirectSite);
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
*/