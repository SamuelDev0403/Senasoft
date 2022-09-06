import { BrowserRouter as Router, Routes, Route, Navigate } from "react-router-dom"

import { Home } from "../Components/Home/Home"
import { Login } from "../Components/Login/Login"
import { Register } from "../Components/Register/Register"
import { PrivateRouter } from "./PrivateRouter"

export const AppRouter = () =>{

    return(
        <Router>
            <Routes>
                <Route element={<PrivateRouter/>}>
                    <Route path="/home" element={<Home/>}></Route>
                </Route>
                <Route path="/login" element={<Login/>}></Route>
                <Route path="/register" element={<Register/>}></Route>
                <Route path="*" element={<Navigate to='/login'/>}></Route>
            </Routes>
        </Router>
    )
}