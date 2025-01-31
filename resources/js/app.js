/* import './bootstrap';
import './react/main.jsx' */

import Swal from 'sweetalert2';

const crearUsuario = document.querySelector('#crear_usuario');
const eliminarUsuario = document.querySelector('#eliminar_usuario');
const modificarContrasena = document.querySelector('#modificar_contrasena');

crearUsuario.addEventListener('click', () => {
    Swal.fire({
        title: 'Introduce los datos del usuario',
        html: `
        <form action="">
        <label for="email">Email</label><br>
        <input type="text" id="email"/><br>

        <label for="password">Contraseña</label><br>
        <input type="text" id="password"/><br> 
        </form>`, // Input type password para mayor seguridad
        confirmButtonText: "Guardar",
        showCancelButton: true,
    }).then((result) => {
        if (result.isConfirmed) {
            const email = document.querySelector("#email").value;
            const password = document.querySelector("#password").value;

            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('admin/create', {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({
                    email: email,
                    password: password
                })
            })
            .then(respuesta => {
                if (!respuesta.ok) {
                    // Manejo de errores: Intenta leer el error del servidor (JSON o texto)
                    return respuesta.text().then(err => {
                        try {
                            const jsonError = JSON.parse(err); // Intenta parsear como JSON
                            throw new Error(jsonError.message || 'Error en la solicitud');
                        } catch (e) {
                            throw new Error(err || 'Error en la solicitud'); // Si no es JSON, muestra el texto
                        }
                    });
                }
                return respuesta.json(); // Si la respuesta es ok, intenta parsear como JSON
            })
            .then(data => {
                console.log(data);
                Swal.fire('Éxito', 'Usuario creado correctamente', 'success');
                location.reload()
            })
            .catch(error => {
                console.error("Error en la petición:", error);
                Swal.fire('Error', error.message, 'error');
            });
        }
    });
});


eliminarUsuario.addEventListener('click', () => {
    Swal.fire({
        title: 'Introduce el email del usuario a eliminar',
        html: `
        <form action="">
        <label for="email">Email</label><br>
        <input type="text" id="email"/><br>
        </form>`, // Input type password para mayor seguridad
        confirmButtonText: "Eliminar",
        showCancelButton: true,
    }).then((result) => {
        if (result.isConfirmed) {
            const email = document.querySelector("#email").value;
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('admin/destroy/'+email, {
                method: "DELETE",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                }
            })
            .then(respuesta => {
                if (!respuesta.ok) {
                    // Manejo de errores: Intenta leer el error del servidor (JSON o texto)
                    return respuesta.text().then(err => {
                        try {
                            const jsonError = JSON.parse(err); // Intenta parsear como JSON
                            throw new Error(jsonError.message || 'Error en la solicitud');
                        } catch (e) {
                            throw new Error(err || 'Error en la solicitud'); // Si no es JSON, muestra el texto
                        }
                    });
                }
                return respuesta.json(); // Si la respuesta es ok, intenta parsear como JSON
            })
            .then(data => {
                console.log(data);
                Swal.fire('Éxito', 'Usuario eliminado correctamente', 'success');
                location.reload()
            })
            .catch(error => {
                console.error("Error en la petición:", error);
                Swal.fire('Error', error.message, 'error');
            });
        }
    });
});


modificarContrasena.addEventListener('click', () => {
    Swal.fire({
        title: 'Introduce el email del usuario a modificar',
        html: `
        <form action="">
        <label for="email">Email</label><br>
        <input type="text" id="email"/><br>

        <label for="email">Contraseña</label><br>
        <input type="text" id="password"/><br>
        </form>`, // Input type password para mayor seguridad
        confirmButtonText: "Actualizar",
        showCancelButton: true,
    }).then((result) => {
        if (result.isConfirmed) {
            const email = document.querySelector("#email").value;
            const password = document.querySelector("#password").value;
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('admin/update/'+email, {
                method: "PUT",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({
                    password: password
                }),
            })
            .then(respuesta => {
                if (!respuesta.ok) {
                    // Manejo de errores: Intenta leer el error del servidor (JSON o texto)
                    return respuesta.text().then(err => {
                        try {
                            const jsonError = JSON.parse(err); // Intenta parsear como JSON
                            throw new Error(jsonError.message || 'Error en la solicitud');
                        } catch (e) {
                            throw new Error(err || 'Error en la solicitud'); // Si no es JSON, muestra el texto
                        }
                    });
                }
                return respuesta.json(); // Si la respuesta es ok, intenta parsear como JSON
            })
            .then(data => {
                console.log(data);
                Swal.fire('Éxito', 'Usuario actualizado correctamente', 'success');
                location.reload()
            })
            .catch(error => {
                console.error("Error en la petición:", error);
                Swal.fire('Error', error.message, 'error');
            });
        }
    });
});