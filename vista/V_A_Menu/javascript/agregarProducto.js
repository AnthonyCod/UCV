document.addEventListener("DOMContentLoaded", () => {
    const addProductButton = document.querySelector(".nuevoProducto");
    const formContainer = document.getElementById("formContainer");
    const closeFormButton = document.getElementById("closeForm");
    const productImageInput = document.getElementById("productImage");
    const previewImage = document.getElementById("previewImage");
    const productForm = document.getElementById("formContainer");
    const targetContainer = document.getElementById("targetContainer");

    addProductButton.addEventListener("click", () => {
        formContainer.style.display = "flex";
    });

    closeFormButton.addEventListener("click", (event) => {
        event.preventDefault();
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
    
        fetch('../../controlador/C_A_Menu.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text()) // Cambiar a .text() para depuración
        .then(text => {
            try {
                const data = JSON.parse(text);
                if (data.success) {
                    const product = data.product;
                    const productCard = document.createElement("div");
                    productCard.className = "tarjetaProducto";
                    productCard.innerHTML = `
                        <h2>${product.nombre}</h2>
                        <p>${product.descripcion}</p>
                        <p class="price">$${product.precio}</p>
                        <img src="../../ucv/${product.image}" alt="${product.nombre}" style="width:300px;height:300px;margin-top:20px;">
                    `;
                    targetContainer.appendChild(productCard);
    
                    // Clear form inputs
                    productForm.reset();
                    previewImage.src = "";
                    previewImage.style.display = "none";
                    formContainer.style.display = "none";
                } else {
                    console.error(data.error);
                }
            } catch (error) {
                console.error('Error parsing JSON:', text);
            }
        })
        .catch(error => console.error('Error:', error));
    });

    // Función para cargar productos al inicio
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
                    <img src="../../ucv/${product.foto}" alt="${product.nombreProducto}" style="width:100px;height:100px;margin-top:10px;">
                `;
                targetContainer.appendChild(productCard);
            });
        })
        .catch(error => console.error('Error cargando productos:', error));
    }

    // Cargar productos al inicio
    cargarProductos();
});
