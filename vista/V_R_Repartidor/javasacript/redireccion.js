console.log('Archivo redireccion.js cargado');

document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM completamente cargado y analizado');
    var icon = document.getElementById('iconoPrincipal');
    console.log('Icono:', icon);
    icon.addEventListener('click', function() {
        console.log('Imagen clickeada');
        window.location.href = 'http://localhost/UCV/vista/V_V_Producto/';
    });
});
