document.addEventListener('DOMContentLoaded', function() {
    const searchButton = document.getElementById('buscar');
    const searchInput = document.getElementById('Pedidobuscar');

    searchButton.addEventListener('click', function() {
        const ID = searchInput.value;
        fetchEstadoOrden(ID);
    });
});

function fetchEstadoOrden(ID) {
    fetch('http://localhost/ucv/controlador/C_A_Estado.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ pedidoID: ID })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.text();  // Cambiar a text para depuración
    })
    .then(data => {
        console.log('Respuesta del servidor:', data); // Log de depuración
        try {
            // Separar la parte de depuración del JSON real
            const jsonData = data.split("\n").slice(-1)[0]; // Última línea debe ser JSON válido
            const json = JSON.parse(jsonData);
            if (json.error) {
                alert(json.error);
                resetearUI();  // Restablecer la UI si no se encuentra el pedido
            } else {
                actualizarUI(json);
            }
        } catch (e) {
            console.error('Error al analizar JSON:', e);
            console.error('Datos de respuesta:', data);
            resetearUI();  // Restablecer la UI si hay un error en la respuesta
        }
    })
    .catch(error => {
        console.error('Error:', error);
        resetearUI();  // Restablecer la UI si hay un error en la solicitud
    });
}

function actualizarUI(pedido) {
    const registrado = document.querySelector('.registrado');
    const enCamino = document.querySelector('.ruta');
    const entregado = document.querySelector('.entregado');

    // Reiniciar estilos de fondo y color de texto
    registrado.style.backgroundColor = '';
    registrado.style.color = '';
    enCamino.style.backgroundColor = '';
    enCamino.style.color = '';
    entregado.style.backgroundColor = '';
    entregado.style.color = '';

    document.getElementById('fechaRegistro').textContent = pedido.fechaRegistro;
    document.getElementById('fechaEntrega').textContent = pedido.fechaEntrega;
    document.getElementById('codigoVenta').textContent = pedido.pedidoID;
    document.getElementById('destino').textContent = pedido.ubicacion;

    console.log("Estado del pedido:", pedido.estado); // Línea de depuración

    if (pedido.estado === "recibido") {
        registrado.style.backgroundColor = '#0d52af';
        registrado.style.color = '#fff';
    } else if (pedido.estado === "en proceso") {
        registrado.style.backgroundColor = '#0d52af';
        registrado.style.color = '#fff';
        enCamino.style.backgroundColor = '#0d52af';
        enCamino.style.color = '#fff';
    } else if (pedido.estado === "entregado") {
        registrado.style.backgroundColor = '#0d52af';
        registrado.style.color = '#fff';
        enCamino.style.backgroundColor = '#0d52af';
        enCamino.style.color = '#fff';
        entregado.style.backgroundColor = '#0d52af';
        entregado.style.color = '#fff';
    }
}

function resetearUI() {
    const registrado = document.querySelector('.registrado');
    const enCamino = document.querySelector('.ruta');
    const entregado = document.querySelector('.entregado');

    // Restablecer estilos de fondo y color de texto
    registrado.style.backgroundColor = '';
    registrado.style.color = '';
    enCamino.style.backgroundColor = '';
    enCamino.style.color = '';
    entregado.style.backgroundColor = '';
    entregado.style.color = '';

    // Limpiar campos de texto
    document.getElementById('fechaRegistro').textContent = '';
    document.getElementById('fechaEntrega').textContent = '';
    document.getElementById('codigoVenta').textContent = '';
    document.getElementById('destino').textContent = '';
}
