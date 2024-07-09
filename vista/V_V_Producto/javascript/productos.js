document.addEventListener('DOMContentLoaded', function() {
    const productosContainer = document.querySelector('.productos-container');

    function cargarProductos() {
        fetch('../../controlador/C_A_Menu.php')
        .then(response => response.json())
        .then(productos => {
            productosContainer.innerHTML = ''; // Limpiar contenedor antes de agregar productos
            productos.forEach((producto, index) => {
                const productoHTML = `
                    <div class="producto-card">
                        <div class="producto-image">
                            <img src="../../fotos/${producto.foto}" alt="${producto.nombre}">
                        </div>
                        <div class="producto-info">
                            <h2>${producto.nombre}</h2>
                            <p>${producto.descripcion}</p>
                            <p><strong>$${producto.precio}</strong></p>
                            <button class="btn-add-cart" data-producto-id="${producto.nombre}-${index}" data-producto-nombre="${producto.nombre}" data-producto-precio="${producto.precio}" data-producto-foto="${producto.foto}">Añadir al Carrito</button>
                        </div>
                    </div>`;
                productosContainer.innerHTML += productoHTML;
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
