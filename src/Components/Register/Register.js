import './Register.css'
import { Formik } from 'formik';

import { Link, Navigate } from 'react-router-dom';
import { registerCitizen } from '../../Services/Register';

import { useNavigate } from 'react-router-dom';

import Swal from 'sweetalert2';

export const Register = () => {

    let navigate = useNavigate()

    const handlerSubmit = (values) => {

        console.log("handler")

        const registerRequest = async (values) => {
            let result = await registerCitizen(values)
            if (result.status == 200) {
                Swal.fire({
                    title: 'Exito!',
                    text: 'Se registro correctamente el usuario',
                    icon: 'success'
                })
                setTimeout(()=>navigate('/home'), 3000)
            } else if (result.status == 404) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Ocurrio un error con los datos ingresados',
                    icon: 'error'
                })
                
            }
        }

        registerRequest(values)
    }

    return (
        <div className="row justify-content-center align-items-center g-0" id='register__container'>
            <div className="col-md-6 my-5">

                <Formik
                    initialValues={
                        {
                            dniType: '1',
                            documento: '',
                            nameInput: '',
                            lastNameInput: '',
                            sexInput: '1',
                            celInput: '',
                            telInput: '',
                            emailInput: '',
                            municipalityInput: '',
                            addressInput: '',
                            neighborhoodInput: '',
                            birthdateInput: '',
                            ethnicityInput: '1',
                            disabilityInput: '',
                            stratumInput: '1',
                            levelInput: '1',
                            accessInput: '1',
                            devicesInput: '1',
                            connectivityInput: '1',
                            regimeInput: '1',
                            passwordInput: '',
                        }
                    }
                    validate={(values) => {
                        const errors = {}

                        if (!values.dniType) errors.dniType = "El campo no puede estar vacio"
                        if (!values.documento) errors.documento = "El campo no puede estar vacio"
                        if (!values.nameInput) errors.nameInput = "El campo no puede estar vacio"
                        if (!values.lastNameInput) errors.lastNameInput = "El campo no puede estar vacio"
                        if (!values.sexInput) errors.sexInput = "El campo no puede estar vacio"
                        if (!values.celInput) errors.celInput = "El campo no puede estar vacio"
                        if (!values.telInput) errors.telInput = "El campo no puede estar vacio"
                        if (!values.emailInput) errors.emailInput = "El campo no puede estar vacio"
                        if (!values.municipalityInput) errors.municipalityInput = "El campo no puede estar vacio"
                        if (!values.addressInput) errors.addressInput = "El campo no puede estar vacio"
                        if (!values.neighborhoodInput) errors.neighborhoodInput = "El campo no puede estar vacio"
                        if (!values.birthdateInput) errors.birthdateInput = "El campo no puede estar vacio"
                        if (!values.ethnicityInput) errors.ethnicityInput = "El campo no puede estar vacio"
                        if (!values.disabilityInput) errors.disabilityInput = "El campo no puede estar vacio"
                        if (!values.levelInput) errors.levelInput = "El campo no puede estar vacio"
                        if (!values.accessInput) errors.accessInput = "El campo no puede estar vacio"
                        if (!values.devicesInput) errors.devicesInput = "El campo no puede estar vacio"
                        if (!values.connectivityInput) errors.connectivityInput = "El campo no puede estar vacio"
                        if (!values.regimeInput) errors.regimeInput = "El campo no puede estar vacio"
                        if (!values.passwordInput) errors.passwordInput = "El campo no puede estar vacio"
                        if (!values.stratumInput) errors.stratumInput = 'El campo no puede estar vacio'

                        // console.log("valores: ", values)
                        console.log("errores: ", errors)
                        return errors
                    }}
                    onSubmit={(values) => handlerSubmit(values)}
                >

                    {(formik) => (
                        <form className='border p-3' onSubmit={formik.handleSubmit}>
                            <h1 className='fw-bold text-center'>Registro de ciudadano </h1>

                            <h3 className='fw-bold text-underline mt-2'> 1. IDENTIFICACION</h3>
                            <div className="row">
                                <div className="col-md mt-3">
                                    <label htmlFor="userInput fw-bold"> 1.1 Tipo de documento </label>
                                    <select className='form-control' name='dniType' {...formik.getFieldProps('dniType')}>
                                        <option value="1"> Cedula de ciudadania </option>
                                    </select>
                                    {formik.touched.dniType && formik.errors.dniType ? <small className='text-danger'>{formik.errors.dniType}</small> : ''}
                                </div>
                                <div className="col-md mt-3">
                                    <label htmlFor="documento fw-bold"> 1.2 Numero de documento </label>
                                    <input type='text' className='form-control' name='documento' {...formik.getFieldProps('documento')} />
                                    {formik.touched.documento && formik.errors.documento ? <small className='text-danger'>{formik.errors.documento}</small> : ''}
                                </div>
                            </div>
                            <div className="row">
                                <div className="col-md mt-3">
                                    <label htmlFor="nameInput fw-bold"> 1.3 Nombres completos </label>
                                    <input type='text' className='form-control' name='nameInput' {...formik.getFieldProps('nameInput')} />
                                    {formik.touched.nameInput && formik.errors.nameInput ? <small className='text-danger'>{formik.errors.nameInput}</small> : ''}
                                </div>
                                <div className="col-md mt-3">
                                    <label htmlFor="lastNameInput fw-bold"> 1.4 Apellidos </label>
                                    <input type='text' className='form-control' name='lastNameInput' {...formik.getFieldProps('lastNameInput')} />
                                    {formik.touched.lastNameInput && formik.errors.lastNameInput ? <small className='text-danger'>{formik.errors.lastNameInput}</small> : ''}
                                </div>
                            </div>
                            <div className="row">
                                <div className="col-md-6 mt-3    ">
                                    <label htmlFor="sexInput fw-bold"> 1.5 Sexo </label>
                                    <select className='form-control' name='sexInput' {...formik.getFieldProps('sexInput')} >
                                        <option value="1"> Hombre </option>
                                        <option value="2"> Mujer </option>
                                        <option value="3"> Intersexual </option>
                                        <option value="4"> Indefinido </option>
                                        <option value="5"> Prefieren no decir </option>
                                    </select>
                                    {formik.touched.sexInput && formik.errors.sexInput ? <small className='text-danger'>{formik.errors.sexInput}</small> : ''}
                                </div>
                            </div>

                            <h3 className='fw-bold text-underline mt-3'> 2. CONTACTO</h3>
                            <div className="row">
                                <div className="col-md mt-3">
                                    <label htmlFor="celInput fw-bold"> 2.1 Telefono celular </label>
                                    <input type='number' className='form-control' name='celInput' {...formik.getFieldProps('celInput')} />
                                    {formik.touched.celInput && formik.errors.celInput ? <small className='text-danger'>{formik.errors.celInput}</small> : ''}
                                </div>
                                <div className="col-md mt-3">
                                    <label htmlFor="telInput fw-bold"> 2.2 Telefono fijo </label>
                                    <input type='number' className='form-control' name='telInput' {...formik.getFieldProps('telInput')} />
                                    {formik.touched.telInput && formik.errors.telInput ? <small className='text-danger'>{formik.errors.telInput}</small> : ''}
                                </div>
                            </div>
                            <div className="row">
                                <div className="col-md-6 mt-3">
                                    <label htmlFor="emailInput fw-bold"> 2.3 Correo electronico * </label>
                                    <input type='email' className='form-control' name='emailInput' {...formik.getFieldProps('emailInput')} />
                                    {formik.touched.emailInput && formik.errors.emailInput ? <small className='text-danger'>{formik.errors.emailInput}</small> : ''}
                                </div>
                            </div>


                            <h3 className='fw-bold text-underline mt-3'> 3. GEOGRAFICAS</h3>
                            <div className="row">
                                <div className="col-md mt-3">
                                    <label htmlFor="municipalityInput fw-bold"> 3.1 Municipio * </label>
                                    <input type='text' className='form-control' name='municipalityInput' {...formik.getFieldProps('municipalityInput')} />
                                    {formik.touched.municipalityInput && formik.errors.municipalityInput ? <small className='text-danger'>{formik.errors.municipalityInput}</small> : ''}
                                </div>
                                <div className="col-md mt-3">
                                    <label htmlFor="addressInput fw-bold"> 3.2 Direccion </label>
                                    <input type='text' className='form-control' name='addressInput' {...formik.getFieldProps('addressInput')} />
                                    {formik.touched.addressInput && formik.errors.addressInput ? <small className='text-danger'>{formik.errors.addressInput}</small> : ''}
                                </div>
                            </div>
                            <div className="row">
                                <div className="col-md-6 mt-3">
                                    <label htmlFor="neighborhoodInput fw-bold"> 3.3 Barrio - Vereda  * </label>
                                    <input type='text' className='form-control' name='neighborhoodInput' {...formik.getFieldProps('neighborhoodInput')} />
                                    {formik.touched.neighborhoodInput && formik.errors.neighborhoodInput ? <small className='text-danger'>{formik.errors.neighborhoodInput}</small> : ''}
                                </div>
                            </div>

                            <h3 className='fw-bold text-underline mt-3'> 4. ENFOQUE DIFERENCIAL</h3>
                            <div className="row">
                                <div className="col-md mt-3">
                                    <label htmlFor="birthdateInput fw-bold"> 4.1 Fecha de nacimiento * </label>
                                    <input type='date' className='form-control' name='birthdateInput' {...formik.getFieldProps('birthdateInput')} />
                                    {formik.touched.birthdateInput && formik.errors.birthdateInput ? <small className='text-danger'>{formik.errors.birthdateInput}</small> : ''}
                                </div>
                                <div className="col-md mt-3">
                                    <label htmlFor="ethnicityInput fw-bold"> 4.2 Etnia </label>
                                    <select className='form-control' name='ethnicityInput' {...formik.getFieldProps('ethnicityInput')}>
                                        <option value="1"> Blanco </option>
                                        {/* <option value="2"> Mestizo </option>
                                        <option value="3"> Negro </option>
                                        <option value="4"> Indigena </option>
                                        <option value="5"> Otro </option> */}
                                    </select>
                                    {formik.touched.ethnicityInput && formik.errors.ethnicityInput ? <small className='text-danger'>{formik.errors.ethnicityInput}</small> : ''}
                                </div>
                            </div>

                            <h3 className='fw-bold text-underline mt-3'> 5. ENFOQUE POBLACIONAL</h3>
                            <div className="row">
                                <div className="col-md mt-3">
                                    <label htmlFor="disabilityInput fw-bold"> 5.1 Condicion de discapacidad * </label>
                                    <input type='text' className='form-control' name='disabilityInput' {...formik.getFieldProps('disabilityInput')} />
                                    {formik.touched.disabilityInput && formik.errors.disabilityInput ? <small className='text-danger'>{formik.errors.disabilityInput}</small> : ''}
                                </div>
                            </div>


                            <h3 className='fw-bold text-underline mt-3'> 6. SOCIOECONOMICO </h3>
                            <div className="row">
                                <div className="col-md mt-3">
                                    <label htmlFor="stratumInput fw-bold"> 6.1 Estrato de residencia * </label>
                                    <select className='form-control' {...formik.getFieldProps('stratumInput')}>
                                        <option value='1'> 1 </option>
                                    </select>
                                    {formik.touched.stratumInput && formik.errors.stratumInput ? <small className='text-danger'>{formik.errors.stratumInput}</small> : ''}
                                </div>
                            </div>

                            <h3 className='fw-bold text-underline mt-3'> 7. ESCOLARIDAD </h3>
                            <div className="row">
                                <div className="col-md mt-3">
                                    <label htmlFor="levelInput fw-bold"> 7.1 Ultimo nivel educativo alcanzado * </label>
                                    <select className='form-control' {...formik.getFieldProps('levelInput')}>
                                        <option value='1'> Tecnico </option>
                                    </select>
                                    {formik.touched.levelInput && formik.errors.levelInput ? <small className='text-danger'>{formik.errors.levelInput}</small> : ''}
                                </div>
                            </div>

                            <h3 className='fw-bold text-underline mt-3'> 8. ACCESO Y CONECTIVIDAD A MEDIOS TECNOLOGICOS </h3>
                            <div className="row">
                                <div className="col-md-6 mt-3">
                                    <label htmlFor="accessInput fw-bold"> 8.1 ¿Cuenta con acceso a dispositivos tecnologicos? * </label>
                                    <select className='form-control' {...formik.getFieldProps('accessInput')}>
                                        <option value='1'> Si </option>
                                        <option value='0'> No </option>
                                    </select>
                                    {formik.touched.accessInput && formik.errors.accessInput ? <small className='text-danger'>{formik.errors.accessInput}</small> : ''}
                                </div>
                                {formik.values.accessInput === '1' ?
                                    <div className="col-md mt-3">
                                        <label htmlFor="devicesInput fw-bold"> 8.2 Si, la respuesta 8.1 fue afirmativa ¿cuál o cuáles? * </label>
                                        <select className='form-control' {...formik.getFieldProps('devicesInput')}>
                                            <option value='1'> Computador </option>
                                            {/* <option value='2'> Telefono movil </option>
                                            <option value='3'> Tablet </option>
                                            <option value='4'> Otro </option> */}
                                        </select>
                                        {formik.touched.devicesInput && formik.errors.devicesInput ? <small className='text-danger'>{formik.errors.devicesInput}</small> : ''}
                                    </div> : ''}
                            </div>
                            <div className="row">
                                <div className="col-md-6 mt-3">
                                    <label htmlFor="con fw-bold"> 8.3 ¿Cuenta con conectividad a internet? * </label>
                                    <select className='form-control' name='connectivityInput' {...formik.getFieldProps('connectivityInput')}>
                                        <option value='1'> Si </option>
                                        <option value='0'> No </option>
                                    </select>
                                    {formik.touched.connectivityInput && formik.errors.connectivityInput ? <small className='text-danger'>{formik.errors.connectivityInput}</small> : ''}
                                </div>
                            </div>

                            <h3 className='fw-bold text-underline mt-3'> 9. SALUD </h3>
                            <div className="row">
                                <div className="col-md-6 mt-3">
                                    <label htmlFor="regimeInput fw-bold"> 9.1 Regimen de salud * </label>
                                    <select className='form-control' name='regimeInput' {...formik.getFieldProps('regimeInput')} >
                                        <option value="1"> Subsidiado </option>
                                        <option value="0"> Contributivo </option>
                                    </select>
                                    {formik.touched.regimeInput && formik.errors.regimeInput ? <small className='text-danger'>{formik.errors.regimeInput}</small> : ''}
                                </div>
                            </div>

                            <h3 className='fw-bold text-underline mt-3'> 10. AUTENTICACION </h3>
                            <div className="row">
                                <div className="col-md-6 mt-3">
                                    <label htmlFor="passwordInput fw-bold"> 10.1 Contraseña * </label>
                                    <input type='password' className='form-control' name='passwordInput' {...formik.getFieldProps('passwordInput')} />
                                    {formik.touched.passwordInput && formik.errors.passwordInput ? <small className='text-danger'>{formik.errors.passwordInput}</small> : ''}
                                </div>
                            </div>

                            <div className='d-flex justify-content-between'>
                                <button type='submit' className='btn btn-primary mt-3'>Registrarse</button>
                                <Link to='/login'> <button type='button' className='btn btn-primary mt-3'>Volver al login</button> </Link>
                            </div>
                        </form>
                    )
                    }
                </Formik >
            </div >
        </div >
    )
}