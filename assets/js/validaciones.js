document.addEventListener("DOMContentLoaded", function () {
    const formularios = document.querySelectorAll(".validar");

    formularios.forEach(function (formulario) {
        formulario.addEventListener("submit", function (e) {
            const campos = formulario.querySelectorAll("input[required], textarea[required]");
            let valido = true;

            campos.forEach(function (campo) {
                if (campo.value.trim() === "") {
                    valido = false;
                    campo.style.borderColor = "#d32f2f";
                } else {
                    campo.style.borderColor = "#b0bec5";
                }
            });

            const correo = formulario.querySelector("input[type='email']");
            if (correo && !correo.value.includes("@")) {
                valido = false;
                correo.style.borderColor = "#d32f2f";
            }

            const password = formulario.querySelector("input[name='password']");
            if (password && password.value.length < 8) {
                valido = false;
                password.style.borderColor = "#d32f2f";
            }

            const confirmar = formulario.querySelector("input[name='confirmar']");
            if (password && confirmar && password.value !== confirmar.value) {
                valido = false;
                confirmar.style.borderColor = "#d32f2f";
            }

            if (!valido) {
                e.preventDefault();
                alert("Revisa los campos del formulario antes de continuar.");
            }
        });
    });
});