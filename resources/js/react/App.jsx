import { useEffect, useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from './assets/vite.svg'
import './App.css'

const urlBase = 'http://localhost:8080/2/public/'

function App() {
  const [usuarios, setUsuarios] = useState([])

  const getUsers = () => {
    fetch(urlBase + 'usuarios')
      .then(response => response.json())
      .then(data => {
        console.log(data)
        setUsuarios(data)
      })
      .catch(error => console.error(error))
  }

  useEffect(() => {
    getUsers()
  }, [])

  return (
    <>
      {usuarios.map((element, index) => (
        <div key={index}>
          <div>{element.name}</div>
          <div>{element.email}</div>
        </div>
      ))}
    </>
  )
}

export default App