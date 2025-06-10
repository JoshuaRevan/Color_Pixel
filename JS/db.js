    const urlParams = new URLSearchParams(window.location.search);
    const success = urlParams.get('success');

    if (success === 'true') {
        alert("Datos enviados correctamente");
    } else if (success === 'false') {
        alert("Error al enviar los datos. Todos los campos deben ser completados");
    }
