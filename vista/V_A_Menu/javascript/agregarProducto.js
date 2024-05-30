document.addEventListener("DOMContentLoaded", () => {
    const addProductButton = document.querySelector(".nuevoProducto");
    const formContainer = document.getElementById("formContainer");
    const closeFormButton = document.getElementById("closeForm");
    const productImageInput = document.getElementById("productImage");
    const previewImage = document.getElementById("previewImage");

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

});
