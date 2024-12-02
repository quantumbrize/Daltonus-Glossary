// Function to update the country code and flag
function selectCountry(element) {
    const flagImg = element.querySelector('img').src;
    const countryCode = element.getAttribute('data-code');
    const selectedFlag = document.getElementById('selected-flag').querySelector('img');
    const phoneInput = document.getElementById('phone');

    // Update the displayed flag
    selectedFlag.src = flagImg;

    // Update the phone input with the selected country code and ensure a space follows the code
    phoneInput.value = countryCode + ' ' + phoneInput.value.substring(phoneInput.value.indexOf(' ') + 1).trim();
}

// Function to prevent the user from modifying the country code or the space after it
function preventCountryCodeDeletion(event) {
    const phoneInput = event.target;
    const countryCode = phoneInput.value.split(' ')[0];
    const countryCodeAndSpace = countryCode + ' ';
    const numberPart = phoneInput.value.substring(countryCodeAndSpace.length);

    // Ensure that space after the country code is present
    if (!phoneInput.value.startsWith(countryCodeAndSpace)) {
        phoneInput.value = countryCodeAndSpace + numberPart;
    }

    // Fix the cursor position if the user tries to delete the space or country code
    if (phoneInput.selectionStart < countryCodeAndSpace.length) {
        phoneInput.setSelectionRange(countryCodeAndSpace.length, countryCodeAndSpace.length);
    }
}

// Function to manage cursor behavior and input in the phone number field
function handlePhoneInput(event) {
    const phoneInput = event.target;
    const countryCode = phoneInput.value.split(' ')[0];
    const countryCodeAndSpace = countryCode + ' ';
    const cursorPosition = phoneInput.selectionStart;

    // Prevent the user from placing the cursor within the country code or space
    if (cursorPosition < countryCodeAndSpace.length) {
        event.preventDefault();
        phoneInput.setSelectionRange(countryCodeAndSpace.length, countryCodeAndSpace.length);
    }
}

// Attach event listeners to the phone input field
document.getElementById('phone').addEventListener('input', preventCountryCodeDeletion);
document.getElementById('phone').addEventListener('keydown', handlePhoneInput);

// document.getElementById('confirm-button').addEventListener('click', function() {
//     alert('Phone number confirmed: ' + document.getElementById('phone').value);
// });
