/* import './bootstrap';
import './react/main.jsx' */

import Swal from 'sweetalert2';

const crearUsuario = document.querySelector('#crear_usuario');
const modal = document.querySelector('#modal')
const modal_update = document.getElementById('modal_update');
 modal.style.display = "none";
 modal_update.style.display = "none";



crearUsuario.addEventListener('click', () => {
    modal.style.display = "block";

    Swal.fire({
        title: 'Introduce los datos del usuario',
        html: rendermodal_add(),
        confirmButtonText: "Guardar",
        showCancelButton: true,
    }).then((result) => {
        if (result.isConfirmed) {
            const email = document.querySelector("#email").value;
            const password = document.querySelector("#password").value;
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
            Swal.fire('Éxito', 'Usuario Desactivado correctamente', 'success');
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
            Swal.fire('Éxito', 'Usuario Activado correctamente', 'success');
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
        modal_update.style.display = "block";// o modal.style.display = "block"; si usas display

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
   const sede =  modal.querySelector('sede')
   return modal
}



function rendermodal_update(datos) {
    console.log("Datos recibidos por rendermodal_update:", datos);

    if (!datos) {
        console.error("No se recibieron datos para el modal");
        return;
    }

    const email = modal_update.querySelector('#email2');
    const password = modal_update.querySelector('#password2');
    const sede = modal_update.querySelector('#idSede2');
    const estado = modal_update.querySelector('#estado2');

    if (!email || !password || !sede || !estado) {
        console.error("Elementos del modal no encontrados o incorrectos");
        return;
    }

    email.value = datos.email || "";
    password.value = datos.password || "";
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

const buscador = document.querySelector("#buscador");
const mostrarUsuario = document.querySelector("#mostrar_usuario");

buscador.addEventListener("input", async function () {
    let email = buscador.value;

    if (email.length > 0) {
        try {
            let response = await fetch(`usuarios/${email}`);
            if (!response.ok) {
                mostrarUsuario.innerHTML = `<tr><td colspan="7">No se encontraron usuarios</td></tr>`;
                throw new Error("Error en la consulta");
            }

            let data = await response.json();
            let estado = "";
            mostrarUsuario.innerHTML = "";

            if (data.length > 0) {
                data.forEach(usuario => {
                    estado = usuario.estado ? "Activado" : "Desactivado";
                    mostrarUsuario.innerHTML += `
                     <div class="col-12">
                        <div class="row" id="mostrar_usuario">
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white bg-navy">
                                <h5 class="card-title mb-0">Usuario #${usuario.id}</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Email:</strong> ${usuario.email}</p>
                                <p><strong>Estado:</strong> ${estado}</p>
                                <p><strong>Sede:</strong> <span id="${usuario.idSede}" class="sede"></span></p>
                            </div>
                            <div class="card-footer text-end">
                                <div class="btn-group" style="position: relative;">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu" style="position: absolute; z-index: 1051;">
                                        <li>
                                            <button id="${usuario.id}" class="modificar" style="padding: 10px 18px; background-color: blue; color: white; border: none; border-radius: 5px; cursor: pointer; width: 100%; text-align: center;">
                                                Modificar
                                            </button>
                                        </li>
                                        <li>
                                            <button id="${usuario.id}" class="desactivar" style="padding: 10px 18px; background-color: red; color: white; border: none; border-radius: 5px; cursor: pointer; width: 100%; text-align: center;">
                                                Desactivar
                                            </button>
                                        </li>
                                        <li>
                                            <button id="${usuario.id}" class="activar" style="padding: 10px 18px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; width: 100%; text-align: center;">
                                                Activar
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;
                });

                // Reasignar eventos después de actualizar el HTML
                asignarEventosBotones();
                sedeUsuario();
            } else {
                mostrarUsuario.innerHTML = `<tr><td colspan="7">No se encontraron usuarios</td></tr>`;
            }
        } catch (error) {
            console.error("Error:", error);
        }
    } else {
        location.reload();
    }
});

function asignarEventosBotones() {
    document.querySelectorAll('.activar').forEach(boton => {
        boton.addEventListener('click', async () => {
            const id = boton.id;
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            try {
                let respuesta = await fetch(`admin/activar/${id}`, {
                    method: "DELETE",
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    }
                });

                if (!respuesta.ok) {
                    let errorText = await respuesta.text();
                    throw new Error(errorText || 'Error en la solicitud');
                }

                let data = await respuesta.json();
                Swal.fire('Éxito', 'Usuario activado correctamente', 'success');
                location.reload();
            } catch (error) {
                console.error("Error en la petición:", error);
                Swal.fire('Error', error.message, 'error');
            }
        });
    });

    document.querySelectorAll('.desactivar').forEach(boton => {
        boton.addEventListener('click', async () => {
            const id = boton.id;
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            try {
                let respuesta = await fetch(`admin/desactivar/${id}`, {
                    method: "DELETE",
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    }
                });

                if (!respuesta.ok) {
                    let errorText = await respuesta.text();
                    throw new Error(errorText || 'Error en la solicitud');
                }

                let data = await respuesta.json();
                Swal.fire('Éxito', 'Usuario desactivado correctamente', 'success');
                location.reload();
            } catch (error) {
                console.error("Error en la petición:", error);
                Swal.fire('Error', error.message, 'error');
            }
        });
    });

    document.querySelectorAll('.modificar').forEach(boton => {
        boton.addEventListener('click', () => { // Añade el listener a *cada* botón
            modal_update.style.display = "block";// o modal.style.display = "block"; si usas display
    
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
}

// Ejecutar la función al cargar la página para asignar eventos a los botones iniciales
document.addEventListener("DOMContentLoaded", asignarEventosBotones);


function sedeUsuario() {
    const sedes = document.querySelectorAll('.sede'); // Seleccionar todas las sedes

    sedes.forEach(sede => {
        const idSede = sede.id; // Cada sede tiene su propio ID

        fetch(`sede/${idSede}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Datos de muestras:', data);
                sede.textContent = data.nombre; // Asigna el nombre correctamente
            })
            .catch(error => {
                console.error('Error al obtener las muestras:', error);
            });
    });
}

window.addEventListener('DOMContentLoaded', sedeUsuario);
