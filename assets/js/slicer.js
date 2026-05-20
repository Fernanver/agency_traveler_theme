function update() {
    const elements = [img, title, text];

    elements.forEach(el => el.classList.add("is-changing"));

    setTimeout(() => {
        img.src = posts[index].image;
        title.textContent = posts[index].title;
        text.textContent = posts[index].excerpt;

        elements.forEach(el => el.classList.remove("is-changing"));
    }, 200);
}