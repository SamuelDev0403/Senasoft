
export const newSondeo = async (data, questions, answers) => {

    let newData = {
        titulo : data.nameInput,
        fechaApertura: data.openDateInput,
        fechaCierre: data.closeDateInput, 
        tematicaAbordada: data.descriptionInput,
        idSexo: data.sexInput || 0,
        idEtnia: data.ethnicityInput || 0,
        questions: {
            
        }
    }

    let request = await fetch('http://localhost/senasoft/sondeo/',
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({...newData, questions, answers})
    })

    let result = await request.json()

    return result
}  