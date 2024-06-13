<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles.css">
        <script src="https://kit.fontawesome.com/a91f4172e9.js" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Iniciar sesión</title>
    </head>
    <body>
        <section>
            <div class="formulario">
                <img src="../images/iconoPrincipal.png">
                <h1>Inicio de Sesión</h1>
                <form action="../../controlador/C_I_Sesion.php" method="POST" id='formInicio'>
                    <h4>Nombre de Usuario <i class="fa-regular fa-envelope"></i></h4>
                    <input type="text" name="nombreUsuario" placeholder="NombreUsuario..." required>
                    <br><br>
                    <h4>Contraseña <i class="fa-solid fa-lock"></i></h4>
                    <input type="password" name="contraseña" placeholder="Contraseña..." required>
                    <br><br>
                    
                    <a class="pass" href="#">Olvidé la Contraseña</a>
                    <br><br>
                    <button type="submit" class="boton">Ingresar</button>
                    <br><br>
                </form>
                <h4>¿No tienes una cuenta? <a class="regi" href="../V_R_Cliente/register.php">Regístrate</a></h4>
                <br>
                <h4>¿Eres empresa?</h4><a class="regi" href="../V_R_Establecimiento/register.php">Trabaja con Nosotros</a>
            </div>
        </section>
    </body>
</html>