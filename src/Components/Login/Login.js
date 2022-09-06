import './Login.css'
import { Formik } from 'formik';
import { login } from '../../Services/Login';

import { Link } from 'react-router-dom';

export const Login = () => {


    const validate = (values) => {
        const errors = {}

        errors.userInput = !values.userInput ? "El campo no puede estar vacio" : ''
        errors.passwordInput = !values.passwordInput ? "El campo no puede estar vacio" : ''

        return errors
    }

    const handlerSubmit = (values) => {
        const data = {
            documento: values.userInput,
            contrasena: values.passwordInput
        }

        login(data)
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
                    validate={(values) => validate(values)}
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