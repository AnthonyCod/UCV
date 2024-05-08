const targetContainer = document.getElementById("targetContainer");

function createProducts(producto){
    producto.forEach(products => {
        const newProduct = document.createElement("div");
        newProduct.classList = "tarjetaProducto";
        newProduct.innerHTML =  `
        <img src="./images/${products.img}">
        <h2>${products.name}</h2>
        <h3 class="price">${products.price}</h3>
        <button>${products.button}</button>
    `   
    targetContainer.appendChild(newProduct);
    newProduct.getElementsByTagName("button")[0].addEventListener("click",()=> addProduct(products))
    });
}

createProducts(products);
