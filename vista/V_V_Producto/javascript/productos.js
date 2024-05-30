document.addEventListener('DOMContentLoaded', function() {
    const urlProductos = '../../controlador/C_A_Menu.php';
    const urlGuardarCarrito = '../../controlador/guardar_carrito.php'; // Ruta al script PHP para guardar el carrito

    function crearProductoHTML(producto) {
        const imagePath = `../../fotos/${producto.foto}`;

        return `
            <div class="producto-card">
                <div class="producto-image">
                    <img src="${imagePath}" alt="${producto.nombre}" style="width: 100%; height: 200px; object-fit: cover;">
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
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
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

        // Asegurarse de que el enlace "Comprar Ahora" redirija correctamente
        const btnComprarAhora = document.getElementById('comprarAhora');
        btnComprarAhora.addEventListener('click', function(event) {
            event.preventDefault(); // Prevenir el comportamiento por defecto
            window.location.href = btnComprarAhora.getAttribute('href');
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
        fetch(urlGuardarCarrito, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(producto)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            console.log('Producto guardado en el carrito:', data);
        })
        .catch(error => console.error('Error al guardar el producto en el carrito:', error));
    }

    cargarProductos();
});
