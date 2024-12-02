// Get all OTP input fields
const otpInputs = document.querySelectorAll('.otp-inputs input');

// Focus to the next input when a number is entered
otpInputs.forEach((input, index) => {
    input.addEventListener('input', () => {
        if (input.value.length === 1 && index < otpInputs.length - 1) {
            otpInputs[index + 1].focus();
        }
    });

    // Move back to the previous input if the backspace key is pressed
    input.addEventListener('keydown', (e) => {
        if (e.key === 'Backspace' && index > 0 && input.value === '') {
            otpInputs[index - 1].focus();
        }
    });
});
