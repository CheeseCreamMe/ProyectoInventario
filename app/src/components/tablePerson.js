const apiUrl = "http://localhost/proyecto/api/person/getAllPersons";

async function fetchData() {
    try {
        const response = await fetch(apiUrl);
        const result = await response.json();
        return result.data; // Ajustar de acuerdo con la estructura real de la respuesta
    } catch (error) {
        console.error("Error al obtener los datos:", error);
        return null;
    }
}

function renderTemplate(data) {
    if (!data || data.length === 0) {
        return renderTemplateError();
    }

    const rows = data.map(person => `
        <tr>
            <td colspan="2">${person.name} ${person.secondName || 'dafult'}</td>
            
            <td colspan="2">${person.lastname} ${person.secondLastname || 'dafult'}</td>
           
            <td>${person.direccion || 'dafult'}</td>
            <td>${person.telefono}</td>
            <td>${person.estado}</td>
            <td><img src="${person.imagen}" alt="Imagen de ${person.name}" width="50"></td>
            <td class="last_var">
                <button type="button" value="${person.id}" id="editButton">Editar</button>
                <button type="button" value="${person.id}" id="deleteButton">Eliminar</button>
            </td>
        </tr>
    `).join('');

    return `
        <table class="myTable">  
            <caption class="tittle">Lista de Personas</caption>
            <tr>
                <th colspan="2">Nombre</th>
                <th colspan="2">Apellido</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Estado</th>
                <th>Imagen</th>
                <th class="last_var">Acciones</th>
            </tr>
            ${rows}
        </table>
    `;
}

function renderTemplateError() {
    return `
        <table class="myTable">  
            <caption class="tittle">Lista de Personas</caption>
            <tr>
                <th colspan="2">Nombre</th>
                <th colspan="2">Apellido</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Estado</th>
                <th>Imagen</th>
                <th class="last_var">Acciones</th>
            </tr>
            <tr>
                <td colspan="9">No hay datos registrados para mostrar aquí</td>
            </tr>
        </table>
    `;
}

export async function getTable() {
    const data = await fetchData();
    const app = document.getElementById('dataTable');
    app.innerHTML = renderTemplate(data);
}
