
import { Formik } from 'formik'
import { useState } from 'react'

export const NewSondeo = () => {


    const [questions, setQuestions] = useState([])
    const [questionsNumber, setQuestionsNumber] = useState([])

    const handlerSubmit = (values) =>{
        
    }

    const handleQuestion = () =>{
        // setQuestions({...questions, question: ''})
        setQuestionsNumber()
        console.log("questionsNumber: ", questionsNumber)
    }


    const validate = (values) =>{

        const errors = {}

        errors.nameInput = !values.nameInput ? 'Este campo es necesario' : ''
        errors.openDateInput = !values.openDateInput ? 'Este campo es necesario' : ''
        errors.closeDateInput = !values.closeDateInput ? 'Este campo es necesario' : ''
        errors.sexInput = !values.sexInput ? 'Este campo es necesario' : ''

        return errors
    }

    return (
        <>

            <Formik
                initialValues={
                    {
                        nameInput: '',
                        openDateInput: '',
                        closeDateInput: '',
                        sexInput: 'Hombre',
                        ageMajorInput: '',
                        ageMinorInput: '',
  
                    }
                }
                validate={(values) => validate(values)}
                onSubmit={(values) => handlerSubmit(values)}
            >

                {(formik) => (
                    <form action="" onSubmit={formik.handleSubmit}>
                        <h3 className="fs-3 fw-bold text-center"> CREACION DE NUEVO SONDEO </h3>
                        <div className="row">
                            <h2> DATOS BASICOS </h2>
                            <div className="col">
                                <label> Nombre del sondeo </label>
                                <input type="text" name="nameInput" className="form-control" {...formik.getFieldProps('nameInput')}/>
                                {formik.touched.nameInput && formik.errors.nameInput ? <small className='text-danger'>{formik.errors.nameInput}</small> : ''}
                            </div>
                            <div className="col">
                                <label> Fecha de inicio </label>
                                <input type="date" name="openDateInput" className="form-control" {...formik.getFieldProps('openDateInput')}/>
                                {formik.touched.openDateInput && formik.errors.openDateInput ? <small className='text-danger'>{formik.errors.openDateInput}</small> : ''}
                            </div>
                            <div className="col">
                                <label> Fecha de cierre </label>
                                <input type="date" name="closeDateInput" className="form-control" {...formik.getFieldProps('closeDateInput')}/>
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
                                        {questionsNumber.map((e, index)=>(
                                            <tr>
                                                <td> <input type='text' name={'questionInput'+index}/> </td>
                                            </tr>
                                        ))}
                                        <tr>
                                            <td> Contenido de preguntas </td>
                                            <td> Contenido de respuestas </td>
                                        </tr>
                                        <tr>
                                            <td> <button type="button" className="btn btn-primary" onClick={()=>handleQuestion()}> Agregar nueva pregunta</button> </td>
                                            <td> <button type="button" className="btn btn-primary"> Agregar nueva respuesta</button> </td>
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
                                    <option value="Hombre"> Hombre </option>
                                    <option value="Mujer"> Mujer </option>
                                    <option value="Intersexual"> Intersexual </option>
                                    <option value="Indefinido"> Indefinido </option>
                                    <option value="PrefierenNoDecir"> Prefieren no decir </option>
                                </select>
                                {formik.touched.sexInput && formik.errors.sexInput ? <small className='text-danger'>{formik.errors.sexInput}</small> : ''}
                            </div>
                            <div className="col-6">
                                <label htmlFor="">Edad</label>
                                <div className="row">
                                    <div className="col mt-2">
                                        <input type="number" name="ageMajorInput" id="" className="form-control" placeholder='>' />
                                    </div>
                                    <div className="col mt-2">
                                        <input type="number" name="ageMinorInput" id="" className="form-control" placeholder="<" />
                                    </div>
                                </div>
                                {/* {formik.touched.sexInput && formik.errors.sexInput ? <small className='text-danger'>{formik.errors.sexInput}</small> : ''} */}
                            </div>
                        </div>

                        <button type="submit" className='btn btn-primary mt-3'> Crear sondeo </button>
                    </form>
                )
                }
            </Formik>

        </>
    )
}