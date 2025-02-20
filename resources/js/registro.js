document.addEventListener("DOMContentLoaded", () => {
    const selectSede = document.querySelector("#idSede");
    const registro = document.querySelector(".registrar");

    // Función para obtener y cargar las sedes en el select
    const cargarSedes = async () => {
        try {
            const response = await fetch("sedes");
            if (!response.ok) {
                throw new Error("Error al obtener las sedes");
            }

            const data = await response.json(); // Suponiendo que Laravel devuelve JSON con las sedes

            // Limpiar el select antes de agregar opciones
            selectSede.innerHTML = '<option value="">Seleccione una sede</option>';

            // Agregar opciones al select
            data.forEach(sede => {
                const option = document.createElement("option");
                option.value = sede.id;
                option.textContent = sede.nombre; // Ajusta según la estructura de tu modelo
                selectSede.appendChild(option);
            });

        } catch (error) {
            console.error("Error:", error);
        }
    };

    // Función para registrar usuario
    const registrarUsuario = async () => {
        const email = document.querySelector(".email").value;
        const password = document.querySelector(".contraseña").value;
        const sedeId = selectSede.value;

        if (!email || !password || !sedeId) {
            alert("Todos los campos son obligatorios");
            return;
        }

        try {
            const response = await fetch("registro", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                },
                body: JSON.stringify({
                    email: email,
                    password: password,
                    idSede: sedeId
                })
            });

            const data = await response.json();

            if (response.ok) {
                alert("Usuario registrado con éxito");
                document.querySelector(".email").value = "";
                document.querySelector(".contraseña").value = "";
                selectSede.value = "";
            } else {
                alert("Error: " + (data.message || "No se pudo registrar el usuario"));
            }
        } catch (error) {
            console.error("Error:", error);
            /* alert("Error en la solicitud"); */
        }
    };

    // Cargar sedes al iniciar la página
    cargarSedes();

    // Evento de clic en el botón de registro
    registro.addEventListener("click", registrarUsuario);
});