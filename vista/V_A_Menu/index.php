<?php
// Incluir lógica para obtener categorías
include("../../modelo/m_conexion.php");
include("../../modelo/M_A_Menu.php");

try {
    $categorias = Producto::obtenerCategorias($conexion);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    $categorias = [];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Establecimiento</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            <input type="search" placeholder="Buscar...">
            <span class="fa fa-search"></span>
        </div>
    </header>

    <!--============== FORMULARIO ==============-->
    <div id="productForm" class="box">
        <form action="../../controlador/C_A_Menu.php" id="formContainer" method="post" enctype="multipart/form-data">
            <div class="formContent">
                <h2>Agregar Producto <i class="fas fa-box-open"></i></h2>
                
                <select id="productList" name="productList" required>
                    <option value="">Selecciona una tienda</option>
                    <?php
                    if (isset($categorias) && !empty($categorias)) {
                        foreach ($categorias as $categoria): ?>
                            <option value="<?php echo htmlspecialchars($categoria); ?>"><?php echo htmlspecialchars($categoria); ?></option>
                        <?php endforeach;
                    } else {
                        echo "<option value=''>No hay categorías disponibles</option>";
                    }
                    ?>
                </select>
                
                <label for="productName">
                    <input type="text" id="productName" name="productName" placeholder="Nombre" required>
                </label>

                <label for="productDescription">
                    <input type="text" id="productDescription" name="productDescription" placeholder="Descripción" required>
                </label>

                <label for="productPrice">
                    <input type="text" id="productPrice" name="productPrice" placeholder="Precio" required>
                </label>
                
                <label for="productImage">Imagen del Producto:</label>
                <input type="file" id="productImage" name="productImage" accept="image/*" required>
                <img id="previewImage" src="" alt="Previsualización de la imagen"
                style="width:100px;height:100px;margin-top:10px; display:none;">


                <button id="saveProduct" name="saveProduct">Guardar Producto</button>
                <button id="closeForm" class="closeButton">Cerrar</button>
            </div>
        </form>
    </div>

    <!--============== NAV ==============-->
    <nav>
        <div class="foods">
            <ol>
                <li><a href="#"><img src="../images/jugo.png"></a><span>Tienda 1</span></li>           
            </ol>
        </div>
    </nav>

    <!--============== SECTION ==============-->
    <section id="targetContainer"></section>

    <!--============== FOOTER ==============-->
    <footer>
        <div class="agregarTienda">
            <button class="nuevaTienda">Agregar Tienda</button>
        </div>

        <div class="final">
            <button class="nuevoProducto">Agregar Producto</button>
        </div>
    </footer>
    
</body>
</html>

