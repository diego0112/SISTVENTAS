async function ver_persona(id) {
    const formData = new FormData();
    formData.append('id_persona', id);

    try {
        let respuesta = await fetch(base_url + 'controller/Persona.php?tipo=ver_persona', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: formData
        });
        json = await respuesta.json();
        if (json.status) {
            document.querySelector('#id_persona').value = json.contenido.id;
            document.querySelector('#nro_identidad').value = json.contenido.nro_identidad;
            document.querySelector('#razon_social').value = json.contenido.razon_social;
            document.querySelector('#telefono').value = json.contenido.telefono;
            document.querySelector('#correo').value = json.contenido.correo;
            document.querySelector('#departamento').value = json.contenido.departamento;
            document.querySelector('#provincia').value = json.contenido.provincia;
            document.querySelector('#distrito').value = json.contenido.distrito;
            document.querySelector('#codigo_postal').value = json.contenido.codigo_postal;
            document.querySelector('#direccion').value = json.contenido.direccion;
            document.querySelector('#rol').value = json.contenido.rol;
        } else {
            window.location = base_url + "personas";
        }
        console.log(json);
    } catch (error) {
        console.log("Ops ocurrió un error: " + error);
    }
}

async function registrar_personas() {
    let nro_identidad = document.getElementById('nro_identidad').value;
    let razon_social = document.querySelector('#razon_social').value;
    let telefono = document.querySelector('#telefono').value;
    let correo = document.querySelector('#correo').value;
    let departamento = document.querySelector('#departamento').value;
    let provincia = document.querySelector('#provincia').value;
    let distrito = document.querySelector('#distrito').value;
    let codigo_postal = document.querySelector('#codigo_postal').value;
    let direccion = document.querySelector('#direccion').value;
    let rol = document.querySelector('#rol').value;
    // let password = document.querySelector('#password').value;
   
    if (nro_identidad == "" || razon_social == "" || telefono == "" || correo == "" || departamento == ""
        || provincia == "" || distrito == "" || codigo_postal == "" || direccion == "" || rol == "" /* || password == "" */) {
        alert("Error!!, Campos vacíos");
        return;
    }
    try {
        const datos = new FormData(frmRegistrarPers);
        //enviamos datos hacia el controlador
        let respuesta = await fetch(base_url + 'controller/Persona.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (json.status) {
            swal.fire("Registro Exitoso", json.mensaje, "success");
        } else {
            swal.fire("Registro Fallido", json.mensaje, "error");
        }

        console.log(json);
    } catch (e) {
        console.log("Oops, ocurrio un error" + e)
    }
}

async function listarPersonas() {
    try {

        let respuesta = await fetch(base_url + 'controller/Persona.php?tipo=listar');
        let json = await respuesta.json();
        if (json.status) {
            let datos = json.contenido;
            let cont = 0;
            datos.forEach(item => {
                let nueva_fila = document.createElement("tr");
                nueva_fila.id = "fila" + item.id; //este es el id que viene de la base de datos
                cont++; // para ver que se aumenta
                nueva_fila.innerHTML = ` 
                       <tr>
                         <th>${cont}</th>
                        <td>${item.nro_identidad}</td>
                        <td>${item.razon_social}</td>
                        <td>${item.telefono}</td>
                        <td>${item.correo}</td>
                        <td>${item.departamento}</td>
                        <td>${item.provincia}</td>
                        <td>${item.distrito}</td>
                        <td>${item.codigo_postal}</td>
                        <td>${item.direccion}</td>
                        <td>${item.rol}</td>
                        <td>${item.fecha_reg}</td>
                       <td>${item.options}</td>
                        </tr>`;
                document.querySelector('#tbl_personas').appendChild(nueva_fila);

            });
        };
        console.log(json);
    } catch (error) {
        console.error("Error al listar Personas" + error);
    }
}
if (document.querySelector('#tbl_personas') != null) {
    listarPersonas();
}


async function actualizar_persona() {
    const datos = new FormData(document.getElementById('frmEditarPers'));

    try {
        let respuesta = await fetch(base_url + 'controller/Persona.php?tipo=actualizar_persona', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (json.status) {
            swal.fire("Actualización exitosa", json.mensaje, 'success');
        } else {
            swal.fire("Actualización fallida", json.mensaje, 'error');
        }
        console.log(json);
    } catch (e) {
        console.error("Oops, ocurrió un error: " + e);
    }
}
async function eliminarPersona(id) {
    swal.fire({
        title: '¿Está seguro de eliminar la persona?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        buttons: true,
        dangerMode: true
    }).then((result) => {
        if (result.isConfirmed) {
            fnt_eliminar_persona(id);
        }
    });

    async function fnt_eliminar_persona(id) {
        const formData = new FormData();
        formData.append('id_persona', id);

        try {
            let respuesta = await fetch(base_url + 'controller/Persona.php?tipo=eliminar_persona', {
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                body: formData
            });
            let json = await respuesta.json();
            if (json.status) {
                swal.fire("Eliminación exitosa", json.mensaje, 'success');
                document.querySelector(`#fila${id}`).remove();
            } else {
                swal.fire("Eliminación fallida", json.mensaje, 'error');
            }
            console.log(json);
        } catch (error) {
            console.error("Error al eliminar persona: " + error);
        }
    }
}