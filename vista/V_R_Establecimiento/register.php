<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>login</title>
        
    </head>
    <body>
        <section>
            <div class="formulario">
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
        
               
                </form> 
            </div>
        </section>
    </body>
</html>