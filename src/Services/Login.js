
export const login = async (data) => {

    let request = await fetch('',
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: {

            }

    })

    let result = await request.json()

    return result
}  