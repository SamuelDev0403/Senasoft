import { useNavigate } from "react-router-dom"
import { Link } from "react-router-dom"

export const Topbar = () =>{

    const toggleNavbar = () =>{
        let navbar = document.getElementById('navbar')
        navbar.classList.toggle('d-none')
    }

    return(
        <div className="row justify-content-center">
            <div className="col border rounded p-3 m-3 d-flex justify-content-between"> 
                <button className="btn btn-primary" onClick={()=>toggleNavbar()}> Toggle </button>
                <Link to='/login'><button className="btn btn-primary" onClick={()=>localStorage.clear()}> Cerrar sesion </button></Link>
            </div>
        </div>
    )

}