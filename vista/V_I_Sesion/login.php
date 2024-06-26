<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles.css">
        <script src="https://kit.fontawesome.com/a91f4172e9.js" crossorigin="anonymous"></script>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Iniciar sesión</title>
    </head>
    <body>
        <section>
            <div class="formulario">
                <img src="../images/iconoPrincipal.png">
                <h1>Inicio de Sesión</h1>
                <form action="../../controlador/C_I_Sesion.php" method="POST" id='formInicio'>
                 
                    <label>
                        <i class='bx bx-envelope'></i>
                        <input type="email" placeholder="Correo Electrónico" name="correo" id="correo" required>
                    </label>
                    <label>
                        <i class='bx bx-lock-alt'></i>
                        <input type="password" placeholder="Contraseña" name="contraseña" id="contraseña" required>
                    </label>
                    <input type="submit" value="Iniciarr">
                    <br><br>
                    <a class="pass" href="#">Olvidé la Contraseña</a>
                </form>
                <h4>¿No tienes una cuenta? <a class="regi" href="../V_R_Cliente/register.php">Regístrate</a></h4>
                <br>
                <h4>¿Eres empresa?</h4><a class="regi" href="../V_R_Establecimiento/register.php">Trabaja con Nosotros</a>
            </div>
        </section>
    </body>
</html>