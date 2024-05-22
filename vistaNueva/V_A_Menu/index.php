<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="javascript/script.js" defer></script>
    <script src="javascript/agregarProducto.js" defer></script>
</head>
<body>

 <!--============== HEADER ==============-->

    <header>
        <div class="icon">
            <span class="fa fa-bars" id="bars"></span>
            <span>UCV FOOD </span>
                <img src="../images/iconoPrincipal.png">

        </div>

        <div class="search-container">
            <input type="search" placeholder=" Buscar...">
            <span class="fa fa-search"></span>
        </div>

    </header>

    <form id="formContainer" method="post">
        <div class="formContent">
            <h2>Agregar Producto <i class="fas fa-box-open"></i></h2>
            
            <select id="productList" name="productList" >
                    <option value="">Selecciona una tienda</option>
                    <option value="ania">aña</option>
            </select>
<!-- 
            <label for="productImage">
                <input  type="file" src="" id="productImage" name="productImage">
            </label>  -->
            
            <label for="productName">
                <input type="text" id="productName" name="productName" placeholder=" Nombre" >
            </label>

            <label for="productDescription">
                <input type="text" id="productDescription" name="productDescription" placeholder="Descripcion" required>
            </label>

            <label for="productPrice">
                <input type="text" id="productPrice" name="productPrice" placeholder="Precio" >
            </label>
            

            <button id="saveProduct" name="saveProduct">Guardar Producto</button>
            <button id="closeForm">Cerrar</button>
        </div>
    </form>
    
 <!--============== NAV ==============-->
    <nav>
        <div class="foods">
            <ol>
                <li><a href="#"><img src="../images/jugo.png"></a><span>Tienda 1</span></li>           
            </ol>
        </div>
    </nav>
 
<!--============== SECTION ==============-->
<section id="targetContainer">
</section>
<!--============== FOOTER ==============-->
    <footer>
        <div class="agregarTienda">
            <button class="nuevaTienda">Agregar Tienda</button>
        </div>

        <div class="final">
            <button class="nuevoProducto">Agregar Producto </button>
        </div>
    </footer>
    
    <?php 
    include("nuevoProducto.php")
    ?>

</body>
</html>