<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro de Empresa</title>
    </head>
    <body>
        <section>
            <div class="formulario">
                <img src="../images/ucv.jpg" alt="Logo UCV">
                <h1>Registro de Empresa</h1>
                <form class="form" action="../../controlador/C_R_Establecimiento.php" method="POST">
                    <label>
                        <i class='bx bx-hash'></i>
                        <input type="text" placeholder="RUC" name="RUC" id="Ruc" required>
                    </label>

                    <label>
                        <i class='bx bx-buildings'></i>
                        <input type="text" placeholder="Nombre de la Empresa" name="nombreEmpresa" id="Empresa" required>
                    </label>

                    <label>
                        <i class='bx bx-phone'></i>
                        <input type="text" placeholder="Número de teléfono" name="telefono" id="telefono" required>
                    </label>

                    <label>
                        <i class='bx bx-store-alt'></i>
                        <input type="text" placeholder="Dirección" name="direccion" id="direccion" required>
                    </label>
                    
                    <label>
                        <i class='bx bx-envelope'></i>
                        <input type="email" placeholder="Correo Electrónico" name="correo" id="correo" required>
                    </label>
                    
                    <label id="usuario-label">
                        <i class='bx bx-user-pin'></i>
                        <input type="text" placeholder="Usuario" name="nombreUsuario" id="nombreUsuario" required>
                    </label>

                    <label>
                        <i class='bx bx-lock-alt'></i>
                        <input type="password" placeholder="Contraseña" name="contraseña" id="contraseña" required>
                    </label>
                    
                    <input type="submit" value="Registrar">
                </form> 
            </div>
        </section>
    </body>
</html>