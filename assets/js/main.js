const hero = document.querySelector(".hero");

let current = 0;
let target = 0;
const speed = 0.08;

window.addEventListener("scroll", () => {
    target = window.scrollY;
});

function animate() {
    current += (target - current) * speed;

    hero.style.setProperty("--parallax", current * 0.4);

    requestAnimationFrame(animate);
}

animate();