const nameInput = document.getElementById('nev');
const phoneInput = document.getElementById('telefon');
const nameError = document.getElementById('nevError');
const phoneError = document.getElementById('telefonError');

nameInput.addEventListener('input', function () {
    if (nameInput.value.length < 3) {
        nameError.style.display = 'block';
    } else {
        nameError.style.display = 'none';
    }
});

phoneInput.addEventListener('input', function () {
    const phonePattern = /^\d{10}$/; // Assuming 10-digit phone number
    if (!phonePattern.test(phoneInput.value)) {
        phoneError.style.display = 'block';
    } else {
        phoneError.style.display = 'none';
    }
});

function checkInputLength(inputElement) {
    if (inputElement.value.length === 4) {
        var irsz = inputElement.value; 
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = xhr.responseText;
                document.getElementById('cim').value = response;
            }
        };
        var url = "../editProfile/telepulesQuery.php";
        var params = "irsz=" + irsz;
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(params);
    }
}


function closePopup() {
    var successPopup = document.getElementById('successPopup');
    var failPopup = document.getElementById('failPopup');

    if (successPopup) {
        successPopup.style.display = 'none';
    }

    if (failPopup) {
        failPopup.style.display = 'none';
    }
}
