<main>
        <section id="libro-reclamaciones">
            <h1>Libro de Reclamaciones</h1>
            <h2>Datos Generales</h2>
            <p>Fecha de emisión: 19/06/2024 17:14<br>
            Razón Social: IMPORTEC SOLUTIONS SAC.<br>
            RUC: 12345678912<br>
            Dirección: Av. San Martin N° 427 - LIMA - AASACIO</p>

            <h2>Identificación del Consumidor</h2>
            <form id="reclamaciones-form">
                <div class="form-group">
                    <label for="nombres-apellidos">Nombres y Apellidos</label>
                    <input type="text" id="nombres-apellidos" name="nombres-apellidos">
                </div>
                <div class="form-group">
                    <label for="tipo-documento">Tipo de Documento</label>
                    <select id="tipo-documento" name="tipo-documento">
                        <option value="dni">DNI</option>
                        <option value="ce">CE</option>
                    </select>
                    <label for="numero-documento">Número de Documento</label>
                    <input type="text" id="numero-documento" name="numero-documento">
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" id="direccion" name="direccion">
                </div>
                <div class="form-group">
                    <label for="correo-electronico">Correo Electrónico</label>
                    <input type="email" id="correo-electronico" name="correo-electronico">
                    <label for="telefono">Número de Teléfono</label>
                    <input type="tel" id="telefono" name="telefono">
                </div>
                <div class="form-group">
                    <label for="representante">Nombre del apoderado (Solo si es menor de edad)</label>
                    <input type="text" id="representante" name="representante">
                </div>

                <h2>Identificación del bien contratado</h2>
                <div class="form-group">
                    <label for="tipo-bien">Tipo de bien recibido</label>
                    <input type="text" id="tipo-bien" name="tipo-bien">
                </div>
                <div class="form-group">
                    <label for="descripcion-bien">Descripción del bien</label>
                    <input type="text" id="descripcion-bien" name="descripcion-bien">
                </div>

                <h2>Detalle de la reclamación</h2>
                <div class="form-group">
                    <label for="tipo-reclamacion">Tipo de reclamación</label>
                    <select id="tipo-reclamacion" name="tipo-reclamacion">
                        <option value="queja">Queja</option>
                        <option value="reclamo">Reclamo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="detalle-reclamacion">Detalle de la reclamación</label>
                    <textarea id="detalle-reclamacion" name="detalle-reclamacion"></textarea>
                </div>
                <div class="form-group">
                    <label for="aceptacion-datos">Declaro que los datos consignados en el presente formulario son verdaderos y asumos responsabilidad de los mismos.</label>
                    <input type="checkbox" id="aceptacion-datos" name="aceptacion-datos">
                </div>
                <div class="form-group">
                    
                    <label for="politica-datos">Declaro haber leído y acepto la <a href="#">Política de Privacidad de Datos Personales</a>.</label>
                    <input type="checkbox" id="politica-datos" name="politica-datos">
                </div>
                <div class="form-group">
                    <button type="submit">Enviar</button>
                </div>
            </form>
        </section>
    </main>