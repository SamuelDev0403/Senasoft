import { Navigate, Outlet } from "react-router-dom";

import jwt_decode from 'jwt-decode'

export const CitizenRouter = () =>{
    let auth = jwt_decode(localStorage.getItem('token')).rol
    return(
        auth == 1 ? <Outlet/> : ''
    )
}