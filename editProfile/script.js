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