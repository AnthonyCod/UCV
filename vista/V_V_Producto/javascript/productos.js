document.addEventListener('DOMContentLoaded', function() {
<<<<<<<<< Temporary merge branch 1
    const url = '/ucv/controlador/C_A_Menu.php';

    function crearProductoHTML(producto) {
        console.log('Creando HTML para:', producto); // Para depuración

        const imagePath = `../../fotos/${producto.foto}`;

        return `
            <div class="producto-card">
                <div class="producto-image">
                    <img src="${imagePath}" alt="${producto.nombre}" style="width: 100%; height: 200px; object-fit: cover;">
=========
    const urlProductos = '../../controlador/C_A_Menu.php';
    const urlGuardarCarrito = '../../controlador/guardar_carrito.php'; // Ruta al script PHP para guardar el carrito

    function crearProductoHTML(producto) {
        const imagePath = `../../fotos/${producto.foto}`;

        return `
            <div class="producto-card">
                <div class="producto-image">
                    <img src="${imagePath}" alt="${producto.nombre}">
>>>>>>>>> Temporary merge branch 2
                </div>
                <div class="producto-info">
                    <h2>${producto.nombre}</h2>
                    <p>${producto.descripcion}</p>
                    <p><strong>$${producto.precio}</strong></p>
<<<<<<<<< Temporary merge branch 1
=========
                    <button class="btn-add-cart" data-producto-id="${producto.productoID}">Añadir al Carrito</button>
>>>>>>>>> Temporary merge branch 2
                </div>
            </div>
        `;
    }

    function cargarProductos() {
<<<<<<<<< Temporary merge branch 1
        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(productos => {
                console.log('Productos recibidos:', productos); // Para depuración
=========
        fetch(urlProductos)
            .then(response => response.json())
            .then(productos => {
>>>>>>>>> Temporary merge branch 2
                const container = document.querySelector('.productos-container');
                container.innerHTML = ''; // Limpiar el contenedor antes de añadir productos
                productos.forEach(producto => {
                    container.innerHTML += crearProductoHTML(producto);
                });
<<<<<<<<< Temporary merge branch 1
=========
                agregarEventListeners();
>>>>>>>>> Temporary merge branch 2
            })
            .catch(error => console.error('Error al cargar los productos:', error));
    }

<<<<<<<<< Temporary merge branch 1
    cargarProductos();
=========
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
>>>>>>>>> Temporary merge branch 2
});
