// Esta fucncion recibe por parametros los datos del input, crea un array con los archivos recibidos y crea una imagen por defecto
    window.handleImageUpload = function(input) {
    const file = input.files[0];
    const defaultImage = document.getElementById('profileImage').dataset.defaultImage;
    
    // Comprueba si no hay ningun archivo y te pone la imagen por defecto que se ha creado antes
    if (!file) {
        document.getElementById('profileImage').src = defaultImage;
        return;
    }

    // Se valida los tipos de archivos, el maximo de tamaño en MB y el maximo de tamaño en Bytes
    const allowedTypes = ['image/jpeg', 'image/png'];
    const maxSizeMB = 2;
    const maxSizeBytes = maxSizeMB * 1024 * 1024;

    // Comprueba que el tipo de formato del archivo coincide con un tipo de formato del array y si no lo encuentra salta un error
    if (!allowedTypes.includes(file.type)) {
        alert('Solo se permiten archivos JPG/JPEG y PNG');
        resetImage(input, defaultImage);
        return;
    }

    // Compueba que el tamaño del archivo no sea mas grande que el tamaño permitido
    if (file.size > maxSizeBytes) {
        alert(`El tamaño máximo permitido es ${maxSizeMB}MB`);
        resetImage(input, defaultImage);
        return;
    }
    // Se crea un nuevo objeto de tipo FormData que sirve para transformar el archivo que recoge del input para que lo entienda el servidor y lo suba
    const formData = new FormData();
    formData.append('imagen', file);
    formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);

    // El fetch hace la llamada al controlador y recoge la imagen del cloudinary
    fetch(document.getElementById('profileImage').dataset.uploadRoute, {
        method: 'POST',
        body: formData
    })
    .then(async response => {
        const data = await response.json();
        
        if (!response.ok) {
            throw new Error(data.message || 'Error en la subida');
        }

        // Solo actualizar si es exitoso
        if (data.success) {
            document.getElementById('profileImage').src = data.url + '?t=' + Date.now();
        } else {
            throw new Error(data.message);
        }
    })
    .catch(error => {
        alert(error.message);
        resetImage(input, defaultImage);
    });
}

// Esta funcion pone la imagen por defecto si la imagen seleccionada por el usuario no pasa las validaciones
function resetImage(input, defaultImage) {
    input.value = '';
    document.getElementById('profileImage').src = defaultImage;
}
