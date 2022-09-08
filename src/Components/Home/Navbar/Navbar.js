
import './Navbar.css'

export const Navbar = () =>{

    return(
        <div className="col-md-2 bg-primary text-light" id="navbar">
            <div className="navbar__title p-3">
                <h3 className='text-center fw-bold'>Barra de navegacion </h3>
            </div>
            <div className="navbar__content p-3">
                <div className='navbar__content--items'> Enlace 1</div>
                <div className='navbar__content--items'>Enlace 1</div>
                <div className='navbar__content--items'>Enlace 1</div>
                <div className='navbar__content--items'>Enlace 1</div>
            </div>
        </div>
    )
}