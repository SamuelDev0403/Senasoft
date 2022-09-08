import { Formik } from "formik"

export const ViewSondeo = () => {

    let data = {
        question: 'Ejemplo de pregunta',
        answer1: 'Respuesta 1',
        answer2: 'Respuesta 2',
        answer3: 'Respuesta 3',
    }

    const handlerSubmit = () => {

    }

    return (

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
                <div>
                    <form action="" onSubmit={formik.handleSubmit}>
                        <div className="row">
                            <label htmlFor="" className="col-6"> Fecha apertura </label>
                            <label htmlFor="" className="col-6"> Fecha cierre </label>
                        </div>
                        <div className="row">
                            <label htmlFor="" className="col-6"> Tematica abordada </label>
                            <label htmlFor="" className="col-6"> Titulo </label>
                        </div>
                        <div className="mt-3">
                            <label id="question" className="mb-2"> 1. {data.question} </label>
                            <div>
                                <input type="radio" name="answer" id="" />
                                <label htmlFor="answer ms-2"> {data.answer1}</label>
                            </div>
                            <div>
                                <input type="radio" name="answer" id="" />
                                <label htmlFor="answer ms-2"> {data.answer2}</label>
                            </div>
                            <div>
                                <input type="radio" name="answer" id="" />
                                <label htmlFor="answer ms-2"> {data.answer3}</label>
                            </div>
                        </div>
                        <button type="submit" className="btn btn-primary mt-3"> Responder </button>
                    </form>
                </div>
            )}
        </Formik>

    )
}