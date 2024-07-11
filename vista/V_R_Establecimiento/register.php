<!DOCTYPE html>
<<<<<<<<< Temporary merge branch 1
<html lang="en">
=========
<html lang="es">
>>>>>>>>> Temporary merge branch 2
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<<<< Temporary merge branch 1
        <title>login</title>
        
=========
        <title>Registro de Empresa</title>
>>>>>>>>> Temporary merge branch 2
    </head>
    <body>
        <section>
            <div class="formulario">
<<<<<<<<< Temporary merge branch 1
                <img src="../images/ucv.jpg">
                <h1>Registro de Tienda</h2>
                <form class="form">
                    <label>
                        <i class='bx bx-hash'></i>
                        <input type="text" placeholder="RUC" id="Ruc" required>

                    </label>

                    <label >
                        <i class='bx bx-buildings' ></i>
                        <input type="text" placeholder="Nombre de la Empresa" id="Empresa" requiered>
                    </label>

                    <label >
                    <i class='bx bx-phone' ></i>
                    <input type="text" placeholder="Coloca tu Numero de teléfono" id="teledono" requiered>
                    </label>

                    <label >
                        <i class='bx bx-store-alt' ></i>
                        <input type="text" placeholder="Coloca tu dirección" id="direccion" requiered>

                    </label>
                    
                    <label >
                        <i class='bx bx-envelope' ></i>
                        <input type="email" placeholder="Coloca tu Correo Electronico" id="correo" required>

                    </label>
                    
                    <label id="usuario-label">
                        <i class='bx bx-user-pin' ></i>
                        <input type="text" placeholder="Usuario" id="telefono" required>
                    </label>

                    <label>
                        <i class='bx bx-lock-alt' ></i>
                        <input type="password" placeholder="Coloca tu contraseña" id="contraseña" requiered>

                    </label>
                    
                    <input type="submit" value="Registrar">
        
               
=========
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
>>>>>>>>> Temporary merge branch 2
                </form> 
            </div>
        </section>
    </body>
</html>
>>>>>>>>> Temporary merge branch 2
