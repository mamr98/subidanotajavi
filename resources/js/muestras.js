import Swal from 'sweetalert2';

const crearMuestra = document.querySelector('#crear_muestra');
const modificar = document.querySelectorAll('.modificar');
const eliminar = document.querySelectorAll('.eliminar');
const modal_add = document.querySelector('#modal_add')
const modal_update = document.getElementById('modal_update');
 modal_add.style.display = "none";
 modal_update.style.display = "none";

 crearMuestra.addEventListener('click', () => {
     modal_add.style.display = "block";
 
     Swal.fire({
         title: 'Introduce los datos de la muestra',
         html: rendermodal_add(),
         confirmButtonText: "Guardar",
         showCancelButton: true,
     }).then((result) => {
         if (result.isConfirmed) {
            const fecha =  modal_add.querySelector('#fecha').value
            const codigo =  modal_add.querySelector('#codigo').value
            const organo = modal_add.querySelector("#organo");
            const selectedOrganoOption = organo.options[organo.selectedIndex];
            const valueOrgano = selectedOrganoOption.value;

            const idTipoElement = document.querySelector("#idTipo");
            const selectedIdTipoOption = idTipoElement.options[idTipoElement.selectedIndex];
            const idTipo = selectedIdTipoOption.getAttribute("id");

            const idFormatoElement = document.querySelector("#idFormato");
            const selectedIdFormatoOption = idFormatoElement.options[idFormatoElement.selectedIndex];
            const idFormato = selectedIdFormatoOption.getAttribute("id");

            const idCalidadElement = document.querySelector("#idCalidad");
            const selectedIdCalidadOption = idCalidadElement.options[idCalidadElement.selectedIndex];
            const idCalidad = selectedIdCalidadOption.getAttribute("id");

            const idUsuarioElement = document.querySelector("#idUsuario");
            const selectedIdUsuarioOption = idUsuarioElement.options[idUsuarioElement.selectedIndex];
            const idUsuario = selectedIdUsuarioOption.getAttribute("id");

            const idSedeElement = document.querySelector("#idSede");
            const selectedIdSedeOption = idSedeElement.options[idSedeElement.selectedIndex];
            const idSede = selectedIdSedeOption.getAttribute("id");
 
             const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
 
             fetch('listamuestras/create', {
                 method: "POST",
                 headers: {
                     'Content-Type': 'application/json',
                     'X-CSRF-TOKEN': token
                 },
                 body: JSON.stringify({
                     fecha: fecha,
                     codigo: codigo,
                     organo: valueOrgano,
                     idTipo: idTipo,
                     idFormato: idFormato,
                     idCalidad: idCalidad,
                     idUsuario: idUsuario,
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
                 Swal.fire('Éxito', 'Muestra creada correctamente', 'success');
 

                 location.reload();
             })
             .catch(error => {
                 console.error("Error en la petición:", error);
                 Swal.fire('Error', error.message, 'error');
             });
         }
     });
 });

 function rendermodal_add(){
    const fecha =  modal_add.querySelector('#fecha')
    const codigo =  modal_add.querySelector('#codigo')
    const organo =  modal_add.querySelector('#organo')
    const idTipo =  modal_add.querySelector('#idTipo')
    const idFormato =  modal_add.querySelector('#idFormato')
    const idCalidad =  modal_add.querySelector('#idCalidad')
    const idUsuario =  modal_add.querySelector('#idUsuario')
    const idSede =  modal_add.querySelector('#idSede')
 
    return modal_add
 }

 
 

 function cargarDatos() {

    const filas = document.querySelectorAll('#mostrar_muestras tr');

    filas.forEach(fila => {
        const tipo = fila.querySelector('.tipo');
    const formato = fila.querySelector('.formato');
    const calidad = fila.querySelector('.calidad');
    const usuario = fila.querySelector('.usuario');
    const sede = fila.querySelector('.sede');
  
    const idTipo = tipo.id;
    console.log( tipo.id)
    const idFormato = formato.id;
    const idCalidad = calidad.id;
    const idUsuario = usuario.id;
    const idSede = sede.id;
  
    fetch(`listamuestras/tipo/${idTipo}`)
      .then(response => {
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
      })
      .then(data => {
        console.log('Datos de muestras:', data);        
  
        tipo.textContent = data.nombre; // Asegúrate de que 'data' tenga la propiedad 'nombre'
      })
      .catch(error => {
        console.error('Error al obtener las muestras:', error);
      });

      fetch(`listamuestras/formato/${idFormato}`)
      .then(response => {
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
      })
      .then(data => {
        console.log('Datos de muestras:', data);        
  
        formato.textContent = data.nombre; // Asegúrate de que 'data' tenga la propiedad 'nombre'
      })
      .catch(error => {
        console.error('Error al obtener las muestras:', error);
      });

      fetch(`listamuestras/calidad/${idCalidad}`)
      .then(response => {
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
      })
      .then(data => {
        console.log('Datos de muestras:', data);        
  
        calidad.textContent = data.nombre; // Asegúrate de que 'data' tenga la propiedad 'nombre'
      })
      .catch(error => {
        console.error('Error al obtener las muestras:', error);
      });

      fetch(`listamuestras/usuario/${idUsuario}`)
      .then(response => {
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
      })
      .then(data => {
        console.log('Datos de muestras:', data);        
  
        usuario.textContent = data.email; // Asegúrate de que 'data' tenga la propiedad 'nombre'
      })
      .catch(error => {
        console.error('Error al obtener las muestras:', error);
      });

      fetch(`listamuestras/sede/${idSede}`)
      .then(response => {
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
      })
      .then(data => {
        console.log('Datos de muestras:', data);        
  
        sede.textContent = data.nombre; // Asegúrate de que 'data' tenga la propiedad 'nombre'
      })
      .catch(error => {
        console.error('Error al obtener las muestras:', error);
      });
    });
    
  }
  
  window.addEventListener('DOMContentLoaded', cargarDatos);


  modificar.forEach(boton => {
    boton.addEventListener('click', () => {
        modal_update.style.display = "block"; // O modal_update.style.display = "block";

        const id = boton.id;
        console.log("ID a enviar al fetch:", id);

        fetch(`muestra/${id}`, {
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
                didOpen: () => { // Asegúrate de que los campos estén disponibles después de que se abre el modal
                    const btnActualizar = document.querySelector('.swal2-confirm'); // Obtén el botón "Actualizar" de SweetAlert

                    if (btnActualizar) {
                        btnActualizar.addEventListener('click', (event) => {
                            event.preventDefault(); // Previene la recarga de la página

                            const fecha = modal_update.querySelector('#fecha2').value; // Usa modal_update y los IDs correctos
                            const codigo = modal_update.querySelector('#codigo2').value;
                            const organoSelect = modal_update.querySelector("#organo2");
                            const valueOrgano = organoSelect.options[organoSelect.selectedIndex].value;
                            const idTipoElement = document.querySelector("#idTipo");
                            const selectedIdTipoOption = idTipoElement.options[idTipoElement.selectedIndex];
                            const idTipo = selectedIdTipoOption.getAttribute("id");

                            const idFormatoElement = document.querySelector("#idFormato2");
                            const selectedIdFormatoOption = idFormatoElement.options[idFormatoElement.selectedIndex];
                            const idFormato = selectedIdFormatoOption.getAttribute("id");

                            const idCalidadElement = document.querySelector("#idCalidad2");
                            const selectedIdCalidadOption = idCalidadElement.options[idCalidadElement.selectedIndex];
                            const idCalidad = selectedIdCalidadOption.getAttribute("id");

                            const idUsuarioElement = document.querySelector("#idUsuario2");
                            const selectedIdUsuarioOption = idUsuarioElement.options[idUsuarioElement.selectedIndex];
                            const idUsuario = selectedIdUsuarioOption.getAttribute("id");

                            const idSedeElement = document.querySelector("#idSede2");
                            const selectedIdSedeOption = idSedeElement.options[idSedeElement.selectedIndex];
                            const idSede = selectedIdSedeOption.getAttribute("id");

                            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                            fetch(`listamuestras/update/${id}`, {
                                method: "PUT",
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': token
                                },
                                body: JSON.stringify({
                                    fecha: fecha,
                                    codigo: codigo,
                                    organo: valueOrgano,
                                    idTipo: idTipo,
                                    idFormato: idFormato,
                                    idCalidad: idCalidad,
                                    idUsuario: idUsuario,
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
                                Swal.fire('Éxito', 'Muestra actualizada correctamente', 'success');
                                location.reload();
                            })
                            .catch(error => {
                                console.error("Error en la petición:", error);
                                Swal.fire('Error', error.message, 'error');
                            });
                        });
                    }
                }
            });

        })
        .catch(error => {
            console.error("Error en la petición:", error);
            alert("Ocurrió un error: " + error.message);
        });
    });
});



  function rendermodal_update(datos) {
    console.log("Datos recibidos por rendermodal_update:", datos);

    if (!datos) {
        console.error("No se recibieron datos para el modal");
        return;
    }

    const fecha = modal_update.querySelector('#fecha2');
    const codigo = modal_update.querySelector('#codigo2');
    const organo = modal_update.querySelector('#organo2');
    const idTipo = modal_update.querySelector('#idTipo2');
    const idFormato = modal_update.querySelector('#idFormato2');
    const idCalidad = modal_update.querySelector('#idCalidad2');
    const idUsuario = modal_update.querySelector('#idUsuario2');
    const idSede = modal_update.querySelector('#idSede2');


    if (!fecha || !codigo || !organo || !idTipo || !idFormato || !idCalidad || !idUsuario || !idSede) {
        console.error("Elementos del modal no encontrados o incorrectos");
        return;
    }

    fecha.value = datos.fecha || "";
    codigo.value = datos.codigo || "";
    fetch(`listamuestras/tipo/${datos.idTipo}`, {
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
        idTipo.value = sedeData.nombre; 
    })
    .catch(error => {
        console.error("Error al obtener la sede:", error);
        alert("Error al cargar la información de la sede. Por favor, inténtelo de nuevo más tarde.")
    });
    fetch(`listamuestras/formato/${datos.idFormato}`, {
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
        idFormato.value = sedeData.nombre; 
    })
    .catch(error => {
        console.error("Error al obtener la sede:", error);
        alert("Error al cargar la información de la sede. Por favor, inténtelo de nuevo más tarde.")
    });

    fetch(`listamuestras/calidad/${datos.idCalidad}`, {
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
        idCalidad.value = sedeData.nombre; 
    })
    .catch(error => {
        console.error("Error al obtener la sede:", error);
        alert("Error al cargar la información de la sede. Por favor, inténtelo de nuevo más tarde.")
    });



    fetch(`listamuestras/usuario/${datos.idUsuario}`, {
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
        idUsuario.value = sedeData.email; 
    })
    .catch(error => {
        console.error("Error al obtener la sede:", error);
        alert("Error al cargar la información de la sede. Por favor, inténtelo de nuevo más tarde.")
    });


    fetch(`listamuestras/sede/${datos.idSede}`, {
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
        idSede.value = sedeData.nombre; 
    })
    .catch(error => {
        console.error("Error al obtener la sede:", error);
        alert("Error al cargar la información de la sede. Por favor, inténtelo de nuevo más tarde.")
    });

    return modal_update;
}

eliminar.forEach(boton => {
    boton.addEventListener('click', () => {

        const id = boton.id;
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch('listamuestras/destroy/'+id, {
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
            Swal.fire('Éxito', 'Muestra Eliminada correctamente', 'success');
            location.reload()
        })
        .catch(error => {
            console.error("Error en la petición:", error);
            Swal.fire('Error', error.message, 'error');
        });
});
});

const buscador = document.querySelector("#buscador");
const mostrar_muestras = document.querySelector("#mostrar_muestras");

buscador.addEventListener("input", function () {
    let codigo = buscador.value;

    if (codigo.length > 0) {
        fetch(`muestras/${codigo}`)
            .then(response => {
                if (!response.ok) {
                    mostrar_muestras.innerHTML = `<tr><td colspan="7">No se encontraron usuarios</td></tr>`;
                    throw new Error("Error en la consulta");
                }
                return response.json();
            })
            .then(data => {
                mostrar_muestras.innerHTML = "";

                if (data.length > 0) {
                    data.forEach(muestra => {
                        mostrar_muestras.innerHTML += `
                            <tr>
                                <td>${muestra.id}</td>
                                <td>${muestra.fecha}</td>
                                <td>${muestra.codigo}</td>
                                <td>
                                <div class="d-flex justify-content-center align-items-center gap-2">

                                    <button class="contenido" id="${muestra.id}" style="padding: 10px 20px; background-color: blue; color: white; border: none; border-radius: 5px; cursor: pointer;">Ver más</button>
                                    <button class="interpretacion" id="${muestra.id}" style="padding: 10px 20px; margin-left:4px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">Interpretación</button>
                                    <button class="modificar" id="${muestra.id}" style="padding: 10px 20px; margin-left:4px; background-color: purple; color: white; border: none; border-radius: 5px; cursor: pointer;">Modificar</button>
                                    <button class="eliminar" id="${muestra.id}" style="padding: 10px 20px; margin-left:4px; background-color: red; color: white; border: none; border-radius: 5px; cursor: pointer;">Eliminar</button>
                                    </div>
                                </td>
                            </tr>`;
                            cargarDatos()
                    });
                } else {
                    mostrar_muestras.innerHTML = `<tr><td colspan="7">No se encontraron usuarios</td></tr>`;
                }
            })
            .catch(error => console.error("Error:", error));
    } else {
        location.reload();
    }
});