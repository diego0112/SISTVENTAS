async function ver_categoria(id) {
    const formData = new FormData();
    formData.append('id_categoria', id);

    try {
        let respuesta = await fetch(base_url + 'controller/Categoria.php?tipo=ver_categorias', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: formData
        });
        json = await respuesta.json();
        if (json.status) {
            document.querySelector('#id_categoria').value = json.contenido.id;
            document.querySelector('#nombre').value = json.contenido.nombre;
            document.querySelector('#detalle').value = json.contenido.detalle;
        } else {
            window.location = base_url + "categorias";
        }
        console.log(json);
    } catch (error) {
        console.log("Ops ocurrió un error: " + error);
    }
}

async function registrar_categoria() {
    let nombre = document.getElementById('nombre').value;
    let detalle = document.getElementById('detalle').value;

    if (nombre == "" || detalle == "") {
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

async function listarCategoria() {
    try {

        let respuesta = await fetch(base_url + 'controller/Categoria.php?tipo=listar');
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
                        <td>${item.nombre}</td>
                        <td>${item.detalle}</td>
                        <td>${item.options}</td>
                        </tr>`;
                document.querySelector('#tbl_categorias').appendChild(nueva_fila);

            });
        };
        console.log(json);
    } catch (error) {
        console.error("Error al listar categorias" + error);
    }
}
if (document.querySelector('#tbl_categorias') != null) {
    listarCategoria();
}



 //ACTUALIZAR CATEGORIA 
 async function actualizar_categoria() {
    const datos = new FormData(document.getElementById('frmEditarCat'));
    
    try {

        // Enviar los datos al servidor
        let respuesta = await fetch(base_url + 'controller/Categoria.php?tipo=actualizar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();
        if (json.status) {
            swal("Actualización", json.mensaje, "success");
        } else {
            swal("Actualización", json.mensaje, "error");
        }

        console.log(json);
    } catch (e) {
        console.log("Oops, ocurrió un error: " + e);
    } 
}



//ELIMINAR CATEGORIA
async function eliminar_categoria(id) {
    swal({
        title: "¿Estás seguro de que deseas eliminar este producto?",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true
    }).then((willDelete)=> {
        if (willDelete) {
            fnt_eliminar(id);
        }

    })

async function fnt_eliminar(id) {
    const formData = new FormData();
    formData.append("id_producto", id);

    try {
        let respuesta = await fetch(base_url + "controller/Producto.php?tipo=eliminar", {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: formData
        });

        json = await respuesta.json();

        if (json.status) {
            swal("Eliminar", "Eliminado Correctamente", "success");
            document.querySelector('#fila' + id).remove(); // Elimina la fila del DOM
        } else {
            swal('Eliminar', 'Eliminado Correctamente', 'success');
        }
    } catch (e) {
        console.error("Error al eliminar el producto: " + e);
    }

}

}
