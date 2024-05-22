import { useEffect, useState} from 'react'

import './css/App.css'

function App() {
  /*ejemplo de como llamar los datos de la api*/
  const [data, setData] = useState([]);

  useEffect(() => {
    fetch('http://localhost/proyecto/api/index_api.php')
      .then(response => response.json())
      .then(data => setData(data))
      .catch(error => console.error('Error fetching data:', error));
  }, []);

  return (
    <div className="App">
      <header className="App-header">
        <h1>Product List</h1>
        <ul>
          {data.map(product => (
            <li key={product.id}>
              {product.nombre} - ${product.precio}
            </li>
          ))}
        </ul>
      </header>
    </div>
    )
}

export default App
