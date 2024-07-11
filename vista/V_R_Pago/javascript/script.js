document.addEventListener("DOMContentLoaded", function() {
    var qrButton = document.getElementById('qrButton');
    var container = document.querySelector('.container');
    var childContainer = document.querySelector('.child-container');
    const confirmar = document.getElementById('confirmar');
    var metodoEntregaSelect = document.getElementById('metodoEntrega');
    var direccionContainer = document.getElementById('direccionContainer');
    var direccionInput = document.getElementById('direccion');

    // Ocultar el contenedor hijo inicialmente
    if (childContainer) {
        childContainer.style.display = 'none';
    }

    // Agregar un evento click al botón
    if (qrButton) {
        qrButton.addEventListener('click', function() {
            // Mostrar el contenedor hijo y ocultar el contenedor principal
            if (childContainer) {
                childContainer.style.display = 'grid';
            }
            if (container) {
                container.style.display = 'none';
            }
        });
    }

    function finalizarCompra() {
        const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        const metodoEntrega = localStorage.getItem('metodoEntrega');
        const direccion = localStorage.getItem('direccion');

        if (carrito.length === 0) {
            alert('El carrito está vacío.');
            return;
        }

        if (metodoEntrega && metodoEntregaSelect) {
            metodoEntregaSelect.value = metodoEntrega;
        }

        if (direccion && metodoEntrega === 'delivery' && direccionContainer && direccionInput) {
            direccionContainer.style.display = 'block';
            direccionInput.value = direccion;
        }

        // Primero, registrar el pago
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
                ubicacion: localStorage.getItem('direccion'),
                metodoEntrega: localStorage.getItem('metodoEntrega'),
                clienteID: 1,
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
        .then(response => response.text()) 
        .then(text => {
            console.log('Response text:', text); 
            let data;
            try {
                data = JSON.parse(text); 
            } catch (e) {
                throw new Error('Error al analizar JSON: ' + e.message + '\nRespuesta recibida: ' + text);
            }
            if (data.success) {
                alert('Compra realizada con éxito');
                localStorage.removeItem('carrito');
                // Eliminamos datos de localStorage 
                localStorage.removeItem('metodoEntrega');
                localStorage.removeItem('direccion');
                window.location.href = "../V_R_Pago/pago.html"; 
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

    if (volverAlCarritoBtn) {
        volverAlCarritoBtn.addEventListener('click', function() {
            window.location.href = "../V_A_Carrito/carrito.html";
        });
    }
});
