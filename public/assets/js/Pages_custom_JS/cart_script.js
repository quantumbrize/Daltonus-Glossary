document.querySelectorAll('.plus').forEach(button => {
    button.addEventListener('click', () => {
        const input = button.previousElementSibling;
        input.value = parseInt(input.value) + 1;
        updateSummary();
    });
});

document.querySelectorAll('.minus').forEach(button => {
    button.addEventListener('click', () => {
        const input = button.nextElementSibling;
        if (input.value > 1) {
            input.value = parseInt(input.value) - 1;
            updateSummary();
        }
    });
});

document.querySelectorAll('.remove-item').forEach(button => {
    button.addEventListener('click', () => {
        button.closest('.cart-item').remove();
        updateSummary();
    });
});

function updateSummary() {
    let subtotal = 0;
    document.querySelectorAll('.cart-item').forEach(item => {
        const price = parseFloat(item.querySelector('.item-controls span').textContent.replace('₹', ''));
        const quantity = parseInt(item.querySelector('.item-quantity input').value);
        subtotal += price * quantity;
    });

    const taxAndFees = 5.30;
    const delivery = 10.00;
    const total = subtotal + taxAndFees + delivery;

    document.querySelector('.subtotal span:last-child').textContent = `₹${subtotal.toFixed(2)}`;
    document.querySelector('.add-to-cart-btn .total-price').textContent = `₹${total.toFixed(2)}`;
}
