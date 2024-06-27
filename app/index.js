//esta es la pagina de personas antes de hacer los cambios 
//lo proximo a hacer es un enrutador para acceder solo al js que quiero
import {getTable} from "../app/src/components/tablePerson.js";
import { renderFormPersona } from "./src/components/formCreatePerson.js";
// Función para generar HTML basado en una plantilla
function renderTemplate() {
    return `
    <title>Admin || Personas</title>
    <section class="ContainerCrud">
        <button id="showFormButton">Agregar</button>
        <div id="formAdd">
        </div>
        <div id="dataTable">
        </div>
    </section>
    
        `;
}

// Selecciona el elemento del DOM donde quieres agregar el contenido
const app = document.getElementById('app');

// Genera el HTML y lo inserta en el DOM
app.innerHTML = renderTemplate();

getTable();
renderFormPersona();

