<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Establecimiento</title>
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <!--============== HEADER ==============-->
    <header>
        <div class="icon">
            <span class="fa fa-bars" id="bars"></span>
            <span>UCV FOOD </span>
            <img id="iconoPrincipal" src="../images/iconoPrincipal.png" alt="Icono Principal">
        </div>
        <div class="search-container">
            <input type="search" placeholder="Buscar...">
            <span class="fa fa-search"></span>
        </div>
    </header>
    <!--============== FORMULARIO ==============-->
    <br><br>
    <div class="formContent">
        <h2>¿Estas Seguro de ser repartidor? <i class="fas fa-box-open"></i></h2>
        <label for="productYes">
           <h4>Si estoy Seguro</h4><input type="checkbox" id="productYes" name="productName" placeholder="" required>
        </label>
        <label for="productNo">
            <h4>No estoy seguro</h4><input type="checkbox" id="productNo" name="productName" placeholder="No estoy Seguro" required>
        </label>
        <button id="saveProduct" name="saveProduct">Enviar Respuesta</button>
    </div>
    <!--============== SECTION ==============-->
    <section id="targetContainer"></section>
    <!--============== FOOTER ==============-->
    <footer></footer>
    <script>
    $(document).ready(function(){
        $('#saveProduct').click(function(event){
            event.preventDefault(); // Evitar comportamiento por defecto
            var isRepartidor = $('#productYes').is(':checked');
            $.ajax({
                url: '../../controlador/update_repartidor.php',
                type: 'POST',
                data: { repartidor: isRepartidor ? 1 : 0 },
                success: function(response) {
                    alert(response);
                    // Redirigir a otra página si la actualización es exitosa
                    window.location.href = "../V_V_Producto/index.php";
                },
                error: function() {
                    alert("Error al enviar la respuesta.");
                }
            });
        });
    });
    </script>
</body>
</html>
