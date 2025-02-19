import Swal from 'sweetalert2';

const crearMuestra = document.querySelector('#crear_muestra');
const modificar = document.querySelectorAll('.modificar');
const imagenes = document.querySelectorAll('.imagenes');
const eliminar = document.querySelectorAll('.eliminar');
const eliminar_imagenes = document.querySelectorAll('.eliminar_imagen');
const contenido = document.querySelectorAll('.contenido');
const modal_add = document.querySelector('#modal_add');
const modal_update = document.getElementById('modal_update');
const modal_mostar = document.querySelector('#modal_mostrar');
const modal_imagen = document.querySelector('#modal_imagen');

modal_add.style.display = "none";
modal_update.style.display = "none";
modal_mostar.style.display = "none";
modal_imagen.style.display = "none";

crearMuestra.addEventListener('click', () => {
    modal_add.style.display = "block";

    Swal.fire({
        title: 'Introduce los datos de la muestra',
        html: rendermodal_add(),
        confirmButtonText: "Guardar",
        showCancelButton: true,
    }).then((result) => {
        if (result.isConfirmed) {
            const fecha = modal_add.querySelector('#fecha').value;
            const codigo = modal_add.querySelector('#codigo').value;
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

            // Interpretaciones
            const idTipoEstudioElements = document.querySelectorAll("#idTipoEstudio");
            const descripcionElements = document.querySelectorAll("#descripcion");
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const interpretaciones = [];

            for (let i = 0; i < idTipoEstudioElements.length; i++) {
                const selectElement = idTipoEstudioElements[i];
                const idTipoEstudio = selectElement.value;
                console.log(idTipoEstudio);
                const descripcion = descripcionElements[i].value;

                interpretaciones.push({
                    idTipoEstudio: idTipoEstudio,
                    descripcion: descripcion
                });
            }

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
                    interpretaciones: interpretaciones
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

const addInterpretacionButton = document.getElementById('add-interpretacion');
const interpretacionesContainer = document.getElementById('interpretaciones-container');

addInterpretacionButton.addEventListener('click', function() {
    // Crear un nuevo contenedor para los nuevos campos de interpretación
    const newInterpretacion = document.createElement('div');
    newInterpretacion.classList.add('interpretacion-fields');

    newInterpretacion.innerHTML = `
        <div>
        <br>
            <label for="tipoEstudio">TipoEstudio</label><br>
            <select id="idTipoEstudio" class="w-full p-2 border rounded">
                @foreach ($tipoEstudio as $ti)
                ${document.getElementById("idTipoEstudio").innerHTML}
                @endforeach
            </select><br>
        </div>
        <br>
        <div>
            <label for="descripcion">Descripción</label><br>
            <textarea name="descripcion" id="descripcion" cols="40" rows="8" class="w-full p-2 border rounded"></textarea>
        </div>
        <br>
        <button type="button" class="btn btn-danger btn-sm eliminar-interpretacion" data-toggle="tooltip" data-placement="top" title="Eliminar interpretación">
        <i class="fas fa-trash-alt"></i> Eliminar
        </button>
    `;

    // Añadir el nuevo campo al contenedor de interpretaciones
    interpretacionesContainer.appendChild(newInterpretacion);

    // Obtener el botón de eliminar y añadir el evento click
    const botonEliminar = newInterpretacion.querySelector('.eliminar-interpretacion');
    botonEliminar.addEventListener('click', function() {
        interpretacionesContainer.removeChild(newInterpretacion);
    });
})

function rendermodal_add() {
    const fecha = modal_add.querySelector('#fecha');
    const codigo = modal_add.querySelector('#codigo');
    const organo = modal_add.querySelector('#organo');
    const idTipo = modal_add.querySelector('#idTipo');
    const idFormato = modal_add.querySelector('#idFormato');
    const idCalidad = modal_add.querySelector('#idCalidad');
    const idUsuario = modal_add.querySelector('#idUsuario');
    const idSede = modal_add.querySelector('#idSede');

    return modal_add;
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
        modal_update.style.display = "block";
        const id = boton.id;
        console.log("ID a enviar al fetch:", id);

        fetch(`muestra/${id}`, {
            method: "GET",
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
        })
        .then(respuesta => respuesta.ok ? respuesta.json() : Promise.reject(`Error ${respuesta.status} en la solicitud`))
        .then(data => {
            console.log("Datos recibidos:", data);
            Swal.fire({
                title: 'Introduce los datos que quieres modificar',
                html: rendermodal_update(data),
                confirmButtonText: "Actualizar",
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    const fecha = modal_update.querySelector('#fecha2').value;
                    const codigo = modal_update.querySelector('#codigo2').value;
                    const organo = modal_update.querySelector("#organo2");
                    const selectedOrganoOption = organo.options[organo.selectedIndex];
                    const valueOrgano = selectedOrganoOption.value;

                    const idTipoElement = document.querySelector("#idTipo2");
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

                    const interpretaciones = [...document.querySelectorAll(".interpretacion")].map((element, index) => ({
                        id: index+1,
                        descripcion: element.querySelector(`#descripcion2`)?.value || "",
                        tipoEstudio: element.querySelector(`#TipoEstudio2`)?.value || null
                    }));
                    

                    console.table(interpretaciones);

                    console.log("Datos a enviar:", {
                        fecha, codigo, valueOrgano, idTipo, idFormato, idCalidad, idUsuario, idSede, interpretaciones
                    });

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
                            interpretaciones: interpretaciones,
                        }),
                    })
                    .then(res => res.ok ? res.json() : Promise.reject("Error en la solicitud"))
                    .then((datos) => {
                        Swal.fire('Éxito', 'Muestra actualizada correctamente', 'success');
                        console.log(datos)
                        location.reload();
                    })
                    .catch(error => {
                        console.error("Error en la petición:", error);
                        Swal.fire('Error', error, 'error');
                    });
                }
            });
        })
        .catch(error => {
            console.error("Error en la petición:", error);
            Swal.fire('Error', error, 'error');
        });
    });
});;



function rendermodal_update(datos) {
    console.log("Datos recibidos por rendermodal_update:", datos);

    if (!datos) {
        console.error("No se recibieron datos para el modal");
        return;
    }

    const modal_update = document.getElementById("modal_update");
    const fecha = modal_update.querySelector('#fecha2');
    const codigo = modal_update.querySelector('#codigo2');
    const organo = modal_update.querySelector('#organo2');
    const tipo = modal_update.querySelector('#idTipo2');
    const formato = modal_update.querySelector('#idFormato2');
    const calidad = modal_update.querySelector('#idCalidad2');
    const usuario = modal_update.querySelector('#idUsuario2');
    const sede = modal_update.querySelector('#idSede2');
    const interpretacionesContainer = modal_update.querySelector('#interpretaciones-container2');
    const imagenesContainer = modal_update.querySelector('#imagenes-container');

    if (!fecha || !codigo || !organo || !tipo || !formato || !calidad || !usuario || !sede || !interpretacionesContainer) {
        console.error("Elementos del modal no encontrados o incorrectos");
        return;
    }

    fecha.value = datos.muestra.fecha || "";
    codigo.value = datos.muestra.codigo || "";

    fetch(`listamuestras/tipo/${datos.muestra.idTipo}`)
        .then(response => response.json())
        .then(data => tipo.value = data.nombre);
    
    fetch(`listamuestras/formato/${datos.muestra.idFormato}`)
        .then(response => response.json())
        .then(data => formato.value = data.nombre);
    
    fetch(`listamuestras/calidad/${datos.muestra.idCalidad}`)
        .then(response => response.json())
        .then(data => calidad.value = data.nombre);
    
    fetch(`listamuestras/usuario/${datos.muestra.idUsuario}`)
        .then(response => response.json())
        .then(data => usuario.value = data.email);
    
    fetch(`listamuestras/sede/${datos.muestra.idSede}`)
        .then(response => response.json())
        .then(data => sede.value = data.nombre);

    interpretacionesContainer.innerHTML = "";

    fetch(`listamuestras/tiposEstudio`)
        .then(response => response.json())
        .then(tiposEstudio => {
            console.log("Todos los tipos de estudio:", tiposEstudio);

            datos.interpretaciones.forEach((interpretacion, index) => {
                const div = document.createElement('div');
                div.classList.add('interpretacion');

                const selectTipoEstudio = document.createElement('select');
                selectTipoEstudio.id = `TipoEstudio2`;
                selectTipoEstudio.className = 'w-full p-2 border rounded bg-white text-gray-700 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-3 text-center block';
                
                tiposEstudio.forEach(tipo => {
                    const option = document.createElement('option');
                    option.value = tipo.id;
                    option.textContent = tipo.nombre;
                    if (tipo.id == interpretacion.idTipoEstudio) {
                        option.selected = true;
                    }
                    selectTipoEstudio.appendChild(option);
                });

                div.appendChild(selectTipoEstudio);

                const inputDescripcion = document.createElement('textarea');
                inputDescripcion.id = `descripcion2`;
                inputDescripcion.value = interpretacion.texto || "";
                inputDescripcion.placeholder = `Descripción de la interpretación ${index + 1}`;
                inputDescripcion.className = 'w-full p-3 border rounded-lg shadow-sm text-gray-800 bg-gray-100 focus:ring-2 focus:ring-blue-400 focus:outline-none resize-none mb-5 text-center block';
                div.appendChild(inputDescripcion);

                const buttonEliminar = document.createElement('button');
                buttonEliminar.textContent = "Eliminar";
                buttonEliminar.className = 'btn btn-danger btn-sm eliminar-interpretacion mt-2 px-4 py-2 rounded shadow mx-auto block';
                buttonEliminar.addEventListener('click', () => eliminarInterpretacion(interpretacion.id, div));
                div.appendChild(buttonEliminar);

                interpretacionesContainer.appendChild(div);
            });
        })
        .catch(error => console.error("Error al obtener los tipos de estudio:", error));

    fetch(`listamuestras/imagenes/${datos.muestra.id}`)
        .then(response => response.json())
        .then(imagenes => {
            imagenesContainer.innerHTML = "";
            if (Array.isArray(imagenes) && imagenes.length > 0) {
                imagenes.forEach(img => {
                    const div = document.createElement('div');
                    div.classList.add('col-md-4', 'text-center');

                    const imageElement = document.createElement('img');
                    imageElement.src = img.ruta;
                    imageElement.alt = "Imagen de muestra";
                    imageElement.className = 'img-fluid rounded shadow-sm mb-2';
                    div.appendChild(imageElement);

                    const buttonEliminar = document.createElement('button');
                    buttonEliminar.textContent = "Eliminar";
                    buttonEliminar.className = 'btn btn-danger btn-sm eliminar_imagen';
                    buttonEliminar.addEventListener('click', () => eliminarImagen(img.id, div));
                    div.appendChild(buttonEliminar);

                    imagenesContainer.appendChild(div);
                });
            } else {
                imagenesContainer.innerHTML = '<p class="text-muted">No hay imágenes disponibles</p>';
            }
        })
        .catch(error => console.error("Error al cargar imágenes:", error));

    return modal_update;
}

const addInterpretacionButton2 = document.getElementById('add-interpretacion2');
const interpretacionesContainer2 = document.getElementById('interpretaciones-container2');

addInterpretacionButton2.addEventListener('click', function() {
    // Crear un nuevo contenedor para los nuevos campos de interpretación
    const newInterpretacion = document.createElement('div');
    newInterpretacion.classList.add('interpretacion-fields2');

    newInterpretacion.innerHTML = `
        <div class='interpretacion'>
        <br>
            <select id="TipoEstudio2" class="w-full p-2 border rounded">
                @foreach ($tipoEstudio as $ti)
                ${document.getElementById("idTipoEstudio").innerHTML}
                @endforeach
            </select><br>
        
        <br>
            <textarea name="descripcion2" id="descripcion2" cols="40" rows="5" class="w-full p-2 border rounded"></textarea>
        <br>

        </div>
        <button type="button" class="btn btn-danger btn-sm eliminar-interpretacion" data-toggle="tooltip" data-placement="top" title="Eliminar interpretación">
        <i class="fas fa-trash-alt"></i> Eliminar
        </button>
    `;

    // Añadir el nuevo campo al contenedor de interpretaciones
    interpretacionesContainer2.appendChild(newInterpretacion);

    // Obtener el botón de eliminar y añadir el evento click
    const botonEliminar = newInterpretacion.querySelector('.eliminar-interpretacion');
    botonEliminar.addEventListener('click', function() {
        interpretacionesContainer2.removeChild(newInterpretacion);
    });
})



function eliminarImagen(idImagen, divElement) {
    fetch(`eliminar_imagen/${idImagen}`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire('Eliminado', 'La imagen ha sido eliminada.', 'success');
            divElement.remove();
        } else {
            Swal.fire('Error', data.error || 'No se pudo eliminar la imagen.', 'error');
        }
    })
    .catch(error => {
        console.error('Error eliminando la imagen:', error);
        Swal.fire('Error', 'Hubo un problema al eliminar la imagen.', 'error');
    });
}

function eliminarInterpretacion(idInterpretacion, divElement) {
    fetch(`listamuestras/interpretaciones/${idInterpretacion}`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire('Eliminado', 'La interpretación ha sido eliminada.', 'success');
            divElement.remove();
        } else {
            Swal.fire('Error', data.error || 'No se pudo eliminar la interpretación.', 'error');
        }
    })
    .catch(error => {
        console.error('Error eliminando la interpretación:', error);
        Swal.fire('Error', 'Hubo un problema al eliminar la interpretación.', 'error');
    });
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
                                <td style="display: none">${muestra.organo}</td>
                                <td id='${muestra.idTipo}' class='block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 tipo' style="display: none"></td>
                                <td id='${muestra.idFormato}' class='block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 formato' style="display: none"></td>
                                <td id='${muestra.idCalidad}' class='block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 calidad' style="display: none"></td>
                                <td id='${muestra.idUsuario}' class='block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 usuario' style="display: none"></td>
                                <td id='${muestra.idSede}' class='block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 sede' style="display: none"></td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <button class="contenido" id="${muestra.id}" style="padding: 10px 20px; background-color: blue; color: white; border: none; border-radius: 5px; cursor: pointer;">Ver más</button>
                                        <button class="modificar" id="${muestra.id}" style="padding: 10px 20px; margin-left:4px; background-color: purple; color: white; border: none; border-radius: 5px; cursor: pointer;">Modificar</button>
                                        <button class="eliminar" id="${muestra.id}" style="padding: 10px 20px; margin-left:4px; background-color: red; color: white; border: none; border-radius: 5px; cursor: pointer;">Eliminar</button>
                                    </div>
                                    <!-- Formulario para imprimir PDF -->
                                    <form action="/subidanotajavi/public/pdf/${muestra.id}" method="POST" style="margin-top: 10px;">
                                        @csrf
                                        <button style="padding: 10px 18px; margin-left:4px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;" id="${muestra.id}" class="imprimir" type="submit">
                                            Imprimir PDF
                                        </button>
                                    </form>
                                </td>
                            </tr>`;
                        cargarDatos();
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


function rendermodal_mostrar(datos) {
    console.log("Datos recibidos por rendermodal_mostrar:", datos);

    if (!datos || !datos.muestra) {
        console.error("No se recibieron datos válidos para el modal");
        return;
    }

    // Objeto para almacenar los datos relacionados
    const relatedData = {};

    // Función auxiliar para hacer fetch y almacenar los datos
    function fetchData(url, key) {
        return fetch(url)
            .then(res => res.json())
            .then(data => {
                relatedData[key] = data;
            })
            .catch(error => {
                console.error(`Error fetching ${key}:`, error);
                relatedData[key] = { nombre: "Error al cargar" };
            });
    }

    // Array de promesas para todas las solicitudes fetch
    const promises = [
        fetchData(`listamuestras/tipo/${datos.muestra.idTipo}`, 'tipo'),
        fetchData(`listamuestras/formato/${datos.muestra.idFormato}`, 'formato'),
        fetchData(`listamuestras/calidad/${datos.muestra.idCalidad}`, 'calidad'),
        fetchData(`listamuestras/usuario/${datos.muestra.idUsuario}`, 'usuario'),
        fetchData(`listamuestras/sede/${datos.muestra.idSede}`, 'sede'),
        fetchData(`listamuestras/imagenes/${datos.muestra.id}`, 'imagenes')
    ];

    // Esperar a que todas las promesas se resuelvan
    Promise.all(promises)
    .then(() => {
        // Función para generar el HTML de las interpretaciones
        function generarInterpretacionesHTML(interpretaciones) {
            if (Array.isArray(interpretaciones) && interpretaciones.length > 0) {
                return interpretaciones.map((inter, index) => `
                    <div class="interpretacion-box p-3 mb-3 border rounded shadow-sm">
                        <h4>Interpretación ${index + 1}</h4>
                        <label for="tipoEstudio">Tipo de Estudio:</label>
                        <input type="text" value="${datos.tipoEstudio?.nombre || 'N/A'}" readonly class="form-control mb-2">
                        <label for="descripcion">Descripción:</label>
                        <textarea readonly class="form-control">${inter.texto || 'Sin descripción'}</textarea>
                    </div>
                `).join('');
            } else {
                return '<p class="text-muted">No hay interpretaciones disponibles</p>';
            }
        }

        // Función para generar el HTML de las imágenes
function generarImagenesHTML(imagenes) {
    if (Array.isArray(imagenes) && imagenes.length > 0) {
        return imagenes.map(img => `
            <div class="col-md-4">
                <img src="${img.ruta}" alt="Imagen de muestra" class="img-fluid rounded shadow-sm">
            </div>
        `).join('');
    } else {
        return `<p class="text-muted">No hay imágenes disponibles</p>
        `;
    }
}


        // Contenido del modal
        const clavesAMostrar = ["fecha", "codigo", "organo", "tipo", "formato", "calidad", "usuario", "sede"];

        // Contenido del modal - FILTRADO DE CLAVES
        const modalContent = `
        <div class="container">
            <div class="info-box mb-4">
                <div class="row">
                    ${clavesAMostrar.map(key => {
                        if (datos.muestra.hasOwnProperty(key)) {
                            return `
                                <div class="col-md-6 mb-2">
                                    <label for="${key}3" class="modal-label">${key.charAt(0).toUpperCase() + key.slice(1)}:</label>
                                    <input type="text" id="${key}3" value="${datos.muestra[key] || ''}" readonly class="form-control modal-input">
                                </div>
                            `;
                        } else if (relatedData.hasOwnProperty(key)) {
                            return `
                                <div class="col-md-6 mb-2">
                                    <label for="${key}3" class="modal-label">${key.charAt(0).toUpperCase() + key.slice(1)}:</label>
                                    <input type="text" id="${key}3" value="${relatedData[key].nombre || relatedData[key].email || ''}" readonly class="form-control modal-input">
                                </div>
                            `;
                        }
                    }).join('')}
                </div>
            </div>
            
            <div class="bg-light p-4 rounded shadow">
                <h3>Interpretaciones</h3>
                ${datos.interpretaciones && datos.interpretaciones.length > 0 
                    ? generarInterpretacionesHTML(datos.interpretaciones) 
                    : '<p class="text-muted">No hay interpretaciones disponibles.</p>'}
            </div>
            <div class="bg-light p-4 rounded shadow mt-3">
                <h3>Imágenes</h3>
                    ${generarImagenesHTML(relatedData['imagenes'])}
            </div>
        </div>
    `;
    

        Swal.fire({
            title: 'MUESTRA',
            html: modalContent,
            confirmButtonText: "Cerrar",
            showCancelButton: false,
            width: '800px'
        });
    })
    .catch(error => {
        console.error("Error fetching related data:", error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: "Error al cargar los datos. Por favor, inténtelo de nuevo más tarde."
        });
    });
}



contenido.forEach(boton => {
    boton.addEventListener('click', () => {
        const id = boton.id;
        fetch(`muestra/${id}`, {
            method: "GET",
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
        })
            .then(res => res.json())
            .then(data => {
                rendermodal_mostrar(data); // Call rendermodal_mostrar here
            })
            .catch(error => {
                console.error("Error en la solicitud:", error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: error.message
                });
            });
    });
});

    imagenes.forEach(boton => {
        boton.addEventListener('click', async () => {
            modal_imagen.style.display = "block";
            let idMuestras = boton.id; // Obtener el ID de la muestra al hacer clic
    
            Swal.fire({
                title: 'Introduce las imágenes',
                html: rendermodal_imagen(), // Asegúrate de que esta función está definida
                confirmButtonText: "Guardar",
                showCancelButton: true,
            }).then(async (result) => {
                if (result.isConfirmed) {
                    try {
                        // Obtener todos los inputs de tipo archivo (imagen)
                        const imagenInputs = document.querySelectorAll('input[type="file"][name="imagen"]');
                        const zoomInputs = document.querySelectorAll('select[name="zoom"]');
                        const formData = new FormData();
                        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        
                        let hasImages = false; // Bandera para verificar si se seleccionaron imágenes
    
                        // Recorrer todos los inputs de imagen y agregar las imágenes al FormData con su respectivo zoom
                        imagenInputs.forEach((imagenInput, index) => {
                            if (imagenInput.files.length > 0) {
                                Array.from(imagenInput.files).forEach(file => {
                                    formData.append('imagenes[]', file);
                                    formData.append('zoom[]', zoomInputs[index].options[zoomInputs[index].selectedIndex].id); // Asociar zoom a la imagen

                                    console.log( zoomInputs[index].options[zoomInputs[index].selectedIndex].id)
                                });
                                hasImages = true;
                            }
                        });
    
                        // Si no se seleccionaron imágenes, mostrar advertencia
                        if (!hasImages) {
                            console.warn("No se ha seleccionado ninguna imagen");
                            Swal.fire('Advertencia', 'No se ha seleccionado ninguna imagen', 'warning');
                            return; // No continuar
                        }
    
                        // Agregar los otros datos (idMuestras)
                        formData.append('idMuestras', idMuestras);
                        
                        // Enviar los datos al backend
                        const imagenResponse = await fetch('guardar_imagen', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': token // Si es necesario
                            }
                        });
    
                        if (!imagenResponse.ok) {
                            const errorText = await imagenResponse.text();
                            throw new Error("Error al subir las imágenes: " + errorText);
                        }
    
                        const imagenData = await imagenResponse.json();
                        console.log("Imágenes subidas:", imagenData);
                        Swal.fire('Éxito', 'Imágenes subidas correctamente', 'success');
    
                    } catch (error) {
                        console.error("Error en la petición:", error);
                        Swal.fire('Error', error.message, 'error');
                    }
                }
                location.reload() 
            });
           
        });
        
    });
    
    
    
    // Definir la función correctamente
    function rendermodal_imagen() {
        const modal_imagen = document.querySelector('#modal_imagen'); // Asegúrate de que exista en tu HTML
        const imagen = modal_imagen.querySelector('#imagen'); 
        
        return modal_imagen; // Retorna el modal con la imagen
    }


    const addImageButton = document.getElementById('addImage');
    const removeAllImagesButton = document.getElementById('removeAllImages');
    const extraImagesDiv = document.getElementById('extraImages');
    
    // Aseguramos que el botón "Añadir otra imagen" funcione correctamente
    if (addImageButton && extraImagesDiv) {
        addImageButton.addEventListener('click', function() {
            console.log('Añadir otra imagen');
            
            // Creamos un nuevo contenedor para el input, select y el botón de eliminar
            const newInputWrapper = document.createElement('div');
            newInputWrapper.classList.add('mt-2');

            const newInput = document.createElement('input');
            newInput.type = 'file';
            newInput.name = 'imagen';
            newInput.classList.add('mt-2');

            const newLabel = document.createElement('label');
            newLabel.innerText = "Introduce el Zoom de la Imagen";
            newLabel.classList.add('mt-2');

            const newSelect = document.createElement('select');
            newSelect.name = 'zoom';
            newSelect.classList.add('mt-2');
            newSelect.innerHTML = `
                <option value="4">x4</option>
                <option value="10">x10</option>
                <option value="40">x40</option>
                <option value="100">x100</option>
            `;

            const newButton = document.createElement('button');
            newButton.type = 'button';
            newButton.classList.add('btn', 'btn-danger', 'mt-2');
            newButton.innerText = 'Eliminar imagen';

            newButton.addEventListener('click', function() {
                newInputWrapper.remove();
            });

            // Añadir los nuevos elementos al wrapper
            newInputWrapper.appendChild(newInput);
            newInputWrapper.appendChild(document.createElement('br'));
            newInputWrapper.appendChild(newLabel);
            newInputWrapper.appendChild(newSelect);
            newInputWrapper.appendChild(document.createElement('br'));
            newInputWrapper.appendChild(newButton);

            // Añadir el nuevo wrapper al contenedor de imágenes extra
            extraImagesDiv.appendChild(newInputWrapper);
        });
    }

    // Aseguramos que el botón "Eliminar todas las imágenes" funcione correctamente
    if (removeAllImagesButton && extraImagesDiv) {
        removeAllImagesButton.addEventListener('click', function() {
            console.log('Eliminar todas las imágenes');
            extraImagesDiv.innerHTML = ''; // Elimina todo el contenido dentro de extraImagesDiv
        });
    }