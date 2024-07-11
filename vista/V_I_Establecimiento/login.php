<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
        <script src="https://kit.fontawesome.com/a91f4172e9.js" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>login</title>
        
    </head>
    <body>
        <section>
            <div class="formulario">
                <img src="../images/iconoPrincipal.png">
                <h1>Inicio de Sesion Empresa</h2>
                    <form action="../../controlador/C_I_Establecimiento.php" method="POST" id='formInicio'>
                        <h4>Nombre de Usuario <i class="fa-regular fa-envelope"></i></h4>
                        <input type="text" name="nombreUsuario" placeholder="NombreUsuario..." required>
                        <br><br>
                        <h4>Contraseña <i class="fa-solid fa-lock"></i></h4>
                        <input type="password" name="contraseña" placeholder="Contraseña..." required>
                        <br><br>
                        <button type="submit" class="boton">Ingresar</button>
                        <br><br>
                    </form>
                    <h4>¿No tienes una cuenta? <a class="regi" href="../V_R_Establecimiento/register.php">Regístrate</a></h4>
                </div>
        </section>
    </body>
</html>