function addProduct(producto){
    const memoria = JSON.parse(localStorage.getItem("products"));
    console.log(memoria);
    if(!memoria){
        const newProduct = producto;
        newProduct.cantidad = 1;
        localStorage.setItem("products",JSON.stringify([newProduct]));
    } else {
        const  indiceProducto = memoria.findIndex(products => products.id ==producto.id);
        console.log(indiceProducto);
        const nuevaMemoria = memoria;
        if(indiceProducto === -1){
            nuevaMemoria.push(getNuevoProducto(producto));
        } else{
            nuevaMemoria[indiceProducto].cantidad ++;
        }
        localStorage.setItem("products",JSON.stringify(nuevaMemoria)); 
    }
    actualizarNumeroCarrito();
}

function getNuevoProducto(producto){
    const nuevoProducto = producto;
    nuevoProducto.cantidad = 1;
    return nuevoProducto;
}

const cuentaCarritoElement = document.getElementById("cuentaPedido");

function actualizarNumeroCarrito(){
    const memoria = JSON.parse(localStorage.getItem("products"));
    const cuenta = memoria.reduce((acum,current)=> acum + current.cantidad,0);
    cuentaCarritoElement.innerText = cuenta;
}