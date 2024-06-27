document.addEventListener('DOMContentLoaded', function() {
    const productosContainer = document.querySelector('.productos-container');

    function cargarProductos() {
<<<<<<< HEAD
        fetch('../../controlador/C_A_Menu.php')
        .then(response => response.json())
        .then(productos => {
            productosContainer.innerHTML = ''; // Limpiar contenedor antes de agregar productos
            productos.forEach((producto) => {
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
                        </div>
                    </div>`;
                productosContainer.innerHTML += productoHTML;
=======
        fetch(urlProductos)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(productos => {
                const container = document.querySelector('.productos-container');
                if (container) {
                    container.innerHTML = ''; // Limpiar el contenedor antes de añadir productos
                    productos.forEach(producto => {
                        container.innerHTML += crearProductoHTML(producto);
                    });
                    agregarEventListeners();
                } else {
                    console.error('No se encontró el contenedor de productos.');
                }
            })
            .catch(error => console.error('Error al cargar los productos:', error));
    }

    function agregarEventListeners() {
        const botonesAddCart = document.querySelectorAll('.btn-add-cart');
        if (botonesAddCart) {
            botonesAddCart.forEach(boton => {
                boton.addEventListener('click', agregarAlCarrito);
            });
        } else {
            console.error('No se encontraron botones de "Añadir al Carrito".');
        }

        // Asegurarse de que el enlace "Comprar Ahora" redirija correctamente
        const btnComprarAhora = document.querySelector('.btn-primary');
        if (btnComprarAhora) {
            btnComprarAhora.addEventListener('click', function(event) {
                event.preventDefault(); // Prevenir el comportamiento por defecto
                window.location.href = btnComprarAhora.getAttribute('href');
            });
        } else {
            console.error('No se encontró el botón "Comprar Ahora".');
        }
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
>>>>>>> b6f422b (falta carrito para adelante)
            });

            agregarEventosDeCarrito();
        })
        .catch(error => console.error('Error al cargar los productos:', error));
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

    function añadirProductoAlCarrito(productoID, productoNombre, productoPrecio, productoFoto) {
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        let productoEnCarrito = carrito.find(producto => producto.productoID === productoID);

        if (productoEnCarrito) {
            productoEnCarrito.cantidad += 1;
            productoEnCarrito.importe += productoPrecio;
        } else {
            carrito.push({ productoID, productoNombre, productoPrecio, productoFoto, cantidad: 1, importe: productoPrecio });
        }

        localStorage.setItem('carrito', JSON.stringify(carrito));
        actualizarContadorCarrito();
        console.log('Producto añadido al carrito:', carrito);
    }

    function actualizarContadorCarrito() {
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        const cuentaPedido = document.getElementById('cuentaPedido');
        cuentaPedido.textContent = carrito.reduce((acc, producto) => acc + producto.cantidad, 0);
    }

    cargarProductos();
    actualizarContadorCarrito();
});
