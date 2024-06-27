document.addEventListener('DOMContentLoaded', function() {
    const urlProductos = '../../controlador/C_A_Menu.php';
    const urlGuardarCarrito = '../../controlador/guardar_carrito.php'; // Ruta al script PHP para guardar el carrito

    function crearProductoHTML(producto) {
        const imagePath = `../../fotos/${producto.foto}`;

        return `
            <div class="producto-card">
                <div class="producto-image">
                    <img src="${imagePath}" alt="${producto.nombre}">
                </div>
                <div class="producto-info">
                    <h2>${producto.nombre}</h2>
                    <p>${producto.descripcion}</p>
                    <p><strong>$${producto.precio}</strong></p>
                    <button class="btn-add-cart" data-producto-id="${producto.productoID}">Añadir al Carrito</button>
                </div>
            </div>
        `;
    }

    function cargarProductos() {
        fetch(urlProductos)
            .then(response => response.json())
            .then(productos => {
                const container = document.querySelector('.productos-container');
                container.innerHTML = ''; // Limpiar el contenedor antes de añadir productos
                productos.forEach(producto => {
                    container.innerHTML += crearProductoHTML(producto);
                });
                agregarEventListeners();
            })
            .catch(error => console.error('Error al cargar los productos:', error));
    }

    function agregarEventListeners() {
        const botonesAddCart = document.querySelectorAll('.btn-add-cart');
        botonesAddCart.forEach(boton => {
            boton.addEventListener('click', agregarAlCarrito);
        });
    }

    function agregarAlCarrito(event) {
        const productoID = event.target.dataset.productoId;
        fetch(urlProductos)
            .then(response => response.json())
            .then(productos => {
                const producto = productos.find(p => p.productoID == productoID);
                if (producto) {
                    guardarProductoEnCarrito(producto);
                }
            });
    }

    function guardarProductoEnCarrito(producto) {
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        let productoExistente = carrito.find(p => p.productoID == producto.productoID);

        if (productoExistente) {
            productoExistente.cantidad += 1;
        } else {
            producto.cantidad = 1;
            carrito.push(producto);
        }

        localStorage.setItem('carrito', JSON.stringify(carrito));
        actualizarContadorCarrito();
    }

    function actualizarContadorCarrito() {
        const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        const cuentaPedido = document.getElementById('cuentaPedido');
        cuentaPedido.textContent = carrito.length;
    }

    cargarProductos();
    actualizarContadorCarrito();
});
