import { Navbar } from './Navbar/Navbar'
import { Content } from './Content/Content'
import { createContext } from 'react'

import { useState } from 'react'

export const Home = ({ contenido }) => {

    const Context = createContext('')

    const [context, setContext] = useState()

    console.log("estuvoa ca")

    return (
        <Context.Provider value={{context,setContext}}>
            <div className="row g-0">
                <Navbar />
                <Content contenido={contenido} />
            </div>
        </Context.Provider>
    )
}