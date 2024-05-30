document.getElementById('formInicio').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevenir el envío del formulario por defecto

    var form = event.target;
    var formData = new FormData(form);

    fetch('../../controlador/C_I_Sesion.php', {
        method: 'POST',
        body: formData
    }).then(response => response.json())
      .then(data => {
        if (data.success) {
            window.location.href = data.redirect;
        } else {
            document.getElementById('errorMensaje').innerText = data.message;
        }
    }).catch(error => {
        console.error('Error:', error);
    });
});
