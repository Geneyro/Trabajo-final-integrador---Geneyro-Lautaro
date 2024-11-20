document.addEventListener("DOMContentLoaded", () => {
    let currentIndex = 0;
    const images = document.querySelectorAll(".carousel-images img");

    function updateCarousel(index) {
        images.forEach((img, i) => {
            img.style.display = i === index ? "block" : "none";
        });
    }

    function moveSlide(direction) {
        currentIndex += direction;
        if (currentIndex < 0) {
            currentIndex = images.length - 1;
        } else if (currentIndex >= images.length) {
            currentIndex = 0;
        }
        updateCarousel(currentIndex);
    }

    // Inicializar el carrusel
    updateCarousel(currentIndex);

    // Agregar eventos a los botones
    document.querySelector(".carousel-button.prev").addEventListener("click", () => moveSlide(-1));
    document.querySelector(".carousel-button.next").addEventListener("click", () => moveSlide(1));
});
