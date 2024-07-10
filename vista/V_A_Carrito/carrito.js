document.addEventListener('DOMContentLoaded', function() {
    const carritoProductosContainer = document.getElementById('carritoProductos');
    const subtotalElement = document.getElementById('subtotal');
    const totalElement = document.getElementById('total');
    const procesarPagoBtn = document.getElementById('procesarPagoBtn');

    function cargarCarrito() {
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        carritoProductosContainer.innerHTML = '';

        let subtotal = 0;

        carrito.forEach(producto => {
            subtotal += producto.importe;
            const productoHTML = `
                <div class="producto-carrito">
                    <div class="producto-col">
                        <img src="../../fotos/${producto.productoFoto}" alt="${producto.productoNombre}">
                        <h2>${producto.productoNombre}</h2>
                    </div>
                    <div class="precio-col">
                        <p>$${producto.productoPrecio.toFixed(2)}</p>
                    </div>
                    <div class="cantidad-col">
                        <input type="number" id="cantidad-${producto.productoID}" min="1" value="${producto.cantidad}" data-producto-id="${producto.productoID}">
                    </div>
                    <div class="importe-col">
                        <p>$<span id="importe-${producto.productoID}">${producto.importe.toFixed(2)}</span></p>
                    </div>
                    <div class="acciones-col">
                        <button class="btn-eliminar" data-producto-id="${producto.productoID}"><i class="fa fa-trash"></i></button>
                    </div>
                </div>`;
            carritoProductosContainer.innerHTML += productoHTML;
        });

        actualizarSubtotalTotal(subtotal);
        agregarEventosDeCantidad();
        agregarEventosDeEliminar();
    }

    function actualizarSubtotalTotal(subtotal) {
        subtotalElement.textContent = `$${subtotal.toFixed(2)}`;
        totalElement.textContent = `$${subtotal.toFixed(2)}`;
    }

    function agregarEventosDeCantidad() {
        document.querySelectorAll('input[type="number"]').forEach(input => {
            input.addEventListener('change', function() {
                const productoID = this.getAttribute('data-producto-id');
                const nuevaCantidad = parseInt(this.value);
                actualizarCantidadProducto(productoID, nuevaCantidad);
            });
        });
    }

    function agregarEventosDeEliminar() {
        document.querySelectorAll('.btn-eliminar').forEach(button => {
            button.addEventListener('click', function() {
                const productoID = this.getAttribute('data-producto-id');
                eliminarProductoDelCarrito(productoID);
            });
        });
    }

    function actualizarCantidadProducto(productoID, nuevaCantidad) {
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        let producto = carrito.find(producto => producto.productoID == productoID);

        if (producto) {
            producto.cantidad = nuevaCantidad;
            producto.importe = producto.productoPrecio * nuevaCantidad;
            localStorage.setItem('carrito', JSON.stringify(carrito));
            document.getElementById(`importe-${productoID}`).textContent = producto.importe.toFixed(2);
            let subtotal = carrito.reduce((sum, producto) => sum + producto.importe, 0);
            actualizarSubtotalTotal(subtotal);
        }
    }

    function eliminarProductoDelCarrito(productoID) {
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        carrito = carrito.filter(producto => producto.productoID != productoID);
        localStorage.setItem('carrito', JSON.stringify(carrito));
        cargarCarrito();
    }
    
    function redirigirPagina() {
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        
        if (carrito.length === 0) {
            alert('El carrito está vacío.');
            return;
        }
    
        if (!document.getElementById('terminos').checked) {
            alert('Debes aceptar los términos y condiciones.');
            return;
        }
    
        window.location.href = "../V_R_Pago/pago.html";
    }
    


    cargarCarrito();

    if (procesarPagoBtn) {
        procesarPagoBtn.addEventListener('click', redirigirPagina);
    }
});
