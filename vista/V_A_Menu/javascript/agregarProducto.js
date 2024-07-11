document.addEventListener("DOMContentLoaded", () => {
    const addProductButton = document.querySelector(".nuevoProducto");
    const formContainer = document.getElementById("formContainer");
    const closeFormButton = document.querySelector(".close");
    const productImageInput = document.getElementById("productImage");
    const previewImage = document.getElementById("previewImage");
    const productForm = document.getElementById("productForm");
    const targetContainer = document.getElementById("targetContainer");

    const editFormContainer = document.getElementById("editFormContainer");
    const closeEditFormButton = document.querySelector(".closeEdit");
    const editProductImageInput = document.getElementById("editProductImage");
    const editPreviewImage = document.getElementById("editPreviewImage");
    const editProductForm = document.getElementById("editProductForm");

    addProductButton.addEventListener("click", () => {
        formContainer.style.display = "block";
    });

    closeFormButton.addEventListener("click", () => {
        formContainer.style.display = "none";
    });

    productImageInput.addEventListener("change", (event) => {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = (e) => {
            previewImage.src = e.target.result;
            previewImage.style.display = "block";
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            previewImage.src = "";
            previewImage.style.display = "none";
        }
    });

    productForm.addEventListener("submit", (event) => {
        event.preventDefault(); // Prevent normal form submission

        const formData = new FormData(productForm);
        formData.append('action', 'guardar'); // Añadir el campo de acción

        fetch('../../controlador/C_A_Menu.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text()) // Cambiar a .text() para depuración
        .then(text => {
            console.log('Respuesta del servidor:', text); // Para depuración
            try {
                const data = JSON.parse(text);
                if (data.success) {
                    const product = data.product;
                    const productCard = document.createElement("div");
                    productCard.className = "tarjetaProducto";
                    productCard.innerHTML = `
                        <button class="delete-btn" data-nombre="${product.nombre}">&times;</button>
                        <h2>${product.nombre}</h2>
                        <p>${product.descripcion}</p>
                        <p class="price">$${product.precio}</p>
                        <img src="../../fotos/${product.foto}" alt="${product.nombre}";"><br>
                        <button class="edit-btn" data-nombre="${product.nombre}" data-product='${JSON.stringify(product)}'>Editar</button>`;
                    targetContainer.appendChild(productCard);

                    // Clear form inputs
                    productForm.reset();
                    previewImage.src = "";
                    previewImage.style.display = "none";
                    formContainer.style.display = "none";

                    // Add delete functionality
                    productCard.querySelector(".delete-btn").addEventListener("click", () => eliminarProducto(product.nombre, productCard));
                    // Add edit functionality
                    productCard.querySelector(".edit-btn").addEventListener("click", () => editarProducto(product));
                } else {
                    console.error(data.error);
                }
            } catch (error) {
                console.error('Error parsing JSON:', text);
            }
        })
        .catch(error => console.error('Error:', error));
    });

    closeEditFormButton.addEventListener("click", () => {
        editFormContainer.style.display = "none";
    });

    editProductImageInput.addEventListener("change", (event) => {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = (e) => {
            editPreviewImage.src = e.target.result;
            editPreviewImage.style.display = "block";
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            editPreviewImage.src = "";
            editPreviewImage.style.display = "none";
        }
    });

    editProductForm.addEventListener("submit", (event) => {
        event.preventDefault(); // Prevent normal form submission

        const formData = new FormData(editProductForm);
        formData.append('action', 'editar'); // Añadir el campo de acción

        fetch('../../controlador/C_A_Menu.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                cargarProductos();
                editFormContainer.style.display = "none";
            } else {
                console.error(data.error);
            }
        })
        .catch(error => console.error('Error:', error));
    });

    // Función para cargar productos al inicio
    function cargarProductos() {
        fetch('../../controlador/C_A_Menu.php')
        .then(response => response.json())
        .then(productos => {
            console.log('Productos recibidos:', productos); // Para depuración
            targetContainer.innerHTML = ''; // Limpiar contenedor
            productos.forEach(product => {
                console.log('Producto:', product); // Para depuración
                const productCard = document.createElement("div");
                productCard.className = "tarjetaProducto";
                productCard.innerHTML = `
                <button class="delete-btn" data-nombre="${product.nombre}">&times;</button>
                <h2>${product.nombre}</h2>
                <p>${product.descripcion}</p>
                <p class="price">$${product.precio}</p>
                <img src="../../fotos/${product.foto}" alt="${product.nombre}";"><br>
                <button class="edit-btn" data-nombre="${product.nombre}" data-product='${JSON.stringify(product)}'>Editar</button>`;
                
            targetContainer.appendChild(productCard);
                targetContainer.appendChild(productCard);

                // Add delete functionality
                productCard.querySelector(".delete-btn").addEventListener("click", () => eliminarProducto(product.nombre, productCard));
                // Add edit functionality
                productCard.querySelector(".edit-btn").addEventListener("click", () => editarProducto(product));
            });
        })
        .catch(error => console.error('Error cargando productos:', error));
    }

    function eliminarProducto(nombre, productCard) {
        if (confirm(`¿Estás seguro de que deseas eliminar el producto ${nombre}?`)) {
            const formData = new FormData();
            formData.append('action', 'eliminar');
            formData.append('nombreProducto', nombre);

            fetch('../../controlador/C_A_Menu.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    productCard.remove();
                    alert('Producto eliminado exitosamente');
                } else {
                    alert('Error al eliminar el producto');
                }
            })
            .catch(error => console.error('Error:', error));
        }
    }

    function editarProducto(product) {
        // Cargar datos del producto en el formulario de edición
        document.getElementById("editProductList").value = product.categoria;
        document.getElementById("editProductName").value = product.nombre;
        document.getElementById("editProductDescription").value = product.descripcion;
        document.getElementById("editProductPrice").value = product.precio;
        if (product.foto) {
            editPreviewImage.src = `../../fotos/${product.foto}`;
            editPreviewImage.style.display = "block";
        } else {
            editPreviewImage.src = "";
            editPreviewImage.style.display = "none";
        }
        
        // Mostrar el formulario de edición
        editFormContainer.style.display = "block";
    }

    cargarProductos();
});