
const mySiema = new Siema({ duration: 600, loop: true });

const pagination = document.getElementById('pagination');
const slidesCount = mySiema.innerElements.length;

// Crear bullets
for (let i = 0; i < slidesCount; i++) {
    const bullet = document.createElement('button');
    bullet.className =
        'w-3 h-3 rounded-full bg-transparent border-[1px] border-white hover:bg-gray-600 transition-all';
    bullet.setAttribute('data-index', i);
    pagination.appendChild(bullet);
}

const bullets = pagination.querySelectorAll('button');

// Actualizar estilos activos
function updatePagination() {
    bullets.forEach((b, i) => {
        b.classList.toggle('bg-white', i === mySiema.currentSlide);
        b.classList.toggle('bg-transparent', i !== mySiema.currentSlide);
    });
}

// Ir a slide al hacer clic
bullets.forEach(bullet => {
    bullet.addEventListener('click', () => {
        const index = parseInt(bullet.getAttribute('data-index'));
        mySiema.goTo(index);
        updatePagination();
    });
});

// Actualizar en cada cambio
setInterval(() => {
    mySiema.next();
    updatePagination();
}, 4000); // autoplay cada 4 segundos

updatePagination(); // inicial
