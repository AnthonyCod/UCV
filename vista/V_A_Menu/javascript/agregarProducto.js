document.addEventListener("DOMContentLoaded", () => {
    const addProductButton = document.querySelector(".nuevoProducto");
    const formContainer = document.getElementById("formContainer");
    const closeFormButton = document.getElementById("closeForm");

    addProductButton.addEventListener("click", () => {
        formContainer.style.display = "flex";
    });

    closeFormButton.addEventListener("click", (event) => {
        event.preventDefault();
        formContainer.style.display = "none";
    });

    $('#formContainer').submit(function(event) {
        event.preventDefault(); // Evita el envío normal del formulario

        $.ajax({
            url: '../../controlador/C_A_Menu.php',
            type: 'post',
            data: $(this).serialize(),
            success: function(response) {
                alert(response); // Muestra la respuesta del servidor
                formContainer.style.display = "none";

                // Limpiar los campos del formulario
                document.getElementById("productName").value = "";
                document.getElementById("productDescription").value = "";
                document.getElementById("productPrice").value = "";
                document.getElementById("productList").value = "";
            },
            error: function(xhr, status, error) {
                alert("Ocurrió un error: " + error);
            }
        });
    });
});
