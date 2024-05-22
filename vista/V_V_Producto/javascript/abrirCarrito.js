document.addEventListener('DOMContentLoaded', () => {
    const addToCartButton = document.querySelector('[data-btn-action="add-btn-cart"]');
    const closeModalButton = document.querySelector('.jsModalClose');
    const modal = document.getElementById('jsModalCarrito');

    addToCartButton.addEventListener('click', () => {
        modal.classList.add('active');
    });

    closeModalButton.addEventListener('click', () => {
        modal.classList.remove('active');
    });

    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.classList.remove('active');
        }
    });
});