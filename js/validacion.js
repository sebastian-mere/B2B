const form = document.querySelector("form");

form.addEventListener("submit", (event) => {

    debugger

    const nombre = document.getElementById("name").value;
    const apellido = document.getElementById("apellido").value;
    const telefono = document.getElementById("telefono").value;
    const cif = document.getElementById("cif").value;
    const empresa = document.getElementById("empresa").value;
    const email = document.getElementById("email").value;
    const opcion = document.getElementById("opcion").value;
    const ayuda = document.getElementById("ayuda").value;

    if (!nombre) {
        event.preventDefault();
        document.getElementById('msgNombre').textContent = 'Por favor, ingresa tu nombre.';
    } else {
        document.getElementById('msgNombre').textContent = ''
    }

    if (!apellido) {
        event.preventDefault();
        document.getElementById('msgApellido').textContent = 'Por favor, ingresa tu apellido.';
    } else {
        document.getElementById('msgApellido').textContent = ''
    }

    if (!telefono) {
        event.preventDefault();
        document.getElementById('msgTelefono').textContent = 'Por favor, ingresa tu teléfono.';
    } else {
        document.getElementById('msgTelefono').textContent = ''
    }

    if (!cif) {
        event.preventDefault();
        document.getElementById('msgCIF').textContent = 'Por favor, ingresa el CIF.';
    } else {
        document.getElementById('msgCIF').textContent = ''
    }

    if (!empresa) {
        event.preventDefault();
        document.getElementById('msgEmpresa').textContent = 'Por favor, ingresa el nombre de la empresa.';
    } else {
        document.getElementById('msgEmpresa').textContent = ''
    }

    if (!email) {
        event.preventDefault();
        document.getElementById('msgEmail').textContent = 'Por favor, ingresa tu correo electrónico.';
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        document.getElementById('msgEmail').textContent = 'Por favor, ingresa un correo electrónico válido.';
    } else {
        document.getElementById('msgEmail').textContent = ''
    }

    if (opcion === "elige") {
        event.preventDefault();
        document.getElementById('msgOpcion').textContent = 'Por favor, selecciona una opción.';
    } else {
        document.getElementById('msgOpcion').textContent = ''
    }

    if (!ayuda) {
        event.preventDefault();
        document.getElementById('msgAyuda').textContent = 'Por favor, ingresa tu consulta o comentario.';
    } else {
        document.getElementById('msgAyuda').textContent = ''
    }
});
