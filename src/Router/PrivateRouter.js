import { Navigate, Outlet } from "react-router-dom";

import Cookies from 'js-cookie';


export const PrivateRouter = () =>{

    console.log(Cookies.get())

    let auth = Cookies.get('token') || false;
    return(
        auth ? <Outlet/> : <Navigate to='/login'/>
    )
}