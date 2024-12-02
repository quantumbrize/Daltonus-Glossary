const orderHeaders = document.querySelectorAll('.order-header');

orderHeaders.forEach(header => {
    header.addEventListener('click', () => {
        const orderCard = header.parentElement;
        orderCard.classList.toggle('expanded');
        orderCard.classList.toggle('collapsed');
    });
});
