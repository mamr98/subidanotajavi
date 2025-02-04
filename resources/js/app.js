/* import './bootstrap';
import './react/main.jsx' */

import Swal from 'sweetalert2';

const crearUsuario = document.querySelector('#crear_usuario');
const modal = document.querySelector('#modal')
const modal_update = document.getElementById('modal_update');
 modal.style.visibility="hidden"
 modal_update.style.visibility="hidden"



crearUsuario.addEventListener('click', () => {
    modal.style.visibility = "";

    Swal.fire({
        title: 'Introduce los datos del usuario',
        html: rendermodal_add(),
        confirmButtonText: "Guardar",
        showCancelButton: true,
    }).then((result) => {
        if (result.isConfirmed) {
            const email = document.querySelector("#email").value;
            const password = document.querySelector("#password").value;
            const rol = document.querySelector("#rol").value;
            const estado = document.querySelector("#estado").value;
            const Sede = document.querySelector("#idSede"); 
            const selectedOption = Sede.options[Sede.selectedIndex]; 
            const idSede = selectedOption.getAttribute("id"); 

            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('admin/create', {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({
                    email: email,
                    password: password,
                    rol: rol,
                    estado: estado,
                    idSede: idSede,
                })
            })
            .then(respuesta => {
                if (!respuesta.ok) {
                    return respuesta.text().then(err => {
                        try {
                            const jsonError = JSON.parse(err);
                            throw new Error(jsonError.message || 'Error en la solicitud');
                        } catch (e) {
                            throw new Error(err || 'Error en la solicitud');
                        }
                    });
                }
                return respuesta.json();
            })
            .then(data => {
                console.log(data);

                // Mostrar mensaje de éxito
                Swal.fire('Éxito', 'Usuario creado correctamente', 'success');

                // Opcional: Si necesitas recargar, hazlo después de agregar los botones
                location.reload();
            })
            .catch(error => {
                console.error("Error en la petición:", error);
                Swal.fire('Error', error.message, 'error');
            });
        }
    });
});


const desactivar = document.querySelectorAll('.desactivar'); 
desactivar.forEach(boton => {
    boton.addEventListener('click', () => {

        const id = boton.id;
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch('admin/desactivar/'+id, {
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
});
});

const activar = document.querySelectorAll('.activar'); 
activar.forEach(boton => {
    boton.addEventListener('click', () => {

        const id = boton.id;
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch('admin/activar/'+id, {
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
});
});


const modificar = document.querySelectorAll('.modificar'); // Obtén todos los botones con la clase "modificar"

modificar.forEach(boton => { // Itera sobre cada botón
    boton.addEventListener('click', () => { // Añade el listener a *cada* botón
        modal_update.style.visibility = "";// o modal.style.display = "block"; si usas display

        const id = boton.id; // Usa boton.id, no modificar.id
        console.log("ID a enviar al fetch:", id);

        fetch(`admin/${id}`, {
            method: "GET",
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
        })
        .then(respuesta => {
            if (!respuesta.ok) {
                return respuesta.json().then(err => {
                    throw new Error(err.message || `Error ${respuesta.status} en la solicitud`);
                }).catch(() => {
                    throw new Error(`Error ${respuesta.status} en la solicitud`);
                });
            }
            return respuesta.json();
        })
        .then(data => {
            console.log("Datos recibidos:", data);

            Swal.fire({
                title: 'Introduce Los datos que quieres modificar',
                html: rendermodal_update(data),
                confirmButtonText: "Actualizar",
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
            const email = document.querySelector("#email2").value;
            const password = document.querySelector("#password2").value;
            const rol = document.querySelector("#rol2").value;
            const estado = document.querySelector("#estado2").value;
            const Sede = document.querySelector("#idSede2"); 
            const selectedOption = Sede.options[Sede.selectedIndex]; 
            const idSede = selectedOption.getAttribute("id"); 



                    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    fetch(`admin/update/${id}`, {
                        method: "PUT",
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token
                        },
                        body: JSON.stringify({
                            email: email,
                            password: password,
                            rol: rol,
                            estado: estado,
                            idSede: idSede,
                        }),
                    })
                    .then(respuesta => {
                        if (!respuesta.ok) {
                            return respuesta.text().then(err => {
                                try {
                                    const jsonError = JSON.parse(err);
                                    throw new Error(jsonError.message || 'Error en la solicitud');
                                } catch (e) {
                                    throw new Error(err || 'Error en la solicitud');
                                }
                            });
                        }
                        return respuesta.json();
                    })
                    .then(data => {
                        Swal.fire('Éxito', 'Usuario actualizado correctamente', 'success');
                        location.reload()
                    })
                    .catch(error => {
                        console.error("Error en la petición:", error);
                        Swal.fire('Error', error.message, 'error');
                    });
                }
            });

        })
        .catch(error => {
            console.error("Error en la petición:", error);
            alert("Ocurrió un error: " + error.message);
        });
    });
});





function rendermodal_add(){
   const email =  modal.querySelector('email')
   const password =  modal.querySelector('password')
   const rol =  modal.querySelector('rol')
   const sede =  modal.querySelector('sede')

   return modal
}



function rendermodal_update(datos) {
    console.log("Datos recibidos por rendermodal_update:", datos);

    if (!datos) {
        console.error("No se recibieron datos para el modal");
        return;
    }

    const modal_update = document.getElementById('modal_update');

    const email = modal_update.querySelector('#email2');
    const password = modal_update.querySelector('#password2');
    const rol = modal_update.querySelector('#rol2');
    const sede = modal_update.querySelector('#idSede2');
    const estado = modal_update.querySelector('#estado2');

    if (!email || !password || !rol || !sede || !estado) {
        console.error("Elementos del modal no encontrados o incorrectos");
        return;
    }

    email.value = datos.email || "";
    password.value = datos.password || "";
    rol.value = datos.rol || "";
    estado.value = datos.estado ? 1 : 0;
    fetch(`sede/${datos.idSede}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`Error ${response.status} al obtener la sede`);
        }
        return response.json();
    })
    .then(sedeData => {
        console.log("Datos de la sede recibidos:", sedeData);
        sede.value = sedeData.nombre; 
    })
    .catch(error => {
        console.error("Error al obtener la sede:", error);
        alert("Error al cargar la información de la sede. Por favor, inténtelo de nuevo más tarde.")
    });

    return modal_update
}