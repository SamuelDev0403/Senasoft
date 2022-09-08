import { BrowserRouter as Router, Routes, Route, Navigate } from "react-router-dom"

import { Home } from "../Components/Home/Home"
import { Login } from "../Components/Login/Login"
import { Register } from "../Components/Register/Register"
import { CitizenRouter, PrivateRouter } from "./CitizenRouter"
import { AdminRouter } from "./AdminRouter"

export const AppRouter = () => {

    return (
        <Router>
            <Routes>
                {/* <Route element={<CitizenRouter />}>
                    <Route path="/home/respondersondeo" element={<Home ele='respondersondeo'/>}></Route>
                </Route>
                <Route element={<AdminRouter />}>
                    <Route path="/home/crearsondeo" element={<Home ele='crearsondeo'/>}></Route>
                </Route> */}
                <Route path="/login" element={<Login />}></Route>
                <Route path="/register" element={<Register />}></Route>
                <Route path="/home" element={<Home contenido='ninguno'/>}></Route>
                <Route path="/home/crearsondeo" element={<Home contenido='crearsondeo'/>}></Route>
                <Route path="/home/respondersondeo" element={<Home contenido='respondersondeo'/>}></Route>

            </Routes>
        </Router>
    )
}