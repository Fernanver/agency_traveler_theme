let current = 0;
let target = 0;

window.addEventListener("scroll", () => {
    target = window.scrollY;
});

function animate() {
    current += (target - current) * 0.1;
    document.documentElement.style.setProperty("--parallax", current);

    const blur = Math.min(current * 0.02, 8);
    document.documentElement.style.setProperty("--blur", blur);

    requestAnimationFrame(animate);
}

animate();
