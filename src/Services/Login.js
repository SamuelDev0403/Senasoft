
export const login = async (data) => {

    let request = await fetch('http://localhost/senasoft/acceso/login/',
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data)
    })

    let result = await request.json()

    return result
}  