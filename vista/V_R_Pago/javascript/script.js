
document.addEventListener("DOMContentLoaded", function() {
    var qrButton = document.getElementById('qrButton');
    var container = document.querySelector('.container');
    var childContainer = document.querySelector('.child-container');
    const confirmar= document.getElementById('confirmar');

    // Ocultar el contenedor hijo inicialmente
    childContainer.style.display = 'none';

    // Agregar un evento click al botón
    qrButton.addEventListener('click', function() {
        // Mostrar el contenedor hijo y ocultar el contenedor principal
        childContainer.style.display = 'grid';
        container.style.display = 'none';
    });


function finalizarCompra() {
    const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    
    if (carrito.length === 0) {
        alert('El carrito está vacío.');
        return;
    }

    /// Primero, registrar el pago
    const datosPago = {
        montoTotal: 12 // Ajusta según necesites
    };

    fetch('../../controlador/C_R_Pago.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(datosPago)
    })
    .then(response => response.json())
    .then(data => {
        if (!data.success) {
            throw new Error('Error al registrar el pago: ' + data.error);
        }

        const pagoID = data.pagoID;

        const datosPedido = {
            pagoID: pagoID,
            estado: 'recibido',
            fechaEntrega: null,  
            evidencia: null,  
            calificacion: null,  
            fechaEnvio: null,
            ubicacion: 'aña',
            metodoEntrega: 'Delivery',
            detalles: carrito
        };

        console.log('Datos del pedido a enviar:', JSON.stringify(datosPedido, null, 2)); // Registrar los datos que se están enviando

        return fetch('../../controlador/C_A_Carrito.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(datosPedido)
        });
    })
    .then(response => response.text()) // Cambia a .text() para ver la respuesta completa
    .then(text => {
        console.log('Response text:', text); // Registra la respuesta completa
        let data;
        try {
            data = JSON.parse(text); // Intenta analizar como JSON
        } catch (e) {
            throw new Error('Error al analizar JSON: ' + e.message + '\nRespuesta recibida: ' + text);
        }
        if (data.success) {
            alert('Compra realizada con éxito');
            localStorage.removeItem('carrito');
            window.location.href = "../V_R_Pago/pago.html"; // Reemplaza con la URL de la página de pago
        } else {
            alert('Error al realizar la compra: ' + data.error);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}


    if (confirmar) {
        confirmar.addEventListener('click', finalizarCompra);
    }
});



document.addEventListener("DOMContentLoaded", function() {
    var volverAlCarritoBtn = document.getElementById('volverAlCarritoBtn');

    volverAlCarritoBtn.addEventListener('click', function() {
        
        window.location.href = "../V_A_Carrito/carrito.html";
    });
});