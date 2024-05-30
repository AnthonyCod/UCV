document.addEventListener('DOMContentLoaded', function() {
    fetch('get_carrito.php')
    .then(response => response.json())
    .then(data => displayCarrito(data))
    .catch(error => console.error('Error al cargar el carrito:', error));
});

function displayCarrito(items) {
    const container = document.getElementById('productosCarrito');
    container.innerHTML = ''; // Limpiar contenido anterior

    items.forEach(item => {
        const productDiv = document.createElement('div');
        productDiv.className = 'producto-carrito';
        productDiv.innerHTML = `
            <div>
                <img src="../images/${item.productoID}.png" alt="${item.nombre}" style="width:50px; height:50px;">
                <p>${item.nombre}</p>
                <p>Cantidad: ${item.cantidad}</p>
                <p>Precio por unidad: $${item.precio}</p>
                <p>Importe: $${item.importe}</p>
            </div>
        `;
        container.appendChild(productDiv);
    });
}
