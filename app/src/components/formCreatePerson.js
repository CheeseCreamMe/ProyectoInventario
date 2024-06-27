
export function renderFormPersona() {
    const formPersona = document.getElementById('formAdd');

    formPersona.innerHTML = `
        <form class="MyFormulario">
            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" placeholder="Ingrese el primer nombre">
            </div>
            <div class="form-group">
                <label>Segundo Nombre:</label>
                <input type="text" placeholder="Ingrese el segundo nombre">
            </div>
            <div class="form-group">
                <label>Apellido:</label>
                <input type="text">
            </div>
            <div class="form-group">
                <label>Segundo Apellido:</label>
                <input type="text">
            </div>
            <div class="form-group">
                <label>Edad:</label>
                <input type="number">
            </div>
            <div class="form-group">
                <label>Estado:</label>
                <input type="text">
            </div>
            <div class="form-group">
                <label>Fecha de Ingreso:</label>
                <input type="date">
            </div>
            <div class="form-group">
                <label>Dirección:</label>
                <input type="text">
            </div>
            <div class="form-group">
                <label>Teléfono:</label>
                <input type="text">
            </div>
            <div class="form-group">
                <label>Cargo:</label>
                <input type="text">
            </div>
            <div class="form-group">
                <label>Imagen:</label>
                <input type="file">
            </div>
            <button id="sendData">Añadir</button>
        </form>
        <button id="closeFormButton">X</button>
        `;
}
