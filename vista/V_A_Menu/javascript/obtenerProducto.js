document.addEventListener("DOMContentLoaded", () => {
    const targetContainer = document.getElementById("targetContainer");

    // Función para cargar productos
    function cargarProductos() {
        fetch('../../controlador/C_A_Menu.php')
        .then(response => response.json())
        .then(productos => {
            targetContainer.innerHTML = ''; // Limpiar contenedor
            productos.forEach(product => {
                const productCard = document.createElement("div");
                productCard.className = "tarjetaProducto";
                productCard.innerHTML = `
                    <h2>${product.nombreProducto}</h2>
                    <p>${product.descripcionProducto}</p>
                    <p class="price">$${product.precio}</p>
                    <img src="${product.foto}" alt="${product.nombreProducto}" style="width:100px;height:100px;margin-top:10px;">
                `;
                targetContainer.appendChild(productCard);
            });
        })
        .catch(error => console.error('Error cargando productos:', error));
    }

    // Cargar productos al inicio
    cargarProductos();
});
