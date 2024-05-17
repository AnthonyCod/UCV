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
        const img = document.getElementById("productImage").files[0];
        const name = document.getElementById("productName").value;
        const desp = document.getElementById("productDescription").value;
        const price = document.getElementById("productPrice").value;

        if (img && name && price && desp ) {
            const newProduct = {
                img: img,
                name: name,
                price: price,
                desp:desp,
                button: "Comprar"
            };

            createProducts([newProduct]);
            formContainer.classList.add("hidden");
        } else {
            alert("Por favor, complete todos los campos.");
        }
    });
});
