document.addEventListener('DOMContentLoaded', function() {
    function cargarCarrito() {
        const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        const carritoProductos = document.getElementById('carritoProductos');
        carritoProductos.innerHTML = '';

        let subtotal = 0;

        carrito.forEach(producto => {
            const productoHTML = `
                <div class="producto">
                    <div class="nombre">
                        <img src="../../fotos/${producto.foto}" alt="${producto.nombre}">
                        <h2>${producto.nombre}</h2>
                    </div>
                    <div class="precioUnitario">
                        <h2>${producto.precio}</h2><br>
                    </div>
                    <div class="cantidad">
                        <input type="number" value="${producto.cantidad}" min="1" data-producto-id="${producto.productoID}">
                    </div>
                    <div class="importe">
                        <h2>$${producto.precio * producto.cantidad}</h2>
                    </div>
                    <div class="borrarProducto">
                        <button data-producto-id="${producto.productoID}"><i class='bx bx-trash'></i></button>
                    </div>
                </div>
            `;
            carritoProductos.innerHTML += productoHTML;
            subtotal += producto.precio * producto.cantidad;
        });

        document.getElementById('subtotal').textContent = `$${subtotal}`;
        document.getElementById('total').textContent = `$${subtotal}`;
    }

    function actualizarCantidad(event) {
        const productoID = event.target.dataset.productoId;
        const nuevaCantidad = parseInt(event.target.value, 10);

        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        let producto = carrito.find(p => p.productoID == productoID);

        if (producto) {
            producto.cantidad = nuevaCantidad;
            localStorage.setItem('carrito', JSON.stringify(carrito));
            cargarCarrito();
        }
    }

    function eliminarProducto(event) {
        const productoID = event.target.dataset.productoId;

        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        carrito = carrito.filter(p => p.productoID != productoID);

        localStorage.setItem('carrito', JSON.stringify(carrito));
        cargarCarrito();
        actualizarContadorCarrito();
    }

    function actualizarContadorCarrito() {
        const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        const cuentaPedido = document.getElementById('cuentaPedido');
        cuentaPedido.textContent = carrito.length;
    }

    document.getElementById('carritoProductos').addEventListener('change', function(event) {
        if (event.target.type === 'number') {
            actualizarCantidad(event);
        }
    });

    document.getElementById('carritoProductos').addEventListener('click', function(event) {
        if (event.target.tagName === 'BUTTON' || event.target.tagName === 'I') {
            eliminarProducto(event);
        }
    });

    document.getElementById('procesarPagoBtn').addEventListener('click', function() {
        window.location.href = "../V_R_Pago/pago.html"; // Reemplaza con la URL de la página de pago
    });

    cargarCarrito();
});
