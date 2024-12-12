    async function listarProductos() {
        try {
            
            let respuesta = await fetch(base_url + 'controller/Producto.php?tipo=listar');
            let json = await respuesta.json();
            if (json.status) {
                let datos = json.contenido;
                let cont = 0;
                datos.forEach(item => {
                    let nueva_fila = document.createElement("tr");
                    nueva_fila.id = "fila" + item.id; //este es el id que viene de la base de datos
                    cont++; // para ver que se aumenta
                    nueva_fila.innerHTML = ` 
                            <th>${cont}</th>
                            <td>${item.codigo}</td>
                            <td>${item.nombre}</td>
                            <td>${item.stock}</td>
                            <td>${item.categoria.nombre}</td>
                            <td>${item.proveedor.razon_social}</td>
                            <td>${item.options}</td>
                    `;
                    document.querySelector('#tbl_producto').appendChild(nueva_fila);
                    
                });
                document.getElementById('producto').innerHTML = contenido_select;
            } else {
                console.error("Error en la respuesta: " + json.mensaje);
            }    
        } catch (e) {
            console.error("Error al cargar productos: " + e);
        }
    }
    if (document.querySelector('#tbl_producto')) {
        listarProductos();
    } 


    async function registrar_producto() {
        let codigo = document.getElementById('codigo').value;
        let nombre = document.querySelector('#nombre').value;
        let detalle = document.querySelector('#detalle').value;
        let precio = document.querySelector('#precio').value;
        let stock = document.querySelector('#stock').value;
        let categoria = document.querySelector('#categoria').value;
        let img = document.querySelector('#img').value;
        let proveedor = document.querySelector('#proveedor').value;
        if (codigo == "" || nombre == "" || detalle == "" || precio == "" || stock == ""
            || categoria == "" || img == "" || proveedor == "") {
            alert("Error!!, Campos vacíos");
            return;
        }
        try {
            //capturamos datos del formulario html nuevo-producto
            const datos = new FormData(frmRegistrarProd);
            //enviamos datos hacia el controlador
            let respuesta = await fetch(base_url + 'controller/Producto.php?tipo=registrar', {
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                body: datos
            });
            json = await respuesta.json();
            if (json.status) {
                swal.fire("Registro", json.mensaje, "success");
            } else {
                swal.fire("Registro", json.mensaje, "error");
            }

            console.log(json);
        } catch (e) {
            console.log("Oops, ocurrio un error" + e);
        }
    }

    //FUNCION PARA LLAMAR AL CONTROLADOR DE CATEGORIA(FUNCION DIRECTA)
    //  listar_categorias registrados en la base de datos

    async function listar_categorias() {
        try {
            // envia datos hacia el controlador
            let respuesta = await fetch(base_url +
                'controller/Categoria.php?tipo=listar');
            json = await respuesta.json();
            if (json.status) {
                let datos = json.contenido;
                let contenido_select = '<option value="">Seleccione</option>'
                datos.forEach(element => {
                    contenido_select += '<option value="' + element.id + '">' + element.nombre + '</option>';
                    //se trabaja con jquery
                    /*$('#categoria').append($('<option />', {
                        text: `${element.nombre}`,
                        value: `${element.id}`
                    }));*/
                });
                document.getElementById('categoria').innerHTML = contenido_select;
            }
            console.log(respuesta);
        } catch (e) {
            console.e("Error al cargar categorias" + e)
        }
    }



    async function listar_proveedores() {
        try {
            // Envía la solicitud al controlador de proveedores
            let respuesta = await fetch(base_url + 'controller/Persona.php?tipo=listarproveedor');
            let json = await respuesta.json();
            if (json.status) {
                let datos = json.contenido;
                let contenido_select = '<option value="">Seleccione Proveedor</option>';
                datos.forEach(element => {
                    contenido_select += '<option value="' + element.id + '">' + element.razon_social + '</option>';
                    // O usando jQuery
                    /*$('#proveedor').append($('<option />', {
                        text: `${element.nombre}`,
                        value: `${element.id}`
                    }));*/
                });
                document.getElementById('proveedor').innerHTML = contenido_select;
            }
            console.log(respuesta);
        } catch (e) {
            console.error("Error al cargar proveedores: " + e);
        }
    }

    async function ver_producto(id) {
        const formData = new FormData();
        formData.append('id_producto', id);
        try {
            let respuesta = await fetch(base_url + 'controller/Producto.php?tipo=ver', {
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                body: formData
                
            }); // Envía la solicitud al controlador de productos
            let json = await respuesta.json();
            if (json.status) {
                document.querySelector('#codigo').value = json.Contenido.codigo;
                document.querySelector('#nombre').value = json.Contenido.nombre;
                document.querySelector('#detalle').value = json.Contenido.detalle;
                document.querySelector('#precio').value = json.Contenido.precio;
                document.querySelector('#categoria').value = json.Contenido.id_categoria;  
                document.querySelector('#proveedor').value = json.Contenido.id_proveedor;
                document.querySelector('#imagen').value = json.Contenido.img;
                
            }else{
                window.location = base_url+"productos";
            }
            console.log(json);

        } catch (e) {
            console.log("Oops, ocurrio un error" + e);
        }
    }




  //ACTUALIZAR PRODUCTO  
    async function actualizar_producto() {
        let codigo = document.getElementById('codigo').value;
        let nombre = document.querySelector('#nombre').value;
        let detalle = document.querySelector('#detalle').value;
        let precio = document.querySelector('#precio').value;
        let categoria = document.querySelector('#categoria').value;
        let proveedor = document.querySelector('#proveedor').value;
    
        if (codigo == "" || nombre == "" || detalle == "" || precio == "" || categoria == "" || proveedor == "") {
            alert("Error!!, Campos vacíos");
            return;
        }try {
            // Preparar los datos del formulario para enviarlos
            const formData = new FormData(frmActualizarProd);
            formData.append('id_producto', id_p);  // El id del producto que estamos editando
            formData.append('codigo', codigo);
            formData.append('nombre', nombre);
            formData.append('detalle', detalle);
            formData.append('precio', precio);
            formData.append('categoria', categoria);
            formData.append('proveedor', proveedor);
    
            // Enviar los datos al servidor
            let respuesta = await fetch(base_url + 'controller/Producto.php?tipo=actualizar', {
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                body: formData
            });
    
            let json = await respuesta.json();
            if (json.status) {
                swal.fire("Actualización", json.mensaje, "success");
            } else {
                swal.fire("Actualización", json.mensaje, "error");
            }
    
            console.log(json);
        } catch (e) {
            console.log("Oops, ocurrió un error: " + e);
        } 
    }



    //ELIMINAR PRODUCTO 
    async function eliminar_producto(id) {
        swal.fire({
            title: '¿Está seguro de eliminar el producto?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            buttons: true,
            dangerMode: true
        }).then((result) => {
            if (result.isConfirmed) {
                fnt_eliminar(id);
            }
        });
    
        async function fnt_eliminar(id) {
            const formdata = new FormData();
            formdata.append('id_producto', id);
    
            try {
                let respuesta = await fetch(base_url + 'controller/Producto.php?tipo=eliminar_producto', {
                    method: 'POST',
                    mode: 'cors',
                    cache: 'no-cache',
                    body: formdata
                });
                let json = await respuesta.json();
                if (json.status) {
                    swal.fire("Eliminación exitosa", json.mensaje, 'success');
                    document.querySelector('#fila' + id).remove();
                } else {
                    swal.fire("Eliminación fallida", json.mensaje, 'error');
                }
                console.log(json);
            } catch (error) {
                console.log("Error al eliminar producto: " + error);
            }
        }
    }
    
    


