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
<<<<<<< HEAD
<<<<<<< HEAD
=======

    // Asegurarse de que el enlace "Comprar Ahora" redirija correctamente
    const btnComprarAhora = document.getElementById('comprarAhora');
    if (btnComprarAhora) {
        btnComprarAhora.addEventListener('click', function(event) {
            event.preventDefault(); // Prevenir el comportamiento por defecto
            window.location.href = btnComprarAhora.getAttribute('href');
        });
    } else {
        console.error('No se encontró el botón "Comprar Ahora".');
    }
>>>>>>> 91f8095 (boton carrito funciona)
=======
>>>>>>> 39d1c8f (continuar)
});
