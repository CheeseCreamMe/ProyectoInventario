export async function sendDataToAPIFromPerson() {
    const form = document.querySelector('.MyFormulario');
    const formData = new FormData(form);
    const json = {};

    for (const [key, value] of formData.entries()) {
        if (key === 'image' && value instanceof File) {
            const base64String = await convertFileToBase64(value);
            json[key] = base64String;
        } else {
            json[key] = value;
        }
    }

    fetch('http://localhost/proyecto/api/person/createPerson', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(json)
    })
    .then(response => response.text())
    .then(data => console.log(data))
    .catch(error => console.error('Error:', error));
}

function convertFileToBase64(file) {
    return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => resolve(reader.result);
        reader.onerror = error => reject(error);
    });
}