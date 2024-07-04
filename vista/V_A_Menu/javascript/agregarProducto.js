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
