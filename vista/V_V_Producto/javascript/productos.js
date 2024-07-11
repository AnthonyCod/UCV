document.addEventListener('DOMContentLoaded', function() {
<<<<<<< HEAD
<<<<<<< HEAD
    const productosContainer = document.querySelector('.productos-container');
=======
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
>>>>>>> 39d1c8f (continuar)

    function cargarProductos() {
<<<<<<< HEAD
=======
    const productosContainer = document.querySelector('.productos-container');

    function cargarProductos() {
>>>>>>> e6489bf (Funciona carrito)
        fetch('../../controlador/C_A_Menu.php')
        .then(response => response.json())
        .then(productos => {
            productosContainer.innerHTML = ''; // Limpiar contenedor antes de agregar productos
            productos.forEach((producto) => {
<<<<<<< HEAD
=======
            productos.forEach(producto => {
>>>>>>> e6489bf (Funciona carrito)
=======
>>>>>>> 052577c (olviden esto)
                const productoHTML = `
                    <div class="producto-card">
                        <div class="producto-image">
                            <img src="../../fotos/${producto.foto}" alt="${producto.nombre}">
                        </div>
                        <div class="producto-info">
                            <h2>${producto.nombre}</h2>
                            <p>${producto.descripcion}</p>
                            <p><strong>$${producto.precio}</strong></p>
                            <button class="btn-add-cart" data-producto-id="${producto.id}" data-producto-nombre="${producto.nombre}" data-producto-precio="${producto.precio}" data-producto-foto="${producto.foto}">Añadir al Carrito</button>
<<<<<<< HEAD
                        </div>
                    </div>`;
                productosContainer.innerHTML += productoHTML;
=======
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
=======
                            <button class="btn-add-cart" data-producto-id="${producto.productoID}" data-producto-nombre="${producto.nombre}" data-producto-precio="${producto.precio}" data-producto-foto="${producto.foto}">Añadir al Carrito</button>
=======
>>>>>>> 052577c (olviden esto)
                        </div>
                    </div>`;
                productosContainer.innerHTML += productoHTML;
            });

            agregarEventosDeCarrito();
        })
        .catch(error => console.error('Error al cargar los productos:', error));
>>>>>>> e6489bf (Funciona carrito)
    }

    function agregarEventosDeCarrito() {
        document.querySelectorAll('.btn-add-cart').forEach(button => {
            button.addEventListener('click', function() {
                const productoID = this.getAttribute('data-producto-id');
                const productoNombre = this.getAttribute('data-producto-nombre');
                const productoPrecio = parseFloat(this.getAttribute('data-producto-precio'));
                const productoFoto = this.getAttribute('data-producto-foto');
                añadirProductoAlCarrito(productoID, productoNombre, productoPrecio, productoFoto);
            });
        });
    }

<<<<<<< HEAD
    function agregarAlCarrito(event) {
        const productoID = event.target.dataset.productoId;
        fetch(urlProductos)
            .then(response => response.json())
            .then(productos => {
                const producto = productos.find(p => p.productoID == productoID);
                if (producto) {
                    guardarProductoEnCarrito(producto);
                }
>>>>>>> b6f422b (falta carrito para adelante)
            });

            agregarEventosDeCarrito();
        })
        .catch(error => console.error('Error al cargar los productos:', error));
    }

<<<<<<< HEAD
    function agregarEventosDeCarrito() {
        document.querySelectorAll('.btn-add-cart').forEach(button => {
            button.addEventListener('click', function() {
                const productoID = this.getAttribute('data-producto-id');
                const productoNombre = this.getAttribute('data-producto-nombre');
                const productoPrecio = parseFloat(this.getAttribute('data-producto-precio'));
                const productoFoto = this.getAttribute('data-producto-foto');
                añadirProductoAlCarrito(productoID, productoNombre, productoPrecio, productoFoto);
            });
        });
    }

    function añadirProductoAlCarrito(productoID, productoNombre, productoPrecio, productoFoto) {
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        let productoEnCarrito = carrito.find(producto => producto.productoID === productoID);

        if (productoEnCarrito) {
            productoEnCarrito.cantidad += 1;
            productoEnCarrito.importe += productoPrecio;
        } else {
            carrito.push({ productoID, productoNombre, productoPrecio, productoFoto, cantidad: 1, importe: productoPrecio });
=======
    function guardarProductoEnCarrito(producto) {
=======
    function añadirProductoAlCarrito(productoID, productoNombre, productoPrecio, productoFoto) {
>>>>>>> e6489bf (Funciona carrito)
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        let productoEnCarrito = carrito.find(producto => producto.productoID === productoID);

        if (productoEnCarrito) {
            productoEnCarrito.cantidad += 1;
            productoEnCarrito.importe += productoPrecio;
        } else {
<<<<<<< HEAD
            producto.cantidad = 1;
            carrito.push(producto);
>>>>>>> 39d1c8f (continuar)
=======
            carrito.push({ productoID, productoNombre, productoPrecio, productoFoto, cantidad: 1, importe: productoPrecio });
>>>>>>> e6489bf (Funciona carrito)
        }

        localStorage.setItem('carrito', JSON.stringify(carrito));
        actualizarContadorCarrito();
<<<<<<< HEAD
<<<<<<< HEAD
        console.log('Producto añadido al carrito:', carrito);
    }

    function actualizarContadorCarrito() {
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        const cuentaPedido = document.getElementById('cuentaPedido');
        cuentaPedido.textContent = carrito.reduce((acc, producto) => acc + producto.cantidad, 0);
<<<<<<< HEAD
=======
=======
        console.log('Producto añadido al carrito:', carrito);
>>>>>>> e6489bf (Funciona carrito)
    }

    function actualizarContadorCarrito() {
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        const cuentaPedido = document.getElementById('cuentaPedido');
        cuentaPedido.textContent = carrito.length;
>>>>>>> 39d1c8f (continuar)
=======
>>>>>>> 052577c (olviden esto)
    }

    cargarProductos();
    actualizarContadorCarrito();
});
