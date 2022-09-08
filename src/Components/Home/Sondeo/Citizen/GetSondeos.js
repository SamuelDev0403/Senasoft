import { useContext } from "react"
import { ContextContent } from "../../Content/Content"

export const GetSondeos = () => {

    const data = {
        title: 'Prueba de titulo'
    }

    return (
        <div className="">
            <div>
                <h3> {data.title}</h3>
                <button className="btn btn-primary" onClick={()=>{
                    window.localStorage.setItem('content', JSON.stringify({
                        page: 'sondeo',
                    }))
                }}> Contestar </button>
            </div>
        </div>
    )
}