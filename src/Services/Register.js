export const registerCitizen = async (data) => {

    let request = await fetch('',
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: {
                ...data
            }

        })

    let result = await request.json()

    return result
}

