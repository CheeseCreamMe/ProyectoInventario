    const apiUrl = "http://localhost/proyecto/api/person/getAllPersons";

    
    async function fetchData() {
        try {
            const response = await fetch(apiUrl);
            const result = await response.json();
            return result.data; // Ajustar de acuerdo con la estructura real de la respuesta
        } catch (error) {
            console.error("Error al obtener los datos:", error);
        }
    }
     
    function renderTemplate(data) {
        const rows = data.map(person => `
            <tr>
                <td class="firts_var">${person.name}</td>
                <td>${person.secondName || ''}</td>
                <td class="firts_var">${person.lastname}</td>
                <td>${person.secondLastname || ''}</td>
                <td>${person.direccion || ''}</td>
                <td>${person.telefono}</td>
                <td>${person.estado}</td>
                <td class="last_var"><img src="${person.imagen}" alt="Imagen de ${person.name}" width="50"></td>
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
                    <th class="last_var">Imagen</th>
                </tr>
                ${rows}
            </table>
        `;
    }
    
    export async function getTable() {
        const data = await fetchData();
        const app = document.getElementById('readData');
        app.innerHTML = renderTemplate(data);
    }

