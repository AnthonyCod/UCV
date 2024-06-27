<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UCV FOOD</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <!--============== HEADER ==============-->
    <header>
        <div class="icon">
            <span class="fa fa-bars" id="bars"></span>
            <span>UCV FOOD</span>
            <img src="../images/iconoPrincipal.png">
            <a data-btn-action="add-btn-cart" data-modal="#jsModalCarrito"><i class="fas fa-shopping-cart"></i><span id="cuentaPedido">0</span></a>
        </div>
        <div class="search-container">
            <input type="search" placeholder="Buscar...">
            <span class="fa fa-search"></span>
        </div>
    </header>

    <!--Carrito Menu-->
    <div class="modal-grande">
        <div class="modal" id="jsModalCarrito">
            <div class="modal__container">
                <button type="button" class="modal__close fa-solid fa-xmark jsModalClose">X</button>
                <div class="modal__info">
                    <div class="modal__header">
                        <h2><i class="fas fa-shopping-cart"></i> Carrito de Compras</h2>
                    </div>
                    <div class="modal__body">
                        <!-- Aquí se añadirán los productos del carrito dinámicamente -->
                        <div class="modal__list" id="carritoProductos">
                            <!-- Productos cargados dinámicamente -->
                        </div>
                    </div>
                    <!-- Cambia el href a la página a la que deseas redirigir -->
                    <a href="../V_A_Carrito/carrito.html" class="btn-primary">Comprar Ahora</a>
                </div>
            </div>
        </div>
    </div>

    <!--============== NAV ==============-->
    <nav>
        <div class="foods">
            <ol>
                <li><a href="#"><img src="../images/jugo.png"></a><span>Jugos</span></li>
                <li><a href="#"><img src="../images/feijoada.png"></a><span>Criollo</span></li>
                <li><a href="#"><img src="../images/pizza (2).png"></a><span>Pizzas</span></li>
                <li><a href="#"><img src="../images/pierna-de-pollo (1).png"></a><span>Pollos</span></li>
                <li><a href="#"><img src="../images/sandwich (1).png"></a><span>Sanguches</span></li>
            </ol>
        </div>
    </nav>

    <!--============== SECTION ==============-->
    <section id="targetContainer">
    <div class="productos-container">
        <!-- Aquí se agregarán los productos dinámicamente -->
    </div>
</section>

    <!--============== FOOTER ==============-->
    <footer>
        <div class="final">
            <h3>¿Te gustaría formar parte de nuestro equipo de delivery?</h3>
            <img src="../images/delivery.png">
            <a href="../V_R_Repartidor/index.php"><button>Únete Aquí!</button></a>
        </div>
    </footer>

    <script src="javascript/productos.js"></script>
    <script src="javascript/abrirCarrito.js"></script>
</body>
</html>
