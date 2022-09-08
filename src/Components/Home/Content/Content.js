import { GetSondeos } from '../Sondeo/Citizen/GetSondeos'
import { NewSondeo } from '../Sondeo/Admin/NewSondeo'
import './Content.css'
import { Topbar } from './Topbar/Topbar'
import { ViewSondeo } from '../Sondeo/Citizen/ViewSondeo'

export const Content = ({ contenido }) => {

    console.log("contenido", contenido)
    return (
        <div className='col m-3'>
            <Topbar />
            <div className="row">
                <div className="col-11 p-4">
                    {contenido == 'respondersondeo' ? <ViewSondeo> </ViewSondeo> :
                        contenido == 'crearsondeo' ? <NewSondeo></NewSondeo> :
                            <div> Error </div>
                    }
                </div>
            </div>
        </div>
    )
}