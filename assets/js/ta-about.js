
const slides = document.querySelectorAll(".ta-about-slide");
const dots   = document.querySelectorAll(".ta-dot");
let currentSlide = 0;
let autoplay;

function goToSlide(index) {
    // quitar activo al actual
    slides[currentSlide].classList.remove("active");
    dots[currentSlide].classList.remove("active");

    // activar el nuevo
    currentSlide = index;
    slides[currentSlide].classList.add("active");
    dots[currentSlide].classList.add("active");
}

function nextSlide() {
    const next = (currentSlide + 1) % slides.length;
    goToSlide(next);
}

function startAutoplay() {
    autoplay = setInterval(nextSlide, 4000);
}

function stopAutoplay() {
    clearInterval(autoplay);
}

// click en dots
dots.forEach((dot, i) => {
    dot.addEventListener("click", () => {
        stopAutoplay();
        goToSlide(i);
        startAutoplay(); // reinicia el timer al hacer click
    });
});

// click en el slider avanza al siguiente
document.querySelector(".ta-about-slider")?.addEventListener("click", () => {
    stopAutoplay();
    nextSlide();
    startAutoplay();
});

startAutoplay();