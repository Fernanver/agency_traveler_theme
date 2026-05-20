let current = 0;
let target = 0;

window.addEventListener("scroll", () => {
    target = window.scrollY;
});

function animate() {
    current += (target - current) * 0.1;

    document.documentElement.style.setProperty("--parallax", current);

    // 🔥 blur basado en scroll (suave)
    const blur = Math.min(current * 0.02, 8);
    document.documentElement.style.setProperty("--blur", blur);

    requestAnimationFrame(animate);
}

animate();

/*slicer*/

function update() {
    const elements = [img, title, text];

    // activar salida
    elements.forEach(el => el.classList.add("is-changing"));

    setTimeout(() => {
        img.src = posts[index].image;
        title.textContent = posts[index].title;
        text.textContent = posts[index].excerpt;

        // entrada
        elements.forEach(el => el.classList.remove("is-changing"));
    }, 200);
}