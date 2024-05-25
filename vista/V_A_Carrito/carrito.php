<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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

<div class="regresarContainer">
    <a class="regresar" href="../V_A_Menu/index.php"> <i class='bx bx-left-arrow-alt'></i> Seguir Comprando</a>
</div>


<section>
    <div class="sectionContainer">
        <div class="carro">
            <div class="carrito">
                <div class="carritoHeader">
                    <div class="productos">
                        <h2>Producto(s)</h2>
                    </div>
        
                    <div class="precioUnitario">
                        <h2>Precio Unitario</h2>
                    </div>
        
                    <div class="Cantidad">
                        <h2>Cantidad</h2>
                    </div>
    
                    <div class="importe">
                        <h2>Importe</h2>
                    </div>
    
                    <div class="vacio"></div>
                </div>
    
                <div class="productos">
                    <div class="producto">
                        <div class="nombre">
                            <img src="../images/hamburguesa1.jpg" alt="">
                            <h2>Hamburguesa</h2>
                        </div>
            
                        <div class="precioUnitario">
                            <h2>5.00</h2><br>
                        </div>
                        
                        <div class="cantidad">
                            <input type="number">
                        </div>
    
                        <div class="importe">
                            <h2>$10</h2>
                        </div>
    
                        <div class="borrarProducto">
                            <button><i class='bx bx-trash'></i></button>
                        </div>
                    </div>
    
                    <div class="producto">
                        <div class="nombre">
                            <img src="../images/fresa.jpg" alt="">
                            <h2>Jugo de Fresa</h2><br>
                        </div>
            
                        <div class="precioUnitario">
                            <h2>10.00</h2><br>
                        </div>
                        
                        <div class="cantidad">
                            <input type="number">
                        </div>
    
                        <div class="importe">
                            <h2>$30</h2>
                        </div>
    
                        <div class="borrarProducto">
                            <button><i class='bx bx-trash'></i></button>
                        </div>
                    </div>
    
                    <div class="producto">
                        <div class="nombre">
                            <img src="../images/panPollo.png">
                            <h2>Pan con Pollo</h2><br>
                        </div>
            
                        <div class="precioUnitario">
                            <h2>3.00</h2><br>
                        </div>
                        
                        <div class="cantidad">
                            <input type="number">
                        </div>
    
                        <div class="importe">
                            <h2>$50</h2>
                        </div>
    
                        <div class="borrarProducto">
                            <button><i class='bx bx-trash'></i></button>
                        </div>
                    </div>

                        
                    <div class="producto">
                        <div class="nombre">
                            <img src="../images/panPollo.png">
                            <h2>Pan con Pollo</h2><br>
                        </div>
            
                        <div class="precioUnitario">
                            <h2>3.00</h2><br>
                        </div>
                        
                        <div class="cantidad">
                            <input type="number">
                        </div>
    
                        <div class="importe">
                            <h2>$50</h2>
                        </div>
    
                        <div class="borrarProducto">
                            <button><i class='bx bx-trash'></i></button>
                        </div>
                    </div>

                        
                    <div class="producto">
                        <div class="nombre">
                            <img src="../images/panPollo.png">
                            <h2>Pan con Pollo</h2><br>
                        </div>
            
                        <div class="precioUnitario">
                            <h2>3.00</h2><br>
                        </div>
                        
                        <div class="cantidad">
                            <input type="number">
                        </div>
    
                        <div class="importe">
                            <h2>$50</h2>
                        </div>
    
                        <div class="borrarProducto">
                            <button><i class='bx bx-trash'></i></button>
                        </div>
                    </div>
        
                </div>
    
                </div>
    
            </div>
        </div>
        
        <div class="pago">
            <div class="pagoMenor">
                    <div class="descuento">
                        <input type="text" placeholder=" Codigo de descuento">
                        <button>Aplicar</button>
                    </div>
    
                    <div class="subTotal">
                        <h3>Subtotal:</h3>
                        <h3>$50</h3>
                    </div>
    
                    <div class="total">
                        <h3>Total:</h3>
                        <h3>$60</h3>
                    </div>
    
                    <div class="terminos">
                        <input type="checkbox">
                        <h3>Acepto los <a href="">Terminos y condiciones</a> autorizo a UCV FOOD a procesar mis datos personales</h3>
                    </div>
                    
                    <div class="botonPago">
                        <button>Procesar Pago</button>
                    </div>
            </div>
        </div>
    </div>

</section>

</body>
</html>