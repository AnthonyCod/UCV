document.addEventListener("DOMContentLoaded", () => {
    const addProductButton = document.querySelector(".nuevoProducto");
    const formContainer = document.getElementById("formContainer");
    const closeFormButton = document.getElementById("closeForm");
    const saveProductButton = document.getElementById("saveProduct");

    addProductButton.addEventListener("click", () => {
        formContainer.style.display = "flex";
    });

    closeFormButton.addEventListener("click", () => {
        formContainer.style.display = "none";
    });

    saveProductButton.addEventListener("click", () => {
        const name = document.getElementById("productName").value;
        const price = document.getElementById("productPrice").value;
        const img = document.getElementById("productImage").value;

        if (name && price && img) {
            const newProduct = {
                name: name,
                price: price,
                img: img,
                button: "Comprar"
            };

            createProducts([newProduct]);
            formContainer.classList.add("hidden");
        } else {
            alert("Por favor, complete todos los campos.");
        }
    });
});
