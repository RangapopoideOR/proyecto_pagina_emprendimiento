// 1. Código del carrusel
const contenedorProductos = document.getElementById('cont-productos');
const btnLeft = document.getElementById('btn-left');
const btnRight = document.getElementById('btn-right');

if (contenedorProductos && btnLeft && btnRight) {
    const scrollAmount = 320; 
    
    btnLeft.addEventListener('click', () => {
        contenedorProductos.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    });

    btnRight.addEventListener('click', () => {
        contenedorProductos.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    });
    
    function actualizarBotones() {
        const maxScroll = contenedorProductos.scrollWidth - contenedorProductos.clientWidth;

        if (maxScroll <= 0) {
            btnLeft.style.display = 'none';
            btnRight.style.display = 'none';
            return;
        }
        if (contenedorProductos.scrollLeft <= 0) {
            btnLeft.style.display = 'none';
        } else {
            btnLeft.style.display = ''; 
        }
        if (Math.ceil(contenedorProductos.scrollLeft) >= maxScroll - 1) {
            btnRight.style.display = 'none';
        } else {
            btnRight.style.display = ''; 
        }
    }
    
    contenedorProductos.addEventListener('scroll', actualizarBotones);
    window.addEventListener('resize', actualizarBotones);
    actualizarBotones();
}


// 2. Código del botón de WhatsApp
const btnConsultar = document.querySelector('.btn-consultar');

if (btnConsultar) {
    btnConsultar.addEventListener('click', (e) => {
        e.preventDefault(); 
        
        const elementoTitulo = document.querySelector('.titulo-articulo');
        const elementoId = document.querySelector('.badge-id');
        
        const tituloProducto = elementoTitulo ? elementoTitulo.textContent : "este producto";
        
        const idProducto = elementoId ? ` (${elementoId.textContent})` : "";
        
        const numeroTienda = "584121546164"; 
        
        const mensaje = `Hola, quiero consultar la disponibilidad de: ${tituloProducto}${idProducto}.`;
        const url = `https://wa.me/${numeroTienda}?text=${encodeURIComponent(mensaje)}`;
        
        window.open(url, '_blank');
    });
}