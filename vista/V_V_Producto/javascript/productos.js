document.addEventListener('DOMContentLoaded', function() {
    const url = '/ucv/controlador/C_A_Menu.php';

    function crearProductoHTML(producto) {
        console.log('Creando HTML para:', producto); // Para depuración

        const imagePath = `../../../fotos/${producto.foto}`;

        return `
            <div class="producto-card">
                <div class="producto-image">
                    <img src="${imagePath}" alt="${producto.nombreProducto}" style="width: 100%; height: 200px; object-fit: cover;">
                </div>
                <div class="producto-info">
                    <h2>${producto.nombreProducto}</h2>
                    <p>${producto.descripcionProducto}</p>
                    <p><strong>$${producto.precio}</strong></p>
                </div>
            </div>
        `;
    }

    function cargarProductos() {
        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(productos => {
                console.log('Productos recibidos:', productos); // Para depuración
                const container = document.querySelector('.productos-container');
                container.innerHTML = ''; // Limpiar el contenedor antes de añadir productos
                productos.forEach(producto => {
                    container.innerHTML += crearProductoHTML(producto);
                });
            })
            .catch(error => console.error('Error al cargar los productos:', error));
    }

    cargarProductos();
});
