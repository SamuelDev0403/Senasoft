
import { Formik } from 'formik'
import { useState } from 'react'
import { newSondeo } from '../../../../Services/NewSondeo'
import Swal from 'sweetalert2'
import { useNavigate } from 'react-router-dom'

export const NewSondeo = () => {

    const [question, setQuestion] = useState([])

    const [question2, setQuestion2] = useState({})
    const [answer, setAnswer] = useState({})

    const navigate = useNavigate()

    const handlerSubmit = (values, resetForm) => {
        const crearSondeo = async () => {
            let result = await newSondeo(values, question2, answer)

            if (result.status == 200) {
                Swal.fire({
                    title: 'Exito!',
                    text: 'El sondeo se creo satisfactoriamente',
                    icon: 'success'
                })

                resetForm()
                setQuestion([])
                setQuestion2({})
                setAnswer({})


            } else if (result.status == 404) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Ocurrio un error con los datos ingresados',
                    icon: 'error'
                })
            }
        }

        crearSondeo()
    }

    const validate = (values) => {

        const errors = {}

        if (!values.nameInput) errors.nameInput = 'Este campo es necesario'
        if (!values.descriptionInput) errors.descriptionInput = 'Este campo es necesario'
        if (!values.openDateInput) errors.openDateInput = 'Este campo es necesario'
        if (!values.closeDateInput) errors.closeDateInput = 'Este campo es necesario'


        return errors
    }

    const returnObject = (obj, index, value) =>{

        obj = {...obj}
        obj['index'+index] = value

        console.log("obj: ",obj)
        return obj

    }

    return (
        <>

            <Formik
                initialValues={
                    {
                        nameInput: '',
                        descriptionInput: '',
                        openDateInput: '',
                        closeDateInput: '',
                        sexInput: '0',
                        ethnicityInput: '0',
                    }
                }
                validate={(values) => validate(values)}
                onSubmit={(values,{resetForm}) => handlerSubmit(values, resetForm)}
            >

                {(formik) => (
                    <form action="" onSubmit={formik.handleSubmit}>
                        <h3 className="fs-3 fw-bold text-center"> CREACION DE NUEVO SONDEO </h3>
                        <div className="row">
                            <h2> DATOS BASICOS </h2>
                            <div className="col">
                                <label> Nombre del sondeo </label>
                                <input type="text" name="nameInput" className="form-control" {...formik.getFieldProps('nameInput')} />
                                {formik.touched.nameInput && formik.errors.nameInput ? <small className='text-danger'>{formik.errors.nameInput}</small> : ''}
                            </div>
                            <div className="col">
                                <label> Descripcion del sondeo </label>
                                <input type="text" name="descriptionInput" className="form-control" {...formik.getFieldProps('descriptionInput')} />
                                {formik.touched.descriptionInput && formik.errors.descriptionInput ? <small className='text-danger'>{formik.errors.descriptionInput}</small> : ''}
                            </div>
                        </div>
                        <div className="row mt-3">
                            <div className="col">
                                <label> Fecha de inicio </label>
                                <input type="date" name="openDateInput" className="form-control" {...formik.getFieldProps('openDateInput')} />
                                {formik.touched.openDateInput && formik.errors.openDateInput ? <small className='text-danger'>{formik.errors.openDateInput}</small> : ''}
                            </div>
                            <div className="col">
                                <label> Fecha de cierre </label>
                                <input type="date" name="closeDateInput" className="form-control" {...formik.getFieldProps('closeDateInput')} />
                                {formik.touched.closeDateInput && formik.errors.closeDateInput ? <small className='text-danger'>{formik.errors.closeDateInput}</small> : ''}
                            </div>
                        </div>

                        <div className="row mt-3">
                            <h2> PREGUNTAS </h2>
                            <div className="col">
                                <table className="table">
                                    <thead>
                                        <tr>
                                            <th>PREGUNTAS</th>
                                            <th>RESPUESTAS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {question.map((element, index) => (
                                            <tr key={index}>
                                                <td>
                                                    <input type='text' className='form-control' onChange={(e) => {let data = returnObject(question2,index,e.currentTarget.value) ; setQuestion2(data)}}></input>
                                                </td>
                                                <td>
                                                    <input type="text" name="" id="" className='form-control' onChange={(e) => {let data = returnObject(answer,index+'answer1',e.currentTarget.value); setAnswer(data)}} />
                                                    <input type="text" name="" id="" className='form-control' onChange={(e) => {let data = returnObject(answer,index+'answer2',e.currentTarget.value); setAnswer(data)}} />
                                                    <input type="text" name="" id="" className='form-control' onChange={(e) => {let data = returnObject(answer,index+'answer3',e.currentTarget.value); setAnswer(data)}} />
                                                </td>
                                            </tr>
                                        ))}
                                        <tr>
                                            <td>
                                                <input type='button' className='btn btn-primary' onClick={() => { setQuestion(question.concat('')); console.log(question) }} value=' Agregar pregunta'></input>
                                                <input type="button" value="Ver datos"  className='btn btn-primary' onClick={()=>console.log(question2)}/>
                                            </td>

                                        </tr>


                                        {/* <tr>
                                            <td>
                                                <input type='text' className='form-control' {...formik.getFieldProps('question1')}></input>
                                                {formik.touched.question1 && formik.errors.question1 ? <small className='text-danger'>{formik.errors.question1}</small> : ''}
                                            </td>
                                            <td>
                                                <input type='text' className='form-control' {...formik.getFieldProps('answer1Q1')}></input>
                                                {formik.touched.answer1Q1 && formik.errors.answer1Q1 ? <small className='text-danger'>{formik.errors.answer1Q1}</small> : ''}

                                                <input type='text' className='form-control' {...formik.getFieldProps('answer2Q1')}></input>
                                                {formik.touched.answer2Q1 && formik.errors.answer2Q1 ? <small className='text-danger'>{formik.errors.answer2Q1}</small> : ''}

                                                <input type='text' className='form-control' {...formik.getFieldProps('answer3Q1')}></input>
                                                {formik.touched.answer3Q1 && formik.errors.answer3Q1 ? <small className='text-danger'>{formik.errors.answer3Q1}</small> : ''}

                                            </td>
                                        </tr> */}
                                        <tr>
                                        </tr>
                                        <tr>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div className="row mt-3">
                            <h2> CONDICIONES DE PARTICIPACION </h2>
                            <div className="col-6">
                                <label className="form-label">Sexo</label>
                                <select className='form-control' name='sexInput' {...formik.getFieldProps('sexInput')}>
                                    <option value="0">No aplica </option>
                                    <option value="1">Hombre </option>
                                    <option value="2"> Mujer </option>
                                    <option value="3"> Intersexual </option>
                                    <option value="4"> Indefinido </option>
                                    <option value="5"> Prefieren no decir </option>
                                </select>
                                {formik.touched.sexInput && formik.errors.sexInput ? <small className='text-danger'>{formik.errors.sexInput}</small> : ''}
                            </div>
                            <div className="col-6">
                                <label className='form-label'> Etnia </label>
                                <select className='form-control' name='ethnicityInput' {...formik.getFieldProps('ethnicityInput')}>
                                    <option value="0">No aplica </option>
                                    <option value="1"> Blanco </option>
                                    <option value="2"> Mestizo </option>
                                    <option value="3"> Negro </option>
                                    <option value="4"> Indigena </option>
                                    <option value="5"> Otro </option>
                                </select>
                                {/* {formik.touched.sexInput && formik.errors.sexInput ? <small className='text-danger'>{formik.errors.sexInput}</small> : ''} */}
                            </div>
                        </div>
                        <input type="submit" className='btn btn-primary mt-3' value='Crear sondeo'/>
                    </form>
                )
                }
            </Formik>

        </>
    )
}