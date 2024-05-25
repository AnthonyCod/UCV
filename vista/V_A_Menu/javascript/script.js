const targetContainer = document.getElementById("targetContainer");

        function addProduct(product) {
            console.log(`Producto agregado: ${product.name}`);
        }

        function createProducts(producto) {
            producto.forEach(products => {
                const newProduct = document.createElement("div");
                newProduct.classList.add("tarjetaProducto");
                newProduct.innerHTML = `
                    <img src="${products.img}" alt="${products.name}">
                    <h2>${products.name}</h2>
                    <h3>${products.desp}</h3>
                    <h3 class="price">${"S/." + products.price}</h3>
                    <button>${products.button}</button>
                `;
                targetContainer.appendChild(newProduct);
                newProduct.querySelector("button").addEventListener("click", () => addProduct(products));
            });
        }