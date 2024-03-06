
document.addEventListener('DOMContentLoaded', function () {
    const togglePasswordFirst = document.querySelector('#togglePasswordFirst');
    const togglePasswordSecond = document.querySelector('#togglePasswordSecond');
    const passwordFirst = document.querySelector('#loginPassword');
    const passwordSecond = document.querySelector('#loginPasswordSecond');

    togglePasswordFirst.addEventListener('click', function () {
        const type = passwordFirst.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordFirst.setAttribute('type', type);

        // Toggle eye icons
        if (type === 'password') {
            togglePasswordFirst.innerHTML = '<i class="fas fa-eye"></i>';
        } else {
            togglePasswordFirst.innerHTML = '<i class="fas fa-eye-slash"></i>';
        }
        togglePasswordFirst.classList.add('blink'); // Apply animation class
        setTimeout(function () {
            togglePasswordFirst.classList.remove('blink'); // Remove animation class after 0.3s
        }, 300);
    });

    togglePasswordSecond.addEventListener('click', function () {
        const type = passwordSecond.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordSecond.setAttribute('type', type);

        // Toggle eye icons
        if (type === 'password') {
            togglePasswordSecond.innerHTML = '<i class="fas fa-eye"></i>';
        } else {
            togglePasswordSecond.innerHTML = '<i class="fas fa-eye-slash"></i>';
        }
        togglePasswordSecond.classList.add('blink'); // Apply animation class
        setTimeout(function () {
            togglePasswordSecond.classList.remove('blink'); // Remove animation class after 0.3s
        }, 300);
    });
});



function validation() {
    if (!emailCheck()) {
        document.getElementById("emailError").style.display = "block";
        return false;
    } else {
        document.getElementById("emailError").style.display = "none";
    }
    if (!passwordCheckLength()) {
        document.getElementById("passwordLengthError").style.display = "block";
        return false;
    } else {
        document.getElementById("passwordLengthError").style.display = "none";
    }
    if (!passwordCheckCharacters()) {
        document.getElementById("passwordCharacterError").style.display = "block";
        return false;
    } else {
        document.getElementById("passwordCharacterError").style.display = "none";
    }
    if (!passwordIdenticalCheck()) {
        document.getElementById("passwordIdenticalError").style.display = "block";
        return false;
    } else {
        document.getElementById("passwordIdenticalError").style.display = "none";
    }

    userAlreadyExists(function (exists) {
        if (!exists) {
            document.getElementById("userAlreadyExistsError").style.display = "block";
        } else {
            document.getElementById("userAlreadyExistsError").style.display = "none";
            var email = document.getElementById("loginEmail").value;
            var password = document.getElementById("loginPassword").value;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "upload.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        alert(xhr.responseText);
                    } else {
                        alert('Error: ' + xhr.statusText);
                    }
                }
            };
            var formData = "email=" + encodeURIComponent(email) + "&password=" + encodeURIComponent(password);
            console.log(formData);
            xhr.send(formData);
        }
    });
    return false;
}

function userAlreadyExists(callback) {
    var email = document.getElementById("loginEmail").value;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'checkEmail.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                if (xhr.responseText === "notexist") {
                    console.log("true");
                    callback(true);
                } else {
                    console.log("false");
                    callback(false);
                }
            } else {
                console.error('Request failed: ' + xhr.status);
                callback(false);
            }
        }
    };
    xhr.send('email=' + encodeURIComponent(email));
}

function passwordIdenticalCheck() {
    var firstPw = document.getElementById("loginPassword").value;
    var secondPw = document.getElementById("loginPasswordSecond").value;

    if (firstPw !== secondPw) {
        return false;
    }

    return true;
}

function emailCheck() {
    var email = document.getElementById("loginEmail").value;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(email)) {
        return false;
    }

    return true;
}

function passwordCheckLength() {
    var firstPw = document.getElementById("loginPassword").value;
    var secondPw = document.getElementById("loginPasswordSecond").value;

    if ((firstPw.length < 7 || secondPw.length < 7) || (firstPw.length > 16 || secondPw.length > 16)) {
        return false;
    }

    return true;
}
function passwordCheckCharacters() {
    var firstPw = document.getElementById("loginPassword").value;
    var secondPw = document.getElementById("loginPasswordSecond").value;

    if (!containsUpperCase(firstPw) || !containsUpperCase(secondPw)) {
        return false;
    }
    if (!containsNumber(firstPw) || !containsNumber(secondPw)) {
        return false;
    }

    return true;
}
function containsUpperCase(str) {
    return /[A-Z]/.test(str);
}
function containsNumber(str) {
    return /[0-9]/.test(str);
}