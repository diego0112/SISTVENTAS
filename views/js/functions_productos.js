async function registrar_producto() {
    let codigo = document.getElementById('codigo').value;
    let nombre = document.querySelector('#nombre').value;
    let detalle = document.querySelector('#detalle').value;
    let precio = document.querySelector('#precio').value;
    let stock = document.querySelector('#stock').value;
    let categoria = document.querySelector('#categoria').value;
    let img = document.querySelector('#img').value;
    let proveedor = document.querySelector('#proveedor').value;
    if (codigo=="" || nombre =="" || detalle=="" || precio =="" || stock ==""
        || categoria =="" || img =="" || proveedor =="") {
            alert("Error!!, Campos vacíos");
            return;
    }
    try {
        //capturamos datos del formulario html nuevo-producto
        const datos = new FormData(frmRegistrarProd);
        //enviamos datos hacia el controlador
        let respuesta = await fetch(base_url+'controller/Producto.php?tipo=registrar',{
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json =  await respuesta.json();
        if (json.status) {
            swal("registro", json.mensaje,"success");
        } else{
            swal("Registro", json.mensaje,"error");
        }

        console.log(json);
    } catch (e) {
        console.log("Oops, ocurrio un error"+e)
    }
}

//FUNCION PARA LLAMAR AL CONTROLADOR DE CATEGORIA(FUNCION DIRECTA)
async function listar_categorias(){
    try {
        let respuesta = await fetch(base_url+'controller/Categoria.php?tipo=listar');
        json = await respuesta.json();
        if (json.status) {
            let datos = json.contenido;
            datos.forEach(element => {
                $('#categoria').append($('<option />'),{
                    text: `$(element.nombre)`,
                    value: `$(element.id)`
                });
            });
        }

            console.log(respuesta);
        
    }catch (e) {
        console.log("Oops, ocurrio un error"+e)
    }
}
