import './Login.css'
import { Formik } from 'formik';
import { login } from '../../Services/Login';

import { Link } from 'react-router-dom';

import { useNavigate } from 'react-router-dom';

import Swal from 'sweetalert2';

import jwt_decode from 'jwt-decode'

export const Login = () => {

    let navigate = useNavigate()

    const handlerSubmit = (values) => {
        const data = {
            documento: values.userInput,
            contrasena: values.passwordInput
        }

        const getLogin = async () => {
            let result = await login(data)
            if (result.status == 200) {
                window.localStorage.setItem('token', result.token)
                let rol = jwt_decode(result.token).rol

                if (rol == 1) navigate('/home/respondersondeo')
                if (rol == 2) navigate('/home/crearsondeo')

            } else if (result.status == 404) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Ocurrio un error con los datos ingresados',
                    icon: 'error'
                })
            }
        }

        getLogin()

    }

    return (
        <div className="row justify-content-center align-items-center g-0" id='login__container'>
            <div className="col-md-4">
                <Formik
                    initialValues={
                        {
                            userInput: '',
                            passwordInput: '',
                        }
                    }
                    validate={(values) => {
                        const errors = {}

                        if (!values.userInput) errors.userInput = "El campo no puede estar vacio"
                        if (!values.passwordInput) errors.passwordInput = "El campo no puede estar vacio"

                        return errors
                    }}
                    onSubmit={(values) => handlerSubmit(values)}
                >

                    {(formik) => (
                        <form className='border p-3 text-center rounded' onSubmit={formik.handleSubmit}>
                            <h1 className='fw-bold'>Inicio de sesion </h1>
                            <div>
                                <label htmlFor="userInput fw-bold"> Usuario </label>
                                <input type='text' name='userInput' className='form-control' placeholder='Usuario' {...formik.getFieldProps('userInput')} />
                                {formik.touched.userInput && formik.errors.userInput ? <small className='text-danger'>{formik.errors.userInput}</small> : ''}
                            </div>
                            <div className='mt-3'>
                                <label htmlFor="passwordInput fw-bold"> Contraseña </label>
                                <input type='password' name='passwordInput' className='form-control' placeholder='Contraseña' {...formik.getFieldProps('passwordInput')} />
                                {formik.touched.passwordInput && formik.errors.passwordInput ? <small className='text-danger'>{formik.errors.passwordInput}</small> : ''}
                            </div>
                            <button type='submit' className='btn btn-primary mt-3'>Iniciar sesion</button>
                            <div className='row mt-3'>
                                <div className='col'>
                                    <label className='d-block mb-1'> ¿Desea registrarse como ciudadano? </label>
                                    <Link to='/register'><span className='btn btn-primary'>Registrarse</span></Link>

                                </div>
                            </div>
                        </form>
                    )}
                </Formik>
            </div>
        </div >
    )
}