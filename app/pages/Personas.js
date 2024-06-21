import {getTable} from "../app/components/tablePerson.js";
// Función para generar HTML basado en una plantilla
function renderTemplate() {
    return `
    <title>Admin || Personas</title>
    <section class="ContainerCrud">
          <div id="readData">
          </div>
    </section>
        `;
}

// Selecciona el elemento del DOM donde quieres agregar el contenido
const app = document.getElementById('app');

// Genera el HTML y lo inserta en el DOM
app.innerHTML = renderTemplate();
//generear y rellenar la tabla
getTable();

