import { NewSondeo } from '../Sondeo/NewSondeo'
import './Content.css'
import { Topbar } from './Topbar/Topbar'

export const Content = () =>{


    return(
        <div className='col m-3'>
            <Topbar/>
            <div className="row">
                <div className="col-11 p-4"> 
                    <NewSondeo> </NewSondeo>
                </div>
            </div>
        </div>
    )
}