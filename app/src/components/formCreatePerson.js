export function renderFormPersona() {
    const formPersona = document.getElementById('formAdd');

    formPersona.innerHTML = `
  <form class="MyFormulario" id="formulario">
        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" placeholder="Ingrese el primer nombre" name="name">
        </div>
        <div class="form-group">
            <label>Segundo Nombre:</label>
            <input type="text" placeholder="Ingrese el segundo nombre" name="secondName">
        </div>
        <div class="form-group">
            <label>Apellido:</label>
            <input type="text" name="lastname">
        </div>
        <div class="form-group">
            <label>Segundo Apellido:</label>
            <input type="text" name="secondLastname">
        </div>
        <div class="form-group">
            <label>Edad:</label>
            <input type="number" name="age">
        </div>
        <div class="form-group">
            <label>Estado:</label>
            <input type="text" name="status">
        </div>
        <div class="form-group">
            <label>Fecha de Ingreso:</label>
            <input type="date" name="accessDate">
        </div>
        <div class="form-group">
            <label>Dirección:</label>
            <input type="text" name="direction">
        </div>
        <div class="form-group">
            <label>Teléfono:</label>
            <input type="text" name="celphone">
        </div>
        <div class="form-group">
            <label>Cargo:</label>
            <input type="text" name="cargo">
        </div>
        <div class="form-group">
            <label>Imagen:</label>
            <input type="file" name="image">
        </div>
        <button type="submit" id="sendData">Añadir</button>
    </form>
        <button id="closeFormButton">X</button>
        `;
}
