import { useEffect, useState } from 'react'

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
      
    </>
  )
}

export default App