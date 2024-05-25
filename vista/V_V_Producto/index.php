<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                    <a data-btn-action="add-btn-cart" data-modal="#jsModalCarrito"><i class="fas fa-shopping-cart"></i><span id="cuentaPedido">0</span>
                    </a>
        </div>

        <div class="search-container">
            <input type="search" placeholder=" Buscar...">
            <span class="fa fa-search"></span>
        </div>

    </header>

    <!--Carrito Menu-->
    <div class="modal-grande">
    <div class="modal" id="jsModalCarrito">
        <div class="modal__container">
            <button type="button" class="modal__close fa-solid fa-xmark jsModalClose ">X</button>

            <div class="modal__info">
                <div class="modal__header">
                    <h2><i class="fas fa fa-shopping-cart"></i>Carrito de Compras</h2>
                </div>

                <div class="modal__body">
                    <div class="modal__list">
                        <div class="modal__item">
                            <div class="modal__thumb">
                                <img src="../images/broaster.png" alt="Naranja">
                            </div>
                            <div class="modal__text-product">
                                <p>Naranja</p>
                                <p><strong>$9.00 / kg</strong></p>
                            </div>
                        </div>


                        <div class="modal__item">
                            <div class="modal__thumb">
                                <img src="../images/fresa.jpg" alt="Naranja">
                            </div>
                            <div class="modal__text-product">
                                <p>Manzana</p>
                                <p><strong>$5.00 / kg</strong></p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal__footer">
                    <div class="modal__list-price">
                        <ul>
                            <li>Subtotal: <strong>$14.00</strong></li>
                            <li>Descuento: <strong>$0.00</strong></li>
                        </ul>
                        <h4 class="modal__total-cart"> Total: $14.00</h4>
                    </div>

                    <div class="modal__btns">
                        <a href="#" class="btn-primary">Comprar Ahora</a>
                    </div>
                </div>
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
</section>
<!--============== FOOTER ==============-->
    <footer>
        <div class="final">
            <h3>¿Te gustaria formar parte de nuestro equipo de delivery?</h3>
            <img src="../images/delivery.png">
            <a href="#"><button>Unete Aqui!</button></a>
        </div>
    </footer>
    
    <script src="javascript/abrirCarrito.js"></script>
</body>
</html>