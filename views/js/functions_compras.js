
// Función para listar los productos
async function listar_compras() {
    try {
        let respuesta = await fetch(base_url + 'controller/Compras.php?tipo=listar_compras');
        let json = await respuesta.json();

        if (json.status) {

            let datos = json.contenido;
            let cont = 0;
            // Agregar filas a la tabla
            datos.forEach(item => {
                let nueva_fila = document.createElement("tr");
                nueva_fila.id = "fila" + item.id;
                cont+=1
                nueva_fila.innerHTML = `
                 <tr>
                        <th>${cont}</th>
                         <td>${item.producto.nombre}</td>
                        <td>${item.cantidad}</td>
                        <td>${item.precio}</td>
                        <td>${item.fecha_compra}</td>
                        <td>${item.trabajador.razon_social}</td>
                        <td>${item.options}</td>

                    </tr>
                `;
                document.querySelector("#tbl_compras")
                .appendChild(nueva_fila);
                
            });
        };
        console.log(json);
    } catch (error) {
        console.error("Error al listar productos" + error);
    }
}
if (document.querySelector('#tbl_compras')) {
    listar_compras();
}
async function listar_trabajadores() {
    try {
        let respuesta = await fetch(base_url + 'controller/Persona.php?tipo=listartrabajador');
        let json = await respuesta.json();
        if (json.status) {
            let datos = json.contenido;
            let contenido_select = '<option value="">Seleccione trabajador</option>';
            datos.forEach(element => {
                contenido_select += '<option value="' + element.id + '">' + element.razon_social + '</option>';       
            });
            document.getElementById('trabajador').innerHTML = contenido_select;
        }
        console.log(respuesta);
    } catch (e) {
        console.error("Error al cargar trabajador: " + e);
    }
}


async function registrar_compra() {
 
    let producto = document.querySelector('#producto').value;
    let cantidad = document.querySelector('#cantidad').value;
    let precio = document.querySelector('#precio').value;
    let fecha_compra = document.querySelector('#fecha_compra').value;
    let trabajador = document.querySelector('#trabajador').value;
    if (producto == "" || cantidad == "" ||precio == "" ||  fecha_compra == "" || trabajador == "") {
        alert("Error!!, Campos vacíos");
        return;
    }
    try {
        //capturamos datos del formulario html nuevo-producto
        const datos = new FormData(frmRegistrarCompra);
        //enviamos datos hacia el controlador
        let respuesta = await fetch(base_url + 'controller/Compras.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (json.status) {
            swal.fire("registro", json.mensaje, "success");
        } else {
            swal.fire("Registro", json.mensaje, "error");
        }

        console.log(json);
    } catch (e) {
        console.log("Oops, ocurrio un error" + e)
    }
}

//FUNCION PARA LLAMAR AL CONTROLADOR DE CATEGORIA(FUNCION DIRECTA)
//  listar_categorias registrados en la base de datos

async function listar_productos() {
    try {
        // envia datos hacia el controlador
        let respuesta = await fetch(base_url +
            'controller/Producto.php?tipo=listar');
        json = await respuesta.json();
        if (json.status) {
            let datos = json.contenido;
            let contenido_select = '<option value="">Seleccione</option>'
            datos.forEach(element => {
                contenido_select += '<option value="' + element.id + '">' + element.nombre + '</option>';
               
            });
            document.getElementById('producto').innerHTML = contenido_select;
        }
        console.log(respuesta);
    } catch (e) {
        console.e("Error al cargar categorias" + e)
    }
}


//ACTUALIZAR COMPRA

async function ver_compras(id) {
    const formData = new FormData();
    formData.append('id_compra', id);

    try {
        let respuesta = await fetch(base_url + 'controller/Compras.php?tipo=ver_compras', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: formData
        });
        let json = await respuesta.json();
        if (json.status) {
            document.getElementById('id_compra').value = json.contenido.id;
            document.getElementById('producto').value = json.contenido.id_producto;
            document.getElementById('cantidad').value = json.contenido.cantidad;
            document.getElementById('precio').value = json.contenido.precio;
            document.getElementById('trabajador').value = json.contenido.id_trabajador;
            document.getElementById('estado').value = json.contenido.estado; // Cargar el estado
        } else {
            window.location = base_url + "compras";
        }
        console.log(json);
    } catch (error) {
        console.log("Ops ocurrió un error: " + error);
    }
}

async function actualizar_compra() {
    const datos = new FormData(document.getElementById('frmEditarCompra'));
    datos.append('id_compra', document.getElementById('id_compra').value); // Asegúrate de que el id_compra se envíe

    try {
        let respuesta = await fetch(base_url + 'controller/Compras.php?tipo=actualizar_compra', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();
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

async function EliminarCompra(id) {
    swal.fire({
        title: '¿Está seguro de eliminar la compra?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        buttons: true,
        dangerMode: true
    }).then((result) => {
        if (result.isConfirmed) {
            fnt_EliminarCompra(id);
        }
    });

    async function fnt_EliminarCompra(id) {
        const formData = new FormData();
        formData.append('id_compra', id);

        try {
            let respuesta = await fetch(base_url + 'controller/Compras.php?tipo=EliminarCompra', {
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                body: formData
            });
            let json = await respuesta.json();
            if (json.status) {
                swal.fire("Eliminacion exitosa", json.mensaje, 'success');
                document.querySelector(`#fila${id}`).remove(); // Eliminar la fila de la tabla
            } else {
                swal.fire("Eliminacion fallida", json.mensaje, 'error');
            }
            console.log(json);
        } catch (error) {
            console.error("Error al deshabilitar compra: " + error);
        }
    }
}

