async function registrar_categoria() {
    let nombre = document.getElementById('nombre').value;
    let detalle = document.getElementById('detalle').value;

    if (nombre == "" || detalle == "" ) {
        alert("Error!!, Campos vacíos");
        return;
    }
    try {
        //capturamos datos del formulario html nuevo-producto
        const datos = new FormData(frmRegistrarCaregoria);
        //enviamos datos hacia el controlador
        let respuesta = await fetch(base_url + 'controller/Categoria.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (json.status) {
            swal("registro", json.mensaje, "success");
        } else {
            swal("Registro", json.mensaje, "error");
        }

        console.log(json);
    } catch (e) {
        console.log("Oops, ocurrio un error" + e)
    }
}
