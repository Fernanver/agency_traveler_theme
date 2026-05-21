const form = document.getElementById("contact-form");
const status = document.getElementById("form-status");

form.addEventListener("submit", async (e) => {

    e.preventDefault();

    const data = new FormData(form);

    const response = await fetch(form.action, {
        method: "POST",
        body: data,
        headers: {
            'Accept': 'application/json'
        }
    });

    if (response.ok) {

        status.textContent = "Mensaje enviado ";

        form.reset();

    } else {

        status.textContent = "Ocurrió un error ";
    }

});