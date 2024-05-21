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
        const imgFile = document.getElementById("productImage").files[0];
        const name = document.getElementById("productName").value;
        const desp = document.getElementById("productDescription").value;
        const price = document.getElementById("productPrice").value;

        if (imgFile && name && price && desp) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imgSrc = e.target.result;
                const newProduct = {
                    img: imgSrc,
                    name: name,
                    price: price,
                    desp: desp,
                    button: "Actualizar"
                };

                createProducts([newProduct]);
                formContainer.style.display = "none";

                document.getElementById("productImage").value = "";
                document.getElementById("productName").value = "";
                document.getElementById("productDescription").value = "";
                document.getElementById("productPrice").value = "";
            };
            reader.readAsDataURL(imgFile);
        } else {
            alert("Por favor, complete todos los campos.");
        }
    });
});
