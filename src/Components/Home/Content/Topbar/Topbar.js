export const Topbar = () =>{

    const toggleNavbar = () =>{
        let navbar = document.getElementById('navbar')
        navbar.classList.toggle('d-none')
    }

    return(
        <div className="row justify-content-center">
            <div className="col border rounded p-3 m-3"> 
                <button className="btn btn-primary" onClick={()=>toggleNavbar()}> Toggle </button>
            </div>
        </div>
    )

}