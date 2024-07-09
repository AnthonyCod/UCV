
document.addEventListener("DOMContentLoaded", function() {
    var qrButton = document.getElementById('qrButton');
    var container = document.querySelector('.container');
    var childContainer = document.querySelector('.child-container');

    // Ocultar el contenedor hijo inicialmente
    childContainer.style.display = 'none';

    // Agregar un evento click al botón
    qrButton.addEventListener('click', function() {
        // Mostrar el contenedor hijo y ocultar el contenedor principal
        childContainer.style.display = 'grid';
        container.style.display = 'none';
    });
});

document.addEventListener("DOMContentLoaded", function() {
    var volverAlCarritoBtn = document.getElementById('volverAlCarritoBtn');

    volverAlCarritoBtn.addEventListener('click', function() {
        
        window.location.href = "../V_A_Carrito/carrito.html";
    });
});
