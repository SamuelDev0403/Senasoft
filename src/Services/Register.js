export const registerCitizen = async (data) => {

    let request = await fetch('http://localhost/senasoft/acceso/registro',
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })

    let result = await request.json()

    return result
}

