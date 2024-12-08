
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
            swal("registro", json.mensaje, "success");
        } else {
            swal("Registro", json.mensaje, "error");
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


