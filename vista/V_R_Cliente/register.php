<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://kit.fontawesome.com/a91f4172e9.js" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>login</title>
        
    </head>
    <body>
        <section>
            <div class="formulario">
                <img src="../images/iconoPrincipal.png">
                <h1>Registro de Cuenta</h2>
                <form class="form">
                    <label id="nombre-label">
                        <i class='bx bx-user'></i>
                        <input type="text" placeholder="Nombre" id="nombres" required>
                    </label>
                    
                    <label id="apellido-label">
                        <i class='bx bx-user'></i>
                        <input type="text" placeholder="Apellido" id="apellidos" required>
                    </label>
                    
                    <label id="fecha-label">
                        <i class='bx bx-calendar'></i>
                        <input type="date" placeholder="Fecha de Nacimiento" id="dob" required>
                    </label>

                    <label id="telefono-label">
                        <i class='bx bx-phone'></i>
                        <input type="text" placeholder="Telefono" id="telefono" required>
                    </label>
                    
                    <label id="email-label">
                        <i class='bx bx-envelope'></i>
                        <input type="email" placeholder="ejemplo@gmail.com" id="email" required>
                    </label>
                    
                    <label id="usuario-label">
                        <i class='bx bx-user-pin' ></i>
                        <input type="text" placeholder="Usuario" id="telefono" required>
                    </label>

                    <label id="contraseña-label">
                        <i class='bx bx-lock-alt'></i>
                        <input type="password" placeholder="contraseña" id="password" required>
                    </label>

                    <select id="gender-title" name="productList" >
                        <option value="">Selecciona tu genero </option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Otro">Otro</option>
                    </select>
                        
                    <br>
                    <input type="submit" value="Registrarse" >
                    <br><br>
                </form>
            </div>
        </section>
    </body>
