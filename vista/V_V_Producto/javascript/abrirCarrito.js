document.addEventListener('DOMContentLoaded', () => {
    const addToCartButton = document.querySelector('[data-btn-action="add-btn-cart"]');
    const closeModalButton = document.querySelector('.jsModalClose');
    const modal = document.getElementById('jsModalCarrito');

    addToCartButton.addEventListener('click', () => {
        modal.classList.add('active');
    });

//CERRAR EL MODAL
closeModal.addEventListener('click',(event)=>{
    event.target.parentNode.parentNode.classList.remove('active');
})

//CERRAMOS MODAL CUANDO HACEMOS CLICK FUERA DEL CONTENDINO DEL MODAL
window.onclick = (event)=>{
    const modal=document.querySelector('.modal.active');

    if(event.target == modal){
        modal.classList.remove('active');
    }
}